@extends('layout.v_template')
@section('title', 'Payment Lists')
@push('custom-css')
<!-- DataTables -->
<link rel="stylesheet" href="{{asset('assets/')}}/plugins/datatables-bs4/css/dataTables.bootstrap4.css">
<!-- Dropdown-item -->
<link rel="stylesheet" href="{{asset('assets/')}}/dist/css/custom/dropdowncustom.css">
<!-- Tempusdominus Bootstrap 4 -->
<link rel="stylesheet"
    href="{{asset('assets/')}}/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">

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
        {{-- @if (session('status'))
        <script>
        $( document ).ready(
            swal("{{ session('status') }}")
        });
        </script>
        @endif --}}
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
                            @if ($invoice->actualPay != null)
                                <td class="text-left">@rupiah($invoice->amount_total - $invoice->actualPay)</td>
                            @else
                                <td class="text-left">@rupiah($invoice->amount_total)</td>
                            @endif
                            <td class="text-center">
                                <div class="btn-group">
                                    <button type="button" id="paymentCreate"
                                    data-invoice_id="{{$invoice->id}}"
                                    data-project_name="{{$invoice->project->name}}"
                                    data-project_no_po="{{$invoice->project->no_po}}"
                                    data-client="{{$invoice->project->contract->client->name}}"
                                    data-progress_name="{{$invoice->progress_item->name_progress}}"
                                    data-amount="@rupiah($invoice->amount_total)"
                                     class="btn btn-secondary dropdown-hover" data-toggle="modal" data-target="#payment-create"
                                    onclick="createData(this)">
                                            <i class="nav-icon fas fa-credit-card"></i>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item">Payment</a>
                                            </div>
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
<!-- InputMask -->
<script src="{{asset('assets/')}}/plugins/moment/moment.min.js"></script>
<script src="{{asset('assets/')}}/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<script src="{{asset('assets/')}}/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- bs-custom-file-input -->
<script src="{{asset('assets/')}}/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>

@endpush
@push('custom-script')
<script>
$(function() {
    $("#example1").DataTable();
});
</script>
<script>
    $('#myFormIdCreate').submit(function() {
        $("#myButtonID", this)
            .html("Please Wait...")
            .attr('disabled', 'disabled');
        return true;
    });
</script>
<script type="text/javascript">
    @if (count($errors) > 0)
        $('#payment-create').modal('show');
    @endif
    </script>
<script type="text/javascript">
    $(document).ready(function () {
      bsCustomFileInput.init();
    });
</script>
<script>
   function createData(e) {
    var invoiceId = $(e).data("invoice_id");
    var projectName = $(e).data("project_name");
    var projectNoPo = $(e).data("project_no_po");
    var client = $(e).data("client");
    var progressName = $(e).data("progress_name");
    var amount = $(e).data("amount");
    if (e != 0) {
        document.getElementById("invoice_id").value = invoiceId;
        document.getElementById("po_name").value = projectName;
        document.getElementById("no_po").value = projectNoPo;
        document.getElementById("client").value = client;
        document.getElementById("progress_name").value = progressName;
        document.getElementById("amountInvoice").value = amount;
    // alert(projectName);
    }else{
    alert("no");
    // console.log("")
    }
   }
</script>
<script>
    $(function() {
        $('#payment_date').datetimepicker({
            // useCurrent: false,
            //disabled: true,
            format: 'YYYY-MM-DD',
        });
    });
</script>
<!-- Rupiah -->
<script type="text/javascript">
    var rupiah = document.getElementById('rupiah');
    rupiah.addEventListener('keyup', function(e){
        rupiah.value = formatRupiah(this.value, 'Rp. ');
    });
    function formatRupiah(angka, prefix){
        var number_string = angka.replace(/[^,\d]/g, '').toString(),
        split   		= number_string.split(','),
        sisa     		= split[0].length % 3,
        rupiah     		= split[0].substr(0, sisa),
        ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);
        if(ribuan){
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }
        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
    }
</script>
{{-- <script>
    function myFunction() {
        var x = document.getElementById("contra").value;
        var op = document.getElementById("contra");
        var name = op.options[op.selectedIndex].getAttribute('data-name');
        var cont_num = op.options[op.selectedIndex].getAttribute('data-cont_num');
        var client_id = op.options[op.selectedIndex].getAttribute('data-client_id');
        var volume = op.options[op.selectedIndex].getAttribute('data-volume');
        var unit = op.options[op.selectedIndex].getAttribute('data-unit');
        var price = op.options[op.selectedIndex].getAttribute('data-price');
        var sign_date = op.options[op.selectedIndex].getAttribute('data-sign_date');
        var start_date = op.options[op.selectedIndex].getAttribute('data-start_date');
        var end_date = op.options[op.selectedIndex].getAttribute('data-end_date');
        var type_id = op.options[op.selectedIndex].getAttribute('data-type_id');
        var type_display = op.options[op.selectedIndex].getAttribute('data-type_display');
        console.log(op.options[op.selectedIndex].getAttribute('data-type_display'))
        if (x != 0) {
            document.getElementById("nocontract").style.display = "none";
            document.getElementById("Iscontract").style.display = "block";
            document.getElementById("name_contract").value = name;
            document.getElementById('client_id').value = client_id;
            document.getElementById("cont_num").value = cont_num;
            document.getElementById("sign_date").value = sign_date;
            document.getElementById("volume").value = volume;
            document.getElementById("unit").value = unit;
            document.getElementById("price_contract").value = price;
            document.getElementById("start_date").value = start_date;
            document.getElementById("end_date").value = end_date;
            document.getElementById('type_id').value = type_id;
            document.getElementById("IsVolumeUnit").style.display = type_display;
            if (type_display == "block") {
                document.getElementById("hiddvolume").style.visibility = "visible";
            }else{
                document.getElementById("hiddvolume").style.visibility = "hidden";
            }
        } else {
            document.getElementById("nocontract").style.display = "block";
            document.getElementById("Iscontract").style.display = "none";
            document.getElementById("volume_use").value = "";
            document.getElementById("hiddvolume").style.visibility = "hidden";
        }
    }
    myFunction();
    </script> --}}
@endpush
