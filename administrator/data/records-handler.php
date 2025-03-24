<?php
    require("handler.php");

    if(!empty($_POST['lotNum'])){
       $sql = $handler->prepare("INSERT INTO remarks(
            `ship_invnum`,
            `rem_status`,
            `rem_etadate`,
            `rem_etarem`,
            `rem_estdate`,
            `rem_estrem`,
            `rem_indate`
           ) VALUES(
               :lotNum,
               :rem_status,
               :etaDate,
               :etaRem,
               :estDate,
               :estRem, 
               NOW())");
        
        $sql->execute([
            'lotNum'=> $_POST['lotNum'] ?? null,
            'rem_status'=> $_POST['status'] ?? null,
            'etaDate'=> $_POST['etaDate'] ?? null,
            'etaRem'=> $_POST['etaRem'] ?? null,
            'estDate'=> $_POST['estDate'] ?? null,
            'estRem'=> $_POST['estRem'] ?? null
        ]);

        echo 1;
    }else if(!empty($_POST['rem_id'])){
        $remID = $_POST['rem_id'];
        $sql = $handler->prepare("UPDATE remarks SET
                    rem_status = :rem_status,
                    rem_etadate = :etadate,
                    rem_etarem = :etarem,
                    rem_estdate = :estdate,
                    rem_estrem = :estrem
                    WHERE rem_id = ".$remID."        
        ");

        $sql->execute([
            'rem_status'=> $_POST['statusEdit'] ?? null,
            'etadate'=> $_POST['etaDateEdit'] ?? null,
            'etarem'=> $_POST['etaRemEdit'] ?? null,
            'estdate'=> $_POST['estDateEdit'] ?? null,
            'estrem'=> $_POST['estRemEdit'] ?? null
        ]);
        
        echo 1;
    }else if(isset($_POST['edit'])){
        $remID = $_POST['edit'];
        $sql = $handler->query("SELECT remarks.rem_id, 
                        shipment.ship_invonum, 
                        shipment.ship_lot, 
                        shipment.ship_indate,
                        remarks.rem_status,
                        remarks.rem_etadate,
                        remarks.rem_etarem,
                        remarks.rem_estdate,
                        remarks.rem_estrem,
                        remarks.rem_indate
                        FROM shipment INNER JOIN
                        remarks ON shipment.ship_invonum = remarks.ship_invnum
                        WHERE remarks.rem_id = ".$remID."");
                        
            while($row=$sql->fetch(PDO::FETCH_OBJ)) {
                $result = [
                    'shipid' => $row->rem_id,
                    'lot' => $row->ship_lot,
                    'etadate'=> $row->rem_etadate,
                    'etarem' => $row->rem_etarem,
                    'estdate' => $row->rem_estdate,
                    'estrem' => $row->rem_estrem,
                    'status' => $row->rem_status,
                    'indate' => $row->rem_indate
                ];
            }

            echo json_encode($result);
    }else{
        $result =[];
        $sql = $handler->query("SELECT
                        remarks.rem_id, 
                        shipment.ship_invonum, 
                        shipment.ship_lot, 
                        shipment.ship_indate,
                        remarks.rem_status,
                        remarks.rem_etadate,
                        remarks.rem_etarem,
                        remarks.rem_estdate,
                        remarks.rem_estrem,
                        remarks.rem_indate
                        FROM shipment INNER JOIN
                        remarks ON shipment.ship_invonum = remarks.ship_invnum
                        ORDER BY remarks.rem_indate DESC
                ");

        while ($row=$sql->fetch(PDO::FETCH_OBJ)) {

            $dateCre = date_create($row->rem_indate);
            $date = date_format($dateCre, 'M. d, Y | h:i a');
            
            $status = $row->rem_status;
            
            if ($status=="Pending") {
                $status = '<span class="badge badge-warning">Pending</span>';
            }else if($status=="Processing"){
                $status = '<span class="badge badge-info">Processing</span>';
            }else if($status=="Shipped"){
                $status = '<span class="badge badge-success">Shipped</span>';
            }else{
                $status = '<span class="badge badge-danger">Delivered</span>';
            }

            $result[] = [
                'shipid' => $row->rem_id,
                'invoice' => $row->ship_invonum,
                'lot' => $row->ship_lot,
                'etadate'=> $row->rem_etadate,
                'etarem' => $row->rem_etarem,
                'estdate' => $row->rem_estdate,
                'estrem' => $row->rem_estrem,
                'status' => $status,
                'indate' => $date
            ];
        }

        echo json_encode($result);
    }
?>