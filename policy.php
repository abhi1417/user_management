<?php 
include("includes/dbConnection.php");
include("includes/header.php");
include("includes/sidebar.php");
include("upload.php");
?>

	<!-- START PAGE CONTENT -->
	<div id="page-right-content">
		<div class="container">                                               
			<div class="row">
				<div class="col-lg-12">
                    <h4 class="header-title m-t-0">Personal Information</h4>
                    <!-- Pesronal Information Start -->
                    <div class="p-20 m-b-20">
                    	<form name="myForm" id="myform" action="save.php" method="POST" class="form-horizontal" role="form">                  
                    		<div class="form-group">
                    			<label for="Fname" class="col-sm-3 control-label">Full Name *</label>
    			                <div class="col-xs-4">
                			    	<input type="text" id="Fname" placeholder="First Name" name="Fname" value="<?php if(isset($_POST['Fname'])){ echo $_POST['Fname']; }?>" class="form-control ">
                    			</div>
            				</div>
            				<div class="form-group">
			                	<label for="message" class="col-sm-3 control-label">Message *</label>
			                    <div class="col-xs-4">
			                    	<textarea class="form-control " name="message" style="overflow:auto;resize:none" rows="5" colums="20" id="message"><?php  if (isset($_POST['message'])) { echo $_POST['message']; } ?></textarea>
			                    </div>
			                </div>                
			                <div class="form-group">
			                	<div class="col-sm-9 col-sm-offset-3">
			                		<button type="submit" name="Upload" id="submit" class="btn btn-primary">Submit</button> 
			                	</div>
			                </div>
			            </form> 
    				</div>
    			</div><!-- Col-md-6 end-->
			</div><!-- End row-->
		</div><!-- end container -->
	</div><!-- End #page-right-content --> 

<?php include("includes/footer.php"); ?>