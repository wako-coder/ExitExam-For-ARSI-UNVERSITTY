<?php
session_start();
include("../connection.php");

	?>
<!DOCTYPE html>
<html lang="en" dir="ltr">


<!-- Mirrored from lema.frontted.com/fixed-student-dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 30 Apr 2022 20:31:35 GMT -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Take exam</title>

    <!-- Prevent the demo from appearing in search engines -->
    <meta name="robots" content="noindex">

    <!-- Perfect Scrollbar -->
    <link type="text/css" href="../assets/vendor/perfect-scrollbar.css" rel="stylesheet">

    <!-- App CSS -->
    <link type="text/css" href="../assets/css/app.css" rel="stylesheet">
    <link type="text/css" href="../assets/css/app.rtl.css" rel="stylesheet">

    <!-- Material Design Icons -->
    <link type="text/css" href="../assets/css/vendor-material-icons.css" rel="stylesheet">
    <link type="text/css" href="../assets/css/vendor-material-icons.rtl.css" rel="stylesheet">

    <!-- Font Awesome FREE Icons -->
    <link type="text/css" href="../assets/css/vendor-fontawesome-free.css" rel="stylesheet">
    <link type="text/css" href="../assets/css/vendor-fontawesome-free.rtl.css" rel="stylesheet">

    <!-- ion Range Slider -->
    <link type="text/css" href="../assets/css/vendor-ion-rangeslider.css" rel="stylesheet">
    <link type="text/css" href="../assets/css/vendor-ion-rangeslider.rtl.css" rel="stylesheet">


    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-115115077-3"></script>
    <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'UA-115115077-3');
    </script>

    <!-- Facebook Pixel Code -->
    <script>
    ! function(f, b, e, v, n, t, s) {
        if (f.fbq) return;
        n = f.fbq = function() {
            n.callMethod ?
                n.callMethod.apply(n, arguments) : n.queue.push(arguments)
        };
        if (!f._fbq) f._fbq = n;
        n.push = n;
        n.loaded = !0;
        n.version = '2.0';
        n.queue = [];
        t = b.createElement(e);
        t.async = !0;
        t.src = v;
        s = b.getElementsByTagName(e)[0];
        s.parentNode.insertBefore(t, s)
    }(window, document, 'script',
        '../connect.facebook.net/en_US/fbevents.js');
    fbq('init', '257843818545228');
    fbq('track', 'PageView');
    </script>
    <noscript><img height="1" width="1" style="display:none"
            src="https://www.facebook.com/tr?id=257843818545228&amp;ev=PageView&amp;noscript=1" /></noscript>
    <!-- End Facebook Pixel Code -->





</head>


<body onload="f1()">
    <div id="main">

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
            <div style="background-color:orange; class="container page__container">
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
                            <div style="background-color:light-gray; class="float-right m-4">

                                Time Allowed<div id="showtime" class="btn btn-warning m-3"></div>
                            </div>

                            <div style="background-color:gray; class="style1">

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
                                <div style="background-color:gray; class="card">
                                    <form id="Exam" action="display.php" method="post">
                                        <div class="card-header">
                                            <div class="media align-items-center">
                                                <div class="media-left">
                                                    <h4 class="m-0 text-primary mr-2">
                                                        <strong>#<?php echo $number;?></strong></h4>
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
                                                    <input id="<?php echo $qid;?>01" type="radio"
                                                        name="<?php echo $qid;?>" class="custom-control-input"
                                                        value="A">
                                                    <label for="<?php echo $qid;?>01"
                                                        class="custom-control-label">A)&nbsp;&nbsp;<?php echo  $option1;?></label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="custom-control custom-radio">
                                                    <input id="<?php echo $qid;?>02" type="radio"
                                                        name="<?php echo $qid;?>" class="custom-control-input"
                                                        value="B">
                                                    <label for="<?php echo $qid;?>02"
                                                        class="custom-control-label">B)&nbsp;&nbsp;<?php echo  $option2;?></label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="custom-control custom-radio">
                                                    <input id="<?php echo $qid;?>03" type="radio"
                                                        name="<?php echo $qid;?>" class="custom-control-input"
                                                        value="C">
                                                    <label for="<?php echo $qid;?>03"
                                                        class="custom-control-label">C)&nbsp;&nbsp;<?php echo  $option3;?></label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="custom-control custom-radio">
                                                    <input id="<?php echo $qid;?>04" type="radio"
                                                        name="<?php echo $qid;?>" class="custom-control-input"
                                                        value="D">
                                                    <label for="<?php echo $qid;?>04"
                                                        class="custom-control-label">D)&nbsp;&nbsp;<?php echo  $option4;?></label>
                                                </div>
                                            </div>
                                        </div>
                                </div>


                                <?php
}
?>
                                
                                </table>
                            </div>
                    </div>
                    <br><br><br>
                    </fieldset>
                </div>
                <br><br><br><br>
                

                <?php
  $query2="select *from matching";
  $rand2=mysql_num_rows(mysql_query($query2,$con));
  
                   //set question
$sq2="select *from matching";

$result2 = mysql_query($sq2,$con);



?>
                <?php

