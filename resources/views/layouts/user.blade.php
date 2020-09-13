<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
  <title>SHUSSEKIKUN</title>
  <link rel="icon" type="image/x-icon" href="{{ secure_asset('/img/logo.png') }}">
  <!-- BEGIN STYLES -->
  <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="{{ secure_asset('/bootstrap/css/bootstrap.min.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ secure_asset('/css/plugins.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ secure_asset('/css/authentication/form-2.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ secure_asset('/css/elements/alert.css') }}">
  <!-- END STYLES -->
</head>

<body class="form">
  @yield('content')

  <!-- BEGIN SCRIPTS -->
  <script src="{{ secure_asset('js/app.js') }}"></script>
  <!-- END SCRIPTS -->
</body>
</html>
