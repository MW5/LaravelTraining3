<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;
use App\Job;

class galleryController extends Controller
{
    public function listJobs() {
        $jobs = DB::table('jobs')->get();
        return view('gallery.jobs', compact('jobs'));
    }
    public function showJob(Job $job) {
        return view('gallery.job', compact('job'));
    }
}
