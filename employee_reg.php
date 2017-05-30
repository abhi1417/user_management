<?php 
session_start();
include("includes/dbConnection.php");
if(!isset($_SESSION['id']) || $_SESSION['id']=="")
  {
        header("location: login.php");
  }
include("includes/header.php");
include("includes/sidebar.php");

      /*  $query = "SELECT employee_id FROM user_employee";
        $result = $conn->query($query);
        $row = mysqli_fetch_array($result);
        
        $employee_id = $row['employee_id'];*/
       
     
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <style type="text/css">

            .error{
              color : red;
            }

        </style>

    </head>
    <body>
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
                                </div>-->
                                <div class="form-group col-lg-6"></div>     
                                <div class="form-group col-lg-4"></div> 
                                <div class="form-group col-lg-2">
                                    <label class="control-label" for="example-input1-group1">Employee Id</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">FxB</span>
                                        <input type="text" id="employee_id" name="employee_id" class="form-control" placeholder="Id">
                                        <span class="error"><?php if(isset($_GET["msg_employee_id"])) { echo $_GET["msg_employee_id"]; } ?></span>
                                    </div>
                                </div> 
                                <div class="form-group col-lg-6">
                                    <label for="first_name">First Name<span class="text-danger">*</span></label>
                                    <input type="text" name="first_name" parsley-trigger="change" required
                                           placeholder="Enter user first name" class="form-control" id="first_name">
                                </div>
                                 <div class="form-group col-lg-6">
                                    <label for="last_ame">Last Name<span class="text-danger">*</span></label>
                                    <input type="text" name="last_name" parsley-trigger="change" required
                                           placeholder="Enter user last name" class="form-control" id="last_ame">
                                </div>
                                <div class="form-group col-lg-6">
                                    <label for="email">Email address<span class="text-danger">*</span></label>
                                    <input type="email" name="email" parsley-trigger="change" required
                                           placeholder="Enter email" class="form-control" id="email">
                                           <span class="error"><?php if(isset($_GET["msg_email"])) { echo $_GET["msg_email"]; } ?></span>
                                </div>
                                <div class="form-group col-lg-6">
                                    <label for="password">Password<span class="text-danger">*</span></label>
                                    <input id="password" type="password" placeholder="Password" name="password" required
                                           class="form-control">
                                </div>                                 
                                <div class="form-group col-lg-6">
                                    <label for="personal_number">Personal Number<span class="text-danger">*</span></label>
                                    <input id="personal_number" type="number" placeholder="Number" name="personal_number" required
                                           class="form-control">
                                           <span class="error"><?php if(isset($_GET["msg_personal_num"])) { echo $_GET["msg_personal_num"]; } ?></span>
                                </div>
                                <div class="form-group col-lg-6">
                                    <label for="emergency_number">Emergency number<span class="text-danger">*</span></label>
                                    <input id="emergency_number" type="number" placeholder="Emergency number" name="emergency_number" 
                                           required class="form-control">
                                </div>
                                <div class="form-group col-lg-6">
                                    <label for="residental_address">Address Street 1<span class="text-danger">*</span></label>
                                    <input type="text" name="residental_address" parsley-trigger="change" required
                                           placeholder="Enter user current address" class="form-control" id="residental_address">
                                </div>
                                <div class="form-group col-lg-6">
                                    <label for="home_address">Address Street 2<span class="text-danger">*</span></label>
                                    <input type="text" name="home_address" parsley-trigger="change" required
                                           placeholder="Enter user parmanent address" class="form-control" id="home_address">
                                </div> 
                                <div class="form-group col-lg-6">
                                    <label for="marital_status">Marital Status<span class="text-danger">*</span></label>
                                    <div>
                                        <select id="marital_status" name="marital_status" class="form-control" required> 
                                            <option value="">Select Marital Status</option>
                                            <option value="married">Married</option>
                                            <option value="unmarried">Unmarried</option>        
                                        </select>
                                    </div>
                                </div>
                                 <div class="form-group col-lg-6">
                                    <label class="text-muted font-13 m-b-15 m-t-20"> Gender <span class="text-danger">*</span>
                                        <div class="radio radio-info">
                                            <input type="radio" id="inlineRadio1" value="male" name="gender" checked>
                                            <label for="inlineRadio1"> Male </label>
                                        </div>
                                        <div class="radio radio-custom radio-inline">
                                            <input type="radio" id="inlineRadio2" value="female" name="gender" checked>
                                            <label for="inlineRadio2"> Female </label>
                                        </div>
                                    </label>    
                                </div> 
                                <div class="form-group col-lg-6">                                        
                                    <label for="date_of_birth">Date Of Birth<span class="text-danger">*</span></label>
                                    <div>   
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="yyyy/mm/dd" id="datepicker-autoclose" name="date_of_birth" id="date_of_birth">
                                            <span class="input-group-addon bg-custom b-0"><i class="mdi mdi-calendar text-white"></i></span>
                                        </div>
                                    </div>
                                </div>

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
                                            <option value="trainee">Trainee</option>
                                            <option value="developer">Developer</option>        
                                            <option value="senior developer">Senior Developer</option>
                                            <option value="nabager">Manager</option>
                                            <option value="hr">HR</option>        
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group col-lg-6">
                                    <label for="employee_role">Employee Role<span class="text-danger">*</span></label>
                                    <div>
                                        <select id="employee_role" name="employee_role" class="form-control" required> 
                                            <option value="">Select Role</option>
                                            <option value="trainee">Trainee</option>
                                            
                                            <option value="developer ios">Developer IOS</option>        
                                            <option value="developer php">Developer PHP</option>        
                                            <option value="developer java">Developer JAVA</option>        
                                            <option value="developer android">Developer Android</option>

                                            <option value="senior developer ios">Senior Developer IOS</option>        
                                            <option value="senior developer php">Senior Developer PHP</option>        
                                            <option value="senior developer java">Senior Developer JAVA</option>        
                                            <option value="senior developer android">Senior Developer Android</option> 
                                            
                                            <option value="manager">Manager</option>
                                            <option value="hr">HR</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group col-lg-6">
                                    <label for="project_team">Project Team<span class="text-danger">*</span></label>
                                    <div>
                                        <select id="project_team" name="project_team" class="form-control" required> 
                                            <option value="">Select Project Team</option>
                                            <option value="team ios">Team IOS</option>
                                            <option value="team php">Team PHP</option>        
                                            <option value="team android">Team Android</option>
                                            <option value="team java">Team JAVA</option>
                                        </select>
                                    </div>
                                </div> 
                                <div class="form-group col-lg-6">
                                    <label for="education">Education<span class="text-danger">*</span></label>
                                    <div>
                                        <select id="education" name="education" class="form-control" required> 
                                            <option value="">Select Project Team</option>
                                            <option value="BCA" >BCA</option>
                                            <option value="BE(CS)" >BE(CS)</option>        
                                            <option value="BE(EC)" >BE(EC)</option>
                                            <option value="BSC(CS)" >Bsc(cs)</option>
                                            <option value="B.Tech" >B.Tech</option>
                                            <option value="M.Tech" >M.tech</option>
                                            <option value="MCA" >MCA</option>
                                            <option value="ME(CS)" >ME(CS)</option>
                                            <option value="ME(EC)" >ME(EC)</option>
                                        </select>
                                    </div>
                                </div> 
                                <div class="form-group col-lg-6">
                                    <label for="state">State<span class="text-danger">*</span></label>
                                    <div>
                                        <select id="state" name="state" class="form-control" required> 
                                            <option value="">Select State</option>
                                            <option value="madhya pradesh">Madhya Pradesh</option>
                                            <option value="andhra pradesh">Andhra Pradesh</option>        
                                            <option value="maharashtra">Maharashtra</option>
                                            <option value="delhi">Delhi</option>
                                            <option value="uttar pradesh">Uttar Pradesh</option>
                                            <option value="himachal pradesh">himachal Pradesh</option>        
                                            <option value="haryana">Haryana</option>
                                            <option value="gujrat">Gujrat</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group col-lg-6">
                                    <label for="city">City<span class="text-danger">*</span></label>
                                    <div>
                                        <select id="city" name="city" class="form-control" required> 
                                            <option value="">Select City</option>
                                            <option value="indore">Indore</option>
                                            <option value="bhopal">Bhopal</option>        
                                            <option value="mumbai">Mumbai</option>
                                            <option value="pune">Pune</option>
                                            <option value="bangalore">Bangalore</option>
                                            <option value="hyderabad">Hyderabad</option>
                                            <option value="ahmedabad">Ahmedabad</option>
                                            <option value="vadodara">Vadodara</option>
                                            <option value="chennai">Chennai</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group col-lg-6">
                                    <label for="nationality">Nationality<span class="text-danger">*</span></label>
                                    <div>
                                        <select id="nationality" name="nationality" class="form-control" required> 
                                            <option value="">Select Nationality</option>
                                            <option value="indian">Indian</option>
                                            <option value="japanese">Japanese</option>        
                                            <option value="sri_lankan">Sri Lankan</option>
                                            <option value="russian">Russian</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="joining_date">Joining Date<span class="text-danger">*</span></label>
                                    <div>
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="yyyy/mm/dd" id="datepicker" name="joining_date" id="joining_date">
                                            <span class="input-group-addon bg-custom b-0"><i class="mdi mdi-calendar text-white"></i></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group col-lg-6">
                                    <label for="bond">Bond<span class="text-danger">*</span></label>
                                    <div>
                                        <select id="bond" name="bond" class="form-control" required> 
                                            <option value="">Bond Type</option>
                                            <option value="fresher">Fresher</option>
                                            <option value="1">1 year</option>        
                                            <option value="2">2 year</option>
                                            <option value="3">3 year</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group col-lg-6">
                                    <label for="bond_duration">Bond Duration<span class="text-danger">*</span></label>
                                    <div>
                                        <div class="input-daterange input-group" id="date-range">
                                            <input type="text" class="form-control" name="bond_duration_from" id="bond_duration_from" />
                                            <span class="input-group-addon b-0">to</span>
                                            <input type="text" class="form-control" name="bond_duration_to" id="bond_duration_to" />
                                        </div>
                                    </div>
                                </div> 
                                <!-- Office information end  -->                  
                                <div class="form-group col-lg-6">
                                    <div class="checkbox">
                                        <input id="remember-1" type="checkbox">
                                        <label for="remember-1"> Remember me </label>
                                    </div>
                                </div>

                                <div class="form-group text-right m-b-0">
                                    <button class="btn btn-primary waves-effect waves-light" type="submit" name="registrationBtn" id="submit">
                                        Submit
                                    </button>
                                    <button type="reset" class="btn btn-default waves-effect m-l-5" name="submit" id="submit">
                                        Cancel
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- Col-md-6 end-->
                </div>   
                    <!-- End row-->
            </div>
            <!-- end container -->
        </div>    
            <!-- End #page-right-content -->
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
    </body>
</html>

