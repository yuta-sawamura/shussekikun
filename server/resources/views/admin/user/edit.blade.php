@extends('layouts.admin.app')
@section('content')

<div id="content" class="main-content">
  <div class="layout-px-spacing">

    <div class="account-settings-container layout-top-spacing">
      <div class="breadcrumb-five">
        <ul class="breadcrumb">
          <li class="mb-2"><a href="{{ url('/admin/user/aggregate') }}">ホーム</a></li>
          <li class="mb-2"><a href="{{ url('/admin/user/index') }}">会員一覧</a></li>
          <li class="mb-2"><a href="{{ url('/admin/user/show') }}">会員詳細</a></li>
          <li class="active mb-2"><a href="">会員編集</a></li>
        </ul>
      </div>
      <div class="account-content">
        <div class="scrollspy-example" data-spy="scroll" data-target="#account-settings-scroll" data-offset="-100">
          <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
              <form id="general-info" class="section general-info">
                <div class="info">
                  <h6 class="">会員編集</h6>
                  <div class="row">
                    <div class="col-lg-11 mx-auto">
                      <div class="row">
                        <div class="col-xl-2 col-lg-12 col-md-4">
                          <div class="upload mt-4 pr-md-4">
                            <input type="file" id="input-file-max-fs" class="dropify" data-default-file="" data-max-file-size="2M" />
                            <p class="mt-2"><i class="flaticon-cloud-upload mr-1"></i>画像アップロード</p>
                          </div>
                        </div>
                        <div class="col-xl-10 col-lg-12 col-md-8 mt-md-0 mt-4">
                          <div class="form">
                            <div class="row">
                              <div class="col-sm-6">
                                <div class="form-group">
                                  <label for="">姓(カタカナ)</label>
                                  <input type="text" class="form-control" id="" placeholder="ヤマダ">
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label for="">名(カタカナ)</label>
                                  <input type="text" class="form-control" id="" placeholder="タロウ">
                                </div>
                              </div>
                              <div class="col-sm-6">
                                <div class="form-group">
                                  <label for="">姓</label>
                                  <input type="text" class="form-control" id="" placeholder="山田">
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label for="">名</label>
                                  <input type="text" class="form-control" id="" placeholder="太郎">
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label for="">メールアドレス</label>
                                  <input type="text" class="form-control" id="email" placeholder="yamada@gmail.com">
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label>店舗</label>
                                  <div class="row">

                                    <div class="col-md-6">
                                      <select class="form-control" id="s-from1">
                                        <option>新宿店</option>
                                        <option>渋谷店</option>
                                        <option selected="selected">池袋店</option>
                                      </select>
                                    </div>
                                  </div>

                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label>カテゴリー</label>

                                  <div class="row">

                                    <div class="col-md-6">
                                      <select class="form-control" id="s-from1">
                                        <option>一般</option>
                                        <option selected="selected">少年</option>
                                      </select>
                                    </div>

                                  </div>

                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label>性別</label>

                                  <div class="row">

                                    <div class="col-md-6">
                                      <select class="form-control" id="s-from1">
                                        <option>男</option>
                                        <option selected="selected">女</option>
                                      </select>
                                    </div>

                                  </div>

                                </div>
                              </div>
                              <div class="col-sm-6">
                                <label class="dob-input">生年月日</label>
                                <div class="d-sm-flex d-block">
                                  <div class="form-group mr-1">
                                    <select class="form-control" id="year">
                                      <option>2018年</option>
                                      <option>2017年</option>
                                      <option>2016年</option>
                                      <option selected="">1989年</option>
                                    </select>
                                  </div>
                                  <div class="form-group mr-1">
                                    <select class="form-control" id="month">
                                      <option selected="">1月</option>
                                      <option>2月</option>
                                      <option>10月</option>
                                    </select>
                                  </div>
                                  <div class="form-group mr-1">
                                    <select class="form-control" id="exampleFormControlSelect1">
                                      <option>1日</option>
                                      <option selected="">2日</option>
                                      <option selected="">30日</option>
                                    </select>
                                  </div>
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label>アカウント種別</label>

                                  <div class="row">

                                    <div class="col-md-6">
                                      <select class="form-control" id="s-from1">
                                        <option>共有アカウント</option>
                                        <option selected="selected">一般アカウント</option>
                                      </select>
                                    </div>

                                  </div>

                                </div>
                              </div>
                              <div class="col-sm-6">
                                <label for="profession">パスワード(8文字以上)</label>
                                <input type="password" class="form-control" id="profession" placeholder="パスワード" value="">
                              </div>
                            </div>
                            <div class="col-lg-12 text-right">
                              <button type="submit" class="btn btn-dark mb-2 mt-5">退会</button>
                              <button type="button" class="btn btn-danger mb-2 mt-5" data-toggle="modal" data-target="#attentionModal">削除</button>
                              <button type="submit" class="btn btn-primary mb-2 mt-5">保存</button>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@component('components.modals.attention', ['name' => '削除'])
@endcomponent

@endsection()

@section('js')
<script src="{{ asset('/plugins/dropify/dropify.min.js') }}"></script>
<script src="{{ asset('/js/users/account-settings.js') }}"></script>
@endsection()
