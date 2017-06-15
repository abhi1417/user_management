<?php 
include("includes/dbConnection.php");
include("includes/header.php");
//include("includes/sidebar.php");
include("function.php");

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
                        <input type="hidden" name="id" value="<?php echo isset($news_id)?$news_id:''; ?>" /> 
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
$id = isset($_GET['id']);
if (!empty($id)){
    $query  = "SELECT * FROM user_leave WHERE id ='".$_GET['id']."'";
    $result = $conn->query($query);

} else {
    header("location:leave_manager.php");     
}    
dateFormate($row['from_date']);
dateFormate($row['to_date']);
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

                       /* $date1 = $row['from_date']. " 00:00:00";
                        $date2 = $row['to_date']. " 23:59:59";
                        
                        $end   = strtotime($date2);
                        $start = strtotime($date1);
                        $diff = ($end - $start);
                        echo floor($diff / (60 * 60 * 24));*/

                        // $diff  = ceil(abs($end - $start) / 86400);
                        
                        $total_remainig = $total - $number_of_days;
                        ?>
                        <tr>
                            <td><?php echo dateFormate($row['from_date']); ?></td> 
                            <td><?php echo dateFormate($row['to_date']);?></td>
                            <td><?php echo $row['leave_type']; ?></td> 
                            <td><?php echo $total_remainig; ?></td> 
                            <td><?php echo $number_of_days; ?></td> 
                            <td><?php echo $row['status']; ?></td>  
                            <td><?php echo $row['comment']; ?></td> 
                            <td><!-- &nbsp;&nbsp;<a href="leave_edit.php?leave_id=<?php echo $row['id'];?>"><i class="glyphicon glyphicon-eye-open"></i></a>&nbsp;&nbsp;  -->
                                &nbsp;&nbsp;<a href="action.php?leave_id=<?php echo $row['id']; ?>" class="delete"><i class="glyphicon glyphicon-trash"></i></a>
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


<?php 
/*
date_default_timezone_set( "asia/kolkata" );
$date1 = new DateTime('14-06-2017 00:00:00');
$date2 = new DateTime('16-06-2017 23:59:59');
$interval = $date1->diff($date2);
echo "difference " . $interval->days . " days ";

echo "<br><br><br><br>";
echo "<br><br><br><br>";*/

/*$first_date = strtotime('15-06-2017');
$first_date = strtotime('-1 day', $first_date);
$second_date = strtotime('20-06-2017');
$diff = ($second_date - $first_date);
echo floor($diff / (60 * 60 * 24));
echo "<br><br><br><br>";
echo "<br><br><br><br>";*/

 


 ?>

