<header class="oleez-header">
    <nav class="navbar navbar-expand-lg navbar-light">
        <a class="navbar-brand" href="{{ url('/') }}"><img src="{{ asset('assets/FE/assets/images/Logo_2.svg') }}"
                alt="Oleez"></a>
        <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#oleezMainNav"
            aria-controls="oleezMainNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="oleezMainNav">
            <ul class="navbar-nav mx-auto mt-2 mt-lg-0">
                <li class="nav-item {{ Request::is('/') ? 'active' : '' }}">
                    <a class="mt-3 nav-link" href="{{ url('/') }}">Home <span class="sr-only">(current)</span></a>
                </li>
                <li
                    class="nav-item {{ Request::is('blogs/*') || Request::is('blogs') || Request::is('blog/*') ? 'active' : '' }}">
                    <a class="mt-3  nav-link" href="{{ url('blogs') }}">Blogs <span
                            class="sr-only">(current)</span></a>
                </li>
                @auth
                    <li class="d-flex nav-item dropdown {{ Request::is('profile') ? 'active' : '' }}">
                        <a class="mt-3 nav-link dropdown-toggle" href="#!" id="blogDropdown" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">{{ auth()->user()->name }}</a>
                        <img class="rounded-circle" width="50px" height="50px" src="{{ auth()->user()->image_url }}"
                            alt="profile" />
                        <div class="dropdown-menu" aria-labelledby="blogDropdown">
                            <a class="dropdown-item" href="{{ url('profile') }}">My Profile</a>
                            <a class="dropdown-item" href="{{ url('logout') }}">Logout</a>
                        </div>
                    </li>
                @endauth
                @guest
                    <li class="nav-item">
                        <a class="mt-3 nav-link" href="{{ url('login') }}">Login <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="mt-3 nav-link" href="{{ url('register') }}">Register <span
                                class="sr-only">(current)</span></a>
                    </li>
                @endguest
            </ul>
        </div>
    </nav>
</header>
