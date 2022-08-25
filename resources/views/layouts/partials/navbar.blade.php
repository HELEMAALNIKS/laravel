<header>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <a class="navbar-brand" href="#">Building Manager 2.0</a>
  <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
        @guest
          <li class="nav-item">
            <a class="nav-link disabled" href="#">Buildings</a>
          </li>
        @endguest
        @auth
          <li class="nav-item">
            <a class="nav-link" href="building">Buildings</a>
          </li>
        @if(auth()->user()->user_type === "Administrator")
          <li class="nav-item">
            <a class="nav-link" href="admin">Admin</a>
          </li>
        @endif
        @endauth
      {{-- <li class="nav-item">
        <a class="nav-link" href="#">Link</a>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="#">Disabled</a>
      </li> --}}
    </ul>
      <form action="{{ route('search') }}"  method="GET" class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" name="search" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
      @auth
         <a class=ml-2>Welkom {{auth()->user()->username}}<a>
        <div class="text-end">
          <a href="{{ route('logout') }}" class="btn btn-dark ml-2">Logout</a>
        </div>
      @endauth
      @guest
        <div class="text-end">
          <a href="{{ route('login') }}" class="btn btn-dark ml-2">Login</a>
          <a href="{{ route('register') }}" class="btn btn-warning">Sign-up</a>
        </div>
      @endguest
  </div>
</header>


