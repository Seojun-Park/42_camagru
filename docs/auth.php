<?php
include 'inc_head.php';
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Rush</title>

    <link rel="stylesheet" href="styles/base.css" />
    <link rel="stylesheet" href="styles/auth.css" />

</head>

<body>
    <div class="container">
        <div class="authCont">
            <div class="loginBox">
                <span id="authTitle">Log in</span>
                <!-- Login box / Form Post method -->
                <form method="POST" action="login.php" class="authform">
                    <input id="inputBox" type="text" placeholder="login" name="login" /><br /><br />
                    <input id="inputBox" type="password" placeholder="password" name="pw" /><br /><br />
                    <button id="loginButton" type="submit" name="submit" value="OK">Login</button>
                </form>
            </div>
            <div class="subBox">
                <p>You don't have account?&emsp;<a href="signup.html">Join us</a></p>
            </div>
        </div>
        <footer class="footer">
            <p class="copyright">&copy; 2020 <span id="green">Anthony</span>, <span id="pink">Saro</span>, <span id="blue">Jin</span>
                <p>
        </footer>
    </div>
</body>

</html>