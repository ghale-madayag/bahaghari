<section class="content">
    <!-- Default box -->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">All Records</h3>
                </div>
                    <br/>
                    <div class="card-body table-responsive p-0">
                    <form id="form-records-all" class="form-horizontal" enctype="multipart/form-data" method="post">
                        <table id="records-all" class="table table-striped records-all" cellspacing="0">
                            <thead>
                                <tr>
                                    <th width="5"><div style="display: none;"><input type="checkbox" id="select-all"><label for="select-all"></label></div></th>
                                    <th width="130">Lot #</th>
                                    <th width="130">Invoice #</th>
                                    <th width="130">ETA/Date</th>
                                    <th width="250">ETA/Remarks</th>
                                    <th width="130">EST/Date</th>
                                    <th width="250">EST/Remarks</th>
                                    <th width="100">Status</th>
                                    <th width="180">Date</th>
                                </tr>
                            </thead>
                        </table>
                    </form>

                    </div>
                    <br/>
                <!-- /.card-body -->
            </div>
        </div>
    </div>
    <!-- /.card -->
</section>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form role="form" class="form-horizontal" method="post" id="form-records-add" enctype="multipart/form-data">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Update ETA / Remarks</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="lotNum" class="col-sm-2 control-label">Lot #:</label>
                    <div class="col-sm-8">
                        <select id="lotNum" class="form-control select2" style="width:100%;" name="lotNum" placeholder="Search..." required></select>                         
                    </div>
                </div>
                <div class="form-group">
                    <label for="status" class="col-sm-2 control-label">Status:</label>
                    <div class="col-sm-8">
                        <select class="form-control" name="status" id="status" required>
                            <option disabled selected value="-1">Select Status</option>
                            <option value="Pending">Pending</option>
                            <option value="Processing">Departed</option>
                            <option value="Shipped">Arrived MLA</option>
                            <option value="Delivered">Delivered</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="etaDate" class="col-sm-2 control-label">ETA/Date:</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="etaDate" name="etaDate" placeholder="mm/dd/yyyy">
                    </div>
                </div>
                <div class="form-group">
                    <label for="etaRem" class="col-sm-2 control-label">ETA/Remarks: </label>
                    <div class="col-sm-12">
                        <textarea class="form-control" rows="3" id="etaRem" name="etaRem" required></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label for="estDate" class="col-sm-2 control-label">EST/Date:</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="estDate" name="estDate" placeholder="mm/dd/yyyy">
                    </div>
                </div>
                <div class="form-group">
                    <label for="estRem" class="col-sm-2 control-label">EST/Remarks: </label>
                    <div class="col-sm-12">
                        <textarea class="form-control" rows="3" id="estRem" name="estRem" required></textarea>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
        </div>
        </form>
    </div>
</div>

<div class="modal fade" id="myModalEdit" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form role="form" class="form-horizontal" method="post" id="form-records-edit" enctype="multipart/form-data">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Edit ETA / Remarks</h5>
                <input type="hidden" id="rem_id" name="rem_id">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="lotNumEdit" class="col-sm-2 control-label">Lot #:</label>
                    <div class="col-sm-8">
                        <select id="lotNumEdit" class="form-control select2" style="width:100%;" name="lotNumEdit" placeholder="Search..." disabled></select>                         
                    </div>
                </div>
                <div class="form-group">
                    <label for="statusEdit" class="col-sm-2 control-label">Status:</label>
                    <div class="col-sm-8">
                        <select class="form-control" name="statusEdit" id="statusEdit" required>
                            <option disabled selected value="">Select Status</option>
                            <option value="Pending">Pending</option>
                            <option value="Processing">Departed</option>
                            <option value="Shipped">Arrived MLA</option>
                            <option value="Delivered">Delivered</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="etaDateEdit" class="col-sm-2 control-label">ETA/Date:</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="etaDateEdit" name="etaDateEdit" placeholder="mm/dd/yyyy">
                    </div>
                </div>
                <div class="form-group">
                    <label for="etaRemEdit" class="col-sm-2 control-label">ETA/Remarks: </label>
                    <div class="col-sm-12">
                        <textarea class="form-control" rows="3" id="etaRemEdit" name="etaRemEdit" required></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label for="estDateEdit" class="col-sm-2 control-label">EST/Date:</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="estDateEdit" name="estDateEdit" placeholder="mm/dd/yyyy">
                    </div>
                </div>
                <div class="form-group">
                    <label for="estRemEdit" class="col-sm-2 control-label">EST/Remarks: </label>
                    <div class="col-sm-12">
                        <textarea class="form-control" rows="3" id="estRemEdit" name="estRemEdit" required></textarea>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
        </div>
        </form>
    </div>
</div>