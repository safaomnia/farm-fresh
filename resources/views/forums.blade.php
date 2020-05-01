@extends('layout')

@section('content')

  <section class="our-articles bg-light-theme section-padding pt-0">
    <div class="blog-page-banner"></div>
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-8 blog-inner clearfix" style="margin-left: 200px;">
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
                <div class="comment-form col-md-12">
                  <div class="section-header-left">
                    <h3 class="text-light-black header-title">Publier forum</h3>
                  </div>
                  <form method="POST" action="@isset($forum) {{ route('forum.update.form', ['id' => $forum->id]) }} @else {{ route('forum.publier') }}
                  @endisset">
                    {{ csrf_field() }}
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="text-light-black fw-600">Theme</label>
                          <input type="text" name="theme" class="form-control form-control-submit" value="{{ $forum->theme ?? '' }}">
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="text-light-black fw-600">Description</label>
                          <textarea class="form-control form-control-submit" name="description" rows="6">{{ $forum->description ?? '' }}</textarea>
                        </div>
                        <button type="submit" class="btn-second btn-submit full-width">Send</button>
                      </div>
                    </div>
                  </form>
                </div>

                @foreach($forums as $forum)
                  <a href="{{ route('forum', ['id' => $forum->id]) }}">
                    <div class="col-md-12">
                      <div class="review-box">
                        <div class="review-user">
                          <div class="review-user-img">
                            <img src='{{ URL::asset("assets/img/user/{$forum->client->photo}") }}' class="rounded-circle" alt="#">
                            <div class="reviewer-name">
                              <p class="text-light-black fw-700">{{ $forum->client->prenom }} {{ $forum->client->nom }}<small
                                  class="text-light-white fw-500">{{ $forum->client->adresse }}</small>
                              <p class="text-light-black"><strong class="fw-600">Theme :</strong> {{ $forum->theme }} </p>
                            </div>
                          </div>
                          <div class="review-date"><span class="text-light-white">{{ $time->inWords($forum->created_at) }}</span>
                            @auth
                              @if(Auth::user()->id == $forum->client_id)
                                <a href="{{ route('forum.delete', ['id' => $forum->id]) }}"
                                   onclick="return confirm('Voulez-vous sûr de supprimer ce forum?')">Supprimer</a>
                                <a href="{{ route('forum.update', ['id' => $forum->id]) }}"> Modifier</a>
                              @endif
                            @endauth
                          </div>
                        </div>
                        <div class="ratings">
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
