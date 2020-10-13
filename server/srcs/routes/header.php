<?php
include '../hooks/inc_head.php';

if (array_key_exists('logout', $_POST)) {
    session_destroy();
    echo "<meta http-equiv='refresh' content='0;url=index.php'>";
}

$uri = $_SERVER['REQUEST_URI']; //uri를 구함 
$query = substr($uri, strpos($uri, "?") + 1, strlen($uri));
?>

<header>
    <div class="header_row first_col">
        <?php
        echo "<a href='main.php?" . $_SESSION['login'] . "'>";
        echo "<img alt='logo' id='logo' src='../../asset/logo.png' />";
        echo "</a>";
        ?>
    </div>
    <div class="header_row second_col">
        <form method="post" class="search_form">
            <input type="text" id="searchbar" placeholder="Search user" />
            <button type="submit" id="searchbutton" name="search"><img src="../../asset/magnifier.png" alt="search" id="searchicon" /></button>
        </form>
    </div>
    <div class="header_row third_col">
        <div class="col_block">
            <?php
            echo "<a href='profile.php?" . $_SESSION['login'] . "'>";
            echo "<img src='../../asset/profile.png' alt='profile' id='icons' />";
            echo "</a>";
            ?>
        </div>
        <div class="col_block">
            <form method="post">
                <button type="submit" name="logout" id="logout"><img src="../../asset/logout.png" alt="logout" id="icons" /></button>
            </form>
        </div>
    </div>
    <div class="header_row">
        <div class="dropdown">
            <button><img src="../../asset/burger.png" alt="burger" id="burgerbtn" /></button>
            <div class="dropdown-content">
                <form method="post">
                    <?php
                    echo "<a href='profile.php?" . $_SESSION['login'] . "'>";
                    echo "profile</a>";
                    ?>
                    <input type="submit" name="logout" id="drop_button" value="logout" />
                </form>
            </div>
        </div>
    </div>
</header>