<!-- Account page navigation-->
<nav class="nav nav-borders">
    <a class="nav-link {{ Request::is('profile') ? 'active' : '' }} ms-0" href="{{ route('profile.edit') }}">Profile</a>
    <a class="nav-link {{ Request::is('profile/security') ? 'active' : '' }} ms-0" href="{{ route('profile.security') }}">Security</a>
</nav>