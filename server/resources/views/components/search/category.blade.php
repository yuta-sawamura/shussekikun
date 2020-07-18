<div class="mb-2 col-md-3">
  <label>カテゴリー</label>
  <select class="form-control" name="category">
    <option selected="selected" value="">選択してください</option>
    @foreach($categories as $k => $v)
      <option value="{{ $k }}" {{ isset($params['category']) && $params['category'] == $k ? 'selected': null }}>
        {{ $v }}
      </option>
    @endforeach
  </select>
</div>
