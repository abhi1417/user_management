<?php
include("includes/dbConnection.php");
 /*ini_set("SMTP", "aspmx.l.google.com");
    ini_set("sendmail_from", "kothari.abhishek@fxbytes.com");
function send_mail($employee_id,$first_name,$email,$password)
{   
    $from='kothari.abhishek@fxbytes.com';
    $headers = '';
    $headers .= "From: $from\n";
    $headers .= "Reply-to: $from\n";
    $headers .= "Return-Path: $from\n";
    $headers .= "Message-ID: <" . md5(uniqid(time())) . "@" . $_SERVER['SERVER_NAME'] . ">\n";
    $headers .= "Date: " . date('r', time()) . "\n";
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";

    $subject = "Welcome!";
   $message = "
    <p></p><br>
    Hi ".$first_name."<br>
   You are successfully registering for the Fxbytes group.<br><br>
   Your ID is ".$employee_id."<br>
   Login using your email id : ".$email." and,<br>
   your password : ".$password."<br><br>";

  mail($email,$subject,$message,$headers);

}*/
			/*$employee_id = $_POST['employee_id'];
			$first_name = $_POST['first_name'];
			$email = $_POST['email'];
			$password = $_POST['password'];
			send_mail($employee_id, $first_name,$email,$password);*/

