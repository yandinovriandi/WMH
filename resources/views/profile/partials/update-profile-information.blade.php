<form method="post" action="{{ route('profile.update') }}">
    @csrf
    @method('patch')

    @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail())
    <div class="alert alert-warning alert-solid" role="alert">
        {{ __('Your email address is unverified') }}
        <button form="send-verification" class="underline text-sm">
            {{ __('Click here to re-send the verification email') }}
        </button>
    </div>
    @endif
    
    <div class="mb-3">
        <label class="small mb-1" for="name">{{ __('Name') }}</label>
        <input class="form-control" id="name" name="name" type="text" placeholder="Enter your name" value="{{ old('name', $user->name) }}">
    </div>

    <div class="mb-3">
        <label class="small mb-1" for="email">{{ __('Email') }}</label>
        <input class="form-control" id="email" type="email" name="email" placeholder="Enter your email" value="{{ old('email', $user->email) }}">

    </div>

    <button class="btn btn-primary" type="submit">Save changes</button>
</form>