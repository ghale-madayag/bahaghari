<section class="content">
    <!-- Default box -->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">All Client</h3>
                </div>
                    <br/>
                    <div class="card-body table-responsive p-0">
                    <form id="form-client-all" class="form-horizontal" enctype="multipart/form-data" method="post">
                        <table id="client-all" class="table table-striped client-all w-100" cellspacing="0">
                            <thead>
                                <tr>
                                    <th width="110">Client ID</th>
                                    <th width="250">Client Name</th>
                                    <th width="310">Complete Address</th>
                                    <th width="180">Telephone</th>
                                    <th width="180">Mobile</th>
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
<div class="modal fade" id="clientModal" tabindex="-1" role="dialog" aria-labelledby="manifestTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div id="cliContent">

        </div>
        <div class="table-responsive p-0">
            <form id="form-client-his" class="form-horizontal" enctype="multipart/form-data" method="post">
                <table id="client-his" class="table table-striped client-his" cellspacing="0">
                    <thead>
                        <tr>
                        <th>Invoice #</th>
                        <th>Lot #</th>
                        <th>Trans Date</th>
                        <th>Consignee</th>
                        <th>Total Box</th>
                        <th>Area</th>
                        <th>Agent Name</th>
                        <th>Date Updated</th>
                        </tr>
                    </thead>
                </table>
            </form>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <!-- <button type="submit" class="btn btn-primary">Print</button> -->
      </div>
    </div>
  </div>
</div>