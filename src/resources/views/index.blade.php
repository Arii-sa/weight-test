@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
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


<div class="admin">
  <div class="top-box">
    <div class="top-box__left">目標体重</div>
    <div class="top-box__center">目標まで</div>
    <div class="top-box__right">最新体重</div>
  </div>
  <div class="admin__inner">
    <div class="admin__left">
    <form class="search-form" action="/weight_logs/search" method="get">
      @csrf
      <input class="search-form__date" type="date" name="date" value="{{request('date')}}">
      <div class="search-form__actions">
        <input class="search-form__search-btn btn" type="submit" value="検索">
      </div>
    </form>
    </div>

    <div class="admin__right">
            <a href="#modal" class="modal-add-button">データ追加</a>
        <div class="modal" id="modal">
        <div class="modal-wrapper">
        <a href="#" class="close">&times;</a>

        <div class="modal-content">
            <h3>Weight Logを追加</h3>

            <div class="form__input--text">
            <div class="form__group-title">
                <span class="form__label--item">日付</span>
            </div>
            <input type="date" name="date" value="{{ old('date') }}" />
            </div>
            <div class="form__error">
            @error('date')
            {{ $message }}
            @enderror
            </div>

            <div class="form__input--text">
            <div class="form__group-title">
                <span class="form__label--item">体重</span>
            </div>
            <input type="text" name="weight" value="{{ old('weight') }}" />
            </div>
            <div class="form__error">
            @error('weight')
            {{ $message }}
            @enderror
            </div>

            <div class="form__input--text">
            <div class="form__group-title">
                <span class="form__label--item">摂取カロリー</span>
            </div>
            <input type="text" name="calories" value="{{ old('calories') }}" />
            </div>
            <div class="form__error">
            @error('calories')
            {{ $message }}
            @enderror
            </div>

            <div class="form__input--text">
            <div class="form__group-title">
                <span class="form__label--item">運動時間</span>
            </div>
            <input type="text" name="exercise_time" value="{{ old('exercise_time') }}" />
            </div>
            <div class="form__error">
            @error('exercise_time')
            {{ $message }}
            @enderror
            </div>

            <div class="form__input--text">
            <div class="form__group-title">
                <span class="form__label--item">運動内容</span>
            </div>
            <textarea name="textarea" cols="30" rows="3"></textarea>
            </div>
            <div class="form__error">
            @error('weight_content')
            {{ $message }}
            @enderror
            </div>

    </div>
  </div>

    </div>

    <table class="admin__table">
      <tr class="admin__row">
        <th class="admin__label">日付</th>
        <th class="admin__label">体重</th>
        <th class="admin__label">食事摂取カロリー</th>
        <th class="admin__label">運動時間</th>
        <th class="admin__label"></th>
      </tr>
      @foreach($weight_logs as $weight_log)
      <tr class="admin__row">
        <td class="admin__data">{{$weight_log->date}}</td>
        <td class="admin__data">{{$weight_log->weight}}</td>
        <td class="admin__data">{{$weight_log->calories}}</td>
        <td class="admin__data">{{$weight_log->exercise_time}}</td>
        <td class="admin__data">
          <a class="admin__detail-btn" href="#{{$weight_log->id}}">詳細</a>
        </td>
      </tr>

      <div class="modal" id="{{$weight_log->id}}">
        <a href="#!" class="modal-overlay"></a>
        <div class="modal__inner">
          <div class="modal__content">
            <form class="modal__detail-form" action="/weight_logs/{:weightLogId}/update" method="post">
              @csrf
              <div class="modal-form__group">
                <label class="modal-form__label" for="">日付</label>
                <p>{{$weight_log->date}}</p>
              </div>

              <div class="modal-form__group">
                <label class="modal-form__label" for="">体重</label>
                <p>{{$weight_log->weight}}</p>
              </div>

              <div class="modal-form__group">
                <label class="modal-form__label" for="">摂取カロリー</label>
                <p>{{$weight_log->calories}}</p>
              </div>

              <div class="modal-form__group">
                <label class="modal-form__label" for="">運動時間</label>
                <p>{{$weight_log->exercise_time}}</p>
              </div>

              <div class="modal-form__group">
                <label class="modal-form__label" for="">運動内容</label>
                <p>{{$weight_log->exercise_content}}</p>
              </div>

              <input type="hidden" name="id" value="{{ $weight_log->id }}">
              <input class="modal-form__update-btn btn" type="submit" value="更新">

            </form>
          </div>

          <a href="#" class="modal__close-btn">戻る</a>
        </div>
      </div>
      @endforeach
    </table>
  </div>
</div>

</div>
@endsection

