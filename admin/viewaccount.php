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
    </div><!--close menubar-->	

	<div id="site_content" >
	  <div class="sidebar_container">
	  <fieldset class="fieldset"><legend>All User Which have An Account</legend>
<br>
<div style="margin-left: 20px;">

<div id="content" style="margin-left:30px;margin-top: 20px;">
<div style="height: 700px;width:700px;
border:solid 4px #dldbeg;
overflow-y:scroll;
overflow-x:scroll;">
 <?php
if($con)
 {
 $sql="select * from account";
$recordfound=mysql_query($sql,$con);
if(mysql_affected_rows($con))
{
	echo "<table border='1'>";
echo"<tr> <th>User_ID</th><th>UserName</th> <th>Password</th><th>Status</th></tr>";
	while($row=mysql_fetch_assoc($recordfound))
	echo "<tr> <td>". $row["uid"]."</td><td>".$row["username"]."</td><td>".$row["password"]."</td><td>".$row["status"]."</td></tr>";
	
	echo "</table>";
}
     else
     echo "No records found!";
   }
   else
   echo"connection failed";
?>

</div>

 </div>
 </div>
 </fieldset>
 <br><br><br><br><br><br><br><br><br><br><br><br>  
  <br><br><br><br><br><br><br><br>
   <br><br><br><br>
    </div>
    </div>
      	 <?php
}
else
{
header("location:../index.php");
}
?>    
       <div id="footer">
		   </div>
		   <br><br>
		</div>
<?php
require("footer.php");
?>
   
</body>
</html>
