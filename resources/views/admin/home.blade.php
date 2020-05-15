@extends('admin.layouts.app')

@section('title', 'Главная')

@section('nameHeader', 'Главная')

@section('content')
  <div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
          <span class="info-box-icon bg-info"><i class="fas fa-plus"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Кол-во оцениванивавших</span>
            <span class="info-box-number">{{ App\Question::first()->ratings()->count() }}</span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>

      <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
          <span class="info-box-icon bg-success"><i class="fas fa-question"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Кол-во вопросов</span>
            <span class="info-box-number">{{ App\Question::count() }}</span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
    </div>
  </div>

  <div class="container-fluid">
    <div class="row justify-content-center align-items-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-body">
            <table class="table table-bordered pb-5">
              <thead>
              <tr class="font-weight-bolder text-center">
                <th colspan="2" scope="col">Блоки потенциала «цифрового города»</th>
                <th colspan="1" scope="col">Оценка</th>
              </tr>
              </thead>
              <tbody>
              @php
                $count = 1;
              @endphp
              @foreach(App\Group::all() as $i=>$group)
                <tr class="font-weight-bolder group-header">
                  @if($i === 0)
                    <th scope="row" class="text-center" width="50px">№</th>
                  @else
                    <th scope="row" class="text-center" width="50px"></th>
                  @endif
                  <td colspan="2">{{ $group->name }}</td>
                </tr>
                @foreach($group->questions as $j=>$q)
                  <tr>
                    <th scope="row" class="text-center">{{ $count }}</th>
                    <td>{{ $q->name }}</td>
                    <td>{{ $q->ratings()->count() > 0 ? $q->ratings()->get()->sum('mark') / $q->ratings()->count() : 0}}</td>
                  </tr>
                  @php
                    $count++;
                  @endphp
                @endforeach
              @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
