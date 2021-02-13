@extends('layout.v_template')
@section('title', 'List Config Type')
@push('custom-css')
<!-- DataTables -->
<link rel="stylesheet" href="{{asset('assets/')}}/plugins/datatables-bs4/css/dataTables.bootstrap4.css">
<!-- Dropdown-item -->
<link rel="stylesheet" href="{{asset('assets/')}}/dist/css/custom/dropdowncustom.css">

<!-- Bootstrap Switch -->
{{-- <script src="{{asset('assets/')}}/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script> --}}

<link href="{{asset('assets/')}}/costume/tablecostume.css" rel="stylesheet">
<style type="text/css">
/* for lg */

/* for sm */

.custom-switch.custom-switch-sm .custom-control-label {
    padding-left: 1rem;
    padding-bottom: 1rem;
}

.custom-switch.custom-switch-sm .custom-control-label::before {
    height: 1rem;
    width: calc(1rem + 0.75rem);
    border-radius: 2rem;
}

.custom-switch.custom-switch-sm .custom-control-label::after {
    width: calc(1rem - 4px);
    height: calc(1rem - 4px);
    border-radius: calc(1rem - (1rem / 2));
}

.custom-switch.custom-switch-sm .custom-control-input:checked ~ .custom-control-label::after {
    transform: translateX(calc(1rem - 0.25rem));
}

/* for md */

.custom-switch.custom-switch-md .custom-control-label {
    padding-left: 2rem;
    padding-bottom: 1.5rem;
}

.custom-switch.custom-switch-md .custom-control-label::before {
    height: 1.5rem;
    width: calc(2rem + 0.75rem);
    border-radius: 3rem;
}

.custom-switch.custom-switch-md .custom-control-label::after {
    width: calc(1.5rem - 4px);
    height: calc(1.5rem - 4px);
    border-radius: calc(2rem - (1.5rem / 2));
}

.custom-switch.custom-switch-md .custom-control-input:checked ~ .custom-control-label::after {
    transform: translateX(calc(1.5rem - 0.25rem));
}

/* for lg */

.custom-switch.custom-switch-lg .custom-control-label {
    padding-left: 3rem;
    padding-bottom: 2rem;
}

.custom-switch.custom-switch-lg .custom-control-label::before {
    height: 2rem;
    width: calc(3rem + 0.75rem);
    border-radius: 4rem;
}

.custom-switch.custom-switch-lg .custom-control-label::after {
    width: calc(2rem - 4px);
    height: calc(2rem - 4px);
    border-radius: calc(3rem - (2rem / 2));
}

.custom-switch.custom-switch-lg .custom-control-input:checked ~ .custom-control-label::after {
    transform: translateX(calc(2rem - 0.25rem));
}

/* for xl */

.custom-switch.custom-switch-xl .custom-control-label {
    padding-left: 4rem;
    padding-bottom: 2.5rem;
}

.custom-switch.custom-switch-xl .custom-control-label::before {
    height: 2.5rem;
    width: calc(4rem + 0.75rem);
    border-radius: 5rem;
}

.custom-switch.custom-switch-xl .custom-control-label::after {
    width: calc(2.5rem - 4px);
    height: calc(2.5rem - 4px);
    border-radius: calc(4rem - (2.5rem / 2));
}

.custom-switch.custom-switch-xl .custom-control-input:checked ~ .custom-control-label::after {
    transform: translateX(calc(2.5rem - 0.25rem));
}


</style>
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
                <a href="/progress_status/create" class="btn btn-primary">Create config type</a>
            </div>
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th width="30px">No</th>
                            <th class="text-center">Name</th>
                            <th class="text-center">display</th>
                            <th class="text-center">Required</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($types as $type)
                        <tr>
                            <th class="text-center" width="30px">{{$loop->iteration}}</th>
                            <td class="text-center">{{$type->name}}</td>
                            <td class="text-center">{{$type->display}}</td>
                            <td class="text-center">
                                @if ($type->required == 1)
                                <i class="nav-icon fas fa-check text-success"></i>
                                @else
                                <i class="nav-icon fas fa-times text-red"></i>
                                @endif
                            </td>
                            <td class="text-center">
                                <div class="btn-group">
                                    <button id="typeEdit" class="btn btn-primary btn-sm dropdown-hover" data-toggle="modal" data-target="#type-edit">
                                        <i class="nav-icon fas fa-pen"></i>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item">Edit</a>
                                        </div>
                                    </button>
                                    {{-- <form action="/types/{{$type->id}}/edit"
                                        method="get"
                                        class="d-inline">

                                    </form> --}}
                                </div>
                                <div class="btn-group">
                                    <form action="/types/{{$type->id}}"
                                        onsubmit="return confirm('Are you sure you want to delete?')" method="post"
                                        class="d-inline">
                                        @method('delete')
                                        @csrf
                                        <button type="submit" class="btn btn-danger btn-sm dropdown-hover">
                                            <i class="nav-icon fas fa-trash"></i>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item">Delete</a>
                                            </div>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th width="30px">No</th>
                            <th class="text-center">Name</th>
                            <th class="text-center">display</th>
                            <th class="text-center">Required</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
@include('config.typecontract.modal.m_edit')
@endsection
@push('custom-js')
<!-- DataTables -->
<script src="{{asset('assets/')}}/plugins/datatables/jquery.dataTables.js"></script>
<script src="{{asset('assets/')}}/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
@endpush
@push('custom-script')

<script>
    $(function() {
        $("#example1").DataTable({
            // processing: true,
            // serverSide: true,
            language: {
                searchPlaceholder: "Search",
                search : '<i class="fas fa-search"></i>',
                'paginate': {
                    'previous': '<a>Back <i class="fas fa-hand-point-left"></i></a>',
                    'next': '<a><i class="fas fa-hand-point-right"></i> Next</a>',
                    }}
        });
    });
    </script>
@endpush
