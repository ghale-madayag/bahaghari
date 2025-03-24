<section class="content">
    <!-- Default box -->
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">All User</h3>
                </div>
                    <br/>
                    <div class="card-body table-responsive p-0">
                    <form id="form-user-all" class="form-horizontal" enctype="multipart/form-data" method="post">
                        <table id="user-all" class="table table-striped user-all" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th width="5"><div style="display: none;"><input type="checkbox" id="select-all"><label for="select-all"></label></div></th>
                                    <th width="100">Email</th>
                                    <th width="140">Name</th>
                                    <th width="100">Level</th>
                                    <th width="120">Date Registered</th>
                                    <th width="50">Status</th>
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
<div class="modal fade" id="userAdd" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form role="form" class="form-horizontal" method="post" id="form-user-add" enctype="multipart/form-data">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group row">
                    <label for="email" class="col-sm-4 control-label">Email:</label>
                    <div class="col-sm-7">
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="fname" class="col-sm-4 control-label">First Name:</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" id="fname" name="fname" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="mname" class="col-sm-4 control-label">Middle Initial:</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" id="mname" name="mname">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="lname" class="col-sm-4 control-label">Last Name:</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" id="lname" name="lname" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="lvl" class="col-sm-4 control-label">User Level:</label>
                    <div class="col-sm-7">
                        <select class="form-control" name="lvl" id="lvl" required>
                            <option disabled selected value="">Select Level</option>
                            <option value="0">Moderator</option>
                            <option value="1">Administrator</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </div>
        </form>
    </div>
</div>

<div class="modal fade" id="userEdit" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form role="form" class="form-horizontal" method="post" id="form-user-edit" enctype="multipart/form-data">
        <input type="hidden" id="user_id" name="user_id">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group row">
                    <label for="emailEdit" class="col-sm-4 control-label">Email:</label>
                    <div class="col-sm-7">
                        <input type="email" class="form-control" id="emailEdit" name="emailEdit" disabled>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="fnameEdit" class="col-sm-4 control-label">First Name:</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" id="fnameEdit" name="fnameEdit" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="mnameEdit" class="col-sm-4 control-label">Middle Initial:</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" id="mnameEdit" name="mnameEdit">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="lnameEdit" class="col-sm-4 control-label">Last Name:</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" id="lnameEdit" name="lnameEdit" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="lvlEdit" class="col-sm-4 control-label">User Level:</label>
                    <div class="col-sm-7">
                        <select class="form-control" name="lvlEdit" id="lvlEdit" required>
                            <option disabled selected value="">Select Level</option>
                            <option value="0">Moderator</option>
                            <option value="1">Administrator</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save Changes</button>
            </div>
        </div>
        </form>
    </div>
</div>