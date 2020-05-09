<div class="modal fade show" id="cardAddModal" tabindex="-1" role="dialog" aria-labelledby="cardAddModalLabel" aria-modal="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="inputModalLabel">カード情報追加</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x">
            <line x1="18" y1="6" x2="6" y2="18"></line>
            <line x1="6" y1="6" x2="18" y2="18"></line>
          </svg>
        </button>
      </div>
      <div class="modal-body">
        <div class="col-sm-12">
          <div class="form-group">
            <label for="">カード番号</label>
            <input type="number" class="form-control" id="" placeholder="1234123412341234">
          </div>
        </div>
        <div class="col-sm-6">
          <label class="dob-input">有効期限</label>
          <div class="d-sm-flex d-block">
            <div class="form-group mr-1">
              <select class="form-control">
                <option selected="">1月</option>
                <option>2月</option>
                <option>10月</option>
              </select>
            </div>
            <div class="form-group mr-1">
              <select class="form-control">
                <option>2018年</option>
                <option>2017年</option>
                <option>2016年</option>
                <option selected="">1989年</option>
              </select>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> キャンセル</button>
        <button type="button" class="btn btn-primary">追加</button>
      </div>
    </div>
  </div>
</div>
