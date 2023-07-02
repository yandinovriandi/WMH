<x-app-layout>
    <x-slot name="header">
        <div class="col-auto mb-3">
            <h1 class="page-header-title">
                <div class="page-header-icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user">
                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                        <circle cx="12" cy="7" r="4"></circle>
                    </svg></div>
                Account - Profile & Password
            </h1>
        </div>
    </x-slot>

    <div class="container-xl px-4 mt-4">
        <!-- Account page navigation-->
        <nav class="nav nav-borders">
            <a class="nav-link active ms-0" href="account-profile.html">Profile</a>
        </nav>
        <hr class="mt-0 mb-4">
        <div class="row">
            <div class="col-xl-4">
                @include('profile.partials.profile-card-picture')
                <div class="card mb-4 mb-xl-0 mt-4">
                    <div class="card-header">Other</div>
                    <div class="card-body text-center">
                        <form action="{{ '' }}" method="post">
                            @csrf
                            <button type="submit" class="btn btn-danger w-100" disabled>DELETE MY ACCOUNT</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-xl-8">
                <!-- Account details card-->
                <div class="card mb-4">
                    <div class="card-header">Account Details</div>
                    <div class="card-body">
                        @include('profile.partials.update-profile-information')
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>