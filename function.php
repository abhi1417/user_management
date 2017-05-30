<?php 
function checkSession(){

if(!isset($_SESSION['id']) || $_SESSION['id']=="")
  {
        header("location: login.php");
  }
}
?>
