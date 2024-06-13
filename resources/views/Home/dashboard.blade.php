@extends('Layouts.template')
@section('title', 'Tableau de bord')
@section('content')
<div class="row">
    <div class="col-xl-3 col-lg-6">
        <div class="card card-stats mb-4 mb-xl-0">
            <div class="card-body">
                <div class="row">
                    @if (auth()->user()->accountType->possible == 2 || auth()->user()->accountType->possible == 1)
                    <div class="col">
                        <h5 class="card-title text-uppercase text-muted mb-0">Nombres de colis</h5>
                        <span class="h2 font-weight-bold mb-0">{{ $colis->count() }}</span>
                    </div>
                    @endif
                    <div class="col-auto">
                        <div class="icon icon-shape bg-danger text-white rounded-circle shadow">
                            <i class="fas fa-chart-bar"></i>
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
                    @if (auth()->user()->accountType->possible == 2 || auth()->user()->accountType->possible == 1)
                    <div class="col">
                        <h5 class="card-title text-uppercase text-muted mb-0">Nombre d'utilisateur</h5>
                        <span class="h2 font-weight-bold mb-0">{{ $users->count()}}</span>
                    </div>
                    @endif
                    <div class="col-auto">
                        <div class="icon icon-shape bg-warning text-white rounded-circle shadow">
                            <i class="fas fa-chart-pie"></i>
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
                    @if (auth()->user()->accountType->possible == 2 || auth()->user()->accountType->possible == 1)
                    <div class="col">
                        <h5 class="card-title text-uppercase text-muted mb-0">Incidents résolu</h5>
                        <span class="h2 font-weight-bold mb-0">{{ $conflits->count() }}</span>
                    </div>
                    @endif
                    <div class="col-auto">
                        <div class="icon icon-shape bg-yellow text-white rounded-circle shadow">
                            <i class="fas fa-users"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- <div class="col-xl-3 col-lg-6">
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
    </div> --}}
</div>


<div class="row mt-5">
    <div class="col-xl-8 mb-5 mb-xl-0">
        <div class="card shadow">
            <div class="card-header border-0">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="mb-0">Message des clients</h3>
                    </div>
                    <div class="col text-right">
                        <!--<a href="{{ route('login') }}" class="btn btn-sm btn-primary">voir tout</a>-->
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <!-- Projects table -->
                <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">Objet</th>
                            <th scope="col">Contenu</th>
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
                            <td>{{ $i->status->first_name }} {{ $i->status->last_name }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
