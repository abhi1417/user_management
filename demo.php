<?php
/*ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);*/

 $emp_id = $_GET['id'];
    if (!empty($emp_id)){
include("includes/dbConnection.php");
include("includes/header.php");
include("includes/sidebar.php");
        $query = "SELECT * FROM user_employee WHERE id ='".$_GET['id']."'";
        $result = $conn->query($query);
        $row = mysqli_fetch_array($result);

        //$employee_id        = $row['employee_id'];
        $first_name         = $row['first_name'];
        $last_name          = $row['last_name'];
        $email              = $row['email'];
        $personal_number    = $row['personal_number'];
        $emergency_number   = $row['emergency_number'];
        $address1           = $row['address1'];
        $address2           = $row['address2'];
        $marital_status     = $row['marital_status'];
        $gender             = $row['gender'];
        $date_of_birth      = $row['date_of_birth'];
        $role_type          = $row['role_type'];
        $project_team       = $row['project_team'];
        $education          = $row['education'];
        $state              = $row['state'];
        $city               = $row['city'];
        $nationality        = $row['nationality'];
        $joining_date       = $row['joining_date'];
        $bond               = $row['bond'];
        $bond_duration_from = $row['bond_duration_from'];
        $bond_duration_to   = $row['bond_duration_to'];

    } else {
        //ob_start();
        //die('herersdsfdsfdsffffffffffffffffffffffffffffffffe');
         header("location:index.php");
        exit('12sadfkdsjflskdjflsdkfjlskdjfldskjfosdfsoi');
    }

?> 
<link href="/symfony/web/webres_554af33274f2b9.68269152/themes/default/css/main.css" rel="stylesheet" type="text/css"/>
        
        <script type="text/javascript" src="/symfony/web/webres_554af33274f2b9.68269152/js/jquery/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="/symfony/web/webres_554af33274f2b9.68269152/js/jquery/validate/jquery.validate.js"></script>
<script type="text/javascript" src="/symfony/web/webres_554af33274f2b9.68269152/js/jquery/jquery.ui.core.js"></script>
<script type="text/javascript" src="/symfony/web/webres_554af33274f2b9.68269152/js/jquery/jquery.autocomplete.js"></script>
<script type="text/javascript" src="/symfony/web/webres_554af33274f2b9.68269152/js/orangehrm.autocomplete.js"></script>
<script type="text/javascript" src="/symfony/web/webres_554af33274f2b9.68269152/js/jquery/jquery.ui.datepicker.js"></script>
<script type="text/javascript" src="/symfony/web/webres_554af33274f2b9.68269152/js/jquery/jquery.form.js"></script>
<script type="text/javascript" src="/symfony/web/webres_554af33274f2b9.68269152/js/jquery/jquery.tipTip.minified.js"></script>
<script type="text/javascript" src="/symfony/web/webres_554af33274f2b9.68269152/js/jquery/bootstrap-modal.js"></script>
<script type="text/javascript" src="/symfony/web/webres_554af33274f2b9.68269152/js/jquery/jquery.clickoutside.js"></script>
<script type="text/javascript" src="/symfony/web/webres_554af33274f2b9.68269152/js/orangehrm.validate.js"></script>
<script type="text/javascript" src="/symfony/web/webres_554af33274f2b9.68269152/js/archive.js"></script>


<?php 

include("includes/dbConnection.php");
include("includes/header.php");
include("includes/sidebar.php");

