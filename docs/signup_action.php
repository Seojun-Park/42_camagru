<?php
function loginCheck($login, $asset)
{
    foreach ($asset as $val)
        if ($val['login'] == $login)
            return true;
    return false;
}

if (
    isset($_POST['name']) && isset($_POST['id']) && isset($_POST['pw']) && isset($_POST['familyname']) && isset($_POST['email']) && isset($_POST['month']) && isset($_POST['date']) && isset($_POST['availabe']) && $_POST['submit'] === "OK"
) {
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
    # Create a connection
    // $url = 'localhost:8080/api/product/read.php';
    $ch = curl_init($url);
    # Form data string
    $postString = http_build_query($data, '', '&');
    # Setting our options
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $postString);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    # Get the response
    $response = curl_exec($ch);
    echo ($response);
    curl_close($ch);
    // Routing to Login page
    echo "<meta http-equiv='refresh' content='0;url=index.php'>";
} else {
    echo "<meta http-equiv='refresh' content='0;url=index.php'>";

    // echo ($response);
}
