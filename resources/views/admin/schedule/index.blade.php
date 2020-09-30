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
            <li class="active mb-2"><a href="">スケジュール一覧</a></li>
          </ul>
        </div>
        <div class="statbox widget box box-shadow">
          <div class="widget-header">
            <div class="row">
              <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                <h4>スケジュール一覧</h4>
              </div>
            </div>
          </div>
          <div class="widget-content widget-content-area">
            <div class="col-md-12 text-right">
              <a class="btn btn-outline-primary mb-2 mr-2" href="{{ url('admin/schedule/create') }}" role="button">追加</a>
            </div>
            <div class="table-responsive mb-4 style-1">
              <div id="style-1_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">
                <div class="widget-content widget-content-area">
                  <form action="{{url('/admin/schedule')}}">
                    <div class="form-row">
                      @include('components.search.store', ['params' => $params, 'stores' => $stores])
                      @include('components.search.classwork', ['params' => $params, 'classworks' => $classworks])
                      @include('components.search.day', ['params' => $params, 'days' => $days])
                    </div>
                    <button type="submit" class="btn btn-primary mt-3">検索する</button>
                  </form>
                </div>
                <div class="row">
                  <div class="col-sm-12">
                    <table id="style-1" class="table style-1 table-hover non-hover dataTable no-footer" role="grid" aria-describedby="style-1_info" style="table-layout: fixed; width: 100%;">
                      <thead>
                        <tr role="row">
                          <th style="width: 120px;">店舗</th>
                          <th style="width: 120px;">クラス</th>
                          <th style="width: 80px;">曜日</th>
                          <th style="width: 80px;">開始時間</th>
                          <th style="width: 80px;">終了時間</th>
                          <th style="width: 100px;"></th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($schedules as $schedule)
                          <tr role="row" class="odd">
                            <td>{{ $schedule->name }}</td>
                            <td>{{ $schedule->classwork->name }}</td>
                            <td>{{ $schedule->day_name }}</td>
                            <td>{{ $schedule->start_at }}</td>
                            <td>{{ $schedule->end_at }}</td>
                            <td>
                              <a class="btn btn-outline-primary" href="{{ url('admin/schedule/edit', $schedule) }}" role="button">編集</a>
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
                      {{ $schedules->links() }}
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

@endsection
