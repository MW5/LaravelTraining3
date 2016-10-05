<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;

class admController extends Controller
{           
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function showPanel() {
        $jobs = DB::table('jobs')->get();
        $job_pics = DB::table('job_pics')->get();
        //$recommendations here as well
        return view('auth.admPanel', compact('jobs','job_pics'));
    }
}
