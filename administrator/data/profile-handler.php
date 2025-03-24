<?php
    require_once('handler.php');
	require_once('session.php');
    if (isset($_POST['get_profile'])) {
        $get_data = $_SESSION['user_id'];
        $sql = $handler->prepare("SELECT * FROM user
                                WHERE user_id=?");
        $sql->execute([$get_data]);

        while ($r = $sql->fetch(PDO::FETCH_OBJ)) {

            $result[] = [
                'email' => $r->user_email,
                'fname' => $r->user_fname,
                'mname' => $r->user_mname,
                'lname' => $r->user_lname
            ];
        }
        
        echo json_encode($result);
    }elseif(!empty($_POST['fname']) && !empty($_POST['pword'])){
		$id = $_SESSION['user_id'];
        $fname = $_POST['fname'];
        $mname = $_POST['mname'];
        $lname = $_POST['lname'];
		$pword = sha1($_POST['pword']);

		$sql = $handler->prepare("UPDATE user SET user_fname=?,user_mname=?,user_lname=?, user_pword=? WHERE user_id=?");

		$sql->execute([$fname,$mname,$lname,$pword, $id]);

		echo 1;
    }elseif(!empty($_POST['fname'])){
		$id = $_SESSION['user_id'];
        $fname = $_POST['fname'];
        $mname = $_POST['mname'];
        $lname = $_POST['lname'];

		$sql = $handler->prepare("UPDATE user SET user_fname=?, user_mname=?,user_lname=? WHERE user_id=?");

		$sql->execute([$fname,$mname,$lname, $id]);

		echo 1;
	}else{
        $id = $_SESSION['user_id'];

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