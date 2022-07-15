<?php
$server="localhost";
$dbuser="root";
$dbpass="";
$dbname="bank";
$conn=mysql_connect($server,$dbuser,$dbpass) or die(mysql_error($conn));
mysql_select_db($dbname,$conn) or die(mysql_error($conn));
?>
