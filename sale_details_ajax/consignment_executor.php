<?php

error_reporting(E_ALL);
include_once '../classes/Transfar_Item.php';
include_once '../classes/Transfar_Master.php';
include_once '../classes/Brand__List.php';
include_once '../classes/Global_Functions.php';
include_once '../classes/Brand__Packing.php';

$_id                    = filter_input(INPUT_GET, "i");

$Transfar_Item          = new Transfar_Item();
$Transfar_Master        = new Transfar_Master();
$Brand__List            = new Brand__List();
$Global_Functions       = new Global_Functions();
$__Brand__Packing       = new Brand__Packing();



$Result                 = $Transfar_Item->loadAllPaggingByMasterIdStatus($_id, 0, 200);
$Transfar_Master->LoadValue($_id);

$userToo                = $Transfar_Master->getUser_to();
$userFrom               = $Transfar_Master->getUser_from();

if($Transfar_Master->getStatus()!=4){
    
if ($Result > 0) {

    foreach ($Result as $rows) {
        
            $inward_user_itemId = $Brand__List->UserItemId($rows['ITEM_ID'], $rows['PACKING_ID'], $Transfar_Master->getUser_to());
            
            if($inward_user_itemId==0){
                
                $__Brand__Packing->LoadValue($rows['PACKING_ID']);
                
                $Brand__List->setItem_id($rows['ITEM_ID']);
                $Brand__List->setFyear("");
                $Brand__List->setPacking_id($rows['PACKING_ID']);
                $Brand__List->setUser_id($userToo);
                $Brand__List->setCreate_on(time());
                $Brand__List->setCreate_by($userToo);
                $Brand__List->setModify_on(time());
                $Brand__List->setModify_by($userToo);
                $Brand__List->setIs_active("YES");
                if ($Brand__List->Insert() == 1) {
                    
                    $inward_user_itemId = $Brand__List->getId();
                    
                    $Transfar_Item->setItem_id($rows['ITEM_ID']);
                    $Transfar_Item->setPacking_id($rows['PACKING_ID']);
                    $Transfar_Item->setUser_item_id($inward_user_itemId);

                    $Transfar_Item->setTotal_case(0);
                    $Transfar_Item->setTotal_bottle(0);
                    $Transfar_Item->setUnit("BTL");
                    $Transfar_Item->setPacking_size($__Brand__Packing->getMl_per_case());
                    $Transfar_Item->setIoType("OS");
                    $Transfar_Item->setLongdate(time());
                    $Transfar_Item->setCreateBy($userToo);
                    if ($Transfar_Item->Insert()) {
                        
                    }
                    
                    
                }

            }
            
            
            $Transfar_Item->setMaster_id($rows['MASTER_ID']);
            $Transfar_Item->setItem_id($rows['ITEM_ID']);
            $Transfar_Item->setPacking_id($rows['PACKING_ID']);
            $Transfar_Item->setUser_item_id($rows['USER_ITEM_ID']);
            $Transfar_Item->setUnit($rows['UNIT']);
            $Transfar_Item->setPacking_size($rows['PACKING_SIZE']);
            $Transfar_Item->setBatch_no($rows['BATCH_NO']);
            $Transfar_Item->setTotal_case($rows['TOTAL_CASE']);
            $Transfar_Item->setTotal_bottle($rows['TOTAL_BOTTLE']);
            $Transfar_Item->setTotal_bl($rows['TOTAL_BL']);
            $Transfar_Item->setTotal_lpl($rows['TOTAL_LPL']);
            $Transfar_Item->setTotal_cost($rows['TOTAL_COST']);
            $Transfar_Item->setTotal_adv($rows['TOTAL_ADV']);
            $Transfar_Item->setTotal_fee($rows['TOTAL_FEE']);
            $Transfar_Item->setTotal_vat($rows['TOTAL_VAT']);
            $Transfar_Item->setTcs($rows['TCS']);
            $Transfar_Item->setTotal_mrp($rows['TOTAL_MRP']);
            $Transfar_Item->setTotal_amount($rows['TOTAL_AMOUNT']);
            $Transfar_Item->setStatus(1);
            $Transfar_Item->setIs_active("YES");
            $Transfar_Item->setLongdate(time());
            
            $Transfar_Item->setCreateBy($userFrom);
            $Transfar_Item->setIoType("O");

            
            if ($Transfar_Item->Insert() == 1) {
                if ($Brand__List->UpdateStock($rows['USER_ITEM_ID'], $rows['TOTAL_BOTTLE'], "O") == 1) {
                    if ($Transfar_Item->UpdateStatus($rows['ID'], 10) == 1) {
                        echo 'OK DONE';
                    }
                }
            }
        }
    }







    if ($Transfar_Master->UpdateStatus($_id, 7)) {
        $Global_Functions->pageRedirect("../sale_details/consignment_details.php?i=" . $_id);
    }
}
        






