<?php
	require_once("handler.php");

	$result = [];

	if(isset($_POST['print'])){
		$sql = $handler->prepare('SELECT shipment.agent_code, shipment.ship_indate, shipment.ship_invonum, shipment.ship_rqty,shipment.ship_jqty,shipment.ship_iqty,(shipment.ship_rqty+shipment.ship_jqty+shipment.ship_iqty) as total, 
			(replace(shipment.ship_rcost, "$", "")+replace(shipment.ship_jcost, "$", "")+replace(shipment.ship_icost, "$", "")) as totalAmount FROM shipment INNER JOIN manifest_record ON manifest_record.ship_invonum = shipment.ship_invonum WHERE manifest_record.man_lotNo=? GROUP BY shipment.ship_invonum');

		$sql->execute([$_POST['print']]);

		while ($row = $sql->fetch(PDO::FETCH_OBJ)) {
			$dateCre = date_create($row->ship_indate);
	        $date = date_format($dateCre, 'm/d/Y');
			$result[] = [
				'code' => $row->agent_code , 
				'date' => $date,
				'invoice' => $row->ship_invonum,
				'rqty' => $row->ship_rqty,
				'jqty' => $row->ship_jqty,
				'iqty' => $row->ship_iqty,
				'total' => $row->total,
				'totalAmount' => $row->totalAmount
			];
		}

		echo json_encode($result);
	}elseif(isset($_POST['salesData'])){
		$sql = $handler->prepare('SELECT shipment.ship_indate, shipment.ship_area, SUM(shipment.ship_rqty) as rqty,
		SUM(shipment.ship_jqty) as jqty,SUM(shipment.ship_iqty) as iqty, 
		(SUM(replace(ship_rcost,"$", ""))+SUM(replace(ship_jcost,"$", ""))+SUM(replace(ship_icost,"$", ""))) as 
		cost FROM shipment INNER JOIN manifest_record ON manifest_record.ship_invonum = shipment.ship_invonum 
		WHERE manifest_record.man_lotNo=? GROUP BY man_lotNo');

		$sql->execute([$_POST['salesData']]);

		while ($row = $sql->fetch(PDO::FETCH_OBJ)) {
			$dateCre = date_create($row->ship_indate);
	        $date = date_format($dateCre, 'm/d/Y');
			$result[] = [ 
				'lot' => $_POST['salesData'],
				'area' => $row->ship_area,
				'date' => $date,
				'rqty' => $row->rqty,
				'jqty' => $row->jqty,
				'iqty' => $row->iqty,
				'today' =>date("m/d/Y"),
				'cost' => $row->cost,
				// 'totalAmount' => $row->totalAmount
			];
		}

		echo json_encode($result);
	}

	
?>