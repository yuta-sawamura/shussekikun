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
            <li class="active mb-2"><a href="">クラス一覧</a></li>
          </ul>
        </div>
        <div class="statbox widget box box-shadow">
          <div class="widget-header">
            <div class="row">
              <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                <h4>クラス一覧</h4>
              </div>
            </div>
          </div>
          <div class="widget-content widget-content-area">
            <div class="col-md-12 text-right">
              <button type="button" class="btn btn-outline-primary mb-2 mr-2" data-toggle="modal" data-target="#createModal">
                追加
              </button>
            </div>
            <div class="widget-content widget-content-area">
              <form action="{{ url('/admin/class') }}">
                <div class="form-row">
                  <div class="mb-2 col-md-3">
                    <label>店舗</label>
                    <select class="form-control" name="store">
                      <option selected="selected" value="">選択してください</option>
                      @foreach($stores as $k => $v)
                        <option value="{{ $k }}" {{ isset($params['store']) && $params['store'] == $k ? 'selected': null }}>
                          {{ $v }}
                        </option>
                      @endforeach
                    </select>
                  </div>
                  <div class="mb-2 col-md-3">
                    <label for="keyword">クラス</label>
                    <input name="keyword" type="text" class="form-control" placeholder="キーワードを入力" value="{{ $params['keyword'] ?? null }}">
                  </div>
                </div>
                <button type="submit" class="btn btn-primary mt-3">検索する</button>
              </form>
            </div>
            <div class="table-responsive mb-4 style-1">
              <div id="style-1_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">
                <div class="row">
                  <div class="col-sm-12">
                    <table id="style-1" class="table style-1 table-hover non-hover dataTable no-footer" role="grid" aria-describedby="style-1_info" style="table-layout: fixed; width: 100%;">
                      <thead>
                        <tr role="row">
                          <th tabindex="0" aria-controls="style-1" rowspan="1" colspan="1" style="width: 120px;">店舗</th>
                          <th tabindex="0" aria-controls="style-1" rowspan="1" colspan="1" style="width: 120px;">クラス</th>
                          <th tabindex="0" aria-controls="style-1" rowspan="1" colspan="1" style="width: 210px;"></th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($classworks as $classwork)
                          <tr role="row" class="odd">
                            <td>{{ $classwork->store_name }}</td>
                            <td>{{ $classwork->name }}</td>
                            <td>
                              <button type="button" class="btn btn-outline-primary mb-2 mr-2" data-toggle="modal" data-target="#editModal{{ $classwork->id }}">編集</button>
                              <button type="button" class="btn btn-outline-danger mb-2 mr-2" data-toggle="modal" data-target="#attentionModal">削除</button>
                            </td>
                          </tr>
                          @component('components.modals.admin.classwork.edit', ['stores' => $stores, 'classwork' => $classwork])
                          @endcomponent
                          @component('components.modals.attention', ['title' => '関連データも全て削除されますが本当によろしいですか？', 'path' => '/admin/class/delete/' . $classwork->id])
                          @endcomponent
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-12 col-md-7">
                    <div class="dataTables_paginate paging_simple_numbers">
                      {{ $classworks->links() }}
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

@component('components.modals.admin.classwork.create', ['stores' => $stores])
@endcomponent

@endsection()
