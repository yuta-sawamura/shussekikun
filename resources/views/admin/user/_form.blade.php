<div class="row">
  <div class="col-lg-11 mx-auto">
    <div class="row">
      <div class="col-xl-2 col-lg-12 col-md-4">
        <div class="upload mt-4 pr-md-4">
          <input type="file" name="img" id="input-file-max-fs" class="dropify" data-default-file="{{ isset($user->img) && $user->img ? Illuminate\Support\Facades\Storage::disk('s3')->url($user->img) : null }}" data-max-file-size="2M" accept="image/*" />
          <p class="mt-2"><i class="flaticon-cloud-upload mr-1"></i>画像アップロード</p>
          @include('components.validations.feedback', ['message' => 'img'])

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
                          <option value="{{ $k }}" {{ old('organization_id') == $k || isset($user->organization_id) && $user->organization_id == $k ? 'selected': '' }}>
                            {{ $v }}
                          </option>
                        @endforeach
                      </select>
                      @include('components.validations.feedback', ['message' => 'organization_id'])

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
                        @foreach($roles as $role)
                          <option value="{{ $role->value }}" {{ old('role') == $role->value || isset($user->role) && $user->role == $role->value ? 'selected': '' }}>
                            {{ $role->description }}
                          </option>
                        @endforeach
                      @elsecan('organization-admin-only')
                        @foreach(App\Enums\User\Role::getListByOrganizationAdmin() as $k => $value)
                          <option value="{{ $k }}" {{ old('role') == $k || isset($user->role) && $user->role == $k ? 'selected': '' }}>
                            {{ $value }}
                          </option>
                        @endforeach
                      @endcan
                    </select>
                    @include('components.validations.feedback', ['message' => 'role'])

                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6" id="email">
              <div class="form-group">
                <label for="">メールアドレス<span class="text-danger">*</span></label>
                <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="yamada@gmail.com" value="{{ $errors->has('*') ? old('email'):($user->email ?? '') }}" required>
                @include('components.validations.feedback', ['message' => 'email'])

              </div>
            </div>
            <div class="col-sm-6" id="password">
              <label for="profession">パスワード(8文字以上)<span class="text-danger">*</span></label>
              <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="profession" placeholder="パスワード" value="{{ $errors->has('*') ? old('password'):($user->password ?? '') }}" required>
              @include('components.validations.feedback', ['message' => 'password'])

            </div>
            <div class="col-md-6" id="store">
              <div class="form-group">
                <label>店舗<span class="text-danger">*</span></label>
                <div class="row">
                  <div class="col-md-12">
                    <select class="form-control @error('store_id') is-invalid @enderror" name="store_id" required>
                      <option selected="selected" value="">選択してください</option>
                      @foreach($stores as $k => $v)
                        <option value="{{ $k }}" {{ old('store_id') == $k || isset($user->store_id) && $user->store_id == $k ? 'selected': '' }}>
                          {{ $v }}
                        </option>
                      @endforeach
                    </select>
                    @include('components.validations.feedback', ['message' => 'store_id'])

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
                        <option value="{{ $k }}" {{ old('category_id') == $k || isset($user->category_id) && $user->category_id == $k ? 'selected': '' }}>
                          {{ $v }}
                        </option>
                      @endforeach
                    </select>
                    @include('components.validations.feedback', ['message' => 'category_id'])

                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="">姓<span class="text-danger">*</span></label>
                <input type="text" name="sei" class="form-control @error('sei') is-invalid @enderror" placeholder="山田" value="{{ $errors->has('*') ? old('sei'):($user->sei ?? '') }}" required>
                @include('components.validations.feedback', ['message' => 'sei'])

              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="">名<span class="text-danger">*</span></label>
                <input type="text" name="mei" class="form-control @error('mei') is-invalid @enderror" placeholder="太郎" value="{{ $errors->has('*') ? old('mei'):($user->mei ?? '') }}" required>
                @include('components.validations.feedback', ['message' => 'mei'])

              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="">姓(カタカナ)</label>
                <input type="text" name="sei_kana" class="form-control @error('sei_kana') is-invalid @enderror" placeholder="ヤマダ" value="{{ $errors->has('*') ? old('sei_kana'):($user->sei_kana ?? '') }}">
                @include('components.validations.feedback', ['message' => 'sei_kana'])

              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="">名(カタカナ)</label>
                <input type="text" name="mei_kana" class="form-control @error('mei_kana') is-invalid @enderror" placeholder="タロウ" value="{{ $errors->has('*') ? old('mei_kana'):($user->mei_kana ?? '') }}">
                @include('components.validations.feedback', ['message' => 'mei_kana'])

              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label>性別<span class="text-danger">*</span></label>
                <div class="row">
                  <div class="col-md-12">
                    <select name="gender" class="form-control @error('gender') is-invalid @enderror" required>
                      <option selected="selected" value="">選択してください</option>
                      @foreach($genders as $gender)
                        <option value="{{ $gender->value }}" {{ old('role') == $gender->value || isset($user->gender) && $user->gender == $gender->value ? 'selected': '' }}>
                          {{ $gender->description }}
                        </option>
                      @endforeach
                    </select>
                    @include('components.validations.feedback', ['message' => 'gender'])

                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label>生年月日<span class="text-danger">*</span></label>
                <input type="text" name="birth" class="form-control datepicker @error('birth') is-invalid @enderror" value="{{ $errors->has('*') ? old('birth'):($user->birth ?? '') }}" required>
                  @include('components.validations.feedback', ['message' => 'birth'])

              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label>状態<span class="text-danger">*</span></label>
                <div class="row">
                  <div class="col-md-12">
                    <select name="status" class="form-control @error('status') is-invalid @enderror" required>
                      <option selected="selected" value="">選択してください</option>
                      @foreach($status as $s)
                        <option value="{{ $s->value }}" {{ old('status') == $s->value || isset($user->status) && $user->status == $s->value ? 'selected': '' }}>
                          {{ $s->description }}
                        </option>
                      @endforeach
                    </select>
                    @include('components.validations.feedback', ['message' => 'status'])

                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-12 text-right">
            @isset ($isEdit)
              <button type="button" class="btn btn-danger mb-2 mt-5" data-toggle="modal" data-target="#attentionModal{{ $user->id }}">削除</button>
            @endisset
            <button type="submit" id="user-submit" class="btn btn-primary mb-2 mt-5">保存</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
