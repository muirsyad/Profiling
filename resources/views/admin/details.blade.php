@extends('admin_template')
@section('content')
    {{-- {{ $clients->id }}
    {{ $clients->address }} --}}

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

        .ddown {
            border-radius: 55px;
            color: gray;
        }
    </style>

    <div class="d-flex justify-content-between">
        <h1 class="fw-bolder text-dark mb-3">List of Participants</h1>
        <div class="mb-3"><a href="{{ route('invite', $client->id) }}" class="btn btn-primary text-decoration-none ">Invite
            </a></div>
    </div>
    <div class="d-flex justify-content-end">
        <a href="#" class="btn btn-success text-decoration-none">Generate</a>
    </div>




    <select class="ddown p-1" name="fetchval" id="fetchval">
        <option value=" ">Select department:</option>
        @foreach ($department as $d)
            <option value={{ $d->department }}>{{ $d->department }}</option>
        @endforeach


    </select>

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
        <tbody id="myList3">
            @php
                $i = 1;
            @endphp
            @foreach ($participants as $participants)
                <tr>
                    @php
                        $dp = DB::table('departments')
                            ->where('id', $participants->department_id)
                            ->first();
                        $dp = $dp->department;
                        //dd($dp,$i);
                    @endphp
                    <td>{{ $i }}</td>
                    <td>{{ $participants->name }}</td>
                    <td>{{ $participants->email }}</td>
                    @php
                        $i++;
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

    <script type="text/javascript">
        $(document).ready(function() {
            $("#fetchval").on('change', function() {
                var val = $(this).val().toLowerCase();
                //console.log(val);
                //alert(val);
                $("#myList3 tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(val) > -1)
                });
            });
        });
    </script>

    <script src="https://code.jquery.com/jquery-3.6.1.min.js"
        integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
@endsection