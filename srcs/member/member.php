<?php
include $_SERVER['DOCUMENT_ROOT'] . "/db.php";
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>회원가입 폼</title>
</head>

<body>
    <form method="post" action="member_ok.php">
        <h1>회원가입 폼</h1>
        <fieldset>
            <legend>입력사항</legend>
            <table>
                <tr>
                    <td>User ID</td>
                    <td><input type="text" size="35" name="userid" placeholder="User ID"></td>
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