<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Shipment | Bahaghari</title>
  <?php include('inc/header.php');?>
</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  <?php include('inc/navbar.php');?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <?php include('inc/top-sidebar.php');?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Shipment Page</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="./">Home</a></li>
              <li class="breadcrumb-item"><a href="shipment.php">Shipment</a></li>
              <li class="breadcrumb-item active">Add Shipment</li>
            </ol>
          </div>
        </div>
        <?php include('pages/shipment-add.php');?>
      </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
   
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <?php include('inc/footer.php');?>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- SlimScroll -->
<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<script src="plugins/iCheck/icheck.min.js"></script>
<script src="plugins/datepicker/bootstrap-datepicker.js"></script>
<script src="plugins/select2/select2.full.min.js"></script>
<script src="dist/jquery-toast-plugin-master/dist/jquery.toast.min.js"></script>
<script src="plugins/input-mask/jquery.inputmask.bundle.js"></script>
<script src="dist/js/toast.js"></script>
<script src="dist/js/functions.js"></script>
<script src="dist/js/shipment.js"></script>
<script>
    loadProfile(<?php echo $_SESSION['user_id'];?>);
    icheckboxShip();
    getClient();
    getAgent();
    
    $('.currency').inputmask('decimal', { rightAlign: false });

    $('#shipDate').datepicker({
        autoclose: true
    })

    $('#payDate').datepicker({
        autoclose: true
    })

    $('#podDate').datepicker({
        autoclose: true
    })
    $("#cliFullname").on('change', function() {
        $("#consigName").val("");
        $("#recipient").empty();
        $("#consigName").css("font-size","18px");
        var ship = $("#cliFullname option:selected").val();
        getConsig(ship);
    })
    
    
    $("#consigName").on('click', function() {
        var fullname = $(this).find(':selected').data('fullname');
        var address = $(this).find(':selected').data('add');
        var contact = $(this).find(':selected').data('contact');
        var recipient = $("#recipient").empty();

        recipient.html('<div class="card-header">'+
							'<h3 class="card-title">Recipient Infomation</h3>'+
							'</div>'+
							'<div class="card-body">'+
								'<dl>'+
									'<dt>Name:</dt>'+
									'<dd>'+fullname+'</dd>'+
									'<dt>Address:</dt>'+
									'<dd>'+address+'</dd>'+
									'<dt>Contact #:</dt>'+
									'<dd>'+contact+'</dd>'+
								'</dl>'+
							'</div>');
    })
</script>
</body>
</html>
