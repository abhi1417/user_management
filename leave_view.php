<?php 
session_start();
include("includes/dbConnection.php");
include("includes/header.php");
include("function.php");

?>
<style>
</style>
<div class="container">                                               
    <div class="row">
        <div class="col-lg-12">
            <div class="p-20 m-b-20">
                <form role="form" class="form-horizontal" id="form_leave" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET" >
                    <div class="col-md-6">
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
                                $query  = "SELECT id,employee_id,first_name FROM user_employee $WHERE ";
                                ?>
                                <select id="employee_id" name="employee_id" class="form-control input-sm srchclass">                                   
                                    <option value="" >Select Employee</option>                                        
                                    <?php $result = $conn->query($query);
                                    while ($row = mysqli_fetch_array($result))
                                    {
                                        $employee_id = $row['employee_id']." : ".$row['first_name'];
                                        ?>
                                        <option value="<?php echo $row['id'];?>" <?php if(isset($row['id']) && $row['id'] == $_GET['employee_id'])echo 'selected = "selected"';?>><?php echo $employee_id;?></option>

                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>    
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-sm-3 control-label" for="example-input-small">Leave Type<span class="text-danger">*</span></label>
                            <div class="col-sm-2"></div>
                            <div class="col-sm-6">
                                <select id="leave_name" name="leave_name" class="form-control input-sm srchclass">                                         
                                    <option value="">Select Option</option>                                        
                                    <?php
                                    $query_leave_type = "SELECT leave_name, id FROM leave_type $WHERE";
                                    $total = 0;
                                    $result_leave_type = $conn->query($query_leave_type);
                                    while ($row_leave_type = mysqli_fetch_array($result_leave_type)) {

                                        $total += $row_leave_type['total_leave'];
                                        ?>                            
                                        <!-- <option value="<?php //echo $row_leave_type['id'];?>" > <?php //echo $row_leave_type['leave_name']; ?> </option>  -->
                                        <option value="<?php echo $row_leave_type['id'];?>" <?php if(isset($row_leave_type['id']) && $row_leave_type['id'] == $_GET['leave_name'])echo 'selected = "selected"';?>> <?php  echo $row_leave_type['leave_name']; ?> </option>                                                                                
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>    
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-sm-3 control-label" for="example-input-small">Status<span class="text-danger">*</span></label>
                            <div class="col-sm-2"></div>
                            <div class="col-sm-6">
                                <select id="status" name="status" class="form-control input-sm srchclass">                                         
                                    <option value="">Select Option</option>                                                                            
                                    <option value="Active">Active</option>                                        
                                    <option value="InActive">InActive</option>                                        
                                </select>
                            </div>
                        </div>  
                    </div>
                    <div class= "col-md-6">
                        <div class="form-group">
                            <label class="col-sm-3 control-label" for="example-input-small"></label>
                            <div class="col-sm-2"></div>
                            <div class="col-sm-6">
                                <input type="submit" class="btn btn-primary" name="leaveDetailsSubmit" id="leaveDetailsSubmit">
                            </div>
                        </div>  
                    </div>
                </div>
            </form>
        </div>
    </div>   
<?php
$limit = 12; 
if(isset($_GET['dtarea']) || isset($_SESSION['dtarea']))
{
 $_SESSION['dtarea'] = $_GET['dtarea']; 
 $limit = $_SESSION['dtarea']; 
}

if (isset($_GET["page"])) 
{
   $page  = $_GET["page"];
} else 
{
   $page=1; 
};  
$start_from = ($page-1) * $limit; 
$leave_from_date  = date('Y-m-d', strtotime( $from_date ));
$leave_to_date  = date('Y-m-d', strtotime( $to_date ));
$search = isset($_GET['search'])? $_GET['search'] :'';

$WHERE = 'WHERE';

if(empty($_GET['employee_id']) || empty($_GET['leave_name']) || empty($_GET['status']) || empty($_GET['search']))
{
    $WHERE = '';
}

if(!empty($search))
{
    $WHERE .= "  `employee_id` LIKE '%$search%' OR `from_date` LIKE '%$search%'";
}


if(isset($_GET['employee_id']))
{
    $WHERE .= " employee_id ='".$_GET['employee_id']."'";
}

if(isset($_GET['leave_name']))
{
    $WHERE .= " AND `leave_type`='".$_GET['leave_name']."' ";
}

if(isset($_GET['status']))
{
    $WHERE .= " AND `status` ='".$_GET['status']."'";
}

if ($_SESSION['user_type'] == 'Admin')
{
    $WHERE .= '';
} 
else
{
    $WHERE .= " employee_id ='".$_SESSION['id']."'";
}
$query  = "SELECT * FROM user_leave  $WHERE  LIMIT $start_from, $limit "; 
$result = $conn->query($query);

dateFormate($row['from_date']);
dateFormate($row['to_date']);
?>
<div class="col-md-12">
    <div class="table-responsive m-b-20">
        <form role="form" id="form1" class="form-horizontal" id="form_entries" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET" >
            <div class="col-md-1 form-inline" style="float:left">
                <select name="dtarea" id="dtarea" class="form-control input-sm">
                    <option value="">Select</option>
                    <option value="5" <?php if($_SESSION['dtarea'] == 5)echo 'selected = "selected"';?>>5</option>
                    <option value="25" <?php if($_SESSION['dtarea'] == 25)echo 'selected = "selected"';?>>25</option>
                    <option value="50" <?php if($_SESSION['dtarea'] == 50)echo 'selected = "selected"';?>>50</option>
                    <option value="100" <?php if($_SESSION['dtarea'] == 100)echo 'selected = "selected"';?>>100</option>                    
                </select>
            </div>
            <div class="col-md-3" style="float:right">
                <div class="form-group" >
                  <input type="search" class="form-control input-sm" id="myInput" name="search" placeholder="YYYY-MM-DD" >
              </div>
          </div>              
        </form>      
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>Employee Name</th>
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
                 $firsttime = 0;
                while ($row = mysqli_fetch_array($result)) {
                    ?>
                    <tr>
                        <td><?php echo $row['employee_id']; ?></td> 
                        <td><?php echo dateFormate($row['from_date']); ?></td> 
                        <td><?php echo dateFormate($row['to_date']);?></td>
                        <td><?php echo $row['leave_type']; ?></td>
                        <?php
                        $x = $total - $row['number_of_days'];
                        if($firsttime>0)
                        {   
                           $x =  $x - $row['number_of_days'];
                        }
                        ?>
                        <td><?php echo $x; ?></td> 
                        <td><?php echo $row['number_of_days']; ?></td> 
                        <td><?php echo $row['status']; ?></td>  
                        <td><?php echo $row['comment']; ?></td> 
                        <?php if ($_SESSION['user_type'] == 'Admin') { ?>                        
                        <td><a href="action.php?leave_id=<?php echo $row['id']; ?>" class="delete"><i class="glyphicon glyphicon-trash"></i></a></td>
                        <?php } ?> 
                    </tr>
                    <?php $firsttime++;
                }
            }
            ?>                            
        </tbody>
    </table>
    <?php  
    $sql = "SELECT COUNT(*) FROM user_leave";  
    $rs_result = $conn->query($sql);
    $row = mysqli_fetch_row($rs_result);  
    $total_records = $row[0];  
    $total_pages = ceil($total_records / $limit);  
    $pagLink = "<ul class='pagination pagination-split m-0'>";  
    for ($x=1; $x<=$total_pages; $x++) {  
       $pagLink .= "<li><a href='leave_view.php?page=".$x."'>".$x."</a></li>";  
   };  
   echo $pagLink . "</ul>";  
   ?>
</div>
</div>
</div>   
</div>
<?php include("includes/footer.php"); ?>
<script>
$( "#dtarea" ).click(function() {
      
      $( "#form1" ).submit();
    });

</script>