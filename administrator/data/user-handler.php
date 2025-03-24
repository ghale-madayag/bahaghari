<?php
    require_once('handler.php');
    require_once('session.php');
    if(!empty($_POST['user_id'])){
        $sql = $handler->prepare("UPDATE user SET
                user_fname = :fname,
                user_mname = :mname,
                user_lname = :lname,
                user_lvl = :lvl
                WHERE user_id = :user_id
        ");

        $sql->execute([
            'fname' => $_POST['fnameEdit'] ?? null,
            'mname' => $_POST['mnameEdit'] ?? null,
            'lname' => $_POST['lnameEdit'] ?? null,
            'lvl' => $_POST['lvlEdit'] ?? null,
            'user_id' => $_POST['user_id']
        ]);

        echo 1;
    }else if(!empty($_POST['email'])){
        $email = $_POST['email'];
        $to = $email;
        $subject = "Bahaghari Verification";
        $fullname = $_POST['fname'];

        $pword = randomPassword();
        $sql = $handler->prepare("INSERT INTO user(
                `user_email`,
                `user_pword`,
                `user_fname`,
                `user_mname`,
                `user_lname`,
                `user_lvl`,
                `user_indate`,
                `user_status`
            ) 
            VALUES(
                :email,
                :pword,
                :fname,
                :mname,
                :lname,
                :lvl,
                NOW(),
                0
            )");

        $sql->execute([
            'email' => $_POST['email'] ?? null,
            'pword' => sha1($pword),
            'fname' => $_POST['fname'] ?? null,
            'mname' => $_POST['mname'] ?? null,
            'lname' => $_POST['lname'] ?? null,
            'lvl' => $_POST['lvl'] ?? null
        ]);

        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

        $message = '<html><body>';
        $message .= '<h1>ACCOUNT VERIFICATION REMINDER</h1>';
        $message .= '<p>Dear '.$fullname.'</p>';
        $message .= '<p>Your email address has been registered to create a Bahaghari account. Use the following information to sign in.</p> ';
        $message .= '<p>Email: '.$email.'</p>';
        $message .= '<p>Password: <strong>'.$pword.'</strong></p>';
        $message .= '<br/>';
        $message .= '<br/>';
        $message .= '<p>To verify your account, click the button below.</p>';
        $message .= '<a href="http://v2.bahagharicargo.com/administrator/login.php?verify='.sha1($pword).'" style="background-color: #4980B5;border: 12px solid #4980B5;
                    border-left: 24px solid #4980B5;
                    border-right: 24px solid #4980B5;
                    color: #fff;
                    display: inline-block;
                    font-family: Arial,Helvetica,sans-serif;
                    font-size: 14px;
                    line-height: 1.3em;
                    text-align: center;
                    text-decoration: none;
                    text-transform: uppercase;">VERIFY ACCOUNT</a>';
        $message .= '</body></html>';

        if(mail($to, $subject, $message, $headers)){
            echo 1;
        } else{
           echo 0;
        }

    }else if(!empty($_POST['userID'])){
        $result = [];
        $userID = $_POST['userID'];
        $sql = $handler->query("SELECT * FROM user WHERE user_id=".$userID."");

        while ($row = $sql->fetch(PDO::FETCH_OBJ)) {
            $result[] = [
                'user_id' => $row->user_id,
                'user_email' => $row->user_email,
                'user_fname' => $row->user_fname,
                'user_mname' => $row->user_mname, 
                'user_lname' => $row->user_lname,
                'user_lvl' => $row->user_lvl
            ];
        }

        echo json_encode($result);

    }else if(!empty($_POST['delID'])){
        $userID = $_POST['delID'];

        $sql = $handler->prepare("DELETE FROM user WHERE user_id=?");
        $sql->execute([$userID]);

        echo 1;
    
    }else{
        $result = [];
        $id = $_SESSION['user_id'];
        $sql = $handler->query("SELECT * FROM user WHERE user_id !=".$id."");

        while ($row = $sql->fetch(PDO::FETCH_OBJ)) {
            if ($row->user_mname!="") {
				$mname = ucfirst($row->user_mname).".";
			}else{
				$mname = "";
            }

            $fullname = ucfirst($row->user_fname)." ".$mname." " .ucfirst($row->user_lname);
            $status = $row->user_status;
            $lvl = $row->user_lvl;

            if($status==0){
                $status = '<span class="badge badge-warning">Pending</span>';
            }else{
                $status = '<span class="badge badge-success">Verified</span>';
            }

            if($lvl==0){
                $lvl = "Moderator";
            }else{
                $lvl = "Administrator";
            }

            $dateCre = date_create($row->user_indate);
            $date = date_format($dateCre, 'M. d, Y');

            $result[] = [
                'user_id' => $row->user_id,
                'user_email' => $row->user_email, 
                'fullname' => $fullname, 
                'user_lvl' => $lvl, 
                'user_indate' => $date, 
                'user_status' => $status 
            ];
        }

        echo json_encode($result);
    }

    function randomPassword() {
        $alphabet = "abcdefghijklmnopqrstuwxyz0123456789";
        $pass = []; 
        $alphaLength = strlen($alphabet) - 1;
        for ($i = 0; $i < 6; $i++) {
            $n = random_int(0, $alphaLength);
            $pass[] = $alphabet[$n];
        }
        return implode('', $pass);
    }
?>