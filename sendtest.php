<?php

	// INPUT
    $from = "mbakos@gpsl.co";
	$to = "shivaram@gpsl.co";
    $subject = "Parts purchase order - cart list";
    $message = "Ding dong";

	// HEADERS
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
	$headers = "From:" . $from;	

	if ( function_exists( 'mail' ) ){
		echo 'mail() is available';
	}else{
		echo 'mail() has been disabled';
	}
	
	if(mail($to,$subject,$message, $headers)){
        echo "<br>Test email send.";
    }else{
        echo "<br>Failed to send.";
    }
	
?>
