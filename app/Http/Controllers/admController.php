<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class admController extends Controller
{           
    public function login() {
        return view('auth.login');
    }
        public function __construct()
    {
        $this->middleware('auth');
    }
}
