<?php
include $_SERVER['DOCUMENT_ROOT'] . '/db.php';
include $_SERVER['DOCUMENT_ROOT'] . '/hooks/func_view.php';

$query =  $_SERVER['QUERY_STRING'];
$sql = mq("select * from member where id='$query'");
$me = $sql->fetch_array();

echo $me;