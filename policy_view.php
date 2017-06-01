<?php 
include("includes/dbConnection.php");
// /include("includes/header.php");
//include("includes/sidebar.php");
// include("upload.php");
?>


<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script type="text/javascript">
$('#supplied').live('change', function(){
     if ( $(this).val() === 'supplied' ) {
         $('.date').show();
     } else {
         $('.date').hide();
     }
 });
</script>

<form>
    <input type="checkbox" name="supplied" value="supplied" class="aboveage2" />

<ul id="date">
    <li><input id="start" name="start" size="5" type="text" class="small" value="1" /></li>
    <li><input id="end" name="end" size="5" type="text" class="small" value="2" /></li>
</ul>
</form>
