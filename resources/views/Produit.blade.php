@extends('layout')

@section('content')
  <section class="our-articles bg-light-theme section-padding pt-0">
    <div class="blog-page-banner"></div>
    <div class="container-fluid">
      <div class="row">
        <aside class="col-lg-3">
          <div class="side-bar section-padding pb-0 mb-md-40">
            <div class="main-box padding-20 trending-blog-cat mb-xl-20">
              <h4 class="text-light-black">Catégories</h4>
              <ul>
                @foreach($categories as $categorie)
                  <li class="pb-xl-20 u-line mb-xl-20"><a href="{{ route('produit.categorie', ['id'=> $categorie->id]) }}" class="text-light-black fw-600">{{
                  $categorie->nom }}
                      <span
                        class="text-light-white
                  fw-400">(
                      @inject('nbp', 'App\Http\Controllers\ProduitController')
                        {{ $nbp->nbProduit($categorie->id)}}
                      )
                    </span></a></li>
                @endforeach
              </ul>
            </div>
          </div>
        </aside>
        <div class="col-lg-6 blog-inner clearfix">
          <div class="main-box padding-20 full-width">
            <div class="breadcrumb-wrpr">
              <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="index-2.html" class="text-light-black">Acceuil</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Produit</li>
              </ul>
            </div>
            <div class="row">
              @foreach($produits as $produit)
                <div class="col-lg-4 col-md-6 col-sm-6">
                  <div class="product-box mb-xl-20">
                    <div class="product-img">
                      <a href="farm.html">
                        <img src="assets/img/farms/255x150/shop-23.jpg" class="img-fluid full-width" alt="product-img">
                      </a>
                      <div class="overlay">
                        <div class="product-tags padding-10">
                          <div class="custom-tag"> <span class="text-custom-white rectangle-tag bg-gradient-red">
                          10%
                        </span>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="product-caption">
                      <div class="title-box">
                        <h6 class="product-title"><a href="farm.html" class="text-light-black ">{{ $produit->nom }}
                          </a></h6>
                        <div class="tags"> <span class="text-custom-white rectangle-tag bg-green">
                          <i class="fas fa-shopping-bag"></i>
                      </span>
                        </div>
                      </div>
                      <div class="product-details">
                        <div class="rating"> <span>
                          @inject('note', 'App\Http\Controllers\ProduitController')
                            @for($i = 0; $i <= $note->moynote($produit->id); $i++)
                              <i class="fas fa-star text-yellow"></i>
                            @endfor
                      </span>
                          <span class="text-light-white text-right">
                            {{ $note->nbnote($produit->id) }} évaluations</span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              @endforeach
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
