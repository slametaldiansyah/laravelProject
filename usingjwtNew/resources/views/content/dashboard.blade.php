@extends('layouts.master')
@push('below-css')
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>Dashboard</title>
<link  href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>



@endpush
@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-6">
      <div class="container-fluid">
        <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">User Data</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">



   {{-- <div class="row">
    <div class="form-group col-md-6">
    <h5>Start Date <span class="text-danger"></span></h5>
    <div class="controls">
        <input type="date" name="start_date" id="start_date" class="form-control datepicker-autoclose" placeholder="Please select start date"> <div class="help-block"></div></div>
    </div>
    <div class="form-group col-md-6">
    <h5>End Date <span class="text-danger"></span></h5>
    <div class="controls">
        <input type="date" name="end_date" id="end_date" class="form-control datepicker-autoclose" placeholder="Please select end date"> <div class="help-block"></div></div>
    </div>
    <div class="text-left" style="
    margin-left: 15px;
    ">
    <button type="text" id="btnFiterSubmitSearch" class="btn btn-info">Submit</button>
    </div>
    </div> --}}
    <table class="table table-striped" id="user_datatable">
       <thead>
          <tr>
             <th>Id</th>
             <th>Name</th>
             <th>Created at</th>
          </tr>
       </thead>
    </table>


            </div>
            <!-- /.card-body -->
          </div>
      </div><!-- /.container-fluid -->
            </div>



{{-- div dua --}}
<div class="col-6">
    <div class="container-fluid">
      <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Position</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">

  <table class="table table-striped" id="position_datatable">
     <thead>
        <tr>
           <th>Id</th>
           <th>Name</th>
        </tr>
     </thead>
  </table>


          </div>
          <!-- /.card-body -->
        </div>
    </div><!-- /.container-fluid -->
          </div>

    </div>

    <div class="row">
        <div class="col-12">
            <div class="container-fluid">
              <div class="card card-primary">
                  <div class="card-header">
                    <h3 class="card-title">Detail User</h3>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                        <table class="table table-striped" id="detailuser_datatable">
                            <thead>
                             <tr>
                                <th>Fullname</th>
                                <th>Name</th>
                                <th>Birth</th>
                                <th>Join</th>
                                <th>NIK</th>
                                <th>NPWP</th>
                                <th>Email</th>
                             </tr>
                            </thead>
                        </table>
                  </div>
                  <!-- /.card-body -->
              </div>
            </div><!-- /.container-fluid -->
        </div>
    </div>

    </section>
    <!-- /.content -->
  </div>


@endsection
@push('below-scripts')
<script>
    $(document).ready( function () {
        $.ajaxSetup({
             headers: {
                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
             }
         });
     $('#user_datatable').DataTable({
            language: {searchPlaceholder: "Search records", search: "",},
            processing: true,
            serverSide: true,
            ajax: {
             url: "{{ url('users-list') }}",
             type: 'GET',
            //  data: function (d) {
            //  d.start_date = $('#start_date').val();
            //  d.end_date = $('#end_date').val();
            //  }
            },
            columns: [
                     { data: 'id', name: 'id' },
                     { data: 'username', name: 'username' },
                    //  { data: 'email', name: 'email' },
                     { data: 'created_at', name: 'created_at' }
                  ]
         });
      });

//position
      $(document).ready( function () {
        $.ajaxSetup({
             headers: {
                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
             }
         });
     $('#position_datatable').DataTable({

            language: {searchPlaceholder: "Search records",search: "",},
            processing: true,
            serverSide: true,
            ajax: {
             url: "{{ url('position-list') }}",
             type: 'GET',
                  },
                    columns: [{ data: 'id', name: 'id' },
                              { data: 'name', name: 'name' }]
         });
      });

//Detail_user
$(document).ready( function () {
        $.ajaxSetup({
             headers: {
                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
             }
         });
     $('#detailuser_datatable').DataTable({

            language: {searchPlaceholder: "Search records",search: "",},
            processing: true,
            serverSide: true,
            ajax: {
             url: "{{ url('detailuser-list') }}",
             type: 'GET',
                  },
                    columns: [{ data: 'fullname', name: 'fullname' },
                              { data: 'name', name: 'name' },
                              { data: 'birth_date', name: 'birth_date' },
                              { data: 'join_date', name: 'join_date' },
                              { data: 'NIK', name: 'NIK' },
                              { data: 'NPWP', name: 'NPWP' },
                              { data: 'email', name: 'email' },]
         });
      });
   </script>
@endpush
