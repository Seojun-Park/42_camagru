<?php
include $_SERVER['DOCUMENT_ROOT'] . "/db.php";
include "check.php";
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>회원가입 폼</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</head>

<body>
    <form method="post" action="member_ok.php">
        <h1>회원가입 폼</h1>
        <fieldset>
            <legend>입력사항</legend>
            <table>
                <tr>
                    <td>User ID</td>
                    <td>
                    <td><input type="text" size="35" name="userid" id="userid" class="check" placeholder="아이디" required />
                    <td>
                        <div id="id_check">아이디가 실시간으로 검사됩니다</div>
                    </td>
                    </td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td><input type="password" size="35" name="userpw" placeholder="Password"></td>
                </tr>
                <tr>
                    <td>Nickname</td>
                    <td><input type="test" size="35" name="username" placeholder="Nickname"></td>
                </tr>
                <tr>
                    <td>First name</td>
                    <td><input type="text" size="35" name="firstname" placeholder="First name"></td>
                </tr>
                <tr>
                    <td>Last name</td>
                    <td><input type="text" size="35" name="lastname" placeholder="Last name"></td>
                </tr>
                <tr>
                    <td>E-mail</td>
                    <td><input type="text" name="email">@<select name="emaddress">
                            <option value="gmail.com">gmail.com</option>
                            <option value="yahoo.com">yahoo.com</option>
                            <option value="hotmail.com">hatmail.com</option>
                            <option value="naver.com">naver.com</option>
                            <option value="daum.net">daum.net</option>
                        </select></td>
                </tr>
            </table>

            <input type="submit" value="가입하기" /><input type="reset" value="다시쓰기" />

        </fieldset>
    </form>
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