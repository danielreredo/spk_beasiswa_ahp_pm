<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{ url('/') }}" class="nav-link">Home</a>
      </li>
    </ul>
    
    <ul class="navbar-nav ml-auto">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          {{auth()->user()->name}}
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        @if(auth()->user()->role == 'admin')
          <a class="dropdown-item" href="{{ url('/users') }}/{{auth()->user()->id}}/show">Lihat Profile</a>
        @endif
        @if(auth()->user()->role == 'operator')
          <a class="dropdown-item" href="{{ url('/users') }}/{{auth()->user()->id}}/show1">Lihat Profile</a>
        @endif
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="{{ url('/logout') }}">Logout</a>
        </div>
      </li>

    </ul>
  </nav>