@extends('U_template')
@section('content')
    <div class="card mt-3">
        <div class="card-body">
            <p class="text-center display-4 text-dark mb-3"> <strong>Your Results</strong> </p>
            <div class="row text-center text-dark">
                <hr />

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
                <hr />

            </div>

            <div class="row">
                <p class="text-center display-4 text-dark mb-3"> <strong>Graphs</strong> </p>

                <div class="col-12">

                    <canvas id="myChart" class="mb-5" style="height:100px; width:100px"></canvas>



                        @php
                            $D = $record->D;
                            $I = $record->I;
                            $S = $record->S;
                            $C = $record->C;
                            $plotD = $plot[0];
                            $plotI = $plot[1];
                            $plotS = $plot[2];
                            $plotC = $plot[3];
                            //dd($D, $I, $S, $C);
                        @endphp



                    </div>
                <div class="col text center">
                    <a href="#" class="btn btn-primary">Download</a>
                    <a href="#" class="btn btn-primary">Home</a>
                </div>
            </div>
        </div>

        aswer records
        {{ $record->answer_records }}

        <script>
            var D = <?php echo $D; ?>;
            var I = <?php echo $I; ?>;
            var S = <?php echo $S; ?>;
            var C = <?php echo $C; ?>;

            var pD = <?php echo $plotD; ?>;
            var pI = <?php echo $plotI; ?>;
            var pS = <?php echo $plotS; ?>;
            var pC = <?php echo $plotC; ?>;


            console.log(D);
            console.log(I);
            console.log(S);
            console.log(C);


            const ctx = document.getElementById('myChart').getContext('2d');

            // <block:setup:1>
            // const labels = Utils.months({
            //     count: 7
            // });

            const data = {

                labels: ['D', 'I', 'S', 'C'],
                datasets: [{
                        label: 'Behaviour type',
                        data: [pD, pI, pS, pC],
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
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            };
            // </block:config>


            const myChart = new Chart(ctx, config);
        </script>
    @endsection
