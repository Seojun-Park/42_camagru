<?php

function base64ToImage($base64_string, $output_file, $userid){
    chdir("../upload/$userid");
    $file = fopen($output_file, "wb");
    $data = explode(',', $base64_string);
    fwrite($file, base64_decode($data[1]));
    fclose($file);

    return $output_file;
}

// echo var_dump($_POST['send']);

$user = array();

$user['username'] = "jinpark";
$userid = $user['username'];

$date = date('Y-m-d');
$i = 0;

$imagename = $userid . "_" . $i . ".jpg";

if (isset($_POST['send'])) {
    if (file_exists("../upload/$userid") === false) {
      mkdir("../upload/$userid", 0777, true);
    }
    base64ToImage($_POST['send'], $imagename, $userid);
    echo '<pre>';
  }
