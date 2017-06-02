<?php 
include("includes/dbConnection.php");
include("includes/header.php");
include("includes/sidebar.php");


 $id = isset($_GET['id']) ? $_GET['id'] :'' ;
    if (!empty($id)){

  $query = "SELECT * FROM user_policy WHERE id ='".$_GET['id']."'";
  /*$result = mysql_query ($sql) or die (mysql_error ());*/
  $result = $conn->query($query);
  $rows = mysqli_fetch_array($result);

    
    $policy_type = $rows['policy_type'];  
    $from_date   = $rows['from_date'];
    $to_date     = $rows['to_date'];

    $file_path = '';
    $checked   = '';
    if(isset($rows['file_path']['name']) && $rows['file_path']['name'] != ""){
        $file_path = $rows['file_path']['name'];
        $file_check = "";

        if( $file_path !== "" ) {
            $file_check = " checked ";
        }     
    }
    $comment = '';
    $checked = '';
    if(isset($rows['comment']) && $rows['comment'] != ""){
        $comment = $rows['comment'];
        $comment_check = "";

        if( $comment !== "") {
            $comment_check = " checked ";
        } 
        
    } else {
        //header("location: login.php");
    }
}

?>

	<!-- START PAGE CONTENT -->
	<div id="page-right-content">
		<div class="container">                                               
			<div class="row">
				<div class="col-lg-12">
                    <h4 class="header-title m-t-0">policy_type Information</h4>
                    <!-- Pesronal Information Start -->
                    <div class="p-20 m-b-20">
                    	<form name="myForm" id="myform" action="action.php" method="POST" class="form-horizontal" role="form" enctype="multipart/form-data">                
                    		<div class="form-group">
                    			<label for="policy_type" class="col-sm-3 control-label">Policy Name *</label>
    			                <div class="col-xs-4">
                			    	<input type="text" id="policy_type" placeholder="File Name" value="<?php  echo isset($policy_type)?$policy_type:''; ?>" name="policy_type" class="form-control ">
                    			</div>
            				</div>
                            <div class="form-group">
                                <label for="from_date" class="col-sm-3 control-label">Effective From *</label>
                                <div class="col-xs-4">
                                    <input type="text" class="form-control" placeholder="yyyy/mm/dd" id="datepicker1" name="from_date" id="from_date" value="<?php echo isset($from_date)?$from_date:''; ?>">
                                </div>
                            </div>
                            <div class="form-group">                                        
                                <label for="to_date" class="col-sm-3 control-label">Effective Till *</label>
                                <div class="col-xs-4">
                                    <input type="text" class="form-control" placeholder="yyyy/mm/dd" id="datepicker2" name="to_date" id="to_date" 
                                    value="<?php echo isset($to_date)?$to_date:''; ?>">
                                </div>
                            </div>    
            				<div class="form-group dvPdf_box" >
                                <label for="file_path" class="col-sm-3 control-label">PDF *
                                    <input type="checkbox" id="chkPdf" /></label>
                                <div class="col-xs-4 dvFile" style="display:none;">
                                	<input type="file" id="file_path" name="file_path" class="filestyle form-control" data-icon="false" <?php echo $file_path; ?> checked >
                                </div>	
                            </div>
                            <div class="form-group ">
			                	<label for="comment" class="col-sm-3 control-label">Content *
                                    <input type="checkbox" id="chkContent" /></label>  
			                    <div class="col-xs-4 dvContent" style="display:none;">
			                    	<textarea class="form-control" name="comment" rows="5" colums="20" id="comment" checked ><?php echo $comment; ?></textarea>
			                    </div>
			                </div>
			                <div class="form-group">
			                	<div class="col-sm-9 col-sm-offset-3">
			                		<button type="submit" name="updateBtn" value="Upload PDF" id="submit" class="btn btn-primary">Update</button> 
			                	</div>
			                </div>
			            </form> 
    				</div>
    			</div><!-- Col-md-6 end-->
			</div><!-- End row-->
		</div><!-- end container -->
	</div><!-- End #page-right-content --> 

<?php include("includes/footer.php"); ?>
<script>
$('#datepicker1').datepicker({
    orientation: 'auto bottom'
});
$('#datepicker2').datepicker({
    orientation: 'auto bottom'
});
$(function () {
        $("#chkPdf").click(function () {
            if ($(this).is(":checked")) {
                $(".dvFile").show();
                $(".dvContent").hide();
                 $('#chkContent').prop('checked',false);

            } 
        });
    });
$(function () {
        $("#chkContent").click(function () {
            if ($(this).is(":checked")) {
                $(".dvContent").show();
                $(".dvFile").hide();
                $('#chkPdf').prop('checked',false);
            } 
        });
    });
    
</script>