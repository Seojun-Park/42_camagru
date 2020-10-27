<?php
require 'libphp-phpmailer/PHPMailerAutoload.php';

function sendMail($to, $from, $from_name, $subject, $body)
{
    $mail = new PHPMailer();
    $mail->IsSMTP();
    $mail->SMTPDebug = 0;
    $mail->CharSet = "utf-8";
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = "ssl";
    $mail->host = "smtp.gmail.com";
    $mail->port = 465;
    $mail->Username = "jinchul112";
    $mail->Password = "park1070!@";
    $mail->SetFrom($from, $from_name);
    $mail->AddReplyTo($from, $from_name);
    $mail->Subject = $subject;
    $mail->MsgHTML($body);
    $address = $to;
    $mail->AddAddress($address);

    if (!$mail->Send()) {
        echo "fail to send";
        return false;
    } else {
        echo "sent";
        return true;
    }
}

$ran = str_pad(mt_rand(0, 999999), 6, '0');

$authTo = $_POST['email'] . $_POST['emaddress'];
$authfrom = "jinchul112@gmail.com";
$autoname = "admin";
$authsubject = "Verify with your secret code";
$authbody = "Your secret code is $ran";

echo sendMail($authTo, $authfrom, $autoname, $authsubject, $authbody);
