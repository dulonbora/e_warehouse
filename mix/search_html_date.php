<?php
include '../classes/Mix__Item__List__View.php';
include '../classes/Mix__Item__Transfar.php';
include '../classes/Stock_Fectory.php';

$_id = filter_input(INPUT_GET, 'i');
$Mix__Item__Transfar            = new Mix__Item__Transfar();
$Mix__Item__List__View          = new Mix__Item__List__View();
$stock                          = new Stock_Fectory();
$Mix__Item__List__View->LoadValue($_id);


?>
<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
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


<div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
    <form action=""  method="post" id="EnaBrand" role="form">
        <div class="form-group">
            <label>Opening Stock</label>
            <input type="text" name="OPENING_STOCK" value="<?php echo $stock->getStockInString($Mix__Item__List__View->getSubUnitValue(), $Mix__Item__List__View->getOpeningStockSubUnit(), $Mix__Item__List__View->getUnit(), $Mix__Item__List__View->getSubUnit());?>" id="OPENING_STOCK" placeholder="Date From" class="input-sm form-control" disabled>
        </div>
            
      
  
    </form>
</div>

<div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
    <form action=""  method="post" id="EnaBrand" role="form">
        <div class="form-group">
            <label>Inward</label>
            <input type="text" name="OPENING_STOCK" value="<?php echo $stock->getStockInString($Mix__Item__List__View->getSubUnitValue(), $Mix__Item__Transfar->InwardSum($_id, "I"), $Mix__Item__List__View->getUnit(), $Mix__Item__List__View->getSubUnit());?>"  placeholder="Date From" class="input-sm form-control" disabled>
        </div>
        
            
    </form>
</div>

<div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
    <form action=""  method="post" id="EnaBrand" role="form">
        <div class="form-group">
            <label>Outward</label>
            <input type="text" name="OPENING_STOCK" value="<?php echo $stock->getStockInString($Mix__Item__List__View->getSubUnitValue(), $Mix__Item__Transfar->InwardSum($_id, "O"), $Mix__Item__List__View->getUnit(), $Mix__Item__List__View->getSubUnit());?>" placeholder="Date From" class="input-sm form-control" disabled>
        </div>
        
    </form>
</div>

<div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
    <form action=""  method="post" id="EnaBrand" role="form">
        <div class="form-group">
            <label>Closing</label>
            <input type="text" name="OPENING_STOCK" value="<?php echo $stock->getStockInString($Mix__Item__List__View->getSubUnitValue(), $Mix__Item__List__View->getCloseingStockSubUnit(), $Mix__Item__List__View->getUnit(), $Mix__Item__List__View->getSubUnit());?>" placeholder="Date From" class="input-sm form-control" disabled>
        </div>
        
    </form>
</div>
