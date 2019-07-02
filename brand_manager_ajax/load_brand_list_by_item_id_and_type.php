<?php
ob_start();
if (session_status() == PHP_SESSION_NONE) {session_start();}
$userId = $_SESSION['id'] == NULL ? 0 : $_SESSION['id'];

require_once('../classes/Stock_Fectory.php');
require_once('../classes/Brand__List__User_View_Role.php');
require_once('../classes/Brand__Master.php');
require_once('../classes/Company.php');
$_Company                       = new Company();
$_brandMaster                   = new Brand__Master();
$_Brand__List__User_View_Role   = new Brand__List__User_View_Role();
$_Stock_Fectory                 = new Stock_Fectory();

$_id                            = filter_input(INPUT_GET , "id");
$_t                            = filter_input(INPUT_GET , "t");

$response               = array();
$response["SUCCESS"]    = 0;



$TotalRow = $_Brand__List__User_View_Role->TotalCountByItemId($_id, $_t);


$limit = 20;
$TotalPage = ceil($TotalRow / $limit);
$page = (int) (!isset($_GET['i']) ? 1 : $_GET['i']);
if (($page + 1) == $TotalPage) {$page == 0;}
$start = ($page - 1) * $limit;

$Result = $_Brand__List__User_View_Role->loadAllPaggingByItemId($_id, $_t, $start, $limit);


if ($Result > 0) {
    $response['CONTENTS'] = array();
    $Edict = array();
    foreach ($Result as $rows) {
        
        $Edict['ID']                        = $rows['ID'];
        $Edict['PACKING_ID']                = $rows['PACKING_ID']           == null ? "0" : $rows['PACKING_ID'];
        $Edict['MRP_PER_BOTTLE']            = $rows['MRP_PER_BOTTLE']       == null ? "0" : $rows['MRP_PER_BOTTLE'];
        $Edict['ROLE']                      = $rows['ROLE']                 == null ? "" : $rows['ROLE'];
        $Edict['USER_ID']                   = $rows['USER_ID']              == null ? "0" : $_Company->returnCompanyName($rows['USER_ID']);
        $Edict['OPENING_STOCK']             = $rows['OPENING_STOCK']        == null ? "" : $_Stock_Fectory->getStockInString($rows['BOTTLES_PER_CASE'], $rows['OPENING_STOCK'], "CASE", "BTL");
        $Edict['INWARD_STOCK']              = $rows['INWARD_STOCK']         == null ? "" : $_Stock_Fectory->getStockInString($rows['BOTTLES_PER_CASE'], $rows['INWARD_STOCK'], "CASE", "BTL");
        $Edict['OUTWARD_STOCK']             = $rows['OUTWARD_STOCK']        == null ? "" : $_Stock_Fectory->getStockInString($rows['BOTTLES_PER_CASE'], $rows['OUTWARD_STOCK'], "CASE", "BTL");
        $Edict['PRODIUCTING_STOCK']         = $rows['PRODIUCTING_STOCK']    == null ? "" : $_Stock_Fectory->getStockInString($rows['BOTTLES_PER_CASE'], $rows['PRODIUCTING_STOCK'], "CASE", "BTL");
        $Edict['PRODIUCED_STOCK']           = $rows['PRODIUCED_STOCK']      == null ? "" : $_Stock_Fectory->getStockInString($rows['BOTTLES_PER_CASE'], $rows['PRODIUCED_STOCK'], "CASE", "BTL");
        $Edict['LOST_STOCK']                = $rows['LOST_STOCK']           == null ? "" : $_Stock_Fectory->getStockInString($rows['BOTTLES_PER_CASE'], $rows['LOST_STOCK'], "CASE", "BTL");
        $Edict['CLOSEING_STOCK']            = $rows['CLOSEING_STOCK']       == null ? "" : $_Stock_Fectory->getStockInString($rows['BOTTLES_PER_CASE'], $rows['CLOSEING_STOCK'], "CASE", "BTL");

                    BL.,
            BL.INWARD_STOCK ,
            BL.OUTWARD_STOCK,
            BL.PRODIUCTING_STOCK,
            BL.PRODIUCED_STOCK,
            BL.LOST_STOCK,
            BL.CLOSEING_STOCK,
        array_push($response['CONTENTS'], $Edict);
        $response["SUCCESS"] = 1; // loaded
    }
} else {
    $response["SUCCESS"] = 0;
}
echo json_encode($response);
?>