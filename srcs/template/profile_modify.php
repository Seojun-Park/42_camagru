<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Camagru_Gallery</title>
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
    <div>
        <div class="profile_container">
            <h2 class="title">User Setting</h2>
            <form method="post" class="profile_form">
                <input type="email" class="profile_input" name="email" placeholder="Email" />
                <input type="text" class="profile_input" name="firstname" placeholder="First name" />
                <input type="text" class="profile_input" name="lastname" placeholder="Last name" />
                <input type="password" class="profile_input" name="password" placeholder="Password" />
                <input type="password" class="profile_input" name="passwordcheck" placeholder="Password Check" />
                <button type="submit" class="profile_button">Submit</button>
            </form>
        </div>
    </div>
</body>

</html>