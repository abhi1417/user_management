<?php 
include("includes/dbConnection.php");
include("includes/header.php");
?>

<html>
   
   <head>
      <title>Paging Using PHP</title>
   </head>
   
   <body>
      <?php
         $rec_limit = 10;              
         $sql = "SELECT * FROM user_employee";
         $retval = mysql_query( $sql, $conn );
         
         if(! $retval ) {
            die('Could not get data: ' . mysql_error());
         }
         $row = mysql_fetch_array($retval, MYSQL_NUM );
         $rec_count = $row[0];
         
         if( isset($_GET{'page'} ) ) {
            $page = $_GET{'page'} + 1;
            $offset = $rec_limit * $page ;
         }else {
            $page = 0;
            $offset = 0;
         }
         
         $left_rec = $rec_count - ($page * $rec_limit);
         $sql = "SELECT first_name, email, project_team, personal_number FROM user_employee LIMIT $offset, $rec_limit";
            
         $retval = mysql_query( $sql, $conn );
         
         if(! $retval ) {
            die('Could not get data: ' . mysql_error());
         }
         
         while($row = mysql_fetch_array($retval, MYSQL_ASSOC)) {
            echo "NAME :{$row['first_name']}  <br> ".
               "EMAIL : {$row['email']} <br> ".
               "PROJECT TEAM : {$row['project_team']} <br> ".
               "PERSONAL NUMBER : {$row['personal_number']} <br>".
               "--------------------------------<br>";
         }
         
         if( $page > 0 ) {
            $last = $page - 2;
            echo "<a href = \"$_PHP_SELF?page = $last\">Last 10 Records</a> |";
            echo "<a href = \"$_PHP_SELF?page = $page\">Next 10 Records</a>";
         }else if( $page == 0 ) {
            echo "<a href = \"$_PHP_SELF?page = $page\">Next 10 Records</a>";
         }else if( $left_rec < $rec_limit ) {
            $last = $page - 2;
            echo "<a href = \"$_PHP_SELF?page = $last\">Last 10 Records</a>";
         }
         
         mysql_close($conn);
      ?>
      
   </body>
</html>
<!-- if(! $retval ) {
            die('Could not get data: ' . mysql_error());
         }
         
         while($row = mysql_fetch_array($retval, MYSQL_ASSOC)) {
            echo "EMP ID :{$row['emp_id']}  <br> ".
               "EMP NAME : {$row['emp_name']} <br> ".
               EMP SALARY : {$row['emp_salary']} <br> ".
               "--------------------------------<br>";
         }
         
         if( $page > 0 ) {
            $last = $page - 2;
            echo "<a href = \"$_PHP_SELF?page = $last\">Last 10 Records</a> |";
            echo "<a href = \"$_PHP_SELF?page = $page\">Next 10 Records</a>";
         }else if( $page == 0 ) {
            echo "<a href = \"$_PHP_SELF?page = $page\">Next 10 Records</a>";
         }else if( $left_rec < $rec_limit ) {
            $last = $page - 2;
            echo "<a href = \"$_PHP_SELF?page = $last\">Last 10 Records</a>";
         }
         
         mysql_close($conn);
      ?> -->


      <?php 
include("includes/dbConnection.php");
include("includes/header.php");
//include("includes/sidebar.php");
include("function.php");

?>
<style>
</style>
<!-- <link rel="stylesheet" id="font-awesome-style-css" href="http://phpflow.com/code/css/bootstrap3.min.css" type="text/css" media="all"> -->

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
    </div>
</div>
</div>
<?php
/*if (!empty($_GET['limit'])) {
$limit = $_GET['limit'];  
} else {
$limit = 2;  
}*/
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
        <form role="form" class="form-horizontal" id="form_entries" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET" onchange="onSelectChange()">
        <div class="col-md-1 form-inline" style="float:left">
            <select name="dtarea" class="form-control input-sm">
                <option value="1">10</option>
                <option value="2">25</option>
                <option value="3">50</option>
                <option value="4">100</option>
            </select>
        </div>
        <div class="col-md-3" style="float:right">
            <div class="form-group" >
              <input type="search" class="form-control input-sm" id="myInput" name="search" placeholder="Type to search.." >
            </div>
        </div>              
        </form>      
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
<!-- End row-->
</div>
<!-- end container -->
<!-- </div>     -->

<script>
function onSelectChange(){
   document.getElementById('form_leave').submit();
}
function onSelectChange(){
   document.getElementById('form_entries').submit();
}
</script>
<?php include("includes/footer.php"); ?>

