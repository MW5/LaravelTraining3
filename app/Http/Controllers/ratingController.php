<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use App\Rating;
use Session;
use Mail;

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
        
        if($rating->save()){
            Session::flash('message', 'Your rating will be available shortly!'); 
            Session::flash('alert-class', 'alert-success'); 
            Mail::send('emails.ratingSystemMail',
                        ['name'=>$request->name, 'postcode'=>$request->postcode,
                            'rating'=>$request->rating, 'rating_text'=>$request->rating_text],
                        function ($message) {
                            $message->from('info@pgelectric.uk', 'PGelectric Rating System');
                            $message->to('info@pgelectric.uk');
                            $message->subject('A customer just submitted a rating!');
                        });
        } else {
            Session::flash('message', 'Something went wrong. Please try again later.'); 
            Session::flash('alert-class', 'alert-danger'); 
        }
        return back();
    }
}
