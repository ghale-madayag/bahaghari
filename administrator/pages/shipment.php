<section class="content">
    <!-- Default box -->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">All Shipment</h3>
                </div>
                    <br/>
                    <div class="card-body table-responsive p-0">
                    <form id="form-ship-all" class="form-horizontal" enctype="multipart/form-data" method="post">
                        <table id="ship-all" class="table table-striped ship-all w-100" cellspacing="0">
                            <thead>
                                <tr>
                                    <th width="5"><div style="display: none;"><input type="checkbox" id="select-all"><label for="select-all"></label></div></th>
                                    <th width="100">Invoice #</th>
                                    <th width="120">Lot #</th>
                                    <th width="100">Trans Date</th>
                                    <th width="180">Shipper Name</th>
                                    <th width="150">Consignee</th>
                                    <th width="80">Total Box</th>
                                    <th width="100">Area</th>
                                    <th width="180">Agent Name</th>
                                    <th width="250">Date Updated</th>
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

<!-- Modal -->
<div class="modal fade" id="modShip" tabindex="-1" role="dialog" aria-labelledby="manifestTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="manifestTitle">Update Lot No.</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         <form id="form-upLot" class="form-horizontal" enctype="multipart/form-data" method="post">
          <!-- Default box -->
          <div class="row">
              <div class="col-md-12">
                  
              </div>
              <div class="col-md-12">
                  <div class="form-group">
                      <label for="lotNo" class="col-form-label">Old Lot Number:</label>
                      <input type="text" class="form-control" id="oldLotNo" name="oldLotNo" required>
                   </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <label for="shipNo" class="col-form-label">New Lot Number:</label>
                  <input type="text" class="form-control" id="newLotNo" name="newLotNo" required>
                </div>
              </div>
          </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save</button>
      </div>
      </form>
    </div>
  </div>
</div>