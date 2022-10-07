@extends('admin_template')
@section('content')
    <h1 class="fw-bolder text-dark mb-0">List of Clients</h1>
    <div class="card" id="TableSorterCard">
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
                                            <div class="col"><a href="/admin/clients/details/{{ $clients->id }}"><i class="far fa-eye"></i></a></div>
                                            <div class="col"><a href="/admin/clients/update/{{ $clients->id }}"><i class="fas fa-pencil-alt"></i></a>
                                            </div>
                                            <div class="col"><a href="/admin/clients/delete/{{ $clients->id }}"><i class="fas fa-trash-alt"></i></a></div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
