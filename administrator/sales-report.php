<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Sales Report | Bahaghari Express Cargo</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Bootstrap 4 -->

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <link rel="stylesheet" href="dist/css/style.css">

  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="printText">
<div class="wrapper">
  <!-- Main content -->
  <section class="invoice">
    <!-- title row -->
    <div class="row head-border">
      <div class="col-12">
        <h2 class="page-header">
          <img src="dist/img/logo.png" width="50"> Bahaghari Express Cargo  
          <small class="float-right dateStyle">Date Created: <span id="manDate"></span></small>
        </h2>
      </div>
      <!-- /.col -->
    </div>
    <!-- info row -->
    <div class="row invoice-info">
      <div class="col-sm-4 invoice-col">
        <address>
          <strong>Sales Report</strong><br/>
          Lot #: <strong><span id="lotNo"></span></strong><br>
          Run Date: <strong><span id="today"></span></strong><br>
          Area: <strong><span id="area"></span></strong><br>
        </address>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->

    <!-- Table row -->
    <div class="row">
      <div class="col-12 table-responsive">
        <table class="table table-bordered" id="table" cellspacing="0">
          
        </table>
      </div>
      <!-- /.col -->
    </div>
    <div class="row">
      <div class="col-6"></div>
      <div class="col-6">
        <p class="lead">Summary of Sales Report:</p>

        <div class="table-responsive">
          <table class="table">
            <tbody><tr>
              <th style="width:50%">Regular:</th>
              <td><span id="reg"></span></td>
            </tr>
            <tr>
              <th>Jumbo</th>
              <td><span id="jum"></span></td>
            </tr>
            <tr>
              <th>Irregular:</th>
              <td><span id="irr"></span></td>
            </tr>
            <tr style="font-size: 18px;">
              <th><strong>Total Sales Amount:</strong></th>
              <td><strong>$ <span id="totalAm"></span></strong></td>
            </tr>
          </tbody></table>
        </div>
      </div>
    </div>
    <!-- /.row -->

    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<!-- ./wrapper -->
</body>

<script src="plugins/jquery/jquery.min.js"></script>
<script src="dist/js/aes.js"></script>
<script src="dist/js/functions.js"></script>
<script type="text/javascript" src="dist/js/sales-print.js"></script>

</html>


