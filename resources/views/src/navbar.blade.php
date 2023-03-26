<nav class="navbar navbar-expand-lg navbar-light bg-light">

    <div class="container">
      @if (Auth::user())
      <a class="navbar-brand" href="{{url('/index')}}">Share Post</a>
          
      @else
      <a class="navbar-brand" href="{{url('/')}}">Share Post</a>
          
      @endif
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarScroll">
        <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
          <li class="nav-item">
            @if (Auth::user())
            <a class="nav-link active" aria-current="page" href="{{url('/index')}}">Home</a>
                
            @else
                
            <a class="nav-link active" aria-current="page" href="{{url('/')}}">Home</a>
            @endif
          </li>
        </ul>
        <!-- <form class="d-flex">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success" type="submit">Search</button>
        </form> -->
          <ul class="navbar-nav  me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              
              @if (Auth::user())
              <i class="fa-solid fa-user" style="color: #323e53;"></i>
              @else
                  login/register
              @endif
            </a>
            @if (Auth::user())
            <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
              <li>
                <form action="{{route('logout')}}" method="post">
                @csrf
                
                  <button class="dropdown-item" ><i class="fa-sharp fa-solid fa-arrow-right"></i>Logout</button>
                </form>
              </li>

            </ul>
            @else
            <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
              <li><a class="dropdown-item" href="{{route('login')}}">Login</a></li>
              <li><a class="dropdown-item" href="{{route('register')}}">Register</a></li>

            </ul>
            @endif
            
          </li>
          
        </ul>
  
      </div>
    </div>
  </nav>