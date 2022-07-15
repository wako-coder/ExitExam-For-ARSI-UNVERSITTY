<?php
session_start();
include("../connection.php");
require("head.php");

?>


<body>
    <div id="main">
    <?php
if(isset($_SESSION['sun'])&&isset($_SESSION['spw']))
{
$uid=$_SESSION['$uid'];
$username=$_SESSION['sun'];
$role=$_SESSION['role'];
$login_time=$_SESSION['login_time'];
$logout_time="empty";


//start log file record....
//log file find ip address
if(!empty($_SERVER["HTTP_CLIENT_IP"]))
$ipaddress=$http_client_ip;
elseif(!empty($_SERVER["HTTP_X_FORWARDED_FOR"]))
$ipaddress=$http_x_forwarded_for;	
else
$ipaddress=$_SERVER['REMOTE_ADDR'];
// some variable declaration
$start_time = date("d M Y @ h:i:s");
$work_date=date('Y-m-d');
$activity_type="Restore database ";


?>
        <div id="header">
            <div id="banner">

                <!--<div id="welcome_slogan"> -->

                <?php
require("dmu.php");	   
?>
                <!--</div> <!--close welcome_slogan-->
            </div>
            <!--close banner-->
        </div>
        <!--close header-->
        <div class="mdk-header-layout__content page">
            <div class="page__header  page__header-nav mb-0">
                <div class="container page__container">
                    <div class="navbar navbar-secondary navbar-light navbar-expand-sm p-0 d-none d-md-flex"
                        id="secondaryNavbar">
                        <?php 
	                   require("adminmenu.php");	
                        ?>
                    </div>
                </div>
            </div>

        </div>

    </div>
    </div>
    </div>
    <br> <br>
    <!--close menubar-->
    <div class="container">
 
	<div id="navigation">
	<?php
	
	function restoreDatabaseTables($dbHost, $dbUsername, $dbPassword, $dbName, $filePath)
	{
    // Connect & select the database
    $db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName); 

    // Temporary variable, used to store current query
    $templine = '';
    
    // Read in entire file
    $lines = file($filePath);
    
    $error = '';
    
    // Loop through each line
    foreach ($lines as $line){
        // Skip it if it's a comment
        if(substr($line, 0, 2) == '--' || $line == ''){
            continue;
        }
        
        // Add this line to the current segment
        $templine .= $line;
        
        // If it has a semicolon at the end, it's the end of the query
        if (substr(trim($line), -1, 1) == ';'){
            // Perform the query
            if(!$db->query($templine)){
                $error .= 'Error performing query "<b>' . $templine . '</b>": ' . $db->error . '<br /><br />';
            }
            
            // Reset temp variable to empty
            $templine = '';
        }
    }
    return !empty($error)?$error:true;
 
}	
?>

    </div><!--close menubar-->	

	<div id="site_content">
	  <div class="sidebar_container">
<div id="content" style="width: 850px; margin-left:70px;margin-top: 70px;font-style:bold;font-size: 25px;font-family: times new roman;line-height: 2px;">

 
 <?php
 $domain="localhost";
$dbuser="root";
$dbpass="";
$dbname="ExitExam";
 $x=0;
mysql_connect($domain,$dbuser,$dbpass) or die(mysql_error());
if(mysql_select_db($dbname))
$x=1;
else
$x=2;
if($x==2)
{
	
mysql_query("create database ExitExam") or die(mysql_error());
		echo "<br>Your Database is Successfully created";
}else if($x==1)

{ 
$filePath  = 'C:/wamp/www/WBGEE/admin/backup.sql';
$restore=restoreDatabaseTables($domain, $dbuser, $dbpass, $dbname, $filePath);
if($restore)
{
 echo"<br>Database Is Successfully Is Restore";
  $activity="Admin restore database from  path= $filePath";
 
//log file
$logsql=mysql_query("insert into logtable values(' ','$uid','$username','$role','$login_time','$logout_time','$start_time','$activity_type','$activity','$ipaddress','$work_date')");
}
 else
 echo"<br>Database Is not Successfully Is Restore".mysql_error($con);
}



//$output = "D:/restore/test.sql";
//exec("D:/xampp/mysql/bin/mysql --opt -h $dbhost -u $dbuser -p $dbpass $dbname < $output");
//echo "Restore complete!";

 ?>
 </div>
       <br><br><br><br><br><br><br><br><br><br><br><br>  
  <br><br><br><br><br><br><br><br><br><br><br><br>
   <br><br><br><br>
      </div>
   
   </div>
       <div id="footer">
   
</div>
<?php
}
else
{
  header("location:../index.php");
}?>
 <br><br>
  </div>
  <?php
  require("footer.php");
  ?>
</body>
</html>
