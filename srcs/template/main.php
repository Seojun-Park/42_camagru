<!DOCTYPE html>

<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="../css/reset.css" />
    <link rel="stylesheet" href="../css/header.css" />
    <link rel="stylesheet" href="../css/main.css" />
    <title>Camagru</title>
</head>

<body>
    <header>
        <div class="header_row first_col">
            <a href="/">logo</a>
        </div>
        <div class="header_row second_col">
            <span>Camagru</span>
        </div>
        <div class="header_row third_col">
            <div class="col_block">
                <div class="col_block">
                    <a href="/">
                        <button>GALLERY</button>
                    </a>
                </div>
                <a href="/">
                    <button>PROFILE</button>
                </a>
            </div>
            <div class="col_block">
                <a href="../member/logout.php">
                    <button>LOG OUT</button>
                </a>
            </div>
        </div>
        <div class="header_row">
            <div class="dropdown">
                <button>
                    <img src="../asset/burger_icon.svg" alt="burger" />
                </button>
                <div class="dropdown-content">
                    <form method="post">
                        <a href="/">PROFILE</a>
                        <a href="../member/logout.php">LOGOUT</a>
                    </form>
                </div>
            </div>
        </div>
    </header>
    <div class="wrapper">
        <div class="selection">
            <a href="#">
                <div class="select_box">
                    <div class="box_in">
                        upload
                    </div>
                </div>
            </a>
            <div id="b_line"></div>
            <a href="#">
                <div class="select_box">
                    <div class="box_in">
                        camera
                    </div>
                </div>
            </a>
        </div>
    </div>
</body>
<footer>
    Copyright &copy; Jin 2020 - All Rights Reserved
</footer>


</html>