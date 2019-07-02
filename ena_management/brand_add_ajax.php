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
?>

<div class="row wrapper" id="">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <h4 class="m-t-none">Add Your Opening Stock
        <button type="button" class="btn btn-danger btn-rounded btn-xs pull-right" data-dismiss="modal">x</button>
            <span class="pull-right text-danger" id="MassageLabel1"></span></h4> 
        <h4 class="m-t-none"><span class="Add Your Opening Stock text-danger">Once You Add Your Opening Stock, It never Be Change</span></h4> 
    </div>
    <form action=""  method="post" id="EnaBrand" role="form">
        <input type="hidden" name="ITEM_ID" id="id" value="<?php echo $id == NULL ? 0 : $id; ?>">


        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="form-group">
                <label>Opening Stock (bl)</label>
                <input type="text" name="OPENING_STOCK" value="" id="OPENING_STOCK" placeholder="Opening Stock (bl)" class="input-sm form-control" required>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
            <div class="form-group">
                <label>MRP</label>
                <input type="text" name="MRP" value="" id="MRP" placeholder="Mrp Per BL" class="input-sm form-control" required>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
            <div class="form-group">
                <label>Tax Percentage</label>
                <input type="text" name="TAX_PERCENTAGE" value="" id="TAX_PERCENTAGE" placeholder="Tax Percentage" class="input-sm form-control" required>
            </div>
        </div>




        <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
            <div class="form-group">
                <input type="button" id="addOpeningSTock" value="Add Item To My List" class="btn btn-primary">
            </div> 

        </div> 
        <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
            <div class="form-group">
                <label id="MassageLabel1"></label>
            </div> 

        </div> 
    </form> </div>











