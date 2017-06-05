<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$conn = mysqli_connect("localhost","root","root","user_management");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
	?>



<!-- 	if(isset($_POST['updateBtn']))
		{

			$target_dir = "pdf/";
			$target_file = $target_dir . basename($_FILES["file_path"]["name"]);
			$uploadOk = 1;
			$pdfFileType = pathinfo($target_file,PATHINFO_EXTENSION);
			
			$check = getimagesize($_FILES["file_path"]["tmp_name"]);
			if($check !== false) {
				echo "File is an pdf - " . $check["mime"] . ".";
				$uploadOk = 1;
			    } else {
			    	echo "File is not an pdf.";
			    	$uploadOk = 0;
			    }
			}
			// Check if file already exists
			if (file_exists($target_file)) {
			    echo "Sorry, file already exists.";
			    $uploadOk = 0;
			}
			// Check file size
			if ($_FILES["file_path"]["size"] > 500000) {
				echo "Sorry, your file is too large.";
				$uploadOk = 0;
			}
			// Allow certain file formats
			if($pdfFileType != "pdf" ) {
				echo "Sorry, only PDF files are allowed.";
				$uploadOk = 0;
			}
			// Check if $uploadOk is set to 0 by an error
			if ($uploadOk == 0) {
				echo "Sorry, your file was not uploaded.";
			// if everything is ok, try to upload file
			} else {
				if (move_uploaded_file($_FILES["file_path"]["tmp_name"], $target_file)) {
					echo "The file ". basename( $_FILES["file_path"]["name"]). " has been uploaded.";
				} else {
			        echo "Sorry, there was an error uploading your file.";
			    }
			} -->