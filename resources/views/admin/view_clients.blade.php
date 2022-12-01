@extends('admin_template')
@section('content')
    <style>
        .styled-table {
            border-collapse: collapse;
            margin: 25px 0;
            font-size: 0.9em;
            min-width: 400px;
            border-radius: 5px 5px 0 0;
            overflow: hidden;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.5);
            text-align: center;

        }

        .styled-table thead tr {
            background-color: #009879;
            color: #ffffff;
            /* text-align: left; */
            font-weight: bold;
        }

        .styled-table th,
        .styled-table td {
            padding: 12px 15px;
        }

        .styled-table tbody tr {
            border-bottom: 1px solid #dddddd;
        }

        .styled-table tbody tr:nth-of-type(even) {
            background-color: #f3f3f3;
        }

        .styled-table tbody tr:last-of-type {
            border-bottom: 2px solid #009879;
        }

        .styled-table tbody tr:hover {
            font-weight: bold;
            color: #009879;
        }

        #icon {
            font-size: 50px;
            color: red;
            transition-duration: .6s;
        }
        .igreen{
            color: #009879
        }
    </style>
    <h1 class="fw-bolder text-dark mb-0">List of Clients</h1>
    {{-- <div class="card" id="TableSorterCard">
        <div class="row">
            <div class="col-12">
                <div class="table-responsive">
                    <table class="table table-striped table tablesorter" id="ipi-table">
                        <thead class="thead-dark">
                            <tr>
                                <th class="text-center" style="width:10%">No</th>
                                <th class="text-center" style="width:20%">Name</th>
                                <th class="text-center" style="width:60%">address</th>
                                <th class="text-center" style="width:10%">action</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            @foreach ($clients as $clients)
                                <tr>
                                    <td>{{ $clients->id }}</td>
                                    <td>{{ $clients->client }}</td>
                                    <td>{{ $clients->address }}</td>
                                    <td class="d-xl-flex justify-content-center justify-content-xl-center">
                                        <div
                                            class="row d-xl-flex d-xxl-flex justify-content-xl-center align-items-xl-center justify-content-xxl-center">
                                            <div class="col"><a href="/admin/clients/details/{{ $clients->id }}"><i
                                                        class="far fa-eye"></i></a></div>
                                            <div class="col"><a href="/admin/clients/update/{{ $clients->id }}"><i
                                                        class="fas fa-pencil-alt"></i></a>
                                            </div>
                                            <div class="col"><a href="/admin/clients/delete/{{ $clients->id }}"><i
                                                        class="fas fa-trash-alt"></i></a></div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div> --}}
    {{-- second table --}}
    <table class="styled-table">
        <thead>
            <tr>
                <th style="width:10%">No</th>
                <th style="width:20%">Name</th>
                <th style="width:60%">Address</th>
                <th style="width:10%">action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($clients as $clients)
                <tr>
                    <td>{{ $clients->id }}</td>
                    <td>{{ $clients->client }}</td>
                    <td>{{ $clients->address }}</td>
                    <td>
                        <div class="row">
                            <div class="col"><a href="{{ URL::to('details')}}/{{ $clients->id }}"><i
                                class="far fa-eye igreen"></i></a></div>
                            <div class="col"><a href="/admin/clients/update/{{ $clients->id }}"><i
                                        class="fas fa-pencil-alt igreen"></i></a></div>
                            <div class="col"><a href="/admin/clients/delete/{{ $clients->id }}"><i
                                        class="fas fa-trash-alt igreen"></i></a></div>
                        </div>

                    </td>
            @endforeach
        </tbody>
    </table>
@endsection
