<?php
    require_once('handler.php');
    if (!empty($_POST['cliFullname']) && !empty($_POST['recLname'])) {
        $comcodeRec = "REC";
        $chkSqlRec = $handler->query("SELECT recipient_id FROM recipient ORDER BY recipient_id DESC");
        if ($chkSqlRec->rowCount()) {
			$row = $chkSqlRec->fetch(PDO::FETCH_OBJ);
			$cus_con_rec = substr($row->recipient_id, 3);
			$convertRec = $cus_con_rec + 1;
		}else{
			$convertRec = 1;
        }

        $client_id = $_POST['cliFullname'];
        $recipient_id =  $comcodeRec.str_pad($convertRec, 5, "0", STR_PAD_LEFT);

         #save to recipient
         $sqlRec = $handler->prepare("INSERT INTO recipient
                    (`recipient_id`,
                    `recipient_lname`,
                    `recipient_fname`,
                    `recipient_mname`,
                    `recipient_add1`,
                    `recipient_zipcode`,
                    `recipient_email`,
                    `recipient_tel`,
                    `recipient_mobile`,
                    `recipient_indate`
                    )
                VALUES(
                    :recipient_id,
                    :recipient_lname,
                    :recipient_fname,
                    :recipient_mname,
                    :recipient_add1,
                    :recipient_zipcode,
                    :recipient_email,
                    :recipient_tel,
                    :recipient_mobile,
                    NOW()
                    ) 
            ");

            $sqlRec->execute([
                'recipient_id' => $recipient_id ?: null,
                'recipient_lname' => $_POST['recLname'] ?? null,
                'recipient_fname' => $_POST['recFname'] ?? null,
                'recipient_mname' => $_POST['recMname'] ?? null,
                'recipient_add1' => $_POST['recAdd1'] ?? null,
                'recipient_zipcode' => $_POST['recZip'] ?? null,
                'recipient_email' => $_POST['recEma'] ?? null,
                'recipient_tel' => $_POST['recTelNo'] ?? null,
                'recipient_mobile' => $_POST['recMobNo'] ?? null
            ]);

            $sqlCR = $handler->prepare("INSERT client_recipient(`client_id`,`recipient_id`,`cp_indate`) 
                    VALUES(:client_id,:recipient_id,NOW())");

            $sqlCR->execute(['client_id' => $client_id , 'recipient_id' => $recipient_id ]);

            echo 1;
    }

?>