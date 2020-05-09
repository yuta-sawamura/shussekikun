@extends('layouts.admin.app')
@section('content')

<div id="content" class="main-content">
  <div class="layout-px-spacing">
    <div class="row layout-spacing">
      <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 layout-top-spacing">
        <div class="breadcrumb-five">
          <ul class="breadcrumb">
            <li class="mb-2"><a href="{{ url('/admin/user/aggregate') }}">ホーム</a></li>
            <li class="mb-2"><a href="{{ url('/admin/user/index') }}">会員一覧</a></li>
            <li class="active mb-2"><a href="">会員詳細</a></li>
          </ul>
        </div>
        <div class="user-profile layout-spacing">
          <div class="widget-content widget-content-area">
            <div class="d-flex justify-content-between">
              <h3 class="">会員詳細</h3>
            </div>
            <div class="col-md-12 text-right">
              <a href="{{ url('/admin/user/edit') }}" class="btn btn-outline-primary">編集</a>
            </div>
            <div class="text-center user-info">
              <img alt="avatar" src="{{ asset('/img/90x90.jpg') }}">
              <p class="">澤村 勇太(サワムラ ユウタ)</p>
            </div>
            <div class="user-info-list">
              <div class="">
                <ul class="contacts-block list-unstyled">
                  <li class="contacts-block__item">
                    <p>店舗： 新宿店</p>
                  </li>
                  <li class="contacts-block__item">
                    <p>カテゴリー： 一般</p>
                  </li>
                  <li class="contacts-block__item">
                    <p>性別： 男</p>
                  </li>
                  <li class="contacts-block__item">
                    <p>追加日： 2020-01-01</p>
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
                          <th tabindex="0" aria-controls="style-1" rowspan="1" colspan="1" style="width: 100px;">クラス</th>
                          <th tabindex="0" aria-controls="style-1" rowspan="1" colspan="1" style="width: 160px;">出席日時</th>
                          <th tabindex="0" aria-controls="style-1" rowspan="1" colspan="1" style="width: 200px;"></th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td class="">一般クラス</td>
                          <td>2020-01-01 17:19</td>
                          <td>
                            <button type="button" class="btn btn-outline-primary mb-2 mr-2" data-toggle="modal" data-target="#inputModal">編集</button>
                            <button type="button" class="btn btn-outline-danger mb-2 mr-2" data-toggle="modal" data-target="#attentionModal">削除</button>
                          </td>
                        </tr>
                        <tr>
                          <td class="">一般クラス</td>
                          <td>2020-01-01 17:19</td>
                          <td>
                            <button type="button" class="btn btn-outline-primary mb-2 mr-2" data-toggle="modal" data-target="#inputModal">編集</button>
                            <button type="button" class="btn btn-outline-danger mb-2 mr-2" data-toggle="modal" data-target="#attentionModal">削除</button>
                          </td>
                        </tr>
                        <tr>
                          <td class="">一般クラス</td>
                          <td>2020-01-01 17:19</td>
                          <td>
                            <button type="button" class="btn btn-outline-primary mb-2 mr-2" data-toggle="modal" data-target="#inputModal">編集</button>
                            <button type="button" class="btn btn-outline-danger mb-2 mr-2" data-toggle="modal" data-target="#attentionModal">削除</button>
                          </td>
                        </tr>
                        <tr>
                          <td class="">一般クラス</td>
                          <td>2020-01-01 17:19</td>
                          <td>
                            <button type="button" class="btn btn-outline-primary mb-2 mr-2" data-toggle="modal" data-target="#inputModal">編集</button>
                            <button type="button" class="btn btn-outline-danger mb-2 mr-2" data-toggle="modal" data-target="#attentionModal">削除</button>
                          </td>
                        </tr>
                        <tr>
                          <td class="">一般クラス</td>
                          <td>2020-01-01 17:19</td>
                          <td>
                            <button type="button" class="btn btn-outline-primary mb-2 mr-2" data-toggle="modal" data-target="#inputModal">編集</button>
                            <button type="button" class="btn btn-outline-danger mb-2 mr-2" data-toggle="modal" data-target="#attentionModal">削除</button>
                          </td>
                        </tr>
                        <tr>
                          <td class="">一般クラス</td>
                          <td>2020-01-01 17:19</td>
                          <td>
                            <button type="button" class="btn btn-outline-primary mb-2 mr-2" data-toggle="modal" data-target="#inputModal">編集</button>
                            <button type="button" class="btn btn-outline-danger mb-2 mr-2" data-toggle="modal" data-target="#attentionModal">削除</button>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-12 col-md-5">
                    <div class="dataTables_info" id="style-1_info" role="status" aria-live="polite">表示ページ 1 of 2</div>
                  </div>
                  <div class="col-sm-12 col-md-7">
                    <div class="dataTables_paginate paging_simple_numbers" id="style-1_paginate">
                      <ul class="pagination">
                        <li class="paginate_button page-item previous disabled" id="style-1_previous"><a href="#" aria-controls="style-1" data-dt-idx="0" tabindex="0" class="page-link"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left">
                              <line x1="19" y1="12" x2="5" y2="12"></line>
                              <polyline points="12 19 5 12 12 5"></polyline>
                            </svg></a>
                        </li>
                        <li class="paginate_button page-item active"><a href="#" aria-controls="style-1" data-dt-idx="1" tabindex="0" class="page-link">1</a></li>
                        <li class="paginate_button page-item "><a href="#" aria-controls="style-1" data-dt-idx="2" tabindex="0" class="page-link">2</a></li>
                        <li class="paginate_button page-item next" id="style-1_next"><a href="#" aria-controls="style-1" data-dt-idx="3" tabindex="0" class="page-link"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right">
                              <line x1="5" y1="12" x2="19" y2="12"></line>
                              <polyline points="12 5 19 12 12 19"></polyline>
                            </svg></a>
                        </li>
                      </ul>
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

@component('components.modals.attention', ['name' => '削除'])
@endcomponent
@component('components.modals.input', ['name' => 'クラス名'])
@endcomponent

<script src="{{ asset('/plugins/apex/apexcharts.min.js') }}"></script>

<script>
  var sBar = {
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

  var chart = new ApexCharts(
    document.querySelector("#s-bar"),
    sBar
  );

  chart.render();
</script>

@endsection()
