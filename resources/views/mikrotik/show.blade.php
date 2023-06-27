<x-mikrotik.app-mikrotik-layout>
    <x-slot name="title">
        {{$mikrotik->name}}
    </x-slot>
    <div class="d-flex justify-content-between align-items-sm-center flex-column flex-sm-row mb-4">
        <div class="me-4 mb-3 mb-sm-0">
            <h1 class="mb-0">Dashboard router: {{$mikrotik->name}}</h1>
            <div class="small">
                <span class="fw-500 text-primary">Tanggal & Waktu</span>
                · <span id="tanggal"></span> · <span id="waktu"></span>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-start-lg border-start-primary h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1">
                            <div class="small fw-bold text-primary mb-1">Online</div>
                                <div id="active-count" class="h5">
                                    <div id="loading" class="d-none">Loading...</div>
                                </div>
                            <div class="text-xs fw-bold text-success d-inline-flex align-items-center">

                                Hotspot Active
                            </div>
                        </div>
                        <div class="ms-2"><svg class="svg-inline--fa fa-dollar-sign fa-2x text-gray-200" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="dollar-sign" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" data-fa-i2svg=""><path fill="currentColor" d="M146 0c17.7 0 32 14.3 32 32V67.7c1.6 .2 3.1 .4 4.7 .7c.4 .1 .7 .1 1.1 .2l48 8.8c17.4 3.2 28.9 19.9 25.7 37.2s-19.9 28.9-37.2 25.7l-47.5-8.7c-31.3-4.6-58.9-1.5-78.3 6.2s-27.2 18.3-29 28.1c-2 10.7-.5 16.7 1.2 20.4c1.8 3.9 5.5 8.3 12.8 13.2c16.3 10.7 41.3 17.7 73.7 26.3l2.9 .8c28.6 7.6 63.6 16.8 89.6 33.8c14.2 9.3 27.6 21.9 35.9 39.5c8.5 17.9 10.3 37.9 6.4 59.2c-6.9 38-33.1 63.4-65.6 76.7c-13.7 5.6-28.6 9.2-44.4 11V480c0 17.7-14.3 32-32 32s-32-14.3-32-32V445.1c-.4-.1-.9-.1-1.3-.2l-.2 0 0 0c-24.4-3.8-64.5-14.3-91.5-26.3C4.9 411.4-2.4 392.5 4.8 376.3s26.1-23.4 42.2-16.2c20.9 9.3 55.3 18.5 75.2 21.6c31.9 4.7 58.2 2 76-5.3c16.9-6.9 24.6-16.9 26.8-28.9c1.9-10.6 .4-16.7-1.3-20.4c-1.9-4-5.6-8.4-13-13.3c-16.4-10.7-41.5-17.7-74-26.3l-2.8-.7 0 0C105.4 279.3 70.4 270 44.4 253c-14.2-9.3-27.5-22-35.8-39.6C.3 195.4-1.4 175.4 2.5 154.1C9.7 116 38.3 91.2 70.8 78.3c13.3-5.3 27.9-8.9 43.2-11V32c0-17.7 14.3-32 32-32z"></path></svg><!-- <i class="fas fa-dollar-sign fa-2x text-gray-200"></i> Font Awesome fontawesome.com --></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-start-lg border-start-primary h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1">
                            <div class="small fw-bold text-primary mb-1">Total Voucher</div>
                            <div id="all-users" class="h5">
                                <div id="loading" class="d-none">Loading...</div>
                            </div>
                            <div class="text-xs fw-bold text-success d-inline-flex align-items-center">

                                Hotspot Items
                            </div>
                        </div>
                        <div class="ms-2">
                            <svg class="svg-inline--fa fa-dollar-sign fa-2x text-gray-200" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="dollar-sign" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" data-fa-i2svg=""><path fill="currentColor" d="M146 0c17.7 0 32 14.3 32 32V67.7c1.6 .2 3.1 .4 4.7 .7c.4 .1 .7 .1 1.1 .2l48 8.8c17.4 3.2 28.9 19.9 25.7 37.2s-19.9 28.9-37.2 25.7l-47.5-8.7c-31.3-4.6-58.9-1.5-78.3 6.2s-27.2 18.3-29 28.1c-2 10.7-.5 16.7 1.2 20.4c1.8 3.9 5.5 8.3 12.8 13.2c16.3 10.7 41.3 17.7 73.7 26.3l2.9 .8c28.6 7.6 63.6 16.8 89.6 33.8c14.2 9.3 27.6 21.9 35.9 39.5c8.5 17.9 10.3 37.9 6.4 59.2c-6.9 38-33.1 63.4-65.6 76.7c-13.7 5.6-28.6 9.2-44.4 11V480c0 17.7-14.3 32-32 32s-32-14.3-32-32V445.1c-.4-.1-.9-.1-1.3-.2l-.2 0 0 0c-24.4-3.8-64.5-14.3-91.5-26.3C4.9 411.4-2.4 392.5 4.8 376.3s26.1-23.4 42.2-16.2c20.9 9.3 55.3 18.5 75.2 21.6c31.9 4.7 58.2 2 76-5.3c16.9-6.9 24.6-16.9 26.8-28.9c1.9-10.6 .4-16.7-1.3-20.4c-1.9-4-5.6-8.4-13-13.3c-16.4-10.7-41.5-17.7-74-26.3l-2.8-.7 0 0C105.4 279.3 70.4 270 44.4 253c-14.2-9.3-27.5-22-35.8-39.6C.3 195.4-1.4 175.4 2.5 154.1C9.7 116 38.3 91.2 70.8 78.3c13.3-5.3 27.9-8.9 43.2-11V32c0-17.7 14.3-32 32-32z"></path></svg><!-- <i class="fas fa-dollar-sign fa-2x text-gray-200"></i> Font Awesome fontawesome.com --></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-start-lg border-start-primary h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1">
                            <div class="small fw-bold text-primary mb-1">PPP</div>
                            <div id="all-ppp-secrets-count" class="h5">
                                <div id="loading" class="d-none">Loading...</div>
                            </div>
                            <div class="text-xs fw-bold text-success d-inline-flex align-items-center">

                                PPPoE Active
                            </div>
                        </div>
                        <div class="ms-2"><svg class="svg-inline--fa fa-dollar-sign fa-2x text-gray-200" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="dollar-sign" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" data-fa-i2svg=""><path fill="currentColor" d="M146 0c17.7 0 32 14.3 32 32V67.7c1.6 .2 3.1 .4 4.7 .7c.4 .1 .7 .1 1.1 .2l48 8.8c17.4 3.2 28.9 19.9 25.7 37.2s-19.9 28.9-37.2 25.7l-47.5-8.7c-31.3-4.6-58.9-1.5-78.3 6.2s-27.2 18.3-29 28.1c-2 10.7-.5 16.7 1.2 20.4c1.8 3.9 5.5 8.3 12.8 13.2c16.3 10.7 41.3 17.7 73.7 26.3l2.9 .8c28.6 7.6 63.6 16.8 89.6 33.8c14.2 9.3 27.6 21.9 35.9 39.5c8.5 17.9 10.3 37.9 6.4 59.2c-6.9 38-33.1 63.4-65.6 76.7c-13.7 5.6-28.6 9.2-44.4 11V480c0 17.7-14.3 32-32 32s-32-14.3-32-32V445.1c-.4-.1-.9-.1-1.3-.2l-.2 0 0 0c-24.4-3.8-64.5-14.3-91.5-26.3C4.9 411.4-2.4 392.5 4.8 376.3s26.1-23.4 42.2-16.2c20.9 9.3 55.3 18.5 75.2 21.6c31.9 4.7 58.2 2 76-5.3c16.9-6.9 24.6-16.9 26.8-28.9c1.9-10.6 .4-16.7-1.3-20.4c-1.9-4-5.6-8.4-13-13.3c-16.4-10.7-41.5-17.7-74-26.3l-2.8-.7 0 0C105.4 279.3 70.4 270 44.4 253c-14.2-9.3-27.5-22-35.8-39.6C.3 195.4-1.4 175.4 2.5 154.1C9.7 116 38.3 91.2 70.8 78.3c13.3-5.3 27.9-8.9 43.2-11V32c0-17.7 14.3-32 32-32z"></path></svg><!-- <i class="fas fa-dollar-sign fa-2x text-gray-200"></i> Font Awesome fontawesome.com --></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-start-lg border-start-primary h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1">
                            <div class="small fw-bold text-primary mb-1">Income</div>
                            <div class="h5">Today Rp. 900.000</div>
                            <div class="text-xs fw-bold text-success d-inline-flex align-items-center">

                                This Mounth Rp. 4.000.000
                            </div>
                        </div>
                        <div class="ms-2"><svg class="svg-inline--fa fa-dollar-sign fa-2x text-gray-200" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="dollar-sign" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" data-fa-i2svg=""><path fill="currentColor" d="M146 0c17.7 0 32 14.3 32 32V67.7c1.6 .2 3.1 .4 4.7 .7c.4 .1 .7 .1 1.1 .2l48 8.8c17.4 3.2 28.9 19.9 25.7 37.2s-19.9 28.9-37.2 25.7l-47.5-8.7c-31.3-4.6-58.9-1.5-78.3 6.2s-27.2 18.3-29 28.1c-2 10.7-.5 16.7 1.2 20.4c1.8 3.9 5.5 8.3 12.8 13.2c16.3 10.7 41.3 17.7 73.7 26.3l2.9 .8c28.6 7.6 63.6 16.8 89.6 33.8c14.2 9.3 27.6 21.9 35.9 39.5c8.5 17.9 10.3 37.9 6.4 59.2c-6.9 38-33.1 63.4-65.6 76.7c-13.7 5.6-28.6 9.2-44.4 11V480c0 17.7-14.3 32-32 32s-32-14.3-32-32V445.1c-.4-.1-.9-.1-1.3-.2l-.2 0 0 0c-24.4-3.8-64.5-14.3-91.5-26.3C4.9 411.4-2.4 392.5 4.8 376.3s26.1-23.4 42.2-16.2c20.9 9.3 55.3 18.5 75.2 21.6c31.9 4.7 58.2 2 76-5.3c16.9-6.9 24.6-16.9 26.8-28.9c1.9-10.6 .4-16.7-1.3-20.4c-1.9-4-5.6-8.4-13-13.3c-16.4-10.7-41.5-17.7-74-26.3l-2.8-.7 0 0C105.4 279.3 70.4 270 44.4 253c-14.2-9.3-27.5-22-35.8-39.6C.3 195.4-1.4 175.4 2.5 154.1C9.7 116 38.3 91.2 70.8 78.3c13.3-5.3 27.9-8.9 43.2-11V32c0-17.7 14.3-32 32-32z"></path></svg><!-- <i class="fas fa-dollar-sign fa-2x text-gray-200"></i> Font Awesome fontawesome.com --></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-4 mb-4">
           <div class="card">
               <div  class="card-header">Resource: <span id="rbtype"></span></div>
               <div class="card-body">
                       <div class="mb-4">
                           <p>Uptime: <span id="uptime" class="badge bg-primary font-size-12">12d 20:56:51</span> </p>
                           <div>
                               Router OS : <span id="version">6.47.9 (long-term)</span>
                           </div>
                           <div>
                               CPU Frequency :
                               <span id="frequency">1400</span>
                               MHz
                           </div>
                           <div>
                               CPU : <span id="cpuCount">4</span> Core
                           </div>
                           <div>
                               Architecture : <span id="arc">arm</span>
                           </div>
                           <div>
                               Board name : <span id="boardname">RB1100AHx4</span>
                           </div>
                       </div>

                       <div class="pt-2">
                           <div class="custom-progess mb-5">
                               <h4 class="small">
                                  CPU
                                   <span id="pCpu" class="float-end fw-bold">80%</span>
                               </h4>
                               <div class="progress">
                                   <div id="cpu" class="progress-bar progress-bar-striped progress-bar-animated bg-success" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">50% CPU </div>
                               </div>
                           </div>
                           <div class="custom-progess mb-5">
                               <h4 class="small">
                                   RAM
                                   <span id="pRam" class="float-end fw-bold">80%</span>
                               </h4>
                               <div class="progress">
                                   <div id="memory" class="progress-bar progress-bar-striped progress-bar-animated bg-warning" role="progressbar" style="width: 19%;">199.04MB/1GB</div>
                               </div>
                           </div>
                           <div class="custom-progess mb-4">
                               <h4 class="small">
                                   HDD
                                   <span id="pHdd" class="float-end fw-bold">80%</span>
                               </h4>
                               <div class="progress">
                                   <div id="hdd" class="progress-bar progress-bar-animated progress-bar-striped bg-danger" role="progressbar" style="width: 41%;">52.88MB/128.25MB</div>
                               </div>
                           </div>
                       </div>
               </div>
           </div>
        </div>

        <div class="col-lg-8 mb-4">
            <div class="card mb-4">
                <div class="card-header">
                    Traffic Interface
                    <div class="float-end">
                        <div class="input-group input-group-sm">
                            <select id="interface" name="interface" class="form-select interfaceChange form-select-sm">
                                @foreach($interfaces as $if)
                                    <option value="{{$if['name']}}">{{$if['name']}}</option>
                                @endforeach
                            </select>
                            <label for="interface" class="input-group-text">
                                <span  class="text-success font-size-12 font-semibold">
                                    <i class="fas fa-network-wired"></i>
                                </span>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="apex-charts" id="chart" dir="ltr"></div>
                </div>
            </div>
        </div>
    </div>
    @pushonce('scripts')
        <script>
            $(document).ready(function() {
                $("#loading").removeClass("d-none");

                function updatePppActive() {
                    $.ajax({
                        url: "{{ route('ppp.active', ['mikrotik' => $mikrotik]) }}",
                        method: "GET",
                        success: function(response) {
                            const allPppActiveCount = response.allPppActiveCount;
                            $("#all-ppp-secrets-count").text(allPppActiveCount);
                        },
                        error: function(xhr, status, error) {
                            console.error(error);
                        }
                    });
                }

                function updateHotspotActive() {
                    $.ajax({
                        url: "{{ route('hotspot.count', ['mikrotik' => $mikrotik]) }}",
                        method: "GET",
                        success: function(response) {
                            const activeCount = response.activeCount;
                            $("#active-count").text(activeCount);
                        },
                        error: function(xhr, status, error) {
                            console.error(error);
                        }
                    });
                }
                function updateIncomeToday()
                {
                    $.ajax({
                        url: "{{ route('income.today', ['mikrotik' => $mikrotik]) }}",
                        method: "GET",
                        success: function(response) {
                            console.log(response)
                            // const allUsers = response.allUsers;
                            // $("#income-today").text(allUsers);
                        },
                        error: function(xhr, status, error) {
                            console.error(error);
                        }
                    });
                }
                function updateSystemResources()
                {
                    $.ajax({
                        url: "{{ route('routerboard.resources', ['mikrotik' => $mikrotik]) }}",
                        method: "GET",
                        success: function (response) {
                            const waktu = response.time[0].time;
                            const tanggal = response.time[0].date;
                            const resource = response.resources[0];
                            const memoryUse = resource.totalMemory - resource.freeMemory;
                            const memoryPercentUse = Math.round(memoryUse / resource.totalMemory * 100);
                            const hddUse = resource.totalHdd - resource.freeHdd;
                            const hddPercentUse = Math.round(hddUse / resource.totalHdd * 100);
                            $('#waktu').html(waktu);
                            $('#tanggal').html(tanggal);
                            $('#pCpu').html( resource.cpuLoad + '%');
                            $('#cpu').css('width', resource.cpuLoad + '%').html(resource.cpuLoad + '%' + ' ' + resource.cpuFrequency + 'Mhz');
                            $('#pRam').html( memoryPercentUse + '%');
                            $('#memory').css('width', memoryPercentUse + '%').html(resource.memoryUsage + '/' + resource.totalMemorySpace);
                            $('#pHdd').html(hddPercentUse + '%');
                            $('#hdd').css('width', hddPercentUse + '%').html(resource.hddUsage + '/' + resource.totalHddSpace);
                            $('#arc').html(resource.arc)
                            $('#frequency').html(resource.cpuFrequency)
                            $('#rbtype').html(resource.boardName)
                            $('#boardname').html(resource.boardName)
                            $('#version').html(resource.version)
                            $('#uptime').html(formatUptime(resource.uptime))
                            $('#cpuCount').html(resource.cpuCount)
                        },
                        global: false,
                        dataType: 'json',
                        error: function(xhr, status, error) {
                            console.error(error);
                        }
                    });
                }

                const options = {
                    chart: {
                        height: 400,
                        type: "line",
                        toolbar: {
                            show: !1
                        }
                    },
                    dataLabels: {
                        enabled: false,
                        textAnchor: 'start',
                        formatter: function (value) {
                            const sizes = ['bps', 'kbps', 'Mbps', 'Gbps', 'Tbps'];
                            if (value === 0) return '0 bps';
                            const i = parseInt(Math.floor(Math.log(value) / Math.log(1024)));
                            return parseFloat((value / Math.pow(1024, i)).toFixed(2)) + ' ' + sizes[i];
                        },
                    },
                    series: [
                        {name: 'Download', data: [], type: "area",},
                        {name: 'Upload', data: [], type: "area",},
                    ],
                    title: {
                        text: '',
                    },
                    yaxis: {
                        labels: {
                            formatter: function (value) {
                                const sizes = ['bps', 'kbps', 'Mbps', 'Gbps', 'Tbps'];
                                if (value === 0) return '0 bps';
                                const i = parseInt(Math.floor(Math.log(value) / Math.log(1024)));
                                return parseFloat((value / Math.pow(1024, i)).toFixed(2)) + ' ' + sizes[i];
                            },
                        },
                    },
                    colors: ["#0090fc", "#ff6666"],
                    stroke: {
                        curve: "smooth",
                        width: 2,
                        dashArray: [0, 0, 3]
                    },
                    fill: {
                        type: "soft",
                        opacity: [.15, .05, 1]
                    },
                    tooltip: {
                        y: {
                            formatter: function (value) {
                                const sizes = ['bps', 'kbps', 'Mbps', 'Gbps', 'Tbps'];
                                if (value === 0) return '0 bps';
                                const i = parseInt(Math.floor(Math.log(value) / Math.log(1024)));
                                return parseFloat((value / Math.pow(1024, i)).toFixed(2)) + ' ' + sizes[i];
                            },
                        }
                    },
                    markers: {
                        size: 3,
                        strokeWidth: 3,
                        hover: {
                            size: 4,
                            sizeOffset: 2
                        }
                    },
                    xaxis: {
                        range: 15,
                    },
                    noData: {
                        text: 'Waiting load data...'
                    },
                };
                const chart = new ApexCharts(
                    document.querySelector("#chart"),
                    options
                );
                chart.render();
                const updateChart = function () {
                    const iface = $('#interface').val();
                    const url = '{{route('mikrotik.traffic-interface',$mikrotik)}}';
                    $.ajax({
                        url: url,
                        data: {
                            'interface': iface
                        },
                        success: function (response) {
                            chart.appendData([
                                {
                                    name: 'Download',
                                    data: response[0].Rx
                                },
                                {
                                    name: 'Upload',
                                    data: response[0].Tx
                                },
                            ])
                        },
                        global: false,
                        dataType: 'json',
                    });
                };

                function updateAllUsers() {
                    $.ajax({
                        url: "{{ route('hotspot.users', ['mikrotik' => $mikrotik]) }}",
                        method: "GET",
                        success: function(response) {
                            const allUsers = response.allUsers;
                            $("#all-users").text(allUsers);
                        },
                        error: function(xhr, status, error) {
                            console.error(error);
                        }
                    });
                }
                updateIncomeToday();
                updatePppActive();
                updateHotspotActive();
                updateAllUsers();
                updateSystemResources();

                setInterval(function() {
                    updatePppActive();
                    updateHotspotActive();
                }, 20000);
                setInterval(function() {
                    updateSystemResources();
                    updateChart();
                }, 10000);
                setInterval(function() {
                    updateIncomeToday();
                }, 40000);

                $(document).ajaxStop(function() {
                    $("#loading").addClass("d-none");
                });
            });
        </script>
        <script src="{{asset('assets/vendor/apexcharts/apexcharts.min.js')}}"></script>
        @include('mikrotik.partial.resource')
    @endpushonce
</x-mikrotik.app-mikrotik-layout>
