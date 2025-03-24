<?php
    require_once('handler.php');

    if (!empty($_POST['user_id'])) {
		$id = $_POST['user_id'];

		$sql = $handler->prepare("SELECT user_fname, user_mname,user_lname FROM user WHERE user_id=?");
		$sql->execute([$id]);

		while ($row=$sql->fetch(PDO::FETCH_OBJ)) {
			$fname = $row->user_fname;
			$mname = $row->user_mname;
			$lname = $row->user_lname;

			$fullname = ucfirst($fname).' '.ucfirst($mname).'. '.ucfirst($lname);

			$result[] = [
				'fullname' => $fullname
			];
		}

        echo json_encode($result);

	}

?>