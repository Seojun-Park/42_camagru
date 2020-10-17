<?php

include $_SERVER['DOCUMENT_ROOT'] . "/db.php";
$date = date('Y-m-d');
$tmpfile =  $_FILES['b_file']['tmp_name'];
$o_name = $_FILES['b_file']['name'];
$filename = iconv("UTF-8", "EUC-KR", $_FILES['b_file']['name']);
$folder = "../../upload/" . $filename;
move_uploaded_file($tmpfile, $folder);

$sql = mq("insert into board(name,title,content,date,file) values('" . $_POST['name'] . "','" . $_POST['title'] . "','" . $_POST['content'] . "','" . $date . "','" . $o_name . "')"); ?>
<script type="text/javascript">
    alert("글쓰기 완료되었습니다.");
</script>
<meta http-equiv="refresh" content="0 url=/" />