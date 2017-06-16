<?php 
function checkSession(){

if(!isset($_SESSION['email']) || $_SESSION['email']=="")
  {
        header("location: login.php");
  }
}

function dateFormate($date){
 return date("d-m-Y", strtotime($date));

}


?>
