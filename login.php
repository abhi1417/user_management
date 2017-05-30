<?php 
session_start();
include("includes/dbConnection.php");
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>SimpleAdmin - Responsive Admin Dashboard Template</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <link rel="shortcut icon" href="assets/images/favicon.ico">

        <!-- Bootstrap core CSS -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet">
        <!-- MetisMenu CSS -->
        <link href="assets/css/metisMenu.min.css" rel="stylesheet">
        <!-- Icons CSS -->
        <link href="assets/css/icons.css" rel="stylesheet">
        <!-- Custom styles for this template -->
        <link href="assets/css/style.css" rel="stylesheet">

    </head>
  <body>
    <!-- HOME -->
    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="wrapper-page">
                        <div class="m-t-40 card-box">
                            <div class="text-center">
                                <h2 class="text-uppercase m-t-0 m-b-30">
                                    Admin Login
                                </h2>
                                <!--<h4 class="text-uppercase font-bold m-b-0">Sign In</h4>-->
                            </div>
                            <div class="account-content">
                                <form class="form-horizontal" action="action.php" method="POST">
                                    <POS class="form-group m-b-20">
                                        <div class="col-xs-12">
                                            <label for="email">Email address</label>
                                            <input type="email" name="email" parsley-trigger="change" required
                                           placeholder="Enter email" class="form-control" id="email">
                                        </div>
                                    </div>
                                    <div class="form-group m-b-20">
                                        <div class="col-xs-12">
                                            <a href="#" class="text-muted pull-right font-14">Forgot your password?</a>
                                            <label for="password">Password</label>
                                            <input type="password" name="password" parsley-trigger="change" required
                                           placeholder="Enter your password" class="form-control" id="password">
                                        </div>
                                    </div>
                                    <div class="form-group m-b-30"><div class="col-xs-12"><div class="checkbox checkbox-primary"></div></div></div>
                                    <div class="form-group account-btn text-center m-t-10">
                                        <div class="col-xs-12">
                                            <button class="btn btn-lg btn-primary btn-block" name="login_submit" id="login_submit" type="submit">Sign In</button>
                                        </div>
                                    </div>
                                </form>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                        <!-- end card-box-->
                    </div>
                    <!-- end wrapper -->
                </div>
            </div>
        </div>
    </section>
    <!-- END HOME -->
        <!-- js placed at the end of the document so the pages load faster -->
        <script src="assets/js/jquery-2.1.4.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/metisMenu.min.js"></script>
        <script src="assets/js/jquery.slimscroll.min.js"></script>

        <!-- App Js -->
        <script src="assets/js/jquery.app.js"></script>

    </body>
</html>