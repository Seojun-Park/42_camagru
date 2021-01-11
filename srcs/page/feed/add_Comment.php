<?php
include $_SERVER['DOCUMENT_ROOT'] . '/db.php';

$feedId = $_SERVER['QUERY_STRING'];
$userId = $_SESSION['userid'];
$comment = $_POST['comment'];


$sql = mq("insert into comment(userId, text, feedId) values('" . $userId . "','" . $comment . "','" . $feedId . "')");

echo " <meta charset='utf-8' /><script type='text/javascript'>alert('Comment added!');</script>
<meta http-equiv='refresh' content='0 url=./feed_detail.php?" . $feedId . "'>";
