@extends('layout')

@section('content')
  <!-- ======================= Banner innerpage -->
  <div class="innerpage-banner left bg-overlay-dark-7 py-7"
       style="background:url({{url('images/07.jpg')}}) repeat; background-size:cover;height: 10px;">
    <div class="container" style="margin-top: -50px;">
      <div class="row all-text-white">
        <div class="col-md-12 align-self-center">
          <h1 class="innerpage-title">Ajout de hôtel</h1>
          <h6 class="subtitle">Ajout effectuer seulement par l'agent de hôtel</h6>
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item active"><a href="/"><i class="ti-home"></i>
                  Acceuil</a></li>
              <li class="breadcrumb-item active"><a href="{{ route('hotel') }}"><i
                      class="ti-home"></i> Hôtel</a></li>
              <li class="breadcrumb-item">Ajouter hôtel</li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
  </div>
  <!-- =======================
    Banner innerpage -->

  <section class="pt80 pb80 booking-section login-area">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-6 col-sm-12" style='margin-left:200px;'>
          <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
              <div class="login-box Booking-box">
                <div class="login-top">
                  <h3>Ajout d'un hôtel</h3>
                  <p>Respecter les formes</p>
                </div>
                <form class="login-form" method="POST"
                      action="{{ route('hotel.insert') }}"
                      enctype="multipart/form-data">
                  @csrf
                  @method('PUT')
                  <div class="row">
                    <div class="col-lg-6 col-md-12 col-sm-12 email">
                      <label>Nom</label>
                      <input
                          class="form-control @error('nom') is-invalid @enderror"
                          type="text" name="nom" value="{{ old('nom') }}">
                      @error('nom')
                      <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                      @enderror
                    </div>
                    <div class="col-lg-6 col-md-12 col-sm-12 email">
                      <label>Adresse</label>
                      <input
                          class="form-control @error('adresse') is-invalid @enderror"
                          type="text" name="adresse"
                          value="{{ old('adresse') }}">
                      @error('adresse')
                      <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                      @enderror
                    </div>
                    <div class="col-lg-6 col-md-12 col-sm-12 email">
                      <label>Téléphone</label>
                      <input
                          class="form-control @error('telephone') is-invalid @enderror"
                          type="text" name="telephone"
                          value="{{ old('telephone') }}" maxlength="8">
                      @error('telephone')
                      <span class="invalid-feedback" role="alert"
                            style="margin-bottom: 20px;">
                                <strong>{{ $message }}</strong>
                            </span>
                      @enderror
                    </div>
                    <div class="col-lg-6 col-md-12 col-sm-12 email">
                      <label>Nombre d'étoile</label>
                      <select class="custom-select select-big mb-3"
                              name="categorie">
                        <option value="1">★☆☆☆☆ (1/5)</option>
                        <option value="2">★★☆☆☆ (2/5)</option>
                        <option value="3">★★★☆☆ (3/5)</option>
                        <option value="4">★★★★☆ (4/5)</option>
                        <option value="5"> ★★★★★ (5/5)</option>
                      </select>
                    </div>
                    <div class="col-lg-6 col-md-12 col-sm-12 email">
                      <label style="margin:-20px 0 20px;">Description</label>
                      <textarea
                          class="form-control @error('libelle') is-invalid @enderror"
                          style="border-width: 1px;" name="libelle"
                          rows="5">{{ old('libelle') }}</textarea>
                      @error('libelle')
                      <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                      @enderror
                    </div>
                    <div class="form-group col-lg-6 col-md-12 col-sm-12 email"
                         style="margin-top: -15px;">
                      <label for="exampleFormControlFile1"
                             style="margin-bottom: 7px;">Photo d'hôtel</label>
                      <input
                          class="@error('image') is-invalid @enderror form-control-file"
                          name="image" type="file">
                      @error('image')
                      <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                      @enderror
                    </div>
                    <div class="col-md-4">
                      <button class="Confirm" type="submit" name="button">
                        Ajouter
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