while($row2 = mysql_fetch_array($result2))
{

$qid=$row2["qid"];
$question1=$row2["question1"];
$question2=$row2["question2"];
$question3=$row2["question3"];
$question4=$row2["question4"];
$question5=$row2["question5"];
$option1=$row2["optiona"];   
$option2=$row2["optionb"];
$option3=$row2["optionc"];
$option4=$row2["optiond"];
$option5=$row2["optione"];
$option6=$row2["optionf"];
$option7=$row2["optiong"];
$option8=$row2["optionh"];
$number++;

?>
            </div>

            <div class="container-fliud">
                <div class="row">

                    <div class="col-5 ">
                        <h1 class="text-center m-3">A</h1>
                        <div class="form-group m-4">
                            <p class="form-control  m-4"><strong class="text-primary">#1. </strong><?php echo $question1; ?> </p>
                        </div>
                        <div class="form-group m-4">
                            <p class="form-control  m-4"><strong class="text-primary">#2. </strong><?php echo $question2; ?> </p>
                        </div>
                        <div class="form-group m-4">
                            <p class="form-control  m-4"><strong class="text-primary">#3. </strong><?php echo $question3; ?> </p>
                        </div>
                        <div class="form-group m-4">
                            <p class="form-control  m-4"><strong class="text-primary">#4. </strong><?php echo $question4; ?> </p>
                        </div>
                        <div class="form-group m-4">
                            <p class="form-control  m-4"><strong class="text-primary">#5. </strong><?php echo $question5; ?> </p>
                        </div>
                    </div>
                    <div class="col-6 text-center">
                        <h1 class="m-3">B</h1>
                        <div  class="form-group m-4">

                            <select id="select01" name="answer1" data-toggle="select" class="form-control">
                                <option selected="">select answer</option>
                                <option value="A">A) <?php echo $option1 ?></option>
                                <option value="B">B) <?php echo $option2 ?></option>
                                <option value="C">C) <?php echo $option3 ?></option>
                                <option value="D">D) <?php echo $option4 ?></option>
                                <option value="E">E) <?php echo $option5 ?></option>
                                <option value="F">F) <?php echo $option6 ?></option>
                                <option value="G">G) <?php echo $option7 ?></option>
                                <option value="H">H) <?php echo $option8 ?></option>

                            </select>
                        </div>
                        <div class="form-group m-4">

                            <select id="select01" name="answer2" data-toggle="select" class="form-control">
                                <option selected="">select answer</option>
                                <option value="A">A) <?php echo $option1 ?></option>
                                <option value="B">B) <?php echo $option2 ?></option>
                                <option value="C">C) <?php echo $option3 ?></option>
                                <option value="D">D) <?php echo $option4 ?></option>
                                <option value="E">E) <?php echo $option5 ?></option>
                                <option value="F">F) <?php echo $option6 ?></option>
                                <option value="G">G) <?php echo $option7 ?></option>
                                <option value="H">H) <?php echo $option8 ?></option>

                            </select>
                        </div>
                        <div class="form-group m-4">

                            <select id="select01" name="answer3" data-toggle="select" class="form-control">
                                <option selected="">select answer</option>
                                <option value="A">A) <?php echo $option1 ?></option>
                                <option value="B">B) <?php echo $option2 ?></option>
                                <option value="C">C) <?php echo $option3 ?></option>
                                <option value="D">D) <?php echo $option4 ?></option>
                                <option value="E">E) <?php echo $option5 ?></option>
                                <option value="F">F) <?php echo $option6 ?></option>
                                <option value="G">G) <?php echo $option7 ?></option>
                                <option value="H">H) <?php echo $option8 ?></option>

                            </select>
                        </div>
                        <div style="background-color:orange; class="form-group m-4">

                            <select id="select01" name="answer4" data-toggle="select" class="form-control">
                                <option selected="">select answer</option>
                                <option value="A">A) <?php echo $option1 ?></option>
                                <option value="B">B) <?php echo $option2 ?></option>
                                <option value="C">C) <?php echo $option3 ?></option>
                                <option value="D">D) <?php echo $option4 ?></option>
                                <option value="E">E) <?php echo $option5 ?></option>
                                <option value="F">F) <?php echo $option6 ?></option>
                                <option value="G">G) <?php echo $option7 ?></option>
                                <option value="H">H) <?php echo $option8 ?></option>

                            </select>
                        </div>
                        <div class="form-group m-4">

                            <select id="select01" name="answer5" data-toggle="select" class="form-control">
                                <option selected="">select answer</option>
                                <option value="A">A) <?php echo $option1 ?></option>
                                <option value="B">B) <?php echo $option2 ?></option>
                                <option value="C">C) <?php echo $option3 ?></option>
                                <option value="D">D) <?php echo $option4 ?></option>
                                <option value="E">E) <?php echo $option5 ?></option>
                                <option value="F">F) <?php echo $option6 ?></option>
                                <option value="G">G) <?php echo $option7 ?></option>
                                <option value="H">H) <?php echo $option8 ?></option>

                            </select>
                        </div>

                        <tr>
                                    <td colspan="2"><input type="submit" class="btn btn-danger m-2" name="Submit"
                                            value="submit answer" /></td>
                                </tr><br />
                                </form>
                    </div>
                </div>
            </div>


            <?php

}}
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