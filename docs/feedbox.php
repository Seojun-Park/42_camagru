<?php
$list = array(
    'jin' => array(
        'name' => 'jin',
        'familyname' => 'park',
        'email' => 'email@gmail.com',
        'image' => '../asset/logo.png',
        'login' => 'jinpark'
    ),
    'dog' => array(
        'name' => 'dog',
        'familyname' => 'park',
        'email' => 'email1@gmail.com',
        'image' => '../asset/dog.jpeg',
        'login' => 'doggo'
    ),
    'cat' => array(
        'name' => 'cat',
        'familyname' => 'park',
        'email' => 'email1@gmail.com',
        'image' => '../asset/cat.jpeg',
        'login' => 'catty'
    )
);
?>

<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="styles/feedbox.css" />
</head>

<body>
    <?php
    foreach ($list as $val) {
        echo "<div class='container'>";
        echo  "<div class='feed_head'>" . $val['login'] . "</div>";
        echo  "<div class='feed_body'><div class='body_back'></div><img src='" . $val['image'] . "' alt='feedimg' id='feed_img'/></div>";
        echo  "<div class='feed_footer'>lala</div>";
        echo "</div>";
    }
    ?>
</body>

</html>