<?php
include $_SERVER['DOCUMENT_ROOT'] . '/db.php';

$query = $_SERVER['QUERY_STRING'];

$sql = mq("delete from comment where idx='" . $query . "';");
?>
<script type="text/javascript">
    alert("comment deleted.");
</script>
<?php echo "<meta http-equiv='refresh' content='0 url=/page/feed/feed_detail.php?" . $query . "' />";
?>