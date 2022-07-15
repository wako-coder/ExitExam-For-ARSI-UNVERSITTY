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
$activity_type="Backup database";
//log file
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


	<div id="site_content">

<div id="content">
<script type = "text/javascript" >
 function preventBack()
 {
 window.history.forward();
 } 
 setTimeout("preventBack()", 0); 
 window.onunload=function(){null};
 
  </script>
<?php
$tables = array();
$query = mysql_query('SHOW TABLES',$con);
while($row = mysql_fetch_row($query))
{
     $tables[] = $row[0];
}

$result = "";
foreach($tables as $table)
{
$query = mysql_query('SELECT * FROM '.$table,$con);
$num_fields = mysql_num_fields($query);

$result .= 'DROP TABLE IF EXISTS '.$table.';';
$row2 = mysql_fetch_row(mysql_query('SHOW CREATE TABLE '.$table,$con));
$result .= "\n\n".$row2[1].";\n\n";

for ($i = 0; $i < $num_fields; $i++)
 {
while($row = mysql_fetch_row($query))
{
   $result .= 'INSERT INTO '.$table.' VALUES(';
     for($j=0; $j<$num_fields; $j++)
     {
       $row[$j] = addslashes($row[$j]);
       $row[$j] = str_replace("\n","\\n",$row[$j]);
       if(isset($row[$j]))
       {
		   $result .= '"'.$row[$j].'"' ; 
		}
		else
		{ 
			$result .= '""';
		}
		if($j<($num_fields-1))
		{ 
			$result .= ',';
		}
    }
   	$result .= ");\n";
}
}
$result .="\n\n";
}

//Create Folder
$folder = 'C:/wamp/www/WBGEE/admin/';
if (!is_dir($folder))
mkdir($folder, 0777, true);
chmod($folder, 0777);

//$date = date('m-d-Y-h-m-s'); 
$filename = $folder."backup"; 

$handle = fopen($filename.'.sql','w+');
$take=fwrite($handle,$result);
fclose($handle);
?>

	
	<?php
	echo"<div style='margin-left:190px;margin-top:50px;font-size:20px;'>";
if($take)
{
 echo "Database Backed Up Successfully!!!<br>";
 echo "<br>Path=$filename";	
 $activity="Admin take backup database to path= $filename";
$logsql=mysql_query("insert into logtable values(' ','$uid','$username','$role','$login_time','$logout_time','$start_time','$activity_type','$activity','$ipaddress','$work_date')");
 
}
else
echo "Unable to take backup!!!!".mysql_error($con);
echo"</div>"  ;    
    ?>

</div>
<br><br><br><br><br><br><br><br><br><br><br><br>  
<br><br><br><br><br><br><br><br><br><br><br><br>
<br><br><br><br>
</div>
<?php
}
else
{
header("location:../index.php");
}
?>    
 
       <div id="footer" >
   
</div>
 <br><br>
 
  </div>
<?php
require("footer.php");
?>
</body>
</html>
