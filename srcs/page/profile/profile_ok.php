<?php
include $_SERVER['DOCUMENT_ROOT'] . "/db.php";

$query =  $_SERVER['QUERY_STRING'];
$sql = mq("select * from member where id='$query'");
$me = $sql->fetch_array();

$_POST['email'] == "" ? $email = $me['email'] : $email = $_POST['email'];
$_POST['firstname'] == "" ? $firstname = $me['firstname'] : $firstname = $_POST['firstname'];
$_POST['lastname'] == "" ? $lastname = $me['lastname'] : $lastname = $_POST['lastname'];

if ($_POST['password'] != "") {
    if (!strcmp($_POST['password'], $_POST['passwordchedk'])) {
        echo "<script>alert('Passwords are not match')</script>";
        echo "<script>history.back();</script>";
        exit;
    }
}

$_POST['password'] == "" ? $pwd = password_verify($me['password'], PASSWORD_DEFAULT) : $pwd = $_POST['password'];

$cryptedpwd = password_hash($pwd, PASSWORD_DEFAULT);

$updatesql = mq("update member set email='" . $email . "', firstname='" . $firstname . "', lastname='" . $lastname . "', pw='" . $cryptedpwd . "' where id='" . $query . "'");


$mesql = mq("select * from member where id='" . $query . "'");
$me = $mesql->fetch_array();

echo "<script>alert('Modified!')</script>";
echo "<script>location.href='/page/main.php';</script>";
