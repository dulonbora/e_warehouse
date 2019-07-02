<?php
error_reporting(0);
include '../classes/Category.php';

$response = array(); 
$response['SUCCESS'] = 0;

$__cat = new Category();

$_id = filter_input(INPUT_POST , 'ID');
$_parent_id = filter_input(INPUT_POST , 'PARENT_ID');
$_name = filter_input(INPUT_POST , 'NAME');
$_type = filter_input(INPUT_POST , 'TYPE');
$_is_active = "YES";


$__cat->setParent_id($_parent_id);
$__cat->setName($_name);
$__cat->setType($_type);
$__cat->setIs_active($_is_active);


if($_id > 0){
if($__cat->Update($_id)==1){$response['SUCCESS'] = 1;}
}
 else {
if($__cat->Insert()==1){$response['SUCCESS'] = 1;}
}

echo json_encode($response);
exit();

?>