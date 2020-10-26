<?php
$email = $_POST['email'] . "@" . $_POST['emaddress'];
$ran = str_pad(mt_rand(0, 999999), 6, '0');

$to = $email;
$subject = "Camagru login verifying";
$content = "Your verify number is  $ran ";
$headers = 'From: jinpark@42.fr' . "\r\n" .
    'Reply-To: webmaster@example.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

if (mail($to, $subject, $content, $headers) == TRUE) {
    echo "<script>history.back();</script>";
} else {
    echo $to . $subject . $content . $headers;
}
