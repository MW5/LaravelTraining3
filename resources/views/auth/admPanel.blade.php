@extends('layouts.app')

    @section('adm_robots')
        <meta name="robots" content="noindex">
    @endsection
    
    @section('title')
        <title>AUTHORIZED USERS ONLY</title>
    @stop
    
    @section('nav')
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#nav_links" aria-expanded="false">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#top">
                <div id="logo-background-rotated">
                    <img id='nav_logo_pic' alt="Brand" src="images/PGElectric_logo.png">
                </div>
            </a>
          </div>

          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse" id="nav_links">
            <ul class="nav navbar-nav">
                <li><a href="{{ url('/logout') }}"
                        onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                        Logout
                    </a>
                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </li>
            </ul>
          </div>
        </div>
      </nav>
    @endsection
    @section('adm_panel')
    <div class="container-fluid gallery_manager_container">
        <div class="container">
            <h1>Gallery manager</h1>
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#add_job_modal">Add job</button>
            @foreach($jobs as $job)
                <h3>{{$job->job_heading}}</h3>
                <ol class="adm_jobs_list">
                    @foreach ($job_pics as $jobPic)
                        @if($jobPic->job_id == $job->id)
                            <li>{{$jobPic->pic_src}}</li>
                        @endif
                    @endforeach
                </ol>
            @endforeach 
            
        </div>
    </div>
    
    <div class="modal fade" tabindex="-1" role="dialog" id="add_job_modal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Add job</h4>
                </div>
                <div class="modal-body">
                    <form method="POST" action="/admpanel/addJob" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        
                        <div class="form-group">
                            IMPORTANT! PICS MUST BE 2700 WIDE 1500 HIGH (2700x1500)
                            <input type="file" class="form-control" name="job_thumbnail_pic"">
                        </div>
                        
                        <div class="form-group">
                            <input type="text" class="form-control" name="job_heading"
                                   placeholder='2-50 characters'>{{old('job_heading')}}</input>
                        </div>
                        
                        <div class="form-group">
                            <textarea class="form-control" name="job_description"
                                      placeholder='2-300 characters'>{{old('job_description')}}</textarea>
                        </div>
                        
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add card</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @stop
</html>