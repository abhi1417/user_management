<?php
session_start();
include("includes/dbConnection.php");
include("includes/header.php");

 $query  = "SELECT * FROM `user_news` WHERE `status`=1";
    $result = $conn->query($query);
?>


<div class="row p-t-50">
	<div class="container">
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
            </div>
        </div>
    </div>
	</div>
</div>
<!-- end row -->
<?php include("includes/footer.php");?>