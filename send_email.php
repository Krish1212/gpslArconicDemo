<?php
header('Content-Type: application/json');
    $to = "jstevenson@gpsl.co";
    $subject = "Parts purchase order - cart list";
    $fromName = "MB";
    $fromEmail = "mbakos@gpsl.co";

    $message = $_POST['message'];

    // Always set content-type when sending HTML email
    $headers = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    $headers .= 'From:  ' . $fromName . ' <' . $fromEmail .'>' . " \r\n" .
                'Reply-To: '.  $fromEmail . "\r\n" .
                'X-Mailer: PHP/' . phpversion();
    //$headers = "MIME-Version: 1.0" . "\r\n";
    //$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

    try{
        mail($to,$subject,$message,$headers);
        echo '{"success":true,"message":"Email sent successfully"}';
    }catch(Exception $e){
        echo '{"success":false,"message":"Error: ' . $e->getMessage() . '"}';
    }
?>
