<nav class="navbar navbar-expand-lg navbar-dark bg-dark d-flex justify-content-between">
    @auth
        <div>

            <h4 class="navbar-brand  my-1 mx-1 ">Welcome, {{ auth()->user()->name }} !</h4>
            <div class="d-flex">

                <h4 class="navbar-brand  my-1 mx-1 ">Total
                    :<span class="text-danger px-1">{{ number_format($total_amount) }}</span></h4>
                <div class="text-white" style="line-height: 35px">║</div>
                <h4 class="navbar-brand  my-1 mx-1 ">Total This month
                    :<span class="text-danger px-1">{{ number_format($total_amount_this_month) }} </span></h4>
            </div>

        </div>

        <ul class="navbar-nav">
            <li class="nav-item mx-lg-2">
                <a class="btn btn-primary" href="{{ route('records.index') }}">My Records</a>
            </li>

            <li class="nav-item mx-lg-2">
                <a class="btn btn-success" href="{{ route('records.statics') }}">Stats</a>
            </li>
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
