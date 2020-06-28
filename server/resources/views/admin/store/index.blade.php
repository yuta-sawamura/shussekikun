@extends('layouts.admin.app')
@section('content')

<div id="content" class="main-content">
  @component('components.alerts.app')
  @endcomponent
  <div class="layout-px-spacing">
    <div class="row layout-top-spacing layout-spacing">
      <div class="col-lg-12">
        <div class="breadcrumb-five">
          <ul class="breadcrumb">
            <li class="mb-2"><a href="{{ url('/admin') }}">ホーム</a></li>
            <li class="active mb-2"><a href="">店舗一覧</a></li>
          </ul>
        </div>
        <div class="statbox widget box box-shadow">
          <div class="widget-header">
            <div class="row">
              <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                <h4>店舗一覧</h4>
              </div>
            </div>
          </div>
          <div class="widget-content widget-content-area">
            <div class="col-md-12 text-right">
              <button type="button" class="btn btn-outline-primary mb-2 mr-2" data-toggle="modal" data-target="#createModal">
                追加
              </button>
            </div>
            <div class="table-responsive mb-4 style-1">
              <div id="style-1_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">
                <div class="row">
                  <div class="col-sm-12">
                    <table id="style-1" class="table style-1 table-hover non-hover dataTable no-footer" role="grid" aria-describedby="style-1_info" style="table-layout: fixed; width: 100%;">
                      <thead>
                        <tr role="row">
                          <th tabindex="0" aria-controls="style-1" rowspan="1" colspan="1" style="width: 120px;">店舗名</th>
                          <th tabindex="0" aria-controls="style-1" rowspan="1" colspan="1" style="width: 210px;"></th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($stores as $store)
                          <tr role="row" class="odd">
                            <td>{{ $store->name }}</td>
                            <td>
                              <button type="button" class="btn btn-outline-primary mb-2 mr-2" data-toggle="modal" data-target="#editModal">編集</button>
                              <button type="button" class="btn btn-outline-danger mb-2 mr-2" data-toggle="modal" data-target="#attentionModal">削除</button>
                            </td>
                          </tr>
                          @component('components.modals.admin.edit', ['name' => '店舗名', 'path' => '/admin/store/update/' . $store->id, 'value' => $store->name])
                          @endcomponent
                          @component('components.modals.attention', ['title' => '関連データも全て削除されますが本当によろしいですか？', 'path' => '/admin/store/delete/' . $store->id])
                          @endcomponent
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-12 col-md-7">
                    <div class="dataTables_paginate paging_simple_numbers">
                      {{ $stores->links() }}
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

@component('components.modals.admin.create', ['name' => '店舗名', 'path' => '/admin/store/store'])
@endcomponent

@endsection()
