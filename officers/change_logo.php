<?php
ob_start();
if (session_status() == PHP_SESSION_NONE) {session_start();}

include '../classes/Company.php';
$__company = new Company();


$id = $__company->Check_If_Exists($_SESSION['excise_user_id']);
$__company->LoadValue($id);

?>
<div class="wrapper"> <h4 class="m-t-none text-capitalize text-success">Update Company Logo <button type="button" class="btn btn-danger btn-rounded btn-xs pull-right" data-dismiss="modal">x</button>

        <span  class="pull-right" id="MassageLabel"></span></h4> 
        
<div id="imageview" class="text-center">
    <img class="text-center img-circle" src="../images/<?php echo $__company->getCompany_logo();?>" width="200" height="200"/>
</div>
    <form action="../home_request/update_logo.php" method="POST" name="form2" id="uploadForm" enctype="multipart/form-data" role="form" > 
        <input type="text" name="ID" value="" class="form-control hidden">
    <div class="form-group">
        <label for="IMAGE_LINK">Select Image from your computer</label>
        <input type="file" id="file" name="IMAGE_LINK" value="" class="btn btn-info btn-block">
    </div>
    
    <div class="form-group">
    <input name="SUBMIT" type="submit" class="btn btn-success" value="Upload Image">
    </div>
</form>
    </div>



        <script>
function filePreview(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#uploadForm + img').remove();
            $('#imageview').html('<img class="text-center" src="'+e.target.result+'" width="300" height="200"/>');
            //$('#uploadForm + embed').remove();
            //$('#uploadForm').after('<embed src="'+e.target.result+'" width="450" height="300">');
        }
        reader.readAsDataURL(input.files[0]);
    }
}

$("#file").change(function () {
    filePreview(this);
});
</script>