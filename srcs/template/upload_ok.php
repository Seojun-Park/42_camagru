<?php

// sql에서 들구와서 멤버 이름과 인덱스 추가 후, 원하는 폴더에 저장

function base64ToImage($base64_string, $output_file, $userid)
{
  chdir("../upload/$userid");
  $file = fopen($output_file, "wb");

  $data = explode(',', $base64_string);

  fwrite($file, base64_decode($data[1]));
  fclose($file);

  return $output_file;
}

$up_dir = '../upload/';


$user = array();
$feed = array();
$feed['name'] = "jinpark_0.jpg";
if (isset($feed['name'])) {
  $tmp = explode("_", $feed['name']);
  $imgindex = explode(".", $tmp[1])[0];
  $i = intval($imgindex) + 1;
} else {
  $i = 0;
}

$user['userid'] = "jinpark";
$userid = $user['userid'];

$imageName = $userid . "_" . $i . ".jpg";

echo "<img src='" . $_POST['send'] . "'alt='test' width='300' />";

if (isset($_POST['send'])) {
  if (file_exists("../upload/$userid") === false) {
    mkdir("../upload/$userid", 0777, true);
  }
  $path = base64ToImage($_POST['send'], $imageName, $userid);
  echo $imageName;
  echo '<pre>';
}

echo "<script>alert('Upload Success!')</script>";
// echo "<script>history.back()</script>";