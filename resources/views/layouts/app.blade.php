<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        @yield('adm_robots')
        @yield('title')
        <link rel="stylesheet" href="{{ URL::asset('css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ URL::asset('css/app.css') }}">
        <script src="{{ URL::asset('js/jquery-3.1.1.js')}}"></script>
        <script src="{{ URL::asset('js/bootstrap.min.js')}}"></script>
        <script src="{{ URL::asset('js/app.js')}}"></script>
        <script src="{{ URL::asset('js/cookies_script.js')}}"></script>

    </head>
    <body>
        @yield('nav')
        @yield('adm_login')
        @yield('adm_reset')
        @yield('adm_email')
        @yield('adm_panel')
        @yield('carousel')
        @yield('credo')
        @yield('about_introduction')
        @yield('about_pros')
        @yield('ratings_link')
        @yield('ratings')
        @yield('offer')
        @yield('gallery_link')
        @yield('jobs_gallery')
        @yield('job_pics')
        @yield('address')
        @yield('map')
        @yield('contact')
        @yield('privacy_policy')
        <footer class='footer_container'>
                <div class='author'>Designed and developed by MW5</div>
                <a class="privacy_policy_link" href="privacyPolicy">Privacy policy</a>
        </footer>
    </body>
    <script type='text/javascript'>
        $(document).ready(function() {
            $.cookiesDirective({
                privacyPolicyUri: 'privacyPolicy'
            });
        });
    </script>
</html>
