@extends('layouts.user')
@section('content')

<div class="form-container outer">
  <div class="form-form">
    <div class="form-form-wrap">
      <div class="form-container">
        <div class="form-content">
          <h1 class="">パスワード再発行</h1>
          <form class="text-left">
            <div class="form">
              <div id="username-field" class="field-wrapper input">
                <label for="username">メールアドレス</label>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user">
                  <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                  <polyline points="22,6 12,13 2,6"></polyline>
                </svg>
                <input id="username" name="username" type="text" class="form-control" placeholder="text@gmail.com">
              </div>
              <div class="d-sm-flex justify-content-between">
                <div class="field-wrapper">
                  <button type="submit" class="btn btn-primary" value="">再発行</button>
                </div>
              </div>
              <p class="signup-link"><a href="{{ url('/') }}">トップ</a></p>
              <p class="signup-link"> <a href="{{ url('user/login') }}">ログイン</a></p>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