?>
<style>
</style>
<!-- START PAGE CONTENT -->
<div id="page-right-content">
    <div class="container">                                               
        <div class="row">
            <div class="col-lg-12">
                <div class="p-20 m-b-20">
                    <div class="col-md-6">
                        <form role="form" class="form-horizontal">
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="example-input-small">Leave Type<span class="text-danger">*</span></label>
                                <div class="col-sm-2"></div>
                                <div class="col-sm-6">
                                    <select id="leave" name="leave_type" class="form-control input-sm" required> 
                                        <option value="">Select Role</option>
                                        <option value="casual leave" id="casual_leave">Casual leave-12</option>
                                        <option value="sick leave" id="sick_leave">Sick leave-6</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="example-input-small">Leave Balance<span class="text-danger">*</span></label>
                                <div class="col-sm-2"></div>
                                <div class="col-sm-6">
                                        <!--<?php //echo isset($)?ucfirst($):''; ?>
                                        <input type="hidden" name="" value="<?php //echo isset($)?$:''; ?>">-->
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="example-input-small">Form Date<span class="text-danger">*</span></label>
                                <div class="col-sm-2"></div>
                                <div class="col-sm-6 ">
                                    <input type="text" class="form-control input-sm" placeholder="mm/dd/yyyy" id="datepicker-autoclose" name="from_date" id="from_date">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="example-input-small">To Date<span class="text-danger">*</span></label>
                                <div class="col-sm-2"></div>
                                <div class="col-sm-6 ">
                                    <input type="text" class="form-control input-sm" placeholder="mm/dd/yyyy" id="datepicker-autoclose" name="to_date" id="to_date">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Comment<span class="text-danger">*</span></label>
                                <div class="col-sm-8">
                                    <textarea class="form-control" name="comment" id="comment" ></textarea>
                                </div>
                            </div>
                            <div class="form-group text-left m-b-0">
                                    <button class="btn btn-primary waves-effect waves-light" type="submit" name="apply" id="submit">
                                        Apply
                                    </button>
                                </div>  
                        </form>
                    </div> <!-- end col -->
                </div>
            </div>
            <!-- Col-md-12 end-->
        </div>   
            <!-- End row-->
    </div>
    <!-- end container -->
</div>    
<!--<?php //include("includes/validation.php");?>-->
<?php include("includes/footer.php");?>
<script type="text/javascript">
            $(document).ready(function() {
                $('.form-validation').parsley();
                $('.summernote').summernote({
                    height: 350,                 // set editor height
                    minHeight: null,             // set minimum height of editor
                    maxHeight: null,             // set maximum height of editor
                    focus: false                 // set focus to editable area after initializing summernote
                });
                });

            

        </script>


<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include("includes/dbConnection.php");
include("includes/header.php");
//include("includes/sidebar.php");

