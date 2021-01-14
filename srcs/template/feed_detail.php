<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Camagru_Gallery</title>
    <link rel="stylesheet" href="../css/reset.css" />
    <link rel="stylesheet" href="../css/header.css" />
    <link rel="stylesheet" href="../css/feed_detail.css" />
</head>

<body>
    <header>
        <div class="header_row first_col">
            <a href="/"><img src="../asset/logo.png" alt="logo" width="50px" /></a>
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
                <a href="./profile.php?jinpark">
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
                        <a href="./profile.php?jinpark">PROFILE</a>
                        <a href="../member/logout.php">LOGOUT</a>
                    </form>
                </div>
            </div>
        </div>
    </header>
    <div class="detail_container">
        <div class="container_head">
            <div class="head_col">username</div>
            <div class="head_col">button</div>
        </div>
        <div class="image_box">
            <img src="/" alt="img" id="feedimg" />
        </div>
        <div>
            <form method="post" action="./like_ok.php?4&1">
                <button type="submit">like</button>
            </form>
        </div>
        <div class="comment_box">
            comment
        </div>
        <div class="comment_inputbox">
            input
        </div>
    </div>
</body>

</html>