@extends('Layouts.template_login')
@section('title', 'Connexion')
@section('content')
<div class="container mt--8 pb-5">
    <div class="row justify-content-center">
        <div class="col-lg-5 col-md-7">
            <div class="card bg-secondary shadow border-0">
                <div class="card-header bg-transparent pb-5">
                    <div class="text-muted text-center mt-2 mb-3"><small>Se connecter avec</small></div>
                    <div class="btn-wrapper text-center">
                        <a href="login.html#" class="btn btn-neutral btn-icon">
                            <span class="btn-inner--icon"><img src="\img/icons/common/github.svg"></span>
                            <span class="btn-inner--text">Github</span>
                        </a>
                        <a href="login.html#" class="btn btn-neutral btn-icon">
                            <span class="btn-inner--icon"><img src="\img/icons/common/google.svg"></span>
                            <span class="btn-inner--text">Google</span>
                        </a>
                    </div>
                </div>

                <div class="card-body px-lg-5 py-lg-5">
                    <div class="text-center text-muted mb-4">
                        <small>Ou avec vos identifiants</small>
                    </div>
                    <form action="{{ route('loginAction') }}" method="POST">
                        @csrf
                        <div class="form-group mb-3">
                            <div class="input-group input-group-alternative">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                                </div>
                                <input class="form-control" placeholder="Pseudo" name="login" type="text">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group input-group-alternative">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                                </div>
                                <input class="form-control" placeholder="mot de passe" name="password" type="password">
                            </div>
                        </div>
                        <div class="custom-control custom-control-alternative custom-checkbox">
                            <input class="custom-control-input" id=" customCheckLogin" type="checkbox">
                            <label class="custom-control-label" for=" customCheckLogin">
                                <span class="text-muted">Se souvenir de moi</span>
                            </label>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary my-4">Connexion</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-6">
                    <a href="login.html#" class="text-light"><small>Mot de passe oublié?</small></a>
                </div>
                <div class="col-6 text-right">
                    <a href="login.html#" class="text-light"><small>Créer un nouveau compte</small></a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
