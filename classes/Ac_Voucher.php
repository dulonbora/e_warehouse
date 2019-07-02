<?php

/**
 * Description of Ac_Voucher
 * date 2018/17/6
 * @author Dulon
 */



require_once '../db/Kanexon.php';
require_once '../models/Mdl_Ac_Voucher.php';

class Ac_Voucher extends Mdl_Ac_Voucher {
    
    private $conn = null;
    private $_table_name = "AC_VOUCHER";

    public function __construct() {
        parent::__construct();
        $Data = new Kanexon();
        $this->conn = $Data->getDb();
    }

    public function Insert(){
    $query = "INSERT INTO " . $this->_table_name . " (LONGDATE , PREFIX , FYEAR , NUM  , VOUCHER_ID , VOUCHER_NO , VOUCHER_TYPE , DR_LEDGER_ID , CR_LEDGER_ID , PARTICULARS , AMOUNT , MODE , INST_NO  , INST_DATE  , BANK_NAME  , REF_TYPE  , REF_NO  , REF_DATE  , REF_AMOUNT  , REF_DUE_DATE  , STATUS , CREATE_ON , CREATE_BY , MODIFY_BY  , MODIFY_ON  , IS_ACTIVE) 
            VALUES ( ? , ? , ? , ? , ? , ? , ? , ? , ? , ? , ? , ? , ? , ? , ? , ? , ? , ? , ? , ? , ? , ? , ? , ? , ? , ?) " ; 
    $success = 0;
    try{
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam (1 , $this->getLongdate()); 
            $stmt->bindParam (2 , $this->getPrefix()); 
            $stmt->bindParam (3 , $this->getFyear()); 
            $stmt->bindParam (4 , $this->getNum ()); 
            $stmt->bindParam (5 , $this->getVoucher_id()); 
            $stmt->bindParam (6 , $this->getVoucher_no()); 
            $stmt->bindParam (7 , $this->getVoucher_type()); 
            $stmt->bindParam (8 , $this->getDr_ledger_id()); 
            $stmt->bindParam (9 , $this->getCr_ledger_id()); 
            $stmt->bindParam (10 , $this->getParticulars()); 
            $stmt->bindParam (11 , $this->getAmount()); 
            $stmt->bindParam (12 , $this->getMode()); 
            $stmt->bindParam (13 , $this->getInst_no ()); 
            $stmt->bindParam (14 , $this->getInst_date ()); 
            $stmt->bindParam (15 , $this->getBank_name ()); 
            $stmt->bindParam (16 , $this->getRef_type ()); 
            $stmt->bindParam (17 , $this->getRef_no ()); 
            $stmt->bindParam (18 , $this->getRef_date ()); 
            $stmt->bindParam (19 , $this->getRef_amount ()); 
            $stmt->bindParam (20 , $this->getRef_due_date ()); 
            $stmt->bindParam (21 , $this->getStatus()); 
            $stmt->bindParam (22 , $this->getCreate_on()); 
            $stmt->bindParam (23 , $this->getCreate_by()); 
            $stmt->bindParam (24 , $this->getModify_by ()); 
            $stmt->bindParam (25 , $this->getModify_on ()); 
            $stmt->bindParam (26 , $this->getIs_active()); 

            $stmt->execute(); 
            $this->setId($this->conn->lastInsertId());
            
            $success = 1;}
    catch(PDOException $ex){ echo  $ex->getMessage(); } 
    return $success;}

