<?php
$server="localhost";
$dbuser="root";
$dbpass="";
$dbname="ExitExam";
$con=mysql_connect($server,$dbuser,$dbpass) or die(mysql_error($con));
mysql_select_db($dbname,$con) or die(mysql_error($con));
?>
