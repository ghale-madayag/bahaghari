<?php
    require_once("handler.php");
    if(!empty($_POST['oldLotNo'])){
        $old = $_POST['oldLotNo'];
        $new = $_POST['newLotNo'];

        $sqlChk = $handler->prepare("SELECT ship_lot FROM shipment WHERE ship_lot = ?");
        $sqlChk->execute(array($old));

        if ($sqlChk->rowCount()) {
            $sql = $handler->prepare("UPDATE shipment SET ship_lot=? WHERE ship_lot=?");
            $sql->execute(array($new,$old));
            echo 0;
        }else{
            echo 1;
        }
    }else if(!empty($_POST['shipperID'])){
        $shipperID = $_POST['shipperID'] ?? null;
        $result = [];

        if ($shipperID) {
            $sql = $handler->prepare("
                SELECT 
                    recipient.recipient_id,
                    recipient.recipient_fname, 
                    recipient.recipient_mname, 
                    recipient.recipient_lname,
                    recipient.recipient_add1,
                    recipient.recipient_tel,
                    recipient.recipient_mobile,
                    client.client_id,
                    client.client_lname,
                    client.client_fname,
                    client.client_mname, 
                    client.client_add1,
                    client.client_tel,
                    client.client_mobile 
                FROM client 
                INNER JOIN client_recipient ON client.client_id = client_recipient.client_id
                INNER JOIN recipient ON client_recipient.recipient_id = recipient.recipient_id  
                WHERE client_recipient.client_id = :shipperID
            ");

            $sql->execute(['shipperID' => $shipperID]);
            $rows = $sql->fetchAll(PDO::FETCH_OBJ);

            $result = array_map(function($row) {
                return [
                    'client_id' => $row->client_id,
                    'fullname' => ucfirst($row->client_lname) . " " . ucfirst($row->client_fname) . (!empty($row->client_mname) ? " " . ucfirst($row->client_mname) . "." : ""),
                    'client_add1' => $row->client_add1,
                    'client_con' => $row->client_tel . " / " . $row->client_mobile,
                    'recipient_id' => $row->recipient_id,
                    'rec_fullname' => ucfirst($row->recipient_lname) . " " . ucfirst($row->recipient_fname) . (!empty($row->recipient_mname) ? " " . ucfirst($row->recipient_mname) . "." : ""),
                    'recipient_add1' => $row->recipient_add1,
                    'recipient_con' => $row->recipient_tel . " / " . $row->recipient_mobile
                ];
            }, $rows);
        }

        echo json_encode($result, JSON_PRETTY_PRINT);
    }else if(isset($_POST['del'])){
        $shipID = $_POST['shipID'];
        
        $sql = $handler->prepare("DELETE FROM shipment WHERE ship_invonum =?");
        $sql->execute(array($shipID)); 

        $sql = $handler->prepare("DELETE FROM remarks WHERE ship_invnum =?");
        $sql->execute(array($shipID)); 

        echo 1;
    
    }else if(isset($_POST['shipEdit'])){
        $inv = isset($_POST['invNumHid']);
        $sql = $handler->prepare("UPDATE shipment SET 
                    ship_invonum=:ship_invonum,
                    ship_lot=:ship_lot,
                    ship_date=:ship_date,
                    agent_code=:agent_code,
                    client_id=:client_id,
                    recipient_id=:recipient_id,
                    ship_box=:ship_box,
                    ship_area=:ship_area,
                    ship_cost=:ship_cost,
                    ship_paid=:ship_paid,
                    ship_paytype=:ship_paytype,
                    ship_paydate=:ship_paydate,
                    ship_bank=:ship_bank,
                    ship_cash=:ship_cash,
                    ship_check=:ship_check,
                    ship_receiver=:ship_receiver,
                    ship_pod=:ship_pod,
                    ship_rqty=:ship_rqty,
                    ship_rcost=:ship_rcost,
                    ship_jqty=:ship_jqty,
                    ship_jcost=:ship_jcost,
                    ship_iqty=:ship_iqty,
                    ship_icost=:ship_icost,
                    ship_remarks=:ship_remarks,
                    ship_ins=:ship_ins
                    WHERE ship_invonum=:invNum"
        );
        $sql->execute(array(
                'ship_invonum' =>  isset($_POST['invNum']) ? $_POST['invNum'] : null,
                'ship_lot' =>  isset($_POST['lotNum']) ? $_POST['lotNum'] : null,
                'ship_date' =>  isset($_POST['shipDate']) ? $_POST['shipDate'] : null,
                'agent_code' =>  isset($_POST['agenNum']) ? $_POST['agenNum'] : null,
                'client_id' =>  isset($_POST['cliFullname']) ? $_POST['cliFullname'] : null,
                'recipient_id' =>  isset($_POST['consigName']) ? $_POST['consigName'] : null,
                'ship_box' =>  isset($_POST['numBox']) ? $_POST['numBox'] : null, 
                'ship_area' =>  isset($_POST['area']) ? $_POST['area'] : null,
                'ship_cost' =>  isset($_POST['shipCost']) ? $_POST['shipCost'] : null,
                'ship_paid' =>  isset($_POST['paid']) ? $_POST['paid'] : null,
                'ship_paytype' =>  isset($_POST['payType']) ? $_POST['payType'] : null,
                'ship_paydate' =>  isset($_POST['payDate']) ? $_POST['payDate'] : null,
                'ship_bank' =>  isset($_POST['bank']) ? $_POST['bank'] : null,
                'ship_cash' =>  isset($_POST['cashAmo']) ? $_POST['cashAmo'] : null,
                'ship_check' =>  isset($_POST['chkAmo']) ? $_POST['chkAmo'] : null,
                'ship_receiver' =>  isset($_POST['recBy']) ? $_POST['recBy'] : null,
                'ship_pod' =>  isset($_POST['podDate']) ? $_POST['podDate'] : null,
                'ship_rqty' =>  isset($_POST['regQty']) ? $_POST['regQty'] : null,
                'ship_rcost' =>  isset($_POST['regCos']) ? $_POST['regCos'] : null,
                'ship_jqty' =>  isset($_POST['jumQty']) ? $_POST['jumQty'] : null,
                'ship_jcost' =>  isset($_POST['jumCost']) ? $_POST['jumCost'] : null,
                'ship_iqty' =>  isset($_POST['irreQty']) ? $_POST['irreQty'] : null,
                'ship_icost' =>  isset($_POST['irreCost']) ? $_POST['irreCost'] : null,
                'ship_remarks' =>  isset($_POST['remarks']) ? $_POST['remarks'] : null,
                'ship_ins' =>  isset($_POST['sittp']) ? $_POST['sittp'] : null,
                'invNum' =>  isset($_POST['shipEdit']) ? $_POST['shipEdit'] : null
            )
        );
        $sqlRem = $handler->prepare("UPDATE remarks SET rem_etarem=:remarks, ship_invnum=:ship_invonum 
            WHERE ship_invnum=:invNum");
        $sqlRem->execute(array(
            'ship_invonum' =>  isset($_POST['invNum']) ? $_POST['invNum'] : null,
            'remarks' =>  isset($_POST['etaRem']) ? $_POST['etaRem'] : null,
            'invNum' =>  isset($_POST['shipEdit']) ? $_POST['shipEdit'] : null
        ));

       
        echo 1;
    }else if(isset($_POST['edit']) && isset($_POST['shipID'])){
        $result = []; // Initialize as an empty array

        $shipID = $_POST['shipID'] ?? null;
        
        if ($shipID) {
            $sql = $handler->prepare("
                SELECT 
                    shipment.ship_invonum, 
                    shipment.ship_lot, 
                    shipment.ship_date,
                    shipment.client_id,
                    shipment.recipient_id,
                    shipment.ship_box,
                    shipment.ship_area,
                    shipment.agent_code,
                    shipment.ship_cost,
                    shipment.ship_paid,
                    shipment.ship_paytype,
                    shipment.ship_paydate,
                    shipment.ship_bank,
                    shipment.ship_cash,
                    shipment.ship_check,
                    shipment.ship_receiver,
                    shipment.ship_pod,
                    shipment.ship_rqty,
                    shipment.ship_rcost,
                    shipment.ship_jqty,
                    shipment.ship_jcost,
                    shipment.ship_iqty,
                    shipment.ship_icost,
                    shipment.ship_remarks,
                    shipment.ship_ins,
                    client.client_lname,
                    client.client_fname,
                    client.client_mname,
                    recipient.recipient_lname,
                    recipient.recipient_fname,
                    recipient.recipient_mname,
                    agent.agent_name,
                    remarks.rem_etarem,
                    remarks.rem_indate
                FROM shipment
                INNER JOIN client ON shipment.client_id = client.client_id
                INNER JOIN recipient ON shipment.recipient_id = recipient.recipient_id
                LEFT JOIN agent ON shipment.agent_code = agent.agent_code
                LEFT JOIN remarks ON shipment.ship_invonum = remarks.ship_invnum
                WHERE shipment.ship_invonum = :shipID
            ");
            
            $sql->execute(['shipID' => $shipID]);
        
            $rows = $sql->fetchAll(PDO::FETCH_OBJ);
        
            $result = array_map(function($row) {
                $mname = !empty($row->client_mname) ? ucfirst($row->client_mname) . "." : "";
        
                return [
                    'ship_invonum' => $row->ship_invonum,
                    'ship_lot' => $row->ship_lot,
                    'ship_date' => $row->ship_date,
                    'agent_code' => $row->agent_code,
                    'ageName' => $row->agent_name,
                    'client_id' => $row->client_id,
                    'cliName' => ucfirst($row->client_fname) . " " . $mname . " " . ucfirst($row->client_lname),
                    'recipient_id' => $row->recipient_id,
                    'ship_box' => $row->ship_box,
                    'ship_area' => $row->ship_area,
                    'ship_cost' => $row->ship_cost,
                    'ship_paid' => $row->ship_paid,
                    'ship_paytype' => $row->ship_paytype,
                    'ship_paydate' => $row->ship_paydate,
                    'ship_bank' => $row->ship_bank,
                    'ship_cash' => $row->ship_cash,
                    'ship_check' => $row->ship_check,
                    'ship_receiver' => $row->ship_receiver,
                    'ship_pod' => $row->ship_pod,
                    'ship_rqty' => $row->ship_rqty,
                    'ship_rcost' => $row->ship_rcost,
                    'ship_jqty' => $row->ship_jqty,
                    'ship_jcost' => $row->ship_jcost,
                    'ship_iqty' => $row->ship_iqty,
                    'ship_icost' => $row->ship_icost,
                    'ship_remarks' => $row->ship_remarks,
                    'etarem' => $row->rem_etarem,
                    'ship_ins' => $row->ship_ins,
                    'rem_indate' => $row->rem_indate
                ];
            }, $rows);
        }
        
        echo json_encode($result, JSON_PRETTY_PRINT);

    }else if(!empty($_POST['invNum'])){
        $invoice = $_POST['invNum'];

        $chkInv = $handler->prepare("SELECT ship_invonum FROM shipment WHERE ship_invonum =?");
        $chkInv->execute(array($invoice));
        
        if ($chkInv->rowCount()) {
            echo 2;
        }else{
            $sql = $handler->prepare("INSERT INTO shipment(
                `ship_invonum`,
                `ship_lot`,
                `ship_date`,
                `agent_code`,
                `client_id`,
                `recipient_id`,
                `ship_box`,
                `ship_area`,
                `ship_cost`,
                `ship_paid`,
                `ship_paytype`,
                `ship_paydate`,
                `ship_bank`,
                `ship_cash`,
                `ship_check`,
                `ship_receiver`,
                `ship_pod`,
                `ship_rqty`,
                `ship_rcost`,
                `ship_jqty`,
                `ship_jcost`,
                `ship_iqty`,
                `ship_icost`,
                `ship_remarks`,
                `ship_ins`,
                `ship_indate`
                ) VALUES(
                    :ship_invonum,
                    :ship_lot,
                    :ship_date,
                    :agent_code,
                    :client_id,
                    :recipient_id,
                    :ship_box,
                    :ship_area,
                    :ship_cost,
                    :ship_paid,
                    :ship_paytype,
                    :ship_paydate,
                    :ship_bank,
                    :ship_cash,
                    :ship_check,
                    :ship_receiver,
                    :ship_pod,
                    :ship_rqty,
                    :ship_rcost,
                    :ship_jqty,
                    :ship_jcost,
                    :ship_iqty,
                    :ship_icost,
                    :ship_remarks,
                    :ship_ins,
                    NOW()
                )");
    
            $sql->execute(array(
                'ship_invonum' =>  isset($_POST['invNum']) ? $_POST['invNum'] : null,
                'ship_lot' =>  isset($_POST['lotNum']) ? $_POST['lotNum'] : null,
                'ship_date' =>  isset($_POST['shipDate']) ? $_POST['shipDate'] : null,
                'agent_code' =>  isset($_POST['agenNum']) ? $_POST['agenNum'] : null,
                'client_id' =>  isset($_POST['cliFullname']) ? $_POST['cliFullname'] : null,
                'recipient_id' =>  isset($_POST['consigName']) ? $_POST['consigName'] : null,
                'ship_box' =>  isset($_POST['numBox']) ? $_POST['numBox'] : null, 
                'ship_area' =>  isset($_POST['area']) ? $_POST['area'] : null,
                'ship_cost' =>  isset($_POST['shipCost']) ? $_POST['shipCost'] : null,
                'ship_paid' =>  isset($_POST['paid']) ? $_POST['paid'] : null,
                'ship_paytype' =>  isset($_POST['payType']) ? $_POST['payType'] : null,
                'ship_paydate' =>  isset($_POST['payDate']) ? $_POST['payDate'] : null,
                'ship_bank' =>  isset($_POST['bank']) ? $_POST['bank'] : null,
                'ship_cash' =>  isset($_POST['cashAmo']) ? $_POST['cashAmo'] : null,
                'ship_check' =>  isset($_POST['chkAmo']) ? $_POST['chkAmo'] : null,
                'ship_receiver' =>  isset($_POST['recBy']) ? $_POST['recBy'] : null,
                'ship_pod' =>  isset($_POST['podDate']) ? $_POST['podDate'] : null,
                'ship_rqty' =>  isset($_POST['regQty']) ? $_POST['regQty'] : null,
                'ship_rcost' =>  isset($_POST['regCos']) ? $_POST['regCos'] : null,
                'ship_jqty' =>  isset($_POST['jumQty']) ? $_POST['jumQty'] : null,
                'ship_jcost' =>  isset($_POST['jumCost']) ? $_POST['jumCost'] : null,
                'ship_iqty' =>  isset($_POST['irreQty']) ? $_POST['irreQty'] : null,
                'ship_icost' =>  isset($_POST['irreCost']) ? $_POST['irreCost'] : null,
                'ship_remarks' =>  isset($_POST['remarks']) ? $_POST['remarks'] : null,
                'ship_ins' =>  isset($_POST['sittp']) ? $_POST['sittp'] : null
            ));
    
            $sqlRem = $handler->prepare("INSERT INTO 
                        remarks(`ship_invnum`,
                        `rem_etarem`,
                        `rem_status`,
                        `rem_indate`
                        ) 
                        VALUES(:ship_invnum,:remarks,'Pending',NOW())");  
            $sqlRem->execute(array(
                'ship_invnum'=> isset($_POST['invNum']) ? $_POST['invNum'] : null,
                'remarks' => isset($_POST['etaRem']) ? $_POST['etaRem'] : null
            ));
    
            echo 1;
        }
        
    }else{
        $result = []; // Initialize as an empty array

        $sql = $handler->query("
            SELECT 
                shipment.ship_invonum, 
                shipment.ship_lot, 
                shipment.ship_date,
                shipment.ship_box,
                client.client_lname,
                client.client_fname,
                client.client_mname,
                recipient.recipient_lname,
                recipient.recipient_fname,
                recipient.recipient_mname,
                shipment.ship_area,
                agent.agent_name,
                shipment.ship_indate
            FROM shipment
            INNER JOIN client ON shipment.client_id = client.client_id
            INNER JOIN recipient ON shipment.recipient_id = recipient.recipient_id
            LEFT JOIN agent ON shipment.agent_code = agent.agent_code
            ORDER BY ship_indate DESC
        ");

        $rows = $sql->fetchAll(PDO::FETCH_OBJ);

        $result = array_map(function($row) {
            $mname = !empty($row->client_mname) ? ucfirst($row->client_mname) . "." : "";
            $recmname = !empty($row->recipient_mname) ? ucfirst($row->recipient_mname) . "." : "";

            $cliName = ucfirst($row->client_lname) . " " . ucfirst($row->client_fname) . " " . $mname;
            $recName = ucfirst($row->recipient_lname) . " " . ucfirst($row->recipient_fname) . " " . $recmname;
            
            return [
                'shipid' => $row->ship_invonum,
                'invoice' => $row->ship_invonum,
                'lot' => $row->ship_lot,
                'date' => date('M. d, Y', strtotime($row->ship_date)),
                'cliName' => $cliName,
                'recName' => $recName,
                'box' => $row->ship_box,
                'area' => $row->ship_area,
                'ageName' => $row->agent_name,
                'indate' => date('M. d, Y | h:i a', strtotime($row->ship_indate))
            ];
        }, $rows);

        echo json_encode($result, JSON_PRETTY_PRINT);
    }
?>