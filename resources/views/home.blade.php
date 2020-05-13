@extends('layouts.app')

@section('title', 'Главная')

@section('content')
  <div style="width: 100vw; height: 100vh;" class="align-items-center d-flex">
    <img src="{{ asset('/img/hero.jpg') }}" alt="hero" class="h-100 w-100 position-absolute" style="object-fit: cover">
    <div class="container-fluid p-0 m-0">
      <div class="row w-100 justify-content-center">
        <div class="col-12">
          <h1 class="text-center text-white text-uppercase font-weight-bolder">Экспертное оценивание</h1>
        </div>
        <div class="col-12">
          <h3 class="text-center text-white">Мониторинг показателей качества жизни населения</h3>
        </div>
        <div class="col-auto mt-5">
          <a class="btn btn-danger text-uppercase rounded-0" href="{{ route('expert') }}">Пройти</a>
        </div>
      </div>
    </div>
  </div>
@endsection
