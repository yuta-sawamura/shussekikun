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
            <li class="mb-2"><a href="{{ url('/admin/user/aggregate') }}">ホーム</a></li>
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
                  <form action="{{url('/admin/user/index')}}">
                    <div class="form-row">
                      <div class="mb-2 col-md-3">
                        <label for="keyword">名前</label>
                        <input name="keyword" type="text" class="form-control" placeholder="キーワードを入力" value="{{ $params['keyword'] ?? null }}">
                      </div>
                      <div class="mb-2 col-md-3">
                        <label>店舗</label>
                        <select class="form-control" name="store">
                          <option selected="selected" value="">選択してください</option>
                          @foreach($stores as $k => $v)
                            <option value="{{ $k }}" {{ isset($params['store']) && $params['store'] == $k ? 'selected': null }}>
                              {{ $v }}
                            </option>
                          @endforeach
                        </select>
                      </div>
                      <div class="mb-2 col-md-3">
                        <label>カテゴリー</label>
                        <select class="form-control" name="category">
                          <option selected="selected" value="">選択してください</option>
                          @foreach($categories as $k => $v)
                            <option value="{{ $k }}" {{ isset($params['category']) && $params['category'] == $k ? 'selected': null }}>
                              {{ $v }}
                            </option>
                          @endforeach
                        </select>
                      </div>
                      <div class="mb-2 col-md-3">
                        <label>性別</label>
                        <select class="form-control" name="gender">
                          <option selected="selected" value="">選択してください</option>
                          @foreach($genders as $gender)
                            <option value="{{ $gender->value }}" {{ isset($params['gender']) && $params['gender'] == $gender->value ? 'selected': null }}>
                              {{ $gender->description }}
                            </option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                    <button type="submit" class="btn btn-primary mt-3">検索する</button>
                  </form>
                </div>
                <div class="row">
                  <div class="col-sm-12">
                    <table id="style-1" class="table style-1 table-hover non-hover dataTable no-footer" role="grid" aria-describedby="style-1_info" style="table-layout: fixed; width: 100%;">
                      <thead>
                        <tr role="row">
                          <th tabindex="0" aria-controls="style-1" rowspan="1" colspan="1" style="width: 150px;">名前</th>
                          <th tabindex="0" aria-controls="style-1" rowspan="1" colspan="1" style="width: 60px;">画像</th>
                          <th tabindex="0" aria-controls="style-1" rowspan="1" colspan="1" style="width: 130px;">権限</th>
                          <th tabindex="0" aria-controls="style-1" rowspan="1" colspan="1" style="width: 80px;">店舗</th>
                          <th tabindex="0" aria-controls="style-1" rowspan="1" colspan="1" style="width: 100px;">カテゴリー</th>
                          <th tabindex="0" aria-controls="style-1" rowspan="1" colspan="1" style="width: 60px;">性別</th>
                          <th tabindex="0" aria-controls="style-1" rowspan="1" colspan="1" style="width: 105px;"></th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($users as $user)
                          <tr role="row" class="odd">
                            <td>{{ $user->full_name }}<br>{{ $user->full_name_kana }}</td>
                            <td>
                              <a class="profile-img" href="javascript: void(0);">
                                <img alt="profile-img" src="{{ $user->getS3Url() }}">
                              </a>
                            </td>
                            <td>{{ App\Enums\User\Role::getDescription($user->role) }}</td>
                            <td>{{ $user->store->name ?? null }}</td>
                            <td>{{ $user->category->name ?? null }}</td>
                            <td>{{ App\Enums\User\Gender::getDescription($user->gender) }}</td>
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
                  <div class="col-sm-12 col-md-7">
                    <div class="dataTables_paginate paging_simple_numbers">
                      {{ $users->links() }}
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
</div>

@endsection()
