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
        i.cursor{
        cursor: pointer;
        }
    </style>
    <h1 class="fw-bolder text-dark mb-3">List of Clients</h1>
    <!-- Button trigger modal -->
<button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
    Add new Clients
  </button>
  
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add New Clients</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            @if ($errors->any())
            <script>
                swal.fire({
                        icon: "error",
                        title: "Please try again",
                        text: "Failed to add clients",
                        });
            </script>
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form method="post" action="{{ route('Cstore') }}">
                @csrf
                <div class="mb-3"><input class="form-control" type="text" id="name-2" name="client" placeholder="Name"></div>
                <div class="mb-3"><input class="form-control" type="email" id="email-2" name="email" placeholder="Email"></div>
                <div class="mb-3"><input class="form-control" type="text" id="address-1" name="address" placeholder="Address"></div>
                <input type="hidden" name="link_code" value="{{ $code }}">
                <input type="hidden" name="is_delete" value=0>
                <div class="mb-3"></div>
                <input type="hidden" value="{{ date('Y-m-d') }}" name="created_at">

            
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button class="btn btn-primary" type="submit">Submit</button>
        </form>
        </div>
      </div>
    </div>
  </div>



<!-- Modal -->


  
  
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
            @php
                $i=0;
            @endphp
            @foreach ($clients as $clients)
            @php
                $i++;
            @endphp
                <tr>
                    <td>{{ $i }}</td>
                    <td>{{ $clients->client }}</td>
                    <td>{{ $clients->address }}</td>
                    <td>
                        {{-- <div class="row">
                            <div class="col"><a href="{{route('Cdetails',$clients->id)}}"><i
                                class="far fa-eye igreen"></i></a></div>
                            <div class="col"><a href="{{ route('Cupdate',$clients->id)}}"><i
                                        class="fas fa-pencil-alt igreen"></i></a></div>
                            
                            <div class="col"><a href="{{route('Cdelete',$clients->id)}}"><i
                                        class="fas fa-trash-alt igreen"></i></a></div>
                        </div> --}}

                        <div class="row">
                            <div class="col"><a href="{{route('Cdetails',$clients->id)}}"><i
                                class="far fa-eye igreen"></i></a></div>
                            <div class="col pe-auto" data-bs-toggle="modal" data-bs-target="#updatemodel{{$i}}"><i
                                        class="fas fa-pencil-alt igreen cursor"></i></div>
                            
                            <div class="col"><a href="{{route('Cdelete',$clients->id)}}"><i
                                        class="fas fa-trash-alt igreen"></i></a></div>
                        </div>

                    </td>
                    <div class="modal fade" id="updatemodel{{$i}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Update Clients</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                            <form method="post" action="/admin/clients/change/{{ $clients->id }}">
                                                @csrf
                                                <div class="mb-3"><input class="form-control" type="text" id="name-2" name="client" placeholder="Name" value="{{ $clients->client }}"></div>
                                                <div class="mb-3"><input class="form-control" type="email" id="email-2" name="email" placeholder="Email" value="{{ $clients->email }}"></div>
                                                <div class="mb-3"><input class="form-control" type="text" id="address-1" name="address" placeholder="Address" value="{{ $clients->address }}"></div>
                                                <div class="mb-3"></div>
                                                
                                            
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                              <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                        </form>
                          </div>
                        </div>
                      </div>
            @endforeach
        </tbody>
    </table>
@endsection
