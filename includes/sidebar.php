<?php 
//print_r($_SESSION);
//session_start();
include("includes/dbConnection.php");?>
<!--left navigation start-->
<aside class="sidebar-navigation">
    <div class="scrollbar-wrapper">
        <div>
            <button type="button" class="button-menu-mobile btn-mobile-view visible-xs visible-sm">
                <i class="mdi mdi-close"></i>
            </button>
            <!-- User Detail box -->                
            <?php if ($_SESSION['user_type'] == 'Admin') {


                ?>
                <div class="user-details">
                    <div class="pull-left">
                        <!-- <img src="assets/images/users/avatar-1.jpg" alt="" class="thumb-md img-circle"> -->
                    </div>
                    <div class="user-info">
                        <b><div style="margin-left:-64px;" id="after_login">Welcome <?php if(isset($_SESSION['first_name'])){ echo $_SESSION['first_name']; }?></div></b>
                    </div>
                </div>
                <!--- End User Detail box -->

                <!-- Left Menu Start -->
                <ul class="metisMenu nav" id="side-menu">
                    <li><a href="index.php"><i class="ti-home"></i> Dashboard </a></li>
                    <li>
                        <a href="javascript: void(0);" aria-expanded="true">Employee <span class="fa arrow"></span></a>
                        <ul class="nav-second-level nav" aria-expanded="true">
                            <li><a href="employee_reg.php">Employee Registration</a></li>
                            <li><a href="employee_profile.php">Employee Profile</a></li>
                            <li><a href="employee_view.php">Employee View</a></li>
                            <li><a href="employee_edit.php">Employee Edit</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript: void(0);" aria-expanded="true">Leave Manage <span class="fa arrow"></span></a>
                        <ul class="nav-second-level nav" aria-expanded="true">
                            <li><a href="leave_manager.php">Leave Manager</a></li>
                            <li><a href="leave_view.php">Leave View</a></li>

                        </ul>
                    </li>
                    <li>
                        <a href="javascript: void(0);" aria-expanded="true">News Section <span class="fa arrow"></span></a>
                        <ul class="nav-second-level nav" aria-expanded="true">
                            <li><a href="news_section.php">NEWS Registration</a></li>
                            <li><a href="news_view.php">NEWS View</a></li>
                            <li><a href="news_edit.php">NEWS Edit</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript: void(0);" aria-expanded="true">Policy <span class="fa arrow"></span></a>
                        <ul class="nav-second-level nav" aria-expanded="true">
                            <li><a href="policy.php">policy Registration</a></li>
                            <li><a href="policy_edit.php">policy View</a></li>
                            <li><a href="policy_view.php">policy Edit</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript: void(0);" aria-expanded="true">Bills <span class="fa arrow"></span></a>
                        <ul class="nav-second-level nav" aria-expanded="true">
                            <li><a href="bill.php">Bills Registration</a></li>
                            <li><a href="bill_view.php">Bills Profile</a></li>
                            <li><a href="bill_view.php">Bills View</a></li>
                        </ul>
                    </li>                                
                </ul>
                <?php } else {?>
                <div class="user-details">
                    <div class="pull-left">
                        <!-- <img src="assets/images/users/avatar-1.jpg" alt="" class="thumb-md img-circle"> -->
                    </div>
                    <div class="user-info">
                        <b><div style="margin-left:-64px;" id="after_login">Welcome <?php if(isset($_SESSION['first_name'])){ echo $_SESSION['first_name']; }?></div></b>
                    </div>
                </div>
                <!--- End User Detail box -->

                <!-- Left Menu Start -->
                <ul class="metisMenu nav" id="side-menu">
                    <li><a href="index.php"><i class="ti-home"></i> Dashboard </a></li>
                    <li>
                        <a href="javascript: void(0);" aria-expanded="true">Employee <span class="fa arrow"></span></a>
                        <ul class="nav-second-level nav" aria-expanded="true">
                            <li><a href="employee_profile.php">Employee Profile</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript: void(0);" aria-expanded="true">Leave Manage <span class="fa arrow"></span></a>
                        <ul class="nav-second-level nav" aria-expanded="true">
                            <li><a href="leave_manager.php">Leave Manager</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript: void(0);" aria-expanded="true">News Section <span class="fa arrow"></span></a>
                        <ul class="nav-second-level nav" aria-expanded="true">
                            <li><a href="news_view.php">NEWS View</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript: void(0);" aria-expanded="true">Policy <span class="fa arrow"></span></a>
                        <ul class="nav-second-level nav" aria-expanded="true">
                            <li><a href="policy_edit.php">policy View</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript: void(0);" aria-expanded="true">Bills <span class="fa arrow"></span></a>
                        <ul class="nav-second-level nav" aria-expanded="true">
                            <li><a href="bill.php">Bills Registration</a></li>
                            <li><a href="bill_view.php">Bills View</a></li>
                        </ul>
                    </li>                                
                </ul>
                <?php } ?>

            </div>
        </div><!--Scrollbar wrapper-->
    </aside>
    <!--left navigation end-->




