@extends('layout')

@section('content')
  <section class="our-articles bg-light-theme section-padding pt-0">
    <div class="blog-page-banner"></div>
    <div class="container-fluid">
      <div class="row">
        <aside class="col-lg-3 mb-md-40">
          <div class="filter-sidebar mb-5">
            <div class="sidebar-tab" style="margin-top: 50px;">
              <ul class="nav nav-pills mb-xl-20">
                <li class="nav-item"><a class="nav-link active" data-toggle="pill" href="#categorie">Catégories</a>
                </li>
              </ul>
              <div class="tab-content">
                <div class="tab-pane fade show active" id="categorie">
                  <div class="main-box padding-20 trending-blog-cat mb-xl-20">
                    <ul>
                      @foreach($categories as $categorie)
                        <li class="pb-xl-20 u-line mb-xl-20">
                          <a href="{{ route('produits.categorie', ['id'=> $categorie->id]) }}" class="text-light-black fw-600">{{ $categorie->nom }}
                            <span class="text-light-white fw-400">
                              (
                                @inject('nbp', 'App\Http\Controllers\ProduitController')
                              {{ $nbp->nbproduit($categorie->id)}}
                              )
                            </span>
                          </a>
                        </li>
                      @endforeach
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </aside>
        <div class="col-lg-6 blog-inner clearfix">
          <div class="main-box padding-20 full-width">
            <div class="breadcrumb-wrpr">
              <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="index-2.html" class="text-light-black">Acceuil</a></li>
                <li class="breadcrumb-item"><a href="{{ route('produits') }}" class="text-light-black">Produit</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $produit->nom }}</li>
              </ul>
            </div>

            <div class="post-wrapper mb-xl-20">
              <img src='{{URL::asset("assets/img/dish/$produit->image")}}' class="img-fluid full-width" alt="produit-img">
            </div>
            <div class="row">
              <div class="col-12">
                <div class="blog-meta mb-xl-20">
                  <h2 class="blog-title text-light-black">{{ $produit->nom }}

                    <div class="restaurent-product-rating text-right" style="margin-top: -40px;">
                      @inject('note', 'App\Http\Controllers\ProduitController')
                      @for($i = 0; $i <  number_format($note->moynote($produit->id)); $i++)
                        <i class="fas fa-star text-yellow"></i>
                      @endfor
                      @if(($note->moynote($produit->id) %  number_format($note->moynote($produit->id))) > 0.5)
                        <i class="fas fa-star-half-alt text-yellow"></i>
                      @endif
                      <div class="rating-text">
                        <p class="text-light-white fs-12 text-right" title="Nombre d'évaluations">{{ $note->nbnote($produit->id) }} évals</p>
                      </div>
                    </div>
                  </h2>
                  <h6 class="text-light-white fs-14" style="margin-top: -30px;">{{ $time->inWords($produit->updated_at) }}</h6>

                  <div class="restaurent-tags-price">
                    <a href="{{ route('produit', ['id' => $produit->id]) }}" class="btn-first white-btn">Afficher plus</a>
                    <div class="restaurent-product-price">
                      <h6 class="text-success fw-600 text-right" style="margin-top: -30px;">{{$produit->prix}}<sup>dt</sup></h6>
                    </div>
                  </div>
                  <p class="text-light-white">{{ $produit->description }}</p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <aside class="col-lg-3">
          <div class="side-bar section-padding pb-0">
            <div class="advertisement-slider swiper-container h-auto mb-xl-20">
              <div class="swiper-wrapper">
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
                          <div class="add-fav text-light-white"><img src="assets/img/svg/013-heart-1.svg" alt="tag">
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
                          <img src="assets/img/blog/438x180/shop-3.jpg" class="img-fluid full-width" alt="testimonial-img">
                        </a>
                        <div class="overlay">
                          <div class="brand-logo">
                            <img src="assets/img/user/user-1.png" class="img-fluid" alt="logo">
                          </div>
                          <div class="add-fav text-light-white"><img src="assets/img/svg/013-heart-1.svg" alt="tag">
                          </div>
                        </div>
                      </div>
                      <div class="testimonial-caption padding-15">
                        <p class="text-light-white text-uppercase no-margin fs-12">Featured</p>
                        <h5 class="fw-600"><a href="farm.html" class="text-light-black">GSA King Tomato Farm</a></h5>
                        <div class="testimonial-user-box">
                          <img src="assets/img/blog-details/40x40/user-3.png" class="rounded-circle" alt="farm.html">
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
                          <img src="assets/img/blog/438x180/shop-1.jpg" class="img-fluid full-width" alt="testimonial-img">
                        </a>
                        <div class="overlay">
                          <div class="brand-logo">
                            <img src="assets/img/user/user-2.png" class="img-fluid" alt="logo">
                          </div>
                          <div class="add-fav text-light-white"><img src="assets/img/svg/013-heart-1.svg" alt="tag">
                          </div>
                        </div>
                      </div>
                      <div class="testimonial-caption padding-15">
                        <p class="text-light-white text-uppercase no-margin fs-12">Featured</p>
                        <h5 class="fw-600"><a href="farm.html" class="text-light-black">GSA King Tomato Farm</a></h5>
                        <div class="testimonial-user-box">
                          <img src="assets/img/blog-details/40x40/user-1.png" class="rounded-circle" alt="farm.html">
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
            <div class="large-product-box mb-xl-20">
              <img src="assets/img/blog/446x1025/ad-1.jpg" class="img-fluid full-width" alt="image">
              <div class="category-type overlay padding-15">
                <button class="category-btn">Most popular near you</button>
                <a href="farm.html" class="btn-first white-btn text-light-black fw-600 full-width">See all</a>
              </div>
            </div>
            <div class="inner-wrapper main-box">
              <div class="main-banner p-relative">
                <img src="assets/img/blog/446x501/ff-1.jpg" class="img-fluid full-width main-img" alt="banner">
                <div class="overlay-2 main-padding">
                  <img src="assets/img/logo-2.jpg" class="img-fluid" alt="logo">
                </div>
                <img src="assets/img/banner/burger.png" class="footer-img" alt="footerimg">
              </div>
              <div class="section-2 main-page main-padding">
                <div class="login-box">
                  <h3 class="text-light-black fw-700">Organza food delivery every time</h3>
                  <div class="input-group row">
                    <div class="input-group2 col-xl-8">
                      <input type="search" class="form-control form-control-submit" placeholder="Enter street address or zip code"
                             value="1246 57th St, Brooklyn, NY, 11219">
                      <div class="input-group-prepend">
                        <button class="input-group-text text-light-green"><i class="fab fa-telegram-plane"></i>
                        </button>
                      </div>
                    </div>
                    <div class="input-group-append col-xl-4">
                      <button class="btn-second btn-submit full-width" type="button">Find food</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </aside>
      </div>
    </div>
  </section>

@endsection
