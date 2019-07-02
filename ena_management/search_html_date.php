<?php
include '../classes/Ena__User__Item.php';
$Ena__User__Item = new Ena__User__Item();

$_id = filter_input(INPUT_GET, 'i');

$Ena__User__Item->LoadValue($_id);
?>


<div class="row wrapper"> 

    <div class="col-sm-2 m-b-xs">
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
    <div class="col-sm-10 row">
        <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
            <form action=""  method="post" id="EnaBrand" role="form">
                <div class="form-group">
                    <label>Opening Stock</label>
                    <input type="text" name="OPENING_STOCK" value="<?php echo $Ena__User__Item->getOpening_stock(); ?> BL" id="OPENING_STOCK" placeholder="0 BL" class="input-sm form-control" disabled>
                </div>



            </form>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
            <form action=""  method="post" id="EnaBrand" role="form">
                <div class="form-group">
                    <label>Inward</label>
                    <input type="text" name="OPENING_STOCK" value="<?php echo $Ena__User__Item->getInward_stock(); ?> BL"  placeholder="0 BL" class="input-sm form-control" disabled>
                </div>


            </form>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
            <form action=""  method="post" id="EnaBrand" role="form">
                <div class="form-group">
                    <label>Outward</label>
                    <input type="text" name="OPENING_STOCK" value="<?php echo $Ena__User__Item->getOutward_stock(); ?> BL" placeholder="0 BL" class="input-sm form-control" disabled>
                </div>

            </form>
        </div>
        


        <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
            <form action=""  method="post" id="EnaBrand" role="form">
                <div class="form-group">
                    <label>Production</label>
                    <input type="text" name="OPENING_STOCK" value="<?php echo $Ena__User__Item->getProdiucting_stock(); ?> BL" placeholder="0 BL" class="input-sm form-control" disabled>
                </div>

            </form>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
            <form action=""  method="post" id="EnaBrand" role="form">
                <div class="form-group">
                    <label>Produced</label>
                    <input type="text" name="OPENING_STOCK" value="<?php echo $Ena__User__Item->getProdiuced_stock(); ?> BL" placeholder="0 BL" class="input-sm form-control" disabled>
                </div>

            </form>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                <div class="form-group">
                    <label>Lost</label>
                    <input type="text" name="OPENING_STOCK" value="<?php echo $Ena__User__Item->getLost_stock(); ?> BL" placeholder="0 BL" class="input-sm form-control" disabled>
                </div>

        </div>
        
        

        
        <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
            
            <form action=""  method="post" id="EnaBrand" role="form">
                <div class="form-group">
                    <label>Closing Stock</label>
                    <input type="text" name="OPENING_STOCK" value="" placeholder="<?php echo $Ena__User__Item->getCloseing_stock(); ?> BL" class="input-sm form-control" disabled>
                </div>

            </form>
        </div>
    </div>

        
    
        

        
    </div>
</div>