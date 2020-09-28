<?php
include 'inc_head.php';

if (array_key_exists('logout', $_POST)) {
    session_destroy();
    echo "<meta http-equiv='refresh' content='0;url=index.php'>";
}
?>

<header>
    <div class="header_row first_col">
        <a href="index.php"><img alt="logo" id="logo" src="../asset/logo.png" /></a>
    </div>
    <div class="header_row second_col">
        <input type="text" id="searchbar" placeholder="Search user" />
        <button type="submit" id="searchbutton" name="search"><img src="../asset/magnifier.png" alt="search" id="searchicon" /></button>
    </div>
    <div class="header_row third_col">
        <div class="col_block">
            <a href="profile.php">
                <img src="../asset/profile.png" alt="profile" id="profile" />
            </a>
        </div>
        <div class="col_block">
            <form method="post">
                <input type="submit" name="logout" id="logout" value="LOGOUT" />
            </form>
        </div>
    </div>
</header>