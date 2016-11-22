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
        
        @yield('nav')
        @yield('adm_login')
        @yield('adm_reset')
        @yield('adm_email')
        @yield('adm_panel')
        @yield('carousel')
        @yield('credo')
        @yield('about_introduction')
        @yield('checkatrade_link')
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
