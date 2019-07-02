<?php include '../classes/Brand__Master.php';
$_Brand__Master = new Brand__Master();
include '../classes/Category.php';
$_Category = new Category();

$id = filter_input(INPUT_GET, 'i');

//$view = $_Brand__Master->loadAllPaggingByParentId(0, 0, 20);

$_Brand__Master->LoadValue($id);


$viewGroup = $_Category->loadAllPaggingByType("GROUP", 0, 20);
$viewCategory = $_Category->loadAllPaggingByType("CATEGORY", 0, 20);        
$viewType = $_Category->loadAllPaggingByType("TYPE", 0, 20);        
?>

<div class="row wrapper">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <h4 class="m-t-none">Add New Brand
                                <button type="button" class="btn btn-danger btn-rounded btn-xs pull-right" data-dismiss="modal">x</button>
                        <span class="pull-right text-danger" id="MassageLabel"></span></h4> 
                </div>
    <form action=""  method="post" id="fBrand" role="form">
        <input type="hidden" name="ID" id="id" value="<?php echo $id == NULL ? 0 : $id;?>">
        
                <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="NAME" value="<?php echo $_Brand__Master->getName();?>" id="NAME" placeholder="NAME" class="input-sm form-control" required>
                </div>
                </div>
        
                <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                <div class="form-group">
                    <label>Strangth</label>
                    <input type="text" name="STRANGTH" value="<?php echo $_Brand__Master->getStrangth();?>" id="STRANGTH" placeholder="NAME" class="input-sm form-control" required>
                </div>
                </div>
        
                <div class="col-xs-12 col-sm-12 col-md-3 col-lg-4">
                <div class="form-group"> <label>Select Group</label> 
                    <select name="GROUP_ID" id="role" class="form-control">
                        <?php foreach($viewGroup as $rows) { ?>
                        <option value='<?php echo $rows['ID'];?>'><?php echo $rows['NAME'];?></option>
                        <?php } ?>
                    </select>
                </div>
                </div>
        
                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                <div class="form-group"> <label>Select Category</label> 
                    <select name="CATEGORY_ID" id="role" class="form-control">
                        <?php foreach($viewCategory as $rows) { ?>
                        <option value='<?php echo $rows['ID'];?>'><?php echo $rows['NAME'];?></option>
                        <?php } ?>
                    </select>
                </div>
                </div>
        
                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                <div class="form-group"> <label>Select Type</label> 
                    <select name="TYPE_ID" id="role" class="form-control">
                        <?php foreach($viewType as $rows) { ?>
                        <option value='<?php echo $rows['ID'];?>'><?php echo $rows['NAME'];?></option>
                        <?php } ?>
                    </select>
                </div>
                </div>
        
       
                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                <div class="form-group"> <label>Imported</label> 
                    <select name="IS_IMPORTED" id="role" class="form-control">
                        <option class="form-control" value='YES'>YES</option>
                        <option class="form-control" value='NO'>NO</option>
                    </select>
                </div>
                </div>
       
                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                <div class="form-group"> <label>From New Stock</label> 
                    <select name="IS_NEW" id="role" class="form-control">
                        <option class="form-control" value='YES'>YES</option>
                        <option class="form-control" value='NO'>NO</option>
                    </select>
                </div>
                </div>
       
                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                <div class="form-group"> <label>Item Available For</label> 
                    <select name="ITEM_FOR" id="role" class="form-control">
                        <option class="form-control" value='GROUP'>CSD</option>
                        <option class="form-control" value='GROUP'>CIVIL</option>
                        <option class="form-control" value='GROUP'>MILITRY</option>
                    </select>
                </div>
                </div>
        
        
        <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
                <div class="form-group">
                    <label>Description</label>
                    <input type="text" name="DESCRIPTION" value="<?php echo $_Brand__Master->getDescription();?>" id="DESCRIPTION" placeholder="NAME" class="input-sm form-control" required>
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

        <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
        <div class="form-group">
            <input type="button" id="adduser" value="Add New" class="btn btn-primary btn-block">
        </div> 
        </div> 
                </form> </div>











