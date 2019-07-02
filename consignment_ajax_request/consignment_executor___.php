<?php

include_once '../classes/Transfar_Item.php';
include_once '../classes/Transfar_Master.php';
include_once '../classes/Brand__List.php';
include_once '../classes/Brand__Packing.php';
include_once '../classes/Global_Functions.php';

$_id = filter_input(INPUT_GET, "i");

$Transfar_Item = new Transfar_Item();
$Transfar_Master = new Transfar_Master();
$Brand__List = new Brand__List();
$Global_Functions = new Global_Functions();
$__Brand__Packing = new Brand__Packing();



$Result = $Transfar_Item->loadAllPaggingByMasterIdStatus($_id, 0, 200);
$Transfar_Master->LoadValue($_id);

            $userFrom = $Transfar_Master->getUser_from();
            $userToo = $Transfar_Master->getUser_to();
            
            echo "USER_FROM".$userFrom;
            echo "USER_TOO".$userToo;

if ($Transfar_Master->getStatus() != 4) {

    if ($Result > 0) {

        foreach ($Result as $rows) {


            
            
            echo "USER_FROM".$userFrom;
            echo "USER_TOO".$userToo;

            $Transfar_Item->setMaster_id($rows['MASTER_ID']);
            $Transfar_Item->setItem_id($rows['ITEM_ID']);
            $Transfar_Item->setPacking_id($rows['PACKING_ID']);
            $Transfar_Item->setTcs($rows['TCS']);
            $Transfar_Item->setTotal_mrp($rows['TOTAL_MRP']);
            $Transfar_Item->setTotal_amount($rows['TOTAL_AMOUNT']);
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
            $Transfar_Item->setStatus(1);
            $Transfar_Item->setIs_active("YES");
            echo "USER_FROM".$userFrom;

            $Transfar_Item->setLongdate($Transfar_Master->getLongdate());
            $inward_user_itemId = $Brand__List->UserItemId($rows['ITEM_ID'], $rows['PACKING_ID'], $Transfar_Master->getUser_to());

            if ($inward_user_itemId == 0) {

                $__Brand__Packing->LoadValue($rows['PACKING_ID']);
                $Brand__List->setItem_id($rows['ITEM_ID']);
                $Brand__List->setFyear("");
                $Brand__List->setPacking_id($rows['PACKING_ID']);
                $Brand__List->setUser_id($userToo);
                $Brand__List->setOpening_stock(0);
                $Brand__List->setInward_stock(0);
                $Brand__List->setOutward_stock(0);
                $Brand__List->setProdiucting_stock(0);
                $Brand__List->setProdiuced_stock(0);
                $Brand__List->setLost_stock(0);
                $Brand__List->setCloseing_stock(0);
                $Brand__List->setCreate_on(time());
                $Brand__List->setCreate_by($userToo);
                $Brand__List->setModify_on(time());
                $Brand__List->setModify_by($userToo);
                $Brand__List->setIs_active("YES");

                if ($Brand__List->Insert() == 1) {

                    $inward_user_itemId = $Brand__List->getId();

                    $Transfar_Item->setItem_id($__Brand__Packing->getMaster_id());
                    $Transfar_Item->setPacking_id($__Brand__Packing->getId());
                    $Transfar_Item->setUser_item_id($inward_user_itemId);

                    $Transfar_Item->setTotal_case(0);
                    $Transfar_Item->setTotal_bottle(0);
                    $Transfar_Item->setUnit("BTL");
                    $Transfar_Item->setPacking_size($__Brand__Packing->getMl_per_case());
                    $Transfar_Item->setIoType("OS");
                    $Transfar_Item->setLongdate(time());
                    $Transfar_Item->setCreateBy($userToo);

                    if ($Transfar_Item->Insert()) {
                        
                        $Transfar_Item->setUser_item_id($rows['USER_ITEM_ID']);
                        $Transfar_Item->setIoType("O");
                        $Transfar_Item->setCreateBy($userFrom);

                        if ($Transfar_Item->Insert() == 1) {
                            if ($Brand__List->UpdateStock($rows['USER_ITEM_ID'], $rows['TOTAL_BOTTLE'], "O") == 1) {

                                $Transfar_Item->setUser_item_id($inward_user_itemId);
                                $Transfar_Item->setIoType("I");
                                $Transfar_Item->setCreateBy($userToo);


                                if ($Transfar_Item->Insert() == 1) {
                                    if ($Brand__List->UpdateStock($inward_user_itemId, $rows['TOTAL_BOTTLE'], "I") == 1) {
                                        if ($Transfar_Item->UpdateStatus($rows['ID'], 10) == 1) {
                                            
                                            echo 'INWEARD_USER_ID'.$inward_user_itemId;
                                            echo 'OUTWARD_USER_ID'.$rows['USER_ITEM_ID'];
                                            
                                            echo 'OK DONE';
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            } else {

                $Transfar_Item->setUser_item_id($rows['USER_ITEM_ID']);
                $Transfar_Item->setIoType("O");
                $Transfar_Item->setCreateBy($userFrom);

                if ($Transfar_Item->Insert() == 1) {
                    if ($Brand__List->UpdateStock($rows['USER_ITEM_ID'], $rows['TOTAL_BOTTLE'], "O") == 1) {

                        $Transfar_Item->setUser_item_id($inward_user_itemId);
                        $Transfar_Item->setIoType("I");
                        $Transfar_Item->setCreateBy($userToo);

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

        // if($Transfar_Master->UpdateStatus($_id, 7)){$Global_Functions->pageRedirect("../consignment/consignment_details.php?i=".$_id);}
    }
} else {
    echo 'WTF';
}










