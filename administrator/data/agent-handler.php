<?php
    require_once('handler.php');
    if(!empty($_POST['agCodeHid'])){

        $ageID = $_POST['agCodeHid'];

        $sql = $handler->prepare("UPDATE agent SET 
                agent_name = :agent_name,
                agent_add = :agent_add,
                agent_zip = :agent_zip,
                agent_email = :agent_email,
                agent_bdate = :agent_bdate,
                agent_telephone = :agent_telephone,
                agent_mob = :agent_mob
                WHERE agent_code = :agCode
            ");
        
            $sql->execute([
                'agent_name'=> $_POST['agName'] ?? null,
                'agent_add'=> $_POST['agAdd'] ?? null,
                'agent_zip'=> $_POST['agZip'] ?? null,
                'agent_email'=> $_POST['agEma'] ?? null,
                'agent_bdate'=> $_POST['agBdate'] ?? null,
                'agent_telephone'=> $_POST['agTelNo'] ?? null,
                'agent_mob'=> $_POST['agMobNo'] ?? null,
                'agCode' => $_POST['agCodeHid'] ?? null
            ]);

            echo 0;
        
    }else if(!empty($_POST['agCode'])){
        $ageID = $_POST['agCode'];
        $chkAge = $handler->prepare("SELECT 
                agent_code 
                FROM agent WHERE 
                agent_code = ?
            ");

        $chkAge->execute([$ageID]);

        if($chkAge->rowCount()){
            echo 2;            
        }else{
                $sql = $handler->prepare("INSERT INTO agent(
                `agent_code`,
                `agent_name`,
                `agent_add`,
                `agent_zip`,
                `agent_email`,
                `agent_bdate`,
                `agent_telephone`,
                `agent_mob`
                ) 
                VALUES(
                    :agent_code,
                    :agent_name,
                    :agent_add,
                    :agent_zip,
                    :agent_email,
                    :agent_bdate,
                    :agent_telephone,
                    :agent_mob
                )");

                $sql->execute([
                    'agent_code'=> $_POST['agCode'] ?? null,
                    'agent_name'=> $_POST['agName'] ?? null,
                    'agent_add'=> $_POST['agAdd'] ?? null,
                    'agent_zip'=> $_POST['agZip'] ?? null,
                    'agent_email'=> $_POST['agEma'] ?? null,
                    'agent_bdate'=> $_POST['agBdate'] ?? null,
                    'agent_telephone'=> $_POST['agTelNo'] ?? null,
                    'agent_mob'=> $_POST['agMobNo'] ?? null
                ]);

            echo 0;
        }
        
    }else if(isset($_POST['agentID'])){
        $agentID = $_POST['agentID'];
        $sql = $handler->prepare("SELECT * FROM agent WHERE agent_code = ?");
        $sql->execute([$agentID]);
        $result=[];

        while ($row = $sql->fetch(PDO::FETCH_OBJ)) {
            $result[] = [
                'agent_code' => $row->agent_code,
                'agent_name' => $row->agent_name,
                'agent_add' => $row->agent_add,
                'agent_zip' => $row->agent_zip,
                'agent_email' => $row->agent_email,
                'agent_bdate' => $row->agent_bdate,
                'agent_telephone' => $row->agent_telephone,
                'agent_mob' => $row->agent_mob, 
            ];
        }

        echo json_encode($result);

    }else if(!empty($_POST['ageDelID'])){
        $agCode = $_POST['ageDelID'];
        $sql = $handler->prepare("DELETE FROM agent WHERE agent_code =?");
        $sql->execute([$agCode]);
        echo 1;
    }else{

        $result=[];

        $sql = $handler->query("SELECT * FROM agent");
        $sql->execute();

        while ($row = $sql->fetch(PDO::FETCH_OBJ)) {
            $result[] = [
                'agenCode' => $row->agent_code,
                'agent_code' => $row->agent_code,
                'agent_name' => $row->agent_name,
                'agent_add' => $row->agent_add
            ];
        }

        echo json_encode($result);
    }
?>