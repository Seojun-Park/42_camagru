<?php
include $_SERVER['DOCUMENT_ROOT'] . "/db.php";
session_destroy();
?>
<meta charset="utf-8">
<script>
	alert("now you are logged out.");
	location.href = "/";
</script>