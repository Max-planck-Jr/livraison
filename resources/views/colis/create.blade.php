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
                                        <select name="user_id" class="form-control">
                                            @foreach ($clients as $client)
                                                <option value="{{ $client->id }}">{{ $client->first_name }} {{ $client->last_name }}</small></option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="exampleFormControlInput1">Destinataire</label>
                                        <select name="receiver_id" class="form-control">
                                            @foreach ($clients as $client)
                                                <option value="{{ $client->id }}">{{ $client->first_name }} {{ $client->last_name }}</small></option>
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
                                        <label>Poids/Kg</label>
                                        <input type="number" class="form-control" name="poids">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Largeur/cm</label>
                                        <input type="number" class="form-control" name="largeur">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Hauteur/cm</label>
                                        <input type="number" class="form-control" name="hauteur">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Longueur/cm</label>
                                        <input type="number" class="form-control" name="longueur">
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Quantité</label>
                                        <input type="number" class="form-control" name="quantite">
                                    </div>
                                </div>

                                {{-- <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Pays - Agence</label>
                                        <input type="text" class="form-control" name="country">
                                    </div>
                                </div> --}}
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-control-label" for="exampleFormControlInput1">Pays - Agence - Destination</label>
                                        <select name="country" id="" class="form-control">
                                            @foreach ($accountTypes as $accountType)
                                                <option value="{{ $accountType->id }}">{{ $accountType->country }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col md-12">
                                    <label>Description</label>
                                    <textarea name="contenance" id="" cols="30" rows="5" class="form-control"></textarea>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-control-label" for="exampleFormControlInput1">Fragilité</label>
                                        <select name="fragilite" class="form-control">
                                            <option value="Fragile">Fragile</option>
                                            <option value="Tres">Très Fragile</option>
                                            <option value="Normale">Normale</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-control-label" for="exampleFormControlInput1">Catégorie</label>
                                        <select name="tarif_id" id="" class="form-control">
                                            @foreach ($tarifs as $tarif)
                                                <option value="{{ $tarif->id }}">{{ $tarif->libelle }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-control-label" for="exampleFormControlInput1">Prix/€</label>
                                        <input type="number" class="form-control" id="exampleFormControlInput1" name="valeur_euro" placeholder="Le prix est calculé en fonction du colis" disabled>
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
                                <div class="col-md-4">
                                    <a onclick="window.location.href='javascript:history.back()'" class="btn btn-md btn-danger" style="color:white">Retour</a>
                                  </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
