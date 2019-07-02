<?php
include '../classes/Ena__Transfar.php';
$_Ena__Transfar = new Ena__Transfar();

include '../classes/Global_Functions.php';
$_Global_Functions = new Global_Functions();

include '../classes/Ena__User__Item.php';
$_Ena__User__Item = new Ena__User__Item();

$id = filter_input(INPUT_GET, 'i');

$_Ena__User__Item->LoadValue($id);
?>

<div class="row wrapper" id="">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <h4 class="m-t-none">Add this item to your consignment 
            <button type="button" class="btn btn-danger btn-rounded btn-xs pull-right" data-dismiss="modal">x</button>
            <span class="pull-right text-danger" id="MassageLabel1"></span></h4> 
        </div>
        <form action=""  method="post" id="ENA_TO_PRRODUCTION" role="form">
            <input type="hidden" name="USER_ITEM_ID" id="id" value="<?php echo $id == NULL ? 0 : $id; ?>">


            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                <div class="form-group">
                    <label>FEE : <span id="TOTAL_FEE"></span></label>
            <input type="hidden" name="MRP" value="<?php echo $_Ena__User__Item->getMrp();?>" id="MRP" >
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                <div class="form-group">
                    <label>TOTAL MRP : <span id="TOTAL_MRP"></span></label>
            <input type="hidden" name="MRP" value="<?php echo $_Ena__User__Item->getMrp();?>" id="MRP" placeholder="bl" class="input-sm form-control" required>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="form-group">
                    <label>Transfer To Production (BL)</label>
                    <input type="text" name="BL" value="" id="BL" placeholder="bl" class="input-sm form-control" required>
                </div>
            </div>


            

            <input type="hidden" name="IO_TYPE" value="C" id="IO_TYPE">
            <input type="hidden" name="TRANK_NO" value="" id="TRANK_NO">




            <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
                <div class="form-group">
                    <input type="button" id="addItemToMyConsignMent" value="Submit" class="btn btn-primary">
                </div> 

            </div> 
            <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                <div class="form-group">
                    <label id="MassageLabel1"></label>
                </div> 

            </div> 
        </form>
</div>











