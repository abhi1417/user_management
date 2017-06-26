<?php 
include("includes/dbConnection.php");
include("includes/header.php");
include("includes/sidebar.php");

?>
    <style type="text/css">

    .error{
      color : red;
  }.required_error{
        border : 1px solid red;
      }
      .validaion{
        color: red;
      }

  </style>
<!-- START PAGE CONTENT -->
<div id="page-right-content">
	<div class="container">                                               
		<div class="row">
			<div class="col-lg-12">
                <h4 class="header-title m-t-0">Policy Information</h4>
                <!-- Pesronal Information Start -->
                <div class="p-20 m-b-20">
                	<form name="myForm" id="myform" action="action.php" method="POST" onsubmit="return package_validation(myform)" class="form-horizontal" role="form" enctype="multipart/form-data">                
                		<div class="form-group">
                			<label for="policy_type" class="col-sm-3 control-label">Policy Name *</label>
			                <div class="col-xs-4">
            			    	<input type="text" id="policy_type" placeholder="Policy Name" value="" name="policy_type" class="form-control ">
                			</div>
        				</div>
                        <div class="form-group">
                            <label for="from_date" class="col-sm-3 control-label">Effective From *</label>
                            <div class="col-xs-4">
                                <input type="text" class="form-control" placeholder="yyyy/mm/dd" id="datepicker1" name="from_date" id="from_date">
                            </div>
                        </div>
                        <div class="form-group">                                        
                            <label for="to_date" class="col-sm-3 control-label">Effective Till *</label>
                            <div class="col-xs-4">
                                <input type="text" class="form-control" placeholder="yyyy/mm/dd" id="datepicker2" name="to_date" id="to_date">
                            </div>
                        </div>    
        				<div class="form-group dvPdf_box" >
                            <label for="file_path" class="col-sm-3 control-label">PDF *
                                <input type="checkbox" id="chkPdf" /></label>
                            <div class="col-xs-4 dvFile" style="display:none;">
                            	<input type="file" id="file_path" name="file_path" value="" class="filestyle form-control" data-icon="false">
                            </div>	
                        </div>
                        <div class="form-group ">
		                	<label for="comment" class="col-sm-3 control-label">Content *
                                <input type="checkbox" id="chkContent" /></label>  
		                    <div class="col-xs-4 dvContent" style="display:none;" >
		                    	<textarea class="form-control " name="comment" value="" rows="5" colums="20" id="comment"></textarea>
		                    </div>
		                </div>
		                <div class="form-group">
		                	<div class="col-sm-9 col-sm-offset-3">
		                		<button type="submit" name="uploadBtn" value="Upload PDF" id="submit" class="btn btn-primary">Submit</button> 
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
$("#datepicker1").datepicker().datepicker("setDate", new Date());
$("#datepicker2").datepicker().datepicker("setDate", new Date());
$("#datepicker1").datepicker({ dateFormat: 'dd/mm/yyyy' });
$("#datepicker2").datepicker({ dateFormat: 'dd/mm/yyyy' });

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
function package_validation()
{   
    var Acknowledgement = 1;
    $('.required').each(function() {
        if ($(this).val() == "")
        {
            $(this).css("border", "1px solid red");
            $(this).focus();                       
            $(this).next("span").html('<p class="validaion">This is required Filed.</p>'); 

            Acknowledgement = 0;         
            return false;
        } else
        {
            Acknowledgement = 1;
            $(this).css("border", "1px solid green");
            $(this).next("span").html(''); 
        }
    });

    if (Acknowledgement)
    { 
        return true;
    } else {
        return false;
    }
}
    
</script>