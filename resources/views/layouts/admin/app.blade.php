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
  <link rel="stylesheet" type="text/css" href="{{ asset('/bootstrap/css/bootstrap.min.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('/css/plugins.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('/css/elements/breadcrumb.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('/plugins/apex/apexcharts.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('/css/elements/alert.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('/css/dashboard/dash_1.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('/css/forms/theme-checkbox-radio.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('/plugins/table/datatable/dt-global_style.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('/plugins/table/datatable/custom_dt_custom.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('/css/components/custom-modal.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('/css/users/user-profile.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('/plugins/dropify/dropify.min.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('/css/users/account-setting.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('/plugins/editors/markdown/simplemde.min.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('/bootstrap/css/bootstrap-datepicker.min.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('/css/jquery.timepicker.min.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('/css/elements/avatar.css') }}">
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
  <script src="{{ asset('js/app.js') }}"></script>
  @yield('js')
  <!-- END SCRIPTS -->

  <script>
    $(document).ready(function () {
      App.init();
    });
  </script>
  <script src="{{ asset('js/double.js') }}"></script>
  <script src="{{ asset('js/submit_logout.js') }}"></script>

</body>
</html>
