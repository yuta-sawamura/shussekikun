@extends('layouts.app')
@section('content')

<div id="content" class="main-content">
  @component('components.alerts.app')
  @endcomponent
  <div class="layout-px-spacing">
    <div class="row layout-top-spacing layout-spacing">
      <div class="col-lg-12">
        <div class="breadcrumb-five">
          <ul class="breadcrumb">
            <li class="active mb-2"><a href="">ホーム</a></li>
          </ul>
        </div>
        <div class="statbox widget box box-shadow">
          <div class="widget-header">
            <div class="row">
              <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                <h4>出席会員一覧</h4>
              </div>
            </div>
          </div>
          <div class="widget-content widget-content-area">
            <div class="table-responsive mb-4 style-1">
              <div id="style-1_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">
                <div class="widget-content widget-content-area">
                  <form>
                    <div class="form-row">
                      <div class="form-group col-md-4">
                        <label for="name">名前</label>
                        <input type="text" class="form-control" placeholder="キーワードを入力">
                      </div>
                      <div class="col-md-2">
                        <label for="inputState">カテゴリー</label>
                        <select id="inputState" class="form-control">
                          <option selected="">一般</option>
                          <option>少年</option>
                          <option>親子</option>
                        </select>
                      </div>
                    </div>
                    <button type="submit" class="btn btn-primary mt-3">検索する</button>
                  </form>
                </div>

                <div class="row">
                  <div class="col-sm-12">
                    <table id="style-1" class="table style-1 table-hover non-hover dataTable no-footer" role="grid" aria-describedby="style-1_info" style="table-layout: fixed; width: 100%;">
                      <thead>
                        <tr role="row">
                          <th class="checkbox-column sorting_asc" rowspan="1" colspan="1" aria-label=" Record no. " style="width: 30px;"><label class="new-control new-checkbox checkbox-outline-primary m-auto">
                              <input type="checkbox" class="new-control-input chk-parent select-customers-info" id="customer-all-info">
                              <span class="new-control-indicator"></span><span style="visibility:hidden">c</span>
                            </label></th>
                          <th tabindex="0" aria-controls="style-1" rowspan="1" colspan="1" style="width: 150px;">名前</th>
                          <th tabindex="0" aria-controls="style-1" rowspan="1" colspan="1" style="width: 80px;">画像</th>
                          <th tabindex="0" aria-controls="style-1" rowspan="1" colspan="1" style="width: 110px;">カテゴリー</th>
                          <th tabindex="0" aria-controls="style-1" rowspan="1" colspan="1" style="width: 60px;">性別</th>
                          <th tabindex="0" aria-controls="style-1" rowspan="1" colspan="1" style="width: 105px;"></th>
                        </tr>
                      </thead>
                      <tbody>
                        @for ($i = 1; $i <= 10; $i++)
                          <tr role="row" class="odd">
                            <td class="checkbox-column sorting_1"><label class="new-control new-checkbox checkbox-outline-primary  m-auto">
                                <input type="checkbox" class="new-control-input child-chk select-customers-info" id="customer-all-info">
                                <span class="new-control-indicator"></span><span style="visibility:hidden">c</span>
                              </label></td>
                            <td class="">澤村 勇太<br>サワムラ ユウタ</td>
                            <td class="">
                              <a class="profile-img" href="javascript: void(0);">
                                <img alt="product" src="{{ asset('/img/90x90.jpg') }}">
                              </a>
                            </td>
                            <td>一般</td>
                            <td>男</td>
                            <td class="text-center">
                              <div class="dropdown custom-dropdown">
                                <div class="text-center">
                                  <button type="button" class="btn btn-primary mb-2 mr-2" data-toggle="modal" data-target="#attendanceModal">
                                    出席
                                  </button>
                                </div>
                              </div>
                            </td>
                          </tr>
                        @endfor
                      </tbody>
                    </table>
                    <button type="button" class="float-right btn btn-primary mb-2 mr-2" data-toggle="modal" data-target="#attendanceModal">
                      一括出席
                    </button>
                  </div>

                  @include('components.modals.attendance')

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

@include('components.modals.login')
@endsection
