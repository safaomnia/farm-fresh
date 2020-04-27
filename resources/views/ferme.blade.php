@extends('layout')
@section('content')
  <!-- restaurent top -->
  <div class="page-banner p-relative smoothscroll" id="menu">
    <img src='{{ URL::asset("assets/img/farms/$ferme->image")}}' class="img-fluid full-width" alt="ferme">
    <div class="overlay-2">
      <div class="container">
        <div class="row">
          <div class="col-6">
            <div class="back-btn">
              <button type="button" class="text-light-green"><i class="fas fa-chevron-left"></i>
              </button>
            </div>
          </div>
          <div class="col-6">
            <div class="tag-share"> <span class="text-light-green share-tag">
                <i class="fas fa-chevron-right"></i>
              </span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- restaurent top -->
  <!-- restaurent details -->
  <section class="restaurent-details  u-line">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="heading padding-tb-10">
            <h3 class="text-light-black title fw-700 no-margin">{{ $ferme->nom }}</h3>
            <p class="text-light-black sub-title no-margin">{{ $ferme->adresse }}
            </p>
            <div class="head-rating">
              <div class="rating">
                @inject('note', 'App\Http\Controllers\FermeController')
                @for($i = 0; $i <  number_format($note->avg($ferme->id)); $i++)
                  <i class="fas fa-star text-yellow"></i>
                @endfor
                @if(($note->avg($ferme->id) %  number_format($note->avg($ferme->id))) > 0.5)
                  <i class="fas fa-star-half-alt text-yellow"></i>
                @endif
                <span class="text-light-black fs-12 rate-data">{{ $note->etoiles($ferme->id) }} évaluations</span>
              </div>
              <div class="product-review">
                <div class="restaurent-details-mob">
                  <a href="#"> <span class="text-light-black"><i class="fas fa-info-circle"></i></span>
                    <span class="text-dark-white">info</span>
                  </a>
                </div>
                <div class="restaurent-details-mob">
                  <a href="#"> <span class="text-light-black"><i class="fas fa-info-circle"></i></span>
                    <span class="text-dark-white">info</span>
                  </a>
                </div>
                <div class="restaurent-details-mob">
                  <a href="#"> <span class="text-light-black"><i class="fas fa-info-circle"></i></span>
                    <span class="text-dark-white">info</span>
                  </a>
                </div>
                <div class="restaurent-details-mob">
                  <a href="#"> <span class="text-light-black"><i class="fas fa-info-circle"></i></span>
                    <span class="text-dark-white">info</span>
                  </a>
                </div>
              </div>
            </div>
          </div>
          <div class="restaurent-logo">
            <img src='{{ URL::asset("assets/img/user/{$ferme->client->photo}")}}' class="img-fluid" title="{{ $ferme->client->prenom }} {{ $ferme->client->nom }}">
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- restaurent details -->
  <!-- restaurent tab -->
  <div class="restaurent-tabs u-line">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="restaurent-menu scrollnav">
            <ul class="nav nav-pills">
              <li class="nav-item"><a class="nav-link active text-light-white fw-700" data-toggle="pill" href="#menu">Menu</a>
              </li>
              <li class="nav-item"><a class="nav-link text-light-white fw-700" data-toggle="pill" href="#about">à propos</a>
              </li>
              <li class="nav-item"><a class="nav-link text-light-white fw-700" data-toggle="pill" href="#review">Avis</a>
              </li>
              <li class="nav-item"><a class="nav-link text-light-white fw-700" data-toggle="pill" href="#mapgallery">Map & Gallery</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- restaurent tab -->
  <!-- restaurent meals -->
  <section class="section-padding restaurent-meals bg-light-theme">
    <div class="container-fluid">
      <div class="row">
        <div class="col-xl-3 col-lg-3">
          <div class="advertisement-slider swiper-container h-auto mb-xl-20 mb-md-40">
            <div class="swiper-wrapper">
              <div class="swiper-slide">
                <div class="testimonial-wrapper">
                  <div class="testimonial-box">
                    <div class="testimonial-img p-relative">
                      <a href="farm.html">
                        <img src="assets/img/blog/438x180/shop-1.jpg" class="img-fluid full-width" alt="testimonial-img">
                      </a>
                      <div class="overlay">
                        <div class="brand-logo">
                          <img src="assets/img/user/user-3.png" class="img-fluid" alt="logo">
                        </div>
                        <div class="add-fav text-success">
                          <img src="assets/img/svg/013-heart-1.svg" alt="tag">
                        </div>
                      </div>
                    </div>
                    <div class="testimonial-caption padding-15">
                      <p class="text-light-white text-uppercase no-margin fs-12">Featured</p>
                      <h5 class="fw-600"><a href="farm.html" class="text-light-black">GSA King Tomato Farm</a></h5>
                      <div class="testimonial-user-box">
                        <img src="assets/img/blog-details/40x40/user-1.png" class="rounded-circle" alt="#">
                        <div class="testimonial-user-name">
                          <p class="text-light-black fw-600">Sarra</p> <i class="fas fa-trophy text-black"></i><span class="text-light-black">Top Reviewer</span>
                        </div>
                      </div>
                      <div class="ratings"> <span class="text-yellow fs-16">
                                                          <i class="fas fa-star"></i>
                                                        </span>
                        <span class="text-yellow fs-16">
                                                          <i class="fas fa-star"></i>
                                                        </span>
                        <span class="text-yellow fs-16">
                                                          <i class="fas fa-star"></i>
                                                        </span>
                        <span class="text-yellow fs-16">
                                                          <i class="fas fa-star"></i>
                                                        </span>
                        <span class="text-yellow fs-16">
                                                          <i class="fas fa-star"></i>
                                                        </span>
                      </div>
                      <p class="text-light-black">Delivery was fast and friendly...</p>
                      <p class="text-light-white fw-100"><strong class="text-light-black fw-700">Local delivery: </strong> From $7.99 (4.0 mi)</p>
                      <a href="checkout.html" class="btn-second btn-submit">Order Now</a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="swiper-slide">
                <div class="testimonial-wrapper">
                  <div class="testimonial-box">
                    <div class="testimonial-img p-relative">
                      <a href="farm.html">
                        <img src="assets/img/blog/438x180/shop-2.jpg" class="img-fluid full-width" alt="testimonial-img">
                      </a>
                      <div class="overlay">
                        <div class="brand-logo">
                          <img src="assets/img/user/user-2.png" class="img-fluid" alt="logo">
                        </div>
                        <div class="add-fav text-success"><img src="assets/img/svg/013-heart-1.svg" alt="tag">
                        </div>
                      </div>
                    </div>
                    <div class="testimonial-caption padding-15">
                      <p class="text-light-white text-uppercase no-margin fs-12">Featured</p>
                      <h5 class="fw-600"><a href="farm.html" class="text-light-black">GSA King Tomato Farm</a></h5>
                      <div class="testimonial-user-box">
                        <img src="assets/img/blog-details/40x40/user-2.png" class="rounded-circle" alt="#">
                        <div class="testimonial-user-name">
                          <p class="text-light-black fw-600">Sarra</p> <i class="fas fa-trophy text-black"></i><span class="text-light-black">Top Reviewer</span>
                        </div>
                      </div>
                      <div class="ratings"> <span class="text-yellow fs-16">
                                                  <i class="fas fa-star"></i>
                                                </span>
                        <span class="text-yellow fs-16">
                                                  <i class="fas fa-star"></i>
                                                </span>
                        <span class="text-yellow fs-16">
                                                  <i class="fas fa-star"></i>
                                                </span>
                        <span class="text-yellow fs-16">
                                                  <i class="fas fa-star"></i>
                                                </span>
                        <span class="text-yellow fs-16">
                                                  <i class="fas fa-star"></i>
                                                </span>
                      </div>
                      <p class="text-light-black">Delivery was fast and friendly...</p>
                      <p class="text-light-white fw-100"><strong class="text-light-black fw-700">Local delivery: </strong> From $7.99 (4.0 mi)</p>
                      <a href="checkout.html" class="btn-second btn-submit">Order Now</a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="swiper-slide">
                <div class="testimonial-wrapper">
                  <div class="testimonial-box">
                    <div class="testimonial-img p-relative">
                      <a href="farm.html">
                        <img src="assets/img/blog/438x180/shop-2.jpg" class="img-fluid full-width" alt="testimonial-img">
                      </a>
                      <div class="overlay">
                        <div class="brand-logo">
                          <img src="assets/img/user/user-1.png" class="img-fluid" alt="logo">
                        </div>
                        <div class="add-fav text-success"><img src="assets/img/svg/013-heart-1.svg" alt="tag">
                        </div>
                      </div>
                    </div>
                    <div class="testimonial-caption padding-15">
                      <p class="text-light-white text-uppercase no-margin fs-12">Featured</p>
                      <h5 class="fw-600"><a href="farm.html" class="text-light-black">GSA King Tomato Farm</a></h5>
                      <div class="testimonial-user-box">
                        <img src="assets/img/blog-details/40x40/user-3.png" class="rounded-circle" alt="#">
                        <div class="testimonial-user-name">
                          <p class="text-light-black fw-600">Sarra</p> <i class="fas fa-trophy text-black"></i><span class="text-light-black">Top Reviewer</span>
                        </div>
                      </div>
                      <div class="ratings"> <span class="text-yellow fs-16">
                                              <i class="fas fa-star"></i>
                                            </span>
                        <span class="text-yellow fs-16">
                                              <i class="fas fa-star"></i>
                                            </span>
                        <span class="text-yellow fs-16">
                                              <i class="fas fa-star"></i>
                                            </span>
                        <span class="text-yellow fs-16">
                                              <i class="fas fa-star"></i>
                                            </span>
                        <span class="text-yellow fs-16">
                                              <i class="fas fa-star"></i>
                                            </span>
                      </div>
                      <p class="text-light-black">Delivery was fast and friendly...</p>
                      <p class="text-light-white fw-100"><strong class="text-light-black fw-700">Local delivery: </strong> From $7.99 (4.0 mi)</p>
                      <a href="checkout.html" class="btn-second btn-submit">Order Now</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Add Arrows -->
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
          </div>
          <div class="card sidebar-card">
            <div class="card-header no-padding">
              <div class="offer-content">
                <h2 class="text-custom-white fw-700">Get $12 off <small class=" fw-700">your order*</small></h2>
                <p class="text-custom-white">As an added treat, enjoy <strong>free delivery</strong> from
                  <br>select farms automatically applied at checkout</p>
              </div>
            </div>
            <div class="card-body padding-15">
              <form>
                <div class="row">
                  <div class="col-12">
                    <div class="form-group">
                      <label class="text-light-white fs-14">Email</label>
                      <input type="email" name="#" class="form-control form-control-submit" placeholder="Email I'd">
                    </div>
                    <div class="form-group">
                      <label class="text-light-white fs-14">ZIP Code</label>
                      <input type="number" name="#" class="form-control form-control-submit" placeholder="10421">
                    </div>
                    <div class="form-group">
                      <button type="submit" class="btn-second btn-submit full-width">Save $12 on your first order</button>
                    </div>

                    <div class="text-center"> <span class="text-light-black fs-12">*Valid on first order only, for one-time use, subject to Organza’s verification. Additional terms may apply. By signing up, you agree to receive marketing and
                        promotional emails and communications form Organza</span>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
        <div class="col-xl-6 col-lg-6">
          <div class="row">
            <div class="col-lg-12 restaurent-meal-head mb-md-40">
              <div class="card">
                <div id="collapseOne" class="collapse show">
                  <div class="card-body no-padding">
                    <div class="row">
                      @foreach($produits as $produit)
                        <div class="col-lg-12">
                          <div class="restaurent-product-list">
                            <div class="restaurent-product-detail">
                              <div class="restaurent-product-left">
                                <div class="restaurent-product-title-box">
                                  <div class="restaurent-product-box">
                                    <div class="restaurent-product-title">
                                      <h6 class="mb-2 text-light-black">{{ $produit->nom }}</h6>
                                      <p class="text-light-white">{{ $time->inWords($produit->created_at) }}</p>
                                    </div>
                                    <div class="restaurent-product-label">
                                      <span class="rectangle-tag bg-gradient-red text-custom-white">10%</span>
                                    </div>
                                  </div>
                                  <div class="restaurent-product-rating text-right">
                                    @inject('note', 'App\Http\Controllers\ProduitController')
                                    @for($i = 0; $i <  number_format($note->avg($produit->id)); $i++)
                                      <i class="fas fa-star text-yellow"></i>
                                    @endfor
                                    @if(($note->avg($produit->id) %  number_format($note->avg($produit->id))) > 0.5)
                                      <i class="fas fa-star-half-alt text-yellow"></i>
                                    @endif
                                    <div class="rating-text">
                                      <p class="text-light-white fs-12 text-right" title="Nombre d'évaluations">{{ $note->etoiles($produit->id) }} évals</p>
                                    </div>
                                  </div>
                                </div>
                                <div class="restaurent-product-caption-box"><span class="text-light-white">{{ substr($produit->description, 0, 100) }}...</span>
                                </div>
                                <div class="restaurent-tags-price">
                                  <a href="{{ route('produit', ['id' => $produit->id]) }}" class="btn-first white-btn">Afficher plus</a>
                                  <div class="restaurent-product-price">
                                    <h6 class="text-success fw-600 no-margin">{{$produit->prix}}<sup>dt</sup></h6>
                                  </div>
                                </div>
                              </div>
                              <div class="restaurent-product-img">
                                <img src='{{ URL::asset("assets/img/dish/$produit->image")}}' class="img-fluid" alt="#">
                              </div>
                            </div>
                          </div>
                        </div>
                      @endforeach</div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-lg-3">
          <div class="sidebar">
            <div class="video-box mb-xl-20">
              <div class="video_wrapper video_wrapper_full js-videoWrapper">
                <iframe class="videoIframe js-videoIframe" src="https://www.youtube.com/embed/AdZrEIo6UYU"
                        data-src="https://www.youtube.com/embed/AdZrEIo6UYU?autoplay=1&amp;rel=0" allow="autoplay"></iframe>
                <div class="videoPoster js-videoPoster">
                  <div class="video-inner">
                    <i class="far fa-play-circle"></i>
                  </div>
                </div>
              </div>
              <div class="discount-box main-box padding-tb-10">
                <div class="discount-price padding-10">
                  <div class="left-side">
                    <h6 class="text-light-black fw-600 no-margin">Watch Now and get 50% discount</h6>
                    <p class="text-light-white no-margin">The hung-over foody (2019)</p>
                  </div>
                  <div class="right-side justify-content-end">
                    <div class="dis-text">
                      <span class="badge bg-light-green text-custom-white fw-400">Discount</span>
                      <h4 class="text-light-black no-margin">50%</h4>
                    </div>
                    <a href="restaurent.html">
                      <img src="assets/img/logo-3.jpg" class="img-fluid" alt="logo">
                    </a>
                  </div>
                </div>

              </div>
            </div>
            <div class="cart-detail-box">
              <div class="card">
                <div class="card-header padding-15 fw-700">Your Order</div>
                <div class="card-body no-padding" id="scrollstyle-4">
                  <div class="cat-product-box">
                    <div class="cat-product">
                      <div class="cat-name">
                        <a href="#">
                          <p class="text-light-green fw-700"><span class="text-dark-white">1</span> Fresh Free Range Egss</p> <span class="text-light-white fw-700">small, Oragnic Fresh</span>
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
                          <p class="text-light-green fw-700"><span class="text-dark-white">1</span> Fresh Free Range Egss</p> <span class="text-light-white fw-700">small, Oragnic Fresh</span>
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
                          <p class="text-light-green fw-700"><span class="text-dark-white">1</span> Fresh Free Range Chicken</p> <span class="text-light-white fw-700">small, Oragnic Fresh</span>
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
                          <p class="text-light-green fw-700"><span class="text-dark-white">1</span> Fresh Free Egss</p> <span class="text-light-white fw-700">small, Oragnic Fresh</span>
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
                      <span class="text-dark-white fw-700">$9.00</span>
                    </div>
                    <div class="empty-bag padding-15 fw-700"><a href="#">Empty bag</a>
                    </div>
                  </div>
                </div>
                <div class="card-footer padding-15"><a href="checkout.html" class="btn-first green-btn text-custom-white full-width fw-500">Proceed to Checkout</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- restaurent meals -->
  <!-- restaurent about -->
  <section class="section-padding restaurent-about smoothscroll" id="about">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <h3 class="text-light-black fw-700 title">{{ $ferme->nom }}</h3>
          <p class="text-light-white no-margin">{{ $ferme->description }}</p>
          <ul class="about-restaurent">
            <li><i class="fas fa-map-marker-alt"></i>
              <span>
                <a href="#" class="text-light-white">{{ $ferme->adresse }} </a>
              </span>
            </li>
            <li><i class="fas fa-phone-alt"></i>
              <span><a href="tel:" class="text-light-white">{{ $ferme->telephone }}</a></span>
            </li>
            <li><i class="far fa-envelope"></i>
              <span><a href="mailto:" class="text-light-white">{{ $ferme->email }}</a></span>
            </li>
          </ul>
        </div>
        <div class="col-md-6">
          <div class="restaurent-schdule">
            <div class="card">
              <div class="card-header text-light-white fw-700 fs-16">Hours</div>
              <div class="card-body">
                <div class="schedule-box">
                  <div class="day text-light-black">Monday</div>
                  <div class="time text-light-black">Delivery: 7:00am - 10:59pm</div>
                </div>
                <div class="collapse" id="schdule">
                  <div class="schedule-box">
                    <div class="day text-light-black">Tuesday</div>
                    <div class="time text-light-black">Delivery: 7:00am - 10:00pm</div>
                  </div>
                  <div class="schedule-box">
                    <div class="day text-light-black">Wednesday</div>
                    <div class="time text-light-black">Delivery: 7:00am - 10:00pm</div>
                  </div>
                  <div class="schedule-box">
                    <div class="day text-light-black">Thursday</div>
                    <div class="time text-light-black">Delivery: 7:00am - 10:00pm</div>
                  </div>
                  <div class="schedule-box">
                    <div class="day text-light-black">Friday</div>
                    <div class="time text-light-black">Delivery: 7:00am - 10:00pm</div>
                  </div>
                  <div class="schedule-box">
                    <div class="day text-light-black">Saturday</div>
                    <div class="time text-light-black">Delivery: 7:00am - 10:00pm</div>
                  </div>
                  <div class="schedule-box">
                    <div class="day text-light-black">Sunday</div>
                    <div class="time text-light-black">Delivery: 7:00am - 10:00pm</div>
                  </div>
                </div>
              </div>
              <div class="card-footer"><a class="fw-500 collapsed" data-toggle="collapse" href="#schdule">See the full schedule</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- restaurent about -->
  <!-- map gallery -->
  <div class="map-gallery-sec section-padding bg-light-theme smoothscroll" id="mapgallery">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="main-box">
            <div class="row">
              <div class="col-md-6 map-pr-0">
                <iframe id="locmap"
                        src="https://maps.google.com/maps?q=university%20of%20san%20francisco&amp;t=&amp;z=13&amp;ie=UTF8&amp;iwloc=&amp;output=embed"></iframe>
              </div>
              <div class="col-md-6 map-pl-0">
                <div class="gallery-box padding-10">
                  <ul class="gallery-img">
                    <li>
                      <a class="image-popup" href="assets/img/gallery/img-1.jpg" title="Image title">
                        <img src="assets/img/gallery/img-1.jpg" class="img-fluid full-width" alt="9.jpg"/>
                      </a>
                    </li>
                    <li>
                      <a class="image-popup" href="assets/img/gallery/img-2.jpg" title="Image title">
                        <img src="assets/img/gallery/img-2.jpg" class="img-fluid full-width" alt="9.jpg"/>
                      </a>
                    </li>
                    <li>
                      <a class="image-popup" href="assets/img/gallery/img-3.jpg" title="Image title">
                        <img src="assets/img/gallery/img-3.jpg" class="img-fluid full-width" alt="9.jpg"/>
                      </a>
                    </li>
                    <li>
                      <a class="image-popup" href="assets/img/gallery/img-4.jpg" title="Image title">
                        <img src="assets/img/gallery/img-4.jpg" class="img-fluid full-width" alt="9.jpg"/>
                      </a>
                    </li>
                    <li>
                      <a class="image-popup" href="assets/img/gallery/img-5.jpg" title="Image title">
                        <img src="assets/img/gallery/img-5.jpg" class="img-fluid full-width" alt="9.jpg"/>
                      </a>
                    </li>
                    <li>
                      <a class="image-popup" href="assets/img/gallery/img-6.jpg" title="Image title">
                        <img src="assets/img/gallery/img-6.jpg" class="img-fluid full-width" alt="9.jpg"/>
                      </a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- map gallery -->

  <!-- restaurent reviews -->
  <section class="section-padding restaurent-review smoothscroll" id="review">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="section-header-left">
            <h3 class="text-light-black header-title title">Avis de {{ $ferme->nom }}</h3>
          </div>
          <div class="restaurent-rating mb-xl-20">
            <div class="star">
              <span class="text-yellow fs-16">

                @inject('note', 'App\Http\Controllers\FermeController')
                @for($i = 0; $i <  number_format($note->avg($ferme->id)); $i++)
                  <i class="fas fa-star text-yellow"></i>
                @endfor
                @if(($note->avg($ferme->id) %  number_format($note->avg($ferme->id))) > 0.5)
                  <i class="fas fa-star-half-alt text-yellow"></i>
                @endif
              </span>
            </div>
            <span class="fs-12 text-light-black">{{ $note->etoiles($ferme->id) }} évaluations</span>
          </div>
          <p class="text-light-black mb-xl-20">Voici ce que les gens avis:</p>
          <div class="u-line"></div>
        </div>
        <div class="col-md-12">
          @foreach($ferme->avis as $avis)
            <div class="review-box">
              <div class="review-user">
                <div class="review-user-img">
                  <img src='{{ URL::asset("assets/img/blog-details/40x40/user-1.png") }}' class="rounded-circle" alt="#">
                  <div class="reviewer-name">
                    @inject('user', 'App\Http\Controllers\ClientController')
                    <p class="text-light-black fw-600">{{ $user->show($avis->pivot->client_id)->prenom }} {{ $user->show($avis->pivot->client_id)->nom }}<small
                        class="text-light-white fw-500">{{ $user->show($avis->pivot->client_id)->adresse }}</small>
                  </div>
                </div>
                <div class="review-date"><span class="text-light-white">Sep 20, 2019</span>
                </div>
              </div>
              <div class="ratings">
                <span class="text-yellow fs-16">
                  @for($i = 0; $i <  $avis->pivot->etoiles; $i++)
                    <i class="fas fa-star text-yellow"></i>
                  @endfor
                </span>
                <span class="ml-2 text-light-white">{{ $time->inWords($avis->pivot->created_at) }}</span>
              </div>
              <p class="text-light-black">{{ $avis->pivot->avis }}</p>
            </div>
          @endforeach
        </div>
        <div class="col-12">
          <div class="review-img">
            <img src="{{ URL::asset('assets/img/review-footer.png') }}" class="img-fluid" alt="#">
            <div class="review-text">
              <h2 class="text-light-white mb-2 fw-600">Soyez l'un des premiers à donner votre avis</h2>
              <p class="text-light-white">Commandez maintenant et écrivez une critique pour donner aux autres le scoop intérieur.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- restaurent reviews -->
@endsection
