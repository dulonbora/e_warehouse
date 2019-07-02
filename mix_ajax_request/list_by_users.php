<?php

ob_start();
if (session_status() == PHP_SESSION_NONE) {session_start();}
$userId = $_SESSION['id'];
//$userId = $_SESSION['user'] == NULL ? "" : $_SESSION['user'];


require_once('../classes/Mix__Item__List__View.php');
$_mix = new Mix__Item__List__View();


$response = array();
$response["SUCCESS"] = 0;


$TotalRow = $_mix->TotalCountByUser($userId);
$limit = 20;
$TotalPage = ceil($TotalRow / $limit);
$page = (int) (!isset($_GET['i']) ? 1 : $_GET['i']);
if (($page + 1) == $TotalPage) {$page == 0;}
$start = ($page - 1) * $limit;

$Result = $_mix->loadAllPaggingByUser($userId, $start, $limit);


if ($Result > 0) {
    $response['CONTENTS'] = array();
    $Edict = array();
    foreach ($Result as $rows) {

        $Edict['ID']                    = $rows['ID']                   == NULL ? 0 : $rows['ID'] ;
        $Edict['ML_PER_CASE']           = $rows['ML_PER_CASE']          == NULL ? "" : $rows['ML_PER_CASE'] ;
        $Edict['ITEM_NAME']             = $rows['ITEM_NAME']            == NULL ? "" : $rows['ITEM_NAME'] ;
        $Edict['STRANGTH']              = $rows['STRANGTH']             == NULL ? "" : $rows['STRANGTH'] ;
        $Edict['GROUP_ID']              = $rows['GROUP_ID']             == NULL ? 0 : $rows['GROUP_ID'] ;
        $Edict['GROUP_NAME']            = $rows['GROUP_NAME']           == NULL ? "" : $rows['GROUP_NAME'] ;
        $Edict['CATEGORY_ID']           = $rows['CATEGORY_ID']          == NULL ? 0 : $rows['CATEGORY_ID'] ;
        $Edict['CATEGORY_NAME']         = $rows['CATEGORY_NAME']        == NULL ? "" : $rows['CATEGORY_NAME'] ;
        $Edict['TYPE_ID']               = $rows['TYPE_ID']              == NULL ? 0 : $rows['TYPE_ID'] ;
        $Edict['TYPE_NAME']             = $rows['TYPE_NAME']            == NULL ? "" : $rows['TYPE_NAME'] ;
        $Edict['IS_IMPORTED']           = $rows['IS_IMPORTED']          == NULL ? "" : $rows['IS_IMPORTED'] ;
        $Edict['IS_NEW']                = $rows['IS_NEW']               == NULL ? "" : $rows['IS_NEW'] ;
        $Edict['ITEM_FOR']              = $rows['ITEM_FOR']             == NULL ? "" : $rows['ITEM_FOR'] ;
        $Edict['IMAGE_LINK']            = $rows['IMAGE_LINK']           == NULL ? "" : $rows['IMAGE_LINK'] ;
        $Edict['DESCRIPTION']           = $rows['DESCRIPTION']          == NULL ? "" : $rows['DESCRIPTION'] ;
        $Edict['UNIT']                  = $rows['UNIT']                 == NULL ? "" : $rows['UNIT'] ;
        $Edict['SUB_UNIT']              = $rows['SUB_UNIT']             == NULL ? "" : $rows['SUB_UNIT'] ;
        $Edict['SUB_UNIT_VALUE']        = "1 ".$rows['UNIT']." = ".$rows['SUB_UNIT_VALUE']." ".$rows['SUB_UNIT']       == NULL ? "" : "1 ".$rows['UNIT']." = ".$rows['SUB_UNIT_VALUE']." ".$rows['SUB_UNIT'] ;
        $Edict['ITEM_TYPE']             = $rows['ITEM_TYPE']            == NULL ? "" : $rows['ITEM_TYPE'] ;
        $Edict['OPENING_STOCK_UNIT']    = $rows['OPENING_STOCK_UNIT']   == NULL ? 0 : $rows['OPENING_STOCK_UNIT'] ;
        $Edict['OPENING_STOCK_SUB_UNIT']= $rows['OPENING_STOCK_SUB_UNIT']== NULL ? 0 : $rows['OPENING_STOCK_SUB_UNIT'] ;
        $Edict['CLOSEING_STOCK_UNIT']   = $rows['CLOSEING_STOCK_UNIT']   == NULL ? 0 : $rows['CLOSEING_STOCK_UNIT'] ;
        $Edict['CLOSEING_STOCK_SUB_UNIT']= $rows['CLOSEING_STOCK_SUB_UNIT']== NULL ? 0 : $rows['CLOSEING_STOCK_SUB_UNIT'] ;
        $Edict['CLOSEING_STOCK_STR']     = $rows['CLOSEING_STOCK_STR']    == NULL ? "" : $rows['CLOSEING_STOCK_STR'] ;
        $Edict['STATUS']                = $rows['STATUS']               == NULL ? 0 : $rows['STATUS'] ;
        $Edict['CREATE_BY']             = $rows['CREATE_BY']            == NULL ? 0 : $rows['CREATE_BY'] ;
        $Edict['CREATE_ON']             = $rows['CREATE_ON']            == NULL ? 0 : $rows['CREATE_ON'] ;
        
        array_push($response['CONTENTS'], $Edict);
        $response["SUCCESS"] = 1; // loaded
    }
} else {
    $response["SUCCESS"] = 0;
}
echo json_encode($response);
?>