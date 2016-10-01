<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        @yield('title')
        <link rel="stylesheet" href="{{ URL::asset('css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ URL::asset('css/app.css') }}">
        <script src="{{ URL::asset('js/jquery-3.1.1.js')}}"></script>
        <script src="{{ URL::asset('js/bootstrap.min.js')}}"></script>
        <script src="{{ URL::asset('js/app.js')}}"></script>
    </head>
    <body>
        @yield('nav')
        @yield('carousel')
        @yield('credo')
        @yield('about_introduction')
        @yield('about_pros')
        @yield('offer')
        @yield('gallery')
        @yield('address')
        @yield('map')
        @yield('contact')
        @yield('jobs_gallery')
        @yield('job_pics')
        <h1>ADD FOOTER!</h1>
    </body>
</html>

