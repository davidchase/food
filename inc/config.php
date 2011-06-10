<?php
$host = "127.0.0.1:8889";
$user = "root";
$pass = "root";
$db = "search";


$connection = mysql_connect($host, $user, $pass) or die ("Unable to connect!");
mysql_select_db($db) or die ("Unable to select database!"); 

?>