<?php
include 'inc_head.php';
include 'func_view.php';
?>

<?php
$list = array(
    'jin' => array(
        'name' => 'jin',
        'familyname' => 'park',
        'email' => 'email@gmail.com',
        'login' => 'jinpark'
    ),
    'dog' => array(
        'name' => 'dog',
        'familyname' => 'park',
        'email' => 'email1@gmail.com',
        'login' => 'doggo'
    ),
    'cat' => array(
        'name' => 'cat',
        'familyname' => 'park',
        'email' => 'email1@gmail.com',
        'login' => 'catty'
    )
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
    ?>
    <div class="wrapper">
        <div class="page_frame">
            feed
        </div>
    </div>
</body>

</html>