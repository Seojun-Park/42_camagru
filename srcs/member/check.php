<?php
include $_SERVER['DOCUMENT_ROOT'] . "/db.php";

$doc = new DOMDocument;

$doc->validateOnParse = true;
$doc->Load("member.php");

function checkid($doc){
    $uid = $doc->getElementById('uid');
    echo $uid;
}

?>