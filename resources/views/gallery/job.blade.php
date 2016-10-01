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
                    <img id='nav_logo_pic' alt="Brand" src="/images/PGElectric_logo.png">
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
    
    @section('jobs_gallery')
    <div class='container-fluid job_pics_container'>
        <div class='container'>
            <p> HERE SOME STUFF</p>
        </div>
    </div>
    @stop
</html>


