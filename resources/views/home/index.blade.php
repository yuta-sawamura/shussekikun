@extends('layouts.app')
@section('content')

<div id="content" class="main-content">
  @component('components.alerts.app')
  @endcomponent
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
                      @component('components.search.keyword', ['params' => $params])
                      @endcomponent
                      @component('components.search.category', ['params' => $params, 'categories' => $categories])
                      @endcomponent
                      @component('components.search.gender', ['params' => $params, 'genders' => $genders])
                      @endcomponent
                    </div>
                    <button type="submit" class="btn btn-primary mt-3">検索する</button>
                  </form>
                </div>

                <div class="row">
                  <div class="col-sm-12">
                    <table id="style-1" class="table style-1 table-hover non-hover dataTable no-footer" role="grid" aria-describedby="style-1_info" style="table-layout: fixed; width: 100%;">
                      <thead>
                        <tr role="row">
                          <th style="width: 30px;"></th>
                          <th style="width: 150px;">名前</th>
                          <th style="width: 80px;">画像</th>
                          <th style="width: 110px;">カテゴリー</th>
                          <th style="width: 60px;">性別</th>
                          <th style="width: 105px;"></th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($users as $user)
                          <tr role="row" class="odd">
                            <td class="checkbox-column sorting_1"><label class="new-control new-checkbox checkbox-outline-primary  m-auto">
                                <input type="checkbox" name="check" class="new-control-input child-chk select-customers-info" id="checkbox-{{ $user->id }}">
                                <span class="new-control-indicator"></span><span style="visibility:hidden">c</span>
                              </label>
                            </td>
                            <td>{{ $user->full_name }}<br>{{ $user->full_name_kana }}</td>
                            <td>
                              <a class="profile-img" href="javascript: void(0);">
                                <img alt="profile-img" src="{{ $user->S3_url }}">
                              </a>
                            </td>
                            <td>{{ $user->category->name ?? null }}</td>
                            <td>{{ $user->gender_name }}</td>
                            <td class="text-center">
                              <div class="dropdown custom-dropdown">
                                <div class="text-center">
                                  <button type="button" class="btn btn-primary mb-2 mr-2" data-toggle="modal" data-target="#attendanceModal{{ $user->id }}">
                                    出席
                                  </button>
                                </div>
                              </div>
                            </td>
                            <input type="hidden" name="full_name" value="{{ $user->full_name }}">
                            <input type="hidden" name="user_id" value="{{ $user->id }}">
                          </tr>
                          @include('components.modals.attendance', ['user' => $user, 'url' => '/attendance/store'])
                        @endforeach
                      </tbody>
                    </table>
                    <button type="button" id="attendanceMultiple" class="float-right btn btn-primary mb-2 mr-2" data-toggle="modal" data-target="#attendanceMultipleModal">
                      一括出席
                    </button>
                  </div>
                </div>
                <div class="row">
                  @component('components.paginate', ['pagination' => $users])
                  @endcomponent
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
