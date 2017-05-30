<?php include("includes/dbConnection.php");?>
                <!--left navigation start-->
                <aside class="sidebar-navigation">
                    <div class="scrollbar-wrapper">
                        <div>
                            <button type="button" class="button-menu-mobile btn-mobile-view visible-xs visible-sm">
                                <i class="mdi mdi-close"></i>
                            </button>
                            <!-- User Detail box -->
                            <div class="user-details">
                                <div class="pull-left">
                                    <!-- <img src="assets/images/users/avatar-1.jpg" alt="" class="thumb-md img-circle"> -->
                                </div>
                                <div class="user-info">
                                    <b><div style="margin-left:-64px;" id="after_login">Welcome <?php if(isset($_SESSION['name'])){ echo $_SESSION['name']; }?></div></b>
                                </div>
                            </div>
                            <!--- End User Detail box -->

                            <!-- Left Menu Start -->
                            <ul class="metisMenu nav" id="side-menu">
                                <li><a href="index.html"><i class="ti-home"></i> Dashboard </a></li>
                                <li>
                                    <a href="javascript: void(0);" aria-expanded="true">Employee <span class="fa arrow"></span></a>
                                    <ul class="nav-second-level nav" aria-expanded="true">
                                        <li><a href="employee_reg.php">Employee Registration</a></li>
                                        <li><a href="employee_profile.php">Employee Profile</a></li>
                                        <li><a href="employee_view.php">Employee View</a></li>
                                        <li><a href="employee_edit.php">Employee Edit</a></li>
                                    </ul>
                                </li>
                                <li><a href="leave_manager.php">Leave Manager</a></li>
                                <li><a href="news_section.php">News Section</a></li>
                                <li><a href="pollicy.php">Pollicy</a></li>
                                <li><a href="bills.php">Bills</a></li>
                            </ul>
                        </div>
                    </div><!--Scrollbar wrapper-->
                </aside>
                <!--left navigation end-->



                                
