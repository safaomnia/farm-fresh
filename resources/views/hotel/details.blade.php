@extends('layout')

@section('content')
  <section>
    <!-- Slider main container-->
    <div class="swiper-container detail-slider slider-gallery">
      <!-- Additional required wrapper-->
      <div class="swiper-wrapper">
        <!-- Slides-->
        @foreach ($rooms as $room)
          <div class="swiper-slide">
            <a data-toggle="gallery-top" title="Our street">
              <img src="{{ asset("images/rooms/$room->image") }}" alt="chambre"
                   class="img-fluid">
            </a>
          </div>
        @endforeach
      </div>
      <div class="swiper-pagination swiper-pagination-white"></div>
      <div class="swiper-button-prev swiper-button-white"></div>
      <div class="swiper-button-next swiper-button-white"></div>
    </div>
  </section>
  <section class="pt80 pb80 listingDetails Campaigns">
    <div class="container">
      <div class="row" style="margin-left:20px;">
        <!-- Tab line -->
        <div class="col-lg-8 col-md-8 col-sm-8 ">
          <ul class="nav nav-tabs tab-line">
            <li class="nav-item"><a class="nav-link active" data-toggle="tab"
                                    href="#tab-de-1"> Description </a></li>
            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#tab-de-2">
                Chambre </a></li>
          </ul>
          <div class="tab-content">
            <div class="tab-pane booking-search show active" id="tab-de-1">
              <div class="text-block NopaddingDetails">
                <h5 class="mb-4">{{ $hotel->nom }}</h5>
                <p class="text-muted font-weight-light">{{ $hotel->libelle }}</p>
                <h5 class="mb-4">Reviews</h5>
                @foreach($avis as $avie)
                  <?php foreach ($utilisateurs as $utilisateur) if ($utilisateur->id == $avie->id_utilisateur) $user = $utilisateur; ?>
                  <div class="media d-block d-sm-flex review">
                    <div class="text-md-center mr-4 mr-xl-5"><img
                        src="{{asset("images/team/$user->photo")}}"
                        alt="{{ $user->prenom }} {{ $user->nom }}"
                        class="avatar"></div>
                    <div class="media-body">
                      <h6 class="mt-2 mb-1">{{ $user->prenom }} {{ $user->nom }}</h6>
                      <div class="mb-2">
                        @for($i=0; $i < $avie->note; $i++)
                          <i class="fa fa-xs fa-star text-primary"></i>
                        @endfor
                      </div>
                      <p class="text-muted text-sm">{{ $avie->commentaire }}</p>
                    </div>
                  </div>
                @endforeach
                <div class="rebiew_section">
                  <div id="leaveReview" class="mt-4 collapse show" style="">
                    <h5 class="mb-4">Laisser un commentaire</h5>
                    <form id="contact-form" method="POST"
                          action="{{ route('hotel.comment', $id) }}"
                          class="form">
                      @csrf
                      @method('PUT')
                      <div class="row">
                        <div class="col-sm-12">
                          <div class="form-group">
                            <select name="note" id="rating" class="custom-select focus-shadow-0">
                              <option value="5">★★★★★ (5/5)</option>
                              <option value="4">★★★★☆ (4/5)</option>
                              <option value="3">★★★☆☆ (3/5)</option>
                              <option value="2">★★☆☆☆ (2/5)</option>
                              <option value="1">★☆☆☆☆ (1/5)</option>
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <textarea rows="4" name="commentaire" id="review" placeholder="Enter your review" class="form-control"></textarea>
                      </div>
                      <button type="submit" class="btn btn-primary"> Commenter </button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
            <div class="tab-pane" id="tab-de-2">
              <div class="text-block NopaddingDetails">
                <!-- Gallery-->
                <h5 class="mb-4">Gallery</h5>
                <div class="row gallery ml-n1 mr-n1">
                  @foreach ($rooms as $room)
                    <div class="col-lg-4 col-6 px-1 mb-2">
                      <a href="{{ route('room.details', $room->id) }}"><img
                          src="{{ asset("images/rooms/$room->image") }}"
                          alt="..."
                          class="img-fluid"></a>
                    </div>
                  @endforeach
                </div>
              </div>
            </div>
            <div class="tab-pane" id="tab-de-4">
              <div class="text-block NopaddingDetails">
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-12 col-sm-12 right_Details">
          @if(Session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert" style="margin-left: 20px; width: 94%;">
              <strong>Erreur de réservation: </strong> {{ Session('error') }}
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          @endif
          <div class="p-4 shadow ml-lg-4 rounded sticky-top" style="top: 100px;">
            <p class="text-muted"><span class="text-primary h2">$80</span> par nuit</p>
            <hr class="my-4">
            <form id="booking-form" method="POST" action="{{ route('hotel.booking', $id) }}" autocomplete="off" class="form">
              @csrf
              @method('PUT')
              <div class="form-group">
                <label for="bookingDate" class="form-label">Date de début *</label>
                <div class="datepicker-container datepicker-container-right">
                  <input type="date" name="debut" id="debut" placeholder="Choose your dates" class="form-control @error('debut') is-invalid @enderror" value="{{ old
                  ('debut') ?? date("Y-m-d")}}" onblur="My_Date()">
                  @error('debut')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
              </div>
              <div class="form-group">
                <label for="bookingDate" class="form-label" >Date de fin *</label>
                <div class="datepicker-container datepicker-container-right">
                  <input type="date" name="fin" id="fin" placeholder="Choose your dates" class="form-control @error('fin') is-invalid @enderror" value="{{ old('fin')
                   ?? date("Y-m-d") }}">
                  @error('fin')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                  <script>
                    function My_Date() {
                      document.getElementById("fin").value = document.getElementById("debut").value;
                    }
                  </script>
                </div>
              </div>
              <div class="form-group mb-4">
                <label for="guests" class="form-label">Client *</label>
                <select name="nb" id="guests" class="form-control">
                  <option value="1" >1 Client</option>
                  <option value="2">2 Client</option>
                  <option value="3">3 Client</option>
                  <option value="4">4 Client</option>
                  <option value="5">5 Client</option>
                </select>
              </div>
              <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block">Réserver</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>

@endsection
