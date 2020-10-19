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
    // $sql = mq("select * from member where id='{$_SESSION['userid']}'");
    // $member = $sql->fetch_array();
    // $sql = mq("select * from board order by idx");
    // $list = 5;
    if (isset($_SESSION['userid'])) { ?>
        <div class='header'>
            <?php echo view('header.php'); ?>
        </div>
        <div class='feed_body'>
            <div class='write_feed'>
                <form action="write_ok.php" method="post">
                <div class="wi_line"></div>
                <div id="in_content">
                    <textarea name="content" id="ucontent" placeholder="What!?" required></textarea>
                </div>
                <div id="in_file">
                    <input type="file" value="1" name="b_file" />
                </div>
                <div class="bt_se">
                    <button type="submit">write</button>
                </div>
                </form>
            </div>
        </div>
    <?php
    } else {
        echo "<script>alert('잘못된 접근입니다.'); history.back();</script>";
    }
    ?>
</body>

</html>