<?php

error_reporting(0);
include '../classes/Ena__Item__List.php';

$response = array(); 
$response["SUCCESS"] = 0;

$__ena                  = new Ena__Item__List();

$_id                    = filter_input(INPUT_POST , "ID");
$_item_name             = filter_input(INPUT_POST , "NAME");
$_group_id              = filter_input(INPUT_POST , "GROUP_ID");
$_category_id           = filter_input(INPUT_POST , "CATEGORY_ID");
$_type_id               = filter_input(INPUT_POST , "TYPE_ID");
$_strangth              = filter_input(INPUT_POST , "STRANGTH");
$_lpl_per_bl            = filter_input(INPUT_POST , "LPL_PER_BL");
$_fee_require           = filter_input(INPUT_POST , "FEE_REQUIRE");
$_i_fee                 = filter_input(INPUT_POST , "I_FEE");
$_t_fee                 = filter_input(INPUT_POST , "T_FEE");
$_e_fee                 = filter_input(INPUT_POST , "E_FEE");
$_status                = filter_input(INPUT_POST , "STATUS");


$__ena->setItem_name($_item_name);
$__ena->setGroup_id($_group_id);
$__ena->setCategory_id($_category_id);
$__ena->setType_id($_type_id);
$__ena->setStrangth($_strangth);
$__ena->setLpl_per_bl($_lpl_per_bl);
$__ena->setFee_require($_fee_require);
$__ena->setI_fee($_i_fee);
$__ena->setT_fee($_t_fee);
$__ena->setE_fee($_e_fee);
$__ena->setStatus($_status);
$__ena->setIs_active("YES");


if($_id > 0){
    if($__ena->Update($_id)==1){ $response["SUCCESS"] = 1;}
}
 else {
    if($__ena->Insert()==1){ $response["SUCCESS"] = 1;}
}

echo json_encode($response);
exit();

?>