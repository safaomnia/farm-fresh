<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <meta name="keywords" content="#">
  <meta name="description" content="#">
  <title>{{ $title ?? 'Farm Fresh' }}</title>
  <!-- Fav and touch icons -->
  <link rel="apple-touch-icon-precomposed" sizes="144x144" href="#">
  <link rel="apple-touch-icon-precomposed" sizes="114x114" href="#">
  <link rel="apple-touch-icon-precomposed" sizes="72x72" href="#">
  <link rel="apple-touch-icon-precomposed" href="#">
  <link rel="shortcut icon" href="#">
  <!-- Bootstrap -->
  <link href="{{ URL::asset('assets/css/bootstrap.min.css')}}" rel="stylesheet">
  <!-- Fontawesome -->
  <link href="{{ URL::asset('assets/css/font-awesome.css')}}" rel="stylesheet">
  <!-- Flaticons -->
  <link href="{{ URL::asset('assets/css/font/flaticon.css')}}" rel="stylesheet">
  <!-- Swiper Slider -->
  <link href="{{ URL::asset('assets/css/swiper.min.css')}}" rel="stylesheet">
  <!-- Range Slider -->
  <link href="{{ URL::asset('assets/css/ion.rangeSlider.min.css')}}" rel="stylesheet">
  <!-- magnific popup -->
  <link href="{{ URL::asset('assets/css/magnific-popup.css')}}" rel="stylesheet">
  <!-- Nice Select -->
  <link href="{{ URL::asset('assets/css/nice-select.css')}}" rel="stylesheet">
  <!-- Custom Stylesheet -->
  <link href="{{ URL::asset('assets/css/style.css')}}" rel="stylesheet">
  <!-- Custom Responsive -->
  <link href="{{ URL::asset('assets/css/responsive.css')}}" rel="stylesheet">
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700&amp;display=swap" rel="stylesheet">
  <!-- place -->
