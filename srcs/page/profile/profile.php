<?php
include $_SERVER['DOCUMENT_ROOT'] . '/db.php';
include $_SERVER['DOCUMENT_ROOT'] . '/hooks/func_view.php';

$query = $_SERVER['QUERY_STRING'];
$sql = mq("select * from member where id='$query'");
$me = $sql->fetch_array();
?>

<html>

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="/css/reset/css" />
    <link rel="stylesheet" href="/css/header.css" />
    <link rel="stylesheet" href="/css/profile.css" />
</head>

<body>
    <div class="header">
        <?php echo view("../header.php") ?>
    </div>
    <div class="profile_container">
        <h2 class="title">Jinpark's Profile</h2>
        <div class="profile_box">
            <div class="profile_col">
                <div class="col_title">username</div>
                <div class="col_cont"><?php echo $me['id']; ?></div>
            </div>
            <div class="profile_col">
                <div class="col_title">email</div>
                <div class="col_cont"><?php echo $me['email']; ?></div>
            </div>
            <div class="profile_col">
                <div class="col_title">name</div>
                <div class="col_cont"><?php echo $me['firstname'] . "   " . $me['lastname']; ?> </div>
            </div>
        </div>
        <?php echo '<a href="./profile_modify.php?' . $query . '" class="modify_button">modify</a>' ?>

    </div>
</body>

</html>