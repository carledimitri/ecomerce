<?php
     $to      = '$_POST['EmailCli']';
     $subject = 'confirmation de votre email';
     $message = "afin de valide ce compte merci de cliquer sur ce lien \n\nhttp://127.0.1.0/projetphp/confirm.php?id=$user_id&token=$token";
     $headers = 'From: webmaster@example.com' . "\r\n" .
     'Reply-To: webmaster@example.com' . "\r\n" .
     'X-Mailer: PHP/' . phpversion();

     mail($to, $subject, $message, $headers);
 ?> 