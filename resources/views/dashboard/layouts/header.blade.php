  <header class="offset-lg-2 offset-md-3 navbar bg-white col-md-9 col-lg-10 nav-user">
    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="container-fluid">
      <form action="#" class="d-flex">
        <div class="form-group has-search">
          <span class="form-control-feedback"><i class="bi bi-search"></i></span>
          <input type="text" class="form-control" placeholder="Search">
        </div>      
      </form>
      <div>
        <div class="dropdown">
          <a id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
            <img  class="user-img" src="img/real.jpg" alt="">
          </a>
          <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
            @can('admin')
            <li class="dropdown-item">ADMINISTRATOR</li>
            @endcan
            <li class="dropdown-item">{{ auth()->user()->name }}</li>
            <li><a class="dropdown-item" href="#">My Profile</a></li>
            <li><a class="dropdown-item" href="#">Setting</a></li>
            <form action="/logout" method="POST">
              @csrf
              <li><a class="dropdown-item"><button type="submit" style="border: none; background: transparent">Logout</button></a></li>
          </form>
          </ul>
        </div>
      </div>
    </div>
  </header>