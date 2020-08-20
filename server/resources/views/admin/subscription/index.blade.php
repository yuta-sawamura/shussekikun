@extends('layouts.admin.app')
@section('content')

<script src="https://js.stripe.com/v3/"></script>

<div id="content" class="main-content">
  @component('components.alerts.app')
  @endcomponent
  <div class="layout-px-spacing">
    <div class="row layout-top-spacing layout-spacing">
      <div class="col-lg-12">
        <div class="breadcrumb-five">
          <ul class="breadcrumb">
            <li class="mb-2"><a href="admin_user_aggregate.html">ホーム</a></li>
            <li class="active mb-2"><a href="">プレミアム会員</a></li>
          </ul>
        </div>
        <div class="statbox widget box box-shadow">
          <div class="widget-header">
            <div class="row">
              <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                <h4>プレミアム会員 <small class="text-danger">*テスト機能です。</small></h4>
              </div>
            </div>
          </div>
          <div class="widget-content widget-content-area">
            <div class="table-responsive mb-4 style-1">
              <div id="style-1_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">
                <div class="row">
                  <div class="col-md-8 col-md-offset-2">
                    <div class="panel panel-default">
                      <div class="panel-body">
                        @if ($type === 'subscribe')
                          <p>【テスト情報】</p>
                          <p>- メールアドレス：test@gmail.com</p>
                          <p>- カード情報：4242424242424242</p>
                          <p>- 有効期限：12 / 30</p>
                          <p>- CVS：333</p>
                          <form action="{{ asset('admin/subscription/subscribe') }}" method="POST">
                            @csrf
                            <script
                              src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                              data-key="{{ env('STRIPE_KEY') }}"
                              data-amount="1000"
                              data-name="SHUSSEKIKUN"
                              data-label="プレミアム会員"
                              data-description="プレミアム会員で便利な機能を使用"
                              data-image="{{ asset('/img/logo.png') }}"
                              data-locale="auto"
                              data-currency="JPY">
                            </script>
                          </form>
                        @elseif ($type === 'cancel')
                          <form action="{{ asset('admin/subscription/cancel') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-danger">キャンセル</button>
                          </form>
                        @endif
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection()
