<?php
include '../classes/Masage.php';
$Masage         = new Masage();

include '../classes/Company.php';
$Company        = new Company();

include '../classes/Json_Parsar.php';
$Json__Parsar   = new Json_Parsar();

$m_type         = filter_input(INPUT_GET, 'm_type');
$m_ids          = filter_input(INPUT_GET, 'm_ids');

$TotalRow = $Masage->TotalCount($m_type, $m_ids);

$response = array();
$response["SUCCESS"] = 0;


$limit = 20;
$TotalPage = ceil($TotalRow / $limit);
$page = (int) (!isset($_GET['i']) ? 1 : $_GET['i']);
if (($page + 1) == $TotalPage) {$page == 0;}
$start = ($page - 1) * $limit;

$Result = $Masage->loadAllPagging($start, $limit, $m_type, $m_ids);

if ($Result > 0) {
    $response['CONTENTS'] = array();
    $Edict = array();
    foreach ($Result as $rows) {
        
        $Edict['ID']                        = $rows['ID']               == NULL ? "" : $rows['ID'];
        $Edict['USER_ID']                   = $rows['USER_ID']          == NULL ? "" : $rows['USER_ID'];
        $Edict['USER_NAME']                 = $rows['USER_ID']          == NULL ? "" : $Company->returnCompanyName($rows['USER_ID']);
        $Edict['TO_USER_ID']                = $rows['TO_USER_ID']       == NULL ? "" : $rows['TO_USER_ID'];
        $Edict['DISTRICT_ID']               = $rows['DISTRICT_ID']      == NULL ? "" : $rows['DISTRICT_ID'];
        $Edict['MODULE_TYPE']               = $rows['MODULE_TYPE']      == NULL ? "" : $rows['MODULE_TYPE'];
        $Edict['MASSAGE_TYPE']              = $rows['MASSAGE_TYPE']     == NULL ? "" : $rows['MASSAGE_TYPE'];
        $Edict['NOTE']                      = $rows['NOTE']             == NULL ? "" : $rows['NOTE'];
        $Edict['DESIGNATION']               = $rows['DESIGNATION']      == NULL ? "" : $rows['DESIGNATION'];
        $Edict['MODULE_IDS']                = $rows['MODULE_IDS']       == NULL ? "" : $rows['MODULE_IDS'];
        $Edict['ACTION_ID']                 = $rows['ACTION']           == NULL ? "" : $rows['ACTION'];
        $Edict['ACTION']                    = $rows['ACTION']           == NULL ? "" : $Company->GenerateAction_Officers($rows['ACTION']);
        $Edict['STATUS']                    = $rows['STATUS']           == NULL ? "" : $rows['STATUS'];
        $Edict['CREATE_ON']                 = $rows['CREATE_ON']        == NULL ? "" : $rows['CREATE_ON'];
        $Edict['CREATE_BY']                 = $rows['CREATE_BY']        == NULL ? "" : $rows['CREATE_BY'];
        $Edict['MODIFY_ON']                 = $rows['MODIFY_ON']        == NULL ? "" : $rows['MODIFY_ON'];
        $Edict['MODIFY_BY']                 = $rows['MODIFY_BY']        == NULL ? "" : $rows['MODIFY_BY'];
  
        
        array_push($response['CONTENTS'], $Edict);
        $response["SUCCESS"] = 1; // loaded
    }
} else {
    $response["SUCCESS"] = 0;
}


echo json_encode($response);



