<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Laravel & Angular</title>
        <link rel="stylesheet" type="text/css" href="{{ asset('bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
    </head>
    <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-success">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="/">Link 1 <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/true">Link 2</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/true">Link 3</a>
            </li>
            {{--  <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Dropdown
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Something else here</a>
                </div>
            </li>  --}}
            {{--  <li class="nav-item">
                <a class="nav-link disabled" href="#">Disabled</a>
            </li>  --}}
            </ul>
            <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
    </nav>
    
    @yield('content')

    <script type="text/javascript" src="{{asset('bower_components/angular/angular.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('bower_components/angular-route/angular-route.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('bower_components/angular-cookies/angular-cookies.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
    <script type="text/javascript" src="{{ asset('bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    
    <script type="text/javascript" src="{{asset('app/app.js')}}"></script>
    <script type="text/javascript" src="{{asset('app/controllers/employee.js')}}"></script>
    <script type="text/javascript" src="{{asset('app/controllers/icross.js')}}"></script>
    <script type="text/javascript" src="{{asset('app/controllers/true.js')}}"></script>

    </body>
</html>