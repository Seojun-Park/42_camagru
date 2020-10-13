<?php
include 'hooks/inc_head.php';
include 'hooks/func_view.php';

if ($login == FALSE) {
    echo view('routes/auth.html');
} else {
    // $uri = $_SERVER['REQUEST_URI']; //uri를 구함 
    // $query = substr($uri, strpos($uri, "?") + 1, strlen($uri));
    echo "<meta http-equiv='refresh' content='0;url=routes/main.php?" . $_SESSION['login'] . "'>";
}
