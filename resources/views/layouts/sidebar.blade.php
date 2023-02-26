<div class="vertical-menu">

  <div data-simplebar class="h-100">

    <!--- Sidemenu -->
    <div id="sidebar-menu">
      <!-- Left Menu Start -->
      <ul class="metismenu list-unstyled" id="side-menu">
        <li class="menu-title">Menu</li>

        <li>
          <a href="{{ route('dashboard') }}" class="waves-effect">
            <i class="ri-dashboard-line"></i>
            <span>Dashboard</span>
          </a>
        </li>

        <li class="menu-title">Master Data</li>

        <li>
          <a href="{{ route('position.index') }}" class="waves-effect">
            <i class="ri-contacts-book-line"></i>
            <span>Position</span>
          </a>
        </li>

        <li>
          <a href="{{ route('users.index') }}" class="waves-effect">
            <i class="ri-account-circle-line"></i>
            <span>User</span>
          </a>
        </li>


      </ul>
    </div>
    <!-- Sidebar -->
  </div>
</div>