<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL); 
include("includes/dbConnection.php");
include("includes/header.php");
include("includes/sidebar.php");


   $news_id = isset($_GET['news_id']) ? $_GET['news_id'] :'';
   if (!empty($news_id)){
      $query = "SELECT * FROM user_news WHERE id = '".$news_id."'"; 
      $result = $conn->query($query);
      $rows = mysqli_fetch_array($result);
      /*echo '<pre>';
      print_r($rows);*/
      $tittle      = $rows['tittle'];  
      $image       = $rows['image'];
      $description = $rows['description'];
      $news_date   = $rows['news_date'];

    } else {
        //header("location: login.php");
    }
?>
    <!-- START PAGE CONTENT -->
    <div id="page-right-content">
        <div class="container">                                               
            <div class="row">
                <div class="col-lg-12">
                    <h4 class="header-title m-t-0">News Section</h4>
                    <!-- Pesronal Information Start -->
                    <div class="p-20 m-b-20">
                        <form name="myForm" id="myform" action="action.php" method="POST" class="form-horizontal" role="form" enctype="multipart/form-data"> 
                           <input type="hidden" name="id" value="<?php echo isset($news_id)?$news_id:''; ?>" /> 
                            <div class="form-group">
                                <label for="tittle" class="col-sm-3 control-label">News Tittle *</label>
                                <div class="col-xs-4">
                                    <input type="text" id="tittle" placeholder="News Tittle" value="<?php  echo isset($tittle)?$tittle:''; ?>" name="tittle" class="form-control ">
                                </div>
                            </div>
                            <div class="form-group" >
                                <label for="image" class="col-sm-3 control-label">Image Preview*</label>
                                <div class="main-img-preview col-xs-4">
                                    <img class="thumbnail img-preview" width="150" src="<?php echo 'assets/img/'.$rows['image']; ?>" title="Preview Logo">
                                </div>                
                            </div> 
                            <div class="form-group dvPdf_box" >
                                <label for="image" class="col-sm-3 control-label">News Image *</label>
                                <div class="col-xs-4">
                                    <input type="file" id="image" name="image" value="" class="filestyle form-control" data-icon="false">
                                    <span><?php echo $image; ?></span>
                                </div>  
                            </div>
                            <div class="form-group">
                                <label for="news_date" class="col-sm-3 control-label">News Date *</label>
                                <div class="col-xs-4">
                                    <input type="text" class="form-control" placeholder="yyyy/mm/dd" id="datepicker1" name="news_date" id="news_date" value="<?php echo isset($news_date)?$news_date:''; ?>">
                                </div>
                            </div>
                            <div class="form-group ">
                                <label for="description" class="col-sm-3 control-label">Description *</label>  
                                <div class="col-xs-4 dvContent" >
                                    <textarea class="form-control " name="description" rows="10" cols="80" minlength="5" maxlength="500" id="description"><?php echo $description; ?></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-9 col-sm-offset-3">
                                    <button type="submit" name="updateNews" id="submit" class="btn btn-primary">Update</button> 
                                </div>
                            </div>
                        </form> 
                    </div>
                </div><!-- Col-md-6 end-->
            </div><!-- End row-->
        </div><!-- end container -->
    </div><!-- End #page-right-content --> 

<?php include("includes/footer.php"); ?>
<script>
$('#datepicker1').datepicker({
    orientation: 'auto bottom'
});
$("#datepicker1").datepicker().datepicker("setDate", new Date());

$(document).ready(function() {
    var brand = document.getElementById('image');
    brand.className = 'attachment_upload';
    brand.onchange = function() {
        document.getElementById('fakeUploadLogo').value = this.value.substring(12);
    };

    // Source: http://stackoverflow.com/a/4459419/6396981
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function(e) {
                $('.img-preview').attr('src', e.target.result);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#image").change(function() {
        readURL(this);
    });
});
</script>