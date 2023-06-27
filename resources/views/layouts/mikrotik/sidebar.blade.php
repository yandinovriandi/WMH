<div id="layoutSidenav_nav">
    <nav class="sidenav shadow-right sidenav-light">
        <div class="sidenav-menu">
            <div class="nav accordion" id="accordionSidenav">
                <!-- Sidenav Menu Heading (Core)-->
                <div class="sidenav-menu-heading">Menu</div>
                <!-- Sidenav Accordion (Dashboard)-->
                <a class="nav-link {{ Request::is('mikrotiks*') ? 'active' : '' }}" href="">
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
                                <div class="sidenav-menu-heading">Manage</div>
                                <a class="nav-link {{ Request::is('tunnel*') ? 'active' : '' }} {{ Request::is('tunnel*') ? '' : 'collapsed' }}"
                                   href="javascript:void(0);" data-bs-toggle="collapse" data-bs-target="#collapTunnel"
                                   aria-expanded="false" aria-controls="collapTunnel">
                                    <div class="nav-link-icon"><i data-feather="repeat"></i></div><i class="fa-light fa-router"></i>
                                    Hotspot
                                    <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                </a>
                                <div class="collapse {{ Request::is('tunnels*') ? 'show' : '' }}" id="collapTunnel"
                                     data-bs-parent="#accordionSidenav">
                                    <nav class="sidenav-menu-nested nav">
                                        <a class="nav-link {{ Request::is('tunnels/create') ? 'active' : '' }}"
                                           href={{ url('tunnels.create') }}>Buat
                                            Tunnel</a>
                                        <a class="nav-link {{ Request::is('tunnels') ? 'active' : '' }}"
                                           href={{ url('tunnels.index') }}>List
                                            Tunnel</a>
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
