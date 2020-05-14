@extends('layouts.app')

@section('content')
<div class="container-fluid" style="height: 100vh; width: 100vw;">
  <div class="row h-100 justify-content-center align-items-center">
    <div class="col-xl-4 col-md-6 shadow-sm p-0">
      <div class="card">
        <div class="card-header bg-white text-center font-weight-bolder border-0"><h3>Кабинет <br> администратора</h3></div>

          <div class="card-body">
            <form method="POST" action="{{ route('login') }}">
              @csrf

              <div class="form-group">
                <input id="email" type="email" placeholder="Логин" class="w-100 form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                @error('email')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>

              <div class="form-group">
                <input id="password" type="password" placeholder="Пароль" class="form-control w-100 @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                @error('password')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>

              <div class="form-group mb-0">
                <button type="submit" class="btn btn-danger text-white font-weight-bolder rounded-0 w-100">
                  Войти
                </button>
              </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
