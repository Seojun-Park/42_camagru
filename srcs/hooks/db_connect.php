<?php
$s = mysql_connect("localhost", "admin", "admin") or die("fail");
echo "done";
mysql_close($s);
