@extends('layouts.admin.app')
@section('content')

<div id="content" class="main-content">
  @include('components.alerts.app')
  <div class="layout-px-spacing">
    <div id="basic" class="row layout-spacing  layout-top-spacing">
      <div class="col-lg-12">
        <div class="breadcrumb-five">
          <ul class="breadcrumb">
            <li class="mb-2"><a href="{{ url('/admin') }}">ホーム</a></li>
            <li class="mb-2"><a href="{{ url('/admin/news/') }}">お知らせ一覧</a></li>
            <li class="mb-2"><a href="{{ url('/admin/news/show', $news) }}">お知らせ詳細</a></li>
            <li class="active mb-2"><a href="">お知らせ編集</a></li>
          </ul>
        </div>
        <div class="statbox widget box box-shadow">
          <div class="widget-header">
            <div class="row">
              <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                <h4>お知らせ編集</h4>
              </div>
            </div>
          </div>
          <div class="widget-content widget-content-area">
            @include('admin.news._form', ['isEdit' => true])
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection

@section('js')
<script src="{{ asset('/plugins/editors/markdown/simplemde.min.js') }}"></script>
<script src="{{ asset('/plugins/editors/markdown/custom-markdown.js') }}"></script>
@endsection
