<?php
include "../../db.php";

$userid = $_POST['userid'];
$userpw = password_hash($_POST['userpw'], PASSWORD_DEFAULT);
$username = $_POST['username'];
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['email'] . '@' . $_POST['emaddress'];
$avatar = 'TBU';

$sql = mq("insert into member (id,pw,firstname,lastname,email,avatar,username) values('" . $userid . "','" . $userpw . "','"  . $firstname . "','" . $lastname . "','" . $email . "','" . $avatar . "','" . $username .  "')");

if(isset($sql)){
    echo "done!";
} else {
    echo "check the error";
}

?>
<!-- <meta charset="utf-8" />
<script type="text/javascript">
    alert('회원가입이 완료되었습니다.');
</script>
<meta http-equiv="refresh" content="0 url=member/member.php"> -->