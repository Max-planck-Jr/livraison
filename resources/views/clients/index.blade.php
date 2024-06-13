@extends('Layouts.template')
@section('title', 'Gérer les clients')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-8">
                        <h3 class="mb-0">
                            Gérer les clients
                        </h3>
                        <p class="text-sm mb-0">
                            Gérer les clients à partir de cette interface
                        </p>
                    </div>

                    <div class="col-md-4">
                        <a href="{{ route('clients.create') }}" style="float: right;" class="btn-sm btn btn-success"><i class="fa fa-plus" aria-hidden="true"></i> Nouveau client</a>
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
                                    <th>Nom</th>
                                    <th>Prenom</th>
                                    <th>Pseudo</th>
                                    <th>Pays</th>
                                    <th>Téléphone</th>
                                    <th>Email</th>
                                    <th>Adresse</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($clients as $client)
                                    <tr>
                                        <td>{{ $client->id }}</td>
                                        <td>{{ $client->first_name }}</td>
                                        <td>{{ $client->last_name }}</td>
                                        <td>{{ $client->login }}</td>
                                        <td>{{ $client->country }}</td>
                                        <td>{{ $client->phone }}</td>
                                        <td>{{ $client->email }}</td>
                                        <td>{{ $client->address }}</td>
                                        <td>
                                            <a href="{{ route('clients.edit', $client->id) }}" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                                            <form method="POST" action="{{ route('clients.destroy', $client->id) }}" style="display: inline;">
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
