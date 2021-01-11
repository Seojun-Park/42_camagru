<?php include  $_SERVER['DOCUMENT_ROOT'] . "/db.php";

$bno = $_SERVER['QUERY_STRING'];
$sql = mq("delete from feed where idx='" . $bno . "';");
?>
<script type="text/javascript">
	alert("delete success.");
</script>
<meta http-equiv="refresh" content="0 url=/page/main.php" />