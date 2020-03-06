@extends('layout')

@section('content')

  <!-- =======================
	Banner innerpage -->
  <div class="innerpage-banner left bg-overlay-dark-7 py-7"
       style="background:url({{asset('images/07.jpg')}}) repeat; background-size:cover;height: 10px;">
    <div class="container" style="margin-top: -50px;">
      <div class="row all-text-white">
        <div class="col-md-12 align-self-center">
          <h1 class="innerpage-title">Liste des hotéls</h1>
          <h6 class="subtitle">Vous pouvez le réserver</h6>
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item active">
                <a href="{{ route('home') }}"><i class="ti-home"></i> Acceuil</a>
              </li>
              <li class="breadcrumb-item">hôtel</li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
  </div>
  <!-- ======================= Banner innerpage -->
  <section class="pt80 pb80 cruise-grid-view">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-12">

          <div class="Filter-left">
            <form method="POST" action="{{ route('hotel.search') }}">
              @csrf
              <div class="mb-left">
                <label for="form-group" class="form-label">Nom</label>
                <div class="form-group">
                  <input class="form-control" type="text" name="nom">
                </div>
              </div>
              <div class="mb-left">
                <label for="form_guests" class="form-label">Ville</label>
                <select class="custom-select select-big" name="adresse">
                  <option value="" selected="" disabled="">Choisir</option>
                  <option value="Tunis">Tunis</option>
                  <option value="Jendouba">Jendouba</option>
                  <option value="Sfax">Sfax</option>
                  <option value="Sousse">Sousse</option>
                  <option value="Monastir">Monastir</option>
                  <option value="Bizerte">Bizerte</option>
                  <option value="Gabès">Gabès</option>
                  <option value="Kairouan">Kairouan</option>
                  <option value="Mahdia">Mahdia</option>
                  <option value="Nabeul">Nabeul</option>
                  <option value="Ariana">Ariana</option>
                  <option value="Gafsa">Gafsa</option>
                  <option value="Hammamet">Hammamet</option>
                  <option value="Tozeur">Tozeur</option>
                  <option value="Médenine">Médenine</option>
                  <option value="Kef">Kef</option>
                  <option value="Béja">Béja</option>
                  <option value="Tataouine">Tataouine</option>
                  <option value="Kasserine">Kasserine</option>
                  <option value="Manouba">Manouba</option>
                  <option value="Sidi Bouzid">Sidi Bouzid</option>
                  <option value="Zaghouan">Zaghouan</option>
                  <option value="Zarzis">Zarzis</option>
                  <option value="Siliana">Siliana</option>
                  <option value="Ben Arous">Ben Arous</option>
                </select>
              </div>
              <div class="mb-left">
                <label for="form_type" class="form-label">Catégorie</label>
                <select class="custom-select select-big" name="categorie">
                  <option value="" selected="" disabled="">Choisir</option>
                  <option value="5">★★★★★ 5</option>
                  <option value="4">★★★★☆ 4</option>
                  <option value="3">★★★☆☆ 3</option>
                  <option value="4">★★☆☆☆ 2</option>
                  <option value="1">★☆☆☆☆ 1</option>
                </select>
              </div>
              <div class="pb-left">
                <div class="mb-left">
                  <button type="submit"
                          class="btn btn-primary btn-grad FilterBtn"><i
                      class="fas fa-search mr-1"></i>Chercher
                  </button>
                </div>
              </div>
            </form>
          </div>
        </div>
        @if($hotels->isNotEmpty())
          <div class="col-lg-8 col-md-8 col-sm-12">
            <div class="resultBar barSpaceAdjust">
              <h2>Nous avons trouvé <span>{{ count($hotels) }}</span> résultats pour vous
              </h2>
            </div>
            <div class="row">
              <div class="col-lg-12 col-md-12 col-sm-12">
                @foreach($hotels as $hotel)
                  <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                      <div class="row listroBox">
                        <div
                          class="col-lg-5 col-md-5 col-sm-6 col-xs-12 Nopadding">
                          <figure>
                            <a href="{{ route('hotel.details', $hotel->id) }}"></a>
                            <a href="{{ route('hotel.details', $hotel->id) }}"><img
                                src="{{ asset("images/hotels/$hotel->image")}}"
                                alt="">
                              <div class="read_more">
                                <span>Afficher plus</span></div>
                            </a>
                          </figure>
                        </div>
                        <div
                          class="col-lg-7 col-md-7 col-sm-6 col-xs-12 Nopadding">
                          <div class="listroBoxmain">

                            <h3 style="margin-bottom: 30px;">
                              <a href="{{ route('hotel.details', $hotel->id) }}">{{ $hotel->nom }}</a>
                              <i class="fa fa-ellipsis-v mr-2 mb-0"
                                 role="button" id="dropdownAccount"
                                 data-toggle="dropdown"
                                 aria-haspopup="true"
                                 aria-expanded="false"
                                 style="float: right;"></i>
                              <div class="dropdown-menu mt-2 shadow"
                                   aria-labelledby="dropdownAccount"
                                   style="margin-right: 220px;">
                                <a class="dropdown-item"
                                   href="{{ route("hotel.edit", $hotel->id) }}">Modifier</a>
                                <a class="dropdown-item"
                                   href="{{ route("hotel.delete", $hotel->id) }}"
                                   onclick="return confirm('Voulez-vous sûr de suprrimer ce hôtel?');">Supprimer</a>
                              </div>
                            </h3>
                            <h3>
                              <a href="{{ route('hotel.details', $hotel->id) }}"></a>
                            </h3>
                            <p>
                              <?php
                              $libelle = $hotel->libelle;
                              $n = strlen($libelle);
                              if ($n > 150) {
                                for ($i = 0; $i < 150; $i++) echo $libelle[$i];
                                echo ' ...';
                              } else {
                                echo $libelle;
                              }
                              ?>
                            </p>
                            <a href="#" style="color: grey;"><i
                                class="fas fa-map-marker-alt"></i> {{ $hotel->adresse }}
                            </a>
                            <a href="#" style="color: grey;"><i
                                class="fas fa-phone"></i> {{ $hotel->telephone }}
                            </a>
                          </div>
                          <ul>
                            <li><span class="Ropen">Now Open</span></li>
                            <li>
                              <div class="R_retings">
                              <span>
                                <?php $agent = App\User::find($hotel->id_agent); echo "$agent->prenom $agent->nom";?>
                                <em>{{ $agent->adresse }}</em>
                              </span>
                                <strong>{{ $hotel->categorie }}</strong>
                              </div>
                            </li>
                          </ul>
                        </div>
                      </div>
                    </div>
                  </div>
                @endforeach
              </div>
              <div class="paginationCommon  categoryPagination">
                <nav aria-label="Page navigation">
                  <ul class="pagination">
                    <li><a href="#">{{ $hotels->links() }}</a></li>
                  </ul>
                </nav>
              </div>
            </div>
          </div>
        @else
          <div class="col-sm-8">
            <div class="alert alert-info" role="alert">
              <h4 class="alert-heading">Aucun hôtel touvée</h4>
              <hr>
              <p>Hôtels non trouvés en ce moment, nous ajouterons bientôt.</p>
            </div>
          </div>
        @endif
      </div>
    </div>
  </section>

@endsection
