<?php
include $_SERVER['DOCUMENT_ROOT'] . "/db.php";

function base64ToImage($base64_string, $output_file, $userid)
{
  chdir("../../upload/$userid");
  $file = fopen($output_file, "wb");

  $data = explode(',', $base64_string);

  fwrite($file, base64_decode($data[1]));
  fclose($file);

  return $output_file;
}

$date = date('Y-m-d');

$sql = mq("select * from member where id='" . $_SESSION['userid'] . "'");
$user = $sql->fetch_array();
$userid = $user['username'];
$imgsql = mq("select * from feed where userid='" . $userid . "'");
$feed = $imgsql->fetch_array();
if ($feed !== NULL) {
  $tmp = explode("_", $feed['name']);
  $imgindex = explode(".", $tmp[1])[0];
  $i = intval($imgindex) + 1;
} else {
  $i = 0;
}

$imagename = $userid . "_" . $i . ".jpg";

$sqlsend = mq("insert into feed(userid, imgname, date) values('" . $userid . "','" . $imagename . "','" . $date . "')");

// echo "<img src='" . $_POST['send'] . "'alt='test' width='300' />";

if (isset($_POST['send'])) {
  if (file_exists("../upload/$userid") === false) {
    mkdir("../upload/$userid", 0777, true);
  }
  base64ToImage($_POST['send'], $imagename, $userid);
  echo '<pre>';
}
echo "<script>alert('Upload Success!')</script>";
echo "<script>location.href('/page/feed/gallery.php')</script>";
