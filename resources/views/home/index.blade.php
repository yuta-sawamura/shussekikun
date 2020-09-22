@extends('layouts.app')
@section('content')

<div id="content" class="main-content">
  @include('components.alerts.app')

  <div class="layout-px-spacing">
    <div class="row layout-top-spacing layout-spacing">
      <div class="col-lg-12">
        <div class="breadcrumb-five">
          <ul class="breadcrumb">
            <li class="active mb-2"><a href="">ホーム</a></li>
          </ul>
        </div>
        <div class="statbox widget box box-shadow">
          <div class="widget-header">
            <div class="row">
              <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                <h4>出席会員一覧</h4>
              </div>
            </div>
          </div>
          <div class="widget-content widget-content-area">
            <div class="table-responsive mb-4 style-1">
              <div id="style-1_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">
                <div class="widget-content widget-content-area">
                  <form>
                    <div class="form-row">
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
                          @can('organization-admin-higher')
                          <th style="width: 30px;"></th>
                          @endcan
                          <th style="width: 80px;">画像</th>
                          <th style="width: 150px;">名前</th>
                          <th style="width: 110px;">カテゴリー</th>
                          <th style="width: 60px;">性別</th>
                          @can('share')
                          <th style="width: 105px;"></th>
                          @endcan
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($users as $user)
                          <tr role="row" class="odd">
                            @can('organization-admin-higher')
                            <td class="checkbox-column sorting_1"><label class="new-control new-checkbox checkbox-outline-primary  m-auto">
                                <input type="checkbox" name="check" class="new-control-input child-chk select-customers-info" id="checkbox-{{ $user->id }}">
                                <span class="new-control-indicator"></span><span style="visibility:hidden">c</span>
                              </label>
                            </td>
                            @endcan
                            <td>
                              <div class="avatar avatar-xl">
                                <img alt="avatar" src="{{ $user->S3_url }}" class="rounded-circle" />
                              </div>
                            </td>
                            <td>{{ $user->full_name }}<br>{{ $user->full_name_kana }}</td>
                            <td>{{ $user->category->name ?? null }}</td>
                            <td>{{ $user->gender_name }}</td>
                            @can('share')
                            <td class="text-center">
                              <div class="dropdown custom-dropdown">
                                <div class="text-center">
                                  <button type="button" class="btn btn-primary mb-2 mr-2" data-toggle="modal" data-target="#attendanceModal{{ $user->id }}">
                                    出席
                                  </button>
                                </div>
                              </div>
                            </td>
                            @endcan
                            <input type="hidden" name="full_name" value="{{ $user->full_name }}">
                            <input type="hidden" name="user_id" value="{{ $user->id }}">
                          </tr>
                          @include('components.modals.attendance', ['user' => $user, 'url' => '/attendance/store'])
                        @endforeach
                      </tbody>
                    </table>
                    @can('organization-admin-higher')
                    <button type="button" id="attendanceMultiple" class="float-right btn btn-primary mb-2 mr-2" data-toggle="modal" data-target="#attendanceMultipleModal">
                      一括出席
                    </button>
                    @endcan
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

@include('components.modals.attendanceMultiple')

@section('js')
<script src="{{ asset('/js/attendance_multiple.js') }}"></script>
@endsection()

@endsection()
