<meta charset="utf-8" />
<?php
include $_SERVER['DOCUMENT_ROOT'] . "/db.php";

if ($_POST["userid"] == "" || $_POST["userpw"] == "") {
	echo '<script> alert("Put USER ID or Password"); history.back(); </script>';
} else {
	session_start();

	$password = $_POST['userpw'];
	$sql = mq("select * from member where id='" . $_POST['userid'] . "'");
	$member = $sql->fetch_array();
	$hash_pw = $member['pw']; 

	if (password_verify($password, $hash_pw))
	{
		$_SESSION['userid'] = $member["id"];
		$_SESSION['userpw'] = $member["pw"];

		echo "<script>location.href='/page/main.php';</script>";
	} else {
		echo "<script>alert('Check you ID or Password.'); history.back();</script>";
	}
}
?>