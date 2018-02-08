<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('/js/easy-autocomplete/dist/jquery.easy-autocomplete.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('/js/easy-autocomplete/dist/easy-autocomplete.min.css') }}"> 
    <link rel="stylesheet" href="{{ asset('/js/easy-autocomplete/dist/easy-autocomplete.themes.min.css') }}">  
    <!--
    <script src="/{{base_path()}}/node_modules/easy-autocomplete/dist/jquery.easy-autocomplete.min.js"></script> 
    <!-- CSS file -->
    <!--
    <link rel="stylesheet" href="/{{base_path()}}/node_modules/easy-autocomplete/dist/easy-autocomplete.min.css"> 
    <link rel="stylesheet" href="/{{base_path()}}/node_modules/easy-autocomplete/dist/easy-autocomplete.themes.min.css"> 

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        .float-right {
            float:right;
        }

         .float-left {
            float:left;
        }

        .group-btn {
            margin-left:5px;
        }

        li.message-unread {
            background-color:#ccc;
        }
    </style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                     <li>
                                        <a href="{{route('users.profile')}}">
                                            My Profile
                                        </a>

                                
                                    </li>

                                     <li>
                                        <a href="{{route('messages.index')}}">
                                            My Messages
                                        </a>

                                
                                    </li>

                                    <li>
                                        <a href="{{route('contracts.index')}}">
                                            My Contracts
                                        </a>

                                
                                    </li>

                                     <li>
                                        <a href="{{route('good_request.create')}}">
                                            My Requests
                                        </a>

                                
                                    </li>

                                    <li>
                                        <a href="{{route('search.index')}}">
                                            Search
                                        </a>

                                
                                    </li>

                                    

                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>

                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
        <div class="col-md-10 col-md-offset-1">
            @if($errors->any())
                <div class="alert alert-danger">
                    @foreach($errors->all() as $err)
                        {!!$err!!}
                    @endforeach
                </div>

            @endif
        </div>

        <div class="col-md-10 col-md-offset-1">
            @if(Session::has("success"))
                <div class="alert alert-success">
                  
                        {!!Session::get("success")!!}
                    
                </div>

            @endif
        </div>

        @yield('content')
    </div>

    <!-- Scripts -->
    
</body>
</html>
