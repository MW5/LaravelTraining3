<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Job;
use File;
use Session;

class admJobController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    function addJob(Request $request) {
        
        $this->validate($request,[
            'job_heading'=>'required|min:2|max:50',
            'job_description'=>'required|min:2|max:300'
            //'job_thumbnail_pic'=>'dimensions:width=2700,height=1500'
        ]);
          
        $destinationPath = "images/Uploaded/";
        $name = $request->job_thumbnail_pic->getClientOriginalName();
        $request->job_thumbnail_pic->move($destinationPath, $name);
        
        $job = new Job();
        $job->thumbnail_src = $destinationPath.$name;
        $job->job_heading = $request->job_heading;
        $job->job_description= $request->job_description;
        $job->save();
        Session::flash('message', 'The job has been successfully added!'); 
        Session::flash('alert-class', 'alert-success'); 
        return back();
    }
    
    public function removeJob(Job $job) {
        foreach ($job->jobPics as $jobPic) {
            File::delete($jobPic->pic_src);
            $jobPic->delete();
        }
        
        File::delete($job->thumbnail_src);
        File::deleteDirectory("images/Uploaded/Job_$job->id");
        $job->delete();
        Session::flash('message', 'The job and all of its pictures have been successfully removed!'); 
        Session::flash('alert-class', 'alert-success'); 
        return back();
    }
    
    public function editHeading(Request $request, Job $job) {
        $this->validate($request, [
            'job_heading'=>'required|min:2|max:50',
        ]);
        $job->update($request->all());
        Session::flash('message', 'The heading has been successfully changed!'); 
        Session::flash('alert-class', 'alert-success'); 
        return back();
    }
    
    public function editDescription(Request $request, Job $job) {
        $this->validate($request, [
            'job_description'=>'required|min:2|max:300',
        ]);
        $job->update($request->all());
        Session::flash('message', 'The description has been successfully changed!'); 
        Session::flash('alert-class', 'alert-success'); 
        return back();
    }
}
