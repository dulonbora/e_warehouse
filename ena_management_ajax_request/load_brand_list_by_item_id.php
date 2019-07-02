<?php
ob_start();
if (session_status() == PHP_SESSION_NONE) {session_start();}
$userId = $_SESSION['id'] == NULL ? 0 : $_SESSION['id'];

require_once('../classes/Ena__User__Item.php');
$_Ena_Item = new Ena__User__Item();

require_once('../classes/Brand__Master.php');
$_brandMaster = new Brand__Master();

require_once('../classes/Company.php');
$_Company = new Company();

$_id = filter_input(INPUT_GET , "id");

$response = array();
$response["SUCCESS"] = 0;


$TotalRow = $_Ena_Item->TotalCountByItemId($_id);


$limit = 20;
$TotalPage = ceil($TotalRow / $limit);
$page = (int) (!isset($_GET['i']) ? 1 : $_GET['i']);
if (($page + 1) == $TotalPage) {$page == 0;}
$start = ($page - 1) * $limit;

$Result = $_Ena_Item->loadAllPaggingByItemId($_id, $start, $limit);

if ($Result > 0) {
    $response['CONTENTS'] = array();
    $Edict = array();
    foreach ($Result as $rows) {
        
        $Edict['ID']                        = $rows['ID'];
        $Edict['ITEM_ID']                   = $rows['ITEM_ID']              == null ? "" : $_Ena_Item->ReturnItemName($rows['ITEM_ID']);
        $Edict['USER_ID']                   = $rows['USER_ID']              == null ? "0" : $_Company->returnCompanyName($rows['USER_ID']);
        $Edict['OPENING_STOCK']             = $rows['OPENING_STOCK']        == null ? "" : $rows['OPENING_STOCK']." BL";
        $Edict['INWARD_STOCK']              = $rows['INWARD_STOCK']         == null ? "" : $rows['INWARD_STOCK']." BL";
        $Edict['OUTWARD_STOCK']             = $rows['OUTWARD_STOCK']        == null ? "" : $rows['OUTWARD_STOCK']." BL";
        $Edict['PRODIUCTING_STOCK']         = $rows['PRODIUCTING_STOCK']    == null ? "" : $rows['PRODIUCTING_STOCK']." BL";
        $Edict['PRODIUCED_STOCK']           = $rows['PRODIUCED_STOCK']      == null ? "" : $rows['PRODIUCED_STOCK']." BL";
        $Edict['LOST_STOCK']                = $rows['LOST_STOCK']           == null ? "" : $rows['LOST_STOCK']." BL";
        $Edict['CLOSEING_STOCK']            = $rows['CLOSEING_STOCK']       == null ? "" : $rows['CLOSEING_STOCK']." BL";

        
        array_push($response['CONTENTS'], $Edict);
        $response["SUCCESS"] = 1; // loaded
    }
} else {
    $response["SUCCESS"] = 0;
}
echo json_encode($response);
?>