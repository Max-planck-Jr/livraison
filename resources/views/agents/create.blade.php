@extends('Layouts.template')
@section('title', 'Nouvel utiilisateur')
@section('content')
<div class="col-xl-12 order-xl-1">
        <div class="card bg-secondary shadow">
          <div class="card-header bg-white border-0">
            <div class="row align-items-center">
              <div class="col-8">
                <h3 class="mb-0">Créer les comptes clients, agents et administrateurs</h3>
              </div>
              <div class="col-4 text-right">
                <a onclick="window.location.href='javascript:history.back()'" class="btn btn-sm btn-primary" style="color:white">Retour</a>
              </div>
            </div>
          </div>
          <div class="card-body">
            <form action="{{ route('storeAgent') }}" method="POST">
              @csrf
              <h6 class="heading-small text-muted mb-4">Informations personnelles</h6>
              <div class="pl-lg-4">
                <div class="row">
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label class="form-control-label" for="input-username">Nom</label>
                      <input type="text" id="input-username" name="first_name" required class="form-control form-control-alternative" placeholder="nom">
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label class="form-control-label" for="input-email">Prénom</label>
                      <input type="text" id="input-email" name="last_name" required class="form-control form-control-alternative" placeholder="prenom">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label class="form-control-label" for="input-first-name">Pseudo</label>
                      <input type="text" id="input-first-name" name="login" required class="form-control form-control-alternative" placeholder="Pseudonyme">
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label class="form-control-label" for="input-last-name">Mot de passe</label>
                      <input type="password" id="input-last-name" name="password" required class="form-control form-control-alternative" placeholder="*********">
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label class="form-control-label" for="input-last-name2">Confirmation de mot de passe</label>
                      <input type="password" id="input-last-name2" required name="c_password" class="form-control form-control-alternative" placeholder="*********">
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label class="form-control-label" for="input-last-name2">Cni</label>
                      <input type="text" id="input-last-name2" required name="cni" class="form-control form-control-alternative" placeholder="cni">
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label class="form-control-label" for="input-last-name2">Adresse</label>
                      <input type="text" id="input-last-name2" required name="address" class="form-control form-control-alternative" placeholder="Adresse">
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label class="form-control-label" for="input-last-name2">Téléphone</label>
                      <div class="input-group-prepend">
                        <span class="input-group-text">+32</span>
                        <input type="text" id="phone_number" required name="phone" class="form-control form-control-alternative" placeholder="Téléphone">
                    </div>
                      
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label class="form-control-label" for="input-last-name2">Email</label>
                      <input type="email" id="input-last-name2" required name="email" class="form-control form-control-alternative" placeholder="Email">
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label class="form-control-label" for="input-last-name2">Pays</label>
                      <input type="text" id="input-last-name2" required name="country" class="form-control form-control-alternative" placeholder="Pays">
                    </div>
                  </div>
                  {{-- <div class="col-lg-6">
                    <div class="form-group">
                      <label class="form-control-label" for="input-last-name3">Pays</label>
                      <select class="form-control form-control-alternative" name="country" id="input-last-name3">
                          <option value="Suisse">Suisse</option>
                          <option value="Cameroun">Cameroun</option>
                      </select>
                    </div>
                  </div> --}}
                  <div class="col-lg-6">
                        <div class="form-group">
                          <label class="form-control-label" for="input-last-name3">Type de compte</label>
                          <select class="form-control form-control-alternative" name="account_id" id="input-last-name3">
                            @foreach ($accounts as $account)
                                <option value="{{ $account->id }}">{{ $account->label }}</option>
                            @endforeach
                          </select>
                        </div>
                      </div>
                </div>
                <hr class="my-4" />
                <div class="row">
                    <div class="col-lg-4" style="width: 200px; margin: auto">
                        <div class="form-group">
                            <input type="submit" id="input-last-name2" class="form-control form-control-alternative btn-success" value="Enregistrer">
                        </div>
                    </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
@endsection