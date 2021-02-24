<!-- Extra large modal -->
<div class="modal fade" id="type-create">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
            <form id="myFormIdCreate" role="form" action="/types" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                <h4 class="modal-title">Create Email Configuration</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body" style="background-color: rgb(241, 240, 240)">
                    <div class="row">
                        <!-- /.col (left) -->
                        <div class="col-md-12">
                                <div class="card card-primary">
                                    <div class="card-header">
                                    <h3 class="card-title">Create</h3>
                                    </div>
                                    {{-- <form id="myFormId" role="form" action="/types" method="post"> --}}
                                    <div class="card-body">
                                    <!-- Date range -->
                                    {{-- <div class="card-body">
                                        <input type="checkbox" name="my-checkbox">
                                    </div> --}}


                                <div class="row">
                                    <div class="col-6">
                                        <div id="form-wrapper" class="form-group mb-4">
                                            {{-- <form id="myform"> --}}
                                                <label class="mr-3 ml-2">Frequency :</label>
                                                <div id="debt-amount-slider">
                                                    <input type="radio" name="debt-amount" data-name="hour" id="1" value="1" required>
                                                    <label for="1" data-debt-amount="Hour"></label>
                                                    <input type="radio" name="debt-amount" data-name="day" id="2" value="2" required>
                                                    <label for="2" data-debt-amount="Day"></label>
                                                    <input type="radio" name="debt-amount" data-name="week" id="3" value="3" required>
                                                    <label for="3" data-debt-amount="Week"></label>
                                                    <input type="radio" name="debt-amount" data-name="month" id="4" value="4" required>
                                                    <label for="4" data-debt-amount="Month"></label>
                                                    <input type="radio" name="debt-amount" data-name="year" id="5" value="5" required>
                                                    <label for="5" data-debt-amount="Year"></label>
                                                    <div id="debt-amount-pos"></div>
                                                </div>
                                            {{-- </form> --}}
                                        </div>
                                        <br>

                                        {{-- Hour --}}
                                        <div class="row" id="hourInput" style="display:none;">
                                            <div class="col-3">
                                                     <label class="mr-3 ml-2">Hour :</label>
                                            </div>
                                        <div class="col-8">
                                            <select id="hour" name="hourSelect" class="form-control ml-4 select2 hourNum" style="width: 50%;">
                                            </select>
                                        </div>
                                        </div>
                                        {{-- Day --}}
                                        <div class="row" id="dayInput" style="display:none;">
                                                <div class="col-3">
                                                         <label class="mr-3 ml-2">Day :</label>
                                                </div>
                                            <div class="col-8">
                                                <select id="day" name="daySelect" class="form-control ml-4 select2 dayNum" style="width: 50%;">
                                                </select>
                                            </div>
                                        </div>
                                        {{-- Week --}}
                                        <div class="row" id="weekInput" style="display:none;">
                                            <div class="col-3">
                                                     <label class="mr-3 ml-2">Week :</label>
                                            </div>
                                        <div class="col-8">
                                            <select id="week" name="weekSelect" class="form-control ml-4 select2 weekNum" style="width: 50%;">
                                            </select>
                                        </div>
                                        </div>
                                        {{-- Month --}}
                                        <div class="row" id="monthInput" style="display:none;">
                                            <div class="col-3">
                                                     <label class="mr-3 ml-2">Month :</label>
                                            </div>
                                        <div class="col-8">
                                            <select id="month" name="monthSelect" class="form-control ml-4 select2 monthNum" style="width: 50%;">
                                            </select>
                                        </div>
                                        </div>
                                        {{-- Year --}}
                                        <div class="row" id="yearInput" style="display:none;">
                                            <div class="col-3">
                                                     <label class="mr-3 ml-2">Year :</label>
                                            </div>
                                        <div class="col-8">
                                            <select id="year" name="yearSelect" class="form-control ml-4 select2 yearNum" style="width: 50%;">
                                            </select>
                                        </div>
                                        </div>

                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>Multiple</label>
                                            <select id="select2bs4" class="select2bs4" multiple="multiple" data-placeholder="Select Email"
                                                    style="width: 100%;">
                                                {{-- @foreach ($types as $type)
                                                    <option value="{{$type->id}}">{{$type->id}}</option>
                                                @endforeach --}}
                                            </select>
                                          </div>
                                    </div>
                                        <!-- /.card-body -->
                                </div>
                            </div>
                            </div>
                        <!-- /.card -->
                        </div>
                        <!-- /.col (right) -->
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button id="myButtonIDCreate" type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
