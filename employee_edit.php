<?php  
session_start();
include("includes/dbConnection.php");
  if(!isset($_SESSION['id']) || $_SESSION['id']=="")
  {
        header("location: login.php"); 
  }
include("includes/header.php");
include("includes/sidebar.php");


 $id = isset($_GET['id']) ? $_GET['id'] :'' ;
    if (!empty($id)){

  $query = "SELECT * FROM user_employee WHERE id ='".$_GET['id']."'";
  /*$result = mysql_query ($sql) or die (mysql_error ());*/
  $result = $conn->query($query);
  $rows = mysqli_fetch_array($result);

    
    $first_name         = $rows['first_name'];  
    $last_name          = $rows['last_name'];
    $email              = $rows['email'];
    $personal_number    = $rows['personal_number'];
    $emergency_number   = $rows['emergency_number'];
    $residental_address = $rows['residental_address'];
    $home_address       = $rows['home_address'];
    $date_of_birth      = $rows['date_of_birth'];
    $joining_date       = $rows['joining_date'];
    $bond_duration_from = $rows['bond_duration_from'];
    $bond_duration_to   = $rows['bond_duration_to'];



    if(isset($rows['gender']) && $rows['gender']!=""){
        $gender = $rows['gender'];
        $male = "";
        $female = "";

        if( $gender == "male") {
            $male = " checked ";
        } elseif( $gender == "female" ){
            $female = " checked ";
        }
        //print_r($male);
    }

    if(isset($rows['marital_status']) && $rows['marital_status']!=""){
        $marital_status = $rows['marital_status'];
        $married = "";
        $unmarried = "";

        if( $marital_status == "married") {
            $married = " selected ";
        } elseif( $marital_status == "unmarried" ){
            $unmarried = " selected ";
        }
    }

    if(isset($rows['role_type']) && $rows['role_type']!=""){
        $role_type = $rows['role_type'];
        $trainee = "";
        $developer = "";
        $senior_developer = "";
        $manager = "";
        $hr = "";
        if( $role_type == "trainee") {
            $trainee = " selected ";
        } elseif( $role_type == "developer" ){
            $developer = " selected ";
        } elseif( $role_type == "senior_developer" ){
            $senior_developer = " selected ";
        } elseif( $role_type == "manager" ){
            $manager = " selected ";
        } elseif( $role_type == "hr" ){
            $hr = " selected ";
        }
    }

    if(isset($rows['employee_role']) && $rows['employee_role']!=""){
        $employee_role = $rows['employee_role'];
        $trainee = "";
        $developer_ios = "";
        $developer_php = "";
        $developer_java = "";
        $developer_android = "";
        $senior_developer_ios = "";
        $senior_developer_php = "";
        $senior_developer_java = "";
        $senior_developer_android = "";
        $manager = "";
        $hr = "";

        if( $employee_role == "trainee") {
            $trainee = " selected ";
        } elseif( $employee_role == "developer ios" ){
            $developer_ios = " selected ";
        } elseif( $employee_role == "developer php" ){
            $developer_php = " selected ";
        } elseif( $employee_role == "developer java" ){
            $developer_java = " selected ";
        } elseif( $employee_role == "developer android" ){
            $developer_android = " selected ";
        } elseif( $employee_role == "senior developer ios" ){
            $senior_developer_ios = " selected ";
        } elseif( $employee_role == "senior developer php" ){
            $senior_developer_php = " selected ";
        } elseif( $employee_role == "senior developer java" ){
            $senior_developer_java = " selected ";
        } elseif( $employee_role == "senior developer android" ){
            $senior_developer_android = " selected ";
        } elseif( $employee_role == "manager" ){
            $manager = " selected ";
        } elseif( $employee_role == "hr" ){
            $hr = " selected ";
        }
    }

    if(isset($rows['project_team']) && $rows['project_team']!=""){
        $project_team = $rows['project_team'];
        $team_ios = "";
        $team_php = "";
        $team_java = "";
        $team_android = "";

        if( $project_team == "team ios") {
            $team_ios = " selected ";
        } elseif( $project_team == "team php" ){
            $team_php = " selected ";
        } elseif( $project_team == "team java" ){
            $team_java = " selected ";
        } elseif( $project_team == "team android" ){
            $team_android = " selected ";
        } 
    }

    if(isset($rows['education']) && $rows['education']!=""){
        $education = $rows['education'];
        $bca = "";
        $be_cs = "";
        $be_ec = "";
        $bsc_cs = "";
        $b_tech = "";
        $m_tech = "";
        $mca = "";
        $me_cs = "";
        $me_ec = "";

        if( $education == "BCA") {
            $bca = " selected ";
        } elseif( $education == "BE(CS)" ){
            $be_cs = " selected ";
        } elseif( $education == "BE(EC)" ){
            $be_ec = " selected ";
        } elseif( $education == "Bsc(CS)" ){
            $bsc_cs = " selected ";
        } elseif( $education == "B.Tech" ){
            $b_tech = " selected ";
        } elseif( $education == "M.Tech" ){
            $m_tech = " selected ";
        } elseif( $education == "MCA" ){
            $mca = " selected ";
        } elseif( $education == "ME(CS)" ){
            $me_cs = " selected ";
        } elseif( $education == "ME(EC)" ){
            $me_ec = " selected ";
        }

    }

    if(isset($rows['state']) && $rows['state']!=""){
        $state = $rows['state'];
        $madhya_pradesh = "";
        $andhra_pradesh = "";
        $maharashtra = "";
        $delhi = "";
        $uttar_pradesh = "";
        $himachal_pradesh = "";
        $haryana = "";
        $gujrat = "";

        if( $state == "madhya pradesh") {
            $madhya_pradesh = " selected ";
        } elseif( $state == "andhra pradesh" ){
            $andhra_pradesh = " selected ";
        } elseif( $state == "maharashtra" ){
            $maharashtra = " selected ";
        } elseif( $state == "delhi" ){
            $delhi = " selected ";
        } elseif( $state == "uttar pradesh" ){
            $uttar_pradesh = " selected ";
        } elseif( $state == "himachal pradesh" ){
            $himachal_pradesh = " selected ";
        } elseif( $state == "haryana" ){
            $haryana = " selected ";
        } elseif( $state == "gujrat" ){
            $gujrat = " selected ";
        }

    } 

    if(isset($rows['city']) && $rows['city']!=""){
        $city = $rows['city'];
        $indore = "";
        $bhopal = "";
        $mumbai = "";
        $pune = "";
        $bangalore = "";
        $hyderabad = "";
        $ahmedabad = "";
        $vadodara = "";
        $chennai = "";

        if( $city == "indore") {
            $indore = " selected ";
        } elseif( $city == "bhopal" ){
            $bhopal = " selected ";
        } elseif( $city == "mumbai" ){
            $mumbai = " selected ";
        } elseif( $city == "pune" ){
            $pune = " selected ";
        } elseif( $city == "bangalore" ){
            $bangalore = " selected ";
        } elseif( $city == "hyderabad" ){
            $hyderabad = " selected ";
        } elseif( $city == "ahmedabad" ){
            $ahmedabad = " selected ";
        } elseif( $city == "vadodara" ){
            $vadodara = " selected ";
        } elseif( $city == "chennai" ){
            $chennai = " selected ";
        }

    }

    if(isset($rows['nationality']) && $rows['nationality']!=""){
        $nationality = $rows['nationality'];
        $indian = "";
        $japanese = "";
        $sri_lankan = "";
        $russian = "";

        if( $nationality == "indian") {
            $indian = " selected ";
        } elseif( $nationality == "japanese" ){
            $japanese = " selected ";
        } elseif( $nationality == "sri_lankan" ){
            $sri_lankan = " selected ";
        } elseif( $nationality == "russian" ){
            $russian = " selected ";
        } 

    }

    if(isset($rows['bond']) && $rows['bond']!=""){
        $bond = $rows['bond'];
        $fresher = "";
        $one = "";
        $two = "";
        $three = "";

        if( $bond == "fresher") {
            $fresher = " selected ";
        } elseif( $bond == "1" ){
            $one = " selected ";
        } elseif( $bond == "2" ){
            $two = " selected ";
        } elseif( $bond == "3" ){
            $three = " selected ";
        } 

    } else {
         header("location: login.php");
    }
}

 ?>
        <!-- START PAGE CONTENT -->
        <div id="page-right-content">
            <div class="container">                                               
                <div class="row">
                    <div class="col-lg-12">
                        <h4 class="header-title m-t-0">Personal Information</h4>
                        <!-- Pesronal Information Start -->
                        <div class="p-20 m-b-20">
                            <form action="action.php" class="form-validation" method="POST">
                                <!-- <div class="form-group col-lg-4">
                                    <label for="firstName">Profile Picture<span class="text-danger">*</span></label>
                                        <div class="main-img-preview"> <img class="thumbnail img-preview" width="150" src="assets/images/profile.jpg" title="Preview Logo"></div>
                                    </div>
                                </div>
                                <div class=" form-group col-lg-4">
                                    <div class="fileUpload btn btn-info fake-shadow"> <span><i class="glyphicon glyphicon-upload"></i> Upload Image</span>
                                        <input id="logo-id" name="logo" type="file" class="attachment_upload">
                                    </div>
                                </div>     
                                <div class="form-group col-lg-2">
                                    <label for="employee_id">Employee ID<span class="text-danger">*</span></label>
                                    <input type="text" name="employee_id" parsley-trigger="change" required
                                           placeholder="Employee id" class="form-control" id="employee_id">
                                </div>
                                <div class="form-group col-lg-2"></div> -->
                                <input type="hidden" name="id" value="<?php echo isset($id)?$id:''; ?>" />  
                                <div class="form-group col-lg-6">
                                    <label for="first_name">First Name<span class="text-danger">*</span></label>
                                    <input type="text" name="first_name" parsley-trigger="change" required
                                           placeholder="Enter user first name" class="form-control" id="first_name" value="<?php  echo isset($first_name)?$first_name:''; ?>">
                                </div>
                                 <div class="form-group col-lg-6">
                                    <label for="last_ame">Last Name<span class="text-danger">*</span></label>
                                    <input type="text" name="last_name" parsley-trigger="change" required
                                           placeholder="Enter user last name" class="form-control" id="last_ame" value="<?php  echo isset($last_name)?$last_name:''; ?>">
                                </div>
                                <div class="form-group col-lg-6">
                                    <label for="email">Email address<span class="text-danger">*</span></label>
                                    <input type="email" name="email" parsley-trigger="change" required
                                           placeholder="Enter email" class="form-control" id="email" value="<?php  echo isset($email)?$email:''; ?>">
                                           <span class="error"><?php if(isset($_GET["msg"])) { echo $_GET["msg"]; } ?></span>
                                </div>                               
                                <div class="form-group col-lg-6">
                                    <label for="personal_number">Personal Number<span class="text-danger">*</span></label>
                                    <input id="personal_number" type="number" placeholder="Number" name="personal_number" required
                                           class="form-control" value="<?php  echo isset($personal_number)?$personal_number:''; ?>">
                                           <span class="error"><?php if(isset($_GET["msg_personal_num"])) { echo $_GET["msg_personal_num"]; } ?></span>
                                </div>
                                <div class="form-group col-lg-6">
                                    <label for="emergency_number">Emergency number<span class="text-danger">*</span></label>
                                    <input id="emergency_number" type="number" placeholder="Emergency number" name="emergency_number" 
                                           required class="form-control" value="<?php  echo isset($emergency_number)?$emergency_number:''; ?>" >
                                </div>
                                <div class="form-group col-lg-6">
                                    <label for="residental_address">Address Street 1<span class="text-danger">*</span></label>
                                    <input type="text" name="residental_address" parsley-trigger="change" required
                                           placeholder="Enter user current address" class="form-control" id="residental_address" value="<?php  echo isset($residental_address)?$residental_address:''; ?>" >
                                </div>
                                <div class="form-group col-lg-6">
                                    <label for="home_address">Address Street 2<span class="text-danger">*</span></label>
                                    <input type="text" name="home_address" parsley-trigger="change" required
                                           placeholder="Enter user parmanent address" class="form-control" id="home_address" value="<?php  echo isset($home_address)?$home_address:''; ?>" >
                                </div> 
                                <div class="form-group col-lg-6">
                                    <label for="marital_status">Marital Status<span class="text-danger">*</span></label>
                                    <div>
                                        <select id="marital_status" name="marital_status" class="form-control" required> 
                                            <option value="">Select Marital Status</option>
                                            <option value="married" <?php  echo isset($married)?$married:''; ?>>Married</option>
                                            <option value="unmarried" <?php  echo isset($unmarried)?$unmarried:''; ?>>Unmarried</option>        
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group col-lg-6">
                                    <label class="text-muted font-13 m-b-15 m-t-20"> Gender <span class="text-danger">*</span>
                                        <div class="radio radio-info">
                                            <input type="radio" id="gender" name="gender" <?php  echo isset($male)?$male:''; ?> value="male" >
                                            <label for="inlineRadio1"> Male </label>
                                        </div>
                                        <div class="radio radio-custom radio-inline">
                                            <input type="radio" id="gender" name="gender" <?php  echo isset($female)?$female:''; ?> value="female" >
                                            <label for="inlineRadio2"> Female </label>
                                        </div>
                                    </label>    
                                </div> 
                                <div class="form-group col-lg-6">                                        
                                    <label for="date_of_birth">Date Of Birth<span class="text-danger">*</span></label>
                                    <div>   
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="yyyy/mm/dd" id="datepicker-autoclose" name="date_of_birth" id="date_of_birth" value="<?php  echo isset($date_of_birth)?$date_of_birth:''; ?>">
                                            <span class="input-group-addon bg-custom b-0"><i class="mdi mdi-calendar text-white"></i></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group col-lg-6"></div> 
                                <div class="form-group col-lg-6"></div> 
                                <div class="form-group col-lg-6"></div>
                                <div class="form-group col-lg-6"></div>
                                <div class="form-group col-lg-6"></div>
                                <div class="form-group col-lg-6"></div>
                                <!-- Personal information end -->



                                <h4 class="header-title m-t-0">Office Information</h4>
                                <!-- Office information start -->
                                <div class="form-group col-lg-6"></div>
                                <div class="form-group col-lg-6"></div>

                                <div class="form-group col-lg-6">
                                    <label for="role_type">Role Type<span class="text-danger">*</span></label>
                                    <div>
                                        <select id="role_type" name="role_type" class="form-control" required> 
                                            <option value="">Select Role</option>
                                            <option value="trainee" <?php  echo isset($trainee)?$trainee:''; ?> >Trainee</option>
                                            <option value="developer" <?php  echo isset($developer)?$developer:''; ?> >Developer</option>        
                                            <option value="senior developer" <?php  echo isset($senior_developer)?$senior_developer:''; ?> >Senior Developer</option>
                                            <option value="manager" <?php  echo isset($manager)?$manager:''; ?> >Manager</option>
                                            <option value="hr" <?php  echo isset($hr)?$hr:''; ?> >HR</option>        
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group col-lg-6">
                                    <label for="employee_role">Employee Role<span class="text-danger">*</span></label>
                                    <div>
                                        <select id="employee_role" name="employee_role" class="form-control" required> 
                                            <option value="">Select Role</option>
                                            <option value="trainee" <?php  echo isset($trainee)?$trainee:''; ?> >Trainee</option>

                                            <option value="developer ios" <?php  echo isset($developer_ios)?$developer_ios:''; ?> >Developer IOS</option>        
                                            <option value="developer php" <?php  echo isset($developer_php)?$developer_php:''; ?> >Developer PHP</option>        
                                            <option value="developer java" <?php  echo isset($developer_java)?$developer_java:''; ?> >Developer JAVA</option>        
                                            <option value="developer android" <?php  echo isset($developer_android)?$developer_android:''; ?> >Developer Android</option>
                                            
                                            <option value="senior developer ios" <?php  echo isset($senior_developer_ios)?$senior_developer_ios:''; ?> >Senior Developer IOS</option>      
                                            <option value="senior developer php" <?php  echo isset($senior_developer_php)?$senior_developer_php:''; ?> >Senior Developer PHP</option>      
                                            <option value="senior developer java" <?php  echo isset($senior_developer_java)?$senior_developer_java:''; ?> >Senior Developer JAVA</option>
                                            <option value="senior developer android" <?php  echo isset($senior_developer_android)?$senior_developer_android:''; ?> >Senior Developer Android</option> 
                                            
                                            <option value="manager" <?php  echo isset($manager)?$manager:''; ?> >Manager</option>
                                            <option value="hr" <?php  echo isset($hr)?$hr:''; ?> >HR</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group col-lg-6">
                                    <label for="project_team">Project Team<span class="text-danger">*</span></label>
                                    <div>
                                        <select id="project_team" name="project_team" class="form-control" required> 
                                            <option value="">Select Project Team</option>
                                            <option value="team ios" <?php  echo isset($team_ios)?$team_ios:''; ?> >Team IOS</option>
                                            <option value="team php" <?php  echo isset($team_php)?$team_php:''; ?> >Team PHP</option>        
                                            <option value="team android" <?php  echo isset($team_android)?$team_android:''; ?> >Team Android</option>
                                            <option value="team java" <?php  echo isset($team_java)?$team_java:''; ?> >Team JAVA</option>
                                            
                                        </select>
                                    </div>
                                </div> 
                                <div class="form-group col-lg-6">
                                    <label for="education">Education<span class="text-danger">*</span></label>
                                    <div>
                                        <select id="education" name="education" class="form-control" required> 
                                            <option value="">Select Project Team</option>
                                            <option value="BCA" <?php  echo isset($bca)?$bca:''; ?> >BCA</option>
                                            <option value="BE(CS)" <?php  echo isset($be_cs)?$be_cs:''; ?> >BE(CS)</option>        
                                            <option value="BE(EC)" <?php  echo isset($be_ec)?$be_ec:''; ?> >BE(EC)</option>
                                            <option value="Bsc(CS)" <?php  echo isset($bsc_cs)?$bsc_cs:''; ?> >Bsc(cs)</option>
                                            <option value="B.Tech" <?php  echo isset($b_tech)?$b_tech:''; ?> >B.Tech</option>
                                            <option value="m.tech" <?php  echo isset($m_tech)?$m_tech:''; ?> >M.tech</option>
                                            <option value="MCA" <?php  echo isset($mca)?$mca:''; ?> >MCA</option>
                                            <option value="ME(CS)" <?php  echo isset($me_cs)?$me_cs:''; ?> >ME(CS)</option>
                                            <option value="ME(EC)" <?php  echo isset($me_ec)?$me_ec:''; ?> >ME(EC)</option>
                                        </select>
                                    </div>
                                </div> 
                                <div class="form-group col-lg-6">
                                    <label for="state">State<span class="text-danger">*</span></label>
                                    <div>
                                        <select id="state" name="state" class="form-control" required> 
                                            <option value="">Select State</option>
                                            <option value="madhya pradesh" <?php  echo isset($madhya_pradesh)?$madhya_pradesh:''; ?> >Madhya Pradesh</option>
                                            <option value="andhra pradesh" <?php  echo isset($andhra_pradesh)?$andhra_pradesh:''; ?> >Andhra Pradesh</option>        
                                            <option value="maharashtra" <?php  echo isset($maharashtra)?$maharashtra:''; ?> >Maharashtra</option>
                                            <option value="delhi" <?php  echo isset($delhi)?$delhi:''; ?> >Delhi</option>
                                            <option value="uttar pradesh" <?php  echo isset($uttar_pradesh)?$uttar_pradesh:''; ?> >Uttar Pradesh</option>
                                            <option value="himachal pradesh" <?php  echo isset($himachal_pradesh)?$himachal_pradesh:''; ?> >himachal Pradesh</option>        
                                            <option value="haryana" <?php  echo isset($haryana)?$haryana:''; ?> >Haryana</option>
                                            <option value="gujrat" <?php  echo isset($gujrat)?$gujrat:''; ?> >Gujrat</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group col-lg-6">
                                    <label for="city">City<span class="text-danger">*</span></label>
                                    <div>
                                        <select id="city" name="city" class="form-control" required> 
                                            <option value="">Select City</option>
                                            <option value="indore" <?php  echo isset($indore)?$indore:''; ?> >Indore</option>
                                            <option value="bhopal" <?php  echo isset($bhopal)?$bhopal:''; ?> >Bhopal</option>        
                                            <option value="mumbai" <?php  echo isset($mumbai)?$mumbai:''; ?> >Mumbai</option>
                                            <option value="pune" <?php  echo isset($pune)?$pune:''; ?> >Pune</option>
                                            <option value="bangalore" <?php  echo isset($bangalore)?$bangalore:''; ?> >Bangalore</option>
                                            <option value="hyderabad" <?php  echo isset($hyderabad)?$hyderabad:''; ?> >Hyderabad</option>
                                            <option value="ahmedabad" <?php  echo isset($ahmedabad)?$ahmedabad:''; ?> >Ahmedabad</option>
                                            <option value="vadodara" <?php  echo isset($vadodara)?$vadodara:''; ?> >Vadodara</option>
                                            <option value="chennai" <?php  echo isset($chennai)?$chennai:''; ?> >Chennai</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group col-lg-6">
                                    <label for="nationality">Nationality<span class="text-danger">*</span></label>
                                    <div>
                                        <select id="nationality" name="nationality" class="form-control" required> 
                                            <option value="">Select Nationality</option>
                                            <option value="indian" <?php  echo isset($indian)?$indian:''; ?> >Indian</option>
                                            <option value="japanese" <?php  echo isset($japanese)?$japanese:''; ?> >Japanese</option>        
                                            <option value="sri_lankan" <?php  echo isset($sri_lankan)?$sri_lankan:''; ?> >Sri Lankan</option>
                                            <option value="russian" <?php  echo isset($russian)?$russian:''; ?> >Russian</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group col-lg-6">
                                    <label for="joining_date">Joining Date<span class="text-danger">*</span></label>
                                    <div>
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="yyyy/mm/dd" id="datepicker" name="joining_date" id="joining_date" value="<?php  echo isset($joining_date)?$joining_date:''; ?>">
                                            <span class="input-group-addon bg-custom b-0"><i class="mdi mdi-calendar text-white"></i></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group col-lg-6">
                                    <label for="bond">Bond<span class="text-danger">*</span></label>
                                    <div>
                                        <select id="bond" name="bond" class="form-control" required> 
                                            <option value="">Bond Type</option>
                                            <option value="fresher" <?php  echo isset($fresher)?$fresher:''; ?> >Fresher</option>
                                            <option value="1" <?php  echo isset($one)?$one:''; ?> >1 year</option>        
                                            <option value="2" <?php  echo isset($two)?$two:''; ?> >2 year</option>
                                            <option value="3" <?php  echo isset($three)?$three:''; ?> >3 year</option>
                                            
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group col-lg-6">
                                    <label for="bond_duration">Bond Duration<span class="text-danger">*</span></label>
                                    <div>
                                        <div class="input-daterange input-group" id="date-range">
                                            <input type="text" class="form-control" name="bond_duration_from" id="bond_duration_from" value="<?php  echo isset($bond_duration_from)?$bond_duration_from:''; ?>"/>
                                            <span class="input-group-addon b-0">to</span>
                                            <input type="text" class="form-control" name="bond_duration_to" id="bond_duration_to"  value="<?php  echo isset($bond_duration_to)?$bond_duration_to:''; ?>"/>
                                        </div>
                                    </div>
                                </div> 
                                <!-- Office information end  -->                 
                                <div class="form-group text-right m-b-0">
                                    <button class="btn btn-primary waves-effect waves-light" type="submit" name="update" id="submit">
                                        Update
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div><!-- Col-md-6 end-->
                </div><!-- End row-->
            </div><!-- end container -->
        </div><!-- End #page-right-content -->
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