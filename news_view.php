<?php
session_start();
include("includes/dbConnection.php");
include("includes/header.php");
include("function.php");

$limit = 5;  
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

$query  = "SELECT * FROM `user_news` WHERE `status`=1 AND `tittle` LIKE '%$search%' OR `news_date` LIKE '%$search%' LIMIT $start_from, $limit";
$result = $conn->query($query);


dateFormate($row['from_date']);
dateFormate($row['to_date']);

?>

<div class="row p-t-50">
    <div class="container">
        <form role="form" class="form-horizontal" id="form_entries" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET" >
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
                  <input type="search" class="form-control input-sm" id="myInput" name="search" placeholder="YYYY-MM-DD" >
              </div>
          </div>              
        </form>  
    <div class="col-lg-12">
        <div class="m-b-20">
            <h3>News List</h3>
            <div class="table-responsive">
                <table class="table m-0">
                    <thead>
                        <tr>
                            <th>Image</th>                            
                            <th>News Tittle</th>
                            <th>News Date</th>
                            <th>Description</th>                            
                            <?php if ($_SESSION['user_type'] == 'Admin') { ?>
                            <th colsapn="2">Action</th>
                            <?php } ?>
                        </tr>             
                    </thead>
                    <tbody>
                       <?php                            
                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_array($result)) {
                                	
                                    ?>
                                    <tr>
                                        <?php if($row['image'] == '' || $row['image'] == NULL || !file_exists('assets/img/'.$row['image'])){ ?>
                                        <td><img src="<?php echo 'assets/img/profile.jpg'; ?>" hight="80" width="80"></td>
                                        <?php } else { ?>
                                        <td><img src="<?php echo 'assets/img/'.$row['image']; ?>" hight="80" width="80"></td>
                                        <?php } ?>
                                        <td><?php echo $row['tittle']; ?></td> 
                                        <td><?php echo $row['news_date']; ?></td> 
                                        <td><?php echo $row['description']; ?></td> 
                                        <?php if ($_SESSION['user_type'] == 'Admin') { ?>                        
                                        <td><a href="news_edit.php?news_id=<?php echo $row['id'];?>"><i class="glyphicon glyphicon-pencil"></i></a>&nbsp;&nbsp;&nbsp;
                                            <a href="action.php?news_id=<?php echo $row['id']; ?>" class="delete"><i class="glyphicon glyphicon-trash"></i></a>
                                        </td>
                                        <?php } ?>
                                    </tr>
                                    <?php 
                                }
                            }
                          ?>                      
                    </tbody>
                </table>
                <?php  
                    $sql = "SELECT COUNT(*) FROM user_news";  
                    $rs_result = $conn->query($sql);
                    $row = mysqli_fetch_row($rs_result);  
                    $total_records = $row[0];  
                    $total_pages = ceil($total_records / $limit);  
                    $pagLink = "<ul class='pagination pagination-split m-0'>";  
                    for ($x=1; $x<=$total_pages; $x++) {  
                     $pagLink .= "<li><a href='news_view.php?page=".$x."'>".$x."</a></li>";  
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