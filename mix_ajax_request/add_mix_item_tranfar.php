<?php


ob_start();
if (session_status() == PHP_SESSION_NONE) {session_start();}
$userId = $_SESSION['id'] == NULL ? 0 : $_SESSION['id'];

include '../classes/Mix__Item__Transfar.php';
include '../classes/Mix__Item__List__View.php';
include '../classes/Mix__Item__Master.php';
include '../classes/Stock_Fectory.php';

$response = array(); 
$response["SUCCESS"] = 0;

$__Stock_Fectory            = new Stock_Fectory();
$__mix                      = new Mix__Item__Transfar();
$__mix_master               = new Mix__Item__Master();
$__Mix__Item__List__View    = new Mix__Item__List__View();

$_user_item_id      = filter_input(INPUT_POST , "USER_ITEM_ID");

$_user_from         = $userId;
$_user_to           = $userId;
$_too               = "SELF";
$_io_type           = filter_input(INPUT_POST , "IO_TYPE");
$_mode              = filter_input(INPUT_POST , "MODE");
$_trank_no          = 0;
$_permit_id         = 0;
$_type              = filter_input(INPUT_POST , "TYPE");
$_note              = filter_input(INPUT_POST , "NOTE");
$_in_unit           = filter_input(INPUT_POST , "IN_UNIT");
$_in_subunit        = filter_input(INPUT_POST , "IN_SUBUNIT");
$_longdate          = time();
$_create_on         = time();
$_create_by         = $userId;
$_modify_on         = time();
$_modify_by         = $userId;

$__Mix__Item__List__View->LoadValue($_user_item_id);
$_item_id = $__Mix__Item__List__View->getItemId();

$stockInSubuit = ($_in_unit * $__Mix__Item__List__View->getSubUnitValue()) + $_in_subunit = NULL ? 0 : $_in_subunit;
$stockInUnit = $__Stock_Fectory->getUnitStock($__Mix__Item__List__View->getSubUnitValue(), $stockInSubuit);

if(strcmp($_io_type, "I")==0){
$CsubUnitStock = $__Mix__Item__List__View->getCloseingStockSubUnit() + $stockInSubuit;
}

if(strcmp($_io_type, "O")==0){
$CsubUnitStock = $__Mix__Item__List__View->getCloseingStockSubUnit() - $stockInSubuit;
}
 
$CUnitStock = $__Stock_Fectory->getUnitStock($__Mix__Item__List__View->getSubUnitValue(), $CsubUnitStock);
$CStockStr = $__Stock_Fectory->getStockInString($__Mix__Item__List__View->getSubUnitValue(), 
        $CsubUnitStock, 
        $__Mix__Item__List__View->getUnit(), 
        $__Mix__Item__List__View->getSubUnit());
        
$__mix->setItemId($_item_id);
$__mix->setUserItemId($_user_item_id);
$__mix->setUserFrom($_user_from);
$__mix->setUserTo($_user_to);
$__mix->setToo($_too);
$__mix->setIoType($_io_type);
$__mix->setMode($_mode);
$__mix->setTrankNo($_trank_no);
$__mix->setPermitId($_permit_id);
$__mix->setType($_type);
$__mix->setNote($_note);
$__mix->setInUnit($stockInUnit);
$__mix->setInSubunit($stockInSubuit);
$__mix->setLongdate($_longdate);
$__mix->setCreateOn($_create_on);
$__mix->setCreateBy($_create_by);
$__mix->setModifyOn($_modify_on);
$__mix->setModifyBy($_modify_by);

if($__mix->Insert()==1){
    $__mix_master->setCloseingStockUnit($CUnitStock);
    $__mix_master->setCloseingStockSubUnit($CsubUnitStock);
    $__mix_master->setCloseingStockStr($CStockStr);
    if($__mix_master->UpdateStock($_user_item_id)==1){
    $response["SUCCESS"] = 1;
    }
    }

echo json_encode($response);
exit();