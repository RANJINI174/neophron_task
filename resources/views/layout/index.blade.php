<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- <title>Sports</title> --}}
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </head>
    <style>
        header {
            background-color: #333;
            color: #fff;
            padding: 10px 20px;
            text-align: center;
        }
        .container{
           // display: flex;

        }
        </style>
<body>
    <header>
        <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
      <div class="container-fluid">
     <a  class="navbar-brand" href="{{ url('sports') }}">【ＮＥＯＰＨＲＯＮ】<h2></h2></a>
     {{-- <a  class="navbar-brand" href="{{ url('register') }}">register<h2></h2></a> --}}


     <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse  justify-content-end px-4" id="collapsibleNavbar">
            <ul class="navbar-nav" >
              <li class="nav-item">
                <a class="nav-link" href="{{ url('sales') }}"><h5>sales</h5></a>
            </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ url('saleItems') }}"><h5>saleItems</h5></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{url('register')}}"><h5>Register</h5></a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="{{ url('login') }}"><h5>login</h5></a>
            </li>
            <li class="nav-item dropdown">

                <button class="btn btn-dark btn-lg dropdown-toggle " type="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Customers
                  </button>
                  <ul class="dropdown-menu dropdown-menu-dark">
                      <li><a class="dropdown-item" href="{{ url('/customers') }}">Customer Details</a></li>
                      <li><a class="dropdown-item" href="{{ url('/groups') }}">Group Details</a></li>
                  </ul>
              </li>
            </ul>
        </div>
   </header>
   <br>
    <div class="container">
    @yield('content')
</div>
</body>
</html>

