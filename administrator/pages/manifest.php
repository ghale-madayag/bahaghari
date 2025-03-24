<section class="content">
    <!-- Default box -->
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">All Manifest</h3>
                </div>
                    <br/>
                    <div class="card-body table-responsive p-0">
                    <form id="form-man-all" class="form-horizontal" enctype="multipart/form-data" method="post">
                        <table id="man-all" class="table table-striped man-all" cellspacing="0">
                            <thead>
                                <tr>
                                    <th width="5"><div style="display: none;"><input type="checkbox" id="select-all"><label for="select-all"></label></div></th>
                                    <th width="200">Lot No.</th>
                                    <th width="300">Date Created</th>
                                    <th width="160">Total Invoice</th>
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
<div class="modal fade" id="modMan" tabindex="-1" role="dialog" aria-labelledby="manifestTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="manifestTitle">Create Manifest</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         <form id="form-mod-all" class="form-horizontal" enctype="multipart/form-data" method="post">
          <!-- Default box -->
          <div class="row">
              <div class="col-md-12">
                  
              </div>
              <div class="col-md-9">
                  <div class="form-group">
                      <label for="newlotNo" class="col-form-label">Lot Number:</label>
                      <input type="text" class="form-control" id="newlotNo" name="newlotNo" required>
                   </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <a id="generate" class="btn btn-default" style="margin-top:40px;">Generate</a>
                </div>
              </div>
              <div class="col-md-12">
                  <div class="form-group">
                      <label for="lotNo" class="col-form-label">New Lot Number:</label>
                      <input type="text" class="form-control" id="lotNo" name="lotNo" required>
                   </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <label for="shipNo" class="col-form-label">Invoice Number:</label>
                  <select id="shipNo" class="form-control select2" style="width:100%;" name="shipNo[]" required multiple="multiple"></select>
                </div>
              </div>
          </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save</button>
      </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modManEdit" tabindex="-1" role="dialog" aria-labelledby="manifestTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="manifestTitle">Update Manifest</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         <form id="form-mod-all-edit" class="form-horizontal" enctype="multipart/form-data" method="post">
          <!-- Default box -->
          <div class="row">
              <div class="col-md-12">
                  
              </div>
              <div class="col-md-12">
                  <div class="form-group">
                      <label for="lotNo" class="col-form-label">Lot Number:</label>
                      <input type="text" class="form-control" id="lotNoEdit" name="lotNoEdit" required>
                      <input type="hidden" name="lotNoHide" id="lotNoHide">
                   </div>
              </div>
              <div class="col-md-9">
                  <div class="form-group">
                      <label for="lotNo" class="col-form-label">Add Lot Number:</label>
                      <input type="text" class="form-control" id="AddlotNo" name="AddlotNo" required>
                   </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <a id="generateUpdate" class="btn btn-default" style="margin-top:40px;">Generate</a>
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <label for="shipNoEdit" class="col-form-label">Invoice Number:</label>
                  <select id="shipNoEdit" class="form-control select2" style="width:100%;" name="shipNoEdit[]" required multiple="multiple"></select>
                </div>
              </div>
          </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save Changes</button>
      </div>
      </form>
    </div>
  </div>
</div>
