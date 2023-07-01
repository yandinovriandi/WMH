<x-app-layout title="Dashboard">
    <x-slot name="header">
        <div class="col-auto mb-3">
            <h1 class="page-header-title">
                <div class="page-header-icon">
                    <i data-feather='sun'></i>
                </div>
                {{ __('dashboard.welcome-user', ['user' => auth()->user()->name] )}}
            </h1>
        </div>
        <div class="col-12 col-xl-auto mb-3">
            <a class="btn btn-sm btn-light text-primary add-router"
               href="javascript:void(0)">
                <i data-feather='plus-circle' class="me-1"></i> {{ __('dashboard.new-router') }}
            </a>
        </div>
    </x-slot>
    <div class="row mt-4">
        <div class="col-xl-3 col-md-6 mb-4">
            <!-- Dashboard info widget 1-->
            <div class="card border-start-lg border-start-primary h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1">
                            <div class="small fw-bold text-primary mb-1">{{ __('dashboard.total-router') }}</div>
                            <div class="h5">
                                <span id="mikrotiksCount" class="badge bg-blue-soft text-primary rounded-pill">
                                    {{auth()->user()->mikrotiks()->count()}}
                                </span>
                            </div>
                            <div class="text-xs fw-bold text-success d-inline-flex align-items-center">
                                <i class="fas fa-network-wired me-1"></i> {{ __('dashboard.connected') }}
                            </div>
                        </div>
                        <div class="ms-2">
                            <i class="fas fa-server fa-2x text-primary-soft"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-9 col-md-6 mb-4">
            <!-- Dashboard info widget 2-->
            <div class="card border-start-lg border-start-success h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1">
                            <div class="small fw-bold text-success mb-1">
                                Wifi Management Hotspot
                            </div>
                            <h5 class="h5 text-uppercase">
                                {{ __('dashboard.free-edition') }}
                            </h5>
                            <div class="text-xs fw-bold text-danger d-inline-flex align-items-center">
                                {{ config('app.version', 'ALPHA') }}
                            </div>
                        </div>
                        <div class="ms-2">
                            <i class="fas fa-wifi fa-2x text-success"></i>
                        </div>
                </div>
            </div>
        </div>
    </div>

        <div class="card-shadow">
            <div class="card">
                <div class="card-header">
                    {{ __('dashboard.router-list') }}
                </div>
                <div class="card-body">
                    <table id="mikrotiksTable" class="table  datatable-loading no-footer sortable searchable">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Host</th>
                            <th>Port</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @include('mikrotik.partial.create')
    @include('mikrotik.partial.edit')
    @pushonce('scripts')
        @include('mikrotik.partial._script')
            <script type="text/javascript">
                $(document).ready(function(){
                    $('#mikrotiksTable').DataTable({
                        responsive:true,
                        processing:true,
                        serverSide: true,
                        searchDelay:500,
                        ajax: {
                            url: "{{route('dashboard')}}"
                        },
                        columns: [
                            { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                            { data: 'name', name: 'name' },
                            { data: 'host', name: 'host' },
                            { data: 'port', name: 'port' },
                            { data: 'action', name: 'action', orderable: false, searchable: false }
                        ]
                    });
                });
            </script>
    @endpushonce
</x-app-layout>
