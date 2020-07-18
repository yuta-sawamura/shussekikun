<div class="row">
  <div class="col-sm-12">
    <table id="style-1" class="table style-1 table-hover non-hover dataTable no-footer" role="grid" aria-describedby="style-1_info" style="table-layout: fixed; width: 100%;">
      <thead>
        <tr role="row">
          <th tabindex="0" aria-controls="style-1" rowspan="1" colspan="1" style="width: 150px;">店舗</th>
          <th tabindex="0" aria-controls="style-1" rowspan="1" colspan="1" style="width: 150px;">タイトル</th>
          <th tabindex="0" aria-controls="style-1" rowspan="1" colspan="1" style="width: 200px;">投稿日</th>
          <th tabindex="0" aria-controls="style-1" rowspan="1" colspan="1" style="width: 110px;"></th>
        </tr>
      </thead>
      <tbody>
        @foreach ($news as $k => $v)
          <tr role="row" class="odd">
            <td>{{ $v->name }}</td>
            <td>{{ $v->title }}</td>
            <td>{{ $v->created_at->format('Y-m-d') }}</td>
            <td>
              @isset ($admin)
                <a href="{{ url('/admin/news/show/' . $v->id) }}" class="btn btn-outline-primary mb-2 mr-2">詳細</a>
              @else
                <a href="{{ url('/news/show/' . $v->id) }}" class="btn btn-outline-primary mb-2 mr-2">詳細</a>
              @endisset
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
<div class="row">
  <div class="col-sm-12 col-md-7">
    <div class="dataTables_paginate paging_simple_numbers">
      {{ $news->links() }}
    </div>
  </div>
</div>