</head>
<body>
<!-- Navigation -->
<div class="header">
  <header class="full-width">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12 mainNavCol">
          <!-- logo -->
          <div class="logo mainNavCol">
            <a href="index-2.html">
              <img src="{{URL::asset('assets/img/logo.png')}}" class="img-fluid" alt="Logo">
            </a>
          </div>
          <!-- logo -->
          <div class="main-search mainNavCol">
            <form class="main-search search-form full-width">
              <div class="row">
                <!-- search -->
                <div class="col-lg-6 col-md-7">
                  <div class="search-box padding-10">
                    <input type="text" class="form-control" placeholder="Fruits, Légume, Lait, Oeufs">
                  </div>
                </div>
                <!-- search -->
              </div>
            </form>
          </div>
          <div class="right-side fw-700 mainNavCol">
            <div class="gem-points">
              <a href="/produit">
                <span>Produit</span>
              </a>
            </div>
            <div class="gem-points">
              <a href="/ferme">
                <span>Ferme</span>
              </a>
            </div>
            <div class="gem-points">
              <a href="/forum">
                <span>Forum</span>
              </a>
            </div>
            @guest
              <div class="gem-points">
                <a href="/register">
                  <span>S'inscrire</span>
                </a>
              </div>
              <div class="gem-points">
                <a href="/login">
                  <span>S'identifer</span>
                </a>
              </div>
          @else
            <!-- mobile search -->
              <div class="mobile-search">
                <a href="#" data-toggle="modal" data-target="#search-box"> <i class="fas fa-search"></i>
                </a>
              </div>
              <!-- mobile search -->
              <!-- user account -->
              <div class="user-details p-relative">
                <a href="#" class="text-light-white fw-500">
                  <?php $photo = Auth::user()->photo; ?>
                  <img src='{{ URL::asset("assets/img/user/$photo") }}' width="50" height="50" class="rounded-circle" alt="user-img">
                  <span> {{ Auth::user()->prenom }} {{ Auth::user()->nom }} </span>
                </a>
                <div class="user-dropdown">
                  <ul>
                    <li>
                      <a href="order-details.html">
                        <div class="icon"><i class="flaticon-rewind"></i>
                        </div>
                        <span class="details">Commandes passées</span>
                      </a>
                    </li>
                    <li>
                      <a href="#">
                        <div class="icon"><i class="flaticon-user"></i>
                        </div>
                        <span class="details">Account</span>
                      </a>
                    </li>
                    <li>
                      <a href="#">
                        <div class="icon"><i class="flaticon-board-games-with-roles"></i>
                        </div>
                        <span class="details">Help</span>
                      </a>
                    </li>
                  </ul>
                  <div class="user-footer"><a href="{{ route('logout') }}"
                                              onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Déconnecter</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf</form>
                  </div>
                </div>
              </div>
              <!-- mobile search -->
              <!-- user notification -->
              <div class="cart-btn notification-btn">
                <a href="#" class="text-light-green fw-700"> <i class="fas fa-bell"></i>
                  <span class="user-alert-notification"></span>
                </a>
                <div class="notification-dropdown">
                  <div class="product-detail">
                    <a href="#">
                      <div class="img-box">
                        <img src="{{URL::asset('assets/img/shop-1.png')}}" class="rounded" alt="image">
                      </div>
                      <div class="product-about">
                        <p class="text-light-black">Lil Johnny’s</p>
                        <p class="text-light-white">Spicy Maxican Grill</p>
                      </div>
                    </a>
                  </div>
                  <div class="rating-box">
                    <p class="text-light-black">How was your last order ?.</p> <span class="text-dark-white"><i class="fas fa-star"></i></span>
                    <span class="text-dark-white"><i class="fas fa-star"></i></span>
                    <span class="text-dark-white"><i class="fas fa-star"></i></span>
                    <span class="text-dark-white"><i class="fas fa-star"></i></span>
                    <span class="text-dark-white"><i class="fas fa-star"></i></span>
                    <cite class="text-light-white">Ordered 2 days ago</cite>
                  </div>
                </div>
              </div>
              <!-- user notification -->
          @endguest
          <!-- user cart -->
            <div class="cart-btn cart-dropdown">
              <a href="#" class="text-light-green fw-700"> <i class="fas fa-shopping-bag"></i>
                <span class="user-alert-cart">3</span>
              </a>
              <div class="cart-detail-box">
                <div class="card">
                  <div class="card-header padding-15">Your Order</div>
                  <div class="card-body no-padding">
                    <div class="cat-product-box">
                      <div class="cat-product">
                        <div class="cat-name">
                          <a href="#">
                            <p class="text-light-green"><span class="text-dark-white">1</span> Chilli Chicken</p> <span
                              class="text-light-white">small, chilli chicken</span>
                          </a>
                        </div>
                        <div class="delete-btn">
                          <a href="#" class="text-dark-white"> <i class="far fa-trash-alt"></i>
                          </a>
                        </div>
                        <div class="price"><a href="#" class="text-dark-white fw-500">
                            $2.25
                          </a>
                        </div>
                      </div>
                    </div>
                    <div class="cat-product-box">
                      <div class="cat-product">
                        <div class="cat-name">
                          <a href="#">
                            <p class="text-light-green"><span class="text-dark-white">1</span> loaded cheese</p> <span
                              class="text-light-white">small, chilli chicken</span>
                          </a>
                        </div>
                        <div class="delete-btn">
                          <a href="#" class="text-dark-white"> <i class="far fa-trash-alt"></i>
                          </a>
                        </div>
                        <div class="price"><a href="#" class="text-dark-white fw-500">
                            $2.25
                          </a>
                        </div>
                      </div>
                    </div>
                    <div class="cat-product-box">
                      <div class="cat-product">
                        <div class="cat-name">
                          <a href="#">
                            <p class="text-light-green"><span class="text-dark-white">1</span> Tortia Chicken</p> <span
                              class="text-light-white">small, chilli chicken</span>
                          </a>
                        </div>
                        <div class="delete-btn">
                          <a href="#" class="text-dark-white"> <i class="far fa-trash-alt"></i>
                          </a>
                        </div>
                        <div class="price"><a href="#" class="text-dark-white fw-500">
                            $2.25
                          </a>
                        </div>
                      </div>
                    </div>
                    <div class="item-total">
                      <div class="total-price border-0"><span class="text-dark-white fw-700">Items subtotal:</span>
                        <span class="text-dark-white fw-700">$9.99</span>
                      </div>
                      <div class="empty-bag padding-15"><a href="#">Empty bag</a>
                      </div>
                    </div>
                  </div>
                  <div class="card-footer padding-15"><a href="checkout.html" class="btn-first green-btn text-custom-white full-width fw-500">Proceed to Checkout</a>
                  </div>
                </div>
              </div>
            </div>
            <!-- user cart -->
          </div>
        </div>
      </div>
    </div>
  </header>
