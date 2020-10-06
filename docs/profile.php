<?php
include 'inc_head.php';
include 'func_view.php';

function getProfile($query, $obj)
{
    foreach ($obj as $val) {
        if (strcmp($val['login'], $query) == 0) {
            echo $val['login'];
            return $val;
        } else {
            echo "rrr";
        }
    }
}

$uri = $_SERVER['REQUEST_URI']; //uri를 구함 
$query = substr($uri, strpos($uri, "?") + 1, strlen($uri));
$obj = unserialize(file_get_contents("../db/account"));
$profile = getProfile($query, $obj);
?>
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="styles/header.css" />
    <link rel="stylesheet" href="styles/profile.css" />
</head>

<body>
    <div class="header">
        <?php
        echo view('header.php');
        ?>
    </div>
    <div class="wrapper">
        <div class="page_frame">
            <div class="table_title">
                <?php
                echo $profile['login'] . "'s profile";
                ?>
            </div>
            <table class="profile_table">
                <tr>
                    <td id="title">Name</td>
                    <?php
                    echo "<td id='content'>" . $profile['name'] . "</td>";
                    ?>
                </tr>
                <tr>
                    <td id="title">Last Name</td>
                    <?php
                    echo "<td id='content'>" . $profile['familyname'] . "</td>";
                    ?>
                </tr>
                <tr>
                    <td id="title">Email</td>
                    <?php
                    echo "<td id='content'>" . $profile['email'] . "</td>";
                    ?>
                </tr>
                <tr>
                    <td id="title">Date of Birth</td>
                    <?php
                    echo "<td id='content'>" . $profile['date'] . " / " . $profile['month'] . "</td>";
                    ?>
                </tr>
            </table>
            <div class="btns">
                <a href="#">수정하기</a>
            </div>
        </div>
    </div>
</body>

</html>