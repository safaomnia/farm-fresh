@extends('layout')

@section('content')
  <section class="our-articles bg-light-theme section-padding pt-0">
    <div class="blog-page-banner"></div>
    <div class="container-fluid">
      <div class="row">
        <aside class="col-lg-3">
          <div class="sidebar2">
            <div class="side-bar section-padding pb-0 mb-md-40">
              <div class="main-box padding-20 side-blog mb-xl-20">
                <h4 class="text-light-black">Popular Posts</h4>
                <article class="side-post pb-xL mb-xl-20 u-line">
                  <div class="content-wrap col-12">
                    <div class="entry-meta-content">
                      <h5 class="entry-title">
                        <a href="blog-details.html" class="text-light-black">Chicken Dishes You Should Eat Based on Your Horoscope</a>
                      </h5>
                      <div class="entry-tye"><span class="text-light-green fw-600">20 Nov 2019</span>
                      </div>
                    </div>
                  </div>
                </article>
                <article class="side-post pb-xl-20 mb-xl-20 u-line">
                  <div class="content-wrap">
                    <div class="entry-meta-content">
                      <h5 class="entry-title">
                        <a href="blog-details.html" class="text-light-black">Chicken Dishes You Should Eat Based on Your Horoscope</a>
                      </h5>
                      <div class="entry-tye"><span class="text-light-green fw-600">20 Nov 2019</span>
                      </div>
                    </div>
                  </div>
                </article>
                <article class="side-post pb-xl-20 mb-xl-20 u-line">
                  <div class="content-wrap">
                    <div class="entry-meta-content">
                      <h5 class="entry-title">
                        <a href="blog-details.html" class="text-light-black">Chicken Dishes You Should Eat Based on Your Horoscope</a>
                      </h5>
                      <div class="entry-tye"><span class="text-light-green fw-600">20 Nov 2019</span>
                      </div>
                    </div>
                  </div>
                </article>
                <article class="side-post pb-xl-20 mb-xl-20 u-line">
                  <div class="content-wrap">
                    <div class="entry-meta-content">
                      <h5 class="entry-title">
                        <a href="blog-details.html" class="text-light-black">Chicken Dishes You Should Eat Based on Your Horoscope</a>
                      </h5>
                      <div class="entry-tye"><span class="text-light-green fw-600">20 Nov 2019</span>
                      </div>
                    </div>
                  </div>
                </article>
              </div>
            </div>
          </div>
        </aside>
        <div class="col-lg-6 blog-inner clearfix">
          <div class="main-box padding-20 full-width">
            <div class="breadcrumb-wrpr">
              <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="index-2.html" class="text-light-black">Home</a>
                </li>
                <li class="breadcrumb-item"><a href="blog.html" class="text-light-black">forum</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">{{ $forum->theme }}</li>
              </ul>
            </div>
            <div class="row">
              <div class="col-12">
                <div class="blog-meta mb-xl-20">
                  <h2 class="blog-title text-light-black">{{ $forum->theme }}</h2>
                  <div class="review-user">
                    <div class="review-user-img">
                      <img src='{{ URL::asset("assets/img/user/{$forum->client->photo}") }}' class="rounded-circle" alt="photo-profil">
                      <div class="reviewer-name" style="margin: -40px 0 30px 70px;">
                        <p class="text-light-black fw-600">{{ $forum->client->prenom }} {{ $forum->client->nom }}
                          <small class="text-light-white fw-500">{{ $forum->client->adresse }}</small><br>
                        <small class="text-light-white">Publié {{ $time->inWords($forum->created_at) }}</small>
                      </div>
                    </div>
                  </div>
                  <p class="text-light-white">{{ $forum->description }}</p>
                </div>
                <div class="comment-box">
                  <div class="section-header-left">
                    <h3 class="text-light-black header-title">Commentaires</h3>
                  </div>
                  @foreach($forum->commentaires as $commentaire)
                    <div class="review-box u-line">
                      <div class="review-user">
                        <div class="review-user-img">
                          <img src='{{ URL::asset("assets/img/user/$commentaire->photo") }}' class="rounded-circle" alt="#">
                          <div class="reviewer-name">
                            <p class="text-light-black fw-600">{{ $commentaire->prenom }} {{ $commentaire->nom }}
                              <small class="text-light-white fw-500">{{ $commentaire->adresse }}</small>
                          </div>
                        </div>
                        <div class="review-date"><span class="text-light-white">{{ $time->inWords($commentaire->pivot->created_at) }}</span>
                            <a href="{{ route('forum.commentaire.form', ['ferme'=>$forum->id, 'id' => $commentaire->pivot->id]) }}">Modifier</a>
                            <a href="{{ route('forum.commentaire.delete', ['id' => $commentaire->pivot->id]) }}" onclick="return confirm('Voulez-vous sûr de supprimer?')">Supprimer</a>
                        </div>
                      </div>
                      <p class="text-light-black">{{ $commentaire->pivot->commentaire }}</p>
                    </div>
                    @foreach($commentaire->pivot->repondes as $reponde)
                      <div class="review-box comment-reply u-line">
                        <div class="review-user">
                          <div class="review-user-img">
                            <img src='{{ URL::asset("assets/img/user/$reponde->photo") }}' class="rounded-circle" alt="#">
                            <div class="reviewer-name">
                              <p class="text-light-black fw-600">{{ $reponde->prenom }} {{ $reponde->nom }}
                                <small class="text-light-white fw-500">{{ $reponde->adresse }}</small>
                            </div>
                          </div>
                          <div class="review-date"><span class="text-light-white">{{ $time->inWords($reponde->pivot->created_at) }}</span>
                          </div>
                        </div>
                        <p class="text-light-black">{{ $reponde->pivot->reponde }}</p>
                      </div>
                    @endforeach
                  @endforeach
                </div>
              </div>
            </div>
          </div>
        </div>
        <aside class="col-lg-3">
          <div class="sidebar3">
            <div class="side-bar section-padding pb-0">
              <div class="advertisement-slider swiper-container h-auto mb-xl-20">

                <div class="comment-form">
                  <div class="section-header-left">
                    <h3 class="text-light-black header-title">Commenter {{ $forum->theme }}</h3>
                  </div>
                  <form method="POST" action="@isset($Commentaire) {{ route('forum.commentaire.update', ['id' => $Commentaire->id]) }} @else {{ route('forum.commenter',
                  ['ferme'
                  => $forum->id]) }} @endisset">
                    {{ csrf_field() }}
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <textarea class="form-control form-control-submit" name="commentaire" rows="6" placeholder="Votre commentaire">{{ $Commentaire->commentaire ?? ''
                          }}</textarea>
                        </div>
                        <button type="submit" class="btn-second btn-submit full-width">Send</button>
                      </div>
                    </div>
                  </form>
                </div>
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
                            <div class="add-fav text-light-white"><img src="assets/img/svg/013-heart-1.svg" alt="tag">
                            </div>
                          </div>
                        </div>
                        <div class="testimonial-caption padding-15">
                          <p class="text-light-white text-uppercase no-margin fs-12">Featured</p>
                          <h5 class="fw-600"><a href="farm.html" class="text-light-black">GSA King Tomato Farm</a></h5>
                          <div class="testimonial-user-box">
                            <img src="assets/img/blog-details/40x40/user-2.png" class="rounded-circle" alt="farm.html">
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
                  <a href="#" class="btn-first white-btn text-light-black fw-600 full-width">See all</a>
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
          </div>
        </aside>
      </div>
    </div>
  </section>
@endsection
