<?php
include '../classes/Brand__List.php';
$_Brand__List = new Brand__List();
include '../classes/Brand__Packing.php';
$_Brand__Packing = new Brand__Packing();

$id = filter_input(INPUT_GET, 'i');

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


        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="form-group"> <label>Select Item Type</label> 
                    <select name="ITEM_TYPE" id="role" class="form-control">
                        <option class="form-control" value=''>Select Item Type</option>
                        <option class="form-control" value='LABEL'>LABEL</option>
                        <option class="form-control" value='MONO_CARTOON'>MONO CARTOON</option>
                        <option class="form-control" value='BOTTLE'>BOTTLE</option>
                        <option class="form-control" value='CUP'>CUP</option>
                    </select>
                </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
            <div class="form-group">
                <label>UNIT</label>
                <input type="text" name="UNIT" value="" id="UNIT" placeholder="Main Unit" class="input-sm form-control" required>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
            <div class="form-group">
                <label>SUB UNIT</label>
                <input type="text" name="SUB_UNIT" value="" id="BOTTLES" placeholder="Sub Unit" class="input-sm form-control" required>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="form-group">
                <label>SUB UNIT VALUE</label>
                <input type="text" name="SUB_UNIT_VALUE" value="" id="SIZE" placeholder="Sub Unit Value" class="input-sm form-control" required>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
            <div class="form-group">
                <label>Opening Stock Main Unit</label>
                <input type="text" name="OPENING_STOCK_UNIT" value="" id="OPENING_STOCK_UNIT" placeholder="Opening Stock" class="input-sm form-control" required>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
            <div class="form-group">
                <label>Opening Stock In Sub Unit</label>
                <input type="text" name="OPENING_STOCK_UNIT1" value="" id="OPENING_STOCK_UNIT1" placeholder="Opening Stock" class="input-sm form-control" required>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="form-group">
                <input type="button" id="addOpeningSTock" value="Add New" class="btn btn-primary">
            </div> 

        </div> 
        <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
            <div class="form-group">
                <label class="text text-danger" id="MassageLabel"></label>
            </div> 

        </div> 
    </form> </div>











