<?php 
include("includes/dbConnection.php");
include("includes/header.php");
include("includes/sidebar.php");
     
?>
<!DOCTYPE html>
<html lang="en">
    <head>
</head>
<body>
    <!-- START PAGE CONTENT -->
    <div id="page-right-content">
        <div class="container">                                               
            <div class="row">
                <div class="col-lg-12">
                    <h4 class="header-title m-t-0">News Section</h4>
                    <!-- Pesronal Information Start -->
                    <div class="p-20 m-b-20">
                           <form name="myForm" id="myform" action="action.php" method="POST" class="form-horizontal" role="form" enctype="multipart/form-data">                
                            <div class="form-group">
                                <label for="tittle" class="col-sm-3 control-label">News tittle *</label>
                                <div class="col-xs-4">
                                    <input type="text" id="tittle" placeholder="File Name" value="" name="tittle" class="form-control ">
                                </div>
                            </div>
                            <div class="form-group ">
                                <label for="description" class="col-sm-3 control-label">Description *</label>  
                                <div class="col-xs-4 dvContent" >
                                    <textarea class="form-control " name="description" value="" rows="5" colums="20" id="description"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-9 col-sm-offset-3">
                                    <button type="submit" name="applyBtn" id="submit" class="btn btn-primary">Apply News</button> 
                                </div>
                            </div>
                        </form> 
                    </div>
                </div>
                <!-- Col-md-6 end-->
            </div>   
                <!-- End row-->
        </div>
        <!-- end container -->
    </div>    
            <!-- End #page-right-content -->
<?php include("includes/footer.php");?>
</body>
</html>

