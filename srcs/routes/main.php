<?php
include '../hooks/inc_head.php';
include '../hooks/func_view.php';

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
    <div class="header">
        <?php
        echo view('header.php');
        ?>
    </div>
    <div class="wrapper">
        <div class="page_frame">
            <ul>
                <?php
                echo view('feedbox.php');
                ?>
            </ul>
        </div>
        <div class="page_side">
            what to be here?
        </div>
    </div>
</body>

</html>