<div class="collapse navbar-collapse" id="sidenav-collapse-main">
    <!-- Collapse header -->
    <div class="navbar-collapse-header d-md-none">
        <div class="row">
            <div class="col-6 collapse-brand">
                <a href="index.html">
                    <img src="\img/brand/blue.png">
                </a>
            </div>
            <div class="col-6 collapse-close">
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#sidenav-collapse-main"
                    aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
                    <span></span>
                    <span></span>
                </button>
            </div>
        </div>
    </div>

    <!-- Form -->
    <form class="mt-4 mb-3 d-md-none">
        <div class="input-group input-group-rounded input-group-merge">
            <input type="search" class="form-control form-control-rounded form-control-prepended" placeholder="Search"
                aria-label="Search">
            <div class="input-group-prepend">
                <div class="input-group-text">
                    <span class="fa fa-search"></span>
                </div>
            </div>
        </div>
    </form>
    <!-- Navigation -->
    <ul class="navbar-nav">
        <li class="nav-item  class=">
            <a class="nav-link active" href="{{ route('dashboard') }}"> <i class="fa fa-home text-primary"></i> Tableau de bord </a>
        </li>

        @if (auth()->user()->accountType->code == "ADM")
            <li class="nav-item">
                <a class="nav-link " href="{{ route('agents') }}">
                    <i class="fa fa-user-secret text-blue"></i> Gestion des agents
                </a>
            </li>


            <li class="nav-item">
                <a class="nav-link " href="{{ route('suggestions') }}">
                    <i class="fa fa-comment text-blue"></i> Suggestions des utilisateurs
                </a>
            </li>
        @endif

        <li class="nav-item">
            <a class="nav-link " href="{{ route('clients.index') }}">
                <i class="fa fa-users text-primary" aria-hidden="true"></i> Gérer les clients
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link " href="{{ route('colis.index') }}">
                <i class="fas fa-box text-blue"></i> Gérer les colis
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link " href="{{ route('tarifs.index') }}">
                <i class="fas fa-dollar-sign text-blue"></i> Gérer les tarifs
            </a>
        </li>

        @if (auth()->user()->accountType->code == "ADM")
            <li class="nav-item">
                <a class="nav-link " href="{{ route('conflits.index') }}">
                    <i class="fa fa-fire text-blue" aria-hidden="true"></i> Gérer les conflits
                </a>
            </li>
        @endif
    </ul>
</div>
