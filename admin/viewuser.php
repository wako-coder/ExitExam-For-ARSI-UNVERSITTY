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
<div id="site_content" >
<div id="content">
<fieldset class="fieldset"><legend>All system  User </legend>
<br>
<div style="margin-left: 20px; background-color:#bccdf1;">

<div id="content" style="margin-top: 20px;">
<div style="height:900px;width:900px;
border:solid 4px #dldbeg;
overflow-y:scroll;
overflow-x:scroll;">
<div  align="center">
<?php
if($con)
 {
 $sql="select * from user";
$recordfound=mysql_query($sql,$con);
if(mysql_affected_rows($con))
{
	echo "<table border='1'>";
echo"<tr> <th>User_ID</th><th>Frist Name</th> <th>Father Name</th><th>Lname Name</th><th>sex</th><th>Mobile</th><th>Email</th><th>photo</th><th>Role</th></tr>";
	while($row=mysql_fetch_assoc($recordfound))
	echo "<tr> <td>". $row["uid"]."</td><td>".$row["ufname"]."</td><td>".$row["umname"]."</td><td>".$row["ulname"]."</td><td>".$row["sex"]."</td><td>".$row["mobile"]."</td><td>".$row["email"]."</td><td><img src=".$row["photo"]." width=60 height=70 alt=images></td><td>".$row["role"]."</td></tr>";
	
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
 </div>
  </fieldset>
 <br><br>
    
    </div>
      	 <?php
}
else
{
header("location:../index.php");
}
?>    
   </div>
       <div id="footer">
 </div> 
 <br> <br> 
</div>
<?php
require("footer.php");
?>
</body>
</html>
