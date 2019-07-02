<?php
ob_start();
if (session_status() == PHP_SESSION_NONE) {session_start();}

include '../classes/Company.php';
$__company = new Company();


$id = $__company->Check_If_Exists($_SESSION['excise_user_id']);
$__company->LoadValue($id);

?>
<div class="wrapper"> <h4 class="m-t-none text-capitalize text-success">Update Your Company Details 
        <button type="button" class="btn btn-danger btn-rounded btn-xs pull-right" data-dismiss="modal">x</button>
        <span  class="pull-right text-danger" id="MassageLabel"></span></h4> 
    <form action=""  method="post" id="fCompany" role="form">
        <div class="row">
            
            
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="form-group"> <label>Company Type</label> 
                <select name="COMPANY_TYPE" id="role" class="form-control" <?php echo $__company->getStatus() == 5 ? "disabled" : "";?>>
                    <?php if(strlen($__company->getCompany_type()) > 0){ ?>
                    <option class="form-control" value='<?php echo $__company->getCompany_type();?>'><?php echo $__company->GenCompanyType($__company->getCompany_type());?></option>
                    <?php } ?>
                        <option class="form-control" value='MNF'>MENUFECTORY</option>
                        <option class="form-control" value='DIS'>DISTILLERY</option>
                        <option class="form-control" value='WHS'>WAREHOUSE</option>
                        <option class="form-control" value='RTL'>RETAILERS</option>
                    </select>
                </div>
        </div>

            
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="form-group"> <label>Company Name</label>
                <input type="text" name="COMPANY_NAME" value="<?php echo $__company->getCompany_name();?>" id="COMPANY_NAME" placeholder="Company Name" class="input-sm form-control" required>
                <input type="hidden" name="ROLE" value="U" id="ROLE">
            </div>
        </div>
            
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="form-group"> <label>Email</label>
                <input type="text" name="EMAIL" value="<?php echo $__company->getEmail();?>" id="EMAIL" placeholder="Email" class="input-sm form-control" required>
                </div>
        </div>
            
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="form-group"> <label>Phone No</label>
                <input type="text" name="PHONE_NO" value="<?php echo $__company->getPhone_no();?>" id="PHONE_NO" placeholder="Phone No" class="input-sm form-control" required>
                </div>
        </div>

            
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="form-group"> <label>Address</label>
                <input type="text" name="ADDRESS" value="<?php echo $__company->getAddress();?>" id="ADDRESS" placeholder="Address" class="input-sm form-control" required>
                </div>
        </div>
            
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
            <div class="form-group"> <label>City</label>
                <input type="text" name="CITY" value="<?php echo $__company->getCity();?>" id="CITY" placeholder="City" class="input-sm form-control" required>
                </div>
        </div>
            

        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
            <div class="form-group"> <label>State</label>
                <input type="text" name="STATE" value="<?php echo $__company->getState();?>" id="STATE" placeholder="State" class="input-sm form-control" required>
                </div>
        </div>
            
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
            <div class="form-group"> <label>District</label>
                <input type="text" name="DISTRICT" value="<?php echo $__company->getDistrict();?>" id="DISTRICT" placeholder="District" class="input-sm form-control" required>
                </div>
        </div>
            

        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
            <div class="form-group"> <label>Sub Division</label>
                <input type="text" name="SUB_DIVISION" value="<?php echo $__company->getSub_division();?>" id="SUB_DIVISION" placeholder="Sub Division" class="input-sm form-control" required>
                </div>
        </div>
            
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
            <div class="form-group"> <label>Zip Code</label>
                <input type="text" name="ZIP" value="<?php echo $__company->getZip();?>" id="ZIP" placeholder="Zip Code" class="input-sm form-control" required>
                </div>
        </div>
            
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <input type="button" id="BtnUpdateCompany" value="Update" class="btn btn-primary">

        </div>
        
        </div>
            
                </form> </div>