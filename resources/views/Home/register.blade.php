@extends('Layouts.template_login')
@section('title', 'Inscription')
@section('content')
<div class="container mt--8 pb-5">
        <!-- Table -->
        <div class="row justify-content-center">
          <div class="col-lg-6 col-md-8">
            <div class="card bg-secondary shadow border-0">
              <div class="card-header bg-transparent pb-5">
                <div class="text-muted text-center mt-2 mb-4"><small>S'inscrire avec</small></div>
                <div class="text-center">
                  <a href="register.html#" class="btn btn-neutral btn-icon mr-4">
                    <span class="btn-inner--icon"><img src="\img/icons/common/github.svg"></span>
                    <span class="btn-inner--text">Github</span>
                  </a>
                  <a href="register.html#" class="btn btn-neutral btn-icon">
                    <span class="btn-inner--icon"><img src="\img/icons/common/google.svg"></span>
                    <span class="btn-inner--text">Google</span>
                  </a>
                </div>
              </div>
              <div class="card-body px-lg-5 py-lg-5">
                <div class="text-center text-muted mb-4">
                  <small>Ou à partir des identifiants</small>
                </div>
                <form method="POST" action="{{ route('registerAction') }}">
                  @csrf
                  <div class="form-group">
                    <div class="input-group input-group-alternative mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="ni ni-circle-08"></i></span>
                      </div>
                      <input class="form-control" name="first_name" placeholder="Nom(s)" type="text">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="input-group input-group-alternative mb-3">
                      <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-hat-3"></i></span>
                        </div>
                      <input class="form-control" name="last_name" placeholder="Prénom(s)" type="text">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="input-group input-group-alternative mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="ni ni-key-25"></i></span>
                      </div>
                      <input class="form-control" name="login" placeholder="Pseudo" type="text">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="input-group input-group-alternative mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                      </div>
                      <input class="form-control" placeholder="Email" name="email" type="email">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="input-group input-group-alternative">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                      </div>
                      <input class="form-control" id="password" placeholder="Mot de passe" name="password" type="password">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="input-group input-group-alternative">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                      </div>
                      <input class="form-control" id="c_password" placeholder="Confirmation de mot de passe" name="c_password" type="password">
                    </div>
                  </div>
                  <div class="row my-4">
                    <div class="col-12">
                      <div class="custom-control custom-control-alternative custom-checkbox">
                        <input class="custom-control-input" id="customCheckRegister" type="checkbox">
                        <label class="custom-control-label" for="customCheckRegister">
                          <span class="text-muted">J'accepte les <a href="register.html#!">conditions d'utilisation</a></span>
                        </label>
                      </div>
                    </div>
                  </div>
                  <div class="text-center">
                    <button type="submit" class="btn btn-primary mt-4">Créer son compte</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
@endsection
@section('script')
    <script>
        e.preventDefault();
        $('form').onsubmit.function(e){
            if($('#password').html  !== $('#c_password')){
                $.notify('success', 'success');
            } else {
                $.notify('error', 'error');
            }
        }
    </script>
@endsection