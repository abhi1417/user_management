<?php
 	session_start();
	include("includes/dbConnection.php");
	if ($_POST) {
	
  		/* Employee Registration */
	  	if(isset($_POST['registrationBtn']))
	  	{	
	  		$employee_id       	 = 'FxB'.'-'.$_POST['employee_id'];
	  		$first_name       	 = $_POST['first_name'];
	  		$last_name        	 = $_POST['last_name'];
	  		$email            	 = $_POST['email'];
	  		$password         	 = md5($_POST['password']);
	  		$personal_number  	 = $_POST['personal_number'];
	  		$emergency_number 	 = $_POST['emergency_number'];
	  		$residental_address  = $_POST['residental_address'];
	  		$home_address        = $_POST['home_address'];
	  		$marital_status      = $_POST['marital_status'];
	  		$gender              = $_POST['gender'];
	  		$date_of_birth       = $_POST['date_of_birth'];
	  		$role_type           = $_POST['role_type'];
	  		$employee_role       = $_POST['employee_role'];
	  		$project_team     	 = $_POST['project_team'];
	  		$education        	 = $_POST['education'];
	  		$state            	 = $_POST['state'];
	  		$city             	 = $_POST['city'];
	  		$nationality      	 = $_POST['nationality']; 
	  		$joining_date     	 = $_POST['joining_date'];
	  		$bond             	 = $_POST['bond'];
	  		$bond_duration_from  = $_POST['bond_duration_from'];
	  		$bond_duration_to    = $_POST['bond_duration_to'];

		    $birth_date  = date('Y-m-d', strtotime( $date_of_birth ));
		    $joining_date = date('Y-m-d', strtotime( $joining_date ));
		    $bond_duration_from_date = date('Y-m-d', strtotime( $bond_duration_from ));
		    $bond_duration_to_date = date('Y-m-d', strtotime( $bond_duration_to ));




		    $query_employee_id = "SELECT employee_id FROM user_employee WHERE employee_id = '$employee_id'";			
			$result_employee_id = $conn->query($query_employee_id);
			$row_employee_id = mysqli_fetch_array($result_employee_id);
			


			$query_email = "SELECT email FROM user_employee WHERE email = '$email'";						
			$result_email = $conn->query($query_epersonal_mail);
			$row_email = mysqli_fetch_array($result_email);
			 
			
			$query_personal_number = "SELECT personal_number FROM user_employee WHERE personal_number = '$personal_number'";			
			$result_personal_number = $conn->query($query_personal_number);
			$row_personal_number = mysqli_fetch_array($result_personal_number); 
			
			

			if (mysqli_num_rows($result_employee_id) > 0 ) {
				$msg_employee_id = "This Employee ID is already exists"; 
				 
				header("location: employee_reg.php?msg_employee_id={$msg_employee_id}");
			} else if (mysqli_num_rows($result_email) > 0) {
				$msg_email = "This Email address is already exists";

				header("location: employee_reg.php?msg_email={$msg_email}");
			} else if (mysqli_num_rows($result_personal_number) > 0) {
				$msg_personal_num = "This number is already exists";

				header("location: employee_reg.php?msg_personal_num={$msg_personal_num}");
			}


			else {

	  		$sql = "INSERT INTO user_employee (employee_id, first_name, last_name, email, password, personal_number, emergency_number, residental_address, home_address, marital_status, gender, date_of_birth, role_type, employee_role, project_team, education, state, city, nationality, joining_date, bond, bond_duration_from, bond_duration_to) 
	  		VALUES ('$employee_id','$first_name', '$last_name', '$email', '$password','$personal_number', '$emergency_number', '$residental_address', '$home_address', '$marital_status', '$gender', '$birth_date', '$role_type', '$employee_role', '$project_team', '$education', '$state', '$city', '$nationality', '$joining_date', '$bond', '$bond_duration_from_date', '$bond_duration_to_date')";
	  		if ($conn->query($sql) === TRUE) {
					$id = mysqli_insert_id($conn);
				} else {
					echo "Error: " . $sql . "<br>" . $conn->error;
				}
				$conn->close();
				header("Location: employee_profile.php?id={$id}"); /* Redirect browser */
				exit();
  			}
  		}	

  		/*employe update*/
  	    else if(isset($_POST['update']))
    	{
	        $id = $_POST['id'];

	        $first_name = $_POST['first_name'];
	        $last_name = $_POST['last_name'];
	        $email = $_POST['email'];
	        $personal_number = $_POST['personal_number'];
	        $emergency_number = $_POST['emergency_number'];
	        $residental_address = $_POST['residental_address'];
	        $home_address = $_POST['home_address'];
	        $marital_status = $_POST['marital_status'];
	        $gender = $_POST['gender'];
	        $date_of_birth = $_POST['date_of_birth'];
	        $role_type = $_POST['role_type'];
	        $employee_role = $_POST['employee_role'];
	        $project_team = $_POST['project_team'];
	        $education = $_POST['education'];
	        $state = $_POST['state'];
	        $city = $_POST['city'];
	        $nationality = $_POST['nationality'];
	        $joining_date = $_POST['joining_date'];
	        $bond = $_POST['bond'];
	        $bond_duration_from = $_POST['bond_duration_from'];
	        $bond_duration_to = $_POST['bond_duration_to'];

	        $birth_date  = date('Y-m-d', strtotime( $date_of_birth ));
		    $joining_date = date('Y-m-d', strtotime( $joining_date ));
		    $bond_duration_from_date = date('Y-m-d', strtotime( $bond_duration_from ));
		    $bond_duration_to_date = date('Y-m-d', strtotime( $bond_duration_to ));

	        $query = "UPDATE user_employee SET first_name = '$first_name', last_name = '$last_name', email = '$email', personal_number = '$personal_number', emergency_number = '$emergency_number', residental_address = '$residental_address', home_address = '$home_address', marital_status = '$marital_status', gender = '$gender', date_of_birth = '$birth_date', role_type = '$role_type', employee_role = '$employee_role', project_team = '$project_team', education = '$education', state = '$state', city = '$city', nationality = '$nationality', joining_date = '$joining_date', bond = '$bond', bond_duration_from = '$bond_duration_from_date', bond_duration_to = '$bond_duration_to_date' WHERE id = '$id'";
	        $result = $conn->query($query);
	        $row_count =  mysqli_affected_rows($conn);
	        if($row_count > 0 )
	        {
	            header("location: employee_view.php");
	        } else{
	        	header("location: employee_edit.php?id={$id}");
	        }
    	}

    	/*PDF Upload*/  	
    	else if(isset($_POST['uploadBtn'])) 
    	{
    		
    		$folder = "pdf/";

			move_uploaded_file($_FILES["file_path"]["tmp_name"] , "$folder".$_FILES["file_path"]["name"]);

    		$policy_type = $_POST['policy_type'] && !empty($_POST['policy_type']) ? "'".$_POST['policy_type']."'" : "NULL";
    		$from_date   = $_POST['from_date'] ;
    		$to_date     = $_POST['to_date'] ;
    		$file_path   = $_FILES["file_path"]["name"] && !empty($_FILES['file_path']['name']) ? "'".$_FILES['file_path']['name']."'" : "NULL";
    		$comment     = $_POST['comment'] && !empty($_POST['comment']) ? "'".$_POST['comment']."'" : "NULL";
    		$policy_from_date = date('Y-m-d', strtotime( $from_date ));
		    $policy_to_date   = date('Y-m-d', strtotime( $to_date ));

    		if(!empty($_POST['comment'])){
			    $comment = "'".$_POST['comment']."'";
			}else{
			    $comment = "NULL";
			} 
    		$query = "INSERT INTO user_policy (policy_type, from_date, to_date, file_path, comment) VALUES (".$policy_type.", '".$policy_from_date."', '".$policy_to_date."', ".$file_path.", ".$comment.")";
			if ($conn->query($query) === TRUE) {
					$id = mysqli_insert_id($conn);
				} else {
					echo "Error: " . $query . "<br>" . $conn->error;
				}
				$conn->close();
				header("Location: policy_view.php?id={$id}"); /* Redirect browser */
				exit();
  		}

  		/*policy update*/
  	    else if(isset($_POST['updateBtn']))
    	{

    		$folder = "pdf/";

			move_uploaded_file($_FILES["file_path"]["tmp_name"] , "$folder".$_FILES["file_path"]["name"]);

   		    $id = $_POST['id'];
	        $policy_type = $_POST['policy_type'] && !empty($_POST['policy_type']) ? "'".$_POST['policy_type']."'" : "NULL";
    		$from_date   = $_POST['from_date'] ;
    		$to_date     = $_POST['to_date'] ;
    		$file_path   = $_FILES["file_path"]["name"] && !empty($_FILES['file_path']['name']) ? "'".$_FILES['file_path']['name']."'" : "NULL";
    		$comment     = $_POST['comment'] && !empty($_POST['comment']) ? "'".$_POST['comment']."'" : "NULL";

	        $policy_from_date = date('Y-m-d', strtotime( $from_date ));
		    $policy_to_date   = date('Y-m-d', strtotime( $to_date ));

		    if(!empty($_POST['comment'])){
			    $comment = "'".$_POST['comment']."'";
			}else{
			    $comment = "NULL";
			}			
		    
			$file_size = $_FILES['file_path']['size']; 
		    $file_type = $_FILES['file_path']['type']; 
		   
		    //print_r($_FILES['file_path']['error']); die;
		   
		    if($_FILES == ''){

		    if (($file_size > 10485760)){      
		        $msg_size = 'File too large. File must be less than 5 Megabytes.'; 	
		        header("location: policy_edit.php?msg_size={$msg_size}");	        
		    }
		    else if (($file_type != "application/pdf")){
		        $msg_size = 'Invalid file type. Only PDF types are accepted.'; 
		        header("location: policy_edit.php?msg_size={$msg_size}");	        
		    }    
		}
		else {
			$query = "UPDATE user_policy SET policy_type = ".$policy_type.", from_date = '".$policy_from_date."', to_date = '".$policy_to_date."', file_path = ".$file_path.", comment = ".$comment."   WHERE id = '$id'"; 
			$result = $conn->query($query);
			$row_count =  mysqli_affected_rows($conn);
			if($row_count > 0 )
			{
	            header("location: policy_view.php");
	        } else{
	        	header("location: policy_edit.php?id={$id}");
	        }
	    }
	}
	 	/* employee login  */
    	 else if (isset($_POST['login_submit'])) {

			$email = $_POST['email'];
			$password = $_POST['password'];

			$sql = "SELECT * FROM user_admin WHERE email='$email' AND password = '$password'"; 
			$result = $conn->query($sql);
			if(mysqli_num_rows($result)>0)
			{
				$userData = mysqli_fetch_array($result);
				$_SESSION['id'] = $userData['id'];
				$_SESSION['name'] = $userData['name'];
				
				header("location: employee_reg.php");

			}else{
				$_SESSION['msg'] = " Wrong username  or password.";
				header("location: index.php");
			}		
		}	
		/*leave insert data*/
		else if (isset($_POST['apply'])) {


			$employee_id = $_POST['employee_id'];
			$leave_type  = $_POST['leave_type'];
			$from_date   = $_POST['from_date'];
	        $to_date     = $_POST['to_date'];
	        $comment     = $_POST['comment'];

	        
	        $leave_from_date  = date('Y-m-d', strtotime( $from_date ));
	        $leave_to_date  = date('Y-m-d', strtotime( $to_date ));

			
	        $sql = "INSERT INTO user_leave (employee_id, leave_type, from_date, to_date, comment) 
	        VALUES ('$employee_id', '$leave_type', '$leave_from_date', '$leave_to_date','$comment')";

	        if ($conn->query($sql) === TRUE) {
	        	$id = mysqli_insert_id($conn);
	        } else {
					echo "Error: " . $sql . "<br>" . $conn->error;
				}
				$conn->close();
				//header("Location: leave_view.php?id={$id}"); /* Redirect browser */
				exit(); 
		}
		/*News Section*/
		else if (isset($_POST['applyBtn'])) {


			$tittle = $_POST['tittle'];
			$description  = $_POST['description'];
	        		
	       echo $sql = "INSERT INTO user_news (tittle, description) 
	        VALUES ('$tittle', '$description')";

	        if ($conn->query($sql) === TRUE) {
	        	$id = mysqli_insert_id($conn);
	        } else {
					echo "Error: " . $sql . "<br>" . $conn->error;
				}
				$conn->close();
				header("Location: news_view.php?id={$id}"); /* Redirect browser */
				exit(); 
		}
	}
  	/* employee delete */
  	elseif(isset($_GET['id']))
	{

		$id = $_GET['id'];
		$query = "UPDATE user_employee SET status = 0 WHERE id = '$id'";

		$result = $conn->query($query);
		header("location: employee_view.php");
	}
	elseif(isset($_GET['id']))
	{

		$id = $_GET['id'];
		$query = "UPDATE user_policy SET status = 0 WHERE id = '$id'";

		$result = $conn->query($query);
		header("location: policy_view.php");
	} 

	elseif(isset($_GET['download_file']))
	{
		header("Content-Type: application/octet-stream");
		$file = 'pdf/'.base64_decode($_GET["download_file"]);
		
		
		header('Content-Description: File Transfer');
		header('Content-Type: application/octet-stream');
		header("Content-Type: application/force-download");
		header('Content-Disposition: attachment; filename=' . urlencode(basename($file)));
		header('Expires: 0');
		header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
		header('Pragma: public');
		header('Content-Length: ' . filesize($file));
		ob_clean();
		flush();
		readfile($file);
		exit;
	}
?>