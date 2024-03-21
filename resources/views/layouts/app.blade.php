<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ asset('/css/app.css') }}" rel="stylesheet">
    <title>@yield('title', 'CSIS 3280 Project')</title>
  </head>
  <body>
    <!--Header goes here-->
    
    
    <!--Website content-->
    <div class="container">
        @yield('content')
    </div>

  </body>
</html>