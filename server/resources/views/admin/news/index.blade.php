@extends('layouts.admin.app')
@section('content')

<div id="content" class="main-content">
  <div class="layout-px-spacing">
    <div class="row layout-top-spacing layout-spacing">
      <div class="col-lg-12">
        <div class="breadcrumb-five">
          <ul class="breadcrumb">
            <li class="mb-2"><a href="{{ url('/admin/user/aggregate') }}">ホーム</a></li>
            <li class="active mb-2"><a href="">お知らせ一覧</a></li>
          </ul>
        </div>
        <div class="statbox widget box box-shadow">
          <div class="widget-header">
            <div class="row">
              <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                <h4>お知らせ一覧</h4>
              </div>
            </div>
          </div>
          <div class="widget-content widget-content-area">
            <div class="col-md-12 text-right">
              <a href="{{ url('/admin/news/create') }}" class="btn btn-outline-primary mb-2 mr-2">追加</a>
            </div>
            <div class="table-responsive mb-4 style-1">
              <div id="style-1_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">

                <div class="row">
                  <div class="col-sm-12">
                    <table id="style-1" class="table style-1 table-hover non-hover dataTable no-footer" role="grid" aria-describedby="style-1_info" style="table-layout: fixed; width: 100%;">
                      <thead>
                        <tr role="row">
                          <th tabindex="0" aria-controls="style-1" rowspan="1" colspan="1" style="width: 150px;">タイトル</th>
                          <th tabindex="0" aria-controls="style-1" rowspan="1" colspan="1" style="width: 150px;">本文</th>
                          <th tabindex="0" aria-controls="style-1" rowspan="1" colspan="1" style="width: 200px;">投稿日時</th>
                          <th tabindex="0" aria-controls="style-1" rowspan="1" colspan="1" style="width: 110px;"></th>
                        </tr>
                      </thead>
                      <tbody>
                        @for ($i = 1; $i <= 10; $i++)
                          <tr role="row" class="odd">
                            <td class="">4月のお休み</td>
                            <td class="">4月はコロナの影響で、緊急事態宣・・・</td>
                            <td>2020-01-01 13:00</td>
                            <td>
                              <a href="{{ url('/admin/news/show') }}" class="btn btn-outline-primary mb-2 mr-2">詳細</a>
                            </td>
                          </tr>
                        @endfor
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
                            </svg></a></li>
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

@endsection()
