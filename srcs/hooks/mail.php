<?php
$to = 'jinchul112@gmail.com';
$subject = 'the subject';
$message = "hello";
$headers = 'From :jinpark@student.42.fr' . "\r\n" .
    'Reply-To : jinpark@student.42.fr' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

mail($to, $subject, $message, $headers);
