@extends('layouts.admin.app')
@section('content')

<div id="content" class="main-content">
  @include('components.alerts.app')

  <div class="layout-px-spacing">
    <div class="row layout-spacing">
      <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 layout-top-spacing">
        <div class="breadcrumb-five">
          <ul class="breadcrumb">
            <li class="mb-2"><a href="{{ url('/admin') }}">ホーム</a></li>
            <li class="mb-2"><a href="{{ url('/admin/user') }}">会員一覧</a></li>
            <li class="active mb-2"><a href="">会員詳細</a></li>
          </ul>
        </div>
        <div class="user-profile layout-spacing">
          <div class="widget-content widget-content-area">
            <div class="d-flex justify-content-between">
              <h3 class="">会員詳細</h3>
            </div>
            @can ('anyAdmin', $user)
            <div class="col-md-12 text-right">
              <a href="{{ url('/admin/user/edit', $user) }}" class="btn btn-outline-primary">編集</a>
            </div>
            @endcan
            <div class="text-center user-info">
              <div class="avatar avatar-xxl">
                <img alt="avatar" src="{{ $user->S3_url }}" class="rounded-circle" />
              </div>
              <p>{{ $user->full_name }}<br>{{ $user->full_name_kana }}</p>
            </div>
            <div class="user-info-list">
              <div class="">
                <ul class="contacts-block list-unstyled">
                  <li class="contacts-block__item">
                    <p>権限： {{ $user->role_name }}</p>
                  </li>
                  @can ('anyAdmin', $user)
                  <li class="contacts-block__item">
                    <p>店舗： {{ $user->store->name ?? null }}</p>
                  </li>
                  <li class="contacts-block__item">
                    <p>カテゴリー： {{ $user->category->name ?? null }}</p>
                  </li>
                  @endcan
                  <li class="contacts-block__item">
                    <p>性別： {{ $user->gender_name }}</p>
                  </li>
                  <li class="contacts-block__item">
                    <p>状態： {{ $user->status_name }}</p>
                  </li>
                  <li class="contacts-block__item">
                    <p>入会日： {{ $user->created_at->format('Y-m-d') }}</p>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div id="chartBar" class="col-xl-12 layout-spacing">
        <div class="statbox widget box box-shadow">
          <div class="widget-header">
            <div class="row">
              <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                <h4>出席回数</h4>
              </div>
            </div>
            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
              <p>{{ $params['year'] }}年</p>
              @php
                $lastYear = $params['year'] - 1;
                $nextYear = $params['year'] + 1;
              @endphp
              <a class="bs-tooltip text-primary" href="{{ url('admin/user/show/' . $user->id . '?year=' . $lastYear . (isset($params['page']) ? '&page=' . $params['page'] : null)) }}" title="前年">&lt;</a> &emsp;
              <a class="bs-tooltip text-primary" href="{{ url('admin/user/show/' . $user->id . '?year=' . $nextYear . (isset($params['page']) ? '&page=' . $params['page'] : null)) }}" title="翌年">&gt;</a>
            </div>
          </div>
          <div class="widget-content widget-content-area">
            <div id="s-bar" class=""></div>
          </div>
        </div>
      </div>
      <div class="col-lg-12">
        <div class="statbox widget box box-shadow">
          <div class="widget-header">
            <div class="row">
              <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                <h4>出席クラス一覧</h4>
              </div>
            </div>
          </div>
          <div class="widget-content widget-content-area">
            <div class="table-responsive mb-4 style-1">
              <div id="style-1_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">
                <div class="row">
                  <div class="col-sm-12">
                    <table id="style-1" class="table style-1 table-hover non-hover dataTable no-footer" role="grid" aria-describedby="style-1_info" style="table-layout: fixed; width: 100%;">
                      <thead>
                        <tr role="row">
                          <th style="width: 160px;">クラス</th>
                          <th style="width: 160px;">出席日時</th>
                          <th style="width: 200px;"></th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($attendances as $attendance)
                          <tr>
                            <td>{{ $attendance->schedule->classwork->classwork_name }}({{ $attendance->schedule->day_name }} {{ $attendance->schedule->time }})</td>
                            <td>{{ $attendance->created_at }}</td>
                            <td>
                              <a class="btn btn-outline-primary" href="{{ url('admin/user/attendance/' . $attendance->id . '/edit' . '/' .$user->id) }}" role="button">編集</a>
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
                      {{ $attendances->appends($params)->links() }}
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

@include('components.js.chart', ['name' => '年間出席回数', 'data' => $rank['counts'], 'text' => '回数',  'categories' => $rank['months'], 'selector' => '#s-bar'])
<script src="{{ asset('/plugins/apex/apexcharts.min.js') }}"></script>

@endsection
