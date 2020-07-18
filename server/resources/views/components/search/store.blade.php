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
