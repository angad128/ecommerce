<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Admin - Login</title>

   <!-- Custom fonts for this template-->
  <link href="{{URL::to('backend/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="{{URL::to('backend/css/sb-admin-2.min.css')}}" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Welcome!</h1>
                  </div>


                      <form id="sign_in" method="post" action="{{ URL::to('admin-postlogin')}}">
                        @csrf
                        @if(Session::get('message'))
                        <h4 class="h4 text-center text-green-400 mb-2">{{Session::get('message')}}</h4>
                        {{Session::put('message',null)}}
                        @endif
                        <div class="form-group">
                          <input type="admin_email" name="admin_email" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Email Address...">
                        </div>
                        <div class="form-group">
                          <input type="admin_password" name="admin_password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password">
                        </div>

                        <div class="form-group">
                          <div class="custom-control custom-checkbox small">
                            <input type="checkbox" class="custom-control-input" id="customCheck">
                            <label class="custom-control-label" for="customCheck">Remember Me</label>
                          </div>
                        </div>
                        

                        <div class="col-xs-4">
                          <button class="btn btn-block bg-pink waves-effect" type="submit">SIGN IN</button>
                        </div>
                        <hr>
                        <div class="text-center">
                          <a class="small" href="forgot-password.html">Forgot Password?</a>
                        </div>

        
                    </form>


                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="{{URL::to('backend/vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{URL::to('backend/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

  <!-- Core plugin JavaScript-->
  <script src="{{URL::to('backend/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

  <!-- Custom scripts for all pages-->
  <script src="{{URL::to('backend/js/sb-admin-2.min.js')}}"></script>

</body>

</html>
