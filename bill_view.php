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
                                <select id="bill_date" name="bill_date" class="form-control input-sm">    
                                 <option value="">Select Month</option>
                                 <option value="last_month">Last Month</option>
                                 <option value="last_6_month">Last 6 Month</option>
                                 <option value="this_year">This Year</option>
                                 <option value="last_year">Last Year</option>
                                 <option value="custom">Custom</option>
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
                            <select id="status" name="status" class="form-control input-sm">                                         
                                <option value="1">Approved</option>                                        
                                <option value="0">UnApproved</option>                                        
                            </select>
                            <label class="control-label" for="example-input-small">
                                <button type="submit" name="searchBtnBill" value="Upload PDF" id="submit" class="btn btn-primary input-sm">Search</button>
                            </label>
                        </div>
                    </div>  
                </form>
            </div> <!-- end col -->
        </div>
    </div><!-- Col-md-12 end-->
    <?php

    $query  = "SELECT * FROM user_bill ";
    $where = '';
    $currentMonth = '';
    if(isset($_GET['searchBtnBill']))
    {   
        $currentMonth = Date('m', strtotime($currentMonth . " last month"));
        $prevyear = date('Y');
        $month = $_GET['bill_date'];
        $status = $_GET['status'];

        if($month == 'last_month'){
            /*$where = ' where `bill_date` >= DATE_SUB(CURDATE(), INTERVAL 1 MONTH)';*/
            $where = ' where Month(bill_date) = "'.$currentMonth.'" AND Year(bill_date) = "'.$prevyear.'";';
        }
    }
    
     $main_query = $query . $where;

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
                                <td>&nbsp;&nbsp;<a href="bill_edit.php?id=<?php echo $row['id'];?>"><i class="glyphicon glyphicon-eye-open"></i></a>&nbsp;&nbsp; 
                                    &nbsp;&nbsp;<a href="action.php?id=<?php echo $row['id']; ?>" class="delete"><i class="glyphicon glyphicon-trash"></i></a>
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
</script>
