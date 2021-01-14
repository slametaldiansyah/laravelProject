@extends('layouts.master')

@push('below-css')
<link href="{{asset('assets/')}}/costume/tablecostume.css" rel="stylesheet">
@endpush

@section('content')

{{-- <div class="content-wrapper" style="min-height: 1360.44px;"> --}}
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>APPLICATION ACCESS</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item">Home</li>
              <li class="breadcrumb-item">APPLICATION ACCESS</li>
              <li class="breadcrumb-item active"><a href="#">Auth Role</a></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">

            <!-- /.card -->

            <div class="card">
              <div class="card-header bg-gradient-primary">
                <h3 class="card-title">AUTH ROLE</h3>
              </div>
              <!-- /.card-header -->
            <div class="card-body">
            {{-- <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4"> --}}

                    <div class="row">
                        <div class="col-sm-12">
                            <table id="aldiTable" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        {{-- <th>ID</th> --}}
                                        <th>Username</th>
                                        <th>Role</th>
                                        <th>Application</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                <!-- /.card -->
          {{-- </div> --}}
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  {{-- </div> --}}


@endsection

@push('below-scripts')
<script>
    $(document).ready( function () {
        $.ajaxSetup({
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
          });
        $('#aldiTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
              url: "{{ url('authrole-list') }}",
              type: 'GET',
              },
            columns: [
                    {data: 'username', name: 'username'},
                    {data: 'rolename', name: 'rolename'},
                    {data: 'applicationname', name: 'applicationname'},
                    ],
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
