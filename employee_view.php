<?php
session_start();
include("includes/dbConnection.php");
if(!isset($_SESSION['id']) || $_SESSION['id']=="")
  {
        header("location: login.php");
  }
include("includes/header.php");
include("includes/sidebar.php");


    $query  = "SELECT * FROM `user_employee` WHERE `status`=1";
    //$query = "SELECT * FROM registration";
    $result = $conn->query($query);
?>
<div id="page-right-content">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h4 class="m-t-0 header-title">Data Tables</h4>

                <div class="table-responsive m-b-20">
                    <table id="datatable" class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th>No.</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Mobile</th>
                            <th>Project Team</th>
                            <th>Action</th>
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
                </div>
            </div>
        </div>
    </div>    
<?php include("includes/footer.php");?>

