<?php
ob_start();
if (session_status() == PHP_SESSION_NONE) {session_start();}

$_id = filter_input(INPUT_GET , 'id');

$userId = $_SESSION['id'] == NULL ? 0 : $_SESSION['id'];


require_once('../classes/Ena__Transfar.php');
$_Ena_Item = new Ena__Transfar();

require_once('../classes/Ena__User__Item.php');
$_Ena__User__Item = new Ena__User__Item();

require_once('../classes/DateSetter.php');
$_date = new DateSetter();

require_once('../classes/Brand__Master.php');
$_brandMaster = new Brand__Master();



$response = array();
$response["SUCCESS"] = 0;

$TotalRow = $_Ena_Item->TotalCountUser($_id);

$limit = 20;
$TotalPage = ceil($TotalRow / $limit);
$page = (int) (!isset($_GET['i']) ? 1 : $_GET['i']);
if (($page + 1) == $TotalPage) {$page == 0;}
$start = ($page - 1) * $limit;

$Result = $_Ena_Item->loadAllPaggingUser($_id, $start, $limit);

if ($Result > 0) {
    $response['CONTENTS'] = array();
    $Edict = array();
    foreach ($Result as $rows) {
        
        $Edict['ID']                            = $rows['ID'];
        $Edict['LONGDATE']                      = $_date->date($rows['LONGDATE']);
        $Edict['MODE']                          = $_Ena__User__Item->GenerateNote($rows['IO_TYPE']);
        $Edict['STATUS']                        = $rows['STATUS'];
        $Edict['TOO']                           = $rows['TOO'];
        $Edict['BL']                            = $rows['BL'];

        array_push($response['CONTENTS'], $Edict);
        $response["SUCCESS"] = 1; // loaded
    }
} else {
    $response["SUCCESS"] = 0;
}
echo json_encode($response);
?>