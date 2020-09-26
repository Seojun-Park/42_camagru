<?php
include 'inc_head.php';
include 'func_view.php';

if ($login == FALSE) {
    echo view('auth.html');
} else {
    echo "<meta http-equiv='refresh' content='0;url=main.php'>";
}
