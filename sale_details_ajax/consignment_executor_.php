<?php

error_reporting(0);

include_once '../classes/Transfar_Item.php';
include_once '../classes/Transfar_Master.php';
include_once '../classes/Brand__List.php';
include_once '../classes/Global_Functions.php';

$_id                    = filter_input(INPUT_GET, "i");

$Transfar_Item          = new Transfar_Item();
$Transfar_Master        = new Transfar_Master();
$Brand__List            = new Brand__List();
$Global_Functions       = new Global_Functions();



$Result                 = $Transfar_Item->loadAllPaggingByMasterIdStatus($_id, 0, 200);
$Transfar_Master->LoadValue($_id);

if($Transfar_Master->getStatus()!=4){
    
if ($Result > 0) {

    foreach ($Result as $rows) {
            $Transfar_Item->setMaster_id($rows['MASTER_ID']);
            $Transfar_Item->setItem_id($rows['ITEM_ID']);
            $Transfar_Item->setPacking_id($rows['PACKING_ID']);
            $Transfar_Item->setUser_item_id($rows['USER_ITEM_ID']);
                $Transfar_Item->setUnit($rows['UNIT']);
                $Transfar_Item->setPacking_size($rows['PACKING_SIZE']);
                $Transfar_Item->setTotal_case($rows['TOTAL_CASE']);
                $Transfar_Item->setTotal_bottle($rows['TOTAL_BOTTLE']);
                $Transfar_Item->setTotal_bl($rows['TOTAL_BL']);
                $Transfar_Item->setTotal_lpl($rows['TOTAL_LPL']);
                $Transfar_Item->setTotal_cost($rows['TOTAL_COST']);
                $Transfar_Item->setTotal_adv($rows['TOTAL_ADV']);
                $Transfar_Item->setTotal_fee($rows['TOTAL_FEE']);
                $Transfar_Item->setTotal_vat($rows['TOTAL_VAT']);
                $Transfar_Item->setIoType("O");
                $Transfar_Item->setCreateBy($Transfar_Master->getUser_from());
                $Transfar_Item->setLongdate($Transfar_Master->getLongdate());

                
                
            
            
            



                
                $Transfar_Item->setIoType("O");
                if ($Transfar_Item->Insert() == 1) {
                    if ($Brand__List->UpdateStock($rows['USER_ITEM_ID'], $rows['TOTAL_BOTTLE'], "O") == 1) {
                        
                        $Transfar_Item->setCreateBy($Transfar_Master->getUser_to());
                        $Transfar_Item->setUser_item_id($inward_user_itemId);
                        $Transfar_Item->setIoType("I");
                        if ($Transfar_Item->Insert() == 1) {
                            if ($Brand__List->UpdateStock($inward_user_itemId, $rows['TOTAL_BOTTLE'], "I") == 1) {
                                if ($Transfar_Item->UpdateStatus($rows['ID'], 10) == 1) {
                                    echo 'OK DONE';
                                }
                            }
                        }
                        
                    }
                    }
                    }
                    }
                    }
        
      //  if($Transfar_Master->UpdateStatus($_id, 7)){$Global_Functions->pageRedirect("../consignment/consignment_details.php?i=".$_id);}






