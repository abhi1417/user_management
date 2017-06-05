<?php 
print_r($_POST); die;
include("includes/dbConnection.php");
include("includes/header.php");
include("includes/sidebar.php");

 $id = isset($_GET['id']) ? $_GET['id'] :'' ;
    if (!empty($id)){


  $query = "SELECT * FROM user_news WHERE id ='".$_GET['id']."'";
  /*$result = mysql_query ($sql) or die (mysql_error ());*/
  $result = $conn->query($query);
  $rows = mysqli_fetch_array($result);

    
    $tittle = $rows['tittle'];  
    $description   = $rows['description'];
  
     else {
        //header("location: login.php");
    }

}

?>
    <!-- START PAGE CONTENT -->
    <div id="page-right-content">
        <div class="container">                                               
            <div class="row">
                <div class="col-lg-12">
                    <h4 class="header-title m-t-0">News Section</h4>
                    <!-- Pesronal Information Start -->
                    <div class="p-20 m-b-20">
                        <form name="myForm" id="myform" action="action.php" method="POST" class="form-horizontal" role="form">                
                            <input type="hidden" name="id" value="<?php echo isset($id)?$id:''; ?>" />  
                            <div class="form-group">
                                <label for="tittle" class="col-sm-3 control-label">News Tittle *</label>
                                <div class="col-xs-4">
                                    <input type="text" id="tittle" placeholder="File Name" value="<?php  echo isset($tittle)?$tittle:''; ?>" name="tittle" class="form-control ">
                                </div>
                            </div>
                            <div class="form-group ">
                                <label for="description" class="col-sm-3 control-label">Description *
                                    <textarea class="form-control" name="description" rows="5" colums="20" id="description" checked ><?php echo $description; ?></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-9 col-sm-offset-3">
                                    <button type="submit" name="updateBtn" id="submit" class="btn btn-primary">Update</button> 
                                </div>
                            </div>
                        </form> 
                    </div>
                </div><!-- Col-md-6 end-->
            </div><!-- End row-->
        </div><!-- end container -->
    </div><!-- End #page-right-content --> 

<?php include("includes/footer.php"); ?>
