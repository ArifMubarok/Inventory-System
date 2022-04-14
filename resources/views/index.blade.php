<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="css/owl.carousel.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    
    <!-- Style -->
    <link rel="stylesheet" href="css/style.css">

    <title>{{ $title }}</title>
  </head>
  <body>
  

  <div class="d-lg-flex half">
    
    
    <div class="contents order-1 order-md-2">

        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-md-7">

                    @if (session()->has('loginError'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ session('loginError') }}
                        </div>
                    @endif
                    <h3><strong>Login System</strong></h3>
                    <p class="mb-4">Sistem Informasi Manajemen Inventaris</p>
                    <form action="/" method="post">
                        @csrf
                    <div class="form-group first">
                        <label for="username">Username</label>
                        <input type="text" name="username" class="form-control" placeholder="Username" id="username" autofocus required value="{{ old('username') }}">
                    </div>
                    <div class="form-group last mb-3">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Password" id="password" required>
                    </div>
                    

                    <input type="submit" value="Log In" class="btn btn-block btn-primary">

                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="bg order-2 order-md-1" style="background-image: url('img/bg_login.png')">
        <div class="position-relative">
            <div class="position-absolute bottom-0 end-0 py-2 px-3 text-white">
                <h1>msInventaris</h1>
                <p><strong>Sistem Informasi Manajemen Inventaris</strong></p>
            </div>
        </div>
    </div>

    
  </div>
    
    

    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
  </body>
</html>