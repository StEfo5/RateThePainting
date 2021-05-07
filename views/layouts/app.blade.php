<!DOCTYPE html>
<html>
<head>
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
    <meta charset="utf-8">
    <style type="">
        @font-face{
            font-family: Pacifico;
            src: url({{asset('fonts/Pacifico.ttf')}});
        }
        @font-face{
            font-family: Baloo;
            src: url({{asset('fonts/Baloo.ttf')}});
        }
        .pacifico {
            font-family: Pacifico;
        }
        .baloo {
            font-family: Baloo;
        }
        .red {
            background: #BF1045;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light shadow red">
      <div class="container-fluid">
        <a class="navbar-brand pacifico text-white ms-4" href="/"><h4 class="mb-0 mt-1">Rate The Painting!</h4></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
          <ul class="navbar-nav ms-md-auto">
            @if (Auth::guest())
                <li class="nav-item">
                  <a class="nav-link baloo text-white" href="/login">Log in</a>
                </li>
                <li class="nav-item me-4">
                  <a class="nav-link baloo text-white" href="/register">Sign in</a>
                </li>
            @else
                <li class="nav-item">
                  <a class="nav-link baloo text-white" href="/upload">Upload</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link baloo text-white" href="/grade">Rate</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link baloo text-white" href="/paintings">Pictures rating</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link baloo text-white" href="/users">Users rating</a>
                </li>
                <li class="nav-item dropdown me-4">
                  <a class="nav-link dropdown-toggle baloo text-white" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    {{Auth::user()->name}}
                  </a>
                  <ul class="dropdown-menu red" aria-labelledby="navbarDropdownMenuLink">
                    <li><a class="dropdown-item text-white baloo" href="/profile">Profile</a></li>
                    <li><a class="dropdown-item text-white baloo" href="/logout">Exit</a></li>
                  </ul>
                </li>
            @endif
          </ul>
        </div>
      </div>
    </nav>
    @yield('content')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>
</body>
</html>