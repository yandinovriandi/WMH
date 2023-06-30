<nav class="topnav navbar navbar-expand shadow justify-content-between justify-content-sm-start navbar-light bg-white" id="sidenavAccordion">
    <!-- Sidenav Toggle Button-->
    <button class="btn btn-icon btn-transparent-dark order-1 order-lg-0 me-2 ms-lg-2 me-lg-0" id="sidebarToggle">
        <i data-feather="menu"></i>
    </button>
    <!-- Navbar Brand-->
    <a class="navbar-brand pe-3 ps-4 ps-lg-2" href={{ route('dashboard') }}>{{ config('app.name') }}</a>

    <ul class="navbar-nav align-items-center ms-auto">
        <!-- Language dropdown -->
        <li class="nav-item dropdown no-caret d-none d-md-block me-3">
            <a class="nav-link dropdown-toggle" id="navbarDropdownDocs" href="javascript:void(0);" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <div class="fw-500"><i class="fa fa-language"></i></div>
            </a>
            <div class="dropdown-menu dropdown-menu-end py-0 me-sm-n15 me-lg-0 o-hidden animated--fade-in-up" aria-labelledby="navbarDropdownDocs">
                <a class="dropdown-item py-3" href="{{ route('update-language', 'en') }}">
                    English
                </a>
                <a class="dropdown-item py-3" href="{{ route('update-language', 'id') }}">
                    Indonesian
                </a>
            </div>
        </li>
        <!-- User Dropdown-->
        <li class="nav-item dropdown no-caret dropdown-user me-3 me-lg-4">
            <a class="btn btn-icon btn-transparent-dark dropdown-toggle" id="navbarDropdownUserImage" href="javascript:void(0);" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <img class="img-fluid" src="{{ optional(auth()->user()->picture)->url ?? asset('assets/icon.png') }}" /></a>
            <div class="dropdown-menu dropdown-menu-end border-0 shadow animated--fade-in-up" aria-labelledby="navbarDropdownUserImage">
                <h6 class="dropdown-header d-flex align-items-center">
                    <img class="dropdown-user-img" src="{{ optional(auth()->user()->picture)->url ?? asset('assets/icon.png') }}" alt="{{auth()->user()->name}}" />
                    <div class="dropdown-user-details">
                        <div class="dropdown-user-details-name">{{ auth()->user()->name ?? 'User' }}</div>
                        <div class="dropdown-user-details-email">
                            {{ auth()->user()->email ?? 'member@mikrotikbot.com' }}
                        </div>
                    </div>
                </h6>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href={{ route('profile.edit', auth()->user()->slug) }}>
                    <div class="dropdown-item-icon"><i data-feather="settings"></i></div>
                    Account
                </a>

                <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#logoutModal" href="#!">
                    <div class="dropdown-item-icon"><i data-feather="log-out"></i></div>
                    Logout
                </a>
            </div>
            </div>
        </li>
    </ul>
</nav>