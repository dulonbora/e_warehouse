<?php
include '../tables/Brand_Master.php';
include '../tables/Category.php';
include '../tables/Ena_Item_List.php';
include '../tables/Ena_User_Item.php';
include '../tables/Ena_Transfar.php';
include '../tables/Brand_Packing.php';
include '../tables/Brand_List.php';
include '../tables/Transfar_Master.php';
include '../tables/Transfar_Item.php';
include '../tables/Mix_Item_Master.php';
include '../tables/Mix_Item_Transfar.php';
include '../tables/Company.php';
include '../tables/Massage.php';
include '../tables/Ac_Voucher.php';
include '../tables/Ledger_Account.php';
include '../tables/Transport_Route.php';


$_Category                  = new Category();
$_Category->Create_Table();

$_brand_master              = new Brand_Master();
$_brand_master->Create_Table();

$_Brand_Packing             = new Brand_Packing();
$_Brand_Packing->Create_Table();

$_ena_item                  = new Ena_Item_List();
$_ena_item->Create_Table();

$_ena_user_item             = new Ena_User_Item();
$_ena_user_item->Create_Table();

$_Ena_Transfar              = new Ena_Transfar();
$_Ena_Transfar->Create_Table();

$_Brand_List                = new Brand_List();
$_Brand_List->Create_Table();

$_Transfar_Master           = new Transfar_Master();
$_Transfar_Master->Create_Table();

$_Transfar_Item           = new Transfar_Item();
$_Transfar_Item->Create_Table();

$_Mix_Item_Master           = new Mix_Item_Master();
$_Mix_Item_Master->Create_Table();

$_Mix_Item_Transfar         = new Mix_Item_Transfar();
$_Mix_Item_Transfar->Create_Table();

$_Company         = new Company();
$_Company->Create_Table();

$_Massage         = new Massage();
$_Massage->Create_Table();

$_Ac_Voucher      = new Ac_Voucher();
$_Ac_Voucher->Create_Table();

$_Transport_Route  = new Transport_Route();
$_Transport_Route->Create_Table();


?>
