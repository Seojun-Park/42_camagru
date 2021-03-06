<?php
include "/db.php";
include "hooks/func_view.php"
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="urf-8" />
    <title>Camagru_Auth</title>
    <link rel="stylesheet" type="text/css" href="../css/auth.css" />
</head>

<body>
    <div class="bg_image">
        <div class="bg_cover"></div>
    </div>
    <div class="wrapper">
        <div id="web_title">CAMAGRU</div>
        <div id="web_subtitle">by jinpark🤙🏻</div>
        <div class="login_box">
            <form method="post" action="member/login_ok.php" class="login_form">
                <div class="login_sec">
                    <label class="field field_v1">
                        <input type="text" class="field__input" placeholder="e.g. Jin" name="userid" />
                        <span class="field__label-wrap">
                            <span class="field__label">User ID</span>
                        </span>
                    </label>
                    <label class="field field_v2">
                        <input type="password" class="field__input" name="userpw" placeholder="Password" />
                        <span class="field__label-wrap">
                            <span class="field__label">Password</span>
                        </span>
                    </label>
                </div>
                <button type="submit">LOGIN</button>
            </form>
        </div>
        <div class="signup_sec">
            <div class="a_box">
                <a href="member/member.php">Sign up</a>
            </div>
        </div>
    </div>
</body>

</html>