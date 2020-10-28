<?php 
$up_dir = '/upload/';
$allowed_ext = array('jpg', 'jpeg', 'png', 'gif');

$error = $_FILES['upimage']['error'];
$name = $_FILES['upimage']['name'];
$ext = array_pop(explode('.', $name));


if (count($_FILES)) {
  $uploadfile = $up_dir . basename($_FILES['upimage']['name']);

  echo '<pre>';
  if (move_uploaded_file($_FILES['upimage']['tmp_name'], $uploadfile)) {
      echo "File is valid, and was successfully uploaded.\n";
  } else {
      echo "Error occured!\n";
      echo 'Here is some more debugging info:';
      print_r($_FILES);
  }

//   echo "<script>history.back()</script>";
}
