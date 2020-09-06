
@if (session('success_message'))
  @component('components.alerts.success', ['message' => e(session('success_message'))])
  @endcomponent
@endif
@if (session('error_message'))
  @component('components.alerts.error', ['message' => e(session('error_message'))])
  @endcomponent
@endif
