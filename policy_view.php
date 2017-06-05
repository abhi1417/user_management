<?php 
include("includes/dbConnection.php");
include("includes/header.php");

 $query  = "SELECT * FROM user_policy";
    $result = $conn->query($query);
?>


<div class="row p-t-50">
	<div class="container">
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
                                	$file_path   = isset($row["file_path"]) && !empty($row['file_path']) ? $row['file_path'] : "";
                                	$comment     = isset($row['comment']) && !empty($row['comment']) ? $row["comment"] : ""; 
                                    $pdf_path    = 'pdf/'.$row["file_path"]; 
                                    $file_name = base64_encode($row["file_path"]);                               
                                	$pdf_fc_path    = '/var/www/html/user_management/pdf/'.$row["file_path"];                                
                                	
                                    ?>
                                    <tr>
                                        <td><?php echo $row['policy_type']; ?></td> 
                                        <td>
                                            <?php echo !empty($file_path) && file_exists($pdf_fc_path) ? '<a href="'.$pdf_path.'" target="_blank"><i class="glyphicon glyphicon-eye-open"></i></a>' : $comment;?>&nbsp;&nbsp;&nbsp;

                                            <?php 
                                            if(!empty($file_path) && file_exists($pdf_fc_path))
                                            {
                                            ?>
                                            <a href="action.php?download_file=<?php echo $file_name; ?>" target="_blank"><i class="glyphicon glyphicon-download-alt"></i></a>
                                            <?php }
                                            else
                                            {
                                                //echo 'N/A';
                                            }
                                             ?>
                                    </td>
                                        <td><?php echo $row['from_date']; ?></td> 
                                        <td><?php echo $row['to_date'];?></td>
                                        <td><a href="policy_edit.php?id=<?php echo $row['id'];?>"><i class="glyphicon glyphicon-pencil"></i></a>&nbsp;&nbsp;&nbsp;
                                            <a href="action.php?id=<?php echo $row['id']; ?>" class="delete"><i class="glyphicon glyphicon-trash"></i></a>
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
	</div>
</div>
<!-- end row -->
