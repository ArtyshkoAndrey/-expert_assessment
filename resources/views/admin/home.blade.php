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
                $countRatings = App\Rating::count() > 0;
              @endphp
              @if ($countRatings)
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
                      <td>{{ $q->ratings()->count() > 0 ? round(($q->ratings()->get()->sum('mark') / $q->ratings()->count()) * 20 / 100, 2) : 0}}</td>
                    </tr>
                    @php
                      $count++;
                    @endphp
                  @endforeach
                @endforeach
              @else
                <tr class="font-weight-bolder text-center">
                  <td colspan="3">Нет данных</td>
                </tr>
              @endif
              </tbody>
            </table>
            <form action="{{ route('clearMarks') }}" method="POST">
              @csrf
              <button type="submit" class="btn btn-danger text-white text-center rounded-0 mt-3 mr-auto ml-auto d-block">Сброс данных</button>
            </form>
          </div>
        </div>
      </div>
      <div class="col-md-8">
        <div class="card">
          <div class="card-body">
            <table class="table table-bordered pb-5">
              <thead>
              <tr class="font-weight-bolder text-center">
                <th scope="col">Направления «цифрового города»</th>
                <th scope="col">Комплексная оценка</th>
              </tr>
              </thead>
              <tbody>
              @if ($countRatings)
                @foreach($groups as $group)
                  <tr class="text-center">
                    <td>{{ $group->name }}</td>
                    <td>{{ $Ak[$group->id] }}</td>
                  </tr>
                @endforeach
                  <tr class="font-weight-bolder text-center">
                    <td>Интегральная оценка</td>
                    <td>{{ $C0 }}</td>
                  </tr>
              @else
                <tr class="font-weight-bolder text-center">
                  <td colspan="2">Нет данных</td>
                </tr>
              @endif
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal -->
  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Уведомление</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          {{ session('status') }}
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('js')
  <script !src="">
    @if(session('message'))
    $('#myModal').modal('show')
    @endif
  </script>
@endsection
