@extends('Layouts.template')

@section('title', "Editer le conflit")

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <!-- Card header -->
                    <div class="card-header">
                        <h3 class="mb-0">Editer le conflit</h3>
                    </div>
                    <!-- Card body -->
                    <div class="card-body">
                        <form method="POST" action="{{ route('conflits.update', $incident->id) }}">
                            @csrf
                            @method("PUT")
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="exampleFormControlInput1">Titre</label>
                                        <input type="text" class="form-control" id="exampleFormControlInput1" value="{{ $incident->titre }}" name="titre">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="exampleFormControlInput1">Colis</label>
                                        <select name="colis_id" id="" class="form-control">
                                            @foreach ($colis as $coli)
                                                <option value="{{ $coli->id }}">{{ $coli->nom }} - <em>{{ $coli->client->firstName }} {{ $coli->client->lastName }}</em></option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Motif</label>
                                        <textarea name="motif" cols="30" rows="5" class="form-control">{{ $incident->motif }}</textarea>
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
