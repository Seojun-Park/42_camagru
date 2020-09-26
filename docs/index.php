<?php
include 'inc_head.php';
include 'func_view.php';
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Camagru</title>
    <link rel="stylesheet" href="styles/reset.css" />
    <link rel="stylesheet" href="styles/header.css" />
    <link rel="stylesheet" href="styles/frame.css" />
</head>

<body>
    <?php
    if ($login == FALSE) {
        echo view('auth.php');
    } else {
        echo view('header.php');
    }
    ?>
</body>

</html>