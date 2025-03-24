
<div class="row">
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-box-1">
        <div class="inner">
            <h3 id="sales-info"></h3>

            <p>Sales Report</p>
        </div>
        <div class="icon">
            <i class="fas fa-dollar-sign"></i>
        </div>
        <?php if($_SESSION['user_lvl']==1){ ?>
            <a href="sales.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        <?php }?>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-box-2">
        <div class="inner">
            <h3 id="cli-info"><sup style="font-size: 20px"></sup></h3>

            <p>Clients</p>
        </div>
        <div class="icon">
            <i class="fas fa-chart-bar"></i>
        </div>
        <?php if($_SESSION['user_lvl']==1){ ?>
            <a href="client.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        <?php }?>
        
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-box-3">
        <div class="inner">
            <h3 id="ship-info"></h3>

            <p>Shipment</p>
        </div>
        <div class="icon">
            <i class="fas fa-truck"></i>
        </div>
        <?php if($_SESSION['user_lvl']==1){ ?>
            <a href="shipment.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        <?php }?>
        
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-box-4">
        <div class="inner">
            <h3 id="rec-info"></h3>

            <p>Records</p>
        </div>
        <div class="icon">
            <i class="fas fa-file-invoice"></i>
        </div>
        <?php if($_SESSION['user_lvl']==1){ ?>
            <a href="records.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        <?php }?>
        </div>
    </div>
    <!-- ./col -->
</div>
