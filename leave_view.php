<?php 
include("includes/dbConnection.php");
include("includes/header.php");
//include("includes/sidebar.php");

?>
<style>
</style>
<!-- START PAGE CONTENT -->
<!-- <div id="page-right-content"> -->
<div class="container">                                               
    <div class="row">
        <div class="col-lg-12">
            <div class="p-20 m-b-20">
                <div class="col-md-6">
                    <form role="form" class="form-horizontal" action="action.php" method="POST">
                        <div class="form-group">
                            <label class="col-sm-3 control-label" for="example-input-small">Employee Name<span class="text-danger">*</span></label>
                            <div class="col-sm-2"></div>
                            <div class="col-sm-6">
                                <select id="employee_id" name="employee_id" class="form-control input-sm" required>                                   
                                 <?php 
                                 $query = "SELECT employee_id FROM user_leave WHERE id ='".$_GET['id']."' ";
                                 $result = $conn->query($query);
                                 while ($row = mysqli_fetch_array($result))
                                 {
                                    $employee_id = $row['employee_id'];
                                    ?>
                                    <option value="<?php echo $row['employee_id'];?>"><?php echo $employee_id; ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="example-input-small">Leave Type<span class="text-danger">*</span></label>
                        <div class="col-sm-2"></div>
                        <div class="col-sm-6">
                            <select id="leave_name" name="leave_name" class="form-control input-sm" required>                                         
                              <?php
                              $query_leave_type = "SELECT * FROM leave_type WHERE status ='1' ";
                              $total = 0;
                              $result_leave_type = $conn->query($query_leave_type);
                              while ($row_leave_type = mysqli_fetch_array($result_leave_type)) {

                                $total += $row_leave_type['total_leave'];
                                ?>                            
                                <option value="<?php echo $row_leave_type['id'];?>" > <?php  echo $row_leave_type['leave_name']; ?> </option>                                        
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
$emp_id = isset($_GET['id']);
if (!empty($emp_id)){
    $query  = "SELECT * FROM user_leave WHERE id ='".$_GET['id']."'";
    $result = $conn->query($query);

} else {
    header("location:leave_manager.php");     
}    
?>
<div class="col-md-12">
    <div class="table-responsive m-b-20">
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>From Date</th>
                    <th>To Date</th>
                    <th>Leave Type</th>
                    <th>Leave Balance</th>
                    <th>Number Of Days</th>
                    <th>Status</th>        
                    <th>Comment</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php        
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_array($result)) {

                        $date1 = $row['from_date'];
                        $date2 = $row['to_date'];
                        
                        $start = strtotime($date1);
                        $end   = strtotime($date2);

                        $diff  = ceil(abs($end - $start) / 86400);
                        
                        $total_remainig = $total - $diff;
                        ?>
                        <tr>
                            <td><?php echo $row['from_date']; ?></td> 
                            <td><?php echo $row['to_date']; ?></td> 
                            <td><?php echo $row['leave_type']; ?></td> 
                            <td><?php echo $total_remainig; ?></td> 
                            <td><?php echo $diff; ?></td> 
                            <td><?php echo $row['status']; ?></td>  
                            <td><?php echo $row['comment']; ?></td> 
                            <td>&nbsp;&nbsp;<a href="employee_profile.php?id=<?php echo $row['id'];?>"><i class="glyphicon glyphicon-eye-open"></i></a>&nbsp;&nbsp; 
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