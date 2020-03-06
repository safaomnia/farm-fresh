@extends('layout')

@section('content')

  <section class="registration">
    <div class="container">
      <div class="row">
        <div class="col-md-12" style="width: 300px;">
          <div class="registration-box">
            <div class="reg-top">
              <h3>Créer un compte.</h3>
              <p>Créer un compte pour accéder à votre espace.</p>

            </div>
            <form class="reg-form" method="POST" action="{{ route('register') }}"
                  onsubmit="return form()">
              @csrf
              <div class="row">
                <div class="col-md-6 name">
                  <label>Nom</label>
                  <input type="text" id="input"
                         class="form-control @error('nom') is-invalid @enderror"
                         name="nom" value="{{ old('nom') }}">
                  @error('nom')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
                <div class="col-md-6 srname">
                  <label>Prénom</label>
                  <input type="text"
                         class="form-control @error('prenom') is-invalid @enderror"
                         name="prenom" value="{{ old('prenom') }}">
                  @error('prenom')
                  <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                  @enderror
                </div>
                <div class="col-md-12 email">
                  <label>Email</label>
                  <input type="text"
                         class="form-control @error('email') is-invalid @enderror"
                         name="email" value="{{ old('email') }}">
                  @error('email')
                  <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                  @enderror
                </div>
                <div class="col-md-12 password">
                  <label>Mot de passe</label>
                  <input type="password"
                         class="form-control @error('password') is-invalid @enderror"
                         name="password" autocomplete="new-password">
                  @error('password')
                  <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                  @enderror
                </div>
                <div class="col-md-12 password">
                  <label>Confirmer mot de passe</label>
                  <input id="confirm" type="password" class="form-control"
                         name="password_confirmation" autocomplete="new-password">
                </div>
                <div class="col-md-3 email">
                  <label>Sexe</label>
                </div>
                <div class="col-md-6 custom-radio">
                  <input type="radio" name="sexe" value="homme" id="homme"
                         checked>
                  <label for="homme">Homme</label>
                  <input type="radio" name="sexe" value="femme" id="femme"
                         style="margin-left: 30px;">
                  <label for="femme">Femme</label>
                </div>
                <div class="col-md-6" style="margin-left: 100px;">
                  <button type="submit" id="button">Inscrire</button>
                </div>
              </div>
            </form>
            <div class="login-btm text-center">
              <p>Vous avez déjà un compte? <a href="{{ route('login') }}">Connecter-vous</a></p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
