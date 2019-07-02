<?php
include '../classes/Brand__List.php';
include '../classes/Brand__Master.php';
include '../classes/Brand__Packing.php';
include '../classes/Stock_Fectory.php';
include '../classes/Transfar_Item.php';

$_id                            = filter_input(INPUT_GET, 'i');

$Transfar_Item                  = new Transfar_Item();
$Brand__List                    = new Brand__List();
$Brand__Master                  = new Brand__Master();
$Brand__Packing                 = new Brand__Packing();
$stock                          = new Stock_Fectory();

$Brand__List->LoadValue($_id);
$Brand__Packing->LoadValue($Brand__List->getPacking_id());
$Brand__Master->LoadValue($Brand__Packing->getMaster_id());

$subUnitValue           =  $Brand__Packing->getBottles_per_case();

$openingStockStr        = $stock->getStockInString($subUnitValue, $Brand__List->getOpening_stock(), "CASE", "BTL");
$inStockStr             = $stock->getStockInString($subUnitValue, $Brand__List->getInward_stock(), "CASE", "BTL");
$outStockStr            = $stock->getStockInString($subUnitValue, $Brand__List->getOutward_stock(), "CASE", "BTL");
$pingStockStr           = $stock->getStockInString($subUnitValue, $Brand__List->getProdiucting_stock(), "CASE", "BTL");
$pStockStr              = $stock->getStockInString($subUnitValue, $Brand__List->getProdiuced_stock(), "CASE", "BTL");
$lStockStr              = $stock->getStockInString($subUnitValue, $Brand__List->getLost_stock(), "CASE", "BTL");
$closeingStockStr       = $stock->getStockInString($subUnitValue, $Brand__List->getCloseing_stock(), "CASE", "BTL");


?>


<div class="row wrapper"> 

    <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12 m-b-xs">
        <form action=""  method="post" id="EnaBrand" role="form">
            <div class="form-group">
                <input type="date" name="OPENING_STOCK" value="" id="OPENING_STOCK" placeholder="Date From" class="input-sm form-control" required>
            </div>
            <div class="form-group">
                <input type="date" name="OPENING_STOCK" value="" id="OPENING_STOCK" placeholder="Date To" class="input-sm form-control" required>
            </div>
            <div class="form-group">
                <input type="button" id="addOpeningSTock" value="Filter" class="btn btn-primary btn-sm btn-block">
            </div>
        </form>        
    </div>
    <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12 row">
        <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
            <form action=""  method="post" id="EnaBrand" role="form">
                <div class="form-group">
                    <label>Opening Stock</label>
                    <input type="text" name="OPENING_STOCK" value="<?php echo $openingStockStr; ?>" id="OPENING_STOCK" placeholder="0 BL" class="input-sm form-control" disabled>
                </div>



            </form>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
            <form action=""  method="post" id="EnaBrand" role="form">
                <div class="form-group">
                    <label>Inward</label>
                    <input type="text" name="OPENING_STOCK" value="<?php echo $inStockStr; ?>"  placeholder="0 BL" class="input-sm form-control" disabled>
                </div>


            </form>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
            <form action=""  method="post" id="EnaBrand" role="form">
                <div class="form-group">
                    <label>Outward</label>
                    <input type="text" name="OPENING_STOCK" value="<?php echo $outStockStr; ?>" placeholder="0 BL" class="input-sm form-control" disabled>
                </div>

            </form>
        </div>
        


        <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
            <form action=""  method="post" id="EnaBrand" role="form">
                <div class="form-group">
                    <label>Production</label>
                    <input type="text" name="OPENING_STOCK" value="<?php echo $pingStockStr; ?>" placeholder="0 BL" class="input-sm form-control" disabled>
                </div>

            </form>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
            <form action=""  method="post" id="EnaBrand" role="form">
                <div class="form-group">
                    <label>Produced</label>
                    <input type="text" name="OPENING_STOCK" value="<?php echo $pStockStr; ?>" placeholder="0 BL" class="input-sm form-control" disabled>
                </div>

            </form>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                <div class="form-group">
                    <label>Lost</label>
                    <input type="text" name="OPENING_STOCK" value="<?php echo $lStockStr; ?>" placeholder="0 BL" class="input-sm form-control" disabled>
                </div>

        </div>
        
        

        
        <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
            
            <form action=""  method="post" id="EnaBrand" role="form">
                <div class="form-group">
                    <label>Closing Stock</label>
                    <input type="text" name="OPENING_STOCK" value="" placeholder="<?php echo $closeingStockStr; ?>" class="input-sm form-control" disabled>
                </div>

            </form>
        </div>
    </div>

        
    
        

        
    </div>
</div>