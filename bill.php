<?php
session_start();
include("includes/dbConnection.php");
include("includes/header.php");
include("includes/sidebar.php");
?>
<!-- START PAGE CONTENT -->
    <div id="page-right-content">
        <div class="container">                                               
            <div class="row">
                <div class="col-lg-12">
                    <h4 class="header-title m-t-0">Bill Information</h4>
                    <!-- Pesronal Information Start -->
                    <div class="p-20 m-b-20">
                        <form name="myForm" id="myform" action="action.php" method="POST" class="form-horizontal" role="form" enctype="multipart/form-data">                
                             <div class="form-group">
                                <label for="user_name" class="col-sm-3 control-label">UserName *</label>
                                <div class="col-xs-4">
                                    <select id="user_name" name="user_name" class="form-control input-sm" > 
                                        <option value="0" >Select Employee</option>
                                         <?php 
                                              $query = "SELECT employee_id, first_name FROM user_employee WHERE  status = '1'";
                                              $result = $conn->query($query);
                                              while ($row = mysqli_fetch_array($result))
                                                {
                                                    $user_name = $row['employee_id']." : ".$row['first_name'];
                                                ?>
                                                    <option value="<?php echo $user_name;?>"><?php echo $user_name; ?></option>
                                                <?php
                                                }
                                         ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="bill_name" class="col-sm-3 control-label">Bill Name *</label>
                                <div class="col-xs-4">
                                    <input type="text" id="bill_name" placeholder="Bill Name" value="" name="bill_name" class="form-control ">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="bill_date" class="col-sm-3 control-label">Effective From *</label>
                                <div class="col-xs-4">
                                    <input type="text" class="form-control" placeholder="yyyy/mm/dd" id="datepicker1" name="bill_date" id="bill_date">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="bill_amount" class="col-sm-3 control-label">Bill Amount *</label>
                                <div class="col-xs-4">
                                    <input type="text" id="bill_amount" placeholder="Bill Amount" value="" name="bill_amount" class="form-control ">
                                </div>
                            </div>
                            <div class="form-group dvPdf_box" >
                                <label for="bill_file_path" class="col-sm-3 control-label">Bill PDF/Image *</label>
                                <div class="col-xs-4 dvFile" >
                                    <input type="file" id="bill_file_path" name="bill_file_path" value="" class="filestyle form-control" data-icon="false">
                                </div>  
                            </div>
                            <div class="form-group ">
                                <label for="bill_description" class="col-sm-3 control-label">Bill Description *</label>  
                                <div class="col-xs-4" >
                                    <textarea class="form-control " name="bill_description" value="" rows="10" cols="50" minlength="5" maxlength="100" placeholder="Members/Place/Bill Type" id="bill_description"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-9 col-sm-offset-3">
                                    <button type="submit" name="billUploadBtn" value="Upload PDF" id="submit" class="btn btn-primary">Submit</button> 
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
$("#datepicker1").datepicker().datepicker("setDate", new Date());
</script>