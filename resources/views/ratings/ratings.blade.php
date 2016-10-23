@extends('layouts.app')

    @section('title')
        <title>Pg Electric Ratings</title>
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
    
    @section('ratings')
    <div class='container-fluid ratings_container'>
        <div class='container'>
            <button type="button" class="btn btn-primary btn-lg btn_green" data-toggle="modal" data-target="#add_rating_modal">Add rating</button>
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
            @if(count($ratings) == 0)
                    <div id="no_ratings">There are no ratings yet</div>
            @else
                @foreach($ratings as $rating)
                        @if($rating->verified)
                            <div class="row rating_container">
                                <div class="col-xs-6 col-md-4 v_center">
                                    <div class="rating_author">{{$rating->name}}</div>
                                </div>
                                <div class="col-xs-6 col-md-4 v_center">
                                    @for($i=0; $i<5; $i++) 
                                        @if($i<$rating->rating)
                                            <span class="rating_star">★</span>
                                        @else
                                            <span class="rating_star">☆</span>
                                        @endif
                                    @endfor
                                </div>
                                <div class="col-xs-6 col-md-4 v_center">
                                    <div class="rating_text">{{$rating->rating_text}}</div>
                                </div>
                            </div>
                        @endif
                @endforeach
            @endif    
        </div>
    </div>
    <div class="modal fade" tabindex="-1" role="dialog" id="add_rating_modal">
        <div class="modal-dialog" role="document">
            <div class="modal-content pg_modal">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Add rating</h4>
                </div>
                <div class="modal-body">
                    <form id="add_rating_form" method="POST" action="/ratings/addRating">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group">
                            <label for="rating_name">Your name:</label>
                            <input id="rating_name" type="text" class="form-control" name="rating_name" placeholder="2-30 characters">{{old('rating_name')}}</input>
                        </div>
                        <div class="form-group">
                            <label for="rating_grade">Grade our services:</label>
                            <div class="rating" id="rating_grade">
                                <span><input type="radio" name="rating_grade" id="str5" value="5"><label for="str5">5</label></span>
                                <span><input type="radio" name="rating_grade" id="str4" value="4"><label for="str4">4</label></span>
                                <span><input type="radio" name="rating_grade" id="str3" value="3"><label for="str3">3</label></span>
                                <span><input type="radio" name="rating_grade" id="str2" value="2"><label for="str2">2</label></span>
                                <span><input type="radio" name="rating_grade" id="str1" value="1"><label for="str1">1</label></span>
                        </div>
                        </div>
                        <div class="form-group">
                            <label for="rating_text">Describe our services:</label>
                            <textarea id="rating_text" class="form-control" name="rating_text" placeholder="2-400 characters">{{old('rating_text')}}</textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default btn_red" data-dismiss="modal">Close</button>
                    <button form="add_rating_form" type="submit" class="btn btn-primary btn_green">Add rating</button>
                </div>
            </div>
        </div>
    </div>
    @stop