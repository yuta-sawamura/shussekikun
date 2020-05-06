@extends('layouts.app')
@section('content')

<div id="content" class="main-content">
  <div class="layout-px-spacing">
    <div class="row layout-top-spacing layout-spacing">
      <div class="col-lg-12">
        <div class="breadcrumb-five">
          <ul class="breadcrumb">
            <li class="mb-2"><a href="{{ url('/') }}">ホーム</a></li>
            <li class="active mb-2"><a href="">会員一覧</a></li>
          </ul>
        </div>
        <div class="statbox widget box box-shadow">
          <div class="widget-header">
            <div class="row">
              <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                <h4>会員一覧</h4>
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
                          <th tabindex="0" aria-controls="style-1" rowspan="1" colspan="1" style="width: 150px;">名前</th>
                          <th tabindex="0" aria-controls="style-1" rowspan="1" colspan="1" style="width: 80px;">画像</th>
                          <th tabindex="0" aria-controls="style-1" rowspan="1" colspan="1" style="width: 110px;">カテゴリー</th>
                          <th tabindex="0" aria-controls="style-1" rowspan="1" colspan="1" style="width: 60px;">性別</th>
                          <th tabindex="0" aria-controls="style-1" rowspan="1" colspan="1" style="width: 110px;">登録日</th>
                          <th tabindex="0" aria-controls="style-1" rowspan="1" colspan="1" style="width: 105px;"></th>
                        </tr>
                      </thead>
                      <tbody>
                        @for ($i = 1; $i <= 10; $i++)
                        <tr role="row" class="odd">
                          <td class="">澤村 勇太<br>サワムラ ユウタ</td>
                          <td class="">
                            <a class="profile-img" href="javascript: void(0);">
                              <img src="{{ asset('/img/90x90.jpg') }}" alt="product">
                            </a>
                          </td>
                          <td>一般</td>
                          <td>男</td>
                          <td>2020-01-01</td>
                          <td class="text-center">
                            <a href="{{ url('user/show') }}" class="btn btn-outline-primary">詳細</a>
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
