@extends('admin_template')
@section('content')
    <div class="d-flex justify-content-evenly">
        <div class="card col-5">
            <div class="card-body shadow">
                <div class="d-flex justify-content-between">
                    <div>
                        <h1 class="fw-bold text-primary">Individual</h1>
                        <h4 class="text-primary">Template </h4>
                    </div>
                    <div class="align-self-center">
                        <a href="{{ route('indTemp') }}"><i class="far fa-eye fa-2x text-gray-300"></i></a>
                    </div>

                </div>


            </div>
        </div>
        <div class="card col-5">
            <div class="card-body shadow">
                <div class="d-flex justify-content-between">
                    <div>
                        <h1 class="fw-bold text-primary">Client</h1>
                        <h4 class="text-primary">Template </h4>
                    </div>
                    <div class="align-self-center">
                        <a href="{{ route('grpTemp') }}"><i class="far fa-eye fa-2x text-gray-300"></i></a>

                    </div>
                </div>

            </div>

        </div>
    </div>
@endsection
