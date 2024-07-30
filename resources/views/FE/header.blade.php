<header class="oleez-header">
    <nav class="navbar navbar-expand-lg navbar-light">
        <a class="navbar-brand" href="index.html"><img src="{{ asset('assets/FE/assets/images/Logo_2.svg') }}"
                alt="Oleez"></a>
        <ul class="nav nav-actions d-lg-none ml-auto">
            <li class="nav-item active">
                <a class="nav-link" href="#!" data-toggle="searchModal">
                    <img src="{{ asset('assets/FE/assets/images/search.svg') }}" alt="search">
                </a>
            </li>
            <li class="nav-item nav-item-cart">
                <a class="nav-link" href="#!">
                    <span class="cart-item-count">0</span>
                    <img src="{{ asset('assets/FE/assets/images/shopping-cart.svg') }}" alt="cart">
                </a>
            </li>
            <li class="nav-item dropdown d-none d-sm-block">
                <a class="nav-link dropdown-toggle" href="#!" id="languageDropdown" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">ENG</a>
                <div class="dropdown-menu" aria-labelledby="languageDropdown">
                    <a class="dropdown-item" href="#!">ARB</a>
                    <a class="dropdown-item" href="#!">FRE</a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#!" data-toggle="offCanvasMenu">
                    <img src="{{ asset('assets/FE/assets/images/social icon@2x.svg') }}" alt="social-nav-toggle">
                </a>
            </li>
        </ul>
        <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#oleezMainNav"
            aria-controls="oleezMainNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="oleezMainNav">
            <ul class="navbar-nav mx-auto mt-2 mt-lg-0">
                <li class="nav-item {{ Request::is('/') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ url('/') }}">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item {{ Request::is('blogs') ? 'active' : '' }}">
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
