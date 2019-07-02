<?php

ob_start();
if (session_status() == PHP_SESSION_NONE) {session_start();}
$userId = $_SESSION['id'] == NULL ? 0 : $_SESSION['id'];

require_once('../classes/Brand__Packing__View.php');
$_brandMaster = new Brand__Packing__View();

require_once('../classes/Json_Parsar.php');
$_Json_Parsar = new Json_Parsar();

$_str = filter_input(INPUT_GET , "s");

$response = array();
$response["SUCCESS"] = 0;


$TotalRow = $_brandMaster->TotalCountSearch($_str);
$limit = 20;
$TotalPage = ceil($TotalRow / $limit);
$page = (int) (!isset($_GET['i']) ? 1 : $_GET['i']);
if (($page + 1) == $TotalPage) {$page == 0;}
$start = ($page - 1) * $limit;

$Result = $_brandMaster->loadAllPaggingSearch($_str, $start, $limit);


$_Json_Parsar->PrintSingleJSON($Result);

/*
if ($Result > 0) {
    $response['CONTENTS'] = array();
    $Edict = array();
    foreach ($Result as $rows) {
        
        $Edict['ID']                        = $rows['ID'];
        $Edict['MASTER_ID']                 = $rows['MASTER_ID']          == NULL ? "" : $rows['MASTER_ID'];
        $Edict['ITEM_NAME']                 = $rows['ITEM_NAME']          == NULL ? "" : $rows['ITEM_NAME'];
        $Edict['ML_PER_CASE']               = $rows['ML_PER_CASE']        == NULL ? "" : $rows['ML_PER_CASE'];
        $Edict['BOTTLES_PER_CASE']          = $rows['BOTTLES_PER_CASE']   == NULL ? "" : $rows['BOTTLES_PER_CASE'];
        $Edict['GROUP_NAME']                = $rows['GROUP_NAME']         == NULL ? "" : $rows['GROUP_NAME'];
        $Edict['CATEGORY_NAME']             = $rows['CATEGORY_NAME']      == NULL ? "" : $rows['CATEGORY_NAME'];
        $Edict['TYPE_NAME']                 = $rows['TYPE_NAME']          == NULL ? "" : $rows['TYPE_NAME'];
        $Edict['MRP']                       = $rows['MRP']                == NULL ? "" : $rows['MRP'];
        $Edict['MRP_PER_BOTTLE']            = $rows['MRP_PER_BOTTLE']     == NULL ? "" : $rows['MRP_PER_BOTTLE'];
        $Edict['BOOTLE_TYPE']               = $rows['BOOTLE_TYPE']        == NULL ? "" : $rows['BOOTLE_TYPE'];

        array_push($response['CONTENTS'], $Edict);
        $response["SUCCESS"] = 1; // loaded
    }
} else {
    $response["SUCCESS"] = 0;
}
echo json_encode($response);
 * 
 * 
 */
?>