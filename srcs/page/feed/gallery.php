<?php
include $_SERVER['DOCUMENT_ROOT'] . "/db.php";
include $_SERVER['DOCUMENT_ROOT'] . "/hooks/func_view.php";


$sql = mq("select * from feed");
$feed = $sql->fetch_array();

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Camagru_Gallery</title>
    <link rel="stylesheet" href="../css/reset.css" />
    <link rel="stylesheet" href="../css/header.css" />
    <link rel="stylesheet" href="../css/gallery.css" />
</head>

<body>
    <?php
    if (isset($_SESSION['userid'])) {
        $mesql = mq("select * from member where id='" . $_SESSION['userid'] . "'");
        $me = $mesql->fetch_array();
        ?>
        <div class='header'>
            <?php echo view('header.php'); ?>
        </div>
        <div class="wrapper">
            <div class="box_t1">
                t1 box
            </div>
            <div class="box_t2">
                t2 obx
            </div>
            <div class="box_t3">
                t3 obx
            </div>
            <div class="box_t1">
                t3 obx
            </div>
        </div>
        <div class="header">
            <?php echo view('footer.html') ?>
        </div>
    <?php
    } else {
        echo "<script>alert('잘못된 접근입니다.'); history.back();</script>";
    }
    ?>
</body>

</html>