@extends('layout')

@section('content')

  <section class="our-articles bg-light-theme section-padding pt-0">
    <div class="blog-page-banner"></div>
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-10 blog-inner clearfix" style="margin-left: 100px;">
          <div class="main-box padding-20 full-width">
            <div class="breadcrumb-wrpr">
              <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="/" class="text-light-black">Acceuil</a></li>
                <li class="breadcrumb-item active" aria-current="page">forum</li>
              </ul>
            </div>
            <!-- restaurent reviews -->
            <section class="restaurent-review smoothscroll" id="review">
              <div class="row">
                @foreach($forums as $forum)
                  <a href="{{ route('forum', ['id' => $forum->id]) }}">
                    <div class="col-md-12">
                      <div class="review-box">
                        <div class="review-user">
                          <div class="review-user-img">
                            <img src='{{ URL::asset("assets/img/user/{$forum->client->photo}") }}' class="rounded-circle" alt="#">
                            <div class="reviewer-name">
                              <p class="text-light-black fw-600">{{ $forum->client->prenom }} {{ $forum->client->nom }}<small
                                  class="text-light-white fw-500">{{ $forum->client->adresse }}</small>
                            </div>
                          </div>
                          <div class="review-date"><span class="text-light-white">{{ $time->inWords($forum->created_at) }}</span>
                          </div>
                        </div>
                        <div class="ratings">
                          <p class="text-light-black"><strong>Theme :</strong> {{ $forum->theme }} </p>
                          <p class="text-light-black">{{ substr($forum->description, 0, 100) }}...</p>
                        </div>
                      </div>
                      <div class="u-line"></div>
                    </div>
                  </a>
                @endforeach
              </div>
            </section>
            <!-- restaurent reviews -->
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
