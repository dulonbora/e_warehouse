<?php 

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
/* Developer: Ehtesham Mehmood Site: PHPCodify.com Script: Import Excel to MySQL using PHP and Bootstrap File: import.php */ 
// Including database connections 
require_once './dbc.php';
require_once '../classes/Brand__Packing.php';
require_once '../classes/';
require_once './classes/BankTranzection.php';

$users              = new users();
$BankTranzection    = new BankTranzection();

$_master_id = filter_input(INPUT_POST, 'MASTER_ID');
 if(isset($_POST["submit_file"]))
     { $file = $_FILES["file"]["tmp_name"];
 $file_open = fopen($file,"r");
 while(($csv = fgetcsv($file_open, 1000, ",")) !== false) 
{     
    $itemId                 = $csv[0];
    $qnty                   = $csv[1]; 
    $__Brand__Packing->LoadValue($itemId);
    


    $_packing_id        = $_item_id;
    $_item_id           = $__Brand__Packing->;
    $_unit              = 'BTL';
    $_packing_size      = $__Brand__Packing__View->getMl_per_case();
    //$_total_case = filter_input(INPUT_POST, 'TOTAL_CASE');
    $_io                = 'C';
    $_total_bottle      = $qnty;
    $_total_bl          = ($qnty/$__Brand__Packing->getBottles_per_case())*$__Brand__Packing->getBl_per_case();
    $_total_lpl         = $qnty*$__Brand__Packing->getLpl_per_bottle();
    $_total_cost        = $qnty*$__Brand__Packing->getW_cost_price();
    $_total_adv         = $qnty*$__Brand__Packing->getAvd_amount_per_bottle();
    $_total_fee         = $qnty*$__Brand__Packing->getFee_amount_per_bottle();
    $_total_vat         = $qnty*$__Brand__Packing->getVat_per_bottle();
    $_tcs               = 0;
    $_total_mrp         = $qnty*$__Brand__Packing->getMrp_per_bottle();
    $_total_amount      = $_total_cost + $_total_adv+$_total_fee+$_total_vat+$_tcs;


    $stmt = $DBcon->prepare("INSERT INTO TRANSFAR_ITEMS"
        ."("
        ."MASTER_ID , "
        ."ITEM_ID , "
        ."PACKING_ID , "
        ."USER_ITEM_ID , "
        ."UNIT , "
        ."PACKING_SIZE , "
        ."BATCH_NO , "
        ."TOTAL_CASE , "
        ."TOTAL_BOTTLE , "
        ."TOTAL_BL , "
        ."TOTAL_LPL , "
        ."TOTAL_COST , "
        ."TOTAL_ADV , "
        ."TOTAL_FEE , "
        ."TOTAL_VAT , "
        ."TCS , "
        ."TOTAL_MRP , "
        ."TOTAL_AMOUNT , "
        ."STATUS , "
        ."IS_ACTIVE, "
        ."IO_TYPE, "
        ."CREATE_BY, "
        ."LONGDATE) "
        ."VALUES ("
        .":MASTER_ID , "
        .":ITEM_ID , "
        .":PACKING_ID , "
        .":USER_ITEM_ID , "
        .":UNIT , "
        .":PACKING_SIZE , "
        .":BATCH_NO , "
        .":TOTAL_CASE , "
        .":TOTAL_BOTTLE , "
        .":TOTAL_BL , "
        .":TOTAL_LPL , "
        .":TOTAL_COST , "
        .":TOTAL_ADV , "
        .":TOTAL_FEE , "
        .":TOTAL_VAT , "
        .":TCS , "
        .":TOTAL_MRP , "
        .":TOTAL_AMOUNT , "
        .":STATUS , "
        .":IS_ACTIVE, "
        .":IO_TYPE, "
        .":CREATE_BY, "
        .":LONGDATE) "
        .")");


    $stmt->bindparam(':MASTER_ID', $_master_id);
    $stmt->bindparam(':ITEM_ID', $__Brand__Packing->);
    $stmt->bindparam(':PACKING_ID', $userId);
    $stmt->bindparam(':USER_ITEM_ID', $bankTxnNo);
    $stmt->bindparam(':UNIT', $bankTxnNo);
    $stmt->bindparam(':PACKING_SIZE', $bankTxnNo);
    $stmt->bindparam(':BATCH_NO', $bankTxnNo);
    $stmt->bindparam(':TOTAL_CASE', $bankTxnNo);
    $stmt->bindparam(':TOTAL_BOTTLE', $bankTxnNo);
    $stmt->bindparam(':TOTAL_BL', $bankTxnNo);
    $stmt->bindparam(':TOTAL_LPL', $bankTxnNo);
    $stmt->bindparam(':TOTAL_COST', $bankTxnNo);
    $stmt->bindparam(':TOTAL_ADV', $bankTxnNo);
    $stmt->bindparam(':TOTAL_FEE', $bankTxnNo);
    $stmt->bindparam(':TOTAL_VAT', $bankTxnNo);
    $stmt->bindparam(':TCS', $bankTxnNo);
    $stmt->bindparam(':TOTAL_MRP', $bankTxnNo);
    $stmt->bindparam(':TOTAL_AMOUNT', $bankTxnNo);
    $stmt->bindparam(':STATUS', $bankTxnNo);
    $stmt->bindparam(':IS_ACTIVE', $bankTxnNo);
    $stmt->bindparam(':IO_TYPE', $bankTxnNo);
    $stmt->bindparam(':CREATE_BY', $bankTxnNo);
    $stmt->bindparam(':LONGDATE', $bankTxnNo);
    $stmt->execute();
    }
    }
    
    
    function DateFormatToSecond($dateFormat) {
    $last  = strtotime($dateFormat.' 11:00:00');
    return $last;
    }
    echo "CSV Imported Successfully";
?>