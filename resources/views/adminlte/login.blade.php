<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title',config('app.name'))</title>

  @include('adminlte.style')
</head>
<body class="hold-transition login-page">
  @yield('content')

  @include('adminlte.script')
  @yield('script')
</body>
</html>
