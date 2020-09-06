<form action="/admin/news/<?= isset($add) ? 'store' : "update/$news->id" ?>" method="post" onSubmit="return double()">
  @csrf
  <div class="form-group col-xl-4 col-md-12 col-sm-12 col-12">
    <label>店舗<span class="text-danger">*</span></label>
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
    <label>タイトル<span class="text-danger">*</span></label>
    <input type="text" name="title" value="{{ $news->title ?? null }}" class="form-control @error('title') is-invalid @enderror">
    @component('components.validations.feedback', ['message' => 'title'])
    @endcomponent
  </div>
  <div class="form-group col-xl-10 col-md-12 col-sm-12 col-12">
    <label>本文<span class="text-danger">*</span></label>
    <textarea name="content" id="news-content">{{ $news->content ?? null }}</textarea>
    @component('components.validations.feedback', ['message' => 'content'])
    @endcomponent
  </div>
  <div class="col-xl-10 col-md-12 col-sm-12 col-12 text-right">
    @isset ($isEdit)
      <button type="button" class="btn btn-danger mb-2 mt-5" data-toggle="modal" data-target="#attentionModal{{ $news->id }}">削除</button>
    @endisset
    <button type="submit" class="btn btn-primary mb-2 mt-5">保存</button>
  </div>
</form>
