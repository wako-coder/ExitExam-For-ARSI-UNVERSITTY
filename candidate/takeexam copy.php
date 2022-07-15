<?php
session_start();
include("../connection.php");
require("head.php");

	?>
<div id="main">

    <body onload="f1()">

        <div id="main">
            <?php
if(isset($_SESSION['sun'])&&isset($_SESSION['spw']))
{
$uid=$_SESSION['$uid'];
$username=$_SESSION['sun'];
$role=$_SESSION['role'];
$login_time=$_SESSION['login_time'];
$logout_time="empty";
$count=0;//check take exam before this or not
$number=0;//role number question
	//check department
 $sql="select * from candidate where cid='$uid'";
$recordfound=mysql_query($sql,$con);
while($row=mysql_fetch_assoc($recordfound))
{
 $dept=$row["dept"];
 $univesity=$row["unversity"];
 $year=$row["year"];
 
$_SESSION['dept']=$dept;
$_SESSION['univesity']=$univesity;
$_SESSION['year']=$year;
 }
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
            <div id="navigation">
                <?php
require("candmenu.php");	

		
?>

            </div>
            <!--close menubar-->
            <div class="container page__container">
                <div id="site_content"></div>
                <div id="site_content">
                    <div class="sidebar_container">
                    </div>

                    <div id="content">
                        <fieldset class="fieldset">
                            <br><br>
                            <?php
$fullname=$_SESSION['fullname'];
$uname=$_SESSION['sun'];
$role=$_SESSION['role'];
$photo=$_SESSION['sphoto'];

?>
<div class="float-right m-4">

Time Allowed<div id="showtime" class="btn btn-warning m-3"></div>
</div>
   
                            <div class="style1">

                                <?php
// Retrive time According to Department
$sq="select * from timer where dept='$dept' and question_type='Regular' and year='$year'";
$t=mysql_query($sq,$con);
while($row=mysql_fetch_array($t))
{
	$h=$row["hour"];
	$m=$row["min"];
}
?>
                                <script language="javascript">
                                var tim;
                                var hour = <?php echo $h;?>;
                                var min = <?php echo $m+1;?>;
                                var sec = 0;
                                var f = new Date();

                                function f1() {
                                    f2();
                                    document.getElementById("starttime").innerHTML = "Your started  Exam at " + f
                                        .getHours() + ":" + f.getMinutes();
                                }

                                function f2() {
                                    if (parseInt(sec) > 0) {
                                        sec = parseInt(sec) - 1;
                                        document.getElementById("showtime").innerHTML = hour + " :" + min + " :" + sec;
                                        tim = setTimeout("f2()", 1000);
                                    } else {
                                        if (parseInt(sec) == 0) {
                                            min = parseInt(min) - 1;

                                            if (parseInt(min) == 0) {
                                                var m = document.getElementById('Exam');
                                                m.submit();
                                                clearTimeout(tim);

                                            } else {
                                                sec = 60;
                                                document.getElementById("showtime").innerHTML = "Your Left Time is " +
                                                    min + " Min " + sec + " Sec";
                                                tim = setTimeout("f2()", 1000);
                                            }
                                        }
                                    }
                                }
                                </script>

                                <?php
$query="select *from question";
$rand=mysql_num_rows(mysql_query($query,$con));


//set question
$sq="select *from question WHERE dept='$dept' and status='active' and year='$year' and question_type='Regular' ORDER BY RAND() 
    LIMIT $rand ";
$result = mysql_query($sq,$con);
// Loop through each records
?>
                                <?php	
while($row = mysql_fetch_array($result))
{
$qid=$row["qid"];
$question=$row["question"];
$option1=$row["optiona"];   
$option2=$row["optionb"];
$option3=$row["optionc"];
$option4=$row["optiond"];
$number++;
?>
      <div class="card">   <form id="Exam" action="display.php" method="post">
                                    <div class="card-header">
                                        <div class="media align-items-center">
                                            <div class="media-left">
                                                <h4 class="m-0 text-primary mr-2"><strong>#<?php echo $number;?></strong></h4>
                                            </div>
                                            <div class="media-body">
                                                <h4 class="card-title m-0">
												<?php echo $question;?>
												</h4>
                                            </div>
                                        </div>
                                    </div>

									<div class="card-body">
                                        <div class="form-group">
                                            <div class="custom-control custom-radio">
											<input id="<?php echo $qid;?>01" type="radio" name="<?php echo $qid;?>"  class="custom-control-input" value="A">
                                                <label for="<?php echo $qid;?>01" class="custom-control-label">A)&nbsp;&nbsp;<?php echo  $option1;?></label>
											</div>
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-radio">
											<input id="<?php echo $qid;?>02" type="radio" name="<?php echo $qid;?>"  class="custom-control-input" value="B">
                                                <label for="<?php echo $qid;?>02" class="custom-control-label">B)&nbsp;&nbsp;<?php echo  $option2;?></label>
											</div>
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-radio">
											<input id="<?php echo $qid;?>03" type="radio" name="<?php echo $qid;?>"  class="custom-control-input" value="C">
                                                <label for="<?php echo $qid;?>03" class="custom-control-label">C)&nbsp;&nbsp;<?php echo  $option3;?></label>
											</div>
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-radio">
											<input id="<?php echo $qid;?>04" type="radio" name="<?php echo $qid;?>"  class="custom-control-input" value="D">
                                                <label for="<?php echo $qid;?>04" class="custom-control-label">D)&nbsp;&nbsp;<?php echo  $option4;?></label>
											</div>
                                        </div>
										</div>
                                    </div>
                                

                                            <?php
}
?>
                                            <tr>
                                                <td colspan="2"><input type="submit" class="btn btn-danger m-2"
                                                        name="Submit" value="submit answer" /></td>
                                            </tr><br />
                                        </form>
                                    </table>
                                </div>
                            </div>
                            <br><br><br>
                        </fieldset>
                    </div>
                    <br><br><br><br>
                    <br><br><br><br>
<?php
                    //set question
$sq="select *from matching WHERE dept='$dept' and status='active' and year='$year' and question_type='Regular' ORDER BY RAND() 
    LIMIT $rand ";
$result = mysql_query($sq,$con);
// Loop through each records
?>
                                <?php	
while($row = mysql_fetch_array($result))
{
$qid=$row["qid"];
$question1=$row["question1"];
$question2=$row["question2"];
$question3=$row["question3"];
$question4=$row["question4"];
$question5=$row["question5"];
$option1=$row["optiona"];   
$option2=$row["optionb"];
$option3=$row["optionc"];
$option4=$row["optiond"];
$option5=$row["optione"];
$option6=$row["optionf"];
$option7=$row["optiong"];
$option8=$row["optionh"];
$number++;
}
?>



                    <?php
}
else
{
header("location:../index.php");
}?>
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