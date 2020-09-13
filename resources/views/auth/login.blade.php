@extends('layouts.user')
@section('content')

<div class="form-container outer">
  @component('components.alerts.app')
  @endcomponent
  <div class="form-form">
    <div class="form-form-wrap">
      <div class="form-container">
        <div class="form-content">
          <h1>ログイン</h1>
          <div class="field-wrapper my-2">
            <a href="#" onclick="submitLogin('organization_admin')" type="button" class="btn btn-info w-100 mb-1">ゲスト管理者ログイン</a>
            <a href="#" onclick="submitLogin('store_share')" type="button" class="btn btn-info w-100">ゲスト会員ログイン</a>
          </div>
          <form method="POST" action="{{ route('login') }}" id="login" class="text-left" onSubmit="return double()">
            @csrf
            <div class="form">
              <div id="username-field" class="field-wrapper input">
                <label for="username">メールアドレス<span class="text-danger">*</span></label>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user">
                  <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                  <polyline points="22,6 12,13 2,6"></polyline>
                </svg>
                <input name="email" type="email" class="form-control @error('email') is-invalid @enderror" placeholder="text@gmail.com" value="{{ old('email') }}" autocomplete="email" autofocus required>
                @component('components.validations.feedback', ['message' => 'email'])
                @endcomponent
              </div>
              <div id="password-field" class="field-wrapper input mb-2">
                <div class="d-flex justify-content-between">
                  <label for="password">パスワード<span class="text-danger">*</span></label>
                </div>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-lock">
                  <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
                  <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                </svg>
                <input name="password" type="password" class="form-control @error('password') is-invalid @enderror" autocomplete="current-password" required>
                @component('components.validations.feedback', ['message' => 'password'])
                @endcomponent
              </div>
              <div class="form-group row">
                <div class="col-md-6 offset-md-4">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                    <label class="form-check-label" for="remember">
                      入力情報を保持する
                    </label>
                  </div>
                </div>
              </div>
              <div class="d-sm-flex justify-content-between">
                <div class="field-wrapper">
                  <button type="submit" class="btn btn-primary">ログイン</button>
                </div>
              </div>
              <p class="signup-link"><a href="{{ url('password/reset') }}">パスワードリセット</a></p>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<script src="{{ secure_asset('/js/submit_login.js') }}"></script>
<script src="{{ secure_asset('js/double.js') }}"></script>

@endsection
