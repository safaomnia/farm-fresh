<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Bootstrap CSS -->
  <link href="{{ URL::asset('css/style.css') }}" type="text/css" rel="stylesheet"/>
  <link href="{{ URL::asset('css/bootstrap-datepicker.css') }}" type="text/css" rel="stylesheet"/>
  <!-- Favicon -->
  <!-- Favicon and Touch Icons -->
  <link href="{{ URL::asset('images/favicon.png') }}" rel="shortcut icon" type="image/png">
  <link href="{{ URL::asset('images/apple-touch-icon.png') }}" rel="apple-touch-icon">
  <link href="{{ URL::asset('images/apple-touch-icon-72x72.png') }}" rel="apple-touch-icon"
        sizes="72x72">
  <link href="{{ URL::asset('images/apple-touch-icon-114x114.png') }}" rel="apple-touch-icon"
        sizes="114x114">
  <link href="{{ URL::asset('images/apple-touch-icon-144x144.png') }}" rel="apple-touch-icon"
        sizes="144x144">
  <title>TravelGo - Travel, Tour Booking HTML5 Template</title>

  <style>
    a.btn-action {
      background: #222;
      color: #fff;
      padding: 9px 13px;
      margin: 0 0 0 15px;
    }
  </style>
</head>
<body>
<!-- ======================= header Start-->
<header class="header-static navbar-sticky navbar-light shadow">
  <!-- Search -->
  <div class="top-search collapse bg-light" id="search-open" data-parent="#search">
    <div class="container">
      <div class="row position-relative">
        <div class="col-md-8 mx-auto py-5">
          <form>
            <div class="input-group">
              <input class="form-control border-radius-right-0 border-right-0" type="text" name="search" autofocus placeholder="Que cherchez-vous?">
              <button type="button" class="btn btn-grad border-radius-left-0 mb-0">Rechercher</button>
            </div>
          </form>
          <p class="small mt-2 mb-0"><strong>nb.</strong> rechercher par nom d'hôtel</p><!--search here with data mining-->
        </div>
        <a class="position-absolute top-0 right-0 mt-3 mr-3" data-toggle="collapse" href="#search-open">
          <i class="fas fa-window-close"></i>
        </a>
      </div>
    </div>
  </div>
  <!-- End Search -->

  <!-- Logo Nav Start -->
  <nav class="navbar navbar-expand-lg">
    <div class="container">
      <!-- Logo -->
      <a class="navbar-brand" href="index.html">
        <img src="{{url::asset('images/logo-header.png')}}" alt="travelgo">
      </a>
      <!-- Menu opener button -->
      <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse"
              data-target="#navbarCollapse" aria-controls="navbarCollapse"
              aria-expanded="false"
              aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"> </span>
      </button>
      <!-- Main Menu Start -->
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav ml-auto">
          <!-- Menu item 1 Demos-->
          <li class="nav-item {{ (\Route::is('home')) ? 'active' : '' }}">
            <a class="nav-link" href="/" id="docMenu">Acceuil </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" onclick="return false"> | </a>
          </li>
          @guest
            <li class="nav-item">
              <a class="nav-link {{ (\Route::is('hotel')) ? 'active' : '' }}" href="{{ route("hotel") }}" id="docMenu"> Hôtel </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="docMenu"> | </a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{ (\Route::is('voiture')) ? 'active' : '' }}" id="docMenu"> Voiture </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="docMenu"> | </a>
            </li>
          @else
            @if(Auth::user()->profil == 'agent_hotel')
              <li class="nav-item dropdown {{ (\Route::is('room')) ? 'active' : '' }}">
                <a class="nav-link dropdown-toggle" href="#" id="demosMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Chambre </a>
                <ul class="dropdown-menu" aria-labelledby="homeMenu">
                  <li>
                    <a class="dropdown-item" href="{{ route('room') }}">List de chambres</a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="{{ route('room.create') }}">Ajouter nouvelle chambre</a>
                  </li>
                </ul>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="docMenu"> |</a>
              </li>
              <li class="nav-item {{ (\Route::is('reservation')) ? 'active' : '' }}">
                <a class="nav-link" href=""> Réservations </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="docMenu"> |</a>
              </li>
            @elseif(Auth::user()->profil == "agent_agence")
              <li class="nav-item dropdown {{ (\Route::is('car')) ? 'active' : '' }}">
                <a class="nav-link dropdown-toggle" href="#" id="demosMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Voiture </a>
                <ul class="dropdown-menu" aria-labelledby="homeMenu">
                  <li>
                    <a class="dropdown-item" href="{{ route('hotel') }}">Vos voitures</a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="{{ route('my.hotel') }}">Liste de voitures</a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="{{ route('my.hotel') }}">Ajouter nouvelle voiture</a>
                  </li>
                </ul>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="docMenu"> |</a>
              </li>
              <li class="nav-item dropdown {{ (\Route::is('room')) ? 'active' : '' }}">
                <a class="nav-link dropdown-toggle" href="#" id="demosMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Chambre </a>
                <ul class="dropdown-menu" aria-labelledby="homeMenu">
                  <li>
                    <a class="dropdown-item" href="{{ route('hotel') }}">List de chambres</a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="{{ route('my.hotel') }}">Ajouter nouvelle chambre</a>
                  </li>
                </ul>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="docMenu"> |</a>
              </li>
            @elseif(Auth::user()->profil == "admin")
               <li class="nav-item dropdown {{ (\Route::is('hotel*')) ? 'active' : '' }}">
                <a class="nav-link dropdown-toggle" href="#" id="demosMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Hôtel</a>
                <ul class="dropdown-menu" aria-labelledby="homeMenu">
                  <li>
                    <a class="dropdown-item" href="{{ route('hotel') }}">Liste des hôtels</a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="{{ route('my.hotel') }}">Ajouter un hôtel</a>
                  </li>
                </ul>
              </li>
               <li class="nav-item dropdown {{ (\Route::is('hotel*')) ? 'active' : '' }}">
                <a class="nav-link dropdown-toggle" href="#" id="demosMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Hôtel</a>
                <ul class="dropdown-menu" aria-labelledby="homeMenu">
                  <li>
                    <a class="dropdown-item" href="{{ route('hotel') }}">Liste des hôtels</a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="{{ route('my.hotel') }}">Ajouter un hôtel</a>
                  </li>
                </ul>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="docMenu"> |</a>
              </li>
              <li class="nav-item {{ (\Route::is('location')) ? 'active' : '' }}">
                <a class="nav-link" id="docMenu"> Utilisateurs </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="docMenu"> |</a>
              </li>
            @else
              <li class="nav-item dropdown {{ (\Route::is('hotel*')) ? 'active' : '' }}">
                <a class="nav-link dropdown-toggle" href="#" id="demosMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Hôtel </a>
                <ul class="dropdown-menu" aria-labelledby="homeMenu">
                  <li>
                    <a class="dropdown-item" href="{{ route('hotel') }}">Liste d'hôtels</a></li>
                  <li>
                    <a class="dropdown-item" href="{{ route('reservation') }}">Vos réservation</a>
                  </li>
                </ul>
              </li>
              <li class="nav-item">
                <a onclick="return false" class="nav-link"> | </a>
              </li>
              <li class="nav-item dropdown {{ (\Route::is('car*')) ? 'active' : '' }}">
                <a class="nav-link dropdown-toggle" href="#" id="demosMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Voiture </a>
                <ul class="dropdown-menu" aria-labelledby="homeMenu">
                  <li>
                    <a class="dropdown-item" href="{{ route('my.hotel') }}">Liste de voitures</a></li>
                  <li>
                    <a class="dropdown-item" href="{{ route('hotel') }}">Vos locations</a></li>
                </ul>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="docMenu"> | </a>
              </li>
            @endif
          @endguest
        </ul>
      </div>
      <div class="navbar-nav">
        <!-- extra item Search-->
        <div class="nav-item search border-0 pl-3 pr-0 px-lg-2" id="search">
          <a class="nav-link" data-toggle="collapse" href="#search-open"><i class="fas fa-search"></i></a>
        </div>
        <li class="nav-item">
          <a class="nav-link" id="docMenu" style="margin-left: -10px;"> | </a>
        </li>
        <!-- extra item Btn-->
        <div class="nav-item border-0 d-none d-lg-inline-block align-self-center dropdown">
          @guest
            <div class="dropdown">
              <a class="nav-link dropdown-toggle {{ (\Route::is('login') or \Route::is('register')) ? 'active' : '' }}" href="#" role="button" id="dropdownAccount"
                 data-toggle="dropdown"
                 aria-haspopup="true" aria-expanded="false">
                <i class="far fa-user mr-2"></i>Compte
              </a>
              <div class="dropdown-menu mt-2 shadow" aria-labelledby="dropdownAccount">
                <a class="dropdown-item" href="{{ route('login') }}">Connecter</a>
                <a class="dropdown-item" href="{{ route('register') }}">Inscrire</a>
              </div>
            </div>
          @else
            <div class="dropdown">
              <a class="nav-link dropdown-toggle {{ (\Route::is('profile')) ? 'active' : '' }}" href="#" role="button" id="dropdownAccount"
                 data-toggle="dropdown"
                 aria-haspopup="true" aria-expanded="false">
                <i class="far fa-user mr-2"></i>
                {{ Auth::user()->prenom }} {{ Auth::user()->nom }}
              </a>
              <div class="dropdown-menu mt-2 shadow" aria-labelledby="dropdownAccount">
                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Déconnecter</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf</form>
              </div>
            </div>
          @endguest
        </div>
      </div>
    </div>
  </nav>
  <!-- Logo Nav End -->
