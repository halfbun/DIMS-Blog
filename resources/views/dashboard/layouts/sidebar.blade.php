<nav id="sidebarMenu" class=" col-md-3 col-lg-2 d-md-block m-color sidebar">
    <div class="position-sticky pt-3">
      <ul class="nav flex-column">
        <li class="nav-item text-center"><h1 class="fw-bold text-white">DIMS.</h1></li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}" aria-current="page" href="/dashboard">
            <span data-feather="home"></span>
            Dashboard
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/posts*') ? 'active' : '' }}" href="/dashboard/posts">
            <span data-feather="file-text"></span>
            Blog post
          </a>
        </li>
      </ul>

    @can('admin')  
    <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-white">
      <span>Administrator</span>
    </h6>
    <ul class="nav flex-column">
      <li class="nav-item">
        <a class="nav-link {{ Request::is('dashboard/categories*') ? 'active' : '' }}" href="/dashboard/categories">
          <span data-feather="grid"></span>
          Categories
        </a>
      </li>
    </ul>
    @endcan

    </div>
</nav>