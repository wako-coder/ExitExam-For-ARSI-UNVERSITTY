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

		<div class="conatiner">
			<div class="row">
				<div class="col-2">
				
				<?php
								 require("editorsidelink.php");
								 ?>
				</div>
				<div class="col-7">
				
                        We can update Each Exam Date information Except id</legend>
                            <br>
                            <div style="margin-left: 45px; background-color:#bccdf1;width: 500px;">
                                <br>
                                <center>
                                    <table>
                                        <form action="" method="post">
                                            <tr>
                                                <td><input type="text" name="key" placeholder="Enter  ID number" /></td>
                                                <td><input type="submit" name="serarch" value="search" /></td>

                                            </tr>

                                            <tr>
                                                <td colspan="2" width="535px">
                                                    <hr style="border-color: #801137;">
                                                </td>
                                            </tr>
                                            <?php
 if(isset($_POST["serarch"]))
{
	$key=$_POST["key"];
	$sql="select*from examdate where date_id='$key'";
	$recordfound=mysql_query($sql,$con);
if(mysql_affected_rows($con))
{
while($row=mysql_fetch_assoc($recordfound))
{	
echo"<tr><td>Date_ID:</td><td><input type=text name='dateid' value='".$row["date_id"]."'readonly></td></tr>";
echo "<tr><td>Question Type:</td>";
echo"<td><select name='qtype'>";
	?>
                                            <option value="Regular" selected>Regular</option>
                                            <option value="Re_Exam">Re_Exam</option>
                                            <option value="Payment">Payment</option>
                                            <?php	
echo"</td></select</tr>";
echo "<tr><td>start_date:</td><td><input type=date name='sdate' value='".$row["start_date"]."'</td></tr>";
echo "<tr><td>end_date:</td><td><input type=date name='edate' value='".$row["end_date"]."'</td></tr>";
echo "<tr><td>start_time:</td><td><input type=time name='stime' value='".$row["start_time"]."'</td></tr>";
echo "<tr><td>end_time:</td><td><input type=time name='etime' value='".$row["end_time"]."'</td></tr>";
echo "<tr><td>Year :</td><td><input type=text name='year' value='".$row["year"]."' ></td></tr>";
echo "<tr><td><input type=submit name='update' value='update'></td> ";
echo "<td><input type=reset value=Cancel></td></tr>";
}}
	else
	echo "No result found!!!";		
}
else
{
if(isset($_POST["update"]))
{
$did=$_POST["dateid"];
$sdate=$_POST["sdate"];
$edate=$_POST["edate"];
$stime=$_POST["stime"];
$etime=$_POST["etime"];
$year=$_POST["year"];
$qtype=$_POST["qtype"];	
$sql="update examdate  set question_type='$qtype', start_date ='$sdate',end_date='$edate',start_time='$stime',end_time='$etime',year='$year' where date_id='$did'";
$updated=mysql_query($sql,$con);
if(mysql_affected_rows($con))
echo mysql_affected_rows($con)."  a record/s update successfully!".mysql_error($con);
else
echo "Unable to update!".mysql_error($con);
	}
}

?>
                                        </form>
                                    </table>
                                </center>
                            </div>
                            <br>
                        </fieldset>


                    </div>
                </div>
            </div>
        </div>
        <?php
}
else
{
header("location:../index.php");
}
?>

</div>
</div>
</div>    <div id="footer">
        </div>

        <!--close footer-->
        <br> <br>
    </div>
    <?php
require("footer.php");
?>
</body>

</html>