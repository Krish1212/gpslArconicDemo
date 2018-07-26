<?php
    $to = "krishnamoorthy@gpsl.co";
    $subject = "Parts purchase order - cart list";

    $message = $_POST['message'];

    // Always set content-type when sending HTML email
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

    mail($to,$subject,$message,$headers);
    
    return;
?>
