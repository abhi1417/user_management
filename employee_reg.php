<?php
session_start();
$var=json_decode($_COOKIE['registration'],true);    
include("includes/dbConnection.php");
if(!isset($_SESSION['email']) || $_SESSION['email']=="")
{
    header("location: login.php");
}
include("includes/header.php");
include("includes/sidebar.php");

$string = $var['employee_id'];
$newstring = str_replace("FxB-", "", $string);

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
                                        <input type="text" id="employee_id" name="employee_id" class="form-control" placeholder="Id" value="<?php echo $newstring; ?>">
                                        <span class="error"><?php if(isset($_GET["msg_employee_id"])) { echo $_GET["msg_employee_id"]; } ?></span>
                                    </div>
                                </div> 

                                <div class="form-group col-lg-6">
                                    <label for="first_name">First Name<span class="text-danger">*</span></label>
                                    <input type="text" name="first_name" parsley-trigger="change" 
                                    placeholder="Enter user first name" class="form-control" id="first_name" value="<?php if(isset($var['first_name'])){ echo $var['first_name']; }?>">
                                </div>

                                <div class="form-group col-lg-6">
                                    <label for="last_name">Last Name<span class="text-danger">*</span></label>
                                    <input type="text" name="last_name" parsley-trigger="change" 
                                    placeholder="Enter user last name" class="form-control" id="last_name" value="<?php if(isset($var['last_name'])){ echo $var['last_name']; }?>">
                                </div>

                                <div class="form-group col-lg-6">
                                    <label for="email">Email address<span class="text-danger">*</span></label>
                                    <input type="text" name="email" parsley-trigger="change" 
                                    placeholder="Enter email" class="form-control" id="email" value="<?php if(isset($var['email'])){ echo $var['email']; }?>">
                                    <span class="error"><?php if(isset($_GET["msg_email"])) { echo $_GET["msg_email"]; } ?></span>
                                </div>

                                <div class="form-group col-lg-6">
                                    <label for="password">Password<span class="text-danger">*</span></label>
                                    <input id="password" type="password" placeholder="Password" name="password" 
                                    class="form-control" value="<?php if(isset($var['password'])){ echo $var['password']; }?>">
                                </div>   

                                <div class="form-group col-lg-6">
                                    <label for="personal_number">Personal Number<span class="text-danger">*</span></label>
                                    <input id="personal_number" type="number" placeholder="Number" name="personal_number" 
                                    class="form-control" value="<?php if(isset($var['personal_number'])){ echo $var['personal_number']; }?>">
                                    <span class="error"><?php if(isset($_GET["msg_personal_num"])) { echo $_GET["msg_personal_num"]; } ?></span>
                                </div>

                                <div class="form-group col-lg-6">
                                    <label for="emergency_number">Emergency number<span class="text-danger">*</span></label>
                                    <input id="emergency_number" type="number" placeholder="Emergency number" name="emergency_number" 
                                    class="form-control" value="<?php if(isset($var['emergency_number'])){ echo $var['emergency_number']; }?>">
                                </div>

                                <div class="form-group col-lg-6">
                                    <label for="residental_address">Address Street 1<span class="text-danger">*</span></label>
                                    <input type="text" name="residental_address" parsley-trigger="change" 
                                    placeholder="Enter user current address" class="form-control" id="residental_address" value="<?php if(isset($var['residental_address'])){ echo $var['residental_address']; }?>">
                                </div>

                                <div class="form-group col-lg-6">
                                    <label for="home_address">Address Street 2<span class="text-danger">*</span></label>
                                    <input type="text" name="home_address" parsley-trigger="change" 
                                    placeholder="Enter user parmanent address" class="form-control" id="home_address" value="<?php if(isset($var['home_address'])){ echo $var['home_address']; }?>">
                                </div> 

                                <div class="form-group col-lg-6">
                                    <label for="marital_status">Marital Status<span class="text-danger">*</span></label>
                                    <div>
                                        <select id="marital_status" name="marital_status" class="form-control" > 
                                            <option value="">Select Marital Status</option>
                                            <option value="married" <?php if(isset($var['marital_status']) && $var['marital_status'] == 'married')echo 'selected = "selected"';?> >Married</option>
                                            <option value="unmarried" <?php if(isset($var['marital_status']) && $var['marital_status'] == 'unmarried')echo 'selected = "selected"';?> >Unmarried</option>        
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group col-lg-6">
                                    <label class="text-muted font-13 m-b-15 m-t-20"> Gender <span class="text-danger">*</span>
                                        <div class="radio radio-info">
                                            <input type="radio" id="inlineRadio1" value="male" name="gender" <?php if (isset($var['gender']) && ($var['gender']) == "male") echo "checked"; ?> checked>
                                            <label for="inlineRadio1"> Male </label>
                                        </div>
                                        <div class="radio radio-custom radio-inline">
                                            <input type="radio" id="inlineRadio2" value="female" name="gender" <?php if (isset($var['gender']) && ($var['gender']) == "female") echo "checked"; ?> checked>
                                            <label for="inlineRadio2"> Female </label>
                                        </div>
                                    </label>    
                                </div> 

                                <div class="form-group col-lg-6">                                        
                                    <label for="date_of_birth">Date Of Birth<span class="text-danger">*</span></label>
                                    <div>   
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="yyyy/mm/dd" id="datepicker-autoclose" name="date_of_birth" id="date_of_birth" value="<?php if(isset($var['date_of_birth'])){ echo $var['date_of_birth']; }?>">
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
                                        <select id="role_type" name="role_type" class="form-control" > 
                                            <option value="">Select Role</option>
                                            <option value="trainee" <?php if(isset($var['role_type']) && $var['role_type'] == 'trainee')echo 'selected = "selected"';?> >Trainee</option>
                                            <option value="developer" <?php if(isset($var['role_type']) && $var['role_type'] == 'developer')echo 'selected = "selected"';?> >Developer</option>        
                                            <option value="senior developer" <?php if(isset($var['role_type']) && $var['role_type'] == 'senior developer')echo 'selected = "selected"';?> >Senior Developer</option>
                                            <option value="manager" <?php if(isset($var['role_type']) && $var['role_type'] == 'manager')echo 'selected = "selected"';?> >Manager</option>
                                            <option value="hr" <?php if(isset($var['role_type']) && $var['role_type'] == 'hr')echo 'selected = "selected"';?> >HR</option>        
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group col-lg-6">
                                    <label for="employee_role">Employee Role<span class="text-danger">*</span></label>
                                    <div>
                                        <select id="employee_role" name="employee_role" class="form-control" > 
                                            <option value="">Select Role</option>
                                            <option value="trainee" <?php if(isset($var['employee_role']) && $var['employee_role'] == 'trainee')echo 'selected = "selected"';?> >Trainee</option>
                                            
                                            <option value="developer ios" <?php if(isset($var['employee_role']) && $var['employee_role'] == 'developer ios')echo 'selected = "selected"';?> >Developer IOS</option>        
                                            <option value="developer php" <?php if(isset($var['employee_role']) && $var['employee_role'] == 'developer php')echo 'selected = "selected"';?> >Developer PHP</option>        
                                            <option value="developer java" <?php if(isset($var['employee_role']) && $var['employee_role'] == 'developer java')echo 'selected = "selected"';?> >Developer JAVA</option>        
                                            <option value="developer android" <?php if(isset($var['employee_role']) && $var['employee_role'] == 'developer android')echo 'selected = "selected"';?> >Developer Android</option>

                                            <option value="senior developer ios" <?php if(isset($var['employee_role']) && $var['employee_role'] == 'senior developer ios')echo 'selected = "selected"';?>>Senior Developer IOS</option>        
                                            <option value="senior developer php" <?php if(isset($var['employee_role']) && $var['employee_role'] == 'senior developer php')echo 'selected = "selected"';?>>Senior Developer PHP</option>        
                                            <option value="senior developer java" <?php if(isset($var['employee_role']) && $var['employee_role'] == 'senior developer java')echo 'selected = "selected"';?> >Senior Developer JAVA</option>        
                                            <option value="senior developer android" <?php if(isset($var['employee_role']) && $var['employee_role'] == 'senior developer android')echo 'selected = "selected"';?> >Senior Developer Android</option> 
                                            
                                            <option value="manager" <?php if(isset($var['employee_role']) && $var['employee_role'] == 'manager')echo 'selected = "selected"';?> >Manager</option>
                                            <option value="hr" <?php if(isset($var['employee_role']) && $var['employee_role'] == 'hrs')echo 'selected = "selected"';?> >HR</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group col-lg-6">
                                    <label for="project_team">Project Team<span class="text-danger">*</span></label>
                                    <div>
                                        <select id="project_team" name="project_team" class="form-control" > 
                                            <option value="">Select Project Team</option>
                                            <option value="team ios" <?php if(isset($var['project_team']) && $var['project_team'] == 'team ios')echo 'selected = "selected"';?> >Team IOS</option>
                                            <option value="team php" <?php if(isset($var['project_team']) && $var['project_team'] == 'team php')echo 'selected = "selected"';?> >Team PHP</option>        
                                            <option value="team android" <?php if(isset($var['project_team']) && $var['project_team'] == 'team android')echo 'selected = "selected"';?> >Team Android</option>
                                            <option value="team java" <?php if(isset($var['project_team']) && $var['project_team'] == 'team java')echo 'selected = "selected"';?> >Team JAVA</option>
                                        </select>
                                    </div>
                                </div> 

                                <div class="form-group col-lg-6">
                                    <label for="education">Education<span class="text-danger">*</span></label>
                                    <div>
                                        <select id="education" name="education" class="form-control" > 
                                            <option value="">Select Project Team</option>
                                            <option value="BCA" <?php if(isset($var['education']) && $var['education'] == 'BCA')echo 'selected = "selected"';?> >BCA</option>
                                            <option value="BE(CS)" <?php if(isset($var['education']) && $var['education'] == 'BE(CS)')echo 'selected = "selected"';?> >BE(CS)</option>        
                                            <option value="BE(EC)" <?php if(isset($var['education']) && $var['education'] == 'BE(EC)')echo 'selected = "selected"';?> >BE(EC)</option>
                                            <option value="BSC(CS)" <?php if(isset($var['education']) && $var['education'] == 'BSC(CS)')echo 'selected = "selected"';?> >Bsc(cs)</option>
                                            <option value="B.Tech" <?php if(isset($var['education']) && $var['education'] == 'B.Tech')echo 'selected = "selected"';?> >B.Tech</option>
                                            <option value="M.Tech" <?php if(isset($var['education']) && $var['education'] == 'M.Tech')echo 'selected = "selected"';?> >M.tech</option>
                                            <option value="MCA" <?php if(isset($var['education']) && $var['education'] == 'MCA')echo 'selected = "selected"';?> >MCA</option>
                                            <option value="ME(CS)" <?php if(isset($var['education']) && $var['education'] == 'ME(CS)')echo 'selected = "selected"';?> >ME(CS)</option>
                                            <option value="ME(EC)" <?php if(isset($var['education']) && $var['education'] == 'ME(EC)')echo 'selected = "selected"';?> >ME(EC)</option>
                                        </select>
                                    </div>
                                </div> 

                                <div class="form-group col-lg-6">
                                    <label for="state">State<span class="text-danger">*</span></label>
                                    <div>
                                        <select id="state" name="state" class="form-control" > 
                                            <option value="">Select State</option>
                                            <option value="madhya pradesh" <?php if(isset($var['state']) && $var['state'] == 'madhya pradesh')echo 'selected = "selected"';?> >Madhya Pradesh</option>
                                            <option value="andhra pradesh" <?php if(isset($var['state']) && $var['state'] == 'andhra pradesh')echo 'selected = "selected"';?> >Andhra Pradesh</option>        
                                            <option value="maharashtra" <?php if(isset($var['state']) && $var['state'] == 'maharashtra')echo 'selected = "selected"';?> >Maharashtra</option>
                                            <option value="delhi" <?php if(isset($var['state']) && $var['state'] == 'delhi')echo 'selected = "selected"';?> >Delhi</option>
                                            <option value="uttar pradesh" <?php if(isset($var['state']) && $var['state'] == 'uttar pradesh')echo 'selected = "selected"';?> >Uttar Pradesh</option>
                                            <option value="himachal pradesh" <?php if(isset($var['state']) && $var['state'] == 'himachal pradesh')echo 'selected = "selected"';?> >himachal Pradesh</option>        
                                            <option value="haryana" <?php if(isset($var['state']) && $var['state'] == 'haryana')echo 'selected = "selected"';?> >Haryana</option>
                                            <option value="gujrat" <?php if(isset($var['state']) && $var['state'] == 'gujrat')echo 'selected = "selected"';?> >Gujrat</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group col-lg-6">
                                    <label for="city">City<span class="text-danger">*</span></label>
                                    <div>
                                        <select id="city" name="city" class="form-control" > 
                                            <option value="">Select City</option>
                                            <option value="indore" <?php if(isset($var['city']) && $var['city'] == 'indore')echo 'selected = "selected"';?> >Indore</option>
                                            <option value="bhopal" <?php if(isset($var['city']) && $var['city'] == 'bhopal')echo 'selected = "selected"';?> >Bhopal</option>        
                                            <option value="mumbai" <?php if(isset($var['city']) && $var['city'] == 'mumbai')echo 'selected = "selected"';?> >Mumbai</option>
                                            <option value="pune" <?php if(isset($var['city']) && $var['city'] == 'pune')echo 'selected = "selected"';?> >Pune</option>
                                            <option value="bangalore" <?php if(isset($var['city']) && $var['city'] == 'bangalore')echo 'selected = "selected"';?> >Bangalore</option>
                                            <option value="hyderabad" <?php if(isset($var['city']) && $var['city'] == 'hyderabad')echo 'selected = "selected"';?> >Hyderabad</option>
                                            <option value="ahmedabad" <?php if(isset($var['city']) && $var['city'] == 'ahmedabad')echo 'selected = "selected"';?> >Ahmedabad</option>
                                            <option value="vadodara" <?php if(isset($var['city']) && $var['city'] == 'vadodara')echo 'selected = "selected"';?> >Vadodara</option>
                                            <option value="chennai" <?php if(isset($var['city']) && $var['city'] == 'chennai')echo 'selected = "selected"';?>  >Chennai</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group col-lg-6">
                                    <label for="nationality">Nationality<span class="text-danger">*</span></label>
                                    <div>
                                        <select id="nationality" name="nationality" class="form-control" > 
                                            <option value="">Select Nationality</option>
                                            <option value="indian" <?php if(isset($var['nationality']) && $var['nationality'] == 'indian')echo 'selected = "selected"';?> >Indian</option>
                                            <option value="japanese" <?php if(isset($var['nationality']) && $var['nationality'] == 'japanese')echo 'selected = "selected"';?> >Japanese</option>        
                                            <option value="sri_lankan" <?php if(isset($var['nationality']) && $var['nationality'] == 'sri_lankan')echo 'selected = "selected"';?> >Sri Lankan</option>
                                            <option value="russian" <?php if(isset($var['nationality']) && $var['nationality'] == 'russian')echo 'selected = "selected"';?> >Russian</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group col-lg-6">
                                    <label for="joining_date">Joining Date<span class="text-danger">*</span></label>
                                    <div>
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="yyyy/mm/dd" id="datepicker" name="joining_date" id="joining_date" value="<?php if(isset($var['joining_date'])){ echo $var['joining_date']; }?>">
                                            <span class="input-group-addon bg-custom b-0"><i class="mdi mdi-calendar text-white"></i></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group col-lg-6">
                                    <label for="bond">Bond<span class="text-danger">*</span></label>
                                    <div>
                                        <select id="bond" name="bond" class="form-control" > 
                                            <option value="">Bond Type</option>
                                            <option value="fresher">Fresher</option>
                                            <option value="1" <?php if(isset($var['bond']) && $var['bond'] == '1')echo 'selected = "selected"';?> >1 year</option>        
                                            <option value="2" <?php if(isset($var['bond']) && $var['bond'] == '2')echo 'selected = "selected"';?> >2 year</option>
                                            <option value="3" <?php if(isset($var['bond']) && $var['bond'] == '3')echo 'selected = "selected"';?> >3 year</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group col-lg-6">
                                    <label for="bond_duration">Bond Duration<span class="text-danger">*</span></label>
                                    <div>
                                        <div class="input-daterange input-group" id="date-range">
                                            <input type="text" class="form-control" name="bond_duration_from" id="bond_duration_from" value="<?php if(isset($var['bond_duration_from'])){ echo $var['bond_duration_from']; }?>">
                                            <span class="input-group-addon b-0">to</span>
                                            <input type="text" class="form-control" name="bond_duration_to" id="bond_duration_to" value="<?php if(isset($var['bond_duration_to'])){ echo $var['bond_duration_to']; }?>">
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

    </body>
    </html>
<script>
$("#datepicker-autoclose").datepicker().datepicker("setDate", new Date());
$("#datepicker").datepicker().datepicker("setDate", new Date());
$("#bond_duration_from").datepicker().datepicker("setDate", new Date());
$("#bond_duration_to").datepicker().datepicker("setDate", new Date());
</script>
