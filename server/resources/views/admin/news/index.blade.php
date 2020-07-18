@extends('layouts.admin.app')
@section('content')

<div id="content" class="main-content">
  @component('components.alerts.app')
  @endcomponent
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
                      @component('components.search.keyword', ['params' => $params])
                      @endcomponent
                      @component('components.search.store', ['params' => $params, 'stores' =>$stores])
                      @endcomponent
                    </div>
                    <button type="submit" class="btn btn-primary mt-3">検索する</button>
                  </form>
                </div>
                @component('components.news.index', ['news' => $news, 'admin' => true])
                @endcomponent
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection()
