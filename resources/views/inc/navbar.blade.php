<nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/cows') }}">
            {{config('app.name','Dairy Farm')}}
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                  <a class="nav-link" href="/cows">Home</a>
                </li>
                    <li class="nav-item active">
                  <a class="nav-link" href="/health">Health Record</a>
                </li>
                <li class="nav-item active">
                  <a class="nav-link" href="/milk">Milk Record</a>
                </li>
                <li class="nav-item active">
                  <a class="nav-link" href="/inventory">Inventory</a>
                </li>
                <li class="nav-item active">
                  <a class="nav-link" href="/dairy">Dairy records</a>
                </li>
                <li class="nav-item active">
                  <a class="nav-link" href="/pregnancy">Pregnancy records</a>
                </li>
                <li class="nav-item active">
                  <a class="nav-link" href="/staff">Staff</a>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle active" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >More</a>
                  <div class="dropdown-menu" aria-labelledby="dropdown01">
                  <a class='dropdown-item' href="/cows/create">Add Cow</a>
                  <a class='dropdown-item' href="/milk/create">Add milk record</a>
                  <a class='dropdown-item' href="/health/create">Add health record</a>
                  <a class='dropdown-item' href="/inventory/create">Add inventory</a>
                  <a class='dropdown-item' href="/dairy/create">Add dairy record</a>
                  <a class='dropdown-item' href="/pregnancy/create">Add pregnancy record</a>
                  <a class='dropdown-item' href="/staff/create">Add staff</a>
                  </div>
                </li>
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                {{-- <li><a class='nav-link' href="/cows/create">Add Cow</a></li> --}}
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle active" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                              document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>