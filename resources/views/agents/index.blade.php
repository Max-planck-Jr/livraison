@extends('Layouts.template')
@section('title', 'Listes des employés')
@section('content')
<div class="container">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-8">
                        <h3 class="mb-0">
                            Gérer les agents
                        </h3>
                        <p class="text-sm mb-0">
                            Listes des agents de l'agence
                        </p>
                    </div>

                    <div class="col-md-4">
                        <a href="{{ route('newAgent') }}" style="float: right;" class="btn-sm btn btn-success"><i class="fa fa-plus" aria-hidden="true"></i> Nouvel agent</a>
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
                                        <td>{{ $agent->id }}</td>
                                        <td>{{ $agent->first_name }}</td>
                                        <td>{{ $agent->last_name }}</td>
                                        <td>{{ $agent->login }}</td>
                                        <td>{{ $agent->account_id }}</td>
                                        <td>{{ $agent->country }}</td>
                                        <td>
                                            <a href="{{ route('editAgent', ['id' => $agent->id]) }}" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                                            <form style="display: inline-block" method="post" id="form" action="{{ route('destroyAgent', ['id' => $agent->id]) }}" style="border:none">
                                                @csrf
                                                <button id="delete" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
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
@section('script')
<script>
    /* $(".dataTable").DataTable(); */
</script>
<script>
    $("#form").submit(function(e) {
        /* e.preventDefault();
        if(confirm("Vous allez supprimer cet agent"))
        {
            e.submit;
        } */
    })
</script>
@endsection