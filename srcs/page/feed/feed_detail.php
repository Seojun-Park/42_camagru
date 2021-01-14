<?php
include $_SERVER['DOCUMENT_ROOT'] . '/db.php';
include $_SERVER['DOCUMENT_ROOT'] . '/hooks/func_view.php';

$query = $_SERVER['QUERY_STRING'];
$sql = mq("select * from feed where idx='" . $query . "'");
$feed = $sql->fetch_array();
$mesql = mq("select * from member where id='" . $_SESSION['userid'] . "'");
$me = $mesql->fetch_array();
$commentsql = mq("select * from comment where feedId='" . $query . "' order by idx desc limit 0,10");
$likesql = mq("select idx from likefeed where feedId='" . $query . "'");
$like = $likesql->fetch_array();

if (strcmp($me['id'], $feed['userid']) == 0) {
    $ismine = true;
} else {
    $ismine = false;
}

if (isset($me['idx'])) {
    $isLoggedIn = true;
} else {
    $isLoggedIn = false;
}


?>

<html>

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="/css/reset.css" />
    <link rel="stylesheet" href="/css/header.css" />
    <link rel="stylesheet" href="/css/feed_detail.css" />
</head>

<body>
    <div class="header">
        <?php echo view("../header.php") ?>
    </div>
    <div class="detail_container">
        <div class="container_head">
            <div class="head_col">
                <span class="user_title">
                    <?php echo "<a href='../profile/profile.php?" . $feed['userid'] . "'>" . $feed['userid'] . "</a>"; ?>
                </span>
            </div>
            <div class="head_col head_button">
                <?php

                if ($ismine == true) {
                    echo "<form action='./feed_delete.php?" . $feed['idx'] . "' method='POST'>";
                    echo "<input type='submit' value='X' class='delete_button' />";
                    echo "</form>";
                } else {
                    echo " ";
                }
                ?>
            </div>
        </div>
        <div class="image_box">
            <?php echo "<img id='feedimg' src='/upload/" . $feed['userid'] . "/" . $feed['imgname'] . "' alt='snap' />"; ?>
        </div>
        <div class="like_row">
            <?php
            if ($isLoggedIn) {
                $amilikesql = mq("select * from likefeed where feedId='" . $query . "'and memberId='" . $me['idx'] . "'");
                $amilike = $amilikesql->fetch_array();
                echo '<form method="post" action="./like_feed.php?' . $query . '&' . $me['idx'] . '" class="row_form">
                <button type="submit" class="like_btn">';
                if (isset($amilike)) {
                    echo "<img src='/asset/thumbs_down.png' />";
                } else {
                    echo "<img src='/asset/thumbs_up.png' />";
                }
                echo '</button>';
                $i = 0;
                while ($like = $likesql->fetch_array()) {
                    $i++;
                }
                echo "<div>";
                echo $i === 1 ? $i . " like" : $i . " likes";
                echo "</div>";
                echo '</form>';
            } else {
                echo "";
            }
            ?>
        </div>
        <div class="comment_box">
            <?php
            while ($comment = $commentsql->fetch_array()) {
                echo "<div class='comment_row'>";
                echo "<div><a class='comment_id' href='../profile/profile.php?" . $comment['userId'] . "'>" . $comment['userId'] . "</a> : <span>" . $comment['text'] . "</span></div>";
                echo "<div class='comment_date_col'><span class='comment_date'>" . $comment['date'] . "</span>";
                if (strcmp($comment['userId'], $me['id']) == 0) {
                    echo "<form method='POST' action='./delete_Comment.php?" . $comment['idx'] . "' ><input type='submit' value='X' class='comment_button' /></form>";
                } else {
                    echo " ";
                }
                echo "</div>";
                echo "</div>";
            }
            ?>
        </div>
        <?php
        if (isset($me['id'])) {
            echo "<form class='comment_inputbox' action='./add_Comment.php?" . $feed['idx'] . "' method='POST'> ";
            echo '<input type="text" name="comment" placeholder="Add comment..." class="comment_input" />';
            echo '<input type="submit" value="Send" class="comment_submit" />';
        } else {
            echo "";
        }
        ?>
        </form>
    </div>
</body>

</html>