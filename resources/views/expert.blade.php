@extends('layouts.app')

@section('title', 'Экспертное оценивание')

@section('content')
  <div class="container-fluid bg-white pb-2 pt-2">
    <div class="row">
      <div class="col-12 text-uppercase">
        <i class="fas fa-envelope p-2 bg-white rounded-circle shadow-sm ml-md-3" style="font-size: 16px"></i> aleksin.2018@STUD.NTSU.RU
      </div>
    </div>
  </div>
  <nav class="navbar navbar-expand navbar-light bg-white border-bottom border-top mx-3">
    <div class="container">
      <div class="collapse navbar-collapse d-flex justify-content-center justify-content-sm-start" id="navbarSupportedContent">
        <!-- Right Side Of Navbar -->
        <ul class="navbar-nav ml-sm-auto">
          <!-- Authentication Links -->
          <li class="nav-item mx-3">
            <a class="nav-link text-uppercase" href="{{ route('index') }}">Главная</a>
          </li>
          <li class="nav-item mx-3">
            <a class="nav-link text-uppercase active" href="{{ route('expert') }}">Экспертное оценивание</a>
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
      <div class="col-md-10 col-xl-8">
        <h3 class="font-weight-bolder text-center">Уважаемые эксперты, предлагаем Вам принять участие в опросе!</h3>
        <hr>
      </div>
      <div class="col-md-10 col-xl-8">
        <p class="text-muted mb-0 pl-5">В данном исследовании проводится мониторинг показателей качества жизни населения в городе Новосибирск.
          Мониторинг проводится для оценки уровня благосостояния населения по перечню показателей.
          Все рассматриваемые показатели качества разбиты по направлениям «цифрового города».</p>
        <p class="text-muted mb-0 pl-5">Имея результаты экспертного оценивания, мы сможем рассчитать уровень благосостояния жителей в городе, а также выявить отстающие направления.</p>
        <p class="text-muted pl-5">Результаты работы могут быть полезны для местной власти при планировании мероприятий,
          которые могут увеличить комфортность проживания для населения, а также для определения условий для привлечения денежных инвестиций.</p>
        <p class="text-muted mb-0 pl-5">Ниже представлена анкета, которая представляет из себя таблицу,
          в подлежащем которой приводится перечень показателей качества, а в сказуемом – критерий, по которым эти показатели должны быть оценены</p>
        <p class="text-muted pl-5">В анкете требуется по шкале от 1 до 5 оценить: влияет показатель на группу показателей или нет. Где 1 – совсем не влияет, а 5 – оказывает максимальное влияние.</p>
        <hr>
      </div>
    </div>
  </div>
  <div class="container-fluid m-0 pt-5 bg-white pb-5 mb-5">
    <div class="row d-flex justify-content-center">
      <div class="col-md-10 col-xl-8">
        <form action="{{ route('getMarks') }}" method="POST">
          @csrf
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
                    <td class="input"><input value="3" id="{{ $q->id }}" name="{{ $q->id }}" size="1" type="number" min="1" max="5" required class="rounded-0 border-light form-control"></td>
                  </tr>
                  @php
                    $count++;
                  @endphp
                @endforeach
              @endforeach
            </tbody>
          </table>
          <button class="btn btn-danger ml-auto mr-auto d-block rounded-0 text-white text-center">Отправить</button>
        </form>
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
  <script>
    @if(session('status'))
    $('#myModal').modal('show')
    @endif
  </script>

@endsection