 /*----------------------------------------------------------*/

/*
$response = array(); 
$response["SUCCESS"] = 0;

$__ac_ = new Ac_Voucher();

$_logdate = filter_input(INPUT_POST , "LOGDATE");
$_prefix = filter_input(INPUT_POST , "PREFIX");
$_fyear = filter_input(INPUT_POST , "FYEAR");
$_num  = filter_input(INPUT_POST , "NUM ");
$_voucher_id = filter_input(INPUT_POST , "VOUCHER_ID");
$_voucher_no = filter_input(INPUT_POST , "VOUCHER_NO");
$_voucher_type = filter_input(INPUT_POST , "VOUCHER_TYPE");
$_dr_ledger_id = filter_input(INPUT_POST , "DR_LEDGER_ID");
$_cr_ledger_id = filter_input(INPUT_POST , "CR_LEDGER_ID");
$_particulars = filter_input(INPUT_POST , "PARTICULARS");
$_amount = filter_input(INPUT_POST , "AMOUNT");
$_mode = filter_input(INPUT_POST , "MODE");
$_inst_no  = filter_input(INPUT_POST , "INST_NO ");
$_inst_date  = filter_input(INPUT_POST , "INST_DATE ");
$_bank_name  = filter_input(INPUT_POST , "BANK_NAME ");
$_ref_type  = filter_input(INPUT_POST , "REF_TYPE ");
$_ref_no  = filter_input(INPUT_POST , "REF_NO ");
$_ref_date  = filter_input(INPUT_POST , "REF_DATE ");
$_ref_amount  = filter_input(INPUT_POST , "REF_AMOUNT ");
$_ref_due_date  = filter_input(INPUT_POST , "REF_DUE_DATE ");
$_status = filter_input(INPUT_POST , "STATUS");
$_create_on = filter_input(INPUT_POST , "CREATE_ON");
$_create_by = filter_input(INPUT_POST , "CREATE_BY");
$_modify_by  = filter_input(INPUT_POST , "MODIFY_BY ");
$_modify_on  = filter_input(INPUT_POST , "MODIFY_ON ");
$_is_active = filter_input(INPUT_POST , "IS_ACTIVE");


$__ac_->setLogdate($_logdate);
$__ac_->setPrefix($_prefix);
$__ac_->setFyear($_fyear);
$__ac_->setNum ($_num );
$__ac_->setVoucher_id($_voucher_id);
$__ac_->setVoucher_no($_voucher_no);
$__ac_->setVoucher_type($_voucher_type);
$__ac_->setDr_ledger_id($_dr_ledger_id);
$__ac_->setCr_ledger_id($_cr_ledger_id);
$__ac_->setParticulars($_particulars);
$__ac_->setAmount($_amount);
$__ac_->setMode($_mode);
$__ac_->setInst_no ($_inst_no );
$__ac_->setInst_date ($_inst_date );
$__ac_->setBank_name ($_bank_name );
$__ac_->setRef_type ($_ref_type );
$__ac_->setRef_no ($_ref_no );
$__ac_->setRef_date ($_ref_date );
$__ac_->setRef_amount ($_ref_amount );
$__ac_->setRef_due_date ($_ref_due_date );
$__ac_->setStatus($_status);
$__ac_->setCreate_on($_create_on);
$__ac_->setCreate_by($_create_by);
$__ac_->setModify_by ($_modify_by );
$__ac_->setModify_on ($_modify_on );
$__ac_->setIs_active($_is_active);

if($__ac_->Insert()==1){$response["SUCCESS"] = 1;}

echo json_encode($response);
exit();
    */
    
    
    
    public function ChecAlreadyExit($consignment_id) {
        $ok = 0;
        $query = "SELECT * FROM " . $this->_table_name . " WHERE VOUCHER_ID = ? ";
        try {
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(1, $consignment_id);
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($row) {
                $ok = 1;
            }
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }

        return $ok;
    }
        
    public function LoadValue($id) {
        $Q = "SELECT * FROM " . $this->_table_name . " WHERE ID = ? ";
        $ok = 0;
        try {
            $stmt = $this->conn->prepare($Q);
            $stmt->bindParam(1, $id);
            $stmt->execute();
            $row = $stmt->fetch();
            if ($row > 0) {
                $this->valueLoader($row);
                $ok = 1;
            }
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $ok;
    }
    
    public function valueLoader($row){
            $this->setId($row['ID']);
            $this->setLongdate($row['LONGDATE']);
            $this->setPrefix($row['PREFIX']);
            $this->setFyear($row['FYEAR']);
            $this->setNum($row['NUM']);
            $this->setVoucher_id($row['VOUCHER_ID']);
            $this->setVoucher_no($row['VOUCHER_NO']);
            $this->setVoucher_type($row['VOUCHER_TYPE']);
            $this->setDr_ledger_id($row['DR_LEDGER_ID']);
            $this->setCr_ledger_id($row['CR_LEDGER_ID']);
            $this->setParticulars($row['PARTICULARS']);
            $this->setAmount($row['AMOUNT']);
            $this->setMode($row['MODE']);
            $this->setInst_no($row['INST_NO']);
            $this->setInst_date($row['INST_DATE']);
            $this->setBank_name($row['BANK_NAME']);
            $this->setRef_type($row['REF_TYPE']);
            $this->setRef_no($row['REF_NO']);
            $this->setRef_date($row['REF_DATE']);
            $this->setRef_amount($row['REF_AMOUNT']);
            $this->setRef_due_date($row['REF_DUE_DATE']);
            $this->setStatus($row['STATUS']);
            $this->setCreate_on($row['CREATE_ON']);
            $this->setCreate_by($row['CREATE_BY']);
            $this->setModify_by($row['MODIFY_BY']);
            $this->setModify_on($row['MODIFY_ON']);
            $this->setIs_active($row['IS_ACTIVE']);            

    }
    
    
    
    public function UpdateAc_Voucher($id){
    $query = "UPDATE COMPANY SET MODE = ? , INST_NO = ? , INST_DATE = ? , BANK_NAME = ? WHERE VOUCHER_ID = ? ";
    $success = 0;
    try{
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam (1 , $this->getMode()); 
            $stmt->bindParam (2 , $this->getInst_no()); 
            $stmt->bindParam (3 , $this->getInst_date()); 
            $stmt->bindParam (4 , $this->getBank_name()); 
            $stmt->bindParam (5 , $id); 

            $stmt->execute(); 
            $success = 1;}
    catch(PDOException $ex){ echo  $ex->getMessage(); } 
    return $success;}



    
}
