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
            <h1>MANAGEMENT</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item">Home</li>
              <li class="breadcrumb-item">MANAGEMENT</li>
              <li class="breadcrumb-item active"><a href="#">Detail-Users</a></li>
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
                <h3 class="card-title">DETAIL USERS</h3>
              </div>
              <!-- /.card-header -->
            <div class="card-body">
            {{-- <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4"> --}}

                    <div class="row">
                        <div class="col-sm-12">
                            <table id="aldiTable" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Fullname</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>BirthDay</th>
                                        <th>Join</th>
                                        <th>Position</th>
                                        <th>NIK</th>
                                        <th>NPWP</th>
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
              url: "{{ url('detail-user-list') }}",
              type: 'GET',
              },
            columns: [
                    {data: 'id', name: 'id'},
                    {data: 'fullname', name: 'fullname'},
                    {data: 'name', name: 'name'},
                    {data: 'email', name: 'email'},
                    {data: 'birth_date', name: 'birth'},
                    {data: 'join_date', name: 'join'},
                    {data: 'position_id', name: 'position'},
                    {data: 'NIK', name: 'NIK'},
                    {data: 'NPWP', name: 'NPWP'},
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
