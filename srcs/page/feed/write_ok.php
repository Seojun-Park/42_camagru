<?php

include $_SERVER['DOCUMENT_ROOT'] . "/db.php";
$mesql = mq("select * from member where id='" . $_SESSION['userid'] . "'");
$me = $mesql->fetch_array();
$date = date('Y-m-d');
$tmpfile =  $_FILES['b_file']['tmp_name'];
$o_name = $_FILES['b_file']['name'];
$filename = iconv("UTF-8", "EUC-KR", $_FILES['b_file']['name']);
$folder = "../../upload/" . $filename;
$username = $me['username'];
move_uploaded_file($tmpfile, $folder);

$sql = mq("insert into feed(name,content,date,file) values('" . $username . "','" . $_POST['content'] . "','" . $date . "','" . $o_name . "')"); ?>
<script type="text/javascript">
    alert("글쓰기 완료되었습니다.");
</script>
<meta http-equiv="refresh" content="0 url=../main.php" />