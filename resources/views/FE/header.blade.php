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
                    <a class="nav-link" href="{{ url('/') }}">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item {{ Request::is('blogs/*') || Request::is('blog/*') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ url('blogs') }}">Blogs <span class="sr-only">(current)</span></a>
                </li>
                @auth
                    <li class="nav-item dropdown {{ Request::is('userProfile') ? 'active' : '' }}">
                        <a class="nav-link dropdown-toggle" href="#!" id="blogDropdown" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">{{ auth()->user()->name }}</a>
                        <div class="dropdown-menu" aria-labelledby="blogDropdown">
                            <a class="dropdown-item" href="blog-standard.html">My Profile</a>
                            <a class="dropdown-item" href="{{ url('logout') }}">Logout</a>
                        </div>
                    </li>
                @endauth
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('login') }}">Login <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('register') }}">Register <span
                                class="sr-only">(current)</span></a>
                    </li>
                @endguest
            </ul>
        </div>
    </nav>
</header>
