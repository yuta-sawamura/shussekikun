<div class="mb-2 col-md-3">
  <label>曜日</label>
  <select class="form-control" name="day">
    <option selected="selected" value="">選択してください</option>
    @foreach($days as $day)
      <option value="{{ $day->value }}" {{ isset($params['day']) && $params['day'] == $day->value ? 'selected': null }}>
        {{ $day->description }}
      </option>
    @endforeach
  </select>
</div>
