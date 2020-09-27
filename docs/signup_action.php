<?php
function loginCheck($login, $asset)
{
    foreach ($asset as $val)
        if ($val['login'] == $login)
            return true;
    return false;
}

if (
    isset($_POST['name'])
    && isset($_POST['id'])
    && isset($_POST['pw'])
    && isset($_POST['name'])
    && isset($_POST['familyname'])
    && isset($_POST['email'])
    && isset($_POST['month'])
    && isset($_POST['date'])
    && isset($_POST['available'])
    && $_POST['submit'] === "OK"
) {
    if (file_exists("db") === false)
        mkdir("db", 0777, true);
    $cont = [];
    if (file_exists("../db/account"))
        $cont = file_get_contents("../db/account");
    $data = array(
        'name' => $_POST['name'],
        'familyname' => $_POST['familyname'],
        'id' => $_POST['id'],
        'pw' => $_POST['pw'],
        'email' => $_POST['email'],
        'month' => $_POST['month'],
        'date' => $_POST['date'],
        'available' => $_POST['available']
    );
    $newCont[] = $data;
    file_put_contents('../db/account', serialize($newCont));
} else {
    echo $_POST['name']."\n";
    echo $_POST['id']."\n";
    echo $_POST['pw']."\n";
    echo $_POST['email']."\n";
    echo $_POST['familyname']."\n";
    echo $_POST['month']."\n";
    echo $_POST['date']."\n";
    echo $_POST['available']."\n";

    echo "ERROR, pls try again\n";
    sleep(2);
    echo "<meta http-equiv='refresh' content='0;url=index.php'>";
}
