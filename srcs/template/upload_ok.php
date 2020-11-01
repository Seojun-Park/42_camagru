<?php

// sql에서 들구와서 멤버 이름과 인덱스 추가 후, 원하는 폴더에 저장

function base64ToImage($base64_string, $output_file)
{
  $file = fopen($output_file, "wb");

  $data = explode(',', $base64_string);

  fwrite($file, base64_decode($data[1]));
  fclose($file);

  return $output_file;
}

$up_dir = '../upload/';
$allowed_ext = array('jpg', 'jpeg', 'png', 'gif');

$user = array();
$user['userid'] = "jinpark";
$userid = $user['userid'];

echo var_dump($_POST['send']);

echo "<img src='" . $_POST['send'] . "'alt='test' width='300' />";

if (isset($_POST['send'])) {
  if (file_exists("../upload/$userid") === false) {
    mkdir("../upload/$userid", 0777, true);
  }
  $uploadfile = $up_dir . $userid . "/" . "upimage.jpeg";
  base64ToImage($_POST['send'], "test.jpg");
  echo '<pre>';
}

//   echo "<script>history.back()</script>";
