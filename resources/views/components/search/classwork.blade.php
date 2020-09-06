<div class="mb-2 col-md-3">
  <label>クラス</label>
  <select class="form-control" name="classwork">
    <option selected="selected" value="">選択してください</option>
    @foreach($classworks as $k => $v)
      <option value="{{ $k }}" {{ isset($params['classwork']) && $params['classwork'] == $k ? 'selected': null }}>
        {{ $v }}
      </option>
    @endforeach
  </select>
</div>
