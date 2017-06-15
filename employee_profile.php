    <?php
    
    session_start();
    include("includes/dbConnection.php");
    if(!isset($_SESSION['id']) || $_SESSION['id']=="")
    {
        header("location: login.php");
    }
    include("includes/header.php");
    include("includes/sidebar.php");

    $id = isset($_GET['id']);
    if (!empty($id)){
        $query = "SELECT * FROM user_employee WHERE id ='".$_GET['id']."'";
        $result = $conn->query($query);
        $row = mysqli_fetch_array($result);

        $employee_id        = $row['employee_id'];
        $first_name         = $row['first_name'];
        $last_name          = $row['last_name'];
        $email              = $row['email'];
        $personal_number    = $row['personal_number'];
        $emergency_number   = $row['emergency_number'];
        $residental_address = $row['residental_address'];
        $home_address       = $row['home_address'];
        $marital_status     = $row['marital_status'];
        $gender             = $row['gender'];
        $date_of_birth      = $row['date_of_birth'];
        $role_type          = $row['role_type'];
        $employee_role      = $row['employee_role'];
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
        header("location:employee_reg.php");     
    }


    ?> 

    <style >
    .profile_info_panel{
        margin-top:    10px; 
        margin-bottom: 10px;
        border-bottom: 1px solid #ccc;
    }
    </style>
    <!-- Start Page Content -->
    <div id="page-right-content">
       <div class="container">                                               
        <div class="row">
            <div class="col-md-6">
                <!-- <form name="myForm" id="myform" action="" method="POST" class="form-horizontal" role="form">   -->
                <div class="heading">
                  <h2>Personal Information</h2>
                  <hr>
              </div>     
              <input type="hidden" name="id" value="<?php echo isset($id)?$id:''; ?>" /> 
              <div class="col-md-12 profile_info_panel">
                 <label for="first_name" class="col-md-6 ">Employee ID </label>
                      <div class="col-md-6">
                        <?php echo isset($employee_id)?$employee_id:''; ?>
                        <input type="hidden" name="employee_id" value="<?php  echo isset($employee_id)?($employee_id):''; ?>">
                    </div>
                </div>
              <div class="col-md-12 profile_info_panel">
                 <label for="first_name" class="col-md-6 ">First Name </label>
                      <div class="col-md-6">
                        <?php echo isset($first_name)?ucfirst($first_name):''; ?>
                        <input type="hidden" name="first_name" value="<?php  echo isset($first_name)?($first_name):''; ?>">
                    </div>
                </div>
                <div class="col-md-12 profile_info_panel">
                 <label for="last_name" class="col-md-6 ">Last Name </label>
                       <div class="col-md-6">
                        <?php echo isset($last_name)?ucfirst($last_name):''; ?>
                        <input type="hidden" name="last_name" value="<?php  echo isset($last_name)?$last_name:''; ?>">
                    </div>
                </div>
                <div class="col-md-12 profile_info_panel">
                 <label for="email" class="col-md-6 ">Email </label>
                 <div class="col-md-6">
                    <?php echo isset($email)?ucfirst($email):''; ?>
                    <input type="hidden" name="email" value="<?php  echo isset($email)?$email:''; ?>">
                </div>
                </div>    
                <div class="col-md-12 profile_info_panel">
                 <label for="personal_number" class="col-md-6 ">Personal Number </label>
                 <div class="col-md-6">
                    <?php echo isset($personal_number)?ucfirst($personal_number):''; ?>
                            <input type="hidden" name="personal_number" value="<?php  echo isset($personal_number)?$personal_number:''; ?>">
                        </div>
                    </div> 
                    <div class="col-md-12 profile_info_panel">
                     <label for="emergency_number" class="col-md-6 ">Emergency Number </label>
                     <div class="col-md-6">
                        <?php echo isset($emergency_number)?ucfirst($emergency_number):''; ?>
                        <input type="hidden" name="emergency_number" value="<?php  echo isset($emergency_number)?$emergency_number:''; ?>">
                    </div>
                </div> 
                <div class="col-md-12 profile_info_panel">
                 <label for="residental_address" class="col-md-6 ">Address Street 1 </label>
                 <div class="col-md-6">
                    <?php echo isset($residental_address)?ucfirst($residental_address):''; ?>
                    <input type="hidden" name="residental_address" value="<?php  echo isset($residental_address)?$residental_address:''; ?>">
                </div>
            </div> 
            <div class="col-md-12 profile_info_panel">
             <label for="home_address" class="col-md-6 ">Address Street 2 </label>
             <div class="col-md-6">
                            <?php echo isset($home_address)?ucfirst($home_address):''; ?>
                            <input type="hidden" name="home_address" value="<?php  echo isset($home_address)?$home_address:''; ?>">
                        </div>
                    </div> 
                    <div class="col-md-12 profile_info_panel">
                     <label for="marital_status" class="col-md-6 ">Marital Status </label>
                        <div class="col-md-6">
                            <?php echo isset($marital_status)?ucfirst($marital_status):''; ?>
                            <input type="hidden" name="marital_status" value="<?php  echo isset($marital_status)?$marital_status:''; ?>">
                        </div>
                    </div> 
                <div class="col-md-12 profile_info_panel">
                 <label for="gender" class="col-md-6 ">Gender </label>
                 <div class="col-md-6">
                    <?php echo isset($gender)?ucfirst($gender):''; ?>
                    <input type="hidden" name="gender" value="<?php  echo isset($gender)?$gender:''; ?>">
                </div>
                </div> 
                <div class="col-md-12 profile_info_panel">
                 <label for="date_of_birth" class="col-md-6 ">Date Of Birth </label>
                 <div class="col-md-6">
                    <?php echo isset($date_of_birth)?$date_of_birth:''; ?>
                    <input type="hidden" name="date_of_birth" value="<?php  echo isset($date_of_birth)?$date_of_birth:''; ?>">
                </div>
                </div> 

                <!--   </form>  -->
            </div>
            <div class="col-md-6">
                <!-- <form name="myForm" id="myform" action="" method="POST" class="form-horizontal" role="form">   -->
                <h2>Office Information</h2>
                    <hr>
                    <div class="col-md-12 profile_info_panel">
                     <label for="role_type" class="col-md-6 ">Role Type </label>
                     <div class="col-md-6">
                        <?php echo isset($role_type)?ucfirst($role_type):''; ?>
                        <input type="hidden" name="role_type" value="<?php  echo isset($role_type)?$role_type:''; ?>">
                    </div>
                </div> 
                <div class="col-md-12 profile_info_panel">
                 <label for="employee_role" class="col-md-6 ">Employee Role </label>
                        <div class="col-md-6">
                            <?php echo isset($employee_role)?ucfirst($employee_role):''; ?>
                            <input type="hidden" name="employee_role" value="<?php  echo isset($employee_role)?$employee_role:''; ?>">
                        </div>
                </div> 
                <div class="col-md-12 profile_info_panel">
                 <label for="project_team" class="col-md-6 ">project Team </label>
                 <div class="col-md-6">
                    <?php echo isset($project_team)?ucfirst($project_team):''; ?>
                    <input type="hidden" name="project_team" value="<?php  echo isset($project_team)?$project_team:''; ?>">
                        </div>
                    </div> 
                    <div class="col-md-12 profile_info_panel">
                     <label for="education" class="col-md-6 ">Education </label>
                     <div class="col-md-6">
                        <?php echo isset($education)?ucfirst($education):''; ?>
                        <input type="hidden" name="education" value="<?php  echo isset($education)?$education:''; ?>">
                    </div>
                </div> 
                <div class="col-md-12 profile_info_panel">
                 <label for="state" class="col-md-6 ">State </label>
                 <div class="col-md-6">
                    <?php echo isset($state)?$state:''; ?>
                    <input type="hidden" name="state" value="<?php  echo isset($state)?$state:''; ?>">
                </div>
            </div> 
            <div class="col-md-12 profile_info_panel">
             <label for="city" class="col-md-6 ">City </label>
             <div class="col-md-6">
                            <?php echo isset($city)?ucfirst($city):''; ?>
                            <input type="hidden" name="city" value="<?php  echo isset($city)?$city:''; ?>">
                        </div>
                    </div> 
                    <div class="col-md-12 profile_info_panel">
                     <label for="nationality" class="col-md-6 ">Nationality </label>
                        <div class="col-md-6">
                            <?php echo isset($nationality)?ucfirst($nationality):''; ?>
                            <input type="hidden" name="nationality" value="<?php  echo isset($nationality)?$nationality:''; ?>">
                        </div>
                    </div> 
                    <div class="col-md-12 profile_info_panel">
                   <label for="joining_date" class="col-md-6 ">joining Date </label>
                   <div class="col-md-6">
                    <?php echo isset($joining_date)?$joining_date:''; ?>
                    <input type="hidden" name="joining_date" value="<?php  echo isset($joining_date)?$joining_date:''; ?>">
                </div>
            </div> 
            <div class="col-md-12 profile_info_panel">
                   <label for="bond" class="col-md-6 ">Bond Type </label>
                   <div class="col-md-6">
                    <?php echo isset($bond)?ucfirst($bond):''; ?>
                    <input type="hidden" name="bond" value="<?php  echo isset($bond)?$bond:''; ?>">
                </div>
            </div> 
            <div class="col-md-12 profile_info_panel">
             <label for="bond_duration_from" class="col-md-6 ">Bond Duration From</label>
                        <div class="col-md-6">
                            <?php echo isset($bond_duration_from)?$bond_duration_from:''; ?>
                            <input type="hidden" name="bond_duration_from" value="<?php  echo isset($bond_duration_from)?$bond_duration_from:''; ?>">
                        </div>
                    </div>
                 <div class="col-md-12 profile_info_panel">
                     <label for="bond_duration_to" class="col-md-6 ">Bond Duration To</label>
                     <div class="col-md-6">
                        <?php echo isset($bond_duration_to)?$bond_duration_to:''; ?>
                        <input type="hidden" name="bond_duration_to" value="<?php  echo isset($bond_duration_to)?$bond_duration_to:''; ?>">
                        </div>
                    </div> 
                    <div class="col-md-12 ">
                        <a href="employee_edit.php?id=<?php echo $row['id'];?>" class="btn btn-primary">Edit</a>
                    </div>
                    <!-- </form>  -->
                </div>
        </div><!-- End row-->
    </div><!-- end container -->
    </div><!-- end .page-contentbar -->
    <?php include("includes/footer.php");?>
