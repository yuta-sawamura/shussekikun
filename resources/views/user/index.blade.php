@extends('layouts.app')
@section('content')

<div id="content" class="main-content">
  <div class="layout-px-spacing">
    <div class="row layout-top-spacing layout-spacing">
      <div class="col-lg-12">
        <div class="breadcrumb-five">
          <ul class="breadcrumb">
            <li class="mb-2"><a href="{{ url('/') }}">ホーム</a></li>
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
          </div>
          <div class="widget-content widget-content-area">
            <div class="table-responsive mb-4 style-1">
              <div id="style-1_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">
                <div class="widget-content widget-content-area">
                  <form>
                    <div class="form-row">
                      @include('components.search.keyword', ['params' => $params])

                      @include('components.search.category', ['params' => $params, 'categories' => $categories])

                      @include('components.search.gender', ['params' => $params, 'genders' => $genders])

                    </div>
                    <button type="submit" class="btn btn-primary mt-3">検索する</button>
                  </form>
                </div>
                <div class="row">
                  <div class="col-sm-12">
                    <table id="style-1" class="table style-1 table-hover non-hover dataTable no-footer" role="grid" aria-describedby="style-1_info" style="table-layout: fixed; width: 100%;">
                      <thead>
                        <tr role="row">
                          <th style="width: 150px;">名前</th>
                          <th style="width: 60px;">画像</th>
                          <th style="width: 100px;">カテゴリー</th>
                          <th style="width: 60px;">性別</th>
                          <th style="width: 105px;"></th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($users as $user)
                          <tr role="row" class="odd">
                            <td>{{ $user->full_name }}<br>{{ $user->full_name_kana }}</td>
                            <td>
                              <a class="profile-img" href="javascript: void(0);">
                                <img alt="profile-img" src="{{ $user->S3_url }}">
                              </a>
                            </td>
                            <td>{{ $user->category->name ?? null }}</td>
                            <td>{{ $user->gender_name }}</td>
                            <td class="text-center">
                              <a href="{{ url("/user/show/{$user->id}") }}" class="btn btn-outline-primary">詳細</a>
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
