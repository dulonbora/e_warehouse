<?php



ob_start();
if (session_status() == PHP_SESSION_NONE) {session_start();}
$userId = $_SESSION['id'] == NULL ? "" : $_SESSION['id'];

include '../classes/Ac_Voucher.php';
include '../classes/Ledger_Account.php';
include '../classes/Transfar_Master.php';

$_id                = filter_input(INPUT_GET, "i");

$_Transfar_Master   = new Transfar_Master();
$__led    = new Ledger_Account();
$__ac_        = new Ac_Voucher();

$_Transfar_Master->LoadValue($_id);

$__ac_->setLongdate(time());
$__ac_->setPrefix("");
$__ac_->setFyear("2018-19");
$__ac_->setNum(1);
$__ac_->setVoucher_id($_Transfar_Master->getId());
$__ac_->setVoucher_no($_Transfar_Master->getId());
$__ac_->setVoucher_type($_Transfar_Master->getMode());
$__ac_->setDr_ledger_id($_Transfar_Master->getUser_from());
$__ac_->setCr_ledger_id($_Transfar_Master->getUser_to());
$__ac_->setParticulars("Payemnt Against Consignment No " . $_Transfar_Master->getId() . "");
$__ac_->setAmount($_Transfar_Master->getGrand_total());
$__ac_->setMode("");
$__ac_->setInst_no("");
$__ac_->setInst_date("");
$__ac_->setBank_name("");
$__ac_->setRef_type("");
$__ac_->setRef_no("");
$__ac_->setRef_date("");
$__ac_->setRef_amount(0);
$__ac_->setRef_due_date("");
$__ac_->setStatus(1);
$__ac_->setCreate_on(time());
$__ac_->setCreate_by($userId);
$__ac_->setModify_by(time());
$__ac_->setModify_on($userId);
$__ac_->setIs_active("YES");



$__led->setSl_no(0);
$__led->setLongdate(time());
$__led->setParticulars("");
$__led->setNote("");
$__led->setVoucher_type("PAYMENT");
$__led->setVoucher_no("");
$__led->setLedger_id($_Transfar_Master->getUser_to());
$__led->setVoucher_id($_Transfar_Master->getId());
$__led->setCredit(0);
$__led->setDebit(0);
$__led->setCrdr("CR");
$__led->setBalance($_Transfar_Master->getGrand_total());
$__led->setStatus(1);
$__led->setCreate_on(time());
$__led->setCreate_by($_Transfar_Master->getUser_to());
$__led->setModify_on(time());
$__led->setModify_by($_Transfar_Master->getUser_to());






$ok = $__ac_->ChecAlreadyExit($_Transfar_Master->getId());
if ($ok == 0) {
    
    if($__ac_->Insert()==1){
        
        $__led->setAc_voucher_id($__ac_->getId());
        if($__led->Insert()==1){
            
            $__led->setVoucher_type("RECEIPT");
            $__led->setLedger_id($_Transfar_Master->getUser_from());
            $__led->setCreate_by($_Transfar_Master->getUser_from());
            $__led->setModify_on(time());
            $__led->setModify_by($_Transfar_Master->getUser_from());
            if($__led->Insert()){}

        }
    }
    
}







