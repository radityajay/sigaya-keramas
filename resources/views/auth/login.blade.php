<!doctype html>
<html lang="en">

<head>

  <meta charset="utf-8" />
  <title>Cagar Budaya Desa Keramas | Login</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
  <meta content="Themesdesign" name="author" />
  <!-- App favicon -->
  <link rel="shortcut icon" href="{{ asset('assets/images/logoo.png') }}">

  <!-- Bootstrap Css -->
  <link href="{{ asset('assets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
  <!-- Icons Css -->
  <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
  <!-- App Css-->
  <link href="{{ asset('assets/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />
  <link href="{{ asset('assets/css/style.css') }}" id="app-style" rel="stylesheet" type="text/css" />

</head>

<body class="auth-body-bg">
  <div>
    <div class="container-fluid p-0">
      <div class="row g-0">
        <div class="col-lg-4">
          <div class="authentication-page-content p-4 d-flex align-items-center min-vh-100">
            <div class="w-100">
              <div class="row justify-content-center">
                <div class="col-lg-9">
                  <div class="text-center">
                    <img src="{{ asset('assets/images/logoo.png') }}" width="100" alt="SIGAYA">
                  </div>
                  <div>
                    <div class="text-center">
                      <h4 class="font-size-18 mt-4">Selamat Datang !</h4>
                      <p class="text-muted">Silahkan masuk untuk melanjutkan.</p>
                    </div>

                    <div class="p-2 mt-5">
                      @if ($errors->any())
                      <div class="alert alert-danger">
                        <ul style="margin-bottom:0px;">
                          @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                          @endforeach
                        </ul>
                      </div>
                      @endif
                      @if (session()->has('success'))
                      <div class="alert alert-success">
                        {{ session()->get('success') }}
                      </div>
                      @endif
                      @if (session()->has('error'))
                      <div class="alert alert-danger">
                        {{ session()->get('error') }}
                      </div>
                      @endif
                      <form class="" action="{{ route('login') }}" method="POST">
                        @csrf
                        <div class="mb-3 auth-form-group-custom mb-4">
                          <i class="ri-user-2-line auti-custom-input-icon"></i>
                          <label for="username">Username</label>
                          <input type="text" class="form-control" name="username" id="username"
                            placeholder="Enter username">
                        </div>

                        <div class="mb-3 auth-form-group-custom mb-4">
                          <i class="ri-lock-2-line auti-custom-input-icon"></i>
                          <label for="userpassword">Password</label>
                          <input type="password" class="form-control" name="password" id="userpassword"
                            placeholder="Enter password">
                        </div>

                        <div class="mt-4 text-center">
                          <button class="btn btn-success w-md waves-effect waves-light" type="submit">Log In</button>
                        </div>
                      </form>
                    </div>

                    <div class="mt-5 text-center">
                      <p>© <script>
                          document.write(new Date().getFullYear())
                        </script> SIGAYA. Crafted with <i class="mdi mdi-heart text-danger"></i> by Raditya Jayantara
                      </p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-8">
          <div class="authentication-bg">
            <div class="bg-overlay"></div>
          </div>
        </div>
      </div>
    </div>
  </div>



  <!-- JAVASCRIPT -->
  <script src="{{ asset('assets/libs/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/libs/metismenu/metisMenu.min.js') }}"></script>
  <script src="{{ asset('assets/libs/simplebar/simplebar.min.js') }}"></script>
  <script src="{{ asset('assets/libs/node-waves/waves.min.js') }}"></script>

  <script src="{{ asset('assets/js/app.js') }}"></script>

</body>

</html>