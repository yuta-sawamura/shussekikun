<div class="row">
  <div class="col-lg-11 mx-auto">
    <div class="row">
      <div class="col-xl-10 col-lg-12 col-md-8 mt-md-0 mt-4">
        <div class="form">
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label for="">店舗名<span class="text-danger">*</span></label>
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="渋谷店" value="{{ $errors->has('*') ? old('name'):($store->name ?? '') }}" required>
                @include('components.validations.feedback', ['message' => 'name'])
              </div>
            </div>
          </div>
          <div class="col-lg-12 text-right">
            @isset ($isEdit)
              <a class="btn btn-danger mb-2 mt-5" href="{{ url('admin/store/delete/' . $store->id) }}" onclick="return confirm('関連データも全て削除されますが本当によろしいですか？')" role="button">削除</a>
            @endisset
            <button type="submit" class="btn btn-primary mb-2 mt-5">保存</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
