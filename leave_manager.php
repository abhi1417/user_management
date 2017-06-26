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
                <div class="p-20 m-b-20">
                    <div class="col-md-6">
                        <form role="form" name="myform" id="myform" class="form-horizontal" onsubmit="return package_validation(myform)" action="action.php" method="POST" >
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="example-input-small">Employee<span class="text-danger">*</span></label>
                                <div class="col-sm-1"></div>
                                <div class="col-sm-7">
                                    <select id="employee_id" name="employee_id" class="form-control input-sm" > 
                                        <option value="0" >Select Employee</option>
                                         <?php 
                                              $query = "SELECT id,employee_id, first_name FROM user_employee WHERE  status = '1'";
                                              $result = $conn->query($query);
                                              while ($row = mysqli_fetch_array($result))
                                                {
                                                    //print_r($row);
                                                    $employee_id = $row['employee_id']." : ".$row['first_name'];
                                                ?>
                                               
                                                    <option value="<?php echo $row['id'];?>"><?php echo $employee_id; ?></option>
                                               
                                               
                                                <?php
                                                }
                                         ?>
                                    </select>
                                    <span class=".error_msg"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="example-input-small">Leave Type<span class="text-danger">*</span></label>
                                <div class="col-sm-1"></div>
                                <div class="col-sm-7">
                                    <select id="leave" name="leave_type" class="form-control input-sm" required> 
                                        <option value="0" >Select Employee</option>
                                         <?php 
                                              $query = "SELECT * FROM leave_type WHERE  status = '1'";
                                              $result = $conn->query($query);
                                              while ($row = mysqli_fetch_array($result))
                                                {
                                                    //print_r($row);
                                                    $id = $row['id'];
                                                ?>
                                               
                                                    <option value="<?php echo $row['id'];?>"><?php echo $id; ?></option>
                                               
                                               
                                                <?php
                                                }
                                         ?>
                                    </select>
                                    <span class=".error_msg"></span>
                                </div>
                            </div>
                            <!--<div class="form-group">
                                <label class="col-sm-3 control-label" for="example-input-small">Leave Balance<span class="text-danger">*</span></label>
                                <div class="col-sm-2"></div>
                                <div class="col-sm-6"> -->
                                        <!--<?php //echo isset($)?ucfirst($):''; ?>
                                        <input type="hidden" name="" value="<?php //echo isset($)?$:''; ?>">-->
                               <!--  </div>
                            </div> -->
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="example-input-small">Form Date<span class="text-danger">*</span></label>
                                <div class="col-sm-2"></div>
                                <div class="col-sm-6 ">
                                    <input type="text" class="form-control input-sm" placeholder="dd/mm/yyyy" id="datepicker-autoclose" name="from_date" id="from_date">
                                    <span class=".error_msg"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="example-input-small">To Date<span class="text-danger">*</span></label>
                                <div class="col-sm-2"></div>
                                <div class="col-sm-6 ">
                                    <input type="text" class="form-control input-sm" placeholder="dd/mm/yyyy" id="datepicker" name="to_date" id="to_date" >
                                    <span class=".error_msg"></span>
                                </div>
                            </div> 
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Comment<span class="text-danger">*</span></label>
                                <div class="col-sm-8">
                                    <textarea class="form-control" name="comment" id="comment" ></textarea>
                                    <span class=".error_msg"></span>
                                </div>
                            </div>
                            <div class="form-group text-left m-b-0">
                                    <button class="btn btn-primary waves-effect waves-light" type="submit" name="applyLeave" id="submit">
                                        Apply
                                    </button>
                                </div>  
                        </form>
                    </div> <!-- end col -->
                </div>
            </div>
            <!-- Col-md-12 end-->
        </div>   
            <!-- End row-->
    </div>
    <!-- end container -->
</div>
<?php include("includes/footer.php");?>
<script>
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