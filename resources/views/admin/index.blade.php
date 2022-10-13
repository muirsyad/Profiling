@extends('admin_template')
@section('content')
    {{ date('m') }}
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <div class="d-sm-flex justify-content-between align-items-center mb-4">
        <h3 class="text-dark mb-0">Dashboard</h3><a class="btn btn-primary btn-sm d-none d-sm-inline-block" role="button"
            href="#"><i class="fas fa-download fa-sm text-white-50"></i>&nbsp;Generate Report</a>
    </div>
    <div class="row">
        <div class="col-md-6 col-xl-3 mb-4">
            <div class="card shadow border-start-primary py-2">
                <div class="card-body">
                    <div class="row align-items-center no-gutters">
                        <div class="col me-2">
                            <div class="text-uppercase text-primary fw-bold text-xs mb-1"><span>Total Clients</span></div>
                            <div class="text-dark fw-bold h5 mb-0"><span>{{ $count }}</span></div>
                        </div>
                        <div class="col-auto"><i class="fas fa-calendar fa-2x text-gray-300"></i></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-3 mb-4">
            <div class="card shadow border-start-success py-2">
                <div class="card-body">
                    <div class="row align-items-center no-gutters">
                        <div class="col me-2">
                            <div class="text-uppercase text-success fw-bold text-xs mb-1"><span>Total clients
                                    (Monthly)</span></div>
                            <div class="text-dark fw-bold h5 mb-0"><span>{{ $mcount }}</span></div>
                        </div>
                        <div class="col-auto"><i class="fas fa-dollar-sign fa-2x text-gray-300"></i></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-3 mb-4">
            <div class="card shadow border-start-info py-2">
                <div class="card-body">
                    <div class="row align-items-center no-gutters">
                        <div class="col me-2">
                            <div class="text-uppercase text-info fw-bold text-xs mb-1"><span>Recent Clients</span></div>
                            <span>{{ $recent->client }}</span>
                        </div>
                        <div class="col-auto"><i class="fas fa-clipboard-list fa-2x text-gray-300"></i></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-3 mb-4">
            <div class="card shadow border-start-warning py-2">
                <div class="card-body">
                    <div class="row align-items-center no-gutters">
                        <div class="col me-2">
                            <div class="text-uppercase text-warning fw-bold text-xs mb-1"><span>Total register
                                    participants</span></div>
                            <div class="text-dark fw-bold h5 mb-0"><span>18</span></div>
                        </div>
                        <div class="col-auto"><i class="fas fa-comments fa-2x text-gray-300"></i></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6 col-xl-6">
            <div class="card shadow mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h6 class="text-primary fw-bold m-0">Earnings Overview</h6>
                    <div class="dropdown no-arrow"><button class="btn btn-link btn-sm dropdown-toggle" aria-expanded="false"
                            data-bs-toggle="dropdown" type="button"><i
                                class="fas fa-ellipsis-v text-gray-400"></i></button>
                        <div class="dropdown-menu shadow dropdown-menu-end animated--fade-in">
                            <p class="text-center dropdown-header">dropdown header:</p><a class="dropdown-item"
                                href="#">&nbsp;Action</a><a class="dropdown-item" href="#">&nbsp;Another
                                action</a>
                            <div class="dropdown-divider"></div><a class="dropdown-item" href="#">&nbsp;Something else
                                here</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="chart-area"><canvas
                            data-bss-chart="{&quot;type&quot;:&quot;line&quot;,&quot;data&quot;:{&quot;labels&quot;:[&quot;Jan&quot;,&quot;Feb&quot;,&quot;Mar&quot;,&quot;Apr&quot;,&quot;May&quot;,&quot;Jun&quot;,&quot;Jul&quot;,&quot;Aug&quot;],&quot;datasets&quot;:[{&quot;label&quot;:&quot;Earnings&quot;,&quot;fill&quot;:true,&quot;data&quot;:[&quot;0&quot;,&quot;10000&quot;,&quot;5000&quot;,&quot;15000&quot;,&quot;10000&quot;,&quot;20000&quot;,&quot;15000&quot;,&quot;25000&quot;],&quot;backgroundColor&quot;:&quot;rgba(78, 115, 223, 0.05)&quot;,&quot;borderColor&quot;:&quot;rgba(78, 115, 223, 1)&quot;}]},&quot;options&quot;:{&quot;maintainAspectRatio&quot;:false,&quot;legend&quot;:{&quot;display&quot;:false,&quot;labels&quot;:{&quot;fontStyle&quot;:&quot;normal&quot;}},&quot;title&quot;:{&quot;fontStyle&quot;:&quot;normal&quot;},&quot;scales&quot;:{&quot;xAxes&quot;:[{&quot;gridLines&quot;:{&quot;color&quot;:&quot;rgb(234, 236, 244)&quot;,&quot;zeroLineColor&quot;:&quot;rgb(234, 236, 244)&quot;,&quot;drawBorder&quot;:false,&quot;drawTicks&quot;:false,&quot;borderDash&quot;:[&quot;2&quot;],&quot;zeroLineBorderDash&quot;:[&quot;2&quot;],&quot;drawOnChartArea&quot;:false},&quot;ticks&quot;:{&quot;fontColor&quot;:&quot;#858796&quot;,&quot;fontStyle&quot;:&quot;normal&quot;,&quot;padding&quot;:20}}],&quot;yAxes&quot;:[{&quot;gridLines&quot;:{&quot;color&quot;:&quot;rgb(234, 236, 244)&quot;,&quot;zeroLineColor&quot;:&quot;rgb(234, 236, 244)&quot;,&quot;drawBorder&quot;:false,&quot;drawTicks&quot;:false,&quot;borderDash&quot;:[&quot;2&quot;],&quot;zeroLineBorderDash&quot;:[&quot;2&quot;]},&quot;ticks&quot;:{&quot;fontColor&quot;:&quot;#858796&quot;,&quot;fontStyle&quot;:&quot;normal&quot;,&quot;padding&quot;:20}}]}}}"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-xl-6">
            <div class="card shadow mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h6 class="text-primary fw-bold m-0">Earnings Overview</h6>

                </div>
                <div class="card-body">
                    <canvas id="myChart" style="height:85vh; width:80vw"></canvas>

                    <script>
                        const ctx = document.getElementById('myChart').getContext('2d');

                        // <block:setup:1>
                        // const labels = Utils.months({
                        //     count: 7
                        // });
                        const data = {

                            labels: ['D', 'I', 'S', 'C'],
                            datasets: [{
                                    label: 'My First Dataset',
                                    data: [-12, 3, 4, 45],
                                    fill: false,
                                    borderColor: 'rgb(75, 192, 192)',
                                    tension: 0.1
                                },
                                {
                                    label: 'middle',
                                    data: [20, 20, 20, 20],
                                    fill: false,
                                    borderColor: 'rgb(40, 40, 41)',
                                    tension: 0.1
                                }


                            ]
                        };
                        // </block:setup>

                        // <block:config:0>
                        const config = {
                            type: 'line',
                            data: data,
                        };
                        // </block:config>


                        const myChart = new Chart(ctx, config);
                    </script>

                </div>
            </div>
        </div>
    </div>
@endsection
