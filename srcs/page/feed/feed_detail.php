<?php
include $_SERVER['DOCUMENT_ROOT'] . '/db.php';
include $_SERVER['DOCUMENT_ROOT'] . '/hooks/func_view.php';

$query = $_SERVER['QUERY_STRING'];
$sql = mq("select * from feed where idx='" . $query . "'");
$feed = $sql->fetch_array();
$mesql = mq("select * from member where id='" . $_SESSION['userid'] . "'");
$me = $mesql->fetch_array();


if (strcmp($me['id'], $feed['userid']) == 0) {
    $ismine = true;
    echo " yay";
} else {
    $ismine = false;
    echo "nop";
}

?>

<html>

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="/css/reset/css" />
    <link rel="stylesheet" href="/css/header.css" />
</head>

<body>
    <div class="header">
        <?php echo view("../header.php") ?>
    </div>
</body>

</html>