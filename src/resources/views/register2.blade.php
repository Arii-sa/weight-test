@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/register2.css') }}">
@endsection

@section('content')
<div class="register-form__content">
<div class="register-form__inner">
  <div class="register-form__heading">
    <h2>PiGLy</h2>
    <h4>新規会員登録</h4>
    <p class="top-step2">STEP2 体重データの入力</p>
  </div>
  <form class="form" action="/register/step2" method="post">
    @csrf
    <div class="form__group">
      <div class="form__group-title">
        <span class="form__label--item">現在の体重</span>
      </div>
      <div class="form__group-content">
        <div class="form__input--text">
          <input type="text" name="weight" value="{{ old('weight') }}">
          kg
        </div>
        <div class="form__error">
          @error('weight')
          {{ $message }}
          @enderror
        </div>
      </div>
    </div>
    <div class="form__group">
      <div class="form__group-title">
        <span class="form__label--item">目標の体重</span>
      </div>
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
      <button class="form__button-submit" type="submit" name="register">アカウント作成</button>
    </div>
  </form>
</div>
</div>
@endsection
