<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;
use App\Rating;
use Session;

class ratingController extends Controller
{
    public function listRatings() {
        $ratings = DB::table('ratings')->get();
        return View('ratings.ratings', compact('ratings'));
    }
    public function addRating(Request $request) {
        $this->validate($request,[
            'rating_name'=>'required|min:2|max:30',
            'rating_postcode'=>'required|min:6|max:8',
            'rating_grade'=>'required|integer|min:1|max:5',
            'rating_text'=>'required|min:2|max:400'
        ]);
        $rating = new Rating();
        $rating->name = $request->rating_name;
        $rating->postcode = $request->rating_postcode;
        $rating->rating = $request->rating_grade;
        $rating->rating_text = $request->rating_text;
        $rating->save();
        Session::flash('message', 'Your rating will be available shortly!'); 
        Session::flash('alert-class', 'alert-success'); 
        return back();
    }
}
