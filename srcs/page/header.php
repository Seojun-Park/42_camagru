<!-- @format -->

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
            <a href="/page/main.php">logo</a>
        </div>
        <div class="header_row second_col">
            <span>Camagru</span>
        </div>
        <div class="header_row third_col">
            <div class="col_block">
                <a href="#">
                    <button>GALLERY</button>
                </a>
            </div>
            <div class="col_block">
                <a href="#">
                    <button>PROFILE</button>
                </a>
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
                        <a href="/feed/gallery.php">GALLERY</a>
                        <a href="#">PROFILE</a>
                        <a href="/member/logout.php">LOGOUT</a>
                    </form>
                </div>
            </div>
        </div>
    </header>
</body>

</html>