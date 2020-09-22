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
            <li class="active mb-2"><a href="">会員一覧</a></li>
          </ul>
        </div>
        <div class="statbox widget box box-shadow">
          <div class="widget-header">
            <div class="row">
              <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                <h4>会員一覧</h4>
              </div>
            </div>
            <div class="col-md-12 text-right">
              <a href="{{ url('/admin/user/create') }}" class="btn btn-outline-primary">追加</a>
            </div>
          </div>
          <div class="widget-content widget-content-area">
            <div class="table-responsive mb-4 style-1">
              <div id="style-1_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">
                <div class="widget-content widget-content-area">
                  <form action="{{url('/admin/user')}}">
                    <div class="form-row">
                      @include('components.search.store', ['params' => $params, 'stores' => $stores])
                      @include('components.search.category', ['params' => $params, 'categories' => $categories])
                      @include('components.search.gender', ['params' => $params, 'genders' => $genders])
                      @include('components.search.keyword', ['params' => $params, 'name' => '名前'])
                    </div>
                    <button type="submit" class="btn btn-primary mt-3">検索する</button>
                  </form>
                </div>
                <div class="row">
                  <div class="col-sm-12">
                    <table id="style-1" class="table style-1 table-hover non-hover dataTable no-footer" role="grid" aria-describedby="style-1_info" style="table-layout: fixed; width: 100%;">
                      <thead>
                        <tr role="row">
                        <th style="width: 60px;">画像</th>
                          <th style="width: 150px;">名前</th>
                          <th style="width: 130px;">権限</th>
                          <th style="width: 80px;">店舗</th>
                          <th style="width: 100px;">カテゴリー</th>
                          <th style="width: 60px;">性別</th>
                          <th style="width: 105px;"></th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($users as $user)
                          <tr role="row" class="odd">
                            <td>
                              <div class="avatar avatar-xl">
                                <img alt="avatar" src="{{ $user->S3_url }}" class="rounded-circle" />
                              </div>
                            </td>
                            <td>{{ $user->full_name }}<br>{{ $user->full_name_kana }}</td>
                            <td>{{ $user->role_name }}</td>
                            <td>{{ $user->store->name ?? null }}</td>
                            <td>{{ $user->category->name ?? null }}</td>
                            <td>{{ $user->gender_name }}</td>
                            <td class="text-center">
                              <a href="{{ url("/admin/user/show/{$user->id}") }}" class="btn btn-outline-primary">詳細</a>
                            </td>
                          </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
                <div class="row">
                  @include('components.paginate', ['pagination' => $users])
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
