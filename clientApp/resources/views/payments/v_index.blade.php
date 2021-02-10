@extends('layout.v_template')
@section('title', 'Payment Lists')
@push('custom-css')
<!-- DataTables -->
<link rel="stylesheet" href="{{asset('assets/')}}/plugins/datatables-bs4/css/dataTables.bootstrap4.css">
<!-- Dropdown-item -->
<link rel="stylesheet" href="{{asset('assets/')}}/dist/css/custom/dropdowncustom.css">

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
            {{-- <div class="card-header text-right">
                <a href="/progress_status/create" class="btn btn-primary">Create Project</a>
            </div> --}}
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th width="30px">No</th>
                            <th class="text-center">PO Name</th>
                            <th class="text-center">PO Number</th>
                            <th class="text-center">Client</th>
                            <th class="text-center">Progress</th>
                            <th class="text-center">Amount</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($invoiceList as $invoice)
                        <tr>
                            <th class="text-center" width="30px">{{$loop->iteration}}</th>
                            <td class="text-left">{{$invoice->project->name}}</td>
                            <td class="text-right">{{$invoice->project->no_po}}</td>
                            <td class="text-left">{{$invoice->project->contract->client->name}}</td>
                            <td class="text-left">{{$invoice->progress_item->name_progress}}</td>
                            <td class="text-left">@rupiah($invoice->amount_total)</td>
                            <td class="text-center">
                                <div class="btn-group">
                                    {{-- <form action="/progress_status/{{$invoice->id}}"
                                        method="get"
                                        class="d-inline">
                                            <button class="btn btn-secondary dropdown-hover">
                                                <i class="nav-icon fas fa-credit-card"></i>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item">Payment</a>
                                                </div>
                                            </button>
                                    </form> --}}
                                    <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-xl">
                                        Pay
                                      </button>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th width="30px">No</th>
                            <th class="text-center">PO Name</th>
                            <th class="text-center">PO Number</th>
                            <th class="text-center">Client</th>
                            <th class="text-center">Progress Item</th>
                            <th class="text-center">Amount</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
@include('payments.modals.m_create')
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
