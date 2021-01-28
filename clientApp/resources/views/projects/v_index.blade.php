@extends('layout.v_template')
@section('title', 'List Project')
@push('custom-css')
<!-- DataTables -->
<link rel="stylesheet" href="{{asset('assets/')}}/plugins/datatables-bs4/css/dataTables.bootstrap4.css">
@endpush
@section('content')
<div class="container">
    <div class="col-md">
        <!-- general form elements -->
        @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
        @endif
        <div class="card">
            <div class="card-header text-right">
                <a href="/projects/create" class="btn btn-primary">Create Project</a>
            </div>
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>No. Contract</th>
                            <th>Project Name</th>
                            <th>PO. Number</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($projects as $project)
                        <tr>
                            <th class="text-center">{{$loop->iteration}}</th>
                            <td>{{$project->contract_id}}</td>
                            <td>{{$project->name}}</td>
                            <td>{{$project->no_po}}</td>
                            <td class="text-center">
                                <a href="/projects/{{$project->id}}" class="btn btn-warning">
                                    <i class="nav-icon fas fa-eye"></i>
                                </a>
                                <a href="/projects/{{$project->id}}/edit" class="btn btn-primary">
                                    <i class="nav-icon fas fa-pen"></i>
                                </a>
                                <a href="/projects/{{$project->id}}/ammend" class="btn btn-success">
                                    <i class="nav-icon fas fa-clone"></i>
                                </a>
                                <form action="/projects/{{$project->id}}"
                                    onsubmit="return confirm('Are you sure you want to delete?')" method="post"
                                    class=" d-inline">
                                    @method('delete')
                                    @csrf
                                    <button type="submit" class="btn btn-danger">
                                        <i class="nav-icon fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>No. Contract</th>
                            <th>Project Name</th>
                            <th>PO. Number</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
@push('custom-js')
<!-- DataTables -->
<script src="{{asset('assets/')}}/plugins/datatables/jquery.dataTables.js"></script>
<script src="{{asset('assets/')}}/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
@endpush
@push('custom-script')
<script>
$(function() {
    $("#example1").DataTable();
});
</script>
@endpush