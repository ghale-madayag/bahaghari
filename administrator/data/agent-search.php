<?php
    require_once('handler.php');
 
	if(isset($_GET['q'])) {
		$term = $_GET['q'];
		$sql = $handler->prepare("SELECT agent_code, agent_name FROM agent WHERE agent_name LIKE '%".$term."%'");
        $sql->execute();
	}else{
		$sql = $handler->query("SELECT agent_code, agent_name FROM agent");
	}

	while ($row=$sql->fetch(PDO::FETCH_OBJ)) {
		
		$result[] = [
			'agent_code' => $row->agent_code ,
			'fullname' => $row->agent_name 
		];
	}
    echo json_encode($result);

?>