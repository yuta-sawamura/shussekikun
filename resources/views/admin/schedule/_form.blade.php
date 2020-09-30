<div class="row">
  <div class="col-lg-11 mx-auto">
    <div class="row">
      <div class="col-xl-10 col-lg-12 col-md-8 mt-md-0 mt-4">
        <div class="form">
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label>店舗<span class="text-danger">*</span></label>
                <div class="row">
                  <div class="col-md-12">
                    <select class="form-control @error('store_id') is-invalid @enderror" name="store_id" required>
                      <option selected="selected" value="">選択してください</option>
                      @foreach($stores as $k => $v)
                        <option value="{{ $k }}" {{ old('store_id') == $k || isset($schedule->store_id) && $schedule->store_id == $k ? 'selected': '' }}>
                          {{ $v }}
                        </option>
                      @endforeach
                    </select>
                    @include('components.validations.feedback', ['message' => 'store_id'])
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <label>クラス<span class="text-danger">*</span></label>
                <div class="row">
                  <div class="col-md-12">
                    <select class="form-control @error('classwork_id') is-invalid @enderror" name="classwork_id" required>
                      <option selected="selected" value="">選択してください</option>
                      @foreach($classworks as $k => $v)
                        <option value="{{ $k }}" {{ old('classwork_id') == $k || isset($schedule->classwork_id) && $schedule->classwork_id == $k ? 'selected': '' }}>
                          {{ $v }}
                        </option>
                      @endforeach
                    </select>
                    @include('components.validations.feedback', ['message' => 'classwork_id'])
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <label>曜日<span class="text-danger">*</span></label>
                <div class="row">
                  <div class="col-md-12">
                    <select class="form-control @error('day') is-invalid @enderror" name="day" required>
                      <option selected="selected" value="">選択してください</option>
                      @foreach($days as $day)
                        <option value="{{ $day->value }}" {{ old('day') == $day->value || isset($schedule->day) && $schedule->day == $day->value  ? 'selected': '' }}>
                          {{ $day->description }}
                        </option>
                      @endforeach
                    </select>
                    @include('components.validations.feedback', ['message' => 'day'])
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label>開始時間<span class="text-danger">*</span></label>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <input name="start_at" type="text" class="form-control timepicker @error('start_at') is-invalid @enderror" data-time-format="H:i" value="{{ $errors->has('*') ? old('start_at'):($schedule->start_at ?? '') }}" required>
                      @include('components.validations.feedback', ['message' => 'start_at'])
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label>終了時間<span class="text-danger">*</span></label>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <input name="end_at" type="text" class="form-control timepicker @error('end_at') is-invalid @enderror" data-time-format="H:i" value="{{ $errors->has('*') ? old('end_at'):($schedule->end_at ?? '') }}" required>
                      @include('components.validations.feedback', ['message' => 'end_at'])
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-12 text-right">
            @isset ($isEdit)
              <a class="btn btn-danger mb-2 mt-5" href="{{ url('admin/schedule/delete', $schedule) }}" onclick="return confirm('関連データも全て削除されますが本当によろしいですか？')" role="button">削除</a>
            @endisset
            <button type="submit" class="btn btn-primary mb-2 mt-5">保存</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
