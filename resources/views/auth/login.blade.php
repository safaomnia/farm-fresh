@extends('layout')

@section('content')
  <section class="login-area">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          @error('email')
          <div class="alert alert-danger alert-dismissible fade show" role="alert" style="margin-left: 305px; width: 45%;">
            <strong>Erreur de connexion: </strong>{{ $message }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          @enderror
          <div class="login-box">
            <div class="reg-top">
              <h3>Bienvenue! </h3>
              <p>Connecter à votre compte.</p>
            </div>
            <form class="login-form" method="POST" action="{{ route('login') }}" style="margin-top: 30px;">
              @csrf
              <div class="row">
                <div class="col-md-12 email">
                  <label>Email</label>
                  <input type="text" class="form-control" name="email" value="{{ old('email') }}">
                </div>
                <div class="col-md-12 password">
                  <label>Mot de passe</label>
                  <input class="form-control" type="password" name="password">
                </div>
                <div class="col-md-6" style="margin-left: 100px;">
                  <button type="submit" id="button">Connecter</button>
                </div>
              </div>
            </form>
            <div class="login-btm text-center">
              <p>Vous n'avez pas un compte? <a href="{{ route('register') }}">Inscrire-vous</a></p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
