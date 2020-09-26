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

    <header>
        <div class="header_row first_col">
            <a href="#"><img alt="logo" id="logo" src="../asset/logo.png" /></a>
        </div>
        <div class="header_row second_col">
            <input type="text" id="searchbar" placeholder="Search user" />
        </div>
        <div class="header_row third_col">
            <?php
            if ($login == FALSE) {
                ?>
                <a href="login.html">
                    LOGIN</a>
            <?php
            } else {
                ?>
                <!-- <a href="#">LOGOUT</a> -->
                <form method="post">
                    <input type="submit" name="logout" id="logout" value="LOGOUT" />
                </form>
            <?php
                if (array_key_exists('logout', $_POST)) {
                    session_destroy();
                    echo "<meta http-equiv='refresh' content='0;url=index.php'>";
                }
            }
            ?>
        </div>
    </header>
    <div class="wrapper">
        <div class="page_frame">
            lala
        </div>
    </div>
</body>

</html>