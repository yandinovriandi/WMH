<div id="layoutSidenav_nav">
    <nav class="sidenav shadow-right sidenav-light">
        <div class="sidenav-menu">
            <div class="nav accordion" id="accordionSidenav">
                <!-- Sidenav Menu Heading (Core)-->
                <div class="sidenav-menu-heading">Menu</div>
                <!-- Sidenav Accordion (Dashboard)-->
                <a class="nav-link {{ Request::is('mikrotiks*') ? 'active' : '' }}" href="{{route('mikrotiks.show',['mikrotik' => request()->mikrotik])}}">
                    <div class="nav-link-icon"><i data-feather="activity"></i></div>
                    Dashboard
                </a>
                <!-- Sidenav Heading (Custom)-->
                                <div class="sidenav-menu-heading">Manage</div>
                                <a class="nav-link {{ Request::is('vouchers*') ? 'active' : '' }} {{ Request::is('vouchers*') ? '' : 'collapsed' }}"
                                   href="javascript:void(0);" data-bs-toggle="collapse" data-bs-target="#collapHotspot"
                                   aria-expanded="false" aria-controls="collapHotspot">
                                    <div class="nav-link-icon"><i class="far fa-copy"></i></div><i class="fa-light fa-router"></i>
                                    Hotspot
                                    <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                </a>
                                <div class="collapse {{ Request::is('vouchers*') ? 'show' : '' }}" id="collapHotspot"
                                     data-bs-parent="#accordionSidenav">
                                    <nav class="sidenav-menu-nested nav">
                                        <a class="nav-link {{ Request::is('vouchers*') ? 'active' : '' }}"
                                           href="{{ route('voucher.list', ['mikrotik' => request()->mikrotik]) }}">
                                            Lists Voucher
                                        </a>
                                        <a class="nav-link {{ Request::is('tunnels/create') ? 'active' : '' }}"
                                           href={{ url('tunnels.create') }}>
                                            User Profiles
                                        </a>
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
