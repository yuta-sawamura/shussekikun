@if ($errors->has($message))
  <div class="invalid-feedback" style="display: block;">
    {{ $errors->first($message) }}
  </div>
@endif
