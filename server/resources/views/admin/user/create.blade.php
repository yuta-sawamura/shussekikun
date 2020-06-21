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
              <form action="/admin/user/store" method="post" enctype="multipart/form-data" class="section general-info">
                @csrf
                <div class="info">
                  <h6>会員追加</h6>
                  <div class="row">
                    <div class="col-lg-11 mx-auto">
                      <div class="row">
                        <div class="col-xl-2 col-lg-12 col-md-4">
                          <div class="upload mt-4 pr-md-4">
                            <input type="file" name="img" id="input-file-max-fs" class="dropify" data-default-file="" data-max-file-size="2M" />
                            <p class="mt-2"><i class="flaticon-cloud-upload mr-1"></i>画像アップロード</p>
                            @component('components.validations.feedback', ['message' => 'img'])
                            @endcomponent
                          </div>
                        </div>
                        <div class="col-xl-10 col-lg-12 col-md-8 mt-md-0 mt-4">
                          <div class="form">
                            <div class="row">
                              @can('system-only')
                                <div class="col-md-12">
                                  <div class="form-group">
                                    <label>組織<span class="text-danger">*</span></label>
                                    <div class="row">
                                      <div class="col-md-6">
                                        <select name="organization_id" class="form-control @error('organization_id') is-invalid @enderror" required>
                                          <option selected="selected" value="">選択してください</option>
                                          @foreach($organizations as $k => $v)
                                            <option value="{{ $k }}" @if (old('organization_id') == $k) selected @endif>
                                              {{ $v }}
                                            </option>
                                          @endforeach
                                        </select>
                                        @component('components.validations.feedback', ['message' => 'organization_id'])
                                        @endcomponent
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              @endcan
                              <div class="col-md-12">
                                <div class="form-group">
                                  <label>アカウント権限<span class="text-danger">*</span></label>
                                  <div class="row">
                                    <div class="col-md-6">
                                      <select name="role" class="form-control @error('role') is-invalid @enderror" required>
                                        <option selected="selected" value="">選択してください</option>
                                        @can('system-only')
                                          @foreach(App\Enums\User\Role::getInstances() as $role)
                                            <option value="{{ $role->value }}" @if (old('role')==$role->value) selected @endif>
                                              {{ $role->description }}
                                            </option>
                                          @endforeach
                                        @elsecan('organization-admin-only')
                                          @foreach(App\Enums\User\Role::getListByOrganizationAdmin() as $k => $value)
                                            <option value="{{ $k }}" @if (old('role')==$k) selected @endif>
                                              {{ $value }}
                                            </option>
                                          @endforeach
                                        @endcan
                                      </select>
                                      @component('components.validations.feedback', ['message' => 'role'])
                                      @endcomponent
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="col-md-6" id="email">
                                <div class="form-group">
                                  <label for="">メールアドレス<span class="text-danger">*</span></label>
                                  <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="yamada@gmail.com" value="{{ old('email') }}" required>
                                  @component('components.validations.feedback', ['message' => 'email'])
                                  @endcomponent
                                </div>
                              </div>
                              <div class="col-sm-6" id="password">
                                <label for="profession">パスワード(8文字以上)<span class="text-danger">*</span></label>
                                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="profession" placeholder="パスワード" value="{{ old('password') }}" required>
                                @component('components.validations.feedback', ['message' => 'password'])
                                @endcomponent
                              </div>
                              <div class="col-md-6" id="store">
                                <div class="form-group">
                                  <label>店舗<span class="text-danger">*</span></label>
                                  <div class="row">
                                    <div class="col-md-12">
                                      <select class="form-control @error('store_id') is-invalid @enderror" name="store_id" required>
                                        <option selected="selected" value="">選択してください</option>
                                        @foreach($stores as $k => $v)
                                          <option value="{{ $k }}" @if(old('store_id')==$k) selected @endif>
                                            {{ $v }}
                                          </option>
                                        @endforeach
                                      </select>
                                      @component('components.validations.feedback', ['message' => 'store_id'])
                                      @endcomponent
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="col-md-6" id="category">
                                <div class="form-group">
                                  <label>カテゴリー<span class="text-danger">*</span></label>
                                  <div class="row">
                                    <div class="col-md-12">
                                      <select class="form-control @error('category_id') is-invalid @enderror" name="category_id" required>
                                        <option selected="selected" value="">選択してください</option>
                                        @foreach($categories as $k => $v)
                                          <option value="{{ $k }}" @if(old('category_id')==$k) selected @endif>
                                            {{ $v }}
                                          </option>
                                        @endforeach
                                      </select>
                                      @component('components.validations.feedback', ['message' => 'category_id'])
                                      @endcomponent
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label for="">姓<span class="text-danger">*</span></label>
                                  <input type="text" name="sei" class="form-control @error('sei') is-invalid @enderror" placeholder="山田" value="{{ old('sei') }}" required>
                                  @component('components.validations.feedback', ['message' => 'sei'])
                                  @endcomponent
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label for="">名<span class="text-danger">*</span></label>
                                  <input type="text" name="mei" class="form-control @error('mei') is-invalid @enderror" placeholder="太郎" value="{{ old('mei') }}" required>
                                  @component('components.validations.feedback', ['message' => 'mei'])
                                  @endcomponent
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label for="">姓(カタカナ)</label>
                                  <input type="text" name="sei_kana" class="form-control @error('sei_kana') is-invalid @enderror" placeholder="ヤマダ" value="{{ old('sei_kana') }}">
                                  @component('components.validations.feedback', ['message' => 'sei_kana'])
                                  @endcomponent
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label for="">名(カタカナ)</label>
                                  <input type="text" name="mei_kana" class="form-control @error('mei_kana') is-invalid @enderror" placeholder="タロウ" value="{{ old('mei_kana') }}">
                                  @component('components.validations.feedback', ['message' => 'mei_kana'])
                                  @endcomponent
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label>性別<span class="text-danger">*</span></label>
                                  <div class="row">
                                    <div class="col-md-12">
                                      <select name="gender" class="form-control @error('gender') is-invalid @enderror" required>
                                        <option selected="selected" value="">選択してください</option>
                                        @foreach(App\Enums\User\Gender::getInstances() as $gender)
                                          <option value="{{ $gender->value }}" @if (old('gender')==$gender->value) selected @endif>
                                            {{ $gender->description }}
                                          </option>
                                        @endforeach
                                      </select>
                                      @component('components.validations.feedback', ['message' => 'gender'])
                                      @endcomponent
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label>生年月日<span class="text-danger">*</span></label>
                                  <input type="text" name="birth" value="{{ old('birth') }}" class="form-control datepicker @error('birth') is-invalid @enderror" required>
                                    @component('components.validations.feedback', ['message' => 'birth'])
                                    @endcomponent
                                </div>
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
<script>
  $(function () {
    const defaultVal = $('[name=role]').val();
    shoWHideByRole(defaultVal);
  });

  $('[name=role]').change(function () {
    const val = $('[name=role]').val();
    shoWHideByRole(val);
  });

  const system_user = @json(App\Enums\User\Role::System);
  const organization_admin_user = @json(App\Enums\User\Role::Organization_admin);
  const store_share_user = @json(App\Enums\User\Role::Store_share);
  const normal_user = @json(App\Enums\User\Role::Normal);

  function shoWHideByRole(val) {
    if (val == system_user || val == organization_admin_user) {
      $('#email, #password').show();
      $('#email, #password').find($('input')).prop('required', true);
      $('#store, #category').hide();
      $('#store, #category').find($('select')).prop('required', false).val('');
    } else if (val == store_share_user) {
      $('#email, #password, #store').show();
      $('#email, #password, #store').find($('input, select')).prop('required', true);
      $('#category').hide();
      $('#category').find($('select')).prop('required', false).val('');
    } else if (val == normal_user) {
      $('#store, #category').show();
      $('#store, #category').find($('select')).prop('required', true);
      $('#email, #password').hide();
      $('#email, #password').find($('input')).prop('required', false).val('');
    }
  }
</script>
<script src="{{ asset('/plugins/dropify/dropify.min.js') }}"></script>
<script src="{{ asset('/js/users/account-settings.js') }}"></script>
@endsection()
