<?php 
function checkSession(){

if(!isset($_SESSION['id']) || $_SESSION['id']=="")
  {
        header("location: login.php");
  }
}

function dateFormate($date){
 return date("d-m-Y", strtotime($date));

}


?>
