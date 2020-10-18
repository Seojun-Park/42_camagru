<?php
include $_SERVER['DOCUMENT_ROOT'] . "/db.php";
include $_SERVER['DOCUMENT_ROOT'] . "/hooks/view.php";

?>
<!DOCTYPE html>

<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="../styles/reset.css" />
    <link rel="stylesheet" href="../styles/header.css" />
    <title>Camagru</title>
</head>

<body>
    <?php
    $sql = mq("select * from member where id='{$_SESSION['userid']}'");
    $member = $sql->fetch_array();
    echo view('header.php');
    if (isset($_SESSION['userid'])) { ?>
        <div class='header'>
            <?php echo "<h2>{$_SESSION['userid']} 님 환영합니다.</h2>";
                echo view('header.php') ?>
        </div>
        <a href="../member/logout.php">
            <input type="button" value="로그아웃" />
        </a>
    <?php
    } else {
        echo "<script>alert('잘못된 접근입니다.'); history.back();</script>";
    }
    ?>
</body>

</html>