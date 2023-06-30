<x-mikrotik.app-mikrotik-layout>
    <x-slot name="title">
       {{ __('hotspot.voucher.list-voucher', ['name' => $mikrotik->name ]) }}
    </x-slot>
    <x-slot name="header">
        <div class="col-auto mb-3">
            <h1 class="page-header-title">
                <div class="page-header-icon">
                    <i data-feather='sun'></i>
                </div>
                {{ auth()->user()->name }} server {{$mikrotik->name}}
            </h1>
        </div>
        <div class="col-12 col-xl-auto mb-3">
            <a class="btn btn-sm btn-light text-primary add-voucher me-2 sm:mb-2"
               href="javascript:void(0)">
                <i data-feather='plus-circle' class="me-1"></i> {{ __('hotspot.voucher.add-voucher') }}
            </a>
            <a class="btn btn-sm btn-green-soft text-success generate-voucher"
               href="javascript:void(0)">
                <i data-feather='hash' class="me-1"></i> {{ __('hotspot.voucher.generate-voucher') }}
            </a>
        </div>
    </x-slot>
    <div class="d-flex justify-content-between align-items-sm-center flex-column flex-sm-row mb-4">
        <div class="me-4 mb-3 mb-sm-0">
            <h1 class="mb-0">{{ __('hotspot.voucher.list-voucher-on', ['name' => $mikrotik->name ]) }}</h1>
            <div class="small">
                <span class="fw-500 text-primary">{{ __('hotspot.date-time') }}</span>
                · <span id="tanggal"></span> · <span id="waktu"></span>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card-shadow">
                <div class="card">
                    <div class="card-header">
                        {{ __('hotspot.voucher.all-voucher') }}
                    </div>
                    <div class="card-body">
                        <table id="vouchersTable" class="table  datatable-loading no-footer sortable searchable">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Username</th>
                                <th>Password</th>
                                <th>Profile</th>
                                <th>Uptime</th>
                            </tr>
                            </thead>
{{--                            <tbody>--}}
{{--                            @foreach($vouchers as $voucher)--}}
{{--                                <tr>--}}
{{--                                    <td>{{$loop->iteration}}</td>--}}
{{--                                    <td>{{ $voucher['name'] }}</td>--}}
{{--                                    <td>{{ $voucher['password'] ?? 'no data' }}</td>--}}
{{--                                    <td>{{ $voucher['profile'] ?? 'no data' }}</td>--}}
{{--                                    <td>{{ $voucher['uptime'] ?? 'no data' }}</td>--}}
{{--                                </tr>--}}
{{--                            @endforeach--}}
{{--                            </tbody>--}}
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
    @pushonce('scripts')
        <script>
            $(document).ready(function() {
                $('#vouchersTable').DataTable({
                    responsive: true,
                    processing: true,
                    serverSide: true,
                    searchDelay: 500,
                    ajax: {
                        url: "{{ route('voucher.list', $mikrotik) }}"
                    },
                    columns: [
                        { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                        // { data: 'id', name: 'id' },
                        // { data: 'username', name: 'username' },
                        {
                            "data": "username",
                            "defaultContent": ""
                        },
                        {
                            "data": "password",
                            "defaultContent": ""
                        },
                        {
                            "data": "profile",
                            "defaultContent": ""
                        },
                        {
                            "data": "upload",
                            "defaultContent": ""
                        },
                        {
                            "data": "download",
                            "defaultContent": ""
                        },
                        // { data: 'password', name: 'password' },
                        // { data: 'profile', name: 'profile' },
                        { data: 'uptime', name: 'uptime' },
                        // { data: 'upload', name: 'upload' },
                        // { data: 'download', name: 'download' },
                        // { data: 'status', name: 'status' },
                        // { data: 'comment', name: 'comment' },
                        // Add more columns as needed
                    ]
                });

                function updateTime() {
                    $.ajax({
                        url: "{{ route('mikrotik.time', ['mikrotik' => $mikrotik->slug]) }}",
                        method: "GET",
                        success: function (response) {
                            const waktu = response.time[0].time;
                            const tanggal = response.time[0].date;

                            $('#waktu').html(waktu);
                            $('#tanggal').html(tanggal);

                        },
                        error: function (xhr, status, error) {
                            console.error(error);
                        }
                    });
                }
                updateTime();
            });

        </script>
        @include('mikrotik.partial.resource')
    @endpushonce
</x-mikrotik.app-mikrotik-layout>
