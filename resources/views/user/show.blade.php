@extends('layouts.app')
@section('content')

<div id="content" class="main-content">
  <div class="layout-px-spacing">
    <div class="row layout-spacing">
      <!-- Content -->
      <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 layout-top-spacing">
        <div class="breadcrumb-five">
          <ul class="breadcrumb">
            <li class="mb-2"><a href="{{ url('/') }}">ホーム</a></li>
            <li class="mb-2"><a href="{{ url('user/') }}">会員一覧</a></li>
            <li class="active mb-2"><a href="">会員詳細</a></li>
          </ul>
        </div>
        <div class="user-profile layout-spacing">
          <div class="widget-content widget-content-area">
            <div class="d-flex justify-content-between">
              <h3 class="">会員詳細</h3>
            </div>
            <div class="text-center user-info">
              <img alt="profile-img" src="{{ $user->S3_url }}" style="height: 100px; width: 100px">
              <p>{{ $user->full_name }} ({{ $user->full_name_kana }})</p>
            </div>
            <div class="user-info-list">
              <div class="">
                <ul class="contacts-block list-unstyled">
                  <li class="contacts-block__item">
                    <p>カテゴリー： {{ $user->category->name ?? null }}</p>
                  </li>
                  <li class="contacts-block__item">
                    <p>性別： {{ $user->gender_name }}</p>
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
              <a class="bs-tooltip text-primary" href="{{ url('user/show/' . $user->id . '?year=' . $lastYear) }}" title="前年">&lt;</a> &emsp; <a class="bs-tooltip text-primary" href="{{ url('user/show/' . $user->id . '?year=' . $nextYear) }}" title="翌年">&gt;</a>
            </div>
          </div>
          <div class="widget-content widget-content-area">
            <div id="s-bar"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@component('components.js.chart', ['name' => '年間出席回数', 'data' => $rank['counts'], 'text' => '回数',  'categories' => $rank['months'], 'selector' => '#s-bar'])
@endcomponent

@endsection
