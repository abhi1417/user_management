<?php 
include("includes/dbConnection.php");
include("includes/header.php");
include("includes/sidebar.php");
     
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
                        <div class="form-group">
                            <label for="tittle" class="col-sm-3 control-label">News tittle *</label>
                            <div class="col-xs-4">
                                <input type="text" id="tittle" placeholder="News Tittle" value="" name="tittle" class="form-control ">
                            </div>
                        </div>
                        <div class="form-group" >
                            <label for="image" class="col-sm-3 control-label">Image Preview*</label>
                            <div class="main-img-preview col-xs-4">
                                <img class="thumbnail img-preview" width="150" src="http://static.cio.nl/thumbnails/125x125/1/3/134bfff302873d04eec31aa5c01130d5.png" title="Preview Logo">
                            </div>                
                        </div>    
                        <div class="form-group" >
                            <label for="image" class="col-sm-3 control-label">News Image *</label>
                            <div class="col-xs-4">
                                <input type="file" id="image" name="image" value="" class="filestyle form-control attachment_upload" data-icon="false">
                            </div>  
                        </div>
                        <div class="form-group">
                            <label for="news_date" class="col-sm-3 control-label">News Date *</label>
                            <div class="col-xs-4">
                                <input type="text" class="form-control" placeholder="yyyy/mm/dd" id="datepicker1" name="news_date" id="news_date">
                            </div>
                        </div>
                        <div class="form-group ">
                            <label for="description" class="col-sm-3 control-label">Description *</label>  
                            <div class="col-xs-4" >
                                <textarea class="form-control " name="description" value="" rows="10" cols="80" minlength="5" maxlength="500" id="description"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-9 col-sm-offset-3">
                                <button type="submit" name="applyNews" id="submit" class="btn btn-primary">Apply News</button> 
                            </div>
                        </div>
                    </form> 
                </div>
            </div><!-- Col-md-6 end-->
        </div><!-- End row-->
    </div><!-- end container -->
</div><!-- End #page-right-content -->
<?php include("includes/footer.php");?>
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
