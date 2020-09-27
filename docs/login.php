<?php
include 'inc_head.php';

function auth($id, $passwd)
{
    $db = unserialize(file_get_contents("../db/account"));
    foreach ($db as $val) {
        if (($val['id'] == $id) && ($val['pw'] == $passwd))
            return true;
    }
    return false;
}

if (isset($_POST['id']) && isset($_POST['pw']) && $_POST['submit'] == "OK") {
    $data = array(
        'login' => $_POST['id'],
        'pw' => $_POST['pw']
    );
    if (auth($_POST['id'], $_POST['pw']) == true) {
        $res = "OK";
    } else {
        echo "Your ID / password is not matched, Please check it again";
        sleep(2);
        echo "<meta http-equiv='refresh' content='0;url=index.php'>";
    }
    // session login example / routing to main page
    if ($res == "OK") {
        $_SESSION['logged_in'] = $data['login'];
        echo "<meta http-equiv='refresh' content='0;url=index.php'>";
    }
} else {
    echo "err check needed";
}
