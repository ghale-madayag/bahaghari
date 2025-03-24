<?php
    require_once('session.php');
    require_once('handler.php');

    if(!empty($_POST['email']) && !empty($_POST['pword'])){
        $email = $_POST['email'];
        $pword = $_POST['pword'];
        $enPword = sha1($pword);

        $sqlChk = $handler->prepare("SELECT user_id, user_email, user_pword, user_lvl FROM user WHERE user_email= ? AND user_pword= ?");
        $sqlChk->execute([$email,$enPword]);

        if ($sqlChk->rowCount()) {
            $r = $sqlChk->fetch(PDO::FETCH_OBJ);
            $_SESSION['user_id'] = $r->user_id;
            $_SESSION['user_lvl'] = $r->user_lvl;
        }else{
            echo 1;   
        }
    }else if($_POST['para']!="undefined"){
        $param = $_POST['para'];

        $sql = $handler->prepare("UPDATE user SET user_status=1 WHERE user_pword=?");
        $sql->execute([$param]);

        echo 1;
    }
?>