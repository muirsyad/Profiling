@extends('admin_template')
@section('content')
    {{ date('m') }}
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <div class="d-sm-flex justify-content-between align-items-center mb-4">
        <h3 class="text-dark mb-0">Dashboard</h3>
        {{-- <a class="btn btn-primary btn-sm d-none d-sm-inline-block" role="button"
            href="#"><i class="fas fa-download fa-sm text-white-50"></i>&nbsp;Generate Report</a> --}}
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
                            <div class="text-dark fw-bold h5 mb-0"><span>{{ $monthly }}</span></div>
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
                            <div class="text-dark fw-bold h5 mb-0"><span>{{ $participants }}</span></div>
                        </div>
                        <div class="col-auto"><i class="fas fa-comments fa-2x text-gray-300"></i></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 col-xl-12">
            <div class="card shadow mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h6 class="text-primary fw-bold m-0">Total Participants</h6>

                </div>
                <div class="card-body">
                    <canvas id="myChart" style="height:35vh; width:70vw"></canvas>

                    <script>
                        const ctx = document.getElementById('myChart').getContext('2d');

                        // <block:setup:1>
                        // const labels = Utils.months({
                        //     count: 7
                        // });
                        const data = {

                            labels: ['January', 'Febuary', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October',
                                'November', 'December'
                            ],
                            datasets: [{
                                    label: 'Participants',
                                    data: [{{ $year[0] }}, {{ $year[1] }}, {{ $year[2] }}, {{ $year[3] }}, {{ $year[4] }},{{ $year[5] }}, {{ $year[6] }}, {{ $year[7] }}, {{ $year[8] }}, {{ $year[9] }}, {{ $year[10] }}, {{ $year[11] }}],
                                    fill: false,
                                    borderColor: 'rgb(52, 68, 84)',
                                    tension: 0.5
                                },



                            ]
                        };




                        // </block:setup>

                        // <block:config:0>
                        const config = {
                            type: 'line',
                            data: data,

                            // options: options,
                        };
                        // </block:config>


                        const myChart = new Chart(ctx, config);
                    </script>


                </div>
            </div>
        </div>
    </div>
@endsection
