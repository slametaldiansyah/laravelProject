@extends('layouts.master')

@push('below-css')
<link href="{{asset('assets/')}}/costume/chartcostume.css" rel="stylesheet">
@endpush


@section('content')

    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"> <strong> Dashboard </strong></h1>
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


    <!-- Info Box -->
    {{-- <div class="card card-outline card-dark">
        <div class="card-header">
            <h3 class="card-title"><strong> Info Box </strong></h3>
        </div>
        <br>
                            <!-- get count data -->
                            @php
                            $countuser = DB::table('users')->count();
                            $countposition = DB::table('position')->count();
                            $countdetailuser = DB::table('detail_user')->count();
                            @endphp
        <div class="row">
            <div class="col-4">
                <div class="container-fluid">
                    <div class="small-box bg-gradient-success">
                        <div class="inner">
                          <h3>{{ $countuser }}</h3>
                          <p>Users</p>
                        </div>
                        <div class="icon">
                          <i class="fas fa-users"></i>
                        </div>
                        <a href="#" class="small-box-footer">
                            Table info <i class="fas fa-arrow-circle-right"></i>
                        </a>
                      </div>
                </div>
            </div>
            <div class="col-4">
                <div class="container-fluid">
                    <div class="small-box bg-gradient-primary">
                        <div class="inner">
                          <h3>{{ $countposition }}</h3>
                          <p>Position</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-door-open"></i>
                        </div>
                        <a href="#" class="small-box-footer">
                          Table info <i class="fas fa-arrow-circle-right"></i>
                        </a>
                      </div>
                </div>
            </div>
            <div class="col-4">
                <div class="container-fluid">
                    <div class="small-box bg-gradient-secondary">
                        <div class="inner">
                          <h3>{{ $countdetailuser }}</h3>
                          <p>Detail Users</p>
                        </div>
                        <div class="icon">
                          <i class="fas fa-user"></i>
                        </div>
                        <a href="#" class="small-box-footer">
                            Table info <i class="fas fa-arrow-circle-right"></i>
                        </a>
                      </div>
                </div>
            </div>
        </div>
    </div> --}}

    @php
    $countuser = DB::table('users')->count();
    $countposition = DB::table('position')->count();
    $countdetailuser = DB::table('detail_user')->count();

    @endphp
    <div class="container-fluid">
    <div class="card card-outline card-dark">
        <div class="card-header">
            <h3 class="card-title"><strong> Info Box </strong></h3>
        </div>
    <div class="row">
        <div class="col-12 col-sm-6 col-md-6">
          <div class="info-box">
            <span class="info-box-icon bg-gradient-info elevation-1"><i class="fas fa-user"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Users</span>
              <span class="info-box-number">
                {{$countuser}}
              </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        {{-- <div class="col-12 col-sm-6 col-md-4">
          <div class="info-box mb-3">
            <span class="info-box-icon bg-gradient-danger elevation-1"><i class="fas fa-door-open"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Position</span>
              <span class="info-box-number">{{$countposition}}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div> --}}
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix hidden-md-up"></div>

        <div class="col-12 col-sm-6 col-md-6">
          <div class="info-box mb-3">
            <span class="info-box-icon bg-gradient-success elevation-1"><i class="fas fa-users"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Detail User</span>
              <span class="info-box-number">{{$countdetailuser}}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>

        <!-- /.col -->
      </div>
    </div>


    <!-- Chart -->

    <div class="card card-outline card-dark">
        <div class="card-header">
            <h3 class="card-title"><strong> Chart </strong></h3>
        </div>
    <div class="row">
        <div class="col-6">
          <div class="info-box">
                <div id="container" style="width: 401px; height: 200px; margin: 0 auto"></div>
          </div>
        </div>
        <div class="col-6">
            <div class="info-box">
                  <div id="container2" style="width: 401px; height: 200px; margin: 0 auto"></div>
            </div>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-12">
          <div class="info-box">
                <div id="container3" style="width: 601px; height: 300px; margin: 0 auto"></div>
          </div>
        </div>
        {{-- <div class="col-6">
            <div class="info-box">
                  <div id="container2" style="width: 401px; height: 200px; margin: 0 auto"></div>
            </div>
        </div> --}}
    </div>


        <!-- fix for small devices only -->
        <div class="clearfix hidden-md-up"></div>

      {{-- </div> --}}
    </div>
</div>

<!-- Chart -->

    </section>


@endsection
@push('below-scripts')
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>

@include('content.ajaxdashboard.chartrole')
@include('content.ajaxdashboard.chartapplication')
@include('content.ajaxdashboard.chartposition')
@endpush
