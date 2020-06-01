@extends('layouts.admin.app')
@section('content')
<div id="content" class="main-content">
  <div class="layout-px-spacing">
    <div class="account-settings-container layout-top-spacing">
      <div class="breadcrumb-five">
        <ul class="breadcrumb">
          <li class="mb-2"><a href="{{ url('/admin/user/aggregate') }}">ホーム</a></li>
          <li class="mb-2"><a href="{{ url('/admin/user/index') }}">会員一覧</a></li>
          <li class="active mb-2"><a href="">会員追加</a></li>
        </ul>
      </div>
      <div class="account-content">
        <div class="scrollspy-example" data-spy="scroll" data-target="#account-settings-scroll" data-offset="-100">
          <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
              <form action="/admin/user/store" method="post" class="section general-info">
                @csrf
                <div class="info">
                  <h6 class="">会員追加</h6>
                  <div class="row">
                    <div class="col-lg-11 mx-auto">
                      <div class="row">
                        <div class="col-xl-2 col-lg-12 col-md-4">
                          <div class="upload mt-4 pr-md-4">
                            <input type="file" name="img" id="input-file-max-fs" class="dropify" data-default-file="" data-max-file-size="2M" />
                            <p class="mt-2"><i class="flaticon-cloud-upload mr-1"></i>画像アップロード</p>
                          </div>
                        </div>
                        <div class="col-xl-10 col-lg-12 col-md-8 mt-md-0 mt-4">
                          <div class="form">
                            <div class="row">
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label for="">姓</label>
                                <input type="text" name="sei" class="form-control" id="" placeholder="山田" value="">
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label for="">名</label>
                                  <input type="text" name="mei" class="form-control" id="" placeholder="太郎">
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label for="">姓(カタカナ)</label>
                                  <input type="text" name="sei_kana" class="form-control" id="" placeholder="ヤマダ">
                                  <div class="invalid-feedback" style="display: block;">
                                    姓(カタカナ)を入力してください。
                                  </div>
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label for="">名(カタカナ)</label>
                                  <input type="text" name="mei_kana" class="form-control" id="" placeholder="タロウ">
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label for="">メールアドレス</label>
                                  <input type="text" name="mail" class="form-control" id="email" placeholder="yamada@gmail.com">
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label>店舗</label>
                                  <div class="row">
                                    <div class="col-md-6">
                                      {{ Form::select('store_id', App\Models\Store::pluck('name', 'id'), old('store_id'), ['class' => 'form-control', 'placeholder' => '選択してください']) }}
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label>カテゴリー</label>
                                  <div class="row">
                                    <div class="col-md-6">
                                      {{ Form::select('category_id', App\Models\Category::pluck('name', 'id'), old('category_id'), ['class' => 'form-control', 'placeholder' => '選択してください']) }}
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label>性別</label>
                                  <div class="row">
                                    <div class="col-md-6">
                                      {{ Form::select('gender', \App\Enums\User\Gender::List, old('gender'), ['class' => 'form-control', 'placeholder' => '選択してください']) }}
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label>生年月日</label>
                                  <input type="text" name="birth" class="form-control datepicker">
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label>アカウント権限</label>
                                  <div class="row">
                                    <div class="col-md-6">
                                      {{ Form::select('role', \App\Enums\User\Role::List_for_organization_admin, old('role'), ['class' => 'form-control', 'placeholder' => '選択してください']) }}
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="col-sm-6">
                                <label for="profession">パスワード(8文字以上)</label>
                                <input type="password" name="password" class="form-control" id="profession" placeholder="パスワード" value="">
                              </div>
                            </div>
                            <div class="col-lg-12 text-right">
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

@endsection()

@section('js')
<script src="{{ asset('/plugins/dropify/dropify.min.js') }}"></script>
<script src="{{ asset('/js/users/account-settings.js') }}"></script>
@endsection()
