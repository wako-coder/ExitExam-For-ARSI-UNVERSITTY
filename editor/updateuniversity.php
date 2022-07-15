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
        <?php
require("dmu.php");	   
?>
        <div id="header">
            <div id="banner">

                <!--<div id="welcome_slogan"> -->
                <!-- Header Layout Content -->
                <div class="mdk-header-layout__content page">
                    <div class="page__header  page__header-nav mb-0">
                        <div class="container page__container">
                            <div class="navbar navbar-secondary navbar-light navbar-expand-sm p-0 d-none d-md-flex"
                                id="secondaryNavbar">
                                <?php
								require("editormenu.php");	

										
								?>
                            </div>
                        </div>
                    </div>

                </div>
    </div><!--close menubar-->	
  <div id="site_content"></div>  
	<div id="site_content">

	  <div class="sidebar_container">
	  </div>
 <div id="content">
 <center><fieldset class='fieldset'>
 <br>
<table>
<form action="" method="post" enctype="multipart/form-data">
<tr>
<td><input  type="text" name="searchkey" placeholder="Enter User ID " required /></td>
<td><input type="submit" name="search" value="search"/></td>
</tr>
</form>
</table>

<?php
if(isset($_POST["search"]))
	{
	$id=$_POST["searchkey"];
	$sql="select * from university where uid='$id'";
	$recordexist=mysql_query($sql,$con);
	if(mysql_num_rows($recordexist)>0)
	{
	while($row=mysql_fetch_array($recordexist))
	{
	echo "<table width='100%' border=0><form action='' method=post>";
	echo"<tr><td>university ID:</td><td><input type=text name='uid' value='".$row["uid"]."'readonly></td></tr>";
	echo "<tr><td>Enter New university Name:</td><td><input type=text name='uname' value='".$row["uname"]."' required></td></tr>";
	echo "<tr><td><input type=submit name=update value=update></td> ";
	echo "<td><input type=reset value=Cancel></td></tr>";
	echo"</form></table>";
	}	
	}
	else
	echo "No University Is Registerd by $id ID ";
	}
else
{
if(isset($_POST["update"]))
{
		$uid=$_POST["uid"];
		$uname=$_POST["uname"];
	
		$sql="update university set uname='$uname' where uid='$uid'";
		$updated=mysql_query($sql,$con);
		if(mysql_affected_rows($con))
		echo mysql_affected_rows($con)." record/s update successfully!";
		else
		echo "Unable to update!";	
}
}

?>
</fieldset>
</center>
<br><br>
<center>
<?PHP

			if($con)
			{	
			$sql="select * from university ORDER BY  uid asc";
			$record=mysql_query($sql,$con);
			if(mysql_num_rows($record)>0)
			{
			echo"<table border=1 ><tr><th>University ID</th><th>University Name</th></tr>";
			while($row=mysql_fetch_array($record))
			{
			echo "<tr>";
			echo"<td>".$row['uid']."</td>";
			echo"<td>".$row['uname']."</td>";
		
			echo"</tr>";
			}
			echo "</table>";
			}
			else
			echo "No Record Found!";
			}


?>
</center>
 </div> 
<br> <br><br><br><br><br>
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
 <br> <br>  
</div>
<?php
require("footer.php");
?>
</body>
</html>