</div>
@yield('content')
<footer class="section-padding bg-light-theme pt-0 u-line">
  <div class="container-fluid">
    <div class="row">
      <div class="col-xl col-lg-4 col-md-4 col-sm-6">
        <div class="footer-contact">
          <h6 class="text-light-black">Besoin d'aide</h6>
          <ul>
            <li class="fw-600"><span class="text-light-white">Appelez-nous</span> <a href="tel:" class="text-light-black">+(216) 52 110 104</a>
            </li>
            <li class="fw-600"><span class="text-light-white">Envoyez-nous un email</span> <a href="mailto:" class="text-light-black">soulisafa47@gmail.com</a>
            </li>
          </ul>
        </div>
      </div>
      <div class="col-xl col-lg-4 col-md-4 col-sm-6">
        <div class="footer-links">
          <h6 class="text-light-black">Laissez-nous vous aider</h6>
          <ul>
            <li><a href="#" class="text-light-white fw-600">Détails du compte</a>
            </li>
            <li><a href="#" class="text-light-white fw-600">Commandes passées</a>
            </li>
            <li><a href="#" class="text-light-white fw-600">Rechercher ferme</a>
            </li>
            <li><a href="/login" class="text-light-white fw-600">S'identifier</a>
            </li>
          </ul>
        </div>
      </div>
      <div class="col-xl col-lg-4 col-md-4 col-sm-6">
        <div class="footer-links">
          <h6 class="text-light-black">Faire des affaires</h6>
          <ul>
            <li><a href="#" class="text-light-white fw-600">Suggérez une idée</a>
            </li>
            <li><a href="#" class="text-light-white fw-600">Être un agriculteur</a>
            </li>
            <li><a href="#" class="text-light-white fw-600">Être un livreur </a>
            </li>
            <li><a href="#" class="text-light-white fw-600">Contact</a>
            </li>
          </ul>
        </div>
      </div>
      <div class="col-xl col-lg-4 col-md-4 col-sm-6">
        <div class="footer-links">
          <h6 class="text-light-black">Télécharger Apps</h6>
          <div class="appimg">
            <a href="#">
              <img src="assets/img/playstore.jpg" class="img-fluid" alt="app logo">
            </a>
          </div>
          <div class="appimg">
            <a href="#">
              <img src="assets/img/appstore.jpg" class="img-fluid" alt="app logo">
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</footer>

<div class="copyright">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-4">
        <div class="payment-logo mb-md-20"><span class="text-light-white fs-14 mr-3">Nous acceptons</span>
          <div class="payemt-icon">
            <img src="{{URL::asset('assets/img/pay-pal.png')}}" alt="#">
            <img src="{{URL::asset('assets/img/card-front.jpg')}}" alt="#">
            <img src="{{URL::asset('assets/img/visa.jpg')}}" alt="#">
            <img src="{{URL::asset('assets/img/amex-card-front.png')}}" alt="#">
            <img src="{{URL::asset('assets/img/mastercard.png')}}" alt="#">
          </div>
        </div>
      </div>
      <div class="col-lg-4 text-center medewithlove align-self-center">
        <a href="http://www.slidesigma.com/" class="text-light-black">Fabriqué avec du vrai <i class="fas fa-heart"></i> Farmfresh</a>
      </div>
      <div class="col-lg-4">
        <div class="copyright-text"><span class="text-light-black">© <a href="#" class="text-light-white">Copyright</a> - 2020 | All Right Reserved</span>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- footer -->
<!-- modal-boxes -->
<div class="modal fade" id="address-box">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title fw-700">Change Address</h4>
      </div>
      <div class="modal-body">
        <div class="location-picker">
          <input type="text" class="form-control" placeholder="Enter a new address">
        </div>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="search-box">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <div class="search-box p-relative full-width">
          <input type="text" class="form-control" placeholder="Fruits, Vegitables, Milk, Eggs">
        </div>
      </div>
      <div class="modal-body"></div>
    </div>
  </div>
</div>
<!-- Place all Scripts Here -->
<!-- jQuery -->
<script src="{{ URL::asset('assets/js/jquery.min.js')}}"></script>
<!-- Popper -->
<script src="{{ URL::asset('assets/js/popper.min.js')}}"></script>
<!-- Bootstrap -->
<script src="{{ URL::asset('assets/js/bootstrap.min.js')}}"></script>
<!-- Range Slider -->
<script src="{{ URL::asset('assets/js/ion.rangeSlider.min.js')}}"></script>
<!-- Swiper Slider -->
<script src="{{ URL::asset('assets/js/swiper.min.js')}}"></script>
<!-- Nice Select -->
<script src="{{ URL::asset('assets/js/jquery.nice-select.min.js')}}"></script>
<!-- magnific popup -->
<script src="{{ URL::asset('assets/js/jquery.magnific-popup.min.js')}}"></script>
<!-- Maps -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDnd9JwZvXty-1gHZihMoFhJtCXmHfeRQg"></script>
<!-- sticky sidebar -->
<script src="{{ URL::asset('assets/js/sticksy.js')}}"></script>
<!-- organza Js -->
<script src="{{ URL::asset('assets/js/organza.js')}}"></script>
<!-- /Place all Scripts Here -->
</body>
</html>
