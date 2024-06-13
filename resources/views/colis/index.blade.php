@extends('Layouts.template')
@section('title', 'Gérer les colis')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-8">
                        <h3 class="mb-0">
                            Gérer les colis
                        </h3>
                        <p class="text-sm mb-0">
                            Gérer les colis à partir de cette interface
                        </p>
                    </div>

                    <div class="col-md-4">
                        <a href="{{ route('colis.create') }}" style="float: right;" class="btn-sm btn btn-success"><i class="fa fa-plus" aria-hidden="true"></i> Nouveau colis</a>
                        <a href="{{ route('colis.withdrawal') }}" style="float: right;" class="btn btn-sm btn-secondary"><i class="fa fa-arrow-circle-down" aria-hidden="true"></i> Retrait</a>
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
                                            <a href="{{ route('colis.send', $coli->id) }}" class="btn btn-sm btn-primary"><i class="fa fa-paper-plane" aria-hidden="true"></i></a>
                                            <a href="{{ route('colis.edit', $coli->id) }}" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                                            <form method="POST" action="{{ route('colis.destroy', $coli->id) }}" style="display: inline;">
                                                @csrf
                                                @method("DELETE")
                                                <button class="btn btn-sm btn-danger deleteButton"><i class="fa fa-trash"></i></button>
                                            </form>
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
