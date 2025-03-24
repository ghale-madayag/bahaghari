<section class="content">
    <!-- Default box -->
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Update Agent Information</h3>
                </div>
                <form role="form" class="form-horizontal" method="post" id="form-ag-edit" enctype="multipart/form-data">
                    <input type="hidden" id="agCodeHid" name="agCodeHid">
                    <div class="card-body">
                        <div class="col-xs-12">
                            <div class="form-group row">
                                <label for="agCode" class="col-sm-4 control-label">Agent Code:</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="agCode" name="agCode" disabled>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="agName" class="col-sm-4 control-label">Name:</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="agName" name="agName" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="agAdd" class="col-sm-4 control-label">Complete Address: </label>
                                <div class="col-sm-6">
                                    <textarea class="form-control" rows="3" id="agAdd" name="agAdd"></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="agZip" class="col-sm-4 control-label">Zip Code:</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="agZip" name="agZip">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="agEma" class="col-sm-4 control-label">Email:</label>
                                <div class="col-sm-6">
                                    <input type="email" class="form-control" id="agEma" name="agEma">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="cliBdate" class="col-sm-4 control-label">Birthdate:</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="agBdate" name="agBdate">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="agTelNo" class="col-sm-4 control-label">Telephone No.:</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="agTelNo" name="agTelNo">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="agMobNo" class="col-sm-4 control-label">Mobile No.:</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="agMobNo" name="agMobNo">
                                </div>
                            </div>
                        </div>
                    </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary float-right">Submit</button>
                </div>
                    <!-- /.card-footer-->
            </div>
        </div>
    </div>
    <!-- /.card -->
</section>