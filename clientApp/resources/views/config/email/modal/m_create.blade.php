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
                                            {{-- <form action="/p/quote.php" method="GET"> --}}
                                                <label class="mr-3 ml-2">Frequency :</label>
                                                <div id="debt-amount-slider">
                                                    <input type="radio" name="debt-amount" id="1" value="1" required>
                                                    <label for="1" data-debt-amount="Hour"></label>
                                                    <input type="radio" name="debt-amount" id="2" value="2" required>
                                                    <label for="2" data-debt-amount="Day"></label>
                                                    <input type="radio" name="debt-amount" id="3" value="3" required>
                                                    <label for="3" data-debt-amount="Week"></label>
                                                    <input type="radio" name="debt-amount" id="4" value="4" required>
                                                    <label for="4" data-debt-amount="Month"></label>
                                                    <input type="radio" name="debt-amount" id="5" value="5" required>
                                                    <label for="5" data-debt-amount="Year"></label>
                                                    <div id="debt-amount-pos"></div>
                                                </div>
                                            {{-- </form> --}}
                                        </div>
                                        <br>
                                        <div class="row">
                                            {{-- <div class="col-12"> --}}
                                                <div class="col-3">
                                                         {{-- <div class="form-group"> --}}
                                                         <label class="mr-3 ml-2">Day :</label>
                                                </div>
                                                <div class="col-8">
                                            <select id="day" class="form-control ml-4 select2 dayNum" style="width: 50%;">
                                              {{-- <option selected="selected">Alabama</option>
                                              <option>Alaska</option>
                                              <option>California</option>
                                              <option>Delaware</option>
                                              <option>Tennessee</option>
                                              <option>Texas</option>
                                              <option>Washington</option> --}}
                                            </select>
                                        </div>
                                          {{-- </div> --}}
                                        {{-- </div> --}}
                                        </div>

                                    </div>
                                    <div class="col-6">

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
