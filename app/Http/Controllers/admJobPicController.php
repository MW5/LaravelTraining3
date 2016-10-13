<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;
use App\JobPic;
use File;
use Session;

class admJobPicController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    function addPic(Request $request) {
        $this->validate($request,[
            'job_pic'=>'dimensions:width=2700,height=1500'
        ]);
          
        $destinationPath = "images/Uploaded/Job_$request->job_id/";
        $name = $request->job_pic->getClientOriginalName();
        $request->job_pic->move($destinationPath, $name);
        
        $jobPic = new JobPic();
        $jobPic->pic_src = $destinationPath.$name;
        $jobPic->job_id = $request->job_id;
        $jobPic->save();
        Session::flash('message', 'The picture has been successfully added'); 
        Session::flash('alert-class', 'alert-success');
        return back();
    }
    function removePics(Request $request) {
        if(count($request->get('ch')) != 0) {
            foreach($request->get('ch') as $jP) {
                $jobPic = JobPic::find($jP);
                File::delete($jobPic->pic_src);
                $jobPic->delete();
            }
        }
        Session::flash('message', 'The picture/pictures have been successfully removed!'); 
        Session::flash('alert-class', 'alert-success'); 
        return back();
    }
}
