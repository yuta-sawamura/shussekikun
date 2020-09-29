@extends('layouts.admin.app')
@section('content')
<div id="content" class="main-content">
  <div class="layout-px-spacing">
    <div class="account-settings-container layout-top-spacing">
      <div class="breadcrumb-five">
        <ul class="breadcrumb">
          <li class="mb-2"><a href="{{ url('admin') }}">ホーム</a></li>
          <li class="mb-2"><a href="{{ url('admin/user') }}">会員一覧</a></li>
          <li class="mb-2"><a href="{{ url('admin/user/show', $attendance->user) }}">会員詳細</a></li>
          <li class="active mb-2"><a href="">出席クラス編集</a></li>
        </ul>
      </div>
      <div class="account-content">
        <div class="scrollspy-example" data-spy="scroll" data-target="#account-settings-scroll" data-offset="-100">
          <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
              <form action="/admin/user/attendance/update/{{ $attendance->id }}" method="post" class="section general-info">
                @csrf
                <div class="info">
                  <h6>出席クラス編集</h6>
                  <div class="row">
                    <div class="col-lg-11 mx-auto">
                      <div class="row">
                        <div class="col-xl-10 col-lg-12 col-md-8 mt-md-0 mt-4">
                          <div class="form">
                            <label>{{ $attendance->user->full_name }}</label>
                            <input type="hidden" name="user_id" value="{{ $attendance->user->id }}">
                            @include('components.validations.feedback', ['message' => 'user_id'])
                            <div class="row">
                              <div class="col-md-12">
                                <div class="form-group">
                                  {{ Form::select('schedule_id', $schedules, $attendance->schedule->id, ['class' => 'form-control']) }}
                                  @include('components.validations.feedback', ['message' => 'schedule_id'])
                                </div>
                              </div>
                            </div>
                            <div class="col-lg-12 text-right">
                              <a class="btn btn-danger mb-2 mt-5" href="{{ url('admin/user/attendance/delete', $attendance) }}" onclick="return confirm('本当によろしいですか？')" role="button">削除</a>
                              <button type="submit" class="btn btn-primary mb-2 mt-5">保存</button>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
