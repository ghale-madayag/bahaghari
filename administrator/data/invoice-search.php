<?php
    require_once('handler.php');
 
	if(isset($_GET['q'])) {
		$term = $_GET['q'];
		$sql = $handler->prepare('SELECT ship_invonum, ship_indate, CONCAT(client_fname," ", client_mname," ", client_lname) as fullname FROM shipment INNER JOIN client ON shipment.client_id = client.client_id WHERE ship_invonum LIKE "%'.$term.'%" OR client_fname LIKE "%'.$term.'%" OR client_lname LIKE "%'.$term.'%"');
        $sql->execute();
    
	}else{
		$sql = $handler->query('SELECT ship_invonum, ship_indate, CONCAT(client_fname," ", client_mname," ", client_lname) as fullname FROM shipment INNER JOIN client ON shipment.client_id = client.client_id ORDER BY ship_indate DESC');
	}


	while ($row=$sql->fetch(PDO::FETCH_OBJ)) {
		$fullname = $row->fullname;
		$result[] = [
			'id' => $row->ship_invonum,
			'invoice' => $row->ship_invonum." | ".$fullname
		];
	}
    echo json_encode($result);

?>