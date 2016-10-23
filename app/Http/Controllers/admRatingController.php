<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Rating;

class admRatingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function verifyRating(Rating $rating) {
        $rating->verified = 1;
        $rating->save();
        return back();
    }
    public function removeRating(Rating $rating) {
        $rating->delete();
        return back();
    }
}
