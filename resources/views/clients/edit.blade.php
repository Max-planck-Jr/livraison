@extends('Layouts.template')

@section('title', "Modifier le client")

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <!-- Card header -->
                    <div class="card-header">
                        <h3 class="mb-0">Modifier le client</h3>
                    </div>
                    <!-- Card body -->
                    <div class="card-body">
                        <form method="POST" action="{{ route('clients.update', $client->id) }}">
                            @csrf
                            @method("PUT")
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="exampleFormControlInput1">Nom</label>
                                        <input type="text" class="form-control" value="{{ $client->firstName }}" id="exampleFormControlInput1" name="firstName">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="exampleFormControlInput1">Prénom</label>
                                        <input type="text" class="form-control" value="{{ $client->lastName }}" id="exampleFormControlInput1" name="lastName">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="exampleFormControlInput1">Sexe</label>
                                        <select name="gender" class="form-control">
                                            <option value="Homme">Homme</option>
                                            <option value="Femme">Femme</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="exampleFormControlInput1">Adresse</label>
                                        <input type="text" class="form-control" value="{{ $client->adress }}" id="exampleFormControlInput1" name="adress">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="exampleFormControlInput1">Téléphone</label>
                                        <input type="text" class="form-control" value="{{ $client->phone }}" name="phone">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="exampleFormControlInput1">Email</label>
                                        <input type="email" class="form-control" value="{{ $client->email }}" id="exampleFormControlInput1" name="email">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>CNI</label>
                                        <input type="text" class="form-control" value="{{ $client->cni }}" name="cni">
                                    </div>
                                </div>
                            </div>

                            <hr />
                            <div class="row">
                                <div class="col-md-4">
                                    <button class="btn btn-md btn-success">Enregistrer</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
