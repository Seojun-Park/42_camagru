<?php
include $_SERVER['DOCUMENT_ROOT'] . "/db.php";
include $_SERVER['DOCUMENT_ROOT'] . "/hooks/func_view.php";

?>
<!DOCTYPE html>

<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="../css/reset.css" />
    <title>Camagru</title>
</head>

<body>
    <?php
    $sql = mq("select * from member where id='{$_SESSION['userid']}'");
    $member = $sql->fetch_array();
    if (isset($_SESSION['userid'])) { ?>
        <div class='header'>
            test
        </div>
    <?php
    } else {
        echo "<script>alert('잘못된 접근입니다.'); history.back();</script>";
    }
    ?>
</body>

</html>