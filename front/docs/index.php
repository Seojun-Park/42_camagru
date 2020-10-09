<?php
include 'inc_head.php';
include 'func_view.php';

if ($login == FALSE) {
    echo view('auth.html');
} else {
    // $uri = $_SERVER['REQUEST_URI']; //uri를 구함 
    // $query = substr($uri, strpos($uri, "?") + 1, strlen($uri));
    echo "<meta http-equiv='refresh' content='0;url=main.php?" . $_SESSION['login'] . "'>";
}
