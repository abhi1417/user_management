<?php 
include("includes/dbConnection.php");
include("includes/header.php");
?>

<div class="container">                                               
    <div class="row">
        <div class="col-lg-12">
            <div class="p-20 m-b-20">
                <div class="col-md-6">
                    <form role="form" class="form-horizontal" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET">
                        <div class="form-group">
                            <label class="col-sm-3 control-label" for="example-input-small">Month<span class="text-danger">*</span></label>
                            <div class="col-sm-2"></div>
                            <div class="col-sm-6">
                                   <?php 
                                      $bill = isset($_GET['bill_date']) ? $_GET['bill_date']:'';
                                   ?>
                                <select id="bill_date" name="bill_date" class="form-control input-sm drop">    
                                   <option value="">Select Month</option>
                                   <option value="this_month" <?php if ($bill =="this_month") echo 'selected = "selected"';?>>This Month</option>
                                   <option value="last_month" <?php if ($bill =="last_month") echo 'selected = "selected"';?>>Last Month</option>
                                   <option value="last_3_month" <?php if ($bill =="last_3_month") echo 'selected = "selected"';?>>Last 3 Month</option>
                                   <option value="last_6_month" <?php if ($bill =="last_6_month") echo 'selected = "selected"';?>>Last 6 Month</option>
                                   <option value="this_year" <?php if ($bill =="this_year") echo 'selected = "selected"';?>>This Year</option>
                                   <option value="last_year" <?php if ($bill =="last_year") echo 'selected = "selected"';?>>Last Year</option>
                                   <option value="custom" <?php if ($bill =="custom") echo 'selected = "selected"';?>>Custom</option>
                                </select>
                           </div>
                       </div>
                       <div class="form-group" id="custom_date" style="display:none;">
                        <label class="col-sm-3 control-label" for="example-input-small">Date<span class="text-danger">*</span></label>
                        <div class="col-sm-2"></div>
                        <div class="col-sm-6">
                            <div class="input-daterange input-group" id="date-range">
                                <input type="text" class="form-control" name="custom_from" id="custom_from" />
                                <span class="input-group-addon b-0">to</span>
                                <input type="text" class="form-control" name="custom_to" id="custom_to" />
                            </div>
                        </div>
                    </div> 
                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="example-input-small">Status<span class="text-danger">*</span></label>
                        <div class="col-sm-2"></div>
                        <div class="col-sm-6">
                            <?php 
                               $statusApp = isset($_GET['status']) ? $_GET['status']:'';
                            ?>
                            <select id="status" name="status" class="form-control input-sm drop">                                         
                                <option value="">Select Status</option>                                        
                                <option <?php if ($statusApp =="1") echo 'selected = "selected"';?> value="1">Approved</option>                                        
                                <option <?php if ($statusApp =="0") echo 'selected = "selected"';?> value="0">UnApproved</option>                                        
                            </select>
                            <label class="control-label" for="example-input-small">
                                <button type="submit" name="searchBtnBill" value="Upload PDF" id="submitBill" class="btn btn-primary input-sm" disabled>Search</button>
                            </label>
                        </div>
                    </div>  
                </form>
            </div> <!-- end col -->
        </div>
    </div><!-- Col-md-12 end-->
    <?php



    $query  = "SELECT * FROM user_bill WHERE status ='1' ";
    $where = '';
    $currentMonth = '';
    $status = '';

     if(isset($_GET['searchBtnBill']))
    {   
        $currentDate = Date('d');
        $currentYear = date('Y');
        $previousYear = $currentYear - 1;
        $month = $_GET['bill_date'];
        $status = $_GET['status'];

        if($month == 'this_month'){
            $where = ' AND bill_date >=(CURDATE()-INTERVAL 1 MONTH);';
        }
        else if($month == 'last_month'){
            $currentMonth = Date('m', strtotime($currentMonth . " last month"));
            $where = ' AND Month(bill_date) = "'.$currentMonth.'" AND Year(bill_date) = "'.$currentYear.'"';
        }
        else if($month == 'last_3_month'){
            $where = ' AND `bill_date` <= last_day(now()) + interval 1 day - interval 1 month  AND `bill_date` >= last_day(now()) + interval 1 day - interval 4 month';
        }
        else if($month == 'last_6_month'){
            $where = ' AND `bill_date` <= last_day(now()) + interval 1 day - interval 1 month  AND `bill_date` >= last_day(now()) + interval 1 day - interval 7 month';
        }
        else if($month == 'this_year'){
            $where = ' AND YEAR(bill_date) = YEAR(CURDATE())'; 
        }
        else if($month == 'last_year'){
            $where = ' AND year(bill_date) = "'.$previousYear.'"';
        }
        else if($month == 'custom'){
            $custom_from = $_GET['custom_from'];
            $custom_to = $_GET['custom_to'];   

            $custom_from_date = date('Y-m-d', strtotime( $custom_from ));      
            $custom_to_date = date('Y-m-d', strtotime( $custom_to ));
            $where = '  bill_date BETWEEN "'.$custom_from_date.'" and "'.$custom_to_date.'"';
        }
    } 
    

    echo $main_query = $query . $where;

    $result = $conn->query($main_query);

    ?>
    <div class="col-md-12">
        <div class="table-responsive m-b-20">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>User Name</th>
                        <th>Bill Name</th>
                        <th>Bill Date</th>
                        <th>Bill Amount</th>
                        <th>Bill PDF/Image</th>
                        <th>Bill Description</th>
                        <th>Status</th>        
                        <th colsapn="2">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php        
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_array($result)) {
                            $status = $row['status'];
                            if($status == 1 )
                            {
                                $msg = "Approved";
                            } else {
                                $msg = "UnApproved";
                            }
                            ?>
                            <tr>
                                <td><?php echo $row['user_name']; ?></td> 
                                <td><?php echo $row['bill_name']; ?></td> 
                                <td><?php echo $row['bill_date']; ?></td> 
                                <td><?php echo $row['bill_amount']; ?></td> 
                                <td><?php echo $row['bill_file_path']; ?></td> 
                                <td><?php echo $row['bill_description']; ?></td> 
                                <td><?php echo $msg; ?></td>  
                                <td>&nbsp;&nbsp;<a href="bill_edit.php?bill_id=<?php echo $row['id'];?>"><i class="glyphicon glyphicon-eye-open"></i></a>&nbsp;&nbsp; 
                                    &nbsp;&nbsp;<a href="action.php?bill_id=<?php echo $row['id']; ?>" class="delete"><i class="glyphicon glyphicon-trash"></i></a>
                                </td> 
                            </tr>
                            <?php
                        }
                    }
                    ?>                            
                </tbody>
            </table>
        </div>
    </div>
</div>   
<!-- End row-->
</div>
<!-- end container -->

<?php include("includes/footer.php"); ?>
<script>
$('#bill_date').on('change', function (e) {
    var selectedVal = $('option:selected', this).val();
    if(selectedVal == "custom")
    {
        $('#custom_date').show();
    }
    else
    {
        $('#custom_date').hide();
    }
});
$('.drop').on('change', function (e) {
  var selectDrop = $('option:selected',this).val();
  //alert(selectDrop);
  if(selectDrop == "")
  {
    $('#submitBill').prop('disabled', true);
  } 
  else
  {
    $('#submitBill').prop('disabled', false);
  }
});
</script>