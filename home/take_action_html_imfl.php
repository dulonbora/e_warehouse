<?php
ob_start();
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

include '../classes/Company.php';
$__company = new Company();

$_id = filter_input(INPUT_GET, "i");

$id = $__company->Check_If_Exists($_SESSION['excise_user_id']);
$__company->LoadValue($id);



?>
<div class="wrapper"> 
    <h4 class="m-t-none text-capitalize text-success">
        Submit Details 
        <button type="button" class="btn btn-danger btn-rounded btn-xs pull-right" data-dismiss="modal">x</button>
        

        <span  class="pull-right" id="MassageLabel"></span></h4> 
    <form action=""  method="post" id="fCompany" role="form">
        <div class="row">

            

            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <div class="form-group"> <label>Action Type</label> 
                    <select name="ACTION" id="ACTION" class="form-control">
                        <option class="form-control" value='5'>Approve</option>
                        <option class="form-control" value='2'>Forward Designation</option>
                        <option class="form-control" value='3'>Forward Officers</option>
                        <option class="form-control" value='4'>Reject</option>
                    </select>
                </div>
            </div>

            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <div class="form-group"> <label>Forward To Designation</label> 
                    <select name="DESIGNATION" id="DESIGNATION" class="form-control" disabled>
                        <option class="form-control" value='NA'>Select Designation</option>
                        <option class="form-control" value='CE'>CE</option>
                    </select>
                </div>
            </div>

            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="form-group"> <label>Officers Name</label> 
                    <input type="text" name="OFFICERS_NAME" id="OFFICERS_NAME" value="" id="GSTN" placeholder="Officers Name" class="input-sm form-control" required disabled>
                    <input type="hidden" name="MODULE_TYPE" value="IMFL">
                    <input type="hidden" name="MODULE_IDS" value="<?php echo $_id;?>">
                    <input type="hidden" name="TO_USER_ID" value="0">
                    <input type="hidden" name="MASSAGE_TYPE" value="O">
                </div>
            </div>
            
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                
            </div>

            


            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="form-group"> <label>NOTE</label>
                    <input type="text" name="NOTE" id="NOTE" value="" id="GSTN" placeholder="Note" class="input-sm form-control" required>
                </div>
            </div>

            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <input type="button" id="AddMassage" value="Update" class="btn btn-primary">

            </div>

        </div>



</div>
</form> </div>