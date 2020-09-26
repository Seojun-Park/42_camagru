<?php
include 'inc_head.php';
?>

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