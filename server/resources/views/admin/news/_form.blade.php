<form action="/admin/news/<?= isset($add) ? 'store' : "update/$news->id" ?>" method="post">
  @csrf
  <div class="form-group col-xl-4 col-md-12 col-sm-12 col-12">
    <label>店舗</label>
    <select class="form-control @error('store_id') is-invalid @enderror" name="store_id">
      <option selected="selected" value="">選択してください</option>
      @foreach($stores as $k => $v)
        <option value="{{ $k }}" {{ isset($news->store_id) && $news->store_id == $k ? 'selected': '' }}>
          {{ $v }}
        </option>
      @endforeach
    </select>
    @component('components.validations.feedback', ['message' => 'store_id'])
    @endcomponent
  </div>
  <div class="form-group col-xl-4 col-md-12 col-sm-12 col-12">
    <label>タイトル</label>
    <input type="text" name="title" value="{{ $news->title ?? null }}" class="form-control @error('title') is-invalid @enderror">
    @component('components.validations.feedback', ['message' => 'title'])
    @endcomponent
  </div>
  <div class="form-group col-xl-10 col-md-12 col-sm-12 col-12">
    <label>本文</label>
    <textarea name="content" id="news-content">{{ $news->content ?? null }}</textarea>
    @component('components.validations.feedback', ['message' => 'content'])
    @endcomponent
  </div>
  <div class="col-xl-10 col-md-12 col-sm-12 col-12 text-right">
    <button type="submit" class="btn btn-primary mb-2 mt-5">保存</button>
  </div>
</form>
