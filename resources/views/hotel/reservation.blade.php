@extends('layout')

@section('content')
  <section class="pt80 pb80">
    <div class="container">
      <div class="row">
        <div class="col-sm-12 mb-5">
          <h5 class="text-center mb-4">Liste de vos reservation</h5>
          @if($reservations->isNotEmpty())
            <div class="table-responsive-sm">
              <table class="table table-lg table-noborder table-striped">
                <thead class="all-text-white bg-grad">
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Date de début</th>
                  <th scope="col">Date de fin</th>
                  <th scope="col">Date de création</th>
                  <th scope="col">Hôtel</th>
                  <th scope="col">N°Chambre</th>
                </tr>
                </thead>
                <tbody>
                @foreach($reservations as $reservation)
                  <tr>
                    <th scope="row">{{ $reservation->id }}</th>
                    <td>{{ $reservation->date_debut }}</td>
                    <td>{{ $reservation->date_fin }}</td>
                    <td>{{ $reservation->created_at }}</td>
                    <td>
                      <?php
                      $chambre = App\Chambre::find($reservation->id_chambre);
                      $hotel = App\Hotel::find($chambre->id_hotel);
                      echo $hotel->nom;
                      ?>
                    </td>
                    <td>{{ $reservation->id_chambre }}</td>
                  </tr>
                @endforeach
                </tbody>
              </table>
            </div>
          @else
            <tr>
              <div class="alert alert-info alert-dismissible fade show" role="alert">
                <strong>Aucune réservation</strong> trouvée à ce moment.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
            </tr>
          @endif
        </div>
      </div>
    </div>
  </section>
@endsection
