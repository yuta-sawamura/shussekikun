<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
  <title>SHUSSEKIKUN</title>
  <link rel="icon" type="image/x-icon" href="{{ asset('/img/logo.png') }}">
  <link rel="stylesheet" href="{{ asset('/css/loader.css') }}">
  <script src="{{ asset('/js/loader.js') }}"></script>

  <!-- BEGIN STYLES -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:400,600,700">
  <link rel="stylesheet" type="text/css" href="{{ asset('/bootstrap/css/bootstrap.min.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('/css/plugins.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('/css/elements/breadcrumb.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('/css/elements/alert.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('/plugins/apex/apexcharts.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('/css/elements/alert.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('/css/dashboard/dash_1.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('/css/forms/theme-checkbox-radio.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('/plugins/table/datatable/dt-global_style.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('/plugins/table/datatable/custom_dt_custom.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('/css/components/custom-modal.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('/css/users/user-profile.css') }}">
  <!-- END STYLES -->

</head>
<body>
  <!-- BEGIN LOADER -->
  @include('layouts._loader')
  <!--  END LOADER -->

  <!--  BEGIN NAVBAR  -->
  @include('layouts._header')
  <!--  END NAVBAR  -->

  <!--  BEGIN MAIN CONTAINER  -->
  <div class="main-container" id="container">
    <div class="overlay"></div>

    <!--  BEGIN SIDEBAR  -->
    @include('layouts._sidebar')
    <!--  END SIDEBAR  -->

    <!--  BEGIN CONTENT AREA  -->
    @yield('content')
    <!--  END CONTENT AREA  -->

  </div>
  <!-- END MAIN CONTAINER -->

  <!-- BEGIN SCRIPTS -->
  <script src="{{ asset('/js/libs/jquery-3.1.1.min.js') }}"></script>
  <script src="{{ asset('/bootstrap/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('/js/app.js') }}"></script>
  <script src="{{ asset('/plugins/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
  <script src="{{ asset('/bootstrap/js/popper.min.js') }}"></script>
  <!-- END SCRIPTS -->

  <script>
    $(document).ready(function () {
      App.init();
    });
  </script>

</body>
</html>
