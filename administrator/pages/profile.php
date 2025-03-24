
<section class="content">
    <!-- Default box -->
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Update</h3>
                </div>
                <div class="card-body">
                  <form id="form-edit" enctype="multipart/form-data" method="post">
                    <div class="form-group row">
                        <label for="email" class="col-sm-4 control-label">Email:</label>
                        <div class="col-sm-5">
                            <input type="email" class="form-control" id="email" name="email" disabled>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="fname" class="col-sm-4 control-label">First Name:</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="fname" name="fname" required="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="mname" class="col-sm-4 control-label">Middle Initial:</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="mname" name="mname">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="lname" class="col-sm-4 control-label">Last Name:</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="lname" name="lname" required="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="pword" class="col-sm-4 control-label">Password:</label>
                        <div class="col-sm-5">
                            <input type="password" class="form-control" id="pword" name="pword" placeholder="******">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="cpword" class="col-sm-4 control-label">Confirm Password:</label>
                        <div class="col-sm-5">
                            <input type="password" class="form-control" id="cpword" name="cpword" placeholder="******" >
                        </div>
                    </div>
                    <div class="form-group">
                        <span class="col-sm-8 pull-right text-danger" id="msg"></span>
                    </div>
                </div>  
                <div class="card-footer">
                  <button type="submit" class="btn btn-success pull-right">Save Changes</button>  
                </div>
                </form>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>
    <!-- /.card -->
</section>