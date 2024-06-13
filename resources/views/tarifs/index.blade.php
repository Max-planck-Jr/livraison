@extends('Layouts.template')
@section('title', 'Gérer les catégories de colis')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-8">
                        <h3 class="mb-0">
                            Gérer les catégories de colis
                        </h3>
                        <p class="text-sm mb-0">
                            Gérer les catégories à partir de cette interface
                        </p>
                    </div>

                    <div class="col-md-4">
                        <a href="{{ route('tarifs.create') }}" style="float: right;" class="btn-sm btn btn-success"><i class="fa fa-plus" aria-hidden="true"></i> Nouvelle catégorie</a>
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
                                    <th>Libellé</th>
                                    <th>Montant Approximatif</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tarifs as $tarif)
                                    <tr>
                                        <td>{{ $tarif->id }}</td>
                                        <td>{{ $tarif->libelle }}</td>
                                        <td>{{ $tarif->montant }}</td>
                                        <td>
                                            <a href="{{ route('tarifs.edit', $tarif->id) }}" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                                            <form method="POST" action="{{ route('tarifs.destroy', $tarif->id) }}" style="display: inline;">
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
