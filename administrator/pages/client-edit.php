<section class="content">
    <!-- Default box -->
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Update Client Information</h3>
                </div>
                <form role="form" class="form-horizontal" method="post" id="form-client-edit" enctype="multipart/form-data">
                    <input type="hidden" id="cliID" name="cliID">
                    <input type="hidden" id="recID" name="recID">
                    <div class="card-body">
                        <div class="col-xs-12">
                            <div class="form-group row">
                                <label for="cliLname" class="col-sm-4 control-label">Client Last name:</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="cliLname" name="cliLname" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="cliFname" class="col-sm-4 control-label">Client First name:</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="cliFname" name="cliFname" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="cliMname" class="col-sm-4 control-label">Client Middle name:</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="cliMname" name="cliMname">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="cliAdd1" class="col-sm-4 control-label">Complete Address: </label>
                                <div class="col-sm-6">
                                    <textarea class="form-control" rows="3" id="cliAdd1" name="cliAdd1" required></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="cliZip" class="col-sm-4 control-label">Zip Code:</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="cliZip" name="cliZip">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="cliEma" class="col-sm-4 control-label">Email:</label>
                                <div class="col-sm-6">
                                    <input type="email" class="form-control" id="cliEma" name="cliEma">
                                </div>
                            </div>
                            <!-- <div class="form-group row">
                                <label for="cliBdate" class="col-sm-4 control-label">Birthdate:</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="cliBdate" name="cliBdate">
                                </div>
                            </div> -->
                            <div class="form-group row">
                                <label for="cliTelNo" class="col-sm-4 control-label">Telephone No.:</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="cliTelNo" name="cliTelNo">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="cliMobNo" class="col-sm-4 control-label">Mobile No.:</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="cliMobNo" name="cliMobNo">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="assAge" class="col-sm-4 control-label">Ass Agent:</label>
                                <div class="col-sm-6">
                                    <select class="form-control" name="assAge" id="assAge">
                                        <option disabled selected value="-1">Select Agent</option>
                                        <option value="AB">AB</option>
                                        <option value="ACE">ACE</option>
                                        <option value="AERO">AERO</option>
                                        <option value="AF-UT">AF-UT</option>
                                        <option value="agent1">agent1</option>
                                        <option value="ALB">ALB</option>
                                        <option value="ARKO">ARKO</option>
                                        <option value="ATBP">ATBP</option>
                                        <option value="AV">AV</option>
                                        <option value="AZ">AZ</option>
                                        <option value="Bessie">Bessie</option>
                                        <option value="Blythe">Blythe</option>
                                        <option value="BYG">BYG</option>
                                        <option value="Cell RCBC">Cell RCBC</option>
                                        <option value="charly ">charly </option>
                                        <option value="CO">CO</option>
                                        <option value="DL">DL</option>
                                        <option value="DO">DO</option>
                                        <option value="JB">JB</option>
                                        <option value="Las Vegas">Las Vegas</option>
                                        <option value="Loma">Loma</option>
                                        <option value="LV">LV</option>
                                        <option value="Megabaks">Megabaks</option>
                                        <option value="MM">MM</option>
                                        <option value="OKC">OKC</option>
                                        <option value="PGR">PGR</option>
                                        <option value="RDY">RDY</option>
                                        <option value="RM">RM</option>
                                        <option value="SM">SM</option>
                                        <option value="SRM">SRM</option>
                                        <option value="Trimble">Trimble</option>
                                    </select>
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
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Update Recipient Information</h3>
                </div>
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
                                <label for="recAdd1" class="col-sm-4 control-label">Complete Address: </label>
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
                </form>
                <!-- /.card-body -->
                <div class="card-footer">
                    
                </div>
                    <!-- /.card-footer-->
            </div>
        </div>
    </div>
    <!-- /.card -->
</section>