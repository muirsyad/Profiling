@extends('admin_template')
@section('content')
    {{-- {{ $clients->id }}
    {{ $clients->address }} --}}
    <div class="mb-5"><a href="{{ route('invite', $client->id) }}" class="btn btn-primary text-decoration-none">Invite
            Participants</a></div>
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

        .igreen {
            color: #009879
        }
    </style>
    <h1 class="fw-bolder text-dark mb-0">List of Participants</h1>

    <table class="styled-table">
        <thead>
            <tr>
                <th style="width:10%">No</th>
                <th style="width:20%">Name</th>
                <th style="width:30%">email</th>
                <th style="width:30%">department</th>
                <th style="width:10%">action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($participants as $participants)
                <tr>
                    <td>{{ $participants->id }}</td>
                    <td>{{ $participants->name }}</td>
                    <td>{{ $participants->email }}</td>
                    @php
                        $dp = DB::table('departments')->where('id',$participants->department_id)->get();
                        $dp = $dp->department;
                        dd($dp);

                    @endphp
                    <td>{{ $dp }}</td>
                    <td>
                        <div class="row">
                            <div class="col"><a href="/admin/clients/details/{{ $participants->id }}"><i
                                        class="far fa-eye igreen"></i></a></div>
                            <div class="col"><a href="/admin/clients/update/{{ $participants->id }}"><i
                                        class="fas fa-pencil-alt igreen"></i></a></div>
                            <div class="col"><a href="/admin/clients/delete/{{ $participants->id }}"><i
                                        class="fas fa-trash-alt igreen"></i></a></div>
                        </div>

                    </td>
            @endforeach
        </tbody>
    </table>
@endsection
