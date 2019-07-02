<?php

error_reporting(0);



include_once '../classes/Ena__Transfar.php';
include_once '../classes/Transfar_Master.php';
include_once '../classes/Ena__User__Item.php';
include_once '../classes/Global_Functions.php';

$_id                    = filter_input(INPUT_GET, "i");

$Transfar_Item          = new Ena__Transfar();
$Transfar_Master        = new Transfar_Master();
$Brand__List            = new Ena__User__Item();
$Global_Functions       = new Global_Functions();


$Result                 = $Transfar_Item->loadAllPaggingMasterId($_id);
$Transfar_Master->LoadValue($_id);

if($Transfar_Master->getStatus()!=4){
    
if ($Result > 0) {

    foreach ($Result as $rows) {
        
            $Transfar_Item->setItem_id($rows['ITEM_ID']);
            $Transfar_Item->setUser_item_id($rows['USER_ITEM_ID']);
            $Transfar_Item->setToo("");
            $Transfar_Item->setMode($Transfar_Master->getMode());
            $Transfar_Item->setTrank_no("");
            $Transfar_Item->setPermit_id(0);
            $Transfar_Item->setBl($rows['BL']);
            $Transfar_Item->setTotal_cost($rows['TOTAL_COST']);
            $Transfar_Item->setTotal_fee($rows['TOTAL_FEE']);
            $Transfar_Item->setTotal_vat($rows['TOTAL_VAT']);
            $Transfar_Item->setTcs($rows['TCS']);
            $Transfar_Item->setTotal_mrp($rows['TOTAL_MRP']);
            $Transfar_Item->setTotal_amount($rows['TOTAL_AMOUNT']);
            $Transfar_Item->setLongdate(time());
            $Transfar_Item->setStatus(1);
            $Transfar_Item->setCreate_on(time());
            $Transfar_Item->setModify_on(time());
            $Transfar_Item->setIs_active("Y");

            
            $inward_user_itemId = $Brand__List->UserItemId($rows['ITEM_ID'], $Transfar_Master->getUser_to());
            
            
            
            
            
            
            if ($inward_user_itemId > 0) {
                    $Transfar_Item->setUser_from($Transfar_Master->getUser_from());
                    $Transfar_Item->setUser_to($Transfar_Master->getUser_to());
                    $Transfar_Item->setCreate_by($Transfar_Master->getUser_from());
                    $Transfar_Item->setModify_by($Transfar_Master->getUser_from());
                    $Transfar_Item->setIo_type("O");
                    
                if ($Transfar_Item->Insert() == 1) {
                    if ($Brand__List->UpdateStock($rows['USER_ITEM_ID'], $rows['BL'], "O") == 1) {
                        
                        $Transfar_Item->setCreate_by($Transfar_Master->getUser_to());
                        $Transfar_Item->setLongdate($Transfar_Master->getLongdate());
                        $Transfar_Item->setUser_item_id($inward_user_itemId);
                        $Transfar_Item->setIo_type("I");
                        
                        if ($Transfar_Item->Insert() == 1) {
                            if ($Brand__List->UpdateStock($inward_user_itemId, $rows['BL'], "I") == 1) {
                                 echo 'OK DONE';
                                if ($Transfar_Item->UpdateStatus($rows['ID'], 'C',  10) == 1) {
                                     echo 'OK DONE';
                                if($Transfar_Master->UpdateStatus($_id, 7)){$Global_Functions->pageRedirect("../consignment_ena/consignment_details.php?i=".$_id);}
                                }
                            }
                        }
                        
                    }
                }
            } else {
                echo "PLEASE SAY TO CONSIGNOR TO ASSIGN THIS ITEM TO HIS ITEM LIST";
            }
        }

}

}
 else {
    echo 'WTF';    
}



