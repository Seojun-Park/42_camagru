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
            <table class="profile_table">
                <tr>
                    <td id="title">lala</td>
                    <td id="content">lala</td>
                </tr>
                <tr>
                    <td id="title">lalala</td>
                    <td id="content">lalala</td>
                </tr>
            </table>
            <?php
            echo var_dump($profile);
            ?>
        </div>
    </div>
</body>

</html>