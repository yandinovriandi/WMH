<div class="modal fade" id="addRouterModal" data-target="addRouterModal" tabindex="-1" role="dialog" aria-labelledby="addRouterModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form id="addRouterForm" method="POST">
                <div class="modal-header">
                    <h5 class="modal-title" id="addRouterModalTitle">Edit Role</h5>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="nameRouter">Identitas Router</label>
                        <input
                            class="form-control"
                            id="nameRouter" name="name" type="text" placeholder="Identitas Router/Identity"
                            value="{{ old('name') }}"
                        >
                        <div id="error_nameRouter"></div>
                    </div>
                    <div class="mb-3">
                        <label for="add_host">Host/IP Router</label>
                        <input
                            class="form-control"
                            id="add_host" name="host" type="text" placeholder="192.168.88.1"
                            value="{{ old('host') }}"
                        >
                        <div id="error_add_host"></div>
                    </div>
                    <div class="mb-3">
                        <label for="usernameRouter">Username Router</label>
                        <input
                            class="form-control"
                            id="usernameRouter" name="username" type="text" placeholder="admin"
                            value="{{ old('username') }}"
                        >
                        <div id="error_usernameRouter"></div>
                    </div>
                    <div class="mb-3">
                        <label for="passwordRouter">Password Router</label>
                        <input
                            class="form-control"
                            id="passwordRouter" name="password" type="password" placeholder="******"
                            value="{{ old('password') }}"
                        >
                        <div id="error_passwordRouter"></div>
                    </div>
                    <div class="mb-3">
                        <label for="portRouter">Port Api</label>
                        <input
                            class="form-control"
                            id="portRouter" name="port" type="number" placeholder="Default (8728)"
                            value="{{ old('port') }}"
                        >
                        <div id="error_portRouter"></div>
                    </div>
                    <div class="mb-3">
                        <div class="d-flex justify-content-between">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="checkConnection">
                                <input type="hidden" id="is_connected" name="is_connected" value="0">
                                <label class="form-check-label" for="checkConnection">
                                    Test koneksi ke router
                                </label>
                            </div>
                            <div id="badge-connected" class="d-none"></div>
                        </div>
                    </div>
{{--                    <div class="mb-3">--}}
{{--                        <label class="small mb-1">Lokasi Server</label>--}}
{{--                        <select class="form-select " name="server_location_id" id="server_location_id_router" aria-label="Default select example">--}}
{{--                            <option selected="" disabled="">Pilih lokasi server:</option>--}}
{{--                            @foreach($serverLocations as $sl)--}}
{{--                                <option value="{{$sl->id}}">{{$sl->name}} - {{$sl->address}}</option>--}}
{{--                            @endforeach--}}
{{--                        </select>--}}
{{--                        <div id="error_server_location_id_router" class="invalid-feedback"></div>--}}
{{--                    </div>--}}
                </div>
                <div class="modal-footer">
                    <button type="button" id="simpan-router" class="btn btn-sm btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
