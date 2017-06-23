<?php 
session_start();
include("includes/dbConnection.php");
include("includes/header.php");
?>
<style>
.modal-content {
    margin: 110px;
}
i.mdi.mdi-pencil-box-outline {
    color: brown;
}
a {
    color: #0254EB
}
a:visited {
    color: #0254EB
}
a.morelink {
    text-decoration:none;
    outline: none;
}
.morecontent span {
    display: none;
}
.comment {
    width: 400px;
    background-color: #f0f0f0;
    margin: 10px;
}
</style>
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



    $query  = "SELECT * FROM user_bill ";
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
                        <?php if ($_SESSION['user_type'] == 'Admin') { ?>
                        <th colsapn="2">Action</th>
                        <?php } ?>
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
                                <td>
                                    <?php echo $row['bill_amount'];
                                    if($status == 1){
                                       ?>
                                        &nbsp;&nbsp;&nbsp;&nbsp;<i class="mdi mdi-pencil-box-outline" appAmtBill="<?php echo $row['approve_amount'];?>" appDscBill="<?php echo $row['approve_description'];?>"></i>
                                        <?php
                                        }
                                    ?>
                                </td> 
                                <td><?php echo $row['bill_file_path']; ?></td> 
                                <td><?php 
                                    echo substr($row['bill_description'],0, 5).' ';
                                    if(strlen($row['bill_description']) > 5)
                                    {
                                        echo "<a href='javascript:void(0)'> ...  Readmore</a>";
                                    }                                   
                                     $row['bill_description']; ?>
                                     <span class="showText" style="display:none;"><?php echo $row['bill_description']; ?></span>
                                 </td> 
                                <?php if ($_SESSION['user_type'] == 'Admin') { ?>
                                <td>
                                    <?php
                                    if($status == 1){
                                        echo "Approved";
                                    } else {
                                    ?>    
                                    <select id="bills_id" billAmtId="<?php echo $row['id']?>" amount="<?php echo $row['bill_amount'];?>">
                                        <option value="">Select</option>
                                        <option value="Approve">Approved</option>
                                        <option value="UnApprove">UnApproved</option>
                                    </select>
                                    <?php
                                    }
                                    ?>
                                </td>  
                                <?php } ?>
                                <?php if ($_SESSION['user_type'] == 'Admin') { ?>
                                <td>&nbsp;&nbsp;<a href="bill_edit.php?bill_id=<?php echo $row['id'];?>"><i class="glyphicon glyphicon-eye-open"></i></a>&nbsp;&nbsp; 
                                    &nbsp;&nbsp;<a href="action.php?bill_id=<?php echo $row['id']; ?>" class="delete"><i class="glyphicon glyphicon-trash"></i></a>
                                </td> 
                                <?php } ?>
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
$( document ).ready(function() {
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
    $('select').on('change', function (e) {
        var selectedVal1 = $('option:selected', this).val();
        if(selectedVal1 == "Approve")
        {
            var id = $(this).attr("billAmtId");
            var bill = $(this).attr("amount");
            $('#id').val(id);
            $('#bill_amount').val(bill);
            $("#leave_modal").modal('show');
        }       
    });
    $('#approve_amount').keyup(function() {

        var bill = $("#bill_amount").val();
        var apr = $.trim($(this).val());        
        console.log(apr);
        if(parseFloat(apr) > parseFloat(bill)){
            $(".apr_amount").html("Approve Amount is not Greater than to Bill Amount");
            $('#submitBill1').prop('disabled', true);
        } 
        else if(apr == '')
        {
           $('#submitBill1').prop('disabled', false); 
        }
        else {
           $(".apr_amount").html("");
           $('#submitBill1').prop('disabled', false);
        }   
    });
    $('#closeBill').click(function(){
        $('select').prop('selectedIndex',0);
        $("#approve_amount").val('');
        $("#approve_description").val('');
    });
    $( "#submitBill1" ).click(function() {
      
      $( "#form1" ).submit();
    });
    $('i').click(function (e) { 
           var app_amt = $(this).attr("appAmtBill");
           var app_dec = $(this).attr("appDscBill");           
           $("#approve_amt").modal('show');
           $('#approve_amount1').text(app_amt);
           $('#approve_description1').text(app_dec);               
    });    
    $('a').click(toggleIt);
    function toggleIt() {
        $(this).toggle();
    }
});
</script>
<div class="modal fade" id="leave_modal" role="dialog" style="z-index: 9999;" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Bill calculation</h5>
            </div>
            <div class="modal-body">
                <form action="action.php" name="form1" id="form1" method="post">
                    <input type="hidden" name="id" id="id" value="" />  
                    <div class="form-group">
                        <label for="recipient-name" class="form-control-label">Bill Amount:</label>
                        <input type="text" name="bill_amount" id="bill_amount"  class="form-control input-sm col-md-3">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="form-control-label">Approve Amount:</label>
                        <input type="text" name="approve_amount" id="approve_amount" class="form-control input-sm col-md-3">
                    </div>
                    <span class="apr_amount"></span>
                    <div class="form-group">
                        <label for="message-text" class="form-control-label">Bill Discription:</label>
                        <textarea class="form-control input-sm" name="approve_description" id="approve_description"></textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" name="closeBill" id="closeBill" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name ="submitBill" id="submitBill1" class="btn btn-primary drop1" disabled>Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="approve_amt" role="dialog" style="z-index: 9999;" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Bill calculation</h5>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="recipient-name" class="form-control-label"  >Approve Amount:</label>
                    <span id="approve_amount1"></span>
                    <input type="hidden" name="approve_amount" class="form-control input-sm col-md-3">
                </div>
                <span class="apr_amount"></span>
                <div class="form-group">
                    <label for="message-text" class="form-control-label" >Bill Discription:</label>
                    <span id="approve_description1"></span>
                    <textarea class="form-control input-sm hide" id="approve_description" name="approve_description"></textarea>
                </div>
                <div class="modal-footer">
                    <button type="submit" name="closeBill" id="closeBill" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>                
            </div>
        </div>
    </div>
</div>