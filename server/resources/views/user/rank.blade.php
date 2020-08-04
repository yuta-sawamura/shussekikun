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
            <li class="active mb-2"><a href="">ランキング</a></li>
          </ul>
        </div>
        <ul class="nav nav-tabs  mb-3 mt-3" id="simpletab" role="tablist">
          <li class="nav-item">
            <a class="nav-link {{ !isset($params['category']) ? 'active' : null }}" href="#" onclick="submitForm('category')">総合</a>
          </li>
          @foreach($categories as $k => $category)
            <li class="nav-item">
              <a class="nav-link {{ isset($params['category']) && $params['category'] == $k ? 'active' : null }}" href="#" onclick="submitForm('category', {{ $k }})">{{ $category }}</a>
            </li>
          @endforeach
        </ul>
        <div class="statbox widget box box-shadow">
          <div class="widget-header">
            <div class="row">
              <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                <h4>年間出席ランキング</h4>
              </div>
            </div>
            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
              <p>{{ isset($params['year']) ? $params['year'] : date('Y') }}年</p>
              @php
                if (isset($params['year'])):
                  $lastYear = $params['year'] - 1;
                  $nextYear = $params['year'] + 1;
                else:
                  $lastYear = date('Y') - 1;
                  $nextYear = date('Y') + 1;
                endif;
              @endphp
              <a class="bs-tooltip text-primary" href="#" onclick="submitForm('year', {{ $lastYear }})" title="前年">&lt;</a> &emsp; <a class="bs-tooltip text-primary" href="#" onclick="submitForm('year', {{ $nextYear }})" title="翌年">&gt;</a>
            </div>
          </div>
          <div class="widget-content widget-content-area">
            <div id="s-bar" class=""></div>
          </div>
        </div>
      </div>

      <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 layout-top-spacing">
        <div class="statbox widget box box-shadow">
          <div class="widget-header">
            <div class="row">
              <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                <h4>月間出席ランキング</h4>
              </div>
            </div>
            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
              <p>{{ (isset($params['year'])) ? $params['year'] : date('Y') }}年{{ (isset($params['month'])) ? $params['month'] : date('m') }}月</p>
              @php
                if (isset($params['month'])):
                  $lastMonth = $params['month'] - 1;
                  $nextMonth = $params['month'] + 1;
                else:
                  $lastMonth = date('m') - 1;
                  $nextMonth = date('m') + 1;
                endif;
              @endphp
              <a class="bs-tooltip text-primary" href="#" onclick="submitForm('month', {{ $lastMonth }})" title="前月">&lt;</a> &emsp; <a class="bs-tooltip text-primary" href="#" onclick="submitForm('month', {{ $nextMonth }})" title="翌月">&gt;</a>
              {{-- <a class="bs-tooltip text-primary" href="#" onclick="submitForm('year', {{ $lastYear }})" title="前年">&lt;</a> &emsp; <a class="bs-tooltip text-primary" href="#" onclick="submitForm('year', {{ $nextYear }})" title="翌年">&gt;</a> --}}
            </div>
          </div>
          <div class="widget-content widget-content-area">
            <div id="s-bar2" class=""></div>
          </div>
        </div>
      </div>

      <form action="{{ url('/rank') }}" id="form">
        <input type="hidden" name="category" value="{{ $params['category'] ?? null }}" id="category">
        <input type="hidden" name="year" value="{{ $params['year'] ?? null }}" id="year">
        <input type="hidden" name="month" value="{{ $params['month'] ?? null }}" id="month">
      </form>

    </div>
  </div>
</div>

<script>
  function submitForm(type, val = null) {
    $('form').find('#' + type).val(val);
    $('#form').submit();
  }
</script>
<script src="{{ asset('/plugins/apex/apexcharts.min.js') }}"></script>
<script>
  const yearCount = @json($yearCount);
  const yearTitle = @json($yearTitle);
  const sBar1 = {
    chart: {
      height: 450,
      type: 'bar',
      toolbar: {
        show: false,
      }
    },
    plotOptions: {
      bar: {
        horizontal: true,
      }
    },
    colors: ['#1b55e2'],
    dataLabels: {
      enabled: true
    },
    series: [{
      name: '年間出席回数',
      data: yearCount
    }],
    tooltip: {
      enabled: false
    },
    xaxis: {
      categories: yearTitle,
      title: {
        text: '回数'
      }
    }
  }

  var chart = new ApexCharts(
    document.querySelector("#s-bar"),
    sBar1
  );

  chart.render();

  const monthlyCount = @json($monthlyCount);
  const monthlyTitle = @json($monthlyTitle);
  const sBar2 = {
    chart: {
      height: 450,
      type: 'bar',
      toolbar: {
        show: false,
      }
    },
    plotOptions: {
      bar: {
        horizontal: true,
      }
    },
    dataLabels: {
      enabled: true
    },
    series: [{
      name: '月間出席回数',
      data: monthlyCount
    }],
    xaxis: {
      categories: monthlyTitle,
      title: {
        text: '回数'
      }
    }
  }

  var chart = new ApexCharts(
    document.querySelector("#s-bar2"),
    sBar2
  );

  chart.render();
</script>

@endsection()
