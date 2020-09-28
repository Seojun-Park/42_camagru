<?php
include 'inc_head.php';
include 'func_view.php';

$uri = $_SERVER['REQUEST_URI']; //uri를 구함 
$query = substr($uri, strpos($uri, "?") + 1, strlen($uri));

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
            echo $query;
            ?>
        </div>
    </div>
</body>

</html>