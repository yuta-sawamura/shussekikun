<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>SHUSSEKIKUN | 管理画面</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('/img/logo.png') }}">
    <link rel="stylesheet" href="{{ asset('/css/loader.css') }}">
    <script src="{{ asset('/js/loader.js') }}"></script>

    <!-- BEGIN STYLES -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:400,600,700">
    <link rel="stylesheet" type="text/css" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/plugins.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/elements/breadcrumb.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/apex/apexcharts.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/elements/alert.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/dashboard/dash_1.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/forms/theme-checkbox-radio.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/table/datatable/dt-global_style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/table/datatable/custom_dt_custom.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/components/custom-modal.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/users/user-profile.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/dropify/dropify.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/users/account-setting.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/editors/markdown/simplemde.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('bootstrap/css/bootstrap-datepicker.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/jquery.timepicker.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/elements/avatar.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('bootstrap-datepicker-1.9.0-dist/css/bootstrap-datepicker.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/editors/quill/quill.bubble.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('jquery-timepicker-master/jquery.timepicker.css') }}">
    <!-- END STYLES -->
  </head>
  <body>
    <!-- BEGIN LOADER -->
    @include('layouts._loader')
    <!--  END LOADER -->

    <!--  BEGIN NAVBAR  -->
    @include('layouts.admin._header')
    <!--  END NAVBAR  -->

    <!--  BEGIN MAIN CONTAINER  -->
    <div class="main-container" id="container">
      <div class="overlay"></div>

      <!--  BEGIN SIDEBAR  -->
      @include('layouts.admin._sidebar')
      <!--  END SIDEBAR  -->

      <!--  BEGIN CONTENT AREA  -->
      @yield('content')
      <!--  END CONTENT AREA  -->

    </div>
    <!-- END MAIN CONTAINER -->

    <!-- BEGIN SCRIPTS -->
    <script src="{{ asset('js/libs/jquery-3.1.1.min.js') }}"></script>
    <script src="{{ asset('bootstrap/js/popper.min.js') }}"></script>
    <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('plugins/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/submit_logout.js') }}"></script>
    <script src="{{ asset('js/prop_disable.js') }}"></script>
    <script src="{{ asset('bootstrap-datepicker-1.9.0-dist/js/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('bootstrap-datepicker-1.9.0-dist/locales/bootstrap-datepicker.ja.min.js') }}"></script>
    <script src="{{ asset('jquery-timepicker-master/jquery.timepicker.min.js') }}"></script>
    @yield('js')
    <script>
      $(document).ready(function() {
        App.init();
      });

      // datepickerの日本語化
      (function ($) {
        $.fn.datepicker.dates["ja"] = {
          days: ["日曜", "月曜", "火曜", "水曜", "木曜", "金曜", "土曜"],
          daysShort: ["日", "月", "火", "水", "木", "金", "土"],
          daysMin: ["日", "月", "火", "水", "木", "金", "土"],
          months: ["1月", "2月", "3月", "4月", "5月", "6月", "7月", "8月", "9月", "10月", "11月", "12月"],
          monthsShort: ["1月", "2月", "3月", "4月", "5月", "6月", "7月", "8月", "9月", "10月", "11月", "12月"],
          today: "今日",
          format: "yyyy-mm-dd",
          titleFormat: "yyyy年mm月",
          clear: "クリア",
        };
      })(jQuery);
      $(".datepicker").datepicker({
        language: "ja",
      });

      $('.timepicker').timepicker({
        step: 15,
        minTime: '10',
      });
    </script>
    <!-- END SCRIPTS -->

  </body>
</html>
