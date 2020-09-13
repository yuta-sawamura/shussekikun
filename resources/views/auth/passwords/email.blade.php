@extends('layouts.user')
@section('content')

<div class="form-container outer">
  @if (session('status'))
    <div class="alert alert-light-info mb-4" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x close" data-dismiss="alert">
          <line x1="18" y1="6" x2="6" y2="18"></line>
          <line x1="6" y1="6" x2="18" y2="18"></line>
        </svg>
      </button>
      {{ session('status') }}
    </div>
  @endif
  <div class="form-form">
    <div class="form-form-wrap">
      <div class="form-container">
        <div class="form-content">
          <h1 class="">パスワードリセット</h1>
          <form method="POST" action="{{ route('password.email') }}" class="text-left" onSubmit="return double()">
            @csrf
            <div class="form">
              <div id="username-field" class="field-wrapper input">
                <label for="email">メールアドレス<span class="text-danger">*</span></label>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user">
                  <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                  <polyline points="22,6 12,13 2,6"></polyline>
                </svg>
                <input id="email" name="email" type="email" value="{{ $email ?? old('email') }}" class="form-control @error('email') is-invalid @enderror" placeholder="text@gmail.com" required autocomplete="email" autofocus>
                @component('components.validations.feedback', ['message' => 'email'])
                @endcomponent
              </div>
              <div class="d-sm-flex justify-content-between">
                <div class="field-wrapper">
                  <button type="submit" class="btn btn-primary">送信</button>
                </div>
              </div>
              <p class="signup-link"><a href="{{ url('login') }}">ログイン</a></p>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<script src="{{ secure_asset('js/double.js') }}"></script>

@endsection
