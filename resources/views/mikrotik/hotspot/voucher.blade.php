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
                        <table id="vouchersTable" class="table table-responsive  datatable-loading no-footer sortable searchable">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Username</th>
                                <th>Password</th>
                                <th>Profile</th>
                                <th>Uptime</th>
                                <th>Status</th>
                                <th class="text-end">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
{{--                            @dd($vouchers)--}}
                            @foreach($vouchers as $voucher)
                                <tr>
                                    <td><span class="badge rounded-pill bg-secondary-soft text-secondary">{{$loop->iteration}}</span></td>
                                    <td><span class="badge bg-blue-soft text-primary">{{ $voucher['name'] }}</span></td>
                                    <td><span class="badge bg-info-soft text-info">{{ $voucher['password'] ?? 'no data' }}</span></td>
                                    <td>
                                    <span class="badge bg-danger-soft text-danger" >
                                       <i class="fas fa-id-card-alt"></i> {{ $voucher['profile'] ?? 'no data' }}
                                    </span>
                                    </td>
                                    <td><span class="badge bg-warning-soft text-warning"><i class="fas fa-clock"></i> {{ uptime($voucher['uptime']) ?? 'no data' }}</span></td>
                                    <td>
                                        @if ($voucher['disabled'] === \App\Enums\VoucherStatus::ENABLE->value)
                                            <span class="badge bg-success">
                                          <i class="fas fa-lock-open"></i> enabled
                                        </span>
                                        @endif
                                         @if ($voucher['disabled'] === \App\Enums\VoucherStatus::DISABLE->value)
                                                <span class="badge bg-danger">
                                          <i class="fas fa-lock"></i> disabled
                                        </span>
                                        @endif
                                    </td>
                                    <td class="d-flex items-center justify-content-end">
                                        <x-table.drop-down-table>
                                            @if ($voucher['disabled'] === \App\Enums\VoucherStatus::DISABLE->value)
                                                <li>
                                                    <form method="POST" action="{{ route('voucher.enable', ['mikrotik' => $mikrotik, 'username' => $voucher['name']]) }}">
                                                        @csrf
                                                        @method('put')
                                                        <a class="dropdown-item" href="#" onclick="event.preventDefault(); this.closest('form').submit();">
                                                               <i class="far fa-check-circle me-2 text-success"></i> enable
                                                        </a>
                                                    </form>
                                                </li>
                                                <li>
                                                    <form method="POST" action="{{ route('voucher.delete',$mikrotik) }}">
                                                        @csrf
                                                        @method('delete')
                                                        <input type="hidden" name="username" value="{{$voucher['name']}}">
                                                        <button type="submit" class="dropdown-item" onclick="event.preventDefault(); this.closest('form').submit();">
                                                            <i class="fa-regular fa-trash-can me-2 text-danger"></i> delete
                                                        </button>
                                                    </form>
                                                </li>
                                            @endif
                                            @if ($voucher['disabled'] === \App\Enums\VoucherStatus::ENABLE->value)
                                                    <li>
                                                        <form method="POST" action="{{ route('voucher.disable', ['mikrotik' => $mikrotik, 'username' => $voucher['name']]) }}">
                                                            @csrf
                                                            @method('put')
                                                            <a class="dropdown-item" href="#" onclick="event.preventDefault(); this.closest('form').submit();">
                                                                 <i class="far fa-times-circle text-warning me-2"></i>
                                                                disable
                                                            </a>
                                                        </form>
                                                    </li>
                                                    <li>
                                                        <form method="POST" action="{{ route('voucher.delete',$mikrotik) }}">
                                                            @csrf
                                                            @method('delete')
                                                            <input type="hidden" name="username" value="{{$voucher['name']}}">
                                                            <a class="dropdown-item" href="#" onclick="event.preventDefault(); this.closest('form').submit();">
                                                                <i class="fa-regular fa-trash-can me-2 text-danger"></i> delete
                                                            </a>
                                                        </form>
                                                    </li>
                                            @endif
                                        </x-table.drop-down-table>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
    @pushonce('scripts')
        @include('mikrotik.partial.resource')
        <script>
            $(document).ready(function() {
                $('#vouchersTable').DataTable({
                    // responsive: true,
                    // processing: true,
                    // serverSide: true,
                    // searchDelay: 500,
                    {{--ajax: {--}}
                    {{--    url: "{{ route('voucher.list', $mikrotik) }}"--}}
                    {{--},--}}
                    {{--columns: [--}}
                    //     { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                    {{--    // { data: 'id', name: 'id' },--}}
                    {{--    // { data: 'username', name: 'username' },--}}
                    {{--    {--}}
                    {{--        "data": "username",--}}
                    {{--        "defaultContent": ""--}}
                    {{--    },--}}
                    {{--    {--}}
                    {{--        "data": "password",--}}
                    {{--        "defaultContent": ""--}}
                    {{--    },--}}
                    {{--    {--}}
                    {{--        "data": "profile",--}}
                    {{--        "defaultContent": ""--}}
                    {{--    },--}}
                    {{--    {--}}
                    {{--        "data": "upload",--}}
                    {{--        "defaultContent": ""--}}
                    {{--    },--}}
                    {{--    {--}}
                    {{--        "data": "download",--}}
                    {{--        "defaultContent": ""--}}
                    {{--    },--}}
                    {{--    // { data: 'password', name: 'password' },--}}
                    {{--    // { data: 'profile', name: 'profile' },--}}
                    {{--    { data: 'uptime', name: 'uptime' },--}}
                    {{--    // { data: 'upload', name: 'upload' },--}}
                    {{--    // { data: 'download', name: 'download' },--}}
                    {{--    // { data: 'status', name: 'status' },--}}
                    {{--    // { data: 'comment', name: 'comment' },--}}
                    {{--    // Add more columns as needed--}}
                    {{--]--}}
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
