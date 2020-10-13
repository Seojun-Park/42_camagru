<?php
$list = array(
    'jin' => array(
        'name' => 'jin',
        'familyname' => 'park',
        'email' => 'email@gmail.com',
        'image' => '../asset/logo.png',
        'avatar' => '../asset/logo.png',
        'feed' => 'Hello there',
        'login' => 'jinpark'
    ),
    'dog' => array(
        'name' => 'dog',
        'familyname' => 'park',
        'email' => 'email1@gmail.com',
        'image' => '../asset/dog.jpeg',
        'avatar' => '../asset/dog.jpeg',
        'feed' => 'lalala',
        'login' => 'doggo'
    ),
    'cat' => array(
        'name' => 'cat',
        'familyname' => 'park',
        'email' => 'email1@gmail.com',
        'image' => '../asset/cat.jpeg',
        'avatar' => '../asset/cat.jpeg',
        'feed' => 'lalala',
        'login' => 'catty'
    )
);
?>

<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="../styles/feedbox.css" />
</head>

<body>
    <?php
    foreach ($list as $val) {
        echo "<li class='container'>";
        echo "<div class='feed_head'><a href='profile.php?" . $val['login'] . "' class='feed_headbox'><img src='" . $val['avatar'] . "' alt='avatar' id='avatar'></img><span class='feed_login'>" . $val['login'] . "</span></a></div>";
        echo "<div class='feed_body'><div class='body_back'></div><img src='" . $val['image'] . "' alt='feedimg' id='feed_img'/></div>";
        echo "<div class='feed_footer'><p class='feed_text'>" . $val['feed'] . "</p>";
        echo "<div class='feed_repl'>lalal</div></div>";
        echo "</li>";
    }
    ?>
</body>

</html>