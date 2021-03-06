<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/navbar-fixed-side.css')}}">
</head>
<body>
  <div id="app">
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
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
                    <li><a href="{{route('reservation.create')}}">Reservate</a></li>
                    <li>
                      <a id="cart-id" href="{{route('cart')}}">Cart&nbsp(<span style="line-height: 22px;">
                      @if (Session::has('cart'))
                        {{Session::get('cart')->totalQty}}
                      @else
                        0
                      @endif
                      </span>)
                      </a>
                    </li>
                    <li><a href="{{route('order')}}">Orders</a></li>
                </ul>

                <!-- Right Side Of Navbar -->

                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @guest
                        <li><a href="{{ route('login') }}">Login</a></li>
                        <li><a href="{{ route('register') }}">Register</a></li>
                    @else
                        <form class="navbar-form navbar-left" role="search" action="{{route('search')}}" method="post">
                          {{ csrf_field() }}
                          <div class="form-group">
                            <input class="form-control" placeholder="Dish title" type="text" name="title" value="">
                          </div>
                          <div class="form-group">
                            <select class="form-control" name="menu_id">
                              @foreach($menus as $menu)
                                <option value="{{$menu->id}}">{{$menu->title}}</option>
                              @endforeach
                            </select>
                          </div>
                          <div class="form-group">
                            <select class="form-control" name="price">
                              <option value="0-5">0-5</option>
                            </select>
                          </div>
                          <button type="submit" class="btn btn-default">Search</button>
                        </form>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu">
                                <li>
                                    @if (Auth::user()->admin)
                                    <a href="{{route('admin')}}">Admin panel</a>
                                    @endif
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
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
    @yield('content')
  </div>
<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
