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
            <a class=" nav-link active " href="index.html"> <i class="ni ni-tv-2 text-primary"></i> Tableau de bord
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link " href="/users">
                <i class="ni ni-planet text-blue"></i> Comptes utilisateurs
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link " href="{{ route('clients.index') }}">
                <i class="fa fa-users" aria-hidden="true"></i> Gérer les clients
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link " href="{{ route('colis.index') }}">
                <i class="fas fa-box"></i> Gérer les colis
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link " href="{{ route('tarifs.index') }}">
                <i class="fas fa-dollar-sign"></i> Gérer les tarifs
            </a>
        </li>
    </ul>
</div>
