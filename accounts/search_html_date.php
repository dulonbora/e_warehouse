<?php


ob_start();
if (session_status() == PHP_SESSION_NONE) {session_start();}
$userId = $_SESSION['id'] == NULL ? "" : $_SESSION['id'];

include '../classes/Ledger_Account.php';


$_id = filter_input(INPUT_GET, 's');

$Ledger_Account = new Ledger_Account();


?>


<div class="row wrapper"> 

    <div class="col-sm-3 m-b-xs">
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
    <div class="col-sm-9 row">
        

        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
            <form action=""  method="post" id="EnaBrand" role="form">
                <div class="form-group">
                    <label>Pending Payment <span class="text-danger text-right"><?php echo $Ledger_Account->CountTolalByLedgerIdWithStatus($userId, 1, "PAYMENT");?></span></label>
                    <input type="text" name="OPENING_STOCK" value="<?php echo $Ledger_Account->SumTolalByLedgerIdWithStatus($userId, 1, "PAYMENT"); ?>"  placeholder="0 BL" class="input-sm form-control" disabled>
                </div>


            </form>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
            <form action=""  method="post" id="EnaBrand" role="form">
                <div class="form-group">
                    <label>Paid Payment <span class="text-danger text-right"><?php echo $Ledger_Account->CountTolalByLedgerIdWithStatus($userId, 2, "PAYMENT");?></span></label>
                    <input type="text" name="OPENING_STOCK" value="<?php echo $Ledger_Account->SumTolalByLedgerIdWithStatus($userId, 2, "PAYMENT"); ?>" placeholder="0 BL" class="input-sm form-control" disabled>
                </div>

            </form>
        </div>
        
        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
            <form action=""  method="post" id="EnaBrand" role="form">
                <div class="form-group">
                    <label>Total Payment <span class="text-danger text-right"><?php echo $Ledger_Account->CountTolalByLedgerId($userId, "PAYMENT");?></span></label>
                    <input type="text" name="OPENING_STOCK" value="<?php echo $Ledger_Account->SumTolalByLedgerId($userId, "PAYMENT"); ?>" id="OPENING_STOCK" placeholder="0 BL" class="input-sm form-control" disabled>
                </div>



            </form>
        </div>
        

        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
            <form action=""  method="post" id="EnaBrand" role="form">
                <div class="form-group">
                    <label>Pending Receipt <span class="text-danger text-right"><?php echo $Ledger_Account->CountTolalByLedgerIdWithStatus($userId, 1, "RECEIPT");?></span></label>
                    <input type="text" name="OPENING_STOCK" value="<?php echo $Ledger_Account->SumTolalByLedgerIdWithStatus($userId, 1, "RECEIPT"); ?>"  placeholder="0 BL" class="input-sm form-control" disabled>
                </div>


            </form>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
            <form action=""  method="post" id="EnaBrand" role="form">
                <div class="form-group">
                    <label>Paid Receipt <span class="text-danger text-right"><?php echo $Ledger_Account->CountTolalByLedgerIdWithStatus($userId, 2, "RECEIPT");?></span></label>
                    <input type="text" name="OPENING_STOCK" value="<?php echo $Ledger_Account->SumTolalByLedgerIdWithStatus($userId, 2, "RECEIPT"); ?>" placeholder="0 BL" class="input-sm form-control" disabled>
                </div>

            </form>
        </div>
        
        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
            <form action=""  method="post" id="EnaBrand" role="form">
                <div class="form-group">
                    <label>Total Receipt <span class="text-danger text-right"><?php echo $Ledger_Account->CountTolalByLedgerId($userId, "RECEIPT");?></span></label>
                    <input type="text" name="OPENING_STOCK" value="<?php echo $Ledger_Account->SumTolalByLedgerId($userId, "RECEIPT"); ?>" id="OPENING_STOCK" placeholder="0 BL" class="input-sm form-control" disabled>
                </div>



            </form>
        </div>
        


    </div>
</div>