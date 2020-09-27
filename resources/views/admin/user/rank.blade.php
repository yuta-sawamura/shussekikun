@extends('layouts.admin.app')
@section('content')

<div id="content" class="main-content">
  <div class="layout-px-spacing">
    <div class="row layout-spacing">
      <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 layout-top-spacing">
        <div class="breadcrumb-five">
          <ul class="breadcrumb">
            <li class="active mb-2"><a href="">ホーム</a></li>
          </ul>
        </div>
        <ul class="nav nav-tabs  mb-3" id="simpletab" role="tablist">
          @foreach($stores as $k => $store)
            <li class="nav-item">
              <a class="nav-link {{ isset($params['store']) && $params['store'] == $k ? 'active' : null }}" href="#" onclick="submitForm('store', {{ $k }})">{{ $store }}</a>
            </li>
          @endforeach
        </ul>
        <div class="user-profile layout-spacing">
          <div class="widget-content widget-content-area">
            <div class="d-flex justify-content-between">
              <h3>全店舗</h3>
            </div>
            <div class="user-info-list">
              <div>
                <ul class="contacts-block list-unstyled">
                  <li class="contacts-block__item">
                    <p>累計会員数 {{ $totalUsersCount }}名</p>
                  </li>
                  <li class="contacts-block__item">
                    <p>実働会員数： {{ $workingUsersCount }}名</p>
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
                <h4>{{ $stores[$params['store']] ?? null }}年別</h4>
              </div>
            </div>
          </div>
          <div class="widget-content widget-content-area">
            <div id="s-bar1"></div>
          </div>
        </div>
      </div>
      <div id="chartBar" class="col-xl-12 layout-spacing">
        <div class="statbox widget box box-shadow">
          <div class="widget-header">
            <div class="row">
              <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                <h4>{{ $stores[$params['store']] ?? null }}月別</h4>
              </div>
            </div>
            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
              <p>{{ $params['year'] }}年</p>
              @php
                  $lastYear = $params['year'] - 1;
                  $nextYear = $params['year'] + 1;
              @endphp
              <a class="bs-tooltip text-primary" href="#!" onclick="submitForm('year', {{ $lastYear }})" title="前年">&lt;</a> &emsp; <a class="bs-tooltip text-primary" href="#!" onclick="submitForm('year', {{ $nextYear }})" title="翌年">&gt;</a>
            </div>
          </div>
          <div class="widget-content widget-content-area">
            <div id="s-bar2"></div>
          </div>
        </div>
      </div>
    </div>

    <form action="{{ url('/admin') }}" id="form">
      <input type="hidden" name="store" value="{{ $params['store'] ?? null }}" id="store">
      <input type="hidden" name="year" value="{{ $params['year'] ?? null }}" id="year">
    </form>

  </div>
</div>

<script src="{{ asset('/js/submit_form.js') }}"></script>
<script src="{{ asset('/plugins/apex/apexcharts.min.js') }}"></script>
<script>
  const years = @json($yearUsers['years']);
  const yearUsersCount = @json($yearUsers['users_count']);
  const yearWorkingUsersCount = @json($yearUsers['working_users_count']);
  const yearJoinUsersCount = @json($yearUsers['join_users_count']);
  const yearCancelUsersCount = @json($yearUsers['cancel_users_count']);
  const sBar1 = {
    chart: {
      type: 'bar',
      height: 300,
      toolbar: {
        show: false,
      }
    },
    plotOptions: {
      bar: {
        horizontal: true,
        dataLabels: {
          position: 'top',
        },
      }
    },
    dataLabels: {
      enabled: true,
      offsetX: -6,
      style: {
        fontSize: '12px',
        colors: ['#fff']
      }
    },
    series: [{
      name: '累計会員数',
      data: yearUsersCount

    }, {
      name: '実働会員数',
      data: yearWorkingUsersCount
    }, {
      name: '入会者数',
      data: yearJoinUsersCount
    }, {
      name: '退会者数',
      data: yearCancelUsersCount
    }],
    stroke: {
      show: true,
      width: 1,
      colors: ['#fff']
    },
    xaxis: {
      categories: years,
    },
  };
  var chart = new ApexCharts(document.querySelector("#s-bar1"), sBar1);
  chart.render();

  const months = @json($monthUsers['months']);
  const monthUsersCount = @json($monthUsers['users_count']);
  const monthWorkingUsersCount = @json($monthUsers['working_users_count']);
  const monthJoinUsersCount = @json($monthUsers['join_users_count']);
  const monthCancelUsersCount = @json($monthUsers['cancel_users_count']);
  const sBar2 = {
    chart: {
      type: 'bar',
      height: 1300,
      toolbar: {
        show: false,
      }
    },
    plotOptions: {
      bar: {
        horizontal: true,
        dataLabels: {
          position: 'top',
        },
      }
    },
    dataLabels: {
      enabled: true,
      offsetX: -6,
      style: {
        fontSize: '14px',
        colors: ['#fff']
      }
    },
    series: [{
      name: '累計会員数',
      data: monthUsersCount

    }, {
      name: '実働会員数',
      data: monthWorkingUsersCount
    }, {
      name: '入会者数',
      data: monthJoinUsersCount
    }, {
      name: '退会者数',
      data: monthCancelUsersCount
    }],
    stroke: {
      show: true,
      width: 1,
      colors: ['#fff']
    },
    xaxis: {
      categories: ['1月', '2月', '3月', '4月', '5月', '6月', '7月', '8月', '9月', '10月', '11月', '12月'],
    },
  };

  var chart = new ApexCharts(document.querySelector("#s-bar2"), sBar2);
  chart.render();
</script>

@endsection
