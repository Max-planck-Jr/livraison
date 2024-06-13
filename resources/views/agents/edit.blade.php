@extends('Layouts.template')
@section('title', 'Editer l\'utilisateur')
@section('content')
<div class="col-xl-12 order-xl-1">
        <div class="card bg-secondary shadow">
          <div class="card-header bg-white border-0">
            <div class="row align-items-center">
              <div class="col-8">
                <h3 class="mb-0">Mise à jour informations de l'utilisateur {{ $user->first_name }} </h3>
              </div>
              <div class="col-4 text-right">
                <a onclick="window.location.href='javascript:history.back()'" class="btn btn-sm btn-primary" style="color:white">Retour</a>
              </div>
            </div>
          </div>
          <div class="card-body">
            <form action="{{ route('updateAgent', ['id' => $user->id]) }}" method="POST">
              @csrf
              <h6 class="heading-small text-muted mb-4">Informations personnelles</h6>
              <div class="pl-lg-4">
                <div class="row">
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label class="form-control-label" for="input-username">Nom</label>
                      <input type="text" id="input-username" name="first_name" class="form-control form-control-alternative" placeholder="{{ $user->first_name }}">
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label class="form-control-label" for="input-email">Prénom</label>
                      <input type="text" id="input-email" name="last_name" class="form-control form-control-alternative" placeholder="{{ $user->last_name }}">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label class="form-control-label" for="input-first-name">Pseudo</label>
                      <input type="text" id="input-first-name" name="login" class="form-control form-control-alternative" placeholder="{{ $user->login }}">
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label class="form-control-label" for="input-last-name">Mot de passe</label>
                      <input type="password" id="input-last-name" name="password" class="form-control form-control-alternative" placeholder="*********">
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label class="form-control-label" for="input-last-name2">Confirmation de mot de passe</label>
                      <input type="password" id="input-last-name2" name="c_password" class="form-control form-control-alternative" placeholder="*********">
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label class="form-control-label" for="input-email">Pays</label>
                      <input type="text" id="input-last-name2" name="country" class="form-control form-control-alternative" placeholder="{{ $user->country }}">
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label class="form-control-label" for="input-email">Cni</label>
                      <input type="text" id="input-last-name2" name="cni" class="form-control form-control-alternative" placeholder="{{ $user->cni }}">
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label class="form-control-label" for="input-email">Phone</label>
                      <input type="text" id="input-last-name2" name="phone" class="form-control form-control-alternative" placeholder="{{ $user->phone }}">
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label class="form-control-label" for="input-email">Adresse</label>
                      <input type="text" id="input-last-name2" name="address" class="form-control form-control-alternative" placeholder="{{ $user->address }}">
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