/*$to      = 'jain.gourav2@mailinator.com';
$subject = 'Fake sendmail test';
$message = 'If we can read this, it means that our fake Sendmail setup works!';
$headers = 'From: abhik1424@gmail.com' . "\r\n" .
           'Reply-To: abhik1424@gmail.com' . "\r\n" .
           'X-Mailer: PHP/' . phpversion();

if(mail($to, $subject, $message, $headers)) {
    echo 'Email sent successfully!';
} else {
    die('Failure: Email was not sent!');
}*/
if ($_POST) {
	
	/* Employee Registration */
	if(isset($_POST['registrationBtn']))
	{	

		$employee_id         ='FxB'.'-'.$_POST['employee_id'];
		$first_name       	 = $_POST['first_name'];
		$last_name        	 = $_POST['last_name'];
		$email            	 = $_POST['email'];
		$password    	     = md5($_POST['password']);
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
		$nationality     	 = $_POST['nationality']; 
		$joining_date     	 = $_POST['joining_date'];
		$bond             	 = $_POST['bond'];
		$bond_duration_from  = $_POST['bond_duration_from'];
		$bond_duration_to    = $_POST['bond_duration_to'];

		$cookie_ary  = array('employee_id'=>$employee_id,
			'first_name'=>$first_name,
			'last_name'=>$last_name,
			'email'=>$email,
			'password'=>$password,
			'personal_number'=>$personal_number,
			'emergency_number'=>$emergency_number,
			'residental_address'=>$residental_address,
			'home_address'=>$home_address,
			'marital_status'=>$marital_status,
			'gender'=>$gender,
			'date_of_birth'=>$date_of_birth,
			'role_type'=>$role_type,
			'employee_role'=>$employee_role,
			'project_team'=>$project_team,
			'education'=>$education,
			'state'=>$state,
			'city'=>$city,
			'nationality'=>$nationality,
			'joining_date'=>$joining_date,
			'bond'=>$bond,
			'bond_duration_from'=>$bond_duration_from,
			'bond_duration_to'=>$bond_duration_to
			);
		setcookie('registration', json_encode($cookie_ary), time() + 80000, '/');

		$birth_date  = date('Y-m-d', strtotime( $date_of_birth ));
		$joining_date = date('Y-m-d', strtotime( $joining_date ));
		$bond_duration_from_date = date('Y-m-d', strtotime( $bond_duration_from ));
		$bond_duration_to_date = date('Y-m-d', strtotime( $bond_duration_to ));

		$query_mail = "SELECT email FROM user_employee WHERE email = '$email'";						
		$result_email = $conn->query($query_mail);
		$row_email = mysqli_fetch_array($result_email);

		$query_employee_id = "SELECT employee_id FROM user_employee WHERE employee_id = '$employee_id'";			
		$result_employee_id = $conn->query($query_employee_id);
		$row_employee_id = mysqli_fetch_array($result_employee_id);
		
		$query_personal_number = "SELECT personal_number FROM user_employee WHERE personal_number = '$personal_number'";			
		$result_personal_number = $conn->query($query_personal_number);
		$row_personal_number = mysqli_fetch_array($result_personal_number); 
		/*echo "<pre>";
		print_r($_POST);die;*/

		if (mysqli_num_rows($result_email) > 0) {
			$msg_email = "This Email address is already exists";
			header("location: employee_reg.php?msg_email={$msg_email}");

		} else if (mysqli_num_rows($result_employee_id) > 0 ) {
			$msg_employee_id = "This Employee ID is already exists"; 			
			header("location: employee_reg.php?msg_employee_id={$msg_employee_id}");

		} else if (mysqli_num_rows($result_personal_number) > 0) {
			$msg_personal_num = "This number is already exists";
			header("location: employee_reg.php?msg_personal_num={$msg_personal_num}");

		}
		
		else {
			
			$sql = "INSERT INTO user_employee 
			(employee_id, first_name, last_name, email, password, personal_number, emergency_number, residental_address, home_address, marital_status, gender, date_of_birth, role_type, employee_role, project_team, education, state, city, nationality, joining_date, bond, bond_duration_from, bond_duration_to) 
			VALUES ('$employee_id','$first_name', '$last_name', '$email', '$password','$personal_number', '$emergency_number', '$residental_address', '$home_address', '$marital_status', '$gender', '$birth_date', '$role_type', '$employee_role', '$project_team', '$education', '$state', '$city', '$nationality', '$joining_date', '$bond', '$bond_duration_from_date', '$bond_duration_to_date')";


			if ($conn->query($sql) === TRUE) {
				$id = mysqli_insert_id($conn);
				//print_r($_COOKIE);
				unset($_COOKIE['registration']); 
				setcookie("registration", "", -1, '/');
				

			} else {
				echo "Error: " . $sql . "<br>" . $conn->error;
			}
			header("Location: employee_profile.php?id={$id}"); /* Redirect browser */
			$conn->close();
			
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

		echo $query = "UPDATE user_employee SET first_name = '$first_name', last_name = '$last_name', email = '$email', personal_number = '$personal_number', emergency_number = '$emergency_number', residental_address = '$residental_address', home_address = '$home_address', marital_status = '$marital_status', gender = '$gender', date_of_birth = '$birth_date', role_type = '$role_type', employee_role = '$employee_role', project_team = '$project_team', education = '$education', state = '$state', city = '$city', nationality = '$nationality', joining_date = '$joining_date', bond = '$bond', bond_duration_from = '$bond_duration_from_date', bond_duration_to = '$bond_duration_to_date' WHERE id = '$id'";
		$result = $conn->query($query);
		$row_count =  mysqli_affected_rows($conn);
		if($row_count > 0 )
		{
			header("location: employee_view.php?id={$id}");
		} else{
			header("location: employee_edit.php?id={$id}");
		}
	}

	/*PDF Upload*/  	
	else if(isset($_POST['uploadBtn'])) 
	{

		$folder = "assets/pdf/";

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

		$folder = "assets/pdf/";
		$file_size = $_FILES['file_path']['size']; 
		$file_type = $_FILES['file_path']['type']; 

		    //print_r($_FILES['file_path']['error']); die;

		if($_FILES == ''){

			if (($file_size > 5242880)){      
				$msg_size = 'File too large. File must be less than 5 Megabytes.'; 	
				header("location: policy_edit.php?msg_size={$msg_size}");	        
			}
			else if (($file_type != "application/pdf")){
				$msg_size = 'Invalid file type. Only PDF types are accepted.'; 
				header("location: policy_edit.php?msg_size={$msg_size}");	        
			}    
			move_uploaded_file($_FILES["file_path"]["tmp_name"] , "$folder".$_FILES["file_path"]["name"]);
		} else {
			$query = "UPDATE user_policy SET policy_type = ".$policy_type.", from_date = '".$policy_from_date."', to_date = '".$policy_to_date."', file_path = ".$file_path.", comment = ".$comment." WHERE id = '$id'"; 
			$result = $conn->query($query);
			$row_count =  mysqli_affected_rows($conn);
			if($row_count > 0 )
			{
				header("location: policy_view.php");
			} else{
					//header("location: policy_edit.php?id={$id}");
			}
		}
	}

	/* employee login  */
	else if (isset($_POST['login_submit'])) 
	{
		
		$email = $_POST['email'];
		$password = $_POST['password'];
		$password = md5($password);

		$sql_admin = "SELECT id, email, password, user_type, first_name FROM user_employee WHERE email='$email' AND password = '$password'"; 
		$result_admin = $conn->query($sql_admin);

		if(mysqli_num_rows($result_admin)>0)
		{
			
			$userData = mysqli_fetch_array($result_admin);

			$id = $_SESSION['id'] = $userData['id'];
			$_SESSION['email'] = $userData['email'];
			$_SESSION['user_type'] = $userData['user_type'];
			$_SESSION['first_name'] = $userData['first_name'];
			//echo $userData['user_type'];
			//print_r($userData);die;
			if($userData['user_type'] == 'Admin') {			
				header("location: employee_reg.php");

			} else if($userData['user_type'] == 'User') {
				header("location: employee_profile.php?id={$id}");

			} else {
				header("location: login.php");
			}			
		}
	}

	/*leave insert data*/
	else if (isset($_POST['applyLeave'])) 
	{
		$employee_id 	 = $_POST['employee_id'];
		$leave_type 	 = $_POST['leave_type'];
		$from_date   	 = $_POST['from_date'];
		$to_date    	 = $_POST['to_date'];
		$number_of_days  = $_POST['number_of_days'];
		$remaining_leave = $_POST['remaining_leave'];
		$comment         = $_POST['comment'];


		$leave_from_date  = date('Y-m-d', strtotime( $from_date ));
		$leave_to_date  = date('Y-m-d', strtotime( $to_date ));

		$first_date = strtotime($from_date);
		$first_date = strtotime('-1 day', $first_date);
		$second_date = strtotime($to_date);
		$diff = ($second_date - $first_date);
		$days = floor($diff / (60 * 60 * 24));

		$query_leave = "SELECT sum(total_leave) as total_leave FROM leave_type";
		$result_leave = $conn->query($query_leave);
		$row_leave = mysqli_fetch_row($result_leave);
		

		//$leave_bal1 = $leave_bal - $_POST['number_of_days'];

		$sql = "INSERT INTO user_leave (employee_id, leave_type, from_date, to_date, number_of_days,remaining_leave, comment) 
		VALUES ('".$employee_id."', '".$leave_type."', '".$leave_from_date."', '".$leave_to_date."','".$days."','".$leave_bal."','".$comment."')";

		if ($conn->query($sql) === TRUE) {
			$id = mysqli_insert_id($conn);
		} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
		}
		header("Location: leave_view.php?id={$id}"); /* Redirect browser */
		//$conn->close();
		//exit(); 
	}

	/*News Section*/
	else if (isset($_POST['applyNews'])) 
	{

		$tittle      = $_POST['tittle'];
		$image       = $_FILES['image']['name'];
		$description = $_POST['description'];
		$news_date   = $_POST['news_date'] ;		

		$news_from_date = date('Y-m-d', strtotime( $news_date ));

		$target_dir = "assets/img/"; 
		$target_file = $target_dir . basename($_FILES["image"]["name"]); 
		$uploadOk = 1;
		$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION); 
			// Check if image file is a actual image or fake image
		$check = getimagesize($_FILES["image"]["tmp_name"]); 
		if($check !== false) {
			echo "File is an image - " . $check["mime"] . ".";
			$uploadOk = 1;
		} else {
			echo "File is not an image.";
			$uploadOk = 0;
		}
			// Check if file already exists
		if (file_exists($target_file)) {
			echo "Sorry, file already exists.";
			$uploadOk = 0;
		}
			// Check file size
		if ($_FILES["image"]["size"] > 5242880) {
			echo "Sorry, your file is too large.";
			$uploadOk = 0;
		}
			// Allow certain file formats
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
			&& $imageFileType != "gif" ) {
			echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
		$uploadOk = 0;
	}
			// Check if $uploadOk is set to 0 by an error
	if ($uploadOk == 0) {
		echo "Sorry, your file was not uploaded.";
				// if everything is ok, try to upload file
	} else {
		if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
			echo "The file ". basename( $_FILES["image"]["name"]). " has been uploaded.";
		} else {
			echo "Sorry, there was an error uploading your file.";
		}

	}  

	$sql = "INSERT INTO user_news (tittle, image, news_date, description) 
	VALUES ('".$tittle."', '".$image."', '".$news_from_date."', '".$description."' )";

	if ($conn->query($sql) === TRUE) {
		$id = mysqli_insert_id($conn);
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
	$conn->close();
	header("Location: news_view.php?id={$id}"); /* Redirect browser */
	exit(); 
}

