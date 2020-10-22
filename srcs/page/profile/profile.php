<?php 
include $_SERVER['DOCUMENT_ROOT'] . "/db.php";
include $_SERVER['DOCUMENT_ROOT'] . "/hooks/func_view.php";
?>

<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="../css/feed.css" />
    <link rel="stylesheet" href="../css/profile.css" />
    <title>Camagru</title>
</head>

<body>
    <?php
    $sql = mq("select * from member where id='" . $_GET['id'] . "'");
    $profile = $sql->fetch_array();
    ?>
    <div class='header'>
        <?php echo view('/page/header.php'); ?>
    </div>
    <div class="profile_container">
        <div class="avatar">
            avatar
        </div>
        <table class="user_card">
            <tr>
                <td id="name"><?php echo $profile['username'] ?>;</td>
            </tr>
            <tr>
                <td>Name</td>
                <td>full name</td>
            </tr>
            <tr>
                <td>email</td>
                <td>email address</td>
            </tr>
        </table>
    </div>
</body>

</html>