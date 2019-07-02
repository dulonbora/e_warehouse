<?php
include '../classes/Brand__Packing.php';
$brandP = new Brand__Packing(); 

$i = filter_input(INPUT_GET, 'id');
$id = filter_input(INPUT_GET, 'i');

$brandP->LoadValue($i);

?>

<div class="row wrapper">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    <h4 class="m-t-none">Add New Brand
        
                <button type="button" class="btn btn-danger btn-rounded btn-xs pull-right" data-dismiss="modal">x</button>

        <span id="MassageLabel"></span></h4> 
                </div>
    <form action=""  method="post" id="Brand_Packing" role="form">
        
        <input type="hidden" name="MASTER_ID" id="MASTER_ID" value="<?php echo $id == NULL ? $i : $id;?>">
        <input type="hidden" name="ID" id="ID" value="<?php echo $i == NULL ? 0 : $i;?>">

        <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
                <div class="form-group">
                    <label>ML Per Bottle</label>
                    <input type="text" name="ML_PER_CASE" value="<?php echo $brandP->getMl_per_case();?>" id="ML_PER_CASE" placeholder="ML Per Bottle" class="input-sm form-control" required>
                </div>
                </div>
        
                <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
                <div class="form-group">
                    <label>Bottle Per Case</label>
                    <input type="text" name="BOTTLES_PER_CASE" value="<?php echo $brandP->getBottles_per_case
                            ();?>" id="BOTTLES_PER_CASE" placeholder="Bottle Per Case" class="input-sm form-control" required>
                </div>
                </div>
        
        
        
                <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
                <div class="form-group">
                    <label>MRP /BTL</label>
                    <input type="text" name="MRP_PER_BOTTLE" value="<?php echo $brandP->getMrp_per_bottle();?>" id="MRP_PER_BOTTLE" placeholder="MRP Per Bottle" class="input-sm form-control" required>
                </div>
                </div>
        
                <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
                <div class="form-group">
                    <label>MRP /CS</label>
                    <input type="text" name="MRP" value="<?php echo $brandP->getMrp();?>" id="MRP" placeholder="MRP Per Case" class="input-sm form-control" required>
                </div>
                </div>
                
        
                
                <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
                <div class="form-group">
                    <label>BL /CS</label>
                    <input type="text" name="BL_PER_CASE" value="<?php echo $brandP->getBl_per_case();?>" id="BL_PER_CASE" placeholder="BL Per Case" class="input-sm form-control" required>
                </div>
                </div>
        
                <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
                <div class="form-group">
                    <label>LPL /CS</label>
                    <input type="text" name="LPL_PER_CASE" value="<?php echo $brandP->getLpl_per_case();?>" id="LPL_PER_CASE" placeholder="LPL Per Case" class="input-sm form-control" required>
                </div>
                </div>
        
                <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
                <div class="form-group">
                    <label>LPL /BTL</label>
                    <input type="text" name="LPL_PER_BOTTLE" value="<?php echo $brandP->getLpl_per_bottle();?>" id="LPL_PER_BOTTLE" placeholder="LPL Per Bottle" class="input-sm form-control" required>
                </div>
                </div>
        
                
                
                
                <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
                <div class="form-group">
                    <label>Adv Amount /CS</label>
                    <input type="text" name="AVD_AMOUNT" value="<?php echo $brandP->getAvd_amount();?>" id="AVD_AMOUNT" placeholder="Adv Amount Per Case" class="input-sm form-control" required>
                </div>
                </div>
        
                
                <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
                <div class="form-group">
                    <label>Adv Amount /BTL</label>
                    <input type="text" name="AVD_AMOUNT_PER_BOTTLE" value="<?php echo $brandP->getAvd_amount_per_bottle();?>" id="AVD_AMOUNT_PER_BOTTLE" placeholder="Adv Amount Per Bottle" class="input-sm form-control" required>
                </div>
                </div>
        
                
                <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
                <div class="form-group">
                    <label>T Fee /CS</label>
                    <input type="text" name="TFF_AMOUNT" value="<?php echo $brandP->getTff_amount();?>" id="TFF_AMOUNT" placeholder="T Fee Per Case" class="input-sm form-control" required>
                </div>
                </div>
        
                
                <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
                <div class="form-group">
                    <label>T Fee /BTL</label>
                    <input type="text" name="TFF_PER_BOTTLE" value="<?php echo $brandP->getTff_per_bottle();?>" id="TFF_PER_BOTTLE" placeholder="T Fee Per Bottle" class="input-sm form-control" required>
                </div>
                </div>
                
                <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
                <div class="form-group">
                    <label>I Fee /BTL</label>
                    <input type="text" name="IMPORT_FEE" value="<?php echo $brandP->getImport_fee();?>" id="IMPORT_FEE" placeholder="I Fee Per Case" class="input-sm form-control" required>
                </div>
                </div>
        
                
                <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
                <div class="form-group">
                    <label>E Fee Per Bottle</label>
                    <input type="text" name="EXPORT_FEE" value="<?php echo $brandP->getExport_fee();?>" id="EXPORT_FEE" placeholder="E Fee Per Case" class="input-sm form-control" required>
                </div>
                </div>
        
                
                <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
                <div class="form-group">
                    <label>Vat Amount /CS (Rs)</label>
                    <input type="text" name="VAT" value="<?php echo $brandP->getVat();?>" id="VAT" placeholder="Vat Amount Per Case" class="input-sm form-control" required>
                </div>
                </div>
        
                
                
                <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
                <div class="form-group">
                    <label>Vat Amount Per Bottle (Rs)</label>
                    <input type="text" name="VAT_PER_BOTTLE" value="<?php echo $brandP->getVat_per_bottle();?>" id="VAT_PER_BOTTLE" placeholder="Vat Amount Per Bottle" class="input-sm form-control" required>
                </div>
                </div>
        
                 <!----    
                
                
                <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
                <div class="form-group">
                    <label>Landed To Wholesale /CS (Rs)</label>
                    <input type="text" name="LANDED_TO_WHOLESALE" value="<?php echo $brandP->getLanded_to_wholesale();?>" id="LANDED_TO_WHOLESALE" placeholder="Landed To Wholesale Per Case" class="input-sm form-control" required>
                </div>
                </div>
        
   
                
                <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
                <div class="form-group">
                    <label>Wholesale Margin Percentage(%)</label>
                    <input type="text" name="WHOLESALE_MARGIN_PERCENTAGE" value="<?php echo $brandP->getWholesale_margin_percentage();?>" id="WHOLESALE_MARGIN_PERCENTAGE" placeholder="Wholesale Margin Percentage(%)" class="input-sm form-control" required>
                </div>
                </div>
        
                
                <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
                <div class="form-group">
                    <label>Wholesale Margin Amount /CS (Rs)</label>
                    <input type="text" name="WHOLESALE_MARGIN_CASE" value="<?php echo $brandP->getWholesale_margin_case();?>" id="WHOLESALE_MARGIN_CASE" placeholder="Wholesale Margin Amount Per Case" class="input-sm form-control" required>
                </div>
                </div>
                
                <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
                <div class="form-group">
                    <label>Wholesale Margin Amount /BTL (Rs)</label>
                    <input type="text" name="WHOLESALE_MARGIN_BOTTLE" value="<?php echo $brandP->getWholesale_margin_bottle();?>" id="WHOLESALE_MARGIN_BOTTLE" placeholder="Wholesale Margin Amount Per Bottle" class="input-sm form-control" required>
                </div>
                </div>
        
                <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
                <div class="form-group">
                    <label>Landed To Retail /CS (Rs)</label>
                    <input type="text" name="LANDED_TO_RETAIL" value="<?php echo $brandP->getLanded_to_retail();?>" id="LANDED_TO_RETAIL" placeholder="Landed To Retail Per Case" class="input-sm form-control" required>
                </div>
                </div>
        
                
                <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
                <div class="form-group">
                    <label>Retail Margin Percentage(%)</label>
                    <input type="text" name="RETAIL_MARGIN_PERCENTAGE" value="<?php echo $brandP->getRetail_margin_percentage();?>" id="RETAIL_MARGIN_PERCENTAGE" placeholder="Retail Margin Percentage(%)" class="input-sm form-control" required>
                </div>
                </div>
        
                
                <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
                <div class="form-group">
                    <label>Retail Margin /CS (Rs)</label>
                    <input type="text" name="RETAIL_MARGIN_CASE" value="<?php echo $brandP->getRetail_margin_case();?>" id="RETAIL_MARGIN_CASE" placeholder="Retail Margin Per Case" class="input-sm form-control" required>
                </div>
                </div>
                
                
                <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
                <div class="form-group">
                    <label>Retail Margin /BTL (Rs)</label>
                    <input type="text" name="RETAIL_MARGIN_BOTTLE" value="<?php echo $brandP->getRetail_margin_bottle();?>" id="RETAIL_MARGIN_CASE" placeholder="Retail Margin Per Bottle" class="input-sm form-control" required>
                </div>
                </div>
        
        <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
                <div class="form-group">
                    <label>Cost Price /CS (W)</label>
                    <input type="text" name="W_COST_PRICE" value="<?php echo $brandP->getW_cost_price();?>" id="W_COST_PRICE" placeholder="Wholesale Cost Price Per Case" class="input-sm form-control" required>
                </div>
                </div>
        
                
                <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
                <div class="form-group">
                    <label>Cost Price ?BTL (W)</label>
                    <input type="text" name="W_COST_PRICE_PER_BOTTLE" value="<?php echo $brandP->getW_cost_price_per_bottle();?>" id="W_COST_PRICE_PER_BOTTLE" placeholder="Wholesale Cost Price Per Bottle" class="input-sm form-control" required>
                </div>
                </div>
                
                <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
                <div class="form-group">
                    <label>Cost Price /CS (R)</label>
                    <input type="text" name="R_COST_PRICE" value="<?php echo $brandP->getR_cost_price();?>" id="R_COST_PRICE" placeholder="Retail Cost Price Per Case" class="input-sm form-control" required>
                </div>
                </div>
        
                
                <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
                <div class="form-group">
                    <label>Cost Price /BTL (R)</label>
                    <input type="text" name="R_COST_PRICE_PER_BOTTLE" value="<?php echo $brandP->getR_cost_price_per_bottle();?>" id="R_COST_PRICE_PER_BOTTLE" placeholder="Retail Cost Price Per Bottle" class="input-sm form-control" required>
                </div>
                </div>
                
             
        
                --->
                
                
                <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
                <div class="form-group">
                    <label>Minimum Adv</label>
                    <input type="text" name="MINIMUM_ADV" value="<?php echo $brandP->getMinimum_adv();?>" id="MINIMUM_ADV" placeholder="Minimum Adv" class="input-sm form-control" required>
                </div>
                </div>
                
                <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
                <div class="form-group">
                    <label>Excise Duty</label>
                    <input type="text" name="EXCISE_DUTY" value="<?php echo $brandP->getExcise_duty();?>" id="EXCISE_DUTY" placeholder="Excise Duty" class="input-sm form-control" required>
                </div>
                </div>
        
                
                <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
                <div class="form-group">
                    <label>Gallonage Fee /CS</label>
                    <input type="text" name="GALLONAGE_FEE" value="<?php echo $brandP->getGallonage_fee();?>" id="GALLONAGE_FEE" placeholder="Gallonage Fee Per Case" class="input-sm form-control" required>
                </div>
                </div>
        
        
        
        
                <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                <div class="form-group"> <label>Bottle Type</label> 
                    <select name="BOOTLE_TYPE" id="role" class="form-control">
                        <option class="form-control" value='GROUP'>GLASS</option>
                        <option class="form-control" value='GROUP'>CAN</option>
                        <option class="form-control" value='GROUP'>PET</option>
                    </select>
                </div>
                </div>
        
                <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                <div class="form-group"> <label>Is Mono Cartoon</label> 
                    <select name="IS_MONO_CARTOON" id="role" class="form-control">
                        <option class="form-control" value='YES'>YES</option>
                        <option class="form-control" value='NO'>NO</option>
                    </select>
                </div>
                </div>
                
        
                <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                <div class="form-group"> <label>Item Status</label> 
                    <select name="STATUS" id="role" class="form-control">
                        <option class="form-control" value='GROUP'>Active</option>
                        <option class="form-control" value='GROUP'>Discountued</option>
                    </select>
                </div>
                </div>



        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"> 
        <div class="form-group">
            <span class="text-danger" id="MassageLabelPacking"></span> <input type="button" id="AddPacking" value="Add New" class="btn btn-primary pull-right">
        </div> 
        </div> 
                </form> </div>





