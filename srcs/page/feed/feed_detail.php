<?php
include $_SERVER['DOCUMENT_ROOT'] . '/db.php';
include $_SERVER['DOCUMENT_ROOT'] . '/hooks/func_view.php';

$query = $_SERVER['QUERY_STRING'];
$sql = mq("select * from feed where idx='" . $query . "'");
$feed = $sql->fetch_array();
$mesql = mq("select * from member where id='" . $_SESSION['userid'] . "'");
$me = $mesql->fetch_array();
$commentsql = mq("select * from comment where feedId='" . $feed['idx'] . "'");
$comment = $commentsql->fetch_array();


if (strcmp($me['id'], $feed['userid']) == 0) {
    $ismine = true;
} else {
    $ismine = false;
}

?>

<html>

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="/css/reset/css" />
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
        <div class="comment_box">
            <?php
            while ($comment) {
                echo $comment['userId'] . ":" . $comment['text'];
            }
            ?>
        </div>
        <form class="comment_inputbox" action="./add_Comment.php" method="POST">
            <input type="text" name="comment" placeholder="Add comment..." class="comment_input" />
            <input type="submit" value="Send" class="comment_submit" />
        </form>
    </div>
</body>

</html>