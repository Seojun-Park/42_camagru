<html>

<head>
    <meta charset="utf-8">
    <title>Camagru Profile</title>
    <link rel="stylesheet" href="../css/reset.css" />
    <link rel="stylesheet" href="../css/header.css" />
    <link rel="stylesheet" href="../css/profile.css" />
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
    <div class="profile_container">
        <h2 class="title">Jinpark's Profile</h2>
        <div class="profile_box">
            <div class="profile_col">
                <div class="col_title">username</div>
                <div class="col_cont">cont</div>
            </div>
            <div class="profile_col">
                <div class="col_title">email</div>
                <div class="col_cont">cont</div>
            </div>
            <div class="profile_col">
                <div class="col_title">name</div>
                <div class="col_cont">cont </div>
            </div>
        </div>
        <a href="./profile_modify.php?jinpark" class="modify_button">modify</a>
    </div>
</body>

</html>