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

</head>

<body>
    <div class="header">
        <?php echo view("../header.php") ?>
    </div>
    <div class="container">
        <form method="post">
            <input type="text" name="email" placeholder="Email" />
            <input type="text" name="firstname" placeholder="First name" />
            <input type="text" name="lastname" placeholder="Last name" />
            <input type="password" name="password" placeholder="Password" />
            <input type="password" name="passwordcheck" placeholder="Password Check" />

        </form>
    </div>
</body>

</html>