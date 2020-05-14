<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>Административная панель - @yield('title')</title>
  <link rel="shortcut icon" href="{{asset('favicon.ico')}}" type="image/x-icon">
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

  <!-- Fonts -->
  {{--  <link rel="dns-prefetch" href="//fonts.gstatic.com">--}}
  <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

  <!-- Styles -->
  <link rel="stylesheet" href="{{ asset('css/adminlte.min.css') }}">
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div id="app">
  <div class="wrapper">
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item d-none d-sm-inline-block">
          <a href="{{ route('index') }}" class="nav-link">Главная</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="{{ route('expert') }}" class="nav-link">Эксперное оценивание</a>
        </li>
      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <!-- Messages Dropdown Menu -->
        <li class="nav-item dropdown">
          <a class="nav-link" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            Выйти
          </a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
          </form>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="{{ route('home') }}" class="brand-link text-center">
        <span class="brand-text font-weight-light text-center w-100">Эксперное оценивание</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="info text-white font-weight-bolder text-center w-100">Пользователь - {{ auth()->user()->name }}</div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                 with font-awesome or any other icon font library -->
            <li class="nav-item">
              <a href="#" class="nav-link active">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Главная
                </p>
              </a>
            </li>
          </ul>
        </nav>
      </div>
    </aside>
  </div>
</div>
  <script src="{{ asset('js/app.js') }}"></script>
  <script src="{{ asset('js/adminlte.min.js') }}"></script>
</body>
</html>
