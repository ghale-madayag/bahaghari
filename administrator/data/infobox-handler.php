<?php
	require_once('handler.php');

	if (isset($_POST['cntSales'])!="") {

		$sql = $handler->query("SELECT COUNT(man_lotNo) as total FROM manifest");
		$r = $sql->fetch(PDO::FETCH_OBJ);

		echo $r->total;
    }elseif (isset($_POST['cntShip'])!="") {

		$sql = $handler->query("SELECT COUNT(ship_invonum) as total FROM shipment");
		$r = $sql->fetch(PDO::FETCH_OBJ);

		echo $r->total;
    }elseif (isset($_POST['cntRec'])!="") {

		$sql = $handler->query("SELECT COUNT(rem_id) as total FROM remarks");
		$r = $sql->fetch(PDO::FETCH_OBJ);

		echo $r->total;
    }elseif (isset($_POST['cntCli'])!="") {

		$sql = $handler->query("SELECT COUNT(client_id ) as total FROM client");
		$r = $sql->fetch(PDO::FETCH_OBJ);

		echo $r->total;
    }
?>