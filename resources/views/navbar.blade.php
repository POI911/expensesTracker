<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    @auth
        <h4 class="navbar-brand  my-1 mx-1 ">Welcome, {{ auth()->user()->name }} !</h4>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mx-auto ">


            <li class="nav-item mx-lg-2">
                <a class="btn btn-primary" href="#">My Records</a>
            </li>

            <li class="nav-item mx-lg-2">
                <a class="btn btn-success" href="#">Stats</a>
            </li>
        </ul>
        </div>


        <ul class="navbar-nav">
            <li class="nav-item  mx-lg-2">
                <a class="btn btn-danger" href="{{ route('logout') }}">Log Out</a>
            </li>
        </ul>
    @else
        <ul class="navbar-nav mx-auto justify-content-center">
            <li class="nav-item my-2 mx-lg-2">
                <a class="btn btn-primary mx-1 px-5" href="{{ route('register') }}">Sign Up</a>
            </li>
            <li class="nav-item  my-2 mx-lg-2">
                <a class="btn btn-success mx-1 px-5" href="{{ route('login') }}">Log In</a>
            </li>
        </ul>
    @endauth

</nav>
