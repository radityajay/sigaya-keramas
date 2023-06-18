<header id="page-topbar">
  <div class="navbar-header">
    <div class="d-flex">
      <!-- LOGO -->
      <div class="navbar-brand-box py-3">
        <a href="index.html" class="logo logo-dark">
          <span class="logo-sm">
            {{-- <img src="assets/images/logo-sm-dark.png" alt="logo-sm-dark" height="22"> --}}
          </span>
          <span class="logo-lg">
            {{-- <img src="assets/images/logo-dark.png" alt="logo-dark" height="20"> --}}
          </span>
        </a>

        <a href="index.html" class="logo logo-light text-center">
          <span class="logo-sm">
            <img src="{{ asset('assets/images/logoo.png') }}" alt="logo-sm-light" height="22">
          </span>
          <span class="logo-lg">
            {{-- <h1 style="color: white !important">SIGAYA</h1> --}}

            <img src="{{ asset('assets/images/logoo.png') }}" alt="logo-light" width="50">
          </span>
        </a>
      </div>

      <button type="button" class="btn btn-sm px-3 font-size-24 header-item waves-effect" id="vertical-menu-btn">
        <i class="ri-menu-2-line align-middle"></i>
      </button>
    </div>

    <div class="d-flex">

      <div class="dropdown d-inline-block d-lg-none ms-2">
        <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-search-dropdown"
          data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="ri-search-line"></i>
        </button>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0" aria-labelledby="page-header-search-dropdown">

          <form class="p-3">
            <div class="mb-3 m-0">
              <div class="input-group">
                <input type="text" class="form-control" placeholder="Search ...">
                <div class="input-group-append">
                  <button class="btn btn-primary" type="submit"><i class="ri-search-line"></i></button>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>

      <div class="dropdown d-none d-lg-inline-block ms-1">
        <button type="button" class="btn header-item noti-icon waves-effect" data-toggle="fullscreen">
          <i class="ri-fullscreen-line"></i>
        </button>
      </div>

      <!-- dropdown profil -->
      <div class="dropdown d-inline-block user-dropdown">
        <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
          data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <span class="d-none d-xl-inline-block ms-1">{{ auth()->user()->name }}</span>
          <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
        </button>
        <div class="dropdown-menu dropdown-menu-end">
          <!-- item-->
          <a class="dropdown-item" href="{{ route('profile.edit', auth()->user()->id) }}"><i
              class="ri-user-line align-middle me-1"></i> Profile</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item text-danger" href="#"
            onclick="event.preventDefault(); document.getElementById('frm-logout').submit();">
            <i class="ri-shut-down-line align-middle me-1 text-danger"></i> Logout</a>

          <form id="frm-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
          </form>
        </div>
      </div>
      <!-- end dropdown profil -->

    </div>
  </div>
</header>

@push('style')
<style>

</style>
@endpush