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
            <a class="navbar-brand" href="#gallery_manager">
                <div id="logo_background_fixed">
                    <img id='nav_logo_pic_fixed' alt="Brand" src="images/PGElectric_logo.png">
                </div>
            </a>
          </div>

          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse" id="nav_links">
            <ul class="nav navbar-nav pull-left">
                <li><a href="#gallery_manager">Gallery manager</a></li>
                <li><a href="#ratings_manager">Ratings manager</a></li>
            </ul>
            <ul class="nav navbar-nav pull-right">
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
        <div class="container adm_function_container">
            <h1 id="gallery_manager">Gallery manager</h1>
            <button type="button" class="btn btn-primary btn-lg btn_green" data-toggle="modal" data-target="#add_job_modal">Add job</button>
            @foreach($jobs as $job)
                <div class="adm_content_container">
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
                        <h2 class="adm_heading">{{$job->job_heading}}</h2>
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
                        <form id="remove_pics_form_{{$job->id}}" method="POST" action="/admpanel/removePics">
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
        <div class="container adm_function_container">
            <h1 id="ratings_manager">Ratings manager</h1>
                @foreach($ratings as $rating)
                    @if($rating->verified)
                        <div class="adm_content_container adm_verified ratings_manager_rating_container">
                    @else
                        <div class="adm_content_container adm_not_verified ratings_manager_rating_container">
                    @endif
                            <form id="verify_rating_form_{{$rating->id}}" method="POST" action="/admpanel/verifyRating/{{$rating->id}}">
                                {{method_field('PATCH')}}
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            </form>
                            <form id="remove_rating_form_{{$rating->id}}" method="POST" action="/admpanel/removeRating/{{$rating->id}}">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            </form>
                            @if(!$rating->verified)
                                <h2 class="adm_heading adm_not_verified_heading">{{$rating->name}}</h2>
                                <button form="verify_rating_form_{{$rating->id}}" type="submit" class="btn btn-primary btn_green">Approve rating</button>
                            @else 
                                <h2 class="adm_heading adm_verified_heading">{{$rating->name}}</h2>
                            @endif
                            <button form="remove_rating_form_{{$rating->id}}" type="submit" class="btn btn-primary btn_red pull-right">Remove rating</button>
                            <p>Rating author: {{$rating->name}}</p>
                            <p>Rating author`s postcode: {{$rating->postcode}}</p>
                            <p>Rating: {{$rating->rating}}/5</p>
                            <p>Rating text: {{$rating->rating_text}}</p>
                            @if($rating->verified)
                                <p class="adm_rating_verified">Rating verified</p>
                            @else
                                <p class="adm_rating_not_verified">Rating not verified</p>
                            @endif
                    </div>
                @endforeach
            </form>
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
                            <label for="job_thumbnail_pic">Job thumbnail picture:</label>
                            <input id="job_thumbnail_pic" type="file" class="form-control" name="job_thumbnail_pic">
                        </div>
                        
                        <div class="form-group">
                            <label for="job_heading">Job heading:</label>
                            <input id="job_heading" type="text" class="form-control" name="job_heading"
                                   placeholder='2-50 characters'>{{old('job_heading')}}</input>
                        </div>
                        
                        <div class="form-group">
                            <label for="job_description">Job description:</label>
                            <textarea id ="job_description" class="form-control" name="job_description"
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