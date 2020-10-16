<?php
$connect = mysqli_connect("localhost", "admin", "admin", "db_cama") or die("connect fail");

$id = $_POST[name];                      //Writer
$pw = $_POST[pw];
$title = $_POST[title];                  //Title
$content = $_POST[content];              //Content
$date = date('Y-m-d H:i:s');            //Date

$URL = './index.php';                   //return URL


$query = "insert into feed (number,title, content, date, hit, id, password) 
                        values(null,'$title', '$content', '$date',0, '$id', '$pw')";


$result = mysqli_query($connect, $query);

if ($result) {
    echo "done!";
    sleep(3);
    echo "<meta http-equiv='refresh' content='0;url=index.php'>";
} else {
    echo "FAIL";
}

mysqli_close($connect);
?>