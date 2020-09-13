@extends('layouts.admin.app')
@section('content')

<div id="content" class="main-content">
  @component('components.alerts.app')
  @endcomponent
  <div class="layout-px-spacing">
    <div class="account-settings-container layout-top-spacing">
      <div class="breadcrumb-five">
        <ul class="breadcrumb">
          <li class="mb-2"><a href="{{ url('/admin') }}">ホーム</a></li>
          <li class="mb-2"><a href="{{ url('/admin/user/') }}">会員一覧</a></li>
          <li class="mb-2"><a href="{{ url('/admin/user/show/' . $user->id) }}">会員詳細</a></li>
          <li class="active mb-2"><a href="">会員編集</a></li>
        </ul>
      </div>
      <div class="account-content">
        <div class="scrollspy-example" data-spy="scroll" data-target="#account-settings-scroll" data-offset="-100">
          <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
              <form action="/admin/user/update/{{ $user->id }}" method="post" enctype="multipart/form-data" class="section general-info" onSubmit="return double()">
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

@component('components.modals.attention', ['title' => '関連データも全て削除されますが本当によろしいですか？', 'path' => '/admin/user/delete/' . $user->id, 'id' => $user->id])
@endcomponent

@endsection()

@section('js')
@include('admin.user._form_js');
<script src="{{ secure_asset('/plugins/dropify/dropify.min.js') }}"></script>
<script src="{{ secure_asset('/js/users/account-settings.js') }}"></script>
@endsection()
