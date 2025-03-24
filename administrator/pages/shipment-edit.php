<section class="content">
    <!-- Default box -->
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Shipment Information Entry</h3>
                </div>
                <form role="form" class="form-horizontal" method="post" id="form-ship-edit" enctype="multipart/form-data">
                <input type="hidden" id="shipEdit" name="shipEdit">
                <input type="hidden" id="indate" name="indate">
                    <div class="card-body">
                        <div class="col-xs-12">
                            <div class="form-group row">
                                <label for="invNum" class="col-sm-2 control-label">Invoice #:</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" id="invNum" name="invNum">
                                    <input type="hidden" class="form-control" id="invNumHid" name="invNumHid">
                                </div>
                                <label for="lotNum" class="col-sm-2 control-label">Lot #:</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" id="lotNum" name="lotNum" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="shipDate" class="col-sm-2 control-label">Date:</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" id="shipDate" name="shipDate" placeholder="mm/dd/yyyy">
                                </div>
                                <label for="agenNum" class="col-sm-2 control-label">Agent:</label>
                                <div class="col-sm-4">
                                    <select id="agenNum" class="form-control select2" style="width:100%;" name="agenNum" placeholder="Search..."></select>                         
                                </div>
                            </div>
                            <div class="form-group row"></div>
                            <div class="form-group row"></div>
                            <div class="form-group row">
                                <label for="cliFullname" class="col-sm-2 control-label">Shipper:</label>
                                <div class="col-sm-4">
                                    <select id="cliFullname" class="form-control select2" style="width:100%;" name="cliFullname" placeholder="Search..."></select>                         
                                </div>
                                
                            </div>
                            <div class="form-group row">
                                <label for="consigName" class="col-sm-2 control-label">Consignee:</label>
                                <div class="col-sm-4">
                                <select class="form-control select2" style="width: 100%;" name="consigName" id="consigName">
                                    
                                </select>
                                </div>
                            </div>
                            <div class="form-group row"></div>
                            <div class="form-group row"></div>
                            <div class="form-group row">
                                <label for="numBox" class="col-sm-2 control-label"># of Box:</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" id="numBox" name="numBox" required>
                                </div>
                                <label for="area" class="col-sm-2 control-label">Area:</label>
                                <div class="col-sm-4">
                                    <select class="form-control" name="area" id="area">
                                        <option disabled selected value="-1">Select area</option>
                                        <option value="manila">Manila</option>
                                        <option value="luzon">Luzon</option>
                                        <option value="visayas">Visayas</option>
                                        <option value="mindanao">Mindanao</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="shipCost" class="col-sm-2 control-label">Shipment Cost:</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control currency" id="shipCost" name="shipCost" data-inputmask="'alias': 'numeric', 'groupSeparator': ',', 'autoGroup': true, 'digits': 2, 'digitsOptional': false, 'prefix': '$ ', 'placeholder': '0'">
                                </div>
                            </div>
                            <div class="form-group row"></div>
                            <div class="form-group row"></div>
                            <div class="form-group row">
                                <label for="paid" class="col-sm-2 control-label">Paid:</label>
                                <div class="col-sm-4">
                                    <input type="checkbox" name="paid" id="paid">
                                </div>
                                <label for="payType" class="col-sm-2 control-label">Payment Type:</label>
                                <div class="col-sm-4">
                                    <select class="form-control" name="payType" id="payType">
                                        <option disabled selected value="-1">Select type</option>
                                        <option value="cash">Cash</option>
                                        <option value="check">Check</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="payDate" class="col-sm-2 control-label">Payment Date:</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" id="payDate" name="payDate" placeholder="mm/dd/yyyy">
                                </div>
                                <label for="bank" class="col-sm-2 control-label">Bank:</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" id="bank" name="bank">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="cashAmo" class="col-sm-2 control-label">Cash Amount:</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control currency" id="cashAmo" name="cashAmo" data-inputmask="'alias': 'numeric', 'groupSeparator': ',', 'autoGroup': true, 'digits': 2, 'digitsOptional': false, 'prefix': '$ ', 'placeholder': '0'">
                                </div>
                                <label for="chkAmo" class="col-sm-2 control-label">Check Amount:</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control currency" id="chkAmo" name="chkAmo" data-inputmask="'alias': 'numeric', 'groupSeparator': ',', 'autoGroup': true, 'digits': 2, 'digitsOptional': false, 'prefix': '$ ', 'placeholder': '0'">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="recBy" class="col-sm-2 control-label">Received By:</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" id="recBy" name="recBy">
                                </div>
                                <label for="podDate" class="col-sm-2 control-label">POD Date:</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" id="podDate" name="podDate" placeholder="mm/dd/yyyy">
                                </div>
                            </div>
                            <div class="form-group row"></div>
                            <div class="form-group row"></div>
                            <div class="form-group row">
                                <label for="" class="col-sm-2 control-label">Product Code:</label>
                                <label for="" class="col-sm-4 control-label">Qty:</label>
                                <label for="" class="col-sm-2 control-label">Cost:</label>
                            </div>
                            <div class="form-group row">
                                <label for="regQty" class="col-sm-2 control-label">Regular:</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" id="regQty" name="regQty">
                                </div>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control currency" id="regCos" name="regCos" data-inputmask="'alias': 'numeric', 'groupSeparator': ',', 'autoGroup': true, 'digits': 2, 'digitsOptional': false, 'prefix': '$ ', 'placeholder': '0'">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="jumQty" class="col-sm-2 control-label">Jumbo:</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" id="jumQty" name="jumQty">
                                </div>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control currency" id="jumCost" name="jumCost" data-inputmask="'alias': 'numeric', 'groupSeparator': ',', 'autoGroup': true, 'digits': 2, 'digitsOptional': false, 'prefix': '$ ', 'placeholder': '0'">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="irreQty" class="col-sm-2 control-label">Irregular:</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" id="irreQty" name="irreQty">
                                </div>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control currency" id="irreCost" name="irreCost" data-inputmask="'alias': 'numeric', 'groupSeparator': ',', 'autoGroup': true, 'digits': 2, 'digitsOptional': false, 'prefix': '$ ', 'placeholder': '0'">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="remarks" class="col-sm-2 control-label">Remarks: </label>
                                <div class="col-sm-8">
                                    <textarea class="form-control" rows="3" id="remarks" name="remarks"></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="etaRem" class="col-sm-2 control-label">ETA/Remarks: </label>
                                <div class="col-sm-8">
                                    <textarea class="form-control" rows="3" id="etaRem" name="etaRem"></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="sittp" class="col-sm-2 control-label">Special Intruction to the Philippines: </label>
                                <div class="col-sm-8">
                                    <textarea class="form-control" rows="3" id="sittp" name="sittp"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                
                <!-- /.card-body -->
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary float-right">Update</button>
                </div>
                </form>
                    <!-- /.card-footer-->
            </div>
        </div>
        <div class="col-md-4">
            <div class="card" id="shipper">
                
            </div>
            <div class="card" id="recipient">
                
            </div>
        </div>
    </div>
    <!-- /.card -->
</section>