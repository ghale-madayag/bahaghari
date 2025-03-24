<?php
    require_once('handler.php');
 
	if(isset($_GET['q'])) {
		$term = $_GET['q'];
		$sql = $handler->prepare("SELECT ship_invonum, ship_lot FROM shipment WHERE ship_lot LIKE '%".$term."%'");
        $sql->execute();

	}else{
		$sql = $handler->query("SELECT ship_invonum, ship_lot FROM shipment");
	}

	while ($row=$sql->fetch(PDO::FETCH_OBJ)) {
		
		$result[] = [
			'invNum' => $row->ship_invonum ,
			'lotNo' => $row->ship_lot 
		];
	}
    echo json_encode($result);

?>