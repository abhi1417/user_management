<?php
include("includes/dbConnection.php");
include("includes/header.php");
include("includes/sidebar.php");

    /* $user_name = '';
     $bill_file_path = '';
     $bill_description = '';*/

     $bill_id = isset($_GET['bill_id']) ? $_GET['bill_id'] :'' ;
     if (!empty($bill_id)){


      $query = "SELECT * FROM user_bill WHERE id ='".$_GET['bill_id']."'";
      /*$result = mysql_query ($sql) or die (mysql_error ());*/
      $result = $conn->query($query);
      $rows = mysqli_fetch_array($result);


      $user_name = $rows['user_name'];  
      $bill_name = $rows['bill_name'];  
      $bill_date   = $rows['bill_date'];
      $bill_amount     = $rows['bill_amount'];
      $bill_file_path     = $rows['bill_file_path'];
      $bill_description     = $rows['bill_description'];

    /*if(isset($rows['user_name']) && $rows['user_name']!=""){
        $user_name = $rows['user_name'];
       

        if( $user_name == "") {
            $user_name = " selected ";
        }
    } */

    /*echo "<pre>";
    print_r($rows);*/
}
?>
<style type="text/css">

            .error{
              color : red;
            }

        </style>
<!-- START PAGE CONTENT -->
<div id="page-right-content">
    <div class="container">                                               
        <div class="row">
            <div class="col-lg-12">
                <h4 class="header-title m-t-0">Bill Information</h4>
                <!-- Pesronal Information Start -->
                <div class="p-20 m-b-20">
                    <form name="myForm" id="myform" action="action.php" method="POST" class="form-horizontal" role="form" enctype="multipart/form-data">                
                        <input type="hidden" name="id" value="<?php echo isset($bill_id)?$bill_id:''; ?>" /> 
                        <div class="form-group">
                            <label for="user_name" class="col-sm-3 control-label">UserName *</label>
                            <div class="col-xs-4">
                                <select id="user_name" name="user_name" class="form-control input-sm" >                                     
                                    <option value="<?php echo $user_name;?>"><?php echo $user_name; ?></option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="bill_name" class="col-sm-3 control-label">Bill Name *</label>
                            <div class="col-xs-4">
                                <input type="text" id="bill_name" placeholder="Bill Name" value="<?php echo isset($bill_name)?$bill_name:'';?>" name="bill_name" class="form-control ">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="bill_date" class="col-sm-3 control-label">Effective From *</label>
                            <div class="col-xs-4">
                                <input type="text" class="form-control" placeholder="yyyy/mm/dd" id="datepicker1" name="bill_date" id="bill_date" value="<?php echo isset($bill_date)?$bill_date:''; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="bill_amount" class="col-sm-3 control-label">Bill Amount *</label>
                            <div class="col-xs-4">
                                <input type="text" id="bill_amount" placeholder="Bill Amount" name="bill_amount" class="form-control " value="<?php echo isset($bill_amount)?$bill_amount:''; ?>">
                            </div>
                        </div>
                        <div class="form-group dvPdf_box" >
                            <label for="bill_file_path" class="col-sm-3 control-label">Bill PDF/Image *</label>
                            <div class="col-xs-4 dvFile" >
                                <input type="file" id="bill_file_path" name="bill_file_path" value="" class="filestyle form-control" data-icon="false">
                                <span class="error"><?php if(isset($_GET["msg"])) { echo $_GET["msg"]; } ?></span>
                                <span><?php echo $bill_file_path; ?></span>
                            </div>  
                        </div>
                        <div class="form-group ">
                            <label for="bill_description" class="col-sm-3 control-label">Bill Description *</label>  
                            <div class="col-xs-4" >
                                <textarea class="form-control " name="bill_description" value="" rows="10" cols="50" minlength="5" maxlength="100" placeholder="Members/Place/Bill Type" id="bill_description"><?php echo $bill_description; ?></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-9 col-sm-offset-3">
                                <button type="submit" name="billUpdatBtn" value="Upload PDF" id="submit" class="btn btn-primary">Update</button> 
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

</script>