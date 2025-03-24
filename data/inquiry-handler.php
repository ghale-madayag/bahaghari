<?php
    require_once('../administrator/data/handler.php');

    if(!empty($_POST['email'])){
        
        $email = $_POST['email'];
        $to = "inquiry.bhcargo@gmail.com";
        $subject = "Bahaghari Inquriry";
        $fullname = $_POST['fname'];
        $msg = $_POST['msg'];

        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

        $message = '<html><body>';
        $message .= '<p>Name: '.$fullname.'</p>';
        $message .= '<p>Email: '.$email.'</p>';
        $message .= '<p>'.$msg.'</p>';
        $message .= '</body></html>';

        if(mail($to, $subject, $message, $headers)){
            echo 1;
        } else{
           echo 0;
        }

       

    }

?>