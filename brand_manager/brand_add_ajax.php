<?php
include '../classes/Brand__List.php';
$_Brand__List = new Brand__List();
include '../classes/Brand__Packing.php';
$_Brand__Packing = new Brand__Packing();

$id = filter_input(INPUT_GET, 'i');
$_Brand__Packing->LoadValue($id);

?>

<div class="row wrapper" id="">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <h4 class="m-t-none">Add Your Opening Stock 
                    <button type="button" class="btn btn-danger btn-rounded btn-xs pull-right" data-dismiss="modal">x</button>

            <span>OPENING STOCK IS : </span><span class="pull-right text-danger" id="Stock_Massage"></span></h4> 
        <h4 class="m-t-none"><span class="Add Your Opening Stock text-danger">Once You Add Your Opening Stock, It never Be Change</span></h4> 
    </div>
    <form action=""  method="post" id="BrandListForm" role="form">
        <input type="hidden" name="PACKING_ID" id="id" value="<?php echo $id == NULL ? 0 : $id; ?>">


        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
            <div class="form-group">
                <label>Bottle In Per Case : <?php echo $_Brand__Packing->getBottles_per_case();?></label>
                <input type="hidden" name="BOTTLES" value="<?php echo $_Brand__Packing->getBottles_per_case();?>" id="BOTTLES" placeholder="Opening Stock (bl)" class="input-sm form-control" required>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
            <div class="form-group">
                <label>Bottle In Size : <?php echo $_Brand__Packing->getMl_per_case();?></label>
                <input type="hidden" name="SIZE" value="<?php echo $_Brand__Packing->getMl_per_case();?>" id="SIZE" placeholder="Opening Stock (bl)" class="input-sm form-control" required>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
            <div class="form-group">
                <label>Case</label>
                <input type="text" name="OPENING_STOCK_CASE" value="" id="OPENING_STOCK_CASE" placeholder="Case" class="input-sm form-control" required>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
            <div class="form-group">
                <label>Bottles</label>
                <input type="text" name="OPENING_STOCK_BOTTLE" value="" id="OPENING_STOCK_BOTTLE" placeholder="Bottles" class="input-sm form-control" required>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
            <div class="form-group">
                <input type="button" id="addOpeningSTock" value="Add New" class="btn btn-primary">
            </div> 

        </div> 
        <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
            <div class="form-group">
                <label id="MassageLabel" class="text-info"></label>
            </div> 

        </div> 
    </form> </div>











