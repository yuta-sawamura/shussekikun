<div class="modal fade" id="attendanceModal{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="attendanceModal" aria-modal="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">出席</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
        </button>
      </div>
      <form action="{{ url($url) }}" method="post">
        @csrf
        <div class="modal-body">
          <ul>
            <li class="mb-2">
              <p>{{ $user->full_name }}</p>
            </li>
            <input type="hidden" name="user_id" value="{{ $user->id }}">
          </ul>
          <div class="form-group">
            <label>スケジュール<span class="text-danger">*</span></label>
            <div class="row">
              <div class="col-md-12">
                {{ Form::select('schedule_id', $schedules, $attendance->schedule->id ?? null, ['class' => 'form-control']) }}
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i>キャンセル</button>
          <button type="submit" class="btn btn-primary">出席</button>
        </div>
      </form>
    </div>
  </div>
</div>
