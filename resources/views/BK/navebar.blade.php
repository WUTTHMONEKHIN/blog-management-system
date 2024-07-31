<nav class="navbar top-navbar col-lg-12 col-12 p-0">
    <div class="container-fluid">
        <div class="navbar-menu-wrapper d-flex align-items-center justify-content-between">
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
                <a class="navbar-brand brand-logo" href="{{ url('/') }}"><img
                        src="{{ asset('assets/FE/assets/images/Logo_2.svg') }}" alt="logo" /></a>
                <a class="navbar-brand brand-logo-mini" href="{{ url('/') }}"><img
                        src="{{ asset('assets/FE/assets/images/Logo_2.svg') }}" alt="logo" /></a>
            </div>
            <ul class="navbar-nav navbar-nav-right">
                <li class="nav-item nav-profile dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" id="profileDropdown">
                        <span class="nav-profile-name">{{ auth()->guard('admin')->user()->name }}</span>
                        <img src="{{ auth()->guard('admin')->user()->image_url }}" alt="profile" />
                    </a>
                    <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
                        <a class="dropdown-item" href="{{ url('/admin/profile', auth()->guard('admin')->user()->id) }}">
                            <i class="mdi mdi-settings text-primary"></i>
                            My Profile ({{ auth()->guard('admin')->user()->name }})
                        </a>
                        <a href="{{ url('admin/logout') }}" class="dropdown-item">
                            <i class="mdi mdi-logout text-primary"></i>
                            Logout
                        </a>
                    </div>
                </li>
            </ul>
            <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
                data-toggle="horizontal-menu-toggle">
                <span class="mdi mdi-menu"></span>
            </button>
        </div>
    </div>
</nav>
