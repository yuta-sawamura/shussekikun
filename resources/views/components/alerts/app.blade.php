
@if (session('success_message'))
  @include('components.alerts.success', ['message' => e(session('success_message'))])
@endif
@if (session('error_message'))
  @include('components.alerts.error', ['message' => e(session('error_message'))])
@endif
