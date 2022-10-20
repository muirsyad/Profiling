@extends('U_template')
@section('content')
    <div class="text-start" style="margin-top: 30px;">
        <div class="row">
            <div class="col-3 offset-0"><img class="rounded-circle" src="../assets/img/defalut.jpg" width="80"
                    height="80"></div>
            <div class="col">
                <h1 style="color: rgb(255,231,122);">Welcome {{ auth()->user()->email }} </h1>
                <h3 style="color: rgb(255,231,122);">Lets take DISC Quiz now</h3>
            </div>
        </div>
        <div class="row gy-4 row-cols-1 row-cols-md-2 row-cols-xl-3" style="margin-bottom: 29px;margin-top: 3px;">
            <div class="col offset-md-3 offset-xl-4">
                <div class="card shadow"><img class="card-img-top w-100 d-block border rounded fit-cover"
                        style="height: 200px;" src="../assets/img/quizzzz.jpg" width="400px" height="300">
                    <div class="card-body p-4" style="background: #ffe77a;">
                        <div class="row">
                            <div class="col-12">
                                <h1 style="color: var(--bs-green);text-align: center;">DISC Profiling Quiz</h1>
                            </div>
                            <div class="col-12 offset-0 d-flex justify-content-center"><a
                                    class="btn btn-primary text-center border rounded-pill bounce animated" role="button"
                                    href="{{ route('quiz') }}"
                                    style="background: var(--bs-success);color: rgb(255,231,122);">Start Quiz</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @php
            $record = DB::table('answer_records')
                ->where('user_id', auth()->user()->id)
                ->count();


        @endphp
        <div class="row mb-3 justify-content-center">
            <div class="col-sm-12 col-lg-6 ">
                <div class="card">
                    <div class="card-body" style="background: #ffe77a;">
                        @if ($record < 1)
                            <h5 style="color: rgb(25,135,84);">No results yet.</h5>
                        @else
                            <h5 style="color: rgb(25,135,84);">yes</h5>
                            <a href="{{ route('results') }}" class="btn btn-primary">Results</a>

                        @endif
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
