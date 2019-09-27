@extends('Layouts.template')

@section('title', "Nouveau colis")

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <!-- Card header -->
                    <div class="card-header">
                        <h3 class="mb-0">Enregistrer un nouveau colis</h3>
                    </div>
                    <!-- Card body -->
                    <div class="card-body">
                        <form method="POST" action="{{ route('colis.store') }}">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="exampleFormControlInput1">Client</label>
                                        <select name="client_id" class="form-control">
                                            @foreach ($clients as $client)
                                                <option value="{{ $client->id }}">{{ $client->firstName }} {{ $client->lastName }} <small>{{ $client->email }}</small></option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="exampleFormControlInput1">Destinataire</label>
                                        <select name="receiver_id" class="form-control">
                                            @foreach ($clients as $client)
                                                <option value="{{ $client->id }}">{{ $client->firstName }} {{ $client->lastName }} <small>{{ $client->email }}</small></option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nom</label>
                                        <input type="text" class="form-control" name="nom">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nature</label>
                                        <input type="text" class="form-control" name="nature">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Poids</label>
                                        <input class="form-control" name="poids">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Quantité</label>
                                        <input type="number" class="form-control" name="quantite">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col md-12">
                                    <label>Contenance</label>
                                    <textarea name="contenance" id="" cols="30" rows="5" class="form-control"></textarea>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-control-label" for="exampleFormControlInput1">Moyen d'envoi</label>
                                        <select name="moyen_envoi" class="form-control">
                                            <option value="Bâteau">Bâteau</option>
                                            <option value="Avion">Avion</option>
                                            <option value="Train">Train</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-control-label" for="exampleFormControlInput1">Tarif perçu</label>
                                        <select name="tarif_id" id="" class="form-control">
                                            @foreach ($tarifs as $tarif)
                                                <option value="{{ $tarif->id }}">{{ $tarif->libelle }} - {{ $tarif->montant }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-control-label" for="exampleFormControlInput1">Valeur en euros</label>
                                        <input type="number" class="form-control" id="exampleFormControlInput1" name="valeur_euro">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="exampleFormControlInput1">Date d'entrée</label>
                                        <input type="text" class="form-control" name="date_entree" value="Aujourd'hui" disabled>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="exampleFormControlInput1">Date prévue d'arrivée</label>
                                        <input type="date" class="form-control" id="exampleFormControlInput1" name="date_arrivee">
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
