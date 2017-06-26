<?php 
include("includes/dbConnection.php");
include("includes/header.php");
include("function.php");

$limit = 5;  
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

$query  = "SELECT first_name,last_name,email,personal_number,project_team,id FROM `user_employee` WHERE `status`=1 AND `first_name` LIKE '%$search%' OR `email` LIKE '%$search%' OR `personal_number` LIKE '%$search%'OR `project_team` LIKE '%$search%' LIMIT $start_from, $limit";
$result = $conn->query($query);    

dateFormate($row['from_date']);
dateFormate($row['to_date']);
?>
<div class="row p-t-50">
    <div class="container">
        <form role="form" id="form1" class="form-horizontal" id="form_entries" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET" >
            <div class="col-md-1 form-inline" style="float:left">
                <select name="dtarea" id = "dtarea" class="form-control input-sm">
                    <option value="">Select</option>
                    <option value="2" <?php if($_SESSION['dtarea'] == 2)echo 'selected = "selected"';?>>2</option>
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
    <div class="col-lg-12">
        <div class="m-b-20">
            <h3>Employee List</h3>
            <div class="table-responsive">
                <table class="table m-0">
                    <thead>
                        <tr>                            
                            <th>No.</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Mobile</th>
                            <th>Project Team</th>
                            <th colspan="2">Action</th>
                        </tr>             
                    </thead>
                    <tbody>
                        <?php 
                            $i = 0;                                
                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_array($result)) {
                                  //$id = $rows['id']; 
                                    $name = $row['first_name']." ".$row['last_name'];
                                    ?>
                                    <tr>
                                        <td><?php echo ++$i;?></td>
                                        <td><?php echo ucfirst($name); ?></td> 
                                        <td><?php echo $row['email']; ?></td> 
                                        <td><?php echo $row['personal_number']; ?></td> 
                                        <td><?php echo ucfirst($row['project_team']);?></td>
                                        <td>&nbsp;&nbsp;<a href="employee_profile.php?id=<?php echo $row['id'];?>"><i class="glyphicon glyphicon-eye-open"></i></a>&nbsp;&nbsp; 
                                            &nbsp;&nbsp;<a href="employee_edit.php?id=<?php echo $row['id'];?>"><i class="glyphicon glyphicon-pencil"></i></a>&nbsp;&nbsp; 
                                            &nbsp;&nbsp;<a href="action.php?id=<?php echo $row['id']; ?>" class="delete"><i class="glyphicon glyphicon-trash"></i></a>
                                        </td>
                                    </tr>
                                    <?php
                                }
                            }
                        ?>                     
                    </tbody>
                </table>
                <?php  
                    $sql = "SELECT COUNT(*) FROM user_employee";  
                    $rs_result = $conn->query($sql);
                    $row = mysqli_fetch_row($rs_result);  
                    $total_records = $row[0];  
                    $total_pages = ceil($total_records / $limit);  
                    $pagLink = "<ul class='pagination pagination-split m-0'>";  
                    for ($x=1; $x<=$total_pages; $x++) {  
                     $pagLink .= "<li><a href='employee_view.php?page=".$x."'>".$x."</a></li>";  
                 };  
                 echo $pagLink . "</ul>";  
                 ?>
            </div>
        </div>
    </div>
    </div>
</div>
<!-- end row -->
<?php include("includes/footer.php");?>
<?php 
?>
<script>
$( "#dtarea" ).click(function() {
    $( "#form1" ).submit();
});
</script>