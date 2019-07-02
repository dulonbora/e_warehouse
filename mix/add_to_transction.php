<?php
include '../classes/Mix__Item__List__View.php';
$Mix__Item__List__View = new Mix__Item__List__View();

$id = filter_input(INPUT_GET, 'i');
$Mix__Item__List__View->LoadValue($id);
?>

<div class="row wrapper" id="">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <h4 class="m-t-none">Add Your Opening Stock 
        <button type="button" class="btn btn-danger btn-rounded btn-xs pull-right" data-dismiss="modal">x</button>
            <span class="pull-right text-danger">Current Stock : <?php echo $Mix__Item__List__View->getCloseingStockStr();?></span></h4> 
        <h4 class="m-t-none"><span class="Add Your Opening Stock text-danger">Once You Add Your Opening Stock, It never Be Change</span></h4> 
    </div>
    <form action=""  method="post" id="BrandListForm" role="form">
        <input type="hidden" name="USER_ITEM_ID" id="USER_ITEM_ID" value="<?php echo $id == NULL ? 0 : $id; ?>">
        <input type="hidden" name="TYPE" id="id" value="<?php echo $Mix__Item__List__View->getTypeName(); ?>">

    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="form-group"> <label>Transfar Mode</label> 
                    <select name="IO_TYPE" id="role" class="form-control">
                        <option class="form-control" value=''>Select Mode</option>
                        <option class="form-control" value='I'>Add To Sotck (Inward)</option>
                        <option class="form-control" value='O'>Add To Outward (Outward)</option>
                    </select>
                </div>
        </div>
        
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="form-group"> <label>Mode</label> 
                    <select name="MODE" id="role" class="form-control">
                        <option class="form-control" value=''>Select Mode</option>
                        <option class="form-control" value='TRANSFAR'>TRANSFAR</option>
                        <option class="form-control" value='WASTAGE'>WASTAGE</option>
                        <option class="form-control" value='PRODUCTION'>PRODUCTION</option>
                    </select>
                </div>
        </div>
        



        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
            <div class="form-group">
                <label class="text-danger">In <?php echo $Mix__Item__List__View->getUnit(); ?></label>
                <input type="text" name="IN_UNIT" value="" id="IN_UNIT" placeholder="bl" class="input-sm form-control" required>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
            <div class="form-group">
                <label class="text-danger">In <?php echo $Mix__Item__List__View->getSubUnit(); ?></label>
                <input type="text" name="IN_SUBUNIT" value="" id="IN_SUBUNIT" placeholder="bl" class="input-sm form-control" required>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="form-group">
                <label>NOTE</label>
                <input type="text" name="NOTE" value="" id="NOTE" placeholder="Note" class="input-sm form-control" required>
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
    </form> </div>











