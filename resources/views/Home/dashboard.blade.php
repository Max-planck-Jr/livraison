@extends('Layouts.template')
@section('title', 'Tableau de bord')
@section('content')
<div class="row">
    <div class="col-xl-3 col-lg-6">
        <div class="card card-stats mb-4 mb-xl-0">
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <h5 class="card-title text-uppercase text-muted mb-0">Nombres de colis</h5>
                        <span class="h2 font-weight-bold mb-0">{{ $colis->count() }}</span>
                    </div>
                    <div class="col-auto">
                        <div class="icon icon-shape bg-danger text-white rounded-circle shadow">
                            <i class="fas fa-chart-bar"></i>
                        </div>
                    </div>
                </div>
                <p class="mt-3 mb-0 text-muted text-sm">
                    <span class="text-nowrap">Depuis le mois passé</span>
                </p>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-6">
        <div class="card card-stats mb-4 mb-xl-0">
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <h5 class="card-title text-uppercase text-muted mb-0">Nombre d'utilisateur</h5>
                        <span class="h2 font-weight-bold mb-0">{{ $users->count()}}</span>
                    </div>
                    <div class="col-auto">
                        <div class="icon icon-shape bg-warning text-white rounded-circle shadow">
                            <i class="fas fa-chart-pie"></i>
                        </div>
                    </div>
                </div>
                <p class="mt-3 mb-0 text-muted text-sm">
                    <span class="text-nowrap">Depuis le mois passé</span>
                </p>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-6">
        <div class="card card-stats mb-4 mb-xl-0">
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <h5 class="card-title text-uppercase text-muted mb-0">Conflits résolu</h5>
                        <span class="h2 font-weight-bold mb-0">{{ $conflits->count() }}</span>
                    </div>
                    <div class="col-auto">
                        <div class="icon icon-shape bg-yellow text-white rounded-circle shadow">
                            <i class="fas fa-users"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-6">
        <div class="card card-stats mb-4 mb-xl-0">
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <h5 class="card-title text-uppercase text-muted mb-0">Client ayant interagit</h5>
                        <span class="h2 font-weight-bold mb-0">{{ $feedbacks->count() }}</span>
                    </div>
                    <div class="col-auto">
                        <div class="icon icon-shape bg-info text-white rounded-circle shadow">
                            <i class="fas fa-percent"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="row mt-5">
    <div class="col-xl-8 mb-5 mb-xl-0">
        <div class="card shadow">
            <div class="card-header border-0">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="mb-0">Incident en cours d'instruction</h3>
                    </div>
                    <div class="col text-right">
                        <a href="{{ route('login') }}" class="btn btn-sm btn-primary">voir tout</a>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <!-- Projects table -->
                <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">Titre</th>
                            <th scope="col">Motif</th>
                            <th scope="col">Colis</th>
                            <th scope="col">Client</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($incidents as $i)
                        <tr>
                            <th scope="row">{{ $i->titre }}</th>
                            <td> {{ $i->motif }}</td>
                            <td> {{ $i->colis_id->nom }}</td>
                            <td>{{ $i->status->firstName }} {{ $i->status->lastName }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-xl-4">
        <div class="card shadow">
            <div class="card-header border-0">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="mb-0">Traffics Sociaux</h3>
                    </div>
                    <div class="col text-right">
                        <a href="index.html#!" class="btn btn-sm btn-primary">Voir tout</a>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <!-- Projects table -->
                <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">Referral</th>
                            <th scope="col">Visiteurs</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">
                                Facebook
                            </th>
                            <td>
                                30
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">
                                Google
                            </th>
                            <td>
                                50
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">
                                Site web
                            </th>
                            <td>
                                {{ $feedbacks->count() }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
