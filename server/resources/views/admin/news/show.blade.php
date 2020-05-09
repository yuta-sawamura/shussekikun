@extends('layouts.admin.app')
@section('content')

<div id="content" class="main-content">
  <div class="layout-px-spacing">
    <div class="row layout-top-spacing layout-spacing">
      <div class="col-lg-12">
        <div class="breadcrumb-five">
          <ul class="breadcrumb">
            <li class="mb-2"><a href="{{ url('/admin/user/aggregate') }}">ホーム</a></li>
            <li class="mb-2"><a href="{{ url('/admin/news/') }}">お知らせ一覧</a></li>
            <li class="active mb-2"><a href="">お知らせ詳細</a></li>
          </ul>
        </div>
        <div class="statbox widget box box-shadow">
          <div class="widget-header">
            <div class="row">
              <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                <h4>お知らせ詳細</h4>
              </div>
            </div>
          </div>
          <div class="widget-content widget-content-area">
            <div class="col-md-12 text-right mb-4">
              <a href="{{ url('/admin/news/edit') }}" class="btn btn-outline-primary">編集</a>
            </div>
            <h5 class="mb-4">休館のお知らせ</h5>
            <div class="table-responsive mb-4 style-1">
              <div id="style-1_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">
                <div class="row">
                  <div class="ql-editor" data-gramm="false" contenteditable="true" data-placeholder="Compose an epic...">
                    <p>責任者が体調不良のため、4月22日~5月31日まで<strong>休館</strong>です。</p>
                    <p>詳細は<span style="color: rgb(81, 83, 101);">改めて</span><u>メール</u>でもお送りしますのでご確認ください。</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection()
