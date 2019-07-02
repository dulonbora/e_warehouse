<?php

/**
 * Description of Ledger_Account
 *
 * @author Dulon
 */

require_once '../db/Kanexon.php';
require_once '../models/Mdl_Ledger_Account.php';

class Ledger_Account extends Mdl_Ledger_Account {
    
    private $conn = null;
    private $_table_name = "LEDGER_ACCOUNT";

    public function __construct() {
        parent::__construct();
        $Data = new Kanexon();
        $this->conn = $Data->getDb();
    }
    
    public function Insert(){
$query = "INSERT INTO " . $this->_table_name . "(AC_VOUCHER_ID , SL_NO , LONGDATE , PARTICULARS , NOTE , VOUCHER_TYPE , VOUCHER_NO , LEDGER_ID , VOUCHER_ID , CREDIT , DEBIT , CRDR , BALANCE , STATUS , CREATE_ON , CREATE_BY , MODIFY_ON , MODIFY_BY , IS_ACTIVE) 
	VALUES ( ? , ? , ? , ? , ? , ? , ? , ? , ? , ? , ? , ? , ? , ? , ? , ? , ? , ? , ?) " ; 
$success = 0;
try{
	$stmt = $this->conn->prepare($query);
	$stmt->bindParam (1 , $this->getAc_voucher_id()); 
	$stmt->bindParam (2 , $this->getSl_no()); 
	$stmt->bindParam (3 , $this->getLongdate()); 
	$stmt->bindParam (4 , $this->getParticulars()); 
	$stmt->bindParam (5 , $this->getNote()); 
	$stmt->bindParam (6 , $this->getVoucher_type()); 
	$stmt->bindParam (7 , $this->getVoucher_no()); 
	$stmt->bindParam (8 , $this->getLedger_id()); 
	$stmt->bindParam (9 , $this->getVoucher_id()); 
	$stmt->bindParam (10 , $this->getCredit()); 
	$stmt->bindParam (11 , $this->getDebit()); 
	$stmt->bindParam (12 , $this->getCrdr()); 
	$stmt->bindParam (13 , $this->getBalance()); 
	$stmt->bindParam (14 , $this->getStatus()); 
	$stmt->bindParam (15 , $this->getCreate_on()); 
	$stmt->bindParam (16 , $this->getCreate_by()); 
	$stmt->bindParam (17 , $this->getModify_on()); 
	$stmt->bindParam (18 , $this->getModify_by()); 
	$stmt->bindParam (19 , $this->getIs_active()); 

	$stmt->execute(); 
	$success = 1;}
catch(PDOException $ex){ echo  $ex->getMessage(); } 
return $success;}

