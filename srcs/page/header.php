<?php
include $_SERVER['DOCUMENT_ROOT'] . "/db.php";
?>
<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/header.css">
</head>

<body>
    <header>
        <div class="header_row first_col">
            <a href="/">logo</a>
        </div>
        <div class="header_row second_col">
            <form method="post" class="search_form">
                <input type="text" id="searchbar" placeholder="Search user" />
                <button type="submit" id="searchbutton" name="search"><img src="../../asset/magnifier.png" alt="search" id="searchicon" /></button>
            </form>
        </div>
        <div class="header_row third_col">
            <div class="col_block">
                <a href="/">profile</a>
            </div>
            <div class="col_block">
                <a href="../member/logout.php">
                    <input type="button" value="Logout" />
                </a>
            </div>
        </div>
        <div class="header_row">
            <div class="dropdown">
                <span class="glyphicon glyphicon-align-justify"></span>
                <button><img src="../../asset/burger.png" alt="burger" id="burgerbtn" /></button>
                <div class="dropdown-content">
                    <form method="post">
                        <a href='/'>profile</a>
                        <a href="../member/logout.php">
                            <input type="button" value="logout" />
                        </a>
                    </form>
                </div>
            </div>
        </div>
    </header>
</body>

</html>