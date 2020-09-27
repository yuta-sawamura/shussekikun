@extends('layouts.admin.app')
@section('content')

<div id="content" class="main-content">
  @include('components.alerts.app')

  <div class="layout-px-spacing">
    <div class="row layout-top-spacing layout-spacing">
      <div class="col-lg-12">
        <div class="breadcrumb-five">
          <ul class="breadcrumb">
            <li class="mb-2"><a href="{{ url('/admin') }}">ホーム</a></li>
            <li class="active mb-2"><a href="">お知らせ一覧</a></li>
          </ul>
        </div>
        <div class="statbox widget box box-shadow">
          <div class="widget-header">
            <div class="row">
              <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                <h4>お知らせ一覧</h4>
              </div>
            </div>
          </div>
          <div class="widget-content widget-content-area">
            <div class="col-md-12 text-right">
              <a href="{{ url('/admin/news/create') }}" class="btn btn-outline-primary mb-2 mr-2">追加</a>
            </div>
            <div class="table-responsive mb-4 style-1">
              <div id="style-1_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">
                <div class="widget-content widget-content-area">
                  <form action="{{url('/admin/news')}}">
                    <div class="form-row">
                      @include('components.search.store', ['params' => $params, 'stores' =>$stores])
                      @include('components.search.keyword', ['params' => $params, 'name' => 'タイトル・本文'])
                    </div>
                    <button type="submit" class="btn btn-primary mt-3">検索する</button>
                  </form>
                </div>
                <div class="row">
                  <div class="col-sm-12">
                    <table id="style-1" class="table no-footer" role="grid" aria-describedby="style-1_info" style="table-layout: fixed; width: 100%;">
                      <thead>
                        <tr role="row">
                          <th style="width: 100px;">店舗</th>
                          <th style="width: 150px;">タイトル</th>
                          <th style="width: 120px;">更新日</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($news as $k => $v)
                          <tr role="row" class="odd clickable-row" data-href="{{ url('/admin/news/show/' . $v->id) }}">
                            <td>{{ $v->name }}</td>
                            <td>{{ $v->title }}</td>
                            <td>{{ $v->updated_at->format('Y-m-d') }}</td>
                          </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
                <div class="row">
                  @include('components.paginate', ['pagination' => $news])
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection

@section('js')
<script src="{{ asset('js/clickable.js') }}"></script>
@endsection
