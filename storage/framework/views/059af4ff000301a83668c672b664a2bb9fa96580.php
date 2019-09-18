<nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
    <div class="container-fluid">
      <!-- Brand -->
      <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="<?php echo e(route('dashboard')); ?>">Dashboard</a>
      <!-- Form -->
      <form class="navbar-search navbar-search-dark form-inline mr-3 d-none d-md-flex ml-lg-auto">
        <div class="form-group mb-0">
          <div class="input-group input-group-alternative">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-search"></i></span>
            </div>
            <input class="form-control" placeholder="Search" type="text">
          </div>
        </div>
      </form>
      <!-- User -->
      <ul class="navbar-nav align-items-center d-none d-md-flex">
        <li class="nav-item dropdown">
          <a class="nav-link pr-0" href="index.html#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <div class="media align-items-center">
              <span class="avatar avatar-sm rounded-circle">
                <img alt="Image placeholder" src="\img/theme/team-1-800x800.jpg">
              </span>
              <div class="media-body ml-2 d-none d-lg-block">
                <span class="mb-0 text-sm  font-weight-bold"><?php echo e(auth()->user()->first_name); ?> <?php echo e(auth()->user()->last_name); ?></span>
              </div>
            </div>
          </a>
          <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
            <div class=" dropdown-header noti-title">
              <h6 class="text-overflow m-0">Bienvenue!</h6>
            </div>
            <a href="examples/profile.html" class="dropdown-item">
              <i class="ni ni-single-02"></i>
              <span>Mon profil</span>
            </a>
            <a href="examples/profile.html" class="dropdown-item">
              <i class="ni ni-settings-gear-65"></i>
              <span>Paramètres</span>
            </a>
            <a href="examples/profile.html" class="dropdown-item">
              <i class="ni ni-calendar-grid-58"></i>
              <span>Activités</span>
            </a>
            <a href="examples/profile.html" class="dropdown-item">
              <i class="ni ni-support-16"></i>
              <span>Aide</span>
            </a>
            <div class="dropdown-divider"></div>
            <form method="POST" action="<?php echo e(route('logout')); ?>" class="dropdown-item">
              <?php echo csrf_field(); ?>
              <i class="ni ni-user-run"></i>
              <input type="submit" value="Déconnexion">
            </form>
          </div>
        </li>
      </ul>
    </div>
  </nav><?php /**PATH /Users/osx/Desktop/taf-bikoe/resources/views/partials/navbar.blade.php ENDPATH**/ ?>