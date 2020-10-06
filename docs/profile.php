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
</head>

<body>
    <?php
    echo view('header.php');
    ?>
    <div class="wrapper">
        <div class="page_frame">
            <?php
            echo var_dump($profile);
            ?>
        </div>
    </div>
</body>

</html>