<?php
$up_dir = '../upload/';
$allowed_ext = array('jpg', 'jpeg', 'png', 'gif');

$user = array();
$user['userid'] = "jinpark";
$userid = $user['userid'];

$error = $_FILES['upimage']['error'];
$name = $_FILES['upimage']['name'];
$ext = array_pop(explode('.', $name));

echo var_dump($_FILES['upimage']);


if (count($_FILES)) {
  if (file_exists("../upload/$userid") === false) {
    mkdir("../upload/$userid", 0777, true);
  }
  $uploadfile = $up_dir . $userid . "/" . basename($_FILES['upimage']['name']);

  echo '<pre>';
  if (move_uploaded_file($_FILES['upimage']['tmp_name'], $uploadfile)) {
    echo "File is valid, and was successfully uploaded.\n";
    // echo "<script>alert('Upload success!');location.href('#');</script>";
  } else {
    echo "Error occured!\n";
    echo 'Here is some more debugging info:';
    print_r($_FILES);
    echo "<script>alert('Error occurd!'); history.back();</script>";
  }

  //   echo "<script>history.back()</script>";
}
