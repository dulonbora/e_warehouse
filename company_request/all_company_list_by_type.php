<?php


require_once('../classes/Company_Loader.php');
$_Company_Loader = new Company_Loader();

$response = array();
$response["SUCCESS"] = 0;

$_type = filter_input(INPUT_GET , "type");

$Result = $_Company_Loader->loadAllPaggingByCompanyTypeStatus($_type, 5);

if ($Result > 0) {
    $response['CONTENTS'] = array();
    $Edict = array();
    foreach ($Result as $rows) {
        
            $Edict['ID']                 = $rows['ID'];
            $Edict['ROLE']               = $rows['ROLE'];
            $Edict['EXCISE_USER_ID']     = $rows['EXCISE_USER_ID'];
            $Edict['excise_user_id']     = $rows['EXCISE_USER_ID'];
            $Edict['COMPANY_TYPE']       = $rows['COMPANY_TYPE'];
            $Edict['COMPANY_NAME']       = $rows['COMPANY_NAME'];
            $Edict['COMPANY_LOGO']       = $rows['COMPANY_LOGO'];
            $Edict['EMAIL']              = $rows['EMAIL'];
            $Edict['PHONE_NO']           = $rows['PHONE_NO'];
            $Edict['ADDRESS']            = $rows['ADDRESS'];
            $Edict['CITY']               = $rows['CITY'];
            $Edict['DISTRICT']           = $rows['DISTRICT'];
            $Edict['SUB_DIVISION']       = $rows['SUB_DIVISION'];
            $Edict['STATE']              = $rows['STATE'];
            $Edict['CITY']               = $rows['CITY'];
            $Edict['ZIP']                = $rows['ZIP'];
            $Edict['GSTN']               = $rows['GSTN'];
            $Edict['PAN_OR_IT_NO']       = $rows['PAN_OR_IT_NO'];
            $Edict['SALES_TAX_NO']       = $rows['SALES_TAX_NO'];
            $Edict['CST_NO']             = $rows['CST_NO'];
            $Edict['STATUS']             = $rows['STATUS'];
            $Edict['CITY']               = $rows['CITY'];
            $Edict['CREATE_ON']          = $rows['CREATE_ON'];
            $Edict['CREATE_BY']          = $rows['CREATE_BY'];
            $Edict['MODIFY_ON']          = $rows['MODIFY_ON'];
            $Edict['MODIFY_BY']          = $rows['MODIFY_BY'];
            $Edict['IS_ACTIVE']          = $rows['IS_ACTIVE'];

        array_push($response['CONTENTS'], $Edict);
        $response["SUCCESS"] = 1; // loaded
    }
} else {
    $response["SUCCESS"] = 0;
}
echo json_encode($response);
?>