<?php
    require_once('handler.php');
 
	if(isset($_GET['q'])) {
		$term = $_GET['q'];
		$sql = $handler->prepare("SELECT client_id, client_fname, client_mname, client_lname FROM client WHERE client_lname LIKE '%".$term."%' OR client_fname LIKE '%".$term."%' OR client_id LIKE '%".$term."%'");
        $sql->execute();
    
	}else{
		$sql = $handler->query("SELECT client_id, client_fname, client_mname, client_lname FROM client ORDER BY client_indate DESC");
	}

	while ($row=$sql->fetch(PDO::FETCH_OBJ)) {
		if ($row->client_mname!="") {
			$mname = ucfirst($row->client_mname).".";
		}else{
			$mname = "";
		}
		$fullname = ucfirst($row->client_fname)." ".$mname." ".ucfirst($row->client_lname);
		$result[] = [
			'client_id' => $row->client_id ,
			'fullname' => $fullname 
		];
	}
    echo json_encode($result);

?>