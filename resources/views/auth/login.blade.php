<!DOCTYPE html>
<html lang="en">


<!-- auth-login.html  21 Nov 2019 03:49:32 GMT -->
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Paniwalay | Login</title>
  <!-- General CSS Files -->
  <link rel="stylesheet" href=" {{ asset('public/assets/admin/css/app.min.css') }}">
  <link rel="stylesheet" href=" {{ asset('public/assets/admin/bundles/bootstrap-social/bootstrap-social.css') }}">
  <!-- Template CSS -->
  <link rel="stylesheet" href=" {{ asset('public/assets/admin/css/style.css') }}">
  <link rel="stylesheet" href=" {{ asset('public/assets/admin/css/components.css') }}">
  <!-- Custom style CSS -->
  <link rel="stylesheet" href=" {{ asset('public/assets/admin/css/custom.css') }}">
  <link rel='shortcut icon' type='image/x-icon' href=" {{ asset('public/assets/admin/img/favicon.ico') }} ">
</head>

        
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<body>
  <div id="app">
    <section class="loginSec">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6 backColW">
            <div class="backImgLogin">
              <img src="public/assets/admin/img/paniwalay-LogoBig2.png">
            </div>
          </div>

          <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
            <div class="row d-flex justify-content-center tpMrg">
              <div class="col-sm-12 col-md-12 col-lg-5 col-xl-5">
                <div class="card card-primary mobPiddSet">
                  <div class="card-header">
                    <h4>Login</h4>
                  </div>
                  @if($errors->any())
                    <div class="alert alert-danger">
                     @foreach ($errors->all() as $error)
                         <div>{{$error}}</div>
                     @endforeach
                    </div>
                  @endif
                  <div class="card-body productWrap2">
                    <form method="post" action="{{ route('login') }}" class="contact-form">
                      @csrf
                      <div class="input-block">
                        <label>Email</label>
                        <input id="email" type="email" class="form-control" name="email" data-validate ="Email is required: ex@abc.xyz">                       
                      </div>
                      <div class="input-block">
                        <label for="password" class="control-label">Password</label>
                        <input id="password" type="password" class="form-control" name="password" tabindex="2" data-validate = "Password is required">
                      </div>
                      <div class="float-right dgnHrf">
                        <a href="forgot-password.html" class="text-small">Forgot Password?</a>
                      </div>
                      <div class="form-group" style="display: inline-block;">
                        <div class="custom-control custom-checkbox">
                          <input type="checkbox" name="remember" class="custom-control-input" tabindex="3" id="remember-me">
                          <label class="custom-control-label" for="remember-me">Remember Me</label>
                        </div>
                      </div>

                      <div class="form-group cleItm">
                        <button type="submit" class="btn-lg" tabindex="4">Login</button>
                      </div>
                    </form>
                    <div class="text-center mt-4 mb-3">
                      <div class="text-job text-muted">Login With Social</div>
                    </div>
                    <div class="row sm-gutters">
                      <div class="col-6">
                        <a class="btn btn-block btn-social btn-facebook">
                          <span class="fab fa-facebook"></span> Facebook
                        </a>
                      </div>
                      <div class="col-6">
                        <a class="btn btn-block btn-social btn-twitter">
                          <span class="fab fa-google"></span> Google
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="mt-5 text-muted text-center lastRigPagLink">
                  Don't have an account? <a href="register.html">Create One</a>
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>
    </section>
  </div>


  <!-- Start lable active deactive in input script -->
  <script>
    //material contact form animation
    $(".contact-form")
        .find(".form-control")
        .each(function () {
            var targetItem = $(this).parent();
            if ($(this).val()) {
                $(targetItem)
                    .find("label")
                    .css({
                        top: "-6px",
                        fontSize: "12px",
                        color: "#000"
                    });
            }
        });
    $(".contact-form")
        .find(".form-control")
        .focus(function () {
            $(this)
                .parent(".input-block")
                .addClass("focus");
            $(this)
                .parent()
                .find("label")
                .animate({
                        top: "-6px",
                        fontSize: "12px",
                        color: "#000"
                    }
                    , 300
                );
        });
    $(".contact-form")
        .find(".form-control")
        .blur(function () {
            if ($(this).val().length == 0) {
                $(this)
                    .parent(".input-block")
                    .removeClass("focus");
                $(this)
                    .parent()
                    .find("label")
                    .animate({
                            top: "20px",
                            fontSize: "16px"
                        }
                        , 300
                    );
            }
        });
  </script>
  <!-- End lable active deactive in input script -->


  <!-- General JS Scripts -->
  <script src="public/assets/js/app.min.js"></script>
  <script src="public/assets/js/scripts.js"></script>
  <script src="public/assets/js/custom.js"></script>

</body>
</html>