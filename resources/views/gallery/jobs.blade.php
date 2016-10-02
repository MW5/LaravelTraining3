@extends('layouts.app')

    @section('title')
        <title>Pg Electric Gallery</title>
    @stop
    
    @section('nav')
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#pics_nav" aria-expanded="false">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">
                <div id="logo-background-rotated">
                    <img id='nav_logo_pic' alt="Brand" src="{{URL::asset('images/PGElectric_logo.png')}}">
                </div>
            </a>
          </div>

          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse" id="pics_nav">
            <ul class="nav navbar-nav">
                <li><a href="/">Back</a></li>
            </ul>
          </div>
        </div>
    </nav>
    @stop
    
    @section('jobs_gallery')
    <div class='container-fluid gallery_thumbnail_container'>
        <div class='container'>
            @foreach($jobs as $index => $job)
                @if($index%3==0)
                    <div class="row">
                @endif
                        <div class="col-sm-6 col-md-4">
                            <a href="/jobs/{{$job->id}}">
                                <div class="thumbnail">
                                    <img src="{{URL::asset($job->thumbnail_src)}}" alt="{{$index}}ALT_TEXT">
                                    <div class="caption">
                                        <h3>{{$job->job_heading}}</h3>
                                        <p>{{$job->job_description}}</p>
                                    </div>
                                </div>
                            </a>  
                        </div>
                @if(($index+1)%3==0)
                    </div>
                @endif
            @endforeach
        </div>
    </div>
    @stop