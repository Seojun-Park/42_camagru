<?php 

$query = $_SERVER['QUERY_STRING'];
$expl = explode("&", $query);
echo $expl[0] . $expl[1];
