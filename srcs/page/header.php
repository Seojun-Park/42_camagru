<!-- @format -->
<?php
$userId = $_SESSION['userid'];
?>


<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="/css/reset.css" />
    <link rel="stylesheet" href="/css/header.css" />
</head>

<body>
    <header>
        <div class="header_row first_col">
            <a href="/page/main.php"><img src="/asset/logo.png" alt="logo" width="50px" /></a>'
        </div>
        <div class="header_row second_col">
            <span>Camagru</span>
        </div>
        <div class="header_row third_col">
            <div class="col_block">
                <a href="/page/feed/gallery.php">
                    <button>GALLERY</button>
                </a>
            </div>
            <div class="col_block">
                <?php
                echo '<a href="/page/profile/profile.php?' . $_SESSION['userid'] . '">
                    <button>PROFILE</button></a>'
                ?>
            </div>
            <div class="col_block">
                <a href="/member/logout.php">
                    <button>LOG OUT</button>
                </a>
            </div>
        </div>
        <div class="header_row">
            <div class="dropdown">
                <button>
                    <img src="/asset/burger_icon.svg" alt="burger" />
                </button>
                <div class="dropdown-content">
                    <form method="post">
                        <a href="/page/feed/gallery.php">GALLERY</a>
                        <?php
                        echo '<a href="/page/profile/profile.php?' . $_SESSION['userid'] . '">PROFILE</a>'
                        ?>
                        <a href="/member/logout.php">LOGOUT</a>
                    </form>
                </div>
            </div>
        </div>
    </header>
</body>

</html>