<?php
ob_start();
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

include '../classes/Company.php';
$__company = new Company();


$id = $__company->Check_If_Exists($_SESSION['excise_user_id']);
$__company->LoadValue($id);
?>
<div class="wrapper"> <h4 class="m-t-none text-capitalize text-success">Update Tax Details <button type="button" class="btn btn-danger btn-rounded btn-xs pull-right" data-dismiss="modal">x</button>

        <span  class="pull-right" id="MassageLabel"></span></h4> 
    <form action=""  method="post" id="fCompany" role="form">
        <div class="row">


            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <div class="form-group"> <label>GSTN</label>
                    <input type="text" name="GSTN" value="<?php echo $__company->getGstn(); ?>" id="GSTN" placeholder="GSTN" class="input-sm form-control" required>
                </div>
            </div>

            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <div class="form-group"> <label>PAN/IT NO</label>
                    <input type="text" name="PAN_OR_IT_NO" value="<?php echo $__company->getPan_or_it_no(); ?>" id="PAN_OR_IT_NO" placeholder="PAN/IT NO" class="input-sm form-control" required>
                </div>
            </div>

            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <div class="form-group"> <label>Sale Tax No</label>
                    <input type="text" name="SALES_TAX_NO" value="<?php echo $__company->getSales_tax_no(); ?>" id="SALES_TAX_NO" placeholder="Sale Tax No" class="input-sm form-control" required>
                </div>
            </div>


            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <div class="form-group"> <label>CST No</label>
                    <input type="text" name="CST_NO" value="<?php echo $__company->getCst_no(); ?>" id="CST_NO" placeholder="CST No" class="input-sm form-control" required>
                </div>
            </div>

            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <input type="button" id="BtnUpdateTax" value="Update" class="btn btn-primary">

            </div>

        </div>



</div>
</form> </div>