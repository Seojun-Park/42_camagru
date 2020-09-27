<?php
include 'inc_head.php';
include 'func_view.php';
?>

<?php
$list = array(
    array("jin", "qwerty", "123"),
    array("dog", "immadog", "1234"),
    array("cat", "immacat", "12345")
);
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Camagru</title>
    <link rel="stylesheet" href="styles/reset.css" />
    <link rel="stylesheet" href="styles/header.css" />
    <link rel="stylesheet" href="styles/frame.css" />
</head>

<body>
    <?php
    echo view('header.php');
    echo $list[0][1];
    ?>
    <div class="wrapper">
        <div class="page_frame">
            lala
        </div>
    </div>
</body>

</html>