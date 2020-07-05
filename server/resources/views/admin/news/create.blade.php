@extends('layouts.admin.app')
@section('content')

<div id="content" class="main-content">
  <div class="layout-px-spacing">
    <div id="basic" class="row layout-spacing  layout-top-spacing">
      <div class="col-lg-12">
        <div class="breadcrumb-five">
          <ul class="breadcrumb">
            <li class="mb-2"><a href="{{ url('/admin') }}">ホーム</a></li>
            <li class="mb-2"><a href="{{ url('/admin/news/') }}">お知らせ一覧</a></li>
            <li class="active mb-2"><a href="">お知らせ追加</a></li>
          </ul>
        </div>
        <div class="statbox widget box box-shadow">
          <div class="widget-header">
            <div class="row">
              <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                <h4> お知らせ追加 </h4>
              </div>
            </div>
          </div>
          <div class="widget-content widget-content-area">
            <form action="/admin/news/store" method="post">
              @csrf
              <div class="form-group col-xl-4 col-md-12 col-sm-12 col-12">
                <label>店舗</label>
                <select class="form-control @error('store_id') is-invalid @enderror" name="store_id">
                  <option selected="selected" value="">選択してください</option>
                  @foreach($stores as $k => $v)
                    <option value="{{ $k }}" {{ old('store_id') == $k || isset($user->store_id) && $user->store_id == $k ? 'selected': '' }}>
                      {{ $v }}
                    </option>
                  @endforeach
                </select>
                @component('components.validations.feedback', ['message' => 'store_id'])
                @endcomponent
              </div>
              <div class="form-group col-xl-4 col-md-12 col-sm-12 col-12">
                <label>タイトル</label>
                <input type="text" name="title" class="form-control @error('title') is-invalid @enderror">
                @component('components.validations.feedback', ['message' => 'title'])
                @endcomponent
              </div>
              <div class="form-group col-xl-10 col-md-12 col-sm-12 col-12">
                <label>本文</label>
                <textarea name="content" id="news-content"></textarea>
                @component('components.validations.feedback', ['message' => 'content'])
                @endcomponent
              </div>
              <div class="col-xl-10 col-md-12 col-sm-12 col-12 text-right">
                <button type="submit" class="btn btn-primary mb-2 mt-5">保存</button>
              </div>
            </form>
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
@endsection()
