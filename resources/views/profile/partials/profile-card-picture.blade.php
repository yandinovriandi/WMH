<!-- Profile picture card-->
<div class="card mb-4 mb-xl-0">
    <div class="card-header">Profile Picture</div>
    <div class="card-body text-center">
        <img class="img-account-profile rounded-circle mb-2" src="{{ optional(auth()->user()->picture)->url ?? asset('assets/icon.png') }}" alt="">
        <div class="small font-italic text-muted mb-4">JPG or PNG no larger than 5 MB</div>
        <!-- <button class="btn btn-primary" type="button">Upload new image</button> -->
    </div>
</div>