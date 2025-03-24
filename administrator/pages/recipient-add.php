<section class="content">
    <!-- Default box -->
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <form role="form" class="form-horizontal" method="post" id="form-recipient-add" enctype="multipart/form-data">
                    <div class="card-body">
                        <div class="col-xs-12">
                            <div class="form-group row">
                                <label for="cliFullname" class="col-sm-4 control-label">Client Name:</label>
                                <div class="col-sm-6">
                                    <select id="cliFullname" class="form-control select2" style="width:100%;" name="cliFullname" placeholder="Search..." required></select>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                    <div class="card-body">
                        <div class="col-xs-12">
                            <div class="form-group row">
                                <label for="recLname" class="col-sm-4 control-label">Recipient  Last name:</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="recLname" name="recLname">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="recFname" class="col-sm-4 control-label">Recipient  First name:</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="recFname" name="recFname">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="recMname" class="col-sm-4 control-label">Recipient  Middle name:</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="recMname" name="recMname">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="recAdd1" class="col-sm-4 control-label">Address 1: </label>
                                <div class="col-sm-6">
                                    <textarea class="form-control" rows="3" id="recAdd1" name="recAdd1"></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="recZip" class="col-sm-4 control-label">Zip Code:</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="recZip" name="recZip">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="recEma" class="col-sm-4 control-label">Email:</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="recEma" name="recEma">
                                </div>
                            </div>
                            <!-- <div class="form-group row">
                                <label for="recBdate" class="col-sm-4 control-label">Birthdate:</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="recBdate" name="recBdate">
                                </div>
                            </div> -->
                            <div class="form-group row">
                                <label for="recTelNo" class="col-sm-4 control-label">Telephone No.:</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="recTelNo" name="recTelNo">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="recMobNo" class="col-sm-4 control-label">Mobile No.:</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="recMobNo" name="recMobNo">
                                </div>
                            </div>
                        </div>
                    </div>
                
                <!-- /.card-body -->
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary float-right">Submit</button>
                </div>
                </form>
                    <!-- /.card-footer-->
            </div>
        </div>
    </div>
    <!-- /.card -->
</section>