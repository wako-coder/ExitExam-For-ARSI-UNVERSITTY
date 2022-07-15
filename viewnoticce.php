<?php
	require("head.php");
	?>

<body>
    <div id="main">
        <?php
	require("testmenu.php");
	?>
        <div class="mdk-header-layout__content page">
            <div class="page__header  page__header-nav mb-0">
                <div class="container page__container">
                    <div class="navbar navbar-secondary navbar-light navbar-expand-sm p-0 d-none d-md-flex"
                        id="secondaryNavbar">
                        <?php 
	                    require("bar.php");
                        ?>
                    </div>
                </div>
            </div>
        </div>


	</div>
	<h1 <tr><td bgcolor="#110ceb"><center><font color="#00ffff" >Wel Come To Notice Page   </font></center></td></tr></h1>
	                             <img src="userphoto/ll.jfif" class="" style="width:1000px;" >

	<div id="site_content">			 
	<div class="container">
<br><br><br>
	<table>
	<tr>
	<td style="line-height: 20px;">
	<?php
	
	include("connection.php");
	include('ps_pagination.php');
	$date=date('Y-m-d');
	
	$sq="SELECT * from notice where Ex_Dates >='$date' ORDER BY dates ASC";
//Create a PS_Pagination object
$pager = new PS_Pagination($con, $sq, 1, 2);
//The paginate() function returns a mysql result set for the current page
$rs = $pager->paginate();	
$sql1=mysql_query("SELECT * from notice where Ex_Dates >='$date' ORDER BY dates ASC") or die(mysql_error());
	$ro=mysql_num_rows($sql1);
	if($ro!='0')
	{
	$sql=mysql_query("SELECT * from notice where Ex_Dates>='$date' ORDER BY dates ASC") or die(mysql_error());
 while($row = mysql_fetch_array($rs))	
	{

	echo"<p align='right'><b>Date:</b>"."<u>".$row['Dates']."</u>"."</p>";
	echo"<font  size='7' color='#347098'><center>"."<u>".$row['title']."</u>"."</center>"."</p>";
	echo "<font  size='3' color='#00000b'>".$row['Content'];
	echo"<font size='4' color='#0000CD'><center>".$row['sender']."</center>"."</p>";

	}
	echo '<div style="text-align:center">'.$pager->renderFullNav().'</div>';
	}
	else
	echo "There No Post Notice Today!!!";
	

	?>
	</td>		
	</tr>
	</table>
	</div>
	<br><br><br><br><br>
	<br><br><br><br><br>
	<br><br><br><br><br>
	<br><br><br><br><br>
	
	</div>      
	<div id="footer">
	</div>

	<!--close footer-->  
	<br><br>
	</div> 
	<?php
	require("footerout.php");
	?>
	</body>
	</html>