$id = isset($_GET['id']);
    if (!empty($id)){
        $query = "SELECT * FROM user_leave WHERE id ='".$_GET['id']."'";
        $result = $conn->query($query);
        $row = mysqli_fetch_array($result);
        
        // /print_r($row); die;
        $from_date  = $row['from_date'];
        $to_date    = $row['to_date'];
        $comment    = $row['comment'];
        
        if(isset($row['leave_type']) && $row['leave_type']!=""){
            $leave_type = $row['leave_type'];
            $casual_leave = "";
            $sick_leave = "";

            if( $leave_type == "casual leave") {
                $casual_leave = " selected ";
            } elseif( $leave_type == "sick leave" ){
                $sick_leave = " selected ";
            }
        }

    }

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
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="example-input-small">Employee Name<span class="text-danger">*</span></label>
                                <div class="col-sm-2"></div>
                                <div class="col-sm-6">
                                    <select id="employee_id" name="employee_id" class="form-control input-sm" required> 
                                        <option value="0" >Select Employee</option>
                                         <?php 
                                              $query = "SELECT employee_id, first_name FROM user_employee WHERE  status = '1'";
                                              $result = $conn->query($query);
                                              while ($row = mysqli_fetch_array($result))
                                                {
                                                    //print_r($row);
                                                    $employee_id = $row['employee_id']." - ".$row['first_name'];
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
                                    <select id="leave_type" name="leave_type" class="form-control input-sm" required> 
                                        <option value="">Select Role</option>
                                        <option value="casual leave" <?php  echo isset($casual_leave)?$casual_leave:''; ?> >Casual leave</option>
                                        <option value="sick leave" <?php  echo isset($sick_leave)?$sick_leave:''; ?> >Sick leave</option>
                                    </select>
                                </div>
                            </div>  
                        </form>
                    </div> <!-- end col -->
                </div>
            </div>
            <!-- Col-md-12 end-->
            <?php
            $emp_id = isset($_GET['id']);
            if (!empty($emp_id)){
                $query  = "SELECT * FROM user_leave WHERE id ='".$_GET['id']."'";
                $result = $conn->query($query);

                $query_type = "SELECT * FROM leave_type WHERE id ='".$_GET['id']."'";
                $result_type = $conn->query($query_type);

            } else {
                header("location:leave_manager.php");     
            }    
            ?>
            <div class="col-md-12">
            <div class="table-responsive m-b-20">
                    <table class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th>Date</th>
                            <th>Employee Name</th>
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
                                if (mysqli_num_rows($result) > 0 && mysqli_num_rows($result_type) > 0) {
                                    while ($row = mysqli_fetch_array($result) && $row_type = mysqli_fetch_array($result_type)) {
                                        $date = $row['from_date']." ".$row['to_date'];
                                        $date1 = date_create($row['from_date']);
                                        $date2 = date_create($row['to_date']);
                                        $diff = date_diff($date1,$date2);

                                        $casual =
                                        $sick =
                                        $total = 
                                        ?>
                                        <tr>
                                            
                                            <td><?php echo $date; ?></td> 
                                            <td><?php echo $row['employee_id']; ?></td> 
                                            <td><?php echo $row['leave_type']; ?></td> 
                                            <td><?php echo $row_type['leave_balance']; ?></td> 
                                            <td><?php echo $diff->format("%R%a days"); ?></td> 
                                            <td><?php echo $row['status']; ?></td> 
                                            <td><?php echo $row['comment']; ?></td> 
                                            <td>&nbsp;&nbsp;<a href="employee_profile.php?id=<?php //echo $row['id'];?>"><i class="glyphicon glyphicon-eye-open"></i></a>&nbsp;&nbsp; 
                                                &nbsp;&nbsp;<a href="action.php?id=<?php //echo $row['id']; ?>" class="delete"><i class="glyphicon glyphicon-trash"></i></a>
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

<?php 

include("includes/footer.php");
?>



<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include("includes/dbConnection.php");
include("includes/header.php");
//include("includes/sidebar.php");
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
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="example-input-small">Employee Name<span class="text-danger">*</span></label>
                                <div class="col-sm-2"></div>
                                <div class="col-sm-6">
                                        <select id="employee_id" name="employee_id" class="form-control input-sm" required>  
                                        <option value="0" >Select Employee</option>                                  
                                         <?php 
                                              $query = "SELECT employee_id, first_name FROM user_employee WHERE  status = '1'";
                                              $result = $conn->query($query);
                                              while ($row = mysqli_fetch_array($result))
                                                {
                                                    $employee_id = $row['employee_id']." : ".$row['first_name'];
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
                                    <select id="leave_type" name="leave_type" class="form-control input-sm" required> 
                                        <option value="">Select Role</option>
                                        <option value="casual leave" <?php  echo isset($casual_leave)?$casual_leave:''; ?> >Casual leave</option>
                                        <option value="sick leave" <?php  echo isset($sick_leave)?$sick_leave:''; ?> >Sick leave</option>
                                    </select>
                                </div>
                            </div>  
                        </form>
                    </div> <!-- end col -->
                </div>
            </div>
            <!-- Col-md-12 end-->
            <?php
            $emp_id = isset($_GET['id']);
            if (!empty($emp_id)){
                $query  = "SELECT * FROM user_leave WHERE id ='".$_GET['id']."'";
                $result = $conn->query($query);

            } else {
                header("location:leave_manager.php");     
            }    
            ?>
            <div class="col-md-12">
            <div class="table-responsive m-b-20">
                    <table class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th>Date</th>
                            <th>Employee Name</th>
                            <th>Leave Type</th>
                            <!-- <th>Leave Balance</th> -->
                            <th>Number Of Days</th>
                            <!-- <th>Status</th> -->
                            <th>Comment</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php                                 
                                if (mysqli_num_rows($result) > 0) {
                                    while ($row = mysqli_fetch_array($result)) {

                                        $date = $row['from_date']." to ".$row['to_date'];

                                        $date1 = date_create($row['from_date']);
                                        $date2 = date_create($row['to_date']);
                                        $diff = date_diff($date1,$date2);

                                        ?>
                                        <tr>
                                                    
                                            <td><?php echo $date; ?></td> 
                                            <td><?php echo $row['employee_id']; ?></td> 
                                            <td><?php echo $row['leave_type']; ?></td> 
                                            <!-- <td><?php //echo $row['leave_balance']; ?></td>  -->
                                            <td><?php echo $diff->format("%R%a days"); ?></td> 
                                            <!-- <td><?php //echo $row['status']; ?></td>  -->
                                            <td><?php echo $row['comment']; ?></td> 
                                            <td>&nbsp;&nbsp;<a href="employee_profile.php?id=<?php echo $row['id'];?>"><i class="glyphicon glyphicon-eye-open"></i></a>&nbsp;&nbsp; 
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
            <!-- End row-->
    </div>
    <!-- end container -->
<!-- </div>     -->

<?php 

include("includes/footer.php");
?>



    <?php 
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    include("includes/dbConnection.php");
    include("includes/header.php");
    //include("includes/sidebar.php");

$total= 0;

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
                                                    //print_r($row);
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

                                      $result_leave_type = $conn->query($query_leave_type);
                                        while ($row_leave_type = mysqli_fetch_array($result_leave_type)) {

                                            $total = $row_leave_type['total_leave'];
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
            $emp_id = isset($_GET['id']);
            if (!empty($emp_id)){
                $query  = "SELECT * FROM user_leave WHERE id ='".$_GET['id']."'";
                $result = $conn->query($query);

            } else {
                header("location:leave_manager.php");     
            }    
            ?>
            <div class="col-md-12">
                <div class="table-responsive m-b-20">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>From Date</th>
                                <th>To Date</th>
                                <!-- <th>Employee Name</th> -->
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

                                //$date = $row['from_date']." to ".$row['to_date'];

                                $date1 = date_create($row['from_date']);
                                $date2 = date_create($row['to_date']);
                                $diff = date_diff($date1,$date2);


                                $total_leave = ;
                                ?>
                                <tr>
                                    <td><?php echo $row['from_date']; ?></td> 
                                    <td><?php echo $row['to_date']; ?></td> 
                                    <!-- <td><?php //echo $row['employee_id']; ?></td> --> 
                                    <td><?php echo $row['leave_type']; ?></td> 
                                    <td><?php echo $row['leave_balance']; ?></td> 
                                    <td><?php echo $diff->format("%R%a days"); ?></td> 
                                    <td><?php echo $row['status']; ?></td>  
                                    <td><?php echo $row['comment']; ?></td> 
                                            <td>&nbsp;&nbsp;<a href="employee_profile.php?id=<?php echo $row['id'];?>"><i class="glyphicon glyphicon-eye-open"></i></a>&nbsp;&nbsp; 
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
            <!-- End row-->
        </div>
        <!-- end container -->
        <!-- </div>     -->

        <?php 

        include("includes/footer.php");
        ?>




        $policy_type = isset($_POST['policy_type']) && (!empty($_POST['policy_type'])) ? "'$policy_type'" : NULL;
            $file_path   = isset($_FILES['file_path']['name']) && !empty($_FILES['file_path']['name']) ? "'$file_path'" : NULL;
            $comment     = isset($_POST['comment']) && !empty($_POST['comment']) ? "'$comment'" : NULL;

            if(!empty($_POST['comment'])){
                    $comment = "'".$_POST['comment']."'";
                }else{
                    $comment = "NULL";
                }






<?php 
include("includes/dbConnection.php");
include("includes/header.php");
include("includes/sidebar.php");

 $news_id = isset($_GET['news_id']) ? $_GET['news_id'] :'' ;
    if (!empty($news_id)){
  $query = "SELECT * FROM user_news WHERE id = '".$news_id."'";
  /*$result = mysql_query ($sql) or die (mysql_error ());*/
  $result = $conn->query($query);
  $rows = mysqli_fetch_array($result);

    
    $tittle = $rows['tittle'];  
    $description   = $rows['description'];
    $news_date   = $rows['news_date'];
  
     else {
        //header("location: login.php");
    }

}

?>
    <!-- START PAGE CONTENT -->
    <div id="page-right-content">
        <div class="container">                                               
            <div class="row">
                <div class="col-lg-12">
                    <h4 class="header-title m-t-0">News Section</h4>
                    <!-- Pesronal Information Start -->
                    <div class="p-20 m-b-20">
                        <form name="myForm" id="myform" action="action.php" method="POST" class="form-horizontal" role="form">                
                            <input type="hidden" name="id" value="<?php echo isset($id)?$id:''; ?>" />  
                            <div class="form-group">
                                <label for="tittle" class="col-sm-3 control-label">News Tittle *</label>
                                <div class="col-xs-4">
                                    <input type="text" id="tittle" placeholder="File Name" value="<?php  echo isset($tittle)?$tittle:''; ?>" name="tittle" class="form-control ">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="news_date" class="col-sm-3 control-label">News Date *</label>
                                <div class="col-xs-4">
                                    <input type="text" class="form-control" placeholder="yyyy/mm/dd" id="datepicker1" name="news_date" id="news_date" value="<?php echo isset($news_date)?$news_date:''; ?>">
                                </div>
                            </div>
                            <div class="form-group ">
                                <label for="description" class="col-sm-3 control-label">Description *
                                    <textarea class="form-control " name="description" value="" rows="10" cols="80" minlength="5" maxlength="500" id="description"><?php echo $description; ?></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-9 col-sm-offset-3">
                                    <button type="submit" name="updateBtn" id="submit" class="btn btn-primary">Update</button> 
                                </div>
                            </div>
                        </form> 
                    </div>
                </div><!-- Col-md-6 end-->
            </div><!-- End row-->
        </div><!-- end container -->
    </div><!-- End #page-right-content --> 

<?php include("includes/footer.php"); ?>
<script>
$('#datepicker1').datepicker({
    orientation: 'auto bottom'
});
$("#datepicker1").datepicker().datepicker("setDate", new Date());

</script>                




<div class="form-group">
<label class="col-sm-3 control-label" for="example-input-small">Month<span class="text-danger">*</span></label>
<div class="col-sm-2"></div>
<div class="col-sm-6">
<?php
$monthArr = array('1' =>'jan','2' =>'feb','3' =>'mar','4' =>'apr','5' =>'may','6' =>'jun','7' =>'july','8' =>'aug','9' =>'sep','10' =>'oct','11' =>'nov','12' =>'dec', );
?>
<select id="bill_date" name="bill_date" class="form-control input-sm">    
<?php  foreach ($monthArr as $key => $value) {  
?>
<option value="<?php echo $key;?>"><?php echo ucfirst($value);?></option>
<?php         
}
?>
</select>
</div>
</div> 


<?php 
include("includes/dbConnection.php");
include("includes/header.php");
?>
<div class="container">                                               
    <div class="row">
        <div class="col-lg-12">
            <div class="p-20 m-b-20">
                <div class="col-md-6">
                    <form role="form" class="form-horizontal" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET">
                        <div class="form-group">
                            <label class="col-sm-3 control-label" for="example-input-small">Month<span class="text-danger">*</span></label>
                            <div class="col-sm-2"></div>
                            <div class="col-sm-6">
                                <select id="bill_date" name="bill_date" class="form-control input-sm">    
                                 <option value="">Select Month</option>
                                 <option value="last_month">Last Month</option>
                                 <option value="last_6_month">Last 6 Month</option>
                                 <option value="this_year">This Year</option>
                                 <option value="last_year">Last Year</option>
                                 <option value="custom">Custom</option>
                             </select>
                         </div>
                     </div>
                     <div class="form-group" id="custom_date" style="display:none;">
                        <label class="col-sm-3 control-label" for="example-input-small">Date<span class="text-danger">*</span></label>
                        <div class="col-sm-2"></div>
                        <div class="col-sm-6">
                            <div class="input-daterange input-group" id="date-range">
                                <input type="text" class="form-control" name="custom_from" id="custom_from" />
                                <span class="input-group-addon b-0">to</span>
                                <input type="text" class="form-control" name="custom_to" id="custom_to" />
                            </div>
                        </div>
                    </div> 
                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="example-input-small">Status<span class="text-danger">*</span></label>
                        <div class="col-sm-2"></div>
                        <div class="col-sm-6">
                            <select id="status" name="status" class="form-control input-sm">                                         
                                <option value="1">Approved</option>                                        
                                <option value="0">UnApproved</option>                                        
                            </select>
                            <label class="control-label" for="example-input-small">
                                <button type="submit" name="searchBtnBill" value="Upload PDF" id="submit" class="btn btn-primary input-sm">Search</button>
                            </label>
                        </div>
                    </div>  
                </form>
            </div> <!-- end col -->
        </div>
    </div><!-- Col-md-12 end-->
    <?php
    
    $query  = "SELECT * FROM user_bill ";
    $where = '';
    if(isset($_GET['searchBtnBill']))
    {   
        $prevmonth = date('M');
        $month = $_GET['bill_date'];
        $status = $_GET['status'];

        if($month == 'last_month'){
            $where = ' where `bill_date` >= DATE_SUB(CURDATE(), INTERVAL 1 MONTH)';
        }
    }
    
    $main_query = $query . $where;

    $result = $conn->query($main_query);

    ?>
    <div class="col-md-12">
        <div class="table-responsive m-b-20">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>User Name</th>
                        <th>Bill Name</th>
                        <th>Bill Date</th>
                        <th>Bill Amount</th>
                        <th>Bill PDF/Image</th>
                        <th>Bill Description</th>
                        <th>Status</th>        
                        <th colsapn="2">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php        
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_array($result)) {
                            $status = $row['status'];
                            if($status == 1 )
                            {
                                $msg = "Approved";
                            } else {
                                $msg = "UnApproved";
                            }
                            ?>
                            <tr>
                                <td><?php echo $row['user_name']; ?></td> 
                                <td><?php echo $row['bill_name']; ?></td> 
                                <td><?php echo $row['bill_date']; ?></td> 
                                <td><?php echo $row['bill_amount']; ?></td> 
                                <td><?php echo $row['bill_file_path']; ?></td> 
                                <td><?php echo $row['bill_description']; ?></td> 
                                <td><?php echo $msg; ?></td>  
                                <td>&nbsp;&nbsp;<a href="bill_edit.php?id=<?php echo $row['id'];?>"><i class="glyphicon glyphicon-eye-open"></i></a>&nbsp;&nbsp; 
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
<!-- End row-->
</div>
<!-- end container -->

<?php include("includes/footer.php"); ?>
<script>
$('#bill_date').on('change', function (e) {
    var selectedVal = $('option:selected', this).val();
    if(selectedVal == "custom")
    {
        $('#custom_date').show();
    }
    else
    {
        $('#custom_date').hide();
    }
});
</script>

<!--   $query_file_path = "SELECT bill_file_path FROM user_bill WHERE id = '$bill_id'";            
            $result_file_path = $conn->query($query_file_path);
            $row_file_path = mysqli_fetch_array($result_file_path);
            
            if (mysqli_num_rows($result_file_path) > 0 ) {
                $msg = "This PDF is already exists"; 
                 
                header("location: bill_edit.php?msg={$msg}");
            }

if (($file_size > 5242880)){      
                    $msg_size = 'File too large. File must be less than 5 Megabytes.';  
                    header("location: bill_edit.php");          
                }
                else if (($file_type != "application/pdf")){
                    $msg_size = 'Invalid file type. Only PDF types are accepted.'; 
                    header("location: bill_edit.php");          
                }

                $file_size = $_FILES['bill_file_path']['size']; 
            $file_type = $_FILES['bill_file_path']['type']; 

            $bill_from_date = date('Y-m-d', strtotime( $bill_date ));
            
            if(!empty($bill_file_path))
            {

            $bill_file = $_FILES['bill_file_path']['name'];

            
           
            //print_r($_FILES);
            } else {


            else if(isset($_POST['billUpdatBtn']))
        {   
            $bill_id           = $_POST['id'];
            $user_name         = $_POST['user_name'];  
            $bill_name         = $_POST['bill_name'];  
            $bill_date         = $_POST['bill_date'];
            $bill_amount       = $_POST['bill_amount'];
            $bill_file_path    = $_FILES["bill_file_path"]["name"];
            $bill_description  = $_POST['bill_description'];

            $bill_from_date = date('Y-m-d', strtotime( $bill_date ));
            
            if(!empty($bill_file_path))
            {

            $bill_file = $_FILES['bill_file_path']['name'];

            $folder = "assets/pdf/";
            $file_size = $_FILES['bill_file_path']['size']; 
            $file_type = $_FILES['bill_file_path']['type']; 
            
          /*    $query_file_path = "SELECT bill_file_path FROM user_bill WHERE id = '$bill_id'";            
            $result_file_path = $conn->query($query_file_path);
            $row_file_path = mysqli_fetch_array($result_file_path);
            
            if (mysqli_num_rows($result_file_path) > 0 ) {
                $msg = "This PDF is already exists";                 
                header("location: bill_edit.php?msg={$msg}");
            }*/

            print_r($_FILES);die;
                if (($file_size > 5242880)){      
                    $msg_size = 'File too large. File must be less than 5 Megabytes.';  
                    header("location: bill_edit.php");          
                }
                else if (($file_type != "application/pdf")){
                    $msg_size = 'Invalid file type. Only PDF types are accepted.'; 
                    header("location: bill_edit.php");          
                }    
               move_uploaded_file($_FILES["bill_file_path"]["tmp_name"] , "$folder".$_FILES["bill_file_path"]["name"]);
            } else {
                echo $query = "UPDATE user_bill SET user_name ='".$user_name."', bill_name ='".$bill_name."', bill_date ='".$bill_from_date."', bill_amount ='".$bill_amount."', bill_file_path = '".$bill_file."', bill_description ='".$bill_description."'  WHERE id = '".$bill_id."'"; 

                $result = $conn->query($query);
                $row_count =  mysqli_affected_rows($conn); 
                if($row_count > 0 )
                {
                    header("location: bill_view.php");
                } else{
                    header("location: bill_edit.php?bill_id={$bill_id}");
                }
            }
        }
    }

 -->



