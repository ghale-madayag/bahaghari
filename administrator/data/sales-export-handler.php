<?php
    require_once("handler.php");
    
    if(isset($_POST['view'])){
        $sql = $handler->prepare('SELECT shipment.agent_code, shipment.ship_indate, shipment.ship_invonum, shipment.ship_rqty,shipment.ship_jqty,shipment.ship_iqty,(shipment.ship_rqty+shipment.ship_jqty+shipment.ship_iqty) as total, 
        (replace(shipment.ship_rcost, "$", "")+replace(shipment.ship_jcost, "$", "")+replace(shipment.ship_icost, "$", "")) 
        as totalAmount FROM shipment INNER JOIN manifest_record ON manifest_record.ship_invonum = shipment.ship_invonum 
        WHERE manifest_record.man_lotNo=? GROUP BY shipment.ship_invonum');

    $sql->execute([$_POST['view']]);

    while ($row = $sql->fetch(PDO::FETCH_OBJ)) {
        $dateCre = date_create($row->ship_indate);
        $date = date_format($dateCre, 'm/d/Y');
        $result[] = [
            'code' => $row->agent_code , 
            'date' => $date,
            'invoice' => $row->ship_invonum,
            'rqty' => $row->ship_rqty,
            'jqty' => $row->ship_jqty,
            'iqty' => $row->ship_iqty,
            'total' => $row->total,
            'totalAmount' => $row->totalAmount
        ];
    }

    echo json_encode($result);
    }

?>