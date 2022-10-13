@extends('U_template')
@section('content')

<div class="card mt-3">
    <div class="card-body">
        <p class="text-center display-4 text-dark mb-3"> <strong>Your Results</strong> </p>
    <div class="row text-center text-dark">
        <hr/>

        <div class="col-xl-12 mb-3 ">
            Name:

            <label class="px-3">{{ auth()->user()->name }}</label>
        </div>


        <div class="col-xl-12 mb-3">
            Email Address:
            <label class="px-3">{{ auth()->user()->email }}</label>
        </div>

        <div class="col-xl-12 mb-3">
            Higest Behaviour type:
            <label class="px-3">{{ $high }}</label>
        </div>

        <div class="col-xl-12 mb-3">
            Department
            <label class="px-3">{{ $department }}</label>
        </div>
        <hr/>

    </div>

    <div class="row">
        <p class="text-center display-4 text-dark mb-3"> <strong>Graphs</strong> </p>

        <div class="col">
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

aswer records
{{ $record->answer_records }}
@endsection
