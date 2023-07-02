<!-- Profile picture card-->
<div class="card mb-4 mb-xl-0">
    <div class="card-header">Profile Picture</div>
    <div class="card-body text-center">
        <form action="{{ route('profile.update-picture') }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('patch')

            <input type="file" name="image" id="profile-picture" class="d-none" accept="image/jpeg,image/jpg,image/png">

            <img class="img-account-profile rounded-circle mb-2" src="{{ auth()->user()->picture ? asset('storage/' . auth()->user()->picture) : asset('assets/icon.png') }}" alt="" onclick="$('#profile-picture').click()" role="button">
            <div class="small font-italic text-muted mb-4">JPG or PNG no larger than 5 MB</div>
            <button class="btn btn-primary" type="submit" id="btn" disabled>Upload new image</button>
        </form>
    </div>
</div>

@push('scripts')
<script>
    $('#profile-picture').on('change', function (e) {
        const [file] = e.target.files
        if (file) {
            const source = URL.createObjectURL(file)
            $('.img-account-profile').attr('src', source)
            $('#btn').removeAttr('disabled')
        }
    })
</script>
@endpush