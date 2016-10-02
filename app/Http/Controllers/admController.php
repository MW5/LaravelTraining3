<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class admController extends Controller
{           
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function showPanel() {
        return view('auth.admPanel');
    }
}