</header>
<!-- ======================= header End-->
@yield('content')
<!-- ======================= footer  -->
<footer class="footer footer-dark">
  <div class="d-md-flex justify-content-between align-items-center py-3 text-center text-md-left">
    <!-- copyright text -->
    <div class="copyright-text">© 2019 Tous droits réservés par <a href="#"> TravelGo.</a></div>
  </div>
</footer>
<!-- ======================= footer  -->
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="{{ url::asset('js/jquery.min.js') }}" type="text/javascript"></script>
<script src="{{ url::asset('js/popper.min.js') }}" type="text/javascript"></script>
<script src="{{ url::asset('js/bootstrap.min.js') }}" type="text/javascript"></script>
<script src="{{ url::asset('js/functions.js') }}" type="text/javascript"></script>
<script src="{{ url::asset('js/owl.carousel.min.js') }}" type="text/javascript"></script>
<script src="{{ url::asset('js/slick.js') }}" type="text/javascript"></script>
<script src="{{ url::asset('js/swiper.min.js') }}" type="text/javascript"></script>
<script src="{{ url::asset('js/main.js') }}" type="text/javascript"></script>
<script src="{{ url::asset('js/jquery.fancybox.min.js') }}" type="text/javascript"></script>
<script src="{{ url::asset('js/bootstrap-datepicker.min.js') }}" type="text/javascript"></script>
<script src="{{ url::asset('js/jquery-ui.min.js') }}" type="text/javascript"></script>
</body>
</html>
