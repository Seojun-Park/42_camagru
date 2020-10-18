<?php
include $_SERVER['DOCUMENT_ROOT'] . "/db.php";

if($_POST['userid'] != NULL){
	$id_check = mq("select * from member where id='{$_POST['userid']}'");
	$id_check = $id_check->fetch_array();
	
	if($id_check >= 1){
		echo "not available";
	} else {
		echo "available";
    }
}
