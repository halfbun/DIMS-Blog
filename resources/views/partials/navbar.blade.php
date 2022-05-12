    
<nav class="navbar navbar-expand-lg navbar-dark fixed-top m-color">
    <div class="container justify-content-center">
      <a class="navbar-brand fw-bold" href="/" style="margin-left:10vw">DIMS. </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0 " style="margin-right:10vw">

          {{-- <li class="nav-item">
            <a class="nav-link {{ ($active === "home") ? 'active' : ''}}"href="/">Home</a>
          </li> --}}
          {{-- <li class="nav-item">
            <a class="nav-link {{ ($active === "about") ? 'active' : '' }}"href="/about">About</a>
          </li> --}}
          <li class="nav-item me-4 fw-bold">
            <a class="nav-link {{ ($active === "about") ? 'active' : '' }}"href="/about">About</a>
          </li>
          <li class="nav-item me-4 fw-bold">
            <a class="nav-link {{ ($active === "blog") ? 'active' : '' }}"href="/blog">Blog</a>
          </li>
          <li class="nav-item me-4 fw-bold">
            <a class="nav-link {{ ($active === "contact") ? 'active' : '' }}"href="/contact">Contact</a>
          </li>
          @auth
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Welcome Back, {{ auth()->user()->name }}
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="/dashboard"><i class="bi bi-layout-text-sidebar-reverse"></i> My Dashboard</a></li>
              <li><a class="dropdown-item" href="#">Another action</a></li>
              <li><hr class="dropdown-divider"></li>
              <li>
                <form action="/logout" method="POST">
                  @csrf
                  <button type="submit" class="dropdown-item"> <i class="bi bi-box-arrow-right"></i> Logout</button>
                </form>
            </ul>
          </li>  
          @else
          <li nav-item>
            <a href="/login" class="nav-link {{ ($active === "login") ? 'active' : '' }}"><i class="bi bi-box-arrow-in-right"></i> Login</a>
          </li>
          @endauth
        </ul>
      </div>
    </div>
  </nav>