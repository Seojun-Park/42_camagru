<?php
include $_SERVER['DOCUMENT_ROOT'] . "/db.php";
include "check.php";
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
    <div class="bg_signup">
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
                    <input type="password" class="field__input" name="userpw" placeholder="Password" />
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
                </label>
            </div>
            <div class="signup_btn">
                <input type="submit" value="Sign up" id="btn" formaction="member_ok.php" /><input type="reset" id="btn" class="res" value="Reset" />
            </div>
        </form>
    </div>
</body>


</html>
<script>
    $(document).ready(function(e) {
        $(".check").on("keyup", function() { //check라는 클래스에 입력을 감지
            var self = $(this);
            var userid;

            if (self.attr("id") === "userid") {
                userid = self.val();
            }

            $.post( //post방식으로 id_check.php에 입력한 userid값을 넘깁니다
                "id_check.php", {
                    userid: userid
                },
                function(data) {
                    if (data) { //만약 data값이 전송되면
                        self.parent().parent().find("div").html(data); //div태그를 찾아 html방식으로 data를 뿌려줍니다.
                        self.parent().parent().find("div").css("color", "#F00"); //div 태그를 찾아 css효과로 빨간색을 설정합니다
                    }
                }
            );
        });
    });
</script>