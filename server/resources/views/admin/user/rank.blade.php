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
              <p>2020年</p>
              <a class="bs-tooltip" href="" title="前年">&lt;</a> &emsp; <a class="bs-tooltip" href="" title="翌年">&gt;</a>
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
  const usersCount = @json($yearUsers['users_count']);
  const workingUsersCount = @json($yearUsers['working_users_count']);
  const joinUsersCount = @json($yearUsers['join_users_count']);
  const cancelUsersCount = @json($yearUsers['cancel_users_count']);
  const sBar1 = {
    chart: {
      type: 'bar',
      height: 400,
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
      data: usersCount

    }, {
      name: '実働会員数',
      data: workingUsersCount
    }, {
      name: '入会者数',
      data: joinUsersCount
    }, {
      name: '退会者数',
      data: cancelUsersCount
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

  const sBar2 = {
    chart: {
      type: 'bar',
      height: 800,
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
      name: '会員数',
      data: [76, 85, 101, 76, 85, 101, 76, 85, 101, 76, 85, 101]
    }, {
      name: '実働数',
      data: [76, 85, 101, 76, 85, 101, 76, 85, 101, 76, 85, 101]
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

@endsection()
