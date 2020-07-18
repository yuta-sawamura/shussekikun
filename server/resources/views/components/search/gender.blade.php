<div class="mb-2 col-md-3">
  <label>性別</label>
  <select class="form-control" name="gender">
    <option selected="selected" value="">選択してください</option>
    @foreach($genders as $gender)
      <option value="{{ $gender->value }}" {{ isset($params['gender']) && $params['gender'] == $gender->value ? 'selected': null }}>
        {{ $gender->description }}
      </option>
    @endforeach
  </select>
</div>
