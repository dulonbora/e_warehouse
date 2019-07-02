<?php
include '../classes/Brand__List__User_View.php';
include '../classes/Stock_Fectory.php';
$Brand__List__User_View = new Brand__List__User_View();
$Stock_Fectory = new Stock_Fectory();

$id = filter_input(INPUT_GET, 'i');
$Brand__List__User_View->LoadValue($id);
?>

<div class="row wrapper" id="">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <h4 class="m-t-none">Manage Stock
        <button type="button" class="btn btn-danger btn-rounded btn-xs pull-right" data-dismiss="modal">x</button>
            <span class="pull-right text-danger">Current Stock : <?php echo $Stock_Fectory->getStockInString($Brand__List__User_View->getBottles_per_case(), $Brand__List__User_View->getCloseing_stock(), "C/S", "BTL"); ?></span></h4> 
        <h4 class="m-t-none"><span class="Add Your Opening Stock text-danger">Item Name : <?php echo $Brand__List__User_View->getName(); ?></span></h4>
<?php if ($Brand__List__User_View->getUser_item_status() == 5) { ?>
            <h4 class="m-t-none"><span class="Add Your Opening Stock text-danger">Once You Add Your Stock, It never Be Change</span></h4> 
        <?php } else {
            ?>
            <h4 class="m-t-none"><span class="Add Your Opening Stock text-danger">Your Item Is not verified by excise office</span></h4> 
        <?php }
        ?>
    </div>
        <?php if ($Brand__List__User_View->getUser_item_status() == 5) { ?>
        <form action=""  method="post" id="BrandListForm" role="form">
            <input type="hidden" name="USER_ITEM_ID" id="USER_ITEM_ID" value="<?php echo $id == NULL ? 0 : $id; ?>">

            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="form-group"> <label>Transfar Mode</label> 
                    <select name="IO_TYPE" id="role" class="form-control">
                        <option class="form-control" value=''>Select Mode</option>
                        <option class="form-control" value='L'>Lose</option>
                        <option class="form-control" value='I'>Inward</option>
                        <option class="form-control" value='I'>Outward</option>
                    </select>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="form-group"> <label>Mode</label> 
                    <select name="MODE" id="role" class="form-control">
                        <option class="form-control" value=''>Select Mode</option>
                        <option class="form-control" value='WASTAGE'>WASTAGE</option>
                    </select>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                <div class="form-group">
                    <label class="text-danger">In CASE</label>
                    <input type="text" name="IN_UNIT" value="" id="IN_UNIT" placeholder="Case" class="input-sm form-control" required>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                <div class="form-group">
                    <label class="text-danger">In BOTTLE (<?php echo $Brand__List__User_View->getBottles_per_case(); ?>)</label>
                    <input type="text" name="IN_SUBUNIT" value="" id="IN_SUBUNIT" placeholder="Bottles" class="input-sm form-control" required>
                </div>
            </div>


            <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
                <div class="form-group">
                    <input type="button" id="addTooProduction" value="Add New" class="btn btn-primary">
                </div> 

            </div> 
            <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                <div class="form-group">
                    <label id="MassageLabel1"></label>
                </div> 

            </div> 
        </form>        <?php } ?>

</div>











