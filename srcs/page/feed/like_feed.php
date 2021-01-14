<?php
include $_SERVER['DOCUMENT_ROOT'] . '/db.php';

$query = $_SERVER['QUERY_STRING'];

$split = explode("&", $query);
$feedId = $split[0];
$userId = $split[1];

$sql = mq("select * from likefeed where feedId='" . $feedId . "'and memberId='" . $userId . "'");
$like = $sql->fetch_array();

if (isset($like)) {
    $likesql = mq("delete from likefeed where feedId='" . $feedId . "'and memberId='" . $userId . "'");
    echo "<meta http-equiv='refresh' content='0 url=/page/feed/feed_detail.php?" . $feedId . "' />";
} else {
    $likesql = mq("insert into likefeed(feedId, memberId) values('" . $feedId . "','" . $userId . "')");
    echo "<meta http-equiv='refresh' content='0 url=/page/feed/feed_detail.php?" . $feedId . "' />";

}
