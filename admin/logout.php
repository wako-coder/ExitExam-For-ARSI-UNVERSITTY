 
<?php  
  
session_start();
unset($_SESSION['fullname']);
unset($_SESSION['sun']);
unset($_SESSION['spw']);
unset($_SESSION['srole']);

if( !isset($_SESSION['sun']) || !isset($_SESSION['spw'])||!isset($_SESSION['fullname'])||!isset($_SESSION['srole']))
header("location:index.php");

?>  
