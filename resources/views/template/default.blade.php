<!DOCTYPE html>
<html lang="th">
<head>
  <meta charset="UTF-8">
  <title> HTML - @yield('title')</title>
  <link href="css/bootstrap.css" rel="stylesheet">
   <style>
    body {
      background: linear-gradient(135deg, #60a5fa, #c084fc);
      min-height: 100vh;
    }
  </style>
  @stack('styles')
</head>
<body>

<body class="bg-light">
<div class="container my-5">
  <div class="card shadow">
    <div class="card-body">

      <h1>  </h1>
      @yield('content')


        </div>
        @stack('scripts')
    </body>
</html>
