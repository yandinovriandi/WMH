<x-app-layout>
    <x-slot name="header">
        <div class="col-auto mb-3">
            <h1 class="page-header-title">
                <div class="page-header-icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user">
                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                        <circle cx="12" cy="7" r="4"></circle>
                    </svg></div>
                Account Setting
            </h1>
        </div>
    </x-slot>

    <div class="container-xl px-4 mt-4">
        @include('profile.partials.navigation')
        <hr class="mt-0 mb-4">
        <div class="row">
            <div class="col-lg-12">
                <div class="card mb-4">
                    <div class="card-header">Change Password</div>
                    <div class="card-body">
                        <form method="post" action="{{ route('password.update') }}">
                            @csrf
                            @method('put')

                            @if (session('status') === 'password-updated')
                            <div class="alert alert-success alert-solid">Password has been updated</div>
                            @endif
                            <div class="mb-3">
                                <label class="small mb-1" for="currentPassword">{{ __('Current Password') }}</label>
                                <input class="form-control" id="currentPassword" name="current_password" type="password" placeholder="Enter current password">
                                <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
                            </div>
                            <div class="mb-3">
                                <label class="small mb-1" for="newPassword">{{ __('New Password') }}</label>
                                <input class="form-control" id="newPassword" name="password" type="password" placeholder="Enter new password">
                                <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
                            </div>
                            <div class="mb-3">
                                <label class="small mb-1" for="confirmPassword">{{ __('Confirm Password') }}</label>
                                <input class="form-control" id="confirmPassword" name="password_confirmation" type="password" placeholder="Confirm new password">
                                <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
                            </div>
                            <button class="btn btn-primary" type="submit">Save</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-xl-12">
                <div class="card mb-4 mb-xl-0">
                    <div class="card-header">Delete Account</div>
                    <div class="card-body">
                        <p>
                            Deleting your account is a permanent action and cannot be undone. If you are sure you want to delete your account, select the button below.
                        </p>
                        <x-danger-button data-bs-toggle="modal" data-bs-target="#confirmUser">{{ __('Delete Account') }}</x-danger-button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="confirmUser" tabindex="-1" role="dialog" aria-labelledby="confirmUserLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="confirmUserLabel">{{ __('Are you sure you want to delete your account?') }}</h5>
                        <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p class="mt-1 text-sm text-gray-600">
                            {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}
                        </p>

                        <form method="post" action="{{ route('profile.destroy') }}" id="confirmForm">
                            @csrf
                            @method('delete')

                            <div class="mb-3">
                                <label class="small mb-1" for="confirmPassword">{{ __('Confirm Password') }}</label>
                                <input class="form-control" id="confirmPassword" name="password" type="password" placeholder="Confirm new password">
                                <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Cancel</button>
                        <button class="btn btn-primary" type="submit" onclick="$('#confirmForm').submit()">Confirm</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>