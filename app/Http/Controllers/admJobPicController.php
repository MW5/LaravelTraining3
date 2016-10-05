<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class admJobPicController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
//    function addNotes(Request $request, Card $card) {
//        $this->validate($request,[
//            'body'=>'required|min:5|max:30'
//        ]);
//        $note = new Note($request->all());
//        $note->user_id = 1; //Auth::id();
//        $card->addNote($note);
//        return back(); //equal to redirect(/someUrl);
//    }
}
