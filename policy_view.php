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

$query  = "SELECT * FROM `user_policy` WHERE `status`=1 AND `policy_type` LIKE '%$search%' OR `from_date` LIKE '%$search%' LIMIT $start_from, $limit";
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
            <h3>Policy List</h3>
            <div class="table-responsive">
                <table class="table m-0">
                    <thead>
                        <tr>                            
                            <th>Policy Name</th>
                            <th>PDF/Comment</th>                            
                            <th>Effective From </th>
                            <th>Effective Till </th>
                            <th colspan="2">Action</th>
                        </tr>             
                    </thead>
                    <tbody>
                       <?php                            
                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_array($result)) {
                                    $pdf_path    = 'assets/pdf/'.$row["file_path"]; 
                                    $file_name = base64_encode($row["file_path"]);                               
                                    $pdf_fc_path    = 'assets/pdf/'.$row["file_path"];                                

                                    $data = "";
                                    if(isset($row["file_path"]) && !empty($row['file_path'])){
                                          $data = '
                                            <a href="'.$pdf_path.'" target="_blank"><i class="glyphicon glyphicon-eye-open"></i></a> 
                                            &nbsp;&nbsp;&nbsp;
                                            <a href="action.php?download_file='.$file_name.'"><i class="glyphicon glyphicon-download"></i></a>
                                            ';  
                                    } else if(isset($row['comment']) && !empty($row['comment'])) {
                                         $data = $row['comment'];   
                                    } else {
                                        $data = "N/A";
                                    }
                                    ?>
                                    <tr>
                                        <td><?php echo $row['policy_type']; ?></td> 
                                        <td><?php echo $data ?></td>
                                        <td><?php echo dateFormate($row['from_date']); ?></td> 
                                        <td><?php echo dateFormate($row['to_date']);?></td>
                                        <td><a href="policy_edit.php?policy_id=<?php echo $row['id'];?>"><i class="glyphicon glyphicon-pencil"></i></a>&nbsp;&nbsp;&nbsp;
                                            <a href="action.php?policy_id=<?php echo $row['id']; ?>" class="delete"><i class="glyphicon glyphicon-trash"></i></a>
                                            </td>
                                    </tr>
                                    <?php
                                }
                            }
                          ?>                      
                    </tbody>
                </table>
                <?php  
                    $sql = "SELECT COUNT(*) FROM user_policy";  
                    $rs_result = $conn->query($sql);
                    $row = mysqli_fetch_row($rs_result);  
                    $total_records = $row[0];  
                    $total_pages = ceil($total_records / $limit);  
                    $pagLink = "<ul class='pagination pagination-split m-0'>";  
                    for ($x=1; $x<=$total_pages; $x++) {  
                     $pagLink .= "<li><a href='policy_view.php?page=".$x."'>".$x."</a></li>";  
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
$("#datepicker1").datepicker({ dateFormat: 'dd/mm/yyyy' });
$("#datepicker2").datepicker({ dateFormat: 'dd/mm/yyyy' });
$( "#dtarea" ).click(function() {
      
      $( "#form1" ).submit();
    });

</script>

<!-- <td><?php /*echo $row['policy_type']; ?></td> 
<td>
    <?php echo !empty($file_path) && file_exists($pdf_fc_path) ? '<a href="'.$pdf_path.'" target="_blank"><i class="glyphicon glyphicon-eye-open"></i></a>' : $comment;?>&nbsp;&nbsp;&nbsp;
    <?php 
    if(!empty($file_path) && file_exists($pdf_fc_path))
    {
    ?>
    <a href="action.php?download_file=<?php echo $file_name; ?>" target="_blank"><i class="glyphicon glyphicon-download-alt"></i></a>
    <?php }
    else*/
    {
        //echo 'N/A';
    }
     ?>
</td> -->