<?php
include $_SERVER['DOCUMENT_ROOT'] . "/db.php";

$query =  $_SERVER['QUERY_STRING'];
$sql = mq("select * from member where id='$query'");
$me = $sql->fetch_array();

$_POST['email'] == "" ? $email = $me['email'] : $email = $_POST['email'];
$_POST['firstname'] == "" ? $firstname = $me['firstname'] : $firstname = $_POST['firstname'];
$_POST['lastname'] == "" ? $lastname = $me['lastname'] : $lastname = $_POST['lastname'];

if (!strcmp($_POST['password'], $_POST['passwordchedk'])) {
    echo "<script>alert('Passwords are not match')</script>";
    exit;
}

$_POST['password'] == "" ? $pwd = password_verify($me['password'], PASSWORD_DEFAULT) : $pwd = $_POST['password'];
