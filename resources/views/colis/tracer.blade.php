@extends('Layouts.template')
@section('title', 'Trouver un colis')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-8">
                        <h3 class="mb-0">
                            Trouver un colis
                        </h3>
                        <p class="text-sm mb-0">
                            Consulter l'etat d'envoi d'un coli
                        </p>
                    </div>
                </div>
            </div>

            <div class="table-responsive py-4">
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-flush dataTable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Client</th>
                                    <th>Destinaire</th>
                                    <th>Nom du colis</th>
                                    <th>Date d'entrée</th>
                                    <th>Date prévue d'arrivée</th>
                                    <th>Statut</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($colis as $coli)
                                    <tr>
                                        <td>{{ $coli->id }}</td>
                                        <td>{{ $coli->user->first_name }} {{ $coli->user->last_name }}</td>
                                        <td>{{ $coli->receiver ? $coli->receiver->first_name." ".$coli->receiver->last_name : "Non défini" }}</td>
                                        <td>{{ $coli->nom }}</td>
                                        <td>{{ $coli->date_entree }}</td>
                                        <td>{{ $coli->date_arrivee }}</td>
                                        <td>{!! $coli->statut == "En attente" ? '<span class="badge badge-default">'.$coli->statut.'</span>' : '<span class="badge badge-success">'.$coli->statut.'</span>' !!}</td>
                                        <td>
                                            <a href="{{ route('colis.show', $coli->id) }}" class="btn btn-sm btn-default"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>

    </script>
@endsection
