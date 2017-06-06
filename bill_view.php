<?php 
include("includes/dbConnection.php");
include("includes/header.php");
//include("includes/sidebar.php");
?>
<!-- START PAGE CONTENT -->
<!-- <div id="page-right-content"> -->
<div class="container">                                               
    <div class="row">
        <div class="col-lg-12">
            <div class="p-20 m-b-20">
                <div class="col-md-6">
                    <form role="form" class="form-horizontal" action="action.php" method="POST">
                        <div class="form-group">
                            <label class="col-sm-3 control-label" for="example-input-small">Month<span class="text-danger">*</span></label>
                            <div class="col-sm-2"></div>
                            <div class="col-sm-6">
                                <select id="bill_date" name="bill_date" class="form-control input-sm" required>                                   
                                   <?php 
                                   $query = "SELECT bill_date FROM user_bill ";
                                   $result = $conn->query($query);
                                   while ($row = mysqli_fetch_array($result))
                                   {
                                    $bill_date = $row['bill_date'];
                                    $jd=gregoriantojd();
                                    ?>
                                    <option value="<?php echo $row['bill_date'];?>"><?php echo jdmonthname($jd,0); ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="example-input-small">Status<span class="text-danger">*</span></label>
                        <div class="col-sm-2"></div>
                        <div class="col-sm-6">
                            <select id="status" name="status" class="form-control input-sm" required>                                         
                              <?php
                              $query_leave_type = "SELECT status FROM user_bill WHERE status ='1' ";
                              $result_leave_type = $conn->query($query_leave_type);
                              while ($row_leave_type = mysqli_fetch_array($result_leave_type)) {

                                $total += $row_leave_type['status'];
                                ?>                            
                                <option value="<?php echo $row_leave_type['id'];?>" > <?php  echo $row_leave_type['status']; ?> </option>                                        
                                <?php
                            }
                            ?>
                        </select>
                    </div>
                </div>  
            </form>
        </div> <!-- end col -->
    </div>
</div>
<!-- Col-md-12 end-->
<?php
/*$id = isset($_GET['id']);
if (!empty($id)){*/
    $query  = "SELECT * FROM user_bill";
    $result = $conn->query($query);

/*} else {
     WHERE id ='".$_GET['id']."'
    //header("location:bills.php");     
} */   
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
                        ?>
                        <tr>
                            <td><?php echo $row['user_name']; ?></td> 
                            <td><?php echo $row['bill_name']; ?></td> 
                            <td><?php echo $row['bill_date']; ?></td> 
                            <td><?php echo $row['bill_amount']; ?></td> 
                            <td><?php echo $row['bill_file_path']; ?></td> 
                            <td><?php echo $row['bill_description']; ?></td> 
                            <td><?php echo $row['status']; ?></td>  
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
<!-- </div>     -->

<?php include("includes/footer.php"); ?>