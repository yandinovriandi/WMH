<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="logoutModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="logoutModalLabel">Konfirmasi Logout!</h5>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Anda yakin ingin menghapus session dan keluar dari web ? jika yakin silahkan klik logout.
            </div>
            <form action={{ route('logout') }} method="post">
                <div class="modal-footer">
                    @csrf
                    <button class="btn btn-sm btn-secondary" type="button" data-bs-dismiss="modal">Batal</button>
                    <button class="btn btn-sm btn-primary" type="submit">Logout</button>
                </div>
            </form>
        </div>
    </div>
</div>
<footer class="footer-admin mt-auto footer-light">
    <div class="container-xl px-4">
        <div class="row">
            <div class="col-md-6 small">Copyright © {{config('app.name')}}</div>
            <div class="col-md-6 text-md-end small">
                <a href="#!">Privacy Policy</a>
                ·
                <a href="#!">Terms &amp; Conditions</a>
            </div>
        </div>
    </div>
</footer>
