<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Session;
use Mail;

class pageController extends Controller
{
    public function home() {
        return view('home');
    }
    public function privacyPolicy() {
        return view('privacyPolicy');
    }
    public function contactForm(Request $request) {
        $this->validate($request,[
            'name'=>'required|min:2|max:50',
            'email'=>'required_without:phone|email',
            'phone'=>'required_without:email|min:9|max:10',
            'msg'=>'required|min:2|max:300'
        ]);
        Mail::send('emails.contactFormMail',
                ['name'=>$request->name, 'email'=>$request->email, 'phone'=>$request->phone, 'msg'=>$request->msg],
                function ($message) {
                    $message->from('info@pgelectric.uk', 'PGelectric Contact Form');
                    $message->to('info@pgelectric.uk');
                }
            );
        Session::flash('message', 'We will contact you soon!'); 
        Session::flash('alert-class', 'alert-success'); 
        return back();
    }
}

    
