@extends('layouts.admin.app')
@section('content')

<div id="content" class="main-content">
  @include('components.alerts.app')

  <div class="layout-px-spacing">
    <div class="account-settings-container layout-top-spacing">
      <div class="breadcrumb-five">
        <ul class="breadcrumb">
          <li class="mb-2"><a href="{{ url('/admin') }}">ホーム</a></li>
          <li class="mb-2"><a href="{{ url('/admin/user/') }}">会員一覧</a></li>
          <li class="mb-2"><a href="{{ url('/admin/user/show', $user) }}">会員詳細</a></li>
          <li class="active mb-2"><a href="">会員編集</a></li>
        </ul>
      </div>
      <div class="account-content">
        <div class="scrollspy-example" data-spy="scroll" data-target="#account-settings-scroll" data-offset="-100">
          <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
              <form action="/admin/user/update/{{ $user->id }}" method="post" enctype="multipart/form-data" class="section general-info">
                @csrf
                <div class="info">
                  <h6>会員編集</h6>
                  @include('admin.user._form', ['isEdit' => true])
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection

@section('js')
@include('admin.user._form_js');
<script src="{{ asset('/plugins/dropify/dropify.min.js') }}"></script>
<script src="{{ asset('/js/users/account-settings.js') }}"></script>
@endsection
