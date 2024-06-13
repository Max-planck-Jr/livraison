@extends('Layouts.template')
@section('title', 'Gérer les messages')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-8">
                        <h3 class="mb-0">
                            Gérer les messages
                        </h3>
                        <p class="text-sm mb-0">
                            Gérer les messages des clients à partir de cette interface
                        </p>
                    </div>

                    {{-- <div class="col-md-4">
                        <a href="{{ route('conflits.create') }}" style="float: right;" class="btn-sm btn btn-success"><i class="fa fa-plus" aria-hidden="true"></i> Nouvel incident</a>
                    </div> --}}
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
                                    <th>Nom du colis</th>
                                    <th>Objet</th>
                                    <th>Contenu</th>
                                    <th>Statut</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($incidents as $conflit)
                                    <tr>
                                        <td>{{ $conflit->id }}</td>
                                        <td>{{ $conflit->coli->user->first_name }} {{ $conflit->coli->user->last_name }}</td>
                                        <td>{{ $conflit->coli->nom }}</td>
                                        <td>{{ $conflit->titre }}</td>
                                        <td>{{ $conflit->motif }}</td>
                                        <td>{!! $conflit->statut == "En attente" ? '<span class="badge badge-default">'.$conflit->statut.'</span>' : '<span class="badge badge-success">'.$conflit->statut.'</span>' !!}</td>
                                        <td>
                                            <!--<a href="{{ route('conflits.show', $conflit->id) }}" class="btn btn-sm btn-default"><i class="fa fa-eye" aria-hidden="true"></i></a>-->
                                            @if ($conflit->statut == "En attente")
                                                <a href="{{ route('conflits.resolve', $conflit->id) }}" class="btn btn-sm btn-primary"><i class="fa fa-check" aria-hidden="true"></i></a>
                                            @endif
                                            
                
                                            <form method="POST" action="{{ route('conflits.destroy', $conflit->id) }}" style="display: inline;">
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
