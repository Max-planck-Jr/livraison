@extends('Layouts.template')
@section('title', 'Listes des utilisateurs')
@section('content')
<div class="container">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-8">
                        <h3 class="mb-0">
                            Gérer les utilisateurs
                        </h3>
                        <p class="text-sm mb-0">
                            Listes des utilisateurs de l'agence
                        </p>
                    </div>

                    <div class="col-md-4">
                        <a href="{{ route('newAgent') }}" style="float: right;" class="btn-sm btn btn-success"><i class="fa fa-plus" aria-hidden="true"></i> Nouvel utilisateur</a>
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
                                    <th>Type de compte</th>
                                    <th>Pays</th>
                                    <th>Options</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($agents as $agent)
                                    <tr>
                                        <td>{{ ++$count }}</td>
                                        <td>{{ $agent->first_name }}</td>
                                        <td>{{ $agent->last_name }}</td>
                                        <td>{{ $agent->login }}</td>
                                        <td>{{ $agent->accountType->label }}</td>
                                        <td>{{ $agent->country }}</td>
                                        <td>
                                            <a href="{{ route('editAgent', ['id' => $agent->id]) }}" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                                            <form style="display: inline-block" method="post" id="form" action="{{ route('destroyAgent', ['id' => $agent->id]) }}" style="border:none">
                                                @csrf
                                                <button type="button" class="btn btn-sm deleteButton btn-danger"><i class="fa fa-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $agents->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
