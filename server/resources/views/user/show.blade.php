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
              <img src="{{ asset('/img/90x90.jpg') }}" alt="avatar">
              <p class="">澤村 勇太(サワムラ ユウタ)</p>
            </div>
            <div class="user-info-list">
              <div class="">
                <ul class="contacts-block list-unstyled">
                  <li class="contacts-block__item">
                    <p>カテゴリー： 一般</p>
                  </li>
                  <li class="contacts-block__item">
                    <p>性別： 男</p>
                  </li>
                  <li class="contacts-block__item">
                    <p>登録日： 2020-01-01</p>
                  </li>
                  <li class="contacts-block__item">
                    <p>年間出席ランキング： 8位</p>
                  </li>
                  <li class="contacts-block__item">
                    <p>月間出席ランキング： 32位</p>
                  </li>
                  <li class="contacts-block__item">
                    <p>月間平均出席回数： 10回</p>
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
              <p>2020年</p>
              <a class="bs-tooltip" href="" title="前年">&lt;</a> &emsp; <a class="bs-tooltip" href="" title="翌年">&gt;</a>
            </div>
          </div>
          <div class="widget-content widget-content-area">
            <div id="s-bar" class=""></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script src="{{ asset('/plugins/apex/apexcharts.min.js') }}"></script>

<script>
  const sBar = {
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
      name: '年間出席回数',
      data: [10, 13, 14, 7, 22, 0, 20, 15, 12]
    }],
    xaxis: {
      categories: ['1月', '2月', '3月', '4月', '5月', '6月', '7月', '8月', '9月', '10月', '11月', '12月'],
    }
  }

  const chart = new ApexCharts(
    document.querySelector("#s-bar"),
    sBar
  );

  chart.render();
</script>

@endsection
