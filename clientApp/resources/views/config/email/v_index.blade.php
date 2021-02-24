@extends('layout.v_template')
@section('title', 'List Config Email')
@push('custom-css')
<!-- DataTables -->
<link rel="stylesheet" href="{{asset('assets/')}}/plugins/datatables-bs4/css/dataTables.bootstrap4.css">
<!-- Dropdown-item -->
<link rel="stylesheet" href="{{asset('assets/')}}/dist/css/custom/dropdowncustom.css">

<link href="{{asset('assets/')}}/costume/tablecostume.css" rel="stylesheet">
<link href="{{asset('assets/')}}/costume/switchcostume.css" rel="stylesheet">
<!-- RadioButton -->
<link href="{{asset('assets/')}}/costume/radiobuttoncostume.css" rel="stylesheet">
  <!-- Select2 -->
  <link rel="stylesheet" href="{{asset('assets/')}}/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="{{asset('assets/')}}/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">

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
                <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#type-create">Create config Email</button>
                {{-- <a href="email_configuration/show">cek</a> --}}
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
                    {{-- <tbody>
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
                                    <button id="typeEdit" class="btn btn-primary btn-sm dropdown-hover"
                                    data-toggle="modal" data-target="#type-edit"
                                    data-id="{{$type->id}}"
                                    data-name="{{$type->name}}"
                                    data-display="{{$type->display}}"
                                    data-required="{{$type->required}}"
                                    onclick="editData(this)">
                                        <i class="nav-icon fas fa-pen"></i>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item">Edit</a>
                                        </div>
                                    </button>
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
                    </tbody> --}}
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
@include('config.email.modal.m_create')
{{-- @include('config.typecontract.modal.m_edit') --}}
@endsection
@push('custom-js')
<!-- DataTables -->
<script src="{{asset('assets/')}}/plugins/datatables/jquery.dataTables.js"></script>
<script src="{{asset('assets/')}}/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<!-- Select2 -->
<script src="{{asset('assets/')}}/plugins/select2/js/select2.full.min.js"></script>
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
    function editData(e) {
        var typeId = $(e).data("id");
        var name = $(e).data("name");
        var display = $(e).data("display");
        var required = $(e).data("required");
        if (e != 0) {
        document.getElementById("id").value = typeId;
        document.getElementById("name").value = name;
        document.getElementById("display").value = display;
        if (required == 1) {
            document.getElementById("customSwitch1").checked = true;
        } else {
            document.getElementById("customSwitch1").checked = false;
        }
    // alert(required);
    }else{
    alert("no");
    // console.log("")
    }
    }
    //button submit
    $('#myFormIdEdit').submit(function() {
        $("#myButtonID", this)
            .html("Please Wait...")
            .attr('disabled', 'disabled');
        return true;
    });
    //Create
    $('#myFormIdCreate').submit(function() {
        $("#myButtonIDCreate", this)
            .html("Please Wait...")
            .attr('disabled', 'disabled');
        return true;
    });
</script>
<script type="text/javascript">
    @if (count($errors) > 0)
        $('#type-create').modal('show');
    @endif
</script>
<script type="application/javascript">
    $('input[type="checkbox"]').on('customSwitch1', function (e, data) {
        var $element = $(data.el),
            value = data.value;
        $element.attr('value', value);
    });
    $('input[type="checkbox"]').on('customSwitch2', function (e, data) {
        var $element = $(data.el),
            value = data.value;
        $element.attr('value', value);
    });
</script>

<!-- Selected -->
<script>
$(document).on('change', 'input:radio', function () {
    if (this.value == 1) {
        // alert($(this).data("name"));
        document.getElementById("hourInput").style.display = "block";
        document.getElementById("dayInput").style.display = "none";
        document.getElementById("weekInput").style.display = "none";
        document.getElementById("monthInput").style.display = "none";
        document.getElementById("yearInput").style.display = "none";
    }else if(this.value == 2){
        document.getElementById("hourInput").style.display = "none";
        document.getElementById("dayInput").style.display = "block";
        document.getElementById("weekInput").style.display = "none";
        document.getElementById("monthInput").style.display = "none";
        document.getElementById("yearInput").style.display = "none";
    }else if(this.value == 3){
        document.getElementById("hourInput").style.display = "none";
        document.getElementById("dayInput").style.display = "none";
        document.getElementById("weekInput").style.display = "block";
        document.getElementById("monthInput").style.display = "none";
        document.getElementById("yearInput").style.display = "none";
    }else if(this.value == 4){
        document.getElementById("hourInput").style.display = "none";
        document.getElementById("dayInput").style.display = "none";
        document.getElementById("weekInput").style.display = "none";
        document.getElementById("monthInput").style.display = "block";
        document.getElementById("yearInput").style.display = "none";
    }else if(this.value == 5){
        document.getElementById("hourInput").style.display = "none";
        document.getElementById("dayInput").style.display = "none";
        document.getElementById("weekInput").style.display = "none";
        document.getElementById("monthInput").style.display = "none";
        document.getElementById("yearInput").style.display = "block";
    }else{
        document.getElementById("hourInput").style.display = "none";
        document.getElementById("dayInput").style.display = "none";
        document.getElementById("weekInput").style.display = "none";
        document.getElementById("monthInput").style.display = "none";
        document.getElementById("yearInput").style.display = "none";
    }
    });
    //hour
    $(function(){
    var $select = $(".hourNum");
    var n = ' Hour';
    for (i=1;i<=24;i++){
        $select.append($('<option></option>').val(i).html(i+n))
    }
    });
    //day
    $(function(){
    var $select = $(".dayNum");
    var n = ' Day';
    for (i=1;i<=31;i++){
        $select.append($('<option></option>').val(i).html(i+n))
    }
    });
    //week
    $(function(){
    var $select = $(".weekNum");
    var n = ' Week';
    for (i=1;i<=4;i++){
        $select.append($('<option></option>').val(i).html(i+n))
    }
    });
    //month
    $(function(){
    var $select = $(".monthNum");
    var n = ' Month';
    for (i=1;i<=12;i++){
        $select.append($('<option></option>').val(i).html(i+n))
    }
    });
    //year
    $(function(){
    var $select = $(".yearNum");
    var n = ' Year';
    for (i=1;i<=5;i++){
        $select.append($('<option></option>').val(i).html(i+n))
    }
    });

    //Multiple Select
    $(".select2bs4").select2({
    tags: true,
    multiple: true,
    });
    $.ajax({
        type: "GET",
        url: "email_configuration/show",
        cache: "false",
        dataType: "json",
        success: function(data) {
        //   console.log(data.data[0]['email']);
            // Get select
            var select = document.getElementById('select2bs4');
            // Add options
            for (var i in data.data) {
                $(select).append('<option value=' + data.data[i]['email'] + '>' + data.data[i]['email'] + '</option>');
            }
        // Set selected value
        // $(select).val(data[1]);
    }
    });
</script>


@endpush