 /*----------------------------------------------------------*/

    
    public function TotalCount($ledger_id) {
        $Q = "SELECT COUNT(*) AS TOTAL FROM " . $this->_table_name . " WHERE LEDGER_ID = ? AND IS_ACTIVE = 'YES' ";
        $total = 0;
        try {
            $stmt = $this->conn->prepare($Q);
            $stmt->bindParam(1, $ledger_id);
            $stmt->execute();
            $total = $stmt->fetchColumn();
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $total;
    }

    public function loadAllPagging($start, $limit, $ledger_id) {
        $Q = "SELECT * FROM " . $this->_table_name . " WHERE LEDGER_ID = ? AND IS_ACTIVE = 'YES' ORDER BY ID DESC LIMIT " . $start . " ," . $limit . " ";
        $result = null;
        try {
            $stmt = $this->conn->prepare($Q);
            $stmt->bindParam(1, $ledger_id);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $result;
    }
    
    public function TotalCountbyStatus($ledger_id, $status) {
        $Q = "SELECT COUNT(*) AS TOTAL FROM " . $this->_table_name . " WHERE LEDGER_ID = ?  AND STATUS = ? AND IS_ACTIVE = 'YES' ";
        $total = 0;
        try {
            $stmt = $this->conn->prepare($Q);
            $stmt->bindParam(1, $ledger_id);
            $stmt->bindParam(2, $status);
            $stmt->execute();
            $total = $stmt->fetchColumn();
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $total;
    }

    public function loadAllPaggingbyStatus($start, $limit, $ledger_id, $status) {
        $Q = "SELECT * FROM " . $this->_table_name . " WHERE LEDGER_ID = ? AND STATUS = ? AND IS_ACTIVE = 'YES' ORDER BY ID DESC LIMIT " . $start . " ," . $limit . " ";
        $result = null;
        try {
            $stmt = $this->conn->prepare($Q);
            $stmt->bindParam(1, $ledger_id);
            $stmt->bindParam(2, $status);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $result;
    }
    
    
    public function TotalCountbyStatusAndVchType($ledger_id, $status, $vchType) {
        $Q = "SELECT COUNT(*) AS TOTAL FROM " . $this->_table_name . " WHERE LEDGER_ID = ?  AND STATUS = ? AND VOUCHER_TYPE = ? AND IS_ACTIVE = 'YES' ";
        $total = 0;
        try {
            $stmt = $this->conn->prepare($Q);
            $stmt->bindParam(1, $ledger_id);
            $stmt->bindParam(2, $status);
            $stmt->bindParam(3, $vchType);
            $stmt->execute();
            $total = $stmt->fetchColumn();
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $total;
    }

    public function loadAllPaggingbyStatusAndVchType($start, $limit, $ledger_id, $status, $vchType) {
        $Q = "SELECT * FROM " . $this->_table_name . " WHERE LEDGER_ID = ? AND STATUS = ? AND VOUCHER_TYPE = ? AND IS_ACTIVE = 'YES' ORDER BY ID DESC LIMIT " . $start . " ," . $limit . " ";
        $result = null;
        try {
            $stmt = $this->conn->prepare($Q);
            $stmt->bindParam(1, $ledger_id);
            $stmt->bindParam(2, $status);
            $stmt->bindParam(3, $vchType);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $result;
    }
    
    
    public function SumTolalByLedgerId($ledger_id, $voucher_type) {
        $Q = "SELECT SUM(BALANCE) AS TOTAL FROM ".$this->_table_name." WHERE LEDGER_ID = ? AND VOUCHER_TYPE = ? ";
        $ok = 0;
        try {
            $stmt = $this->conn->prepare($Q);
            $stmt->bindParam (1 , $ledger_id);
            $stmt->bindParam (2 , $voucher_type);
            $stmt->execute();
            $row = $stmt->fetch();
            if ($row > 0) {
                $ok = $row["TOTAL"];
                
            }   
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $ok;
    }
    
    
    public function SumTolalByLedgerIdWithStatus($ledger_id, $status, $voucher_type) {
        $Q = "SELECT SUM(BALANCE) AS TOTAL FROM ".$this->_table_name." WHERE LEDGER_ID = ? AND VOUCHER_TYPE = ? AND STATUS = ? ";
        $ok = 0;
        try {
            $stmt = $this->conn->prepare($Q);
            $stmt->bindParam (1 , $ledger_id);
            $stmt->bindParam (2 , $voucher_type);
            $stmt->bindParam (3 , $status);
            $stmt->execute();
            $row = $stmt->fetch();
            if ($row > 0) {
                $ok = $row["TOTAL"];
                
            }   
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $ok;
    }
    
    public function CountTolalByLedgerId($ledger_id, $voucher_type) {
        $Q = "SELECT COUNT(ID) AS TOTAL FROM ".$this->_table_name." WHERE LEDGER_ID = ? AND VOUCHER_TYPE = ? ";
        $ok = 0;
        try {
            $stmt = $this->conn->prepare($Q);
            $stmt->bindParam (1 , $ledger_id);
            $stmt->bindParam (2 , $voucher_type);
            $stmt->execute();
            $row = $stmt->fetch();
            if ($row > 0) {
                $ok = $row["TOTAL"];
                
            }   
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $ok;
    }
    
    
    public function CountTolalByLedgerIdWithStatus($ledger_id, $status, $voucher_type) {
        $Q = "SELECT COUNT(ID) AS TOTAL FROM ".$this->_table_name." WHERE LEDGER_ID = ? AND VOUCHER_TYPE = ? AND STATUS = ? ";
        $ok = 0;
        try {
            $stmt = $this->conn->prepare($Q);
            $stmt->bindParam (1 , $ledger_id);
            $stmt->bindParam (2 , $voucher_type);
            $stmt->bindParam (3 , $status);
            $stmt->execute();
            $row = $stmt->fetch();
            if ($row > 0) {
                $ok = $row["TOTAL"];
                
            }   
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $ok;
    }

    /*----------------------------------------------------------*/

/*
$response = array(); 
$response["SUCCESS"] = 0;

$__led = new Ledger_Account();

$_ac_voucher_id = filter_input(INPUT_POST , "AC_VOUCHER_ID");
$_sl_no = filter_input(INPUT_POST , "SL_NO");
$_longdate = filter_input(INPUT_POST , "LONGDATE");
$_particulars = filter_input(INPUT_POST , "PARTICULARS");
$_note = filter_input(INPUT_POST , "NOTE");
$_voucher_type = filter_input(INPUT_POST , "VOUCHER_TYPE");
$_voucher_no = filter_input(INPUT_POST , "VOUCHER_NO");
$_ledger_id = filter_input(INPUT_POST , "LEDGER_ID");
$_voucher_id = filter_input(INPUT_POST , "VOUCHER_ID");
$_credit = filter_input(INPUT_POST , "CREDIT");
$_debit = filter_input(INPUT_POST , "DEBIT");
$_crdr = filter_input(INPUT_POST , "CRDR");
$_balance = filter_input(INPUT_POST , "BALANCE");
$_status = filter_input(INPUT_POST , "STATUS");
$_create_on = filter_input(INPUT_POST , "CREATE_ON");
$_create_by = filter_input(INPUT_POST , "CREATE_BY");
$_modify_on = filter_input(INPUT_POST , "MODIFY_ON");
$_modify_by = filter_input(INPUT_POST , "MODIFY_BY");
$_is_active = filter_input(INPUT_POST , "IS_ACTIVE");


$__led->setAc_voucher_id($_ac_voucher_id);
$__led->setSl_no($_sl_no);
$__led->setLongdate($_longdate);
$__led->setParticulars($_particulars);
$__led->setNote($_note);
$__led->setVoucher_type($_voucher_type);
$__led->setVoucher_no($_voucher_no);
$__led->setLedger_id($_ledger_id);
$__led->setVoucher_id($_voucher_id);
$__led->setCredit($_credit);
$__led->setDebit($_debit);
$__led->setCrdr($_crdr);
$__led->setBalance($_balance);
$__led->setStatus($_status);
$__led->setCreate_on($_create_on);
$__led->setCreate_by($_create_by);
$__led->setModify_on($_modify_on);
$__led->setModify_by($_modify_by);
$__led->setIs_active($_is_active);

if($__led->Insert()==1){$response["SUCCESS"] = 1;}

echo json_encode($response);
exit();
 * 
 */

   
}
