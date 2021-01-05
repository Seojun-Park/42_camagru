<?php
include $_SERVER['DOCUMENT_ROOT'] . "/db.php";
include "check.php";

function send_mail($email)
{
    $to = $email;
    $subject = "Camagru Sign up | Verification email";
    $message = "This is email is verificated";
    $headers = 'From :jinpark@student.42.fr' . "\r\n" .
        'Reply-To : jinpark@student.42.fr' . "\r\n" .
        'X-Mailer: PHP/' . phpversion();

    mail($to, $subject, $message, $headers);
}

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Cama_Sign Up</title>
    <link rel="stylesheet" type="text/css" href="/css/auth.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</head>

<body>
    <div class="bg_image_signup">
        <div class="bg_cover"></div>
    </div>
    <div class="wrapper">
        <div id="web_title"><a href="/">CAMAGRU</a></div>
        <div id="web_subtitle_signup">Sign up</div>
        <form method="post">
            <div class="signup_box">
                <label class="field field_v1">
                    <input type="text" size="40" name="userid" class="field__input" placeholder="User ID" required />
                    <span class="field__label-wrap">
                        <span class="field__label">User ID</span>
                    </span>
                </label>
                <label class="field field_v1">
                    <input type="password" class="field__input" name="userpw" placeholder="Min. 10character inc. special letter" />
                    <span class="field__label-wrap">
                        <span class="field__label">Password</span>
                    </span>
                </label>
                <label class="field field_v1">
                    <input type="text" class="field__input" name="username" placeholder="Username" />
                    <span class="field__label-wrap">
                        <span class="field__label">Username</span>
                    </span>
                </label>
                <label class="field field_v1">
                    <input type="text" class="field__input" name="firstname" placeholder="First name" />
                    <span class="field__label-wrap">
                        <span class="field__label">First Name</span>
                    </span>
                </label>
                <label class="field field_v1">
                    <input type="text" class="field__input" name="lastname" placeholder="Last name" />
                    <span class="field__label-wrap">
                        <span class="field__label">Last Name</span>
                    </span>
                </label>
                <label class="field field_v1">
                    <input type="text" \ class="field__input" name="email" placeholder="Email" />
                    <span class="field__label-wrap">
                        <span class="field__label">Email</span>
                    </span>
                    <form>
                        <input type="submit" value="Verify" class="verifyButton" formaction="" />
                    </form>
                </label>
            </div>
            <!-- <div class="signup_btn">
                <input type="submit" value="Sign up" id="btn" formaction="member_ok.php" />
                <input type="reset" id="btn" class="res" value="Reset" />
            </div> -->
        </form>
    </div>
</body>


</html>