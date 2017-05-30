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