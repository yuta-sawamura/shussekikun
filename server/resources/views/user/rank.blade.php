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
            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">総合</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">一般</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">少年</a>
          </li>
        </ul>
        <div class="statbox widget box box-shadow">
          <div class="widget-header">
            <div class="row">
              <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                <h4>年間出席ランキング</h4>
              </div>
            </div>
            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
              <p>2020年</p>
              <a class="bs-tooltip" href="" title="前年">&lt;</a> &emsp; <a class="bs-tooltip" href="" title="翌年">&gt;</a>
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
              <p>2020年12年</p>
              <a class="bs-tooltip" href="" title="前月">&lt;</a> &emsp; <a class="bs-tooltip" href="" title="翌月">&gt;</a>
            </div>
          </div>
          <div class="widget-content widget-content-area">
            <div id="s-bar2" class=""></div>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>

<script src="{{ asset('/plugins/apex/apexcharts.min.js') }}"></script>

<script>
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
      data: [30, 25, 24, 21, 20, 15, 11, 10, 9]
    }],
    xaxis: {
      categories: ['1位 澤村 勇太', '2位 澤村 勇太', '4位 澤村 勇太', '4位 澤村 勇太', '5位 澤村 勇太', '6位 澤村 勇太', '7位 澤村 勇太', '8位 澤村 勇太', '9位 澤村 勇太', '10位 澤村 勇太'],
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
      data: [30, 25, 24, 21, 20, 15, 11, 10, 9]
    }],
    xaxis: {
      categories: ['1位 澤村 勇太', '2位 澤村 勇太', '4位 澤村 勇太', '4位 澤村 勇太', '5位 澤村 勇太', '6位 澤村 勇太', '7位 澤村 勇太', '8位 澤村 勇太', '9位 澤村 勇太', '10位 澤村 勇太'],
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
