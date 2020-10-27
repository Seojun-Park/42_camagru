<?php

$ran = str_pad(mt_rand(0, 999999), 6, '0');

$to = $_POST['email'] . $_POST['emaddress'];
$headers = "From: admin@camagru.com\r\n";
$subject = "Verify with your secret code";
$body = "Your secret code is $ran";

if (!mail($to, $subject, $body, $headers)){
    echo "<script>alert('Can't send an email');";
} else {
    echo "<script>alert('Check your email');";
}
echo "<script>history.back();</script>";