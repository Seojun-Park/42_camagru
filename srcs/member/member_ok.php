<?php
include $_SERVER['DOCUMENT_ROOT'] . "/db.php";

function passwordCheck($_str){
    $pw = $_str;
    $num = preg_match('/[0-9]/u', $pw);
    $char = preg_match('/[a-z]/u', $pw);
    $spe = preg_match("/[\!\@\#\$\%\^\&\*]/u",$pw);

    if (strlen($pw) < 10 || strlen($pw) > 30){
        echo '<script> alert("Password should be in 10 - 30 characters with alphabet, Number and special character contained.");</script>';
        return array(false, "False");
        exit;
    }
    if (preg_match("/\s/u", $pw) == true){
        echo '<script> alert("Password shoud not have any empty space.");</script>';
        return array(false, "False");
        exit;
    }
    if ($num == 0 || $char == 0 || $spe == 0){
        echo '<script> alert("Please mix alphabet, number and special characters.");</script>';
        return array(false, "False");
        exit;
    }
    return array(true);
}

$pwresult = passwordCheck($_POST['userpw']);
if ($pwresult[0] == false){
    echo $pwresult[1];
    echo "<script>history.back();</script>";
    exit;
}
$userid = $_POST['userid'];
$userpw = password_hash($_POST['userpw'], PASSWORD_DEFAULT);
$username = $_POST['username'];
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['email'] . '@' . $_POST['emaddress'];
$avatar = 'TBU';

$sql = mq("insert into member(id,pw,firstname,lastname,email,avatar,username) 
values('" . $userid . "','" 
. $userpw . "','" 
. $firstname . "','" 
. $lastname . "','" 
. $email . "','" 
. $avatar . "','" 
. $username .  "')"
); ?>
<meta charset="utf-8" />
<script type="text/javascript">
    alert('Done!');
</script>
<meta http-equiv="refresh" content="0 url=/index.php">