/*Update news*/
else if (isset($_POST['updateNews'])) 
{
	$news_id     = $_POST['id'];
	$tittle      = $_POST['tittle'];
	$image       = $_FILES['image']['name'];
	$description = $_POST['description'];
	$news_date   = $_POST['news_date'] ;		

	$news_from_date = date('Y-m-d', strtotime( $news_date ));

	$target_dir = "assets/img/"; 
	$target_file = $target_dir . basename($_FILES["image"]["name"]); 
	$uploadOk = 1;
	$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION); 
			// Check if image file is a actual image or fake image
	$check = getimagesize($_FILES["image"]["tmp_name"]); 
	if($check !== false) {
		echo "File is an image - " . $check["mime"] . ".";
		$uploadOk = 1;
	} else {
		echo "File is not an image.";
		$uploadOk = 0;
	}
			// Check if file already exists
			/*if (file_exists($target_file)) {
				echo "Sorry, file already exists.";
				$uploadOk = 0;
			}*/
			// Check file size
			if ($_FILES["image"]["size"] > 5242880) {
				echo "Sorry, your file is too large.";
				$uploadOk = 0;
			}
			// Allow certain file formats
			if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
				&& $imageFileType != "gif" ) {
				echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
			$uploadOk = 0;
		}
			// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
			echo "Sorry, your file was not uploaded.";
				// if everything is ok, try to upload file
		} else {
			if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
				echo "The file ". basename( $_FILES["image"]["name"]). " has been uploaded.";
			} else {
				echo "Sorry, there was an error uploading your file.";
			}
		}

		$query = "UPDATE user_news SET  tittle = '".$tittle."', image = '".$image."', news_date = '".$news_from_date."', description = '".$description."' WHERE id = '".$news_id."'";
		$result = $conn->query($query);
		$row_count =  mysqli_affected_rows($conn); 
		if($row_count > 0 )
		{
			header("location: news_view.php");
		} else{
			header("location: news_edit.php?news_id={$news_id}");
		}
	}

	/*Bill Upload*/
	else if(isset($_POST['billUploadBtn'])) 
	{

		$folder = "assets/bill/";

		move_uploaded_file($_FILES["bill_file_path"]["tmp_name"] , "$folder".$_FILES["bill_file_path"]["name"]);

		$user_name = $_POST['user_name'];
		$bill_name = $_POST['bill_name'] ;
		$bill_date   = $_POST['bill_date'] ;
		$bill_amount     = $_POST['bill_amount'] ;
		$bill_file_path   = $_FILES["bill_file_path"]["name"];
		$bill_description     = $_POST['bill_description'];

		$bill_from_date = date('Y-m-d', strtotime( $bill_date ));

		$query = "INSERT INTO user_bill (user_name, bill_name, bill_date, bill_amount, bill_file_path, bill_description) VALUES ('".$user_name."','".$bill_name."', '".$bill_from_date."', '".$bill_amount."', '".$bill_file_path."', '".$bill_description."')";
		if ($conn->query($query) === TRUE) {
			$id = mysqli_insert_id($conn);
		} else {
			echo "Error: " . $query . "<br>" . $conn->error;
		}
		$conn->close();
		header("Location: bill_view.php?id={$id}"); /* Redirect browser */
		exit();
	}

	/*Bill update*/
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

		$fileSave = '';
		//print_r($_FILES);
		if(!empty($bill_file_path))
		{
			$folder = "assets/pdf/";
			$file_size = $_FILES['bill_file_path']['size']; 
			$file_type = $_FILES['bill_file_path']['type']; 
			move_uploaded_file($_FILES["bill_file_path"]["tmp_name"] , "$folder".$_FILES["bill_file_path"]["name"]);
			$fileSave = " , bill_file_path = '".$bill_file_path."'";
		}



		
		echo $query = "UPDATE user_bill SET user_name = '".$user_name."', bill_name = '".$bill_name."', bill_date = '".$bill_from_date."', bill_amount = '".$bill_amount."',  bill_description = '".$bill_description."' $fileSave WHERE id = '".$bill_id."'"; 
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




/* employee delete */
elseif(isset($_GET['id']))
{

	$id = $_GET['id'];
	$query = "UPDATE user_employee SET status = 0 WHERE id = '$id'";

	$result = $conn->query($query);
	header("location: employee_view.php");
}

/*policy delete*/
elseif(isset($_GET['policy_id']))
{

	$policy_id = $_GET['policy_id'];
	$query = "UPDATE user_policy SET status = 0 WHERE id = '$policy_id'";

	$result = $conn->query($query);
	header("location: policy_view.php");
}

/*news delete*/
elseif(isset($_GET['news_id']))
{

	$news_id = $_GET['news_id'];
	$query = "UPDATE user_news SET status = 0 WHERE id = '$news_id'";

	$result = $conn->query($query);
	header("location: news_view.php");
}

elseif(isset($_GET['bill_id']))
{

	$bill_id = $_GET['bill_id'];
	$query = "UPDATE user_bill SET status = 0 WHERE id = '$bill_id'";

	$result = $conn->query($query);
	header("location: bill_view.php");
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