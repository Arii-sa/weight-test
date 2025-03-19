@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/goal.css') }}">
@endsection

@section('content')
<header class="header">
    <div class="header__inner">
      <div class="header-utilities">
        <a class="header__logo" href="/">
          PiGLy
        </a>
        <nav>
          <ul class="header-nav">
            @if (Auth::check())
            <li class="header-nav__item">
              <a class="header-nav__link" href="/wight_logs/goal_setting">目標体重設定</a>
            </li>
            <li class="header-nav__item">
              <form class="form" action="/logout" method="post">
                @csrf
                <button class="header-nav__button">ログアウト</button>
              </form>
            </li>
            @endif
          </ul>
        </nav>
      </div>
    </div>
  </header>

  <div class="register-form__content">
<div class="register-form__inner">
  <div class="register-form__heading">
    <h2>目標体重設定</h2>
  </div>
  <form class="form" action="/register/step2" method="post">
    @csrf
    <div class="form__group">
      <div class="form__group-content">
        <div class="form__input--text">
          <input type="text" name="goal" value="{{ old('goal') }}" />
          kg
        </div>
        <div class="form__error">
          @error('goal')
          {{ $message }}
          @enderror
        </div>
      </div>
    </div>

    <div class="form__button">
      <button class="form__button-submit" type="submit" name="register">更新</button>
    </div>
  </form>
</div>
</div>
@endsection