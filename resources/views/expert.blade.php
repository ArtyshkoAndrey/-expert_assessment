@extends('layouts.app')

@section('title', 'Экспертное оценивание')

@section('content')
  <div class="container-fluid bg-white pb-2 pt-2">
    <div class="row">
      <div class="col-12">
        <i class="fas fa-envelope p-2 bg-white rounded-circle shadow-sm ml-md-3" style="font-size: 16px"></i> ALEXIN.2018@STUD.NTSU.RU
      </div>
    </div>
  </div>
  <nav class="navbar navbar-expand-md navbar-light bg-white border-bottom border-top px-3">
    <div class="container">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <!-- Left Side Of Navbar -->
        <ul class="navbar-nav mr-auto"></ul>

        <!-- Right Side Of Navbar -->
        <ul class="navbar-nav ml-auto">
          <!-- Authentication Links -->
          <li class="nav-item mx-3">
            <a class="nav-link text-uppercase" href="{{ route('index') }}">Главная</a>
          </li>
          <li class="nav-item mx-3">
            <a class="nav-link text-uppercase" href="{{ route('expert') }}">Экспертное оценивание</a>
          </li>
          <li class="nav-item">
            <a class="nav-link btn btn-danger rounded-0 shadow-sm text-white" href="{{ route('login') }}">Кабинет админисратора</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <div class="container-fluid m-0 pt-5 bg-white">
    <div class="row d-flex justify-content-center">
      <div class="col-md-10">
        <h3 class="font-weight-bolder text-center">Уважаемые эксперты, предлагаем Вам принять участие в опросе!</h3>
        <hr>
      </div>
      <div class="col-md-10">
        <p class="text-muted mb-0">В данном исследовании проводится мониторинг показателей качества жизни населения в городе Новосибирск.
          Мониторинг проводится для оценки уровня благосостояния населения по перечню показателей.
          Все рассматриваемые показатели качества разбиты по направлениям «цифрового города».</p>
        <p class="text-muted mb-0">Имея результаты экспертного оценивания, мы сможем рассчитать уровень благосостояния жителей в городе, а также выявить отстающие направления.</p>
        <p class="text-muted">Результаты работы могут быть полезны для местной власти при планировании мероприятий,
          которые могут увеличить комфортность проживания для населения, а также для определения условий для привлечения денежных инвестиций.</p>
        <p class="text-muted mb-0">Ниже представлена анкета, которая представляет из себя таблицу,
          в подлежащем которой приводится перечень показателей качества, а в сказуемом – критерий, по которым эти показатели должны быть оценены</p>
        <p class="text-muted">В анкете требуется по шкале от 1 до 5 оценить: влияет показатель на группу показателей или нет. Где 1 – совсем не влияет, а 5 – оказывает максимальное влияние.</p>
      </div>
    </div>
  </div>
@endsection
