<?php

require_once('../classes/Ena__Item__List.php');
$_Ena_Item          = new Ena__Item__List();

require_once('../classes/Ena__Transfar.php');
$_Ena__Transfar     = new Ena__Transfar();

require_once('../classes/Ena__User__Item.php');
$_Ena__User__Item     = new Ena__User__Item();

$response           = array();
$response["SUCCESS"] = 0;

$TotalRow = $_Ena_Item->TotalCount();
$limit = 20;
$TotalPage = ceil($TotalRow / $limit);
$page = (int) (!isset($_GET['i']) ? 1 : $_GET['i']);
if (($page + 1) == $TotalPage) {$page == 0;}
$start = ($page - 1) * $limit;

$Result = $_Ena_Item->loadAllPagging($start, $limit);
if ($Result > 0) {
    $response['CONTENTS'] = array();
    $Edict = array();
    foreach ($Result as $rows) {
        
        $oSStock = $_Ena__Transfar->Total_Stock_By_Item_Id_And_Type($rows['ID'], "OS");
        $iStock = $_Ena__Transfar->Total_Stock_By_Item_Id_And_Type($rows['ID'], "I");
        $OStock = $_Ena__Transfar->Total_Stock_By_Item_Id_And_Type($rows['ID'], "O");
        $lStock = $_Ena__Transfar->Total_Stock_By_Item_Id_And_Type($rows['ID'], "L");
        $pStock = $_Ena__Transfar->Total_Stock_By_Item_Id_And_Type($rows['ID'], "P");
        $xStock = $_Ena__Transfar->Total_Stock_By_Item_Id_And_Type($rows['ID'], "X");
        $cStock = $_Ena__User__Item->CloseingStockByItemId($rows['ID']);
        
        
        $Edict['ID']            = $rows['ID'];
        $Edict['ITEM_NAME']     = $rows['ITEM_NAME']          == NULL ? "0" : $rows['ITEM_NAME'];
        $Edict['OPENING']       = $oSStock  == NULL ? "0.00" : $oSStock;
        $Edict['INWARD']        = $iStock   == NULL ? "0.00" : $iStock;
        $Edict['OUTWARD']       = $OStock   == NULL ? "0.00" : $OStock;
        $Edict['LOSE']          = $lStock   == NULL ? "0.00" : $lStock;
        $Edict['PRODUCTION']    = $pStock   == NULL ? "0.00" : $pStock;
        $Edict['PRIDUCED']      = $xStock   == NULL ? "0.00" : $xStock;
        $Edict['CLOSEING']      = $cStock   == NULL ? "0.00" : $cStock;
        

        array_push($response['CONTENTS'], $Edict);
        $response["SUCCESS"] = 1; // loaded
    }
} else {
    $response["SUCCESS"] = 0;
}
echo json_encode($response);
?>


