@extends('admin_template')
@section('content')


{{ $clients->id }}
{{ $clients->address }}
<div class="card" id="TableSorterCard">
    <div class="card-header py-3">
        <div class="row table-topper align-items-center">
            <div class="col"><button class="btn btn-primary btn-sm reset" type="button" style="margin: 2px;">Generate Report</button></div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="table-responsive">
                <table class="table table-striped table tablesorter" id="ipi-table">
                    <thead class="thead-dark">
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">Participants</th>
                            <th class="text-center">Department</th>
                            <th class="text-center">Status</th>
                            <th class="text-center filter-false sorter-false">Action</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        <tr>
                            <td>1</td>
                            <td>Kamarul bin Zaman</td>
                            <td>Buissness</td>
                            <td>Amswer</td>
                            <td class="text-center align-middle" style="max-height: 60px;height: 60px;"><a class="btn btnMaterial btn-flat primary semicircle" role="button" href="#"><i class="far fa-eye"></i></a><a class="btn btnMaterial btn-flat success semicircle" role="button" href="#"><i class="fas fa-pen"></i></a><a class="btn btnMaterial btn-flat accent btnNoBorders checkboxHover" role="button" style="margin-left: 5px;" data-bs-toggle="modal" data-bs-target="#delete-modal" href="#"><i class="fas fa-trash btnNoBorders" style="color: #DC3545;"></i></a></td>
                        </tr>
                        <tr>
                            <td>2<br></td>
                            <td>Zairuddin</td>
                            <td>IT</td>
                            <td>Not</td>
                            <td class="text-center align-middle" style="max-height: 60px;height: 60px;"><a class="btn btnMaterial btn-flat primary semicircle" role="button" href="#"><i class="far fa-eye"></i></a><a class="btn btnMaterial btn-flat success semicircle" role="button" href="#"><i class="fas fa-pen"></i></a><a class="btn btnMaterial btn-flat accent btnNoBorders checkboxHover" role="button" style="margin-left: 5px;" data-bs-toggle="modal" data-bs-target="#delete-modal" href="#"><i class="fas fa-trash btnNoBorders" style="color: #DC3545;"></i></a></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
