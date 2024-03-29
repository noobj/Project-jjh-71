<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ asset('/css/index.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/admin_home.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/admin_add.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/admin_manage.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>@yield('title', 'CSIS 3280 Project')</title>
  </head>
  <body>
    <!--Header goes here-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark py-4">
      <div class="container">
          <a class="navbar-brand" href=""><img src="{{asset('/img/Logo.png')}}" alt="Logo" width="60" height="50"></a>
          <a class="navbar-brand" href="">Library</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
              aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
              <div class="header navbar-nav ms-auto">
                    <a class="nav-link active" href="{{ route('home.admin.index') }}">Books</a>
                    <a class="nav-link active" href="{{ route('home.admin.showAdd') }}">Add Book</a>
                    <form id="logout" action="{{ route('logout') }}" method="POST">
                        @csrf
                            <a role="button" class="nav-link active" id="logout"
                                      onclick="getElementById('logout').submit()">Logout</a>
                    </form>
              </div>
          </div>
      </div>
  </nav>
    
    <!--Website content-->
    <div class="container">
        @yield('content')
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>