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
                    <form role="form" class="form-horizontal" id="form_leave" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET" onchange="onSelectChange()">
                        <div class="form-group">
                            <label class="col-sm-3 control-label" for="example-input-small">Employee Name<span class="text-danger">*</span></label>
                            <div class="col-sm-2"></div>
                            <div class="col-sm-6">
                               <?php
                               if ($_SESSION['user_type'] == 'Admin'){
                                $WHERE = '';
                            } else {
                                $WHERE = " WHERE id ='".$_SESSION['id']."'";
                            }
                            $query  = "SELECT id,employee_id,first_name FROM user_employee $WHERE";
                            ?>
                            <select id="employee_id" name="employee_id" class="form-control input-sm"  required>                                   
                               <?php $result = $conn->query($query);
                               while ($row = mysqli_fetch_array($result))
                               {
                                $employee_id = $row['employee_id']." : ".$row['first_name'];
                                ?>
                                <option value="<?php echo $row['id'];?>"><?php echo $employee_id; ?></option>
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
$limit = 2;  
if (isset($_GET["page"])) 
{
 $page  = $_GET["page"];
} else 
{
 $page=1; 
};  
$start_from = ($page-1) * $limit; 
if($_GET['employee_id']){
   $WHERE = " WHERE employee_id ='".$_GET['employee_id']."'";
}
else if ($_SESSION['user_type'] == 'Admin')
{
    $WHERE = '';
} 
else
{
    $WHERE = " WHERE employee_id ='".$_SESSION['id']."'";
}
echo $query  = "SELECT * FROM user_leave $WHERE  LIMIT $start_from, $limit"; 
$result = $conn->query($query);

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
                    <?php if ($_SESSION['user_type'] == 'Admin') { ?>
                    <th colsapn="2">Action</th>
                    <?php } ?>  
                </tr>
            </thead>
            <tbody>
                <?php        
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_array($result)) {
                       // print_r($row);
                        //$total_remainig = $total - $row['number_of_days'];
                        
                        //$remainig_leave = $total_remainig - $row['number_of_days'];
                        ?>
                        <tr>
                            <td><?php echo dateFormate($row['from_date']); ?></td> 
                            <td><?php echo dateFormate($row['to_date']);?></td>
                            <td><?php echo $row['leave_type']; ?></td> 
                            <td><?php echo $total_remainig; ?></td> 
                            <td><?php echo $row['number_of_days']; ?></td> 
                            <td><?php echo $row['status']; ?></td>  
                            <td><?php echo $row['comment']; ?></td> 
                            <?php if ($_SESSION['user_type'] == 'Admin') { ?>                        
                            <td><a href="action.php?leave_id=<?php echo $row['id']; ?>" class="delete"><i class="glyphicon glyphicon-trash"></i></a></td>
                            <?php } ?> 
                        </tr>
                        <?php
                    }
                }
                ?>                            
            </tbody>
        </table>
        <?php  
            $sql = "SELECT COUNT(*) FROM user_leave";  
            $rs_result = mysql_query($sql);  
            $row = mysql_fetch_row($rs_result);  
            $total_records = $row[0];  
            $total_pages = ceil($total_records / $limit);  
            $pagLink = "<div class='pagination'>";  
            for ($x=1; $x<=$total_pages; $x++) {  
                         $pagLink .= "<a href='leave_view.php?page=".$x."'>".$x."</a>";  
            };  
            echo $pagLink . "</div>";  
            ?>
    </div>
</div>
</div>   
<!-- End row-->
</div>
<!-- end container -->
<!-- </div>     -->

<script>
function onSelectChange(){
   document.getElementById('form_leave').submit();
}

</script>
<?php include("includes/footer.php"); ?>


