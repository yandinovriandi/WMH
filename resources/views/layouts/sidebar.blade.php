<div id="layoutSidenav_nav">
    <nav class="sidenav shadow-right sidenav-light">
        <div class="sidenav-menu">
            <div class="nav accordion" id="accordionSidenav">
                <!-- Sidenav Menu Heading (Account)-->
                <!-- * * Note: * * Visible only on and above the sm breakpoint-->
                <div class="sidenav-menu-heading d-sm-none">Account</div>
                <!-- Sidenav Link (Alerts)-->
                <!-- * * Note: * * Visible only on and above the sm breakpoint-->
                <a class="nav-link d-sm-none" href="#!">
                    <div class="nav-link-icon"><i data-feather="bell"></i></div>
                    Alerts
                    <span class="badge bg-warning-soft text-warning ms-auto">4 New!</span>
                </a>
                <!-- Sidenav Link (Messages)-->
                <!-- * * Note: * * Visible only on and above the sm breakpoint-->
                <a class="nav-link d-sm-none" href="#!">
                    <div class="nav-link-icon"><i data-feather="mail"></i></div>
                    Messages
                    <span class="badge bg-success-soft text-success ms-auto">2 New!</span>
                </a>
                <!-- Sidenav Menu Heading (Core)-->
                <div class="sidenav-menu-heading">Menu</div>
                <!-- Sidenav Accordion (Dashboard)-->
                <a class="nav-link {{ Request::is('dashboard*') ? 'active' : '' }}" href={{ route('dashboard') }}>
                    <div class="nav-link-icon"><i data-feather="activity"></i></div>
                    Dashboard
                </a>
{{--                @can('is_admin')--}}
{{--                    <a class="nav-link {{ Request::is('server*') ? 'active' : '' }}" href={{ route('server.index') }}>--}}
{{--                        <div class="nav-link-icon">--}}
{{--                            <i data-feather="hard-drive"></i>--}}
{{--                        </div>--}}
{{--                        Server--}}
{{--                    </a>--}}
{{--                    @php--}}
{{--                        $payment = \App\Models\Payment::first();--}}
{{--                    @endphp--}}
{{--                    <a class="nav-link {{ Request::is('payment*') ? 'active' : '' }}" href="{{route($payment ? 'payment.edit' : 'payment.create', $payment ?? '')}}" }}>--}}
{{--                        <div class="nav-link-icon">--}}
{{--                            <i data-feather="tool"></i>--}}
{{--                        </div>--}}
{{--                        Payment Getway--}}
{{--                    </a>--}}
{{--                    <a class="nav-link {{ Request::is('users*') ? 'active' : '' }}" href={{ route('users.index') }}>--}}
{{--                        <div class="nav-link-icon">--}}
{{--                            <i class="fa-solid fa-users-line"></i></div>--}}
{{--                        Users--}}
{{--                    </a>--}}
{{--                    <a class="nav-link {{ Request::is('balance*') ? 'active' : '' }}" href={{ route('balance.index') }}>--}}
{{--                        <div class="nav-link-icon">--}}
{{--                            <i class="fa-solid fa-wallet"></i></div>--}}
{{--                        Balances--}}
{{--                    </a> --}}
{{--                    <a class="nav-link {{ Request::is('permission/role') ? 'active' : '' }}" href={{ route('role.index') }}>--}}
{{--                        <div class="nav-link-icon">--}}
{{--                            <i class="fas fa-shield-alt"></i>--}}
{{--                        </div>--}}
{{--                        Role--}}
{{--                    </a>--}}
{{--                    <a class="nav-link {{ Request::is('permission/access*') ? 'active' : '' }}" href={{ route('permission.index') }}>--}}
{{--                        <div class="nav-link-icon">--}}
{{--                            <i class="fas fa-user-lock"></i>--}}
{{--                        </div>--}}
{{--                        Permission--}}
{{--                    </a>--}}
{{--                    <a class="nav-link {{ Request::is('permission/assign') ? 'active' : '' }}" href={{ route('assign.index') }}>--}}
{{--                        <div class="nav-link-icon">--}}
{{--                            <i class="fas fa-user-shield"></i>--}}
{{--                        </div>--}}
{{--                        Assign Permission--}}
{{--                    </a>--}}
{{--                    <a class="nav-link {{ Request::is('permission/user') ? 'active' : '' }}" href={{ route('roleToUser.index') }}>--}}
{{--                        <div class="nav-link-icon">--}}
{{--                            <i class="fa-solid fa-person-circle-check"></i>--}}
{{--                        </div>--}}
{{--                        Assign Role--}}
{{--                    </a>--}}
{{--                    <a class="nav-link {{ Request::is('log-viewer*') ? 'active' : '' }}" href={{ url('log-viewer') }}>--}}
{{--                        <div class="nav-link-icon">--}}
{{--                            <i class="fas fa-file-medical-alt"></i>--}}
{{--                        </div>--}}
{{--                        Logs--}}
{{--                    </a>--}}
{{--                @endcan--}}
                @can('create routers')
                    <a class="nav-link {{ Request::is('routers*') ? 'active' : '' }}" href="{{ url('routers.index') }}">
                        <div class="nav-link-icon">
                            <i class="fas fa-server"></i>
                        </div>
                        Router
                    </a>
                @endcan
                <!-- Sidenav Heading (Custom)-->
{{--                <div class="sidenav-menu-heading">Layanan</div>--}}
{{--                <a class="nav-link {{ Request::is('tunnel*') ? 'active' : '' }} {{ Request::is('tunnel*') ? '' : 'collapsed' }}"--}}
{{--                   href="javascript:void(0);" data-bs-toggle="collapse" data-bs-target="#collapTunnel"--}}
{{--                   aria-expanded="false" aria-controls="collapTunnel">--}}
{{--                    <div class="nav-link-icon"><i data-feather="repeat"></i></div><i class="fa-light fa-router"></i>--}}
{{--                    Layanan Tunnel VPN--}}
{{--                    <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>--}}
{{--                </a>--}}
{{--                <div class="collapse {{ Request::is('tunnels*') ? 'show' : '' }}" id="collapTunnel"--}}
{{--                     data-bs-parent="#accordionSidenav">--}}
{{--                    <nav class="sidenav-menu-nested nav">--}}
{{--                        <a class="nav-link {{ Request::is('tunnels/create') ? 'active' : '' }}"--}}
{{--                           href={{ route('tunnels.create') }}>Buat--}}
{{--                            Tunnel</a>--}}
{{--                        <a class="nav-link {{ Request::is('tunnels') ? 'active' : '' }}"--}}
{{--                           href={{ route('tunnels.index') }}>List--}}
{{--                            Tunnel</a>--}}
{{--                    </nav>--}}
{{--                </div>--}}
                <div class="sidenav-menu-heading">Setting</div>
                <a class="nav-link {{ Request::is('profile*') ? 'active' : '' }} {{ Request::is('profile*') ? '' : 'collapsed' }}"
                   href="javascript:void(0);" data-bs-toggle="collapse" data-bs-target="#collapseProfile"
                   aria-expanded="false" aria-controls="collapseProfile">
                    <div class="nav-link-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24"
                             fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                             stroke-linejoin="round" class="feather feather-sliders">
                            <line x1="4" y1="21" x2="4" y2="14"></line>
                            <line x1="4" y1="10" x2="4" y2="3"></line>
                            <line x1="12" y1="21" x2="12" y2="12"></line>
                            <line x1="12" y1="8" x2="12" y2="3"></line>
                            <line x1="20" y1="21" x2="20" y2="16"></line>
                            <line x1="20" y1="12" x2="20" y2="3"></line>
                            <line x1="1" y1="14" x2="7" y2="14"></line>
                            <line x1="9" y1="8" x2="15" y2="8"></line>
                            <line x1="17" y1="16" x2="23" y2="16"></line>
                        </svg>
                    </div>
                    Account
                    <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse {{ Request::is('profile*') ? 'show' : '' }}" id="collapseProfile"
                     data-bs-parent="#accordionSidenav">
                    <nav class="sidenav-menu-nested nav">
                        <a class="nav-link {{ Request::is('profile*') ? 'active' : '' }}"
                           href={{ route('profile.edit', auth()->user()->slug) }}>Profile & Password</a>
                    </nav>
                </div>
            </div>
        </div>
        <!-- Sidenav Footer-->
        <div class="sidenav-footer">
            <div class="sidenav-footer-content">
                <div class="sidenav-footer-subtitle">Logged in as:</div>
                <div class="sidenav-footer-title">{{ auth()->user()->name }}</div>
{{--                @foreach (auth()->user()->getRoleNames() as $role)--}}
{{--                    <div class="sidenav-footer-title">{{ $role }}</div>--}}
{{--                @endforeach--}}
            </div>
        </div>
    </nav>
</div>
