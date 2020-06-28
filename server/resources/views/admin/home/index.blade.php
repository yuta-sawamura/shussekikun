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
          <li class="nav-item">
            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">全店舗</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">新宿店</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">渋谷店</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">池袋店</a>
          </li>
        </ul>
        <div class="user-profile layout-spacing">
          <div class="widget-content widget-content-area">
            <div class="d-flex justify-content-between">
              <h3 class="">全店舗</h3>
            </div>
            <div class="col-md-12 text-right">
              <a href="{{ url('/admin/user') }}" class="btn btn-outline-primary">一覧</a>
            </div>
            <div class="user-info-list">

              <div class="">
                <ul class="contacts-block list-unstyled">
                  <li class="contacts-block__item">
                    <p>合計会員数： 420名</p>
                  </li>
                  <li class="contacts-block__item">
                    <p>合計実働会員数： 320名</p>
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
                <h4>【店舗別】会員数・実働数</h4>
              </div>
            </div>
          </div>
          <div class="widget-content widget-content-area">
            <div id="s-bar1" class=""></div>
          </div>
        </div>
      </div>
      <div id="chartBar" class="col-xl-12 layout-spacing">
        <div class="statbox widget box box-shadow">
          <div class="widget-header">
            <div class="row">
              <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                <h4>【カテゴリー別】会員数・実働数</h4>
              </div>
            </div>
          </div>
          <div class="widget-content widget-content-area">
            <div id="s-bar2" class=""></div>
          </div>
        </div>
      </div>
      <div id="chartBar" class="col-xl-12 layout-spacing">
        <div class="statbox widget box box-shadow">
          <div class="widget-header">
            <div class="row">
              <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                <h4>【年別】会員数・実働数</h4>
              </div>
            </div>
          </div>
          <div class="widget-content widget-content-area">
            <div id="s-bar3" class=""></div>
          </div>
        </div>
      </div>
      <div id="chartBar" class="col-xl-12 layout-spacing">
        <div class="statbox widget box box-shadow">
          <div class="widget-header">
            <div class="row">
              <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                <h4>【月別】会員数・実働数</h4>
              </div>
            </div>
            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
              <p>2020年</p>
              <a class="bs-tooltip" href="" title="前年">&lt;</a> &emsp; <a class="bs-tooltip" href="" title="翌年">&gt;</a>
            </div>
          </div>
          <div class="widget-content widget-content-area">
            <div id="s-bar4" class=""></div>
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
        type: 'bar',
        height: 330,
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
        name: '会員数',
        data: [76, 85, 101]
      }, {
        name: '実働数',
        data: [44, 55, 57]
      }],
      stroke: {
        show: true,
        width: 1,
        colors: ['#fff']
      },
      xaxis: {
        categories: ['新宿店', '渋谷店', '池袋店'],
      },
    };

    var chart = new ApexCharts(document.querySelector("#s-bar1"), sBar1);
    chart.render();

    const sBar2 = {
      chart: {
        type: 'bar',
        height: 250,
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
        name: '会員数',
        data: [76, 85]
      }, {
        name: '実働数',
        data: [44, 55]
      }],
      stroke: {
        show: true,
        width: 1,
        colors: ['#fff']
      },
      xaxis: {
        categories: ['一般', '少年'],
      },
    };

    var chart = new ApexCharts(document.querySelector("#s-bar2"), sBar2);
    chart.render();

    const sBar3 = {
      chart: {
        type: 'bar',
        height: 330,
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
        name: '会員数',
        data: [76, 85, 101]
      }, {
        name: '実働数',
        data: [44, 55, 57]
      }],
      stroke: {
        show: true,
        width: 1,
        colors: ['#fff']
      },
      xaxis: {
        categories: ['2020年', '2019年', '2018年'],
      },
    };

    var chart = new ApexCharts(document.querySelector("#s-bar3"), sBar3);
    chart.render();

    const sBar4 = {
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

    var chart = new ApexCharts(document.querySelector("#s-bar4"), sBar4);
    chart.render();
</script>

@endsection()
