<?php
    require_once('handler.php');

    if(isset($_POST['id'])){
        $result =[];
        $sql = $handler->prepare("SELECT 
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
                        FROM shipment INNER JOIN
                        client on shipment.client_id = client.client_id
                        INNER JOIN recipient ON shipment.recipient_id = recipient.recipient_id
                        LEFT JOIN agent ON shipment.agent_code = agent.agent_code WHERE shipment.client_id = ?
                        ORDER BY ship_indate DESC
                ");
        $sql->execute([$_POST['id']]);

        while ($row=$sql->fetch(PDO::FETCH_OBJ)) {

            if ($row->client_mname!="") {
				$mname = ucfirst($row->client_mname).".";
			}else{
				$mname = "";
            }
            
            if ($row->recipient_mname!="") {
				$recmname = ucfirst($row->recipient_mname).".";
			}else{
				$recmname = "";
			}

            $cliName = ucfirst($row->client_lname)." ".ucfirst($row->client_fname)." ".$mname;
            $recName = ucfirst($row->recipient_lname)." ".ucfirst($row->recipient_fname)." ".$recmname;
            $dateCre = date_create($row->ship_indate);
            $date = date_format($dateCre, 'M. d, Y | h:i a');
            
            $shipDateCre = date_create($row->ship_date);
            $shipDate = date_format($shipDateCre, 'M. d, Y');
            $result[] = [
                'shipid' => $row->ship_invonum,
                'invoice' => $row->ship_invonum,
                'lot' => $row->ship_lot,
                'date' => $shipDate,
                'cliName' => $cliName,
                'recName' => $recName,
                'box' => $row->ship_box,
                'area' => $row->ship_area,
                'ageName' => $row->agent_name,
                'indate' => $date
            ];
        }

        echo json_encode($result);
    }else{
        $result =[];
        $sql = $handler->query('SELECT 
                                client.client_id,
                                client.client_lname,
                                client.client_fname,
                                client.client_mname, 
                                client.client_add1,
                                client.client_tel,
                                client.client_mobile,
                                client.client_ass
                                FROM client
                                ORDER BY client.client_indate DESC
                            ');

        while ($row = $sql->fetch(PDO::FETCH_OBJ)) {
            if ($row->client_mname!="") {
                $mname = ucfirst($row->client_mname).".";
            }else{
                $mname = "";
            }

            $fullname = ucfirst($row->client_lname)." ".ucfirst($row->client_fname)." ".$mname;

            $result[] = [
                'client_chk' => $row->client_id,
                'client_id' => $row->client_id,
                'fullname' => $fullname,
                'client_add1' => $row->client_add1,
                'client_tel' => $row->client_tel,
                'client_mobile' => $row->client_mobile
            ];
        }

        echo json_encode($result);
    }
