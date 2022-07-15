 <!-- Header -->
 <?php
$fullname=$_SESSION['fullname'];
$uname=$_SESSION['sun'];
$role=$_SESSION['role'];
$photo=$_SESSION['sphoto'];
?>
 <div id="header" class="mdk-header bg-dark js-mdk-header m-0" data-fixed data-effects="waterfall">
            <div class="mdk-header__content">

                <div class="navbar navbar-expand-sm navbar-main navbar-dark bg-primary pl-md-0 pr-0" id="navbar" data-primary>
                    <div class="container">

                        <!-- Navbar toggler -->
                        <button class="navbar-toggler navbar-toggler-custom d-lg-none d-flex mr-navbar" type="button" data-toggle="sidebar">
                            <span class="material-icons">short_text</span>
                        </button>


                        <div class="d-flex sidebar-account flex-shrink-0 mr-auto mr-lg-0">
                            <a href="fixed-index.html" class="flex d-flex align-items-center text-underline-0">
                                <span class="mr-1  text-white">
                                    <!-- LOGO -->
                                    <img src="../logo.jpg" alt="" class="rounded-circle" width="54" height="54">

                                    <!-- <img width="700" height="50" src="image/Newlog.jpg">  -->
                                </span>
                                <span class="flex d-flex flex-column text-white">
                                    <strong class="sidebar-brand">Web Based Exit Examination System For Arsi University</strong>
                                </span>
                            </a>
                        </div>
                        <ul class="ml-auto nav navbar-nav mr-2 d-none d-lg-flex">
                            <li class="nav-item"><a href="#" class="nav-link"><?php
                        echo"Today:";
                        echo(date('d-m-Y'));
                        echo"<div id='clock'></div>";
                        ?></a></li>
                        </ul>
                        <div class="dropdown">
                            <a href="#account_menu" class="dropdown-toggle navbar-toggler navbar-toggler-dashboard border-left d-flex align-items-center ml-navbar" data-toggle="dropdown">
                            <?php echo "<img src='../editor/$photo' class='rounded-circle' width='30' alt='Frontted'>" ?>
                                <span class="ml-1 d-flex-inline">
                                    <span class="text-light"><?php echo $uname;?></span>
                                </span>
                            </a>
                            <div id="company_menu" class="dropdown-menu dropdown-menu-right navbar-company-menu">
                               
                       
                                <a class="dropdown-item d-flex align-items-center py-2" href="../logout.php">
                                    <span class="material-icons mr-2">exit_to_app</span> Logout
                                </a>
                            </div>
                        </div>
                  
                    </div>
                </div>

            </div>
        </div>