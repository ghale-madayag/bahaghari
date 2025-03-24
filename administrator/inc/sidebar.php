<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
            with font-awesome or any other icon font library -->
        
        <?php if($_SESSION['user_lvl']==0){ ?>
            <li class="nav-item">
                <a href="index.php" class="nav-link" id="dashboard">
                    <i class="nav-icon fa fa-tachometer-alt"></i>
                    <p>
                    Dashboard
                    </p>
                </a>
            </li>
            <li class="nav-item has-treeview" id="top-transaction">
                <a href="#" class="nav-link" id="transaction">
                    <i class="nav-icon fa fa-handshake"></i>
                    <p>
                    Transaction
                    <i class="right fa fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="shipment.php" class="nav-link" id="shipment">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Shipment</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                    <i class="nav-icon fa fa-folder-open"></i>
                    <p>
                    Reports
                    <i class="right fa fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Manifest</p>
                        </a>
                    </li>
                </ul>
            </li>

        <?php }else{ ?>

            <li class="nav-item">
                <a href="index.php" class="nav-link" id="dashboard">
                    <i class="nav-icon fa fa-tachometer-alt"></i>
                    <p>
                    Dashboard
                    </p>
                </a>
            </li>
            <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                    <i class="nav-icon fa fa-database"></i>
                    <p>
                    Query
                    <i class="right fa fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <!-- <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Aging</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Invoice Query</p>
                        </a>
                    </li> -->
                    <li class="nav-item">
                        <a href="client-history.php" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Client History</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item has-treeview" id="top-transaction">
                <a href="#" class="nav-link" id="transaction">
                    <i class="nav-icon fa fa-handshake"></i>
                    <p>
                    Transaction
                    <i class="right fa fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="shipment.php" class="nav-link" id="shipment">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Shipment</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="records.php" class="nav-link" id="records">
                    <i class="nav-icon fa fa-calendar-check"></i>
                    <p>
                    Records
                    </p>
                </a>
            </li>
            <li class="nav-item has-treeview" id="top-maintenance">
                <a href="#" class="nav-link" id="maintenance">
                    <i class="nav-icon fa fa-tools"></i>
                    <p>
                    Maintenance
                    <i class="right fa fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="user.php" class="nav-link" id="user">
                            <i class="far fa-circle nav-icon"></i>
                            <p>User</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="agent.php" class="nav-link" id="agent">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Agent</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="client.php" class="nav-link" id="client">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Client</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item has-treeview" id="top-report">
                <a href="#" class="nav-link">
                    <i class="nav-icon fa fa-folder-open"></i>
                    <p>
                    Reports
                    <i class="right fa fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="manifest.php" class="nav-link" id="manif">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Manifest</p>
                        </a>
                    </li>
             <!--        <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Payment Report</p>
                        </a>
                    </li> -->
                    <li class="nav-item">
                        <a href="sales.php" class="nav-link" id="sale">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Sales Report</p>
                        </a>
                    </li>
          <!--           <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Maintenance</p>
                        </a>
                    </li> -->
<!--                     <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>By Box</p>
                        </a>
                    </li> -->
                </ul>
            </li>
        <?php }?>
    </ul>
</nav>