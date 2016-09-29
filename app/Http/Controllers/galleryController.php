<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;

class galleryController extends Controller
{
    public function listJobs() {
        $jobs = DB::table('jobs')->get();
        return view('gallery.jobs', compact('jobs'));
    }
}
