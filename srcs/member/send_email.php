<?php
header("Content-type: application/json; charset=utf-8");

$email = $_POST['email'] . "@" . $_POST['emaddress'];
$ran = str_pad(mt_rand(0, 999999), 6, '0');

$subject = "Camagru login verifying";
$content = "Your verify number is  $ran ";
$headers = 'From: jinpark@42.fr' . "\r\n" .
    'Reply-To: webmaster@example.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();


$nameFrom = "jinpark";
$mailFrom = "jinpark@42.fr";
$nameTo = $_POST['userid'];
$mailTo = $email;
$subject = "Camagru Sign-Up Secret Code";
$content = "Your verify number is" . $ran;
$charset = "UTF-8";
$nameFrom = "=?$charset?B?" . base64_encode($nameFrom) . "?=";
$nameTo = "=?$charset?B?" . base64_encode($nameTo) . "?=";
$subject = "=?$charset?B?" . base64_encode($subject) . "?=";
$header = "Content-Type: text/html; charset=utf-8\r\n";
$header .= "MIME-Version: 1.0\r\n";
$header .= "Return-Path: <" . $mailFrom . ">\r\n";
$header .= "From: " . $nameFrom . " <" . $mailFrom . ">\r\n";
$header .= "Reply-To: <" . $mailFrom . ">\r\n";

$result = mail($mailTo, $subject, $content, $header, $mailFrom);

if (!$result) {
    $result = array('rst_code'=>'false', 'rst_msg'=>'전송실패');
    echo $result[1];
} else {
    $result = array('rst_code'=>'false', 'rst_msg'=>'전송성공');
    echo $result[1];
}
