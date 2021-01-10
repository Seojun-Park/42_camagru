<meta charset="utf-8" />
<?php
include $_SERVER['DOCUMENT_ROOT'] . "/db.php";

function send_mail($email)
{
	$to = $email;
	$subject = "Camagru Sign up | Verification email";
	$message = "This is email is verificated";
	$headers = 'From :jinpark@student.42.fr' . "\r\n" .
		'Reply-To : jinpark@student.42.fr' . "\r\n" .
		'X-Mailer: PHP/' . phpversion();

	mail($to, $subject, $message, $headers);
}

if ($_POST["userid"] == "" || $_POST["userpw"] == "") {
	echo '<script> alert("Put USER ID or Password"); history.back(); </script>';
} else {
	session_start();

	$password = $_POST['userpw'];
	$sql = mq("select * from member where id='" . $_POST['userid'] . "'");
	$member = $sql->fetch_array();
	// if ($member['verified'] == 0) {
	// 	echo "<script>alert('Verification email has sent')</script>";
	// 	send_mail($member['email']);
	// }
	$hash_pw = $member['pw'];

	if (password_verify($password, $hash_pw)) {
		$_SESSION['userid'] = $member["id"];
		$_SESSION['userpw'] = $member["pw"];

		echo "<script>location.href='/page/main.php';</script>";
	} else {
		echo "<script>alert('Check you ID or Password.'); history.back();</script>";
	}
}
?>