<?php
include '../classes/Brand__Master.php';
$_Brand__Master = new Brand__Master();
include '../classes/Ena__Item__List.php';
$_Ena_Item_List = new Ena__Item__List();
include '../classes/Category.php';
$_Category = new Category();

$id = filter_input(INPUT_GET, 'i');

//$view = $_Brand__Master->loadAllPaggingByParentId(0, 0, 20);

$_Ena_Item_List->LoadValue($id);


$viewGroup = $_Category->loadAllPaggingByType("GROUP", 0, 20);
$viewCategory = $_Category->loadAllPaggingByType("CATEGORY", 0, 20);        
$viewType = $_Category->loadAllPaggingByType("TYPE", 0, 20);        
?>

<div class="row wrapper" id="">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    <h4 class="m-t-none">Add New Brand
                <button type="button" class="btn btn-danger btn-rounded btn-xs pull-right" data-dismiss="modal">x</button>

        <span id=""></span></h4> 
                </div>
    <form action=""  method="post" id="EnaBrand" role="form">
        <input type="hidden" name="ID" id="id" value="<?php echo $id == NULL ? 0 : $id;?>">
        
                <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="NAME" value="<?php echo $_Ena_Item_List->getItem_name();?>" id="NAME" placeholder="NAME" class="input-sm form-control" required>
                </div>
                </div>
        
                <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                <div class="form-group">
                    <label>Strength</label>
                    <input type="text" name="STRANGTH" value="<?php echo $_Ena_Item_List->getStrangth();?>" id="STRANGTH" placeholder="Strength" class="input-sm form-control" required>
                </div>
                </div>
        
                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                <div class="form-group">
                    <label>LPL Per Bl</label>
                    <input type="text" name="LPL_PER_BL" value="<?php echo $_Ena_Item_List->getLpl_per_bl();?>" id="LPL_PER_BL" placeholder="NAME" class="input-sm form-control" required>
                </div>
                </div>
        
                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                <div class="form-group"> <label>Select Group</label> 
                    <select name="GROUP_ID" id="GROUP_ID" class="form-control input-sm">
                        <?php foreach($viewGroup as $rows) { ?>
                        <option value='<?php echo $rows['ID'];?>'><?php echo $rows['NAME'];?></option>
                        <?php } ?>
                    </select>
                </div>
                </div>
        
                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                <div class="form-group"> <label>Select Category</label> 
                    <select name="CATEGORY_ID" id="CATEGORY_ID" class="form-control input-sm">
                        <?php foreach($viewCategory as $rows) { ?>
                        <option value='<?php echo $rows['ID'];?>'><?php echo $rows['NAME'];?></option>
                        <?php } ?>
                    </select>
                </div>
                </div>
        
                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                <div class="form-group"> <label>Select Type</label> 
                    <select name="TYPE_ID" id="TYPE_ID" class="form-control input-sm">
                        <?php foreach($viewType as $rows) { ?>
                        <option value='<?php echo $rows['ID'];?>'><?php echo $rows['NAME'];?></option>
                        <?php } ?>
                    </select>
                </div>
                </div>
        
       
                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                <div class="form-group"> <label>Fee Require</label> 
                    <select name="FEE_REQUIRE" id="FEE_REQUIRE" class="form-control input-sm">
                        <option class="form-control" value='YES'>YES</option>
                        <option class="form-control" value='NO'>NO</option>
                    </select>
                </div>
                </div>
       
                
        
        
                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                <div class="form-group">
                    <label>Transport Fee Per Bl</label>
                    <input type="text" name="T_FEE" value="<?php echo $_Ena_Item_List->getT_fee();?>" id="T_FEE" placeholder="T_FEE" class="input-sm form-control" required>
                </div>
                </div>
        
                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                <div class="form-group">
                    <label>Import Fee Per Bl</label>
                    <input type="text" name="I_FEE" value="<?php echo $_Ena_Item_List->getI_fee();?>" id="I_FEE" placeholder="I_FEE" class="input-sm form-control" required>
                </div>
                </div>
        
                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                <div class="form-group">
                    <label>Export Fee Per Bl</label>
                    <input type="text" name="E_FEE" value="<?php echo $_Ena_Item_List->getE_fee();?>" id="E_FEE" placeholder="E_FEE" class="input-sm form-control" required>
                </div>
                </div>
        
                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                <div class="form-group"> 
                    <label>Item Status</label> 
                    <select name="STATUS" id="role" class="form-control">
                        <option class="form-control" value='Active'>Active</option>
                        <option class="form-control" value='Discontinued'>Discontinued</option>
                    </select>
                </div>
                </div>

        <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
        <div class="form-group">
            <input type="button" id="adduser" value="Add New" class="btn btn-primary">
        </div> 
         
        </div> 
        <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
        <div class="form-group">
            <label id="ENaMassageLabel"></label>
        </div> 
         
        </div> 
                </form> </div>











