<?php
    require_once("../administrator/data/handler.php");

    if(!empty($_POST['trackNo'])){
        $trackNo = $_POST['trackNo'];
        
        $sql = $handler->query("SELECT
            rem_status,
            rem_etadate,
            rem_etarem,
            rem_estdate,
            rem_estrem,
            rem_indate
            FROM remarks WHERE ship_invnum = ".$trackNo." ORDER BY rem_indate DESC");

        if ($sql->rowCount()) {
            $staSql = $handler->query("SELECT rem_status FROM remarks WHERE ship_invnum =".$trackNo." ORDER BY rem_indate DESC");
            $statRow = $staSql->fetch(PDO::FETCH_OBJ);
            $status = $statRow->rem_status;
            
                while($row=$sql->fetch(PDO::FETCH_OBJ)) {

                    $dateCre = date_create($row->rem_indate);
                    $date = date_format($dateCre, 'M. d, Y h:i a');

                    $result[] = array(
                        'status' => $status,
                        'etadate'=> $row->rem_etadate,
                        'etarem' => $row->rem_etarem,
                        'estdate' => $row->rem_estdate,
                        'estrem' => $row->rem_estrem,
                        'status' => $status,
                        'indate' => $date
                    );
                }
                echo json_encode($result);
        }else{
            echo 0;
        }

        
    }
?>