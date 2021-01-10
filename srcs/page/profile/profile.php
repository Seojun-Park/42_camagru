<?php
include $_SERVER['DOCUMENT_ROOT'] . '/db.php';
include $_SERVER['DOCUMENT_ROOT'] . '/hooks/func_view.php';

$query =  $_SERVER['QUERY_STRING'];
?>

<!DOCTYPE html>
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
        <h2 class="title">User Setting</h2>
        <form method="post" class="profile_form" action="./profile_ok.php">
            <input type="email" class="profile_input" name="email" placeholder="Email" />
            <input type="text" class="profile_input" name="firstname" placeholder="First name" />
            <input type="text" class="profile_input" name="lastname" placeholder="Last name" />
            <input type="password" class="profile_input" name="password" placeholder="Password" />
            <input type="password" class="profile_input" name="passwordcheck" placeholder="Password Check" />
            <button type="submit" class="profile_button">Submit</button>
        </form>
    </div>
</body>

</html>