@extends('layouts.admin.app')
@section('content')

<div id="content" class="main-content">
  @include('components.alerts.app')

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
                    <label for="keyword">キーワード</label>
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
                          <th style="width: 120px;">クラス</th>
                          <th style="width: 210px;"></th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($classworks as $classwork)
                          <tr role="row" class="odd">
                            <td>{{ $classwork->name }}</td>
                            <td>
                              <button type="button" class="btn btn-outline-primary mb-2 mr-2" data-toggle="modal" data-target="#editModal{{ $classwork->id }}">編集</button>
                              <button type="button" class="btn btn-outline-danger mb-2 mr-2" data-toggle="modal" data-target="#attentionModal{{ $classwork->id }}">削除</button>
                            </td>
                          </tr>
                          @include('components.modals.admin.edit', ['name' => 'クラス名', 'path' => '/admin/class/update/' . $classwork->id, 'value' => $classwork->name, 'id' => $classwork->id])

                          @include('components.modals.attention', ['title' => '関連データも全て削除されますが本当によろしいですか？', 'path' => '/admin/class/delete/' . $classwork->id, 'id' => $classwork->id])

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

@include('components.modals.admin.create', ['name' => 'クラス名', 'path' => '/admin/class/store'])


@endsection()
