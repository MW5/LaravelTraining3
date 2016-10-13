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
    <div class="container-fluid adm_panel_container">
        @if (count($errors) > 0 || Session::has('message'))
                <div class="alert_box">
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @if(Session::has('message'))
                        <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
                    @endif
                </div>
            @endif
        <div class="container gallery_container">
            <h1>Gallery manager</h1>
            <button type="button" class="btn btn-primary btn-lg btn_green" data-toggle="modal" data-target="#add_job_modal">Add job</button>
            @foreach($jobs as $job)
                <div class="gallery_manager_job_container">
                    <div class="modal fade" tabindex="-1" role="dialog" id="add_pic_modal_{{$job->id}}">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content pg_modal">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title">Add job picture</h4>
                                </div>
                                <div class="modal-body">
                                    <form id="add_pic_form_{{$job->id}}" method="POST" action="/admpanel/addPic" enctype="multipart/form-data">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                        <div class="form-group">
                                            IMPORTANT! PICS MUST BE 2700 WIDE 1500 HIGH (2700x1500)
                                            <input type="file" class="form-control" name="job_pic"">
                                        </div>

                                        <div class="form-group">
                                            <input type="hidden" class="form-control" name="job_id" value="{{$job->id}}"></input>
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default btn_red" data-dismiss="modal">Close</button>
                                    <button form="add_pic_form_{{$job->id}}" type="submit" class="btn btn-primary btn_green">Add picture</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade" tabindex="-1" role="dialog" id="edit_heading_modal_{{$job->id}}">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content pg_modal">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title">Edit heading</h4>
                                </div>
                                <div class="modal-body">
                                    <form id="edit_heading_form_{{$job->id}}" method="POST" action="/admpanel/editJobHeading/{{$job->id}}">
                                    {{method_field('PATCH')}}
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="job_heading" placeholder='{{$job->job_heading}}'>{{old('new_heading')}}</input>
                                    </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default btn_red" data-dismiss="modal">Close</button>
                                    <button form="edit_heading_form_{{$job->id}}" type="submit" class="btn btn-primary btn_green">Edit heading</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade" tabindex="-1" role="dialog" id="edit_description_modal_{{$job->id}}">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content pg_modal">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title">Edit description</h4>
                                </div>
                                <div class="modal-body">
                                    <form id="edit_description_form_{{$job->id}}" method="POST" action="/admpanel/editJobDescription/{{$job->id}}">
                                    {{method_field('PATCH')}}
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <div class="form-group">
                                        <textarea class="form-control" name="job_description" placeholder='{{$job->job_description}}'>{{old('new_description')}}</textarea>
                                    </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default btn_red" data-dismiss="modal">Close</button>
                                    <button form="edit_description_form_{{$job->id}}" type="submit" class="btn btn-primary btn_green">Edit description</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <form id="remove_job_form_{{$job->id}}" method="POST" action="/admpanel/removeJob/{{$job->id}}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <h2 class="adm_job_heading">{{$job->job_heading}}</h2>
                        <p class="adm_job_description">{{$job->job_description}}</p>
                        <button type="button" class="btn btn-primary btn_green" data-toggle="modal" data-target="#add_pic_modal_{{$job->id}}">Add picture</button>
                        <button type="button" class="btn btn-primary btn_green" data-toggle="modal" data-target="#edit_heading_modal_{{$job->id}}">Edit heading</button>
                        <button type="button" class="btn btn-primary btn_green" data-toggle="modal" data-target="#edit_description_modal_{{$job->id}}">Edit description</button>

                        <span class="pull-right">
                            <button form="remove_job_form_{{$job->id}}" type="submit" class="btn btn-primary btn_red">Remove this job</button>
                            <button form="remove_pics_form_{{$job->id}}" type="submit" class="btn btn-primary btn_red">Remove selected pictures</button>
                        </span>
                    </form>
                    <ol>
                        <form id="remove_pics_form_{{$job->id}}" method="POST" action="/admpanel/removePics/">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        @foreach ($job_pics as $jobPic)
                            @if($jobPic->job_id == $job->id)
                                <li>
                                    <input type="checkbox" name="ch[]" value="{{$jobPic->id}}">
                                    <img src="{{$jobPic->pic_src}}" class="adm_job_thumbnail" alt="jobPic">
                                    {{$jobPic->pic_src}}
                                </li>
                            @endif
                        @endforeach
                        </form>
                    </ol>
                </div>    
            @endforeach 
        </div>
    </div>
    
    <div class="modal fade" tabindex="-1" role="dialog" id="add_job_modal">
        <div class="modal-dialog" role="document">
            <div class="modal-content pg_modal">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Add job</h4>
                </div>
                <div class="modal-body">
                    <form id="add_job_form" method="POST" action="/admpanel/addJob" enctype="multipart/form-data">
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
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default btn_red" data-dismiss="modal">Close</button>
                    <button form="add_job_form" type="submit" class="btn btn-primary btn_green">Add job</button>
                </div>
            </div>
        </div>
    </div>
    
    
    @stop
</html>