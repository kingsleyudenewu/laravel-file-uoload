<?php
/**
 * Created by Kingsley.
 * User: apple
 * Date: 16/04/2019
 * Time: 10:03 AM
 */
?>

        <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Voucher Pool') }}</title>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.2/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.10/css/jquery.dataTables.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.2/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.10/js/jquery.dataTables.min.js"></script>

    {{--Set CSRF Header for sending request via javascript--}}
    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
</head>
<body>
<div id="app">
    <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'Voucher Pool') }}
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">
                    {{--<h3>Hello</h3>--}}
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('index') }}">{{ __('Vouchers') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('special_offers.index') }}">{{ __('Special Offers') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('recipients.index') }}">{{ __('Recipients') }}</a>
                    </li>

                    <!-- Authentication Links -->
                    {{--@guest--}}
                    {{--<li class="nav-item">--}}
                    {{--<a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>--}}
                    {{--</li>--}}
                    {{--<li class="nav-item">--}}
                    {{--<a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>--}}
                    {{--</li>--}}
                    {{--@else--}}
                    {{--<li class="nav-item">--}}
                    {{--<a class="nav-link" href="{{ route('companys.index') }}">{{ __('Company') }}</a>--}}
                    {{--</li>--}}
                    {{--<li class="nav-item">--}}
                    {{--<a class="nav-link" href="{{ route('employees.index') }}">{{ __('Employee') }}</a>--}}
                    {{--</li>--}}

                    {{--<li class="nav-item dropdown">--}}
                    {{--<a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>--}}
                    {{--{{ Auth::user()->name }} <span class="caret"></span>--}}
                    {{--</a>--}}

                    {{--<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">--}}
                    {{--<a class="dropdown-item" href="{{ route('logout') }}"--}}
                    {{--onclick="event.preventDefault();--}}
                    {{--document.getElementById('logout-form').submit();">--}}
                    {{--{{ __('Logout') }}--}}
                    {{--</a>--}}

                    {{--<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">--}}
                    {{--@csrf--}}
                    {{--</form>--}}
                    {{--</div>--}}
                    {{--</li>--}}
                    {{--@endguest--}}
                </ul>
            </div>
        </div>
    </nav>

    <main class="py-4">
        @yield('content')
        @yield('scripts')
    </main>
</div>

</body>
</html>

