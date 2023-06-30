<div class="modal fade" id="editRouterModal" data-target="editRouterModal" tabindex="-1" role="dialog" aria-labelledby="editRouterModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form id="editRouterForm" method="POST">
                <div class="modal-header">
                    <h5 class="modal-title" id="editRouterModalTitle">{{ __('hotspot.edit-role') }}</h5>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="edit_nameRouter">{{ __('hotspot.router-name') }}</label>
                        <input
                            class="form-control"
                            id="edit_nameRouter" name="name" type="text" placeholder="{{ __('hotspot.router-name') }}"
                            value="{{ old('name') }}"
                        >
                        <div id="error_edit_nameRouter"></div>
                    </div>
                    <div class="mb-3">
                        <label for="edit_host">Host/IP Router</label>
                        <input
                            class="form-control"
                            id="edit_host" name="host" type="text" placeholder="192.168.88.1"
                            value="{{ old('host') }}"
                        >
                        <div id="error_edit_host"></div>
                    </div>
                    <div class="mb-3">
                        <label for="edit_usernameRouter">Username Router</label>
                        <input
                            class="form-control"
                            id="edit_usernameRouter" name="username" type="text" placeholder="admin"
                            value="{{ old('username') }}"
                        >
                        <div id="error_edit_usernameRouter"></div>
                    </div>
                    <div class="mb-3">
                        <label for="edit_passwordRouter">Password Router</label>
                        <input
                            class="form-control"
                            id="edit_passwordRouter" name="password" type="password" placeholder="******"
                            value="{{ old('password') }}"
                        >
                        <div id="error_edit_passwordRouter"></div>
                    </div>
                    <div class="mb-3">
                        <label for="edit_portRouter">Port Api</label>
                        <input
                            class="form-control"
                            id="edit_portRouter" name="port" type="number" placeholder="Default (8728)"
                            value="{{ old('port') }}"
                        >
                        <div id="error_edit_portRouter"></div>
                    </div>
{{--                    <div class="mb-3">--}}
{{--                        <label class="small mb-1">{{ __('hotspot.server-location') }}</label>--}}
{{--                        <select class="form-select " name="server_location_id" id="edit_server_location_id_router" aria-label="Default select example">--}}
{{--                            <option selected="" disabled="">{{ __('hotspot.choice-server-location') }}:</option>--}}
{{--                            @foreach($serverLocations as $sl)--}}
{{--                                <option value="{{$sl->id}}">{{$sl->name}} - {{$sl->address}}</option>--}}
{{--                            @endforeach--}}
{{--                        </select>--}}
{{--                        <div id="error_edit_server_location_id_router" class="invalid-feedback"></div>--}}
{{--                    </div>--}}
                </div>
                <div class="modal-footer">
                    <button type="button" id="update-router" class="btn btn-sm btn-primary">{{ __('hotspot.save') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>
