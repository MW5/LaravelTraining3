<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Rating;
use Session;

class admRatingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function verifyRating(Rating $rating) {
        $rating->verified = 1;
        $rating->save();
        Session::flash('message', 'The rating has been approved'); 
        Session::flash('alert-class', 'alert-success');
        return back();
    }
    public function removeRating(Rating $rating) {
        $rating->delete();
        Session::flash('message', 'The rating has been successfully removed'); 
        Session::flash('alert-class', 'alert-success');
        return back();
    }
}
