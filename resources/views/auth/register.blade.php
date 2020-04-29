<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <meta name="keywords" content="#">
  <meta name="description" content="#">
  <title>Inscription</title>
  <!-- Fav and touch icons -->
  <link rel="apple-touch-icon-precomposed" sizes="144x144" href="#">
  <link rel="apple-touch-icon-precomposed" sizes="114x114" href="#">
  <link rel="apple-touch-icon-precomposed" sizes="72x72" href="#">
  <link rel="apple-touch-icon-precomposed" href="#">
  <link rel="shortcut icon" href="#">
  <!-- Bootstrap -->
  <link href="assets/css/bootstrap.min.css" rel="stylesheet">
  <!-- Fontawesome -->
  <link href="assets/css/font-awesome.css" rel="stylesheet">
  <!-- Flaticons -->
  <link href="assets/css/font/flaticon.css" rel="stylesheet">
  <!-- Swiper Slider -->
  <link href="assets/css/swiper.min.css" rel="stylesheet">
  <!-- Range Slider -->
  <link href="assets/css/ion.rangeSlider.min.css" rel="stylesheet">
  <!-- magnific popup -->
  <link href="assets/css/magnific-popup.css" rel="stylesheet">
  <!-- Nice Select -->
  <link href="assets/css/nice-select.css" rel="stylesheet">
  <!-- Custom Stylesheet -->
  <link href="assets/css/style.css" rel="stylesheet">
  <!-- Custom Responsive -->
  <link href="assets/css/responsive.css" rel="stylesheet">
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700&amp;display=swap" rel="stylesheet">
  <!-- place -->
</head>

<body>
<div class="inner-wrapper">
  <div class="container-fluid no-padding">
    <div class="row no-gutters overflow-auto">
      <div class="col-md-6">
        <div class="main-banner">
          <img src="assets/img/banner/banner-2.jpg" class="img-fluid full-width main-img" alt="banner">
          <div class="overlay-2 main-padding">
            <img src="assets/img/logo-2.jpg" class="img-fluid" alt="logo">
          </div>
          <img src="assets/img/banner/burger.png" class="footer-img" alt="footer-img">
        </div>
      </div>
      <div class="col-md-6">
        <div class="section-2 user-page main-padding">
          <div class="login-sec">
            <div class="login-box">
              <form method="POST">
                <h4 class="text-light-black fw-600">Créez votre compte</h4>
                <div class="row">
                  <div class="col-lg-6 col-md-12 col-sm-6">
                    <div class="form-group">
                      <label class="text-light-white fs-14">Nom</label>
                      <input type="text" name="nom" class="form-control form-control-submit @error('nom') is-invalid @enderror" placeholder="Ecrivez ici" value="{{ old
                      ('nom') }}" required>
                      @error('nom')
                      <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                      @enderror
                    </div>
                  </div>
                  <div class="col-lg-6 col-md-12 col-sm-6">
                    <div class="form-group">
                      <label class="text-light-white fs-14">Prénom</label>
                      <input type="text" name="prenom" class="form-control form-control-submit @error('prenom') is-invalid @enderror" value="{{ old('prenom') }}"
                             required>
                      @error('prenom')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="form-group">
                      <label class="text-light-white fs-14">Email</label>
                      <input type="email" name="email" class="form-control form-control-submit @error('email') is-invalid @enderror" value="{{ old('email') }}" required>
                      @error('email')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                    </div>
                    <div class="form-group">
                      <label class="text-light-white fs-14">Mot de passe</label>
                      <input type="password" id="password-field" name="password" class="form-control form-control-submit @error('password') is-invalid @enderror"
                             required>
                      @error('password')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                    </div>
                    <div class="form-group">
                      <label class="text-light-white fs-14">Confirmer mot de passe</label>
                      <input type="password" id="password-field" name="password_confirmation" class="form-control form-control-submit @error('password') is-invalid @enderror"
                             required>
                    </div>
                    <div class="form-group">
                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                      <button type="submit" class="btn-second btn-submit full-width">S'inscrire</button>
                    </div>
                    <div class="form-group text-center">
                      <p class="text-light-black mb-0">vous avez déjà un compte? <a href="/login">S'identifier</a>
                      </p>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Place all Scripts Here -->
<!-- jQuery -->
<script src="assets/js/jquery.min.js"></script>
<!-- Popper -->
<script src="assets/js/popper.min.js"></script>
<!-- Bootstrap -->
<script src="assets/js/bootstrap.min.js"></script>
<!-- Range Slider -->
<script src="assets/js/ion.rangeSlider.min.js"></script>
<!-- Swiper Slider -->
<script src="assets/js/swiper.min.js"></script>
<!-- Nice Select -->
<script src="assets/js/jquery.nice-select.min.js"></script>
<!-- magnific popup -->
<script src="assets/js/jquery.magnific-popup.min.js"></script>
<!-- Maps -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDnd9JwZvXty-1gHZihMoFhJtCXmHfeRQg"></script>
<!-- sticky sidebar -->
<script src="assets/js/sticksy.js"></script>
<!-- organza Js -->
<script src="assets/js/organza.js"></script>
<!-- /Place all Scripts Here -->
</body>
</html>
