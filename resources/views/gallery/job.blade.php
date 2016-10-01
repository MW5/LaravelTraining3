@extends('layouts.app')

    @section('title')
        <title>Pg Electric Gallery</title>
    @stop
    
    @section('nav')
    <nav class="navbar navbar-default navbar-fixed-top"">
        <div class="container-fluid">
          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
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
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li><a href="/gallery">Back</a></li>
            </ul>
          </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
    @stop
    
    @section('job_pics')
        <div class='container-fluid job_pics_container'>
            <div class='container'>
                @if(count($job->jobPics)==0)
                    <div id="no_photos">No photos in this gallery</div>
                @else
                    <div id="gallery_carousel" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                                <?php $i=0;?>
                            @foreach($job->jobPics as $pic)
                                @if($job->jobPics->first()->id == $pic->id)
                                    <li data-target="#gallery_carousel" data-slide-to="<?php echo($i);?>" class="active"></li>
                                @else
                                    <li data-target="#gallery_carousel" data-slide-to="<?php echo($i);?>"></li>    
                                @endif
                                <?php $i++;?>
                            @endforeach
                        </ol>
                        <div class="carousel-inner" role="listbox">
                                @foreach($job->jobPics as $pic)
                                    @if($job->jobPics->first()->id == $pic->id)
                                        <div class="item active">
                                            <img src="{{URL::asset($pic->pic_src)}}" alt="picture_{{$pic->id}}">
                                        </div>
                                    @else
                                        <div class="item">
                                            <img src="{{URL::asset($pic->pic_src)}}" alt="picture_{{$pic->id}}">
                                        </div>
                                    @endif
                                @endforeach
                        </div>
                        <a class="left carousel-control" href="#gallery_carousel" role="button" data-slide="prev">
                            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="right carousel-control" href="#gallery_carousel" role="button" data-slide="next">
                            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                @endif
            </div>
        </div>
    @stop
</html>


