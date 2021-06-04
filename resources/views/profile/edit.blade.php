@extends('layout')

@section('content')
  <div class="main-sec"></div>
  <!-- Navigation -->
  <section class="register-restaurent-sec section-padding bg-light-theme" style="margin-left: 200px;">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-7">
          <div class="sidebar-tabs main-box padding-20 mb-md-40">
            <div id="add-restaurent-tab" class="step-app">
              <div class="row">
                <div class="col-xl-12 col-lg-7">
                  <div class="step-content">
                    <div class="step-tab-panel active" id="steppanel1">
                      <form method="POST" action="{{ route('profile.update') }}">
                        {{ csrf_field() }}
                        <div class="general-sec">
                          <div class="row">
                            <div class="col-12">
                              <h5 class="text-light-black fw-700">Général Information</h5>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label class="text-light-black fw-700">Nom</label>
                                <input type="text" name="nom" class="form-control form-control-submit" value="{{ $client->nom }}">
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label class="text-light-black fw-700">Prénom</label>
                                <input type="text" name="prenom" class="form-control form-control-submit" value="{{ $client->prenom }}">
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label class="text-light-black fw-700">Date de naissance</label>
                                <input type="date" name="datenai" class="form-control form-control-submit" value="{{ $client->datenai }}">
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label class="text-light-black fw-700">Téléphone</label>
                                <input type="text" name="telephone" class="form-control form-control-submit" value="{{ $client->telephone }}">
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label class="text-light-black fw-700">Email</label>
                                <input type="text" name="email" class="form-control form-control-submit" value="{{ $client->email }}">
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label class="text-light-black fw-700">Adresse</label>
                                <input type="text" name="adresse" class="form-control form-control-submit" value="{{ $client->adresse }}">
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label class="text-light-black fw-700">Sexe</label>
                                <input type="file" name="photo" class="custom-file">
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label class="text-light-black fw-700">Sexe</label><br>
                                <input type="radio" name="sexe" class="custom-radio" value="Homme" @if($client->sexe == 'Homme') checked @endif> Homme
                                <input type="radio" name="sexe" class="custom-radio" value="Femme" @if($client->sexe == 'Femme') checked @endif> Femme
                              </div>
                            </div>
                          </div>
                          @if($client->type != 'client')
                            <div class="row" style="margin-top: 30px;">
                              <div class="col-12">
                                <h5 class="text-light-black fw-700">Additional Information</h5>
                              </div>
                              @isset($client->livreur)
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <label class="text-light-black fw-700">Nom de l'entreprise</label>
                                    <input type="text" name="nom_entreprise" class="form-control form-control-submit" value="{{ $client->livreur->nom_entreprise  }}">
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <label class="text-light-black fw-700">Télephone de l'entreprise</label>
                                    <input type="text" name="telephone_entreprise" class="form-control form-control-submit" value="{{
                                  $client->livreur->telephone_entreprise  }}">
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <label class="text-light-black fw-700">Adresse de l'entreprise</label>
                                    <input type="text" name="adresse_entreprise" class="form-control form-control-submit" value="{{ $client->livreur->adresse_entreprise
                                  }}">
                                  </div>
                                </div>
                              @endisset
                              @isset($client->agriculteur)
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <label class="text-light-black fw-700">Domaine</label>
                                    <textarea type="text" name="domaine" class="form-control form-control-submit" rows="3">{{ $client->agriculteur->domaine }}</textarea>
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <label class="text-light-black fw-700">Certification</label>
                                    <input type="text" name="certificate" class="form-control form-control-submit" value="{{ $client->agriculteur->certificate }}">
                                  </div>
                                </div>
                              @endisset
                            </div>
                          @endif
                        </div>
                        <button class="btn-second btn-submit">Modifier</button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3">
          <div class="advertisement-slider swiper-container h-auto">
            <div class="swiper-wrapper">
              <div class="swiper-slide">
                <div class="large-product-box p-relative pb-0">
                  <img src='{{ URL::asset("assets/img/user/$client->photo") }}' class="img-fluid full-width" alt="image">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
