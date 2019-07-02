<?php

require_once '../db/Kanexon.php';
require_once '../models/Mdl_Ena_Transfar.php';


class Ena__Transfar extends Mdl_Ena_Transfar{
    
    private $conn = null;
    private $_table_name = "ENA_TRANSFAR";

    public function __construct() {
        parent::__construct();
        $Data = new Kanexon();
        $this->conn = $Data->getDb();
    }
    
        //put your code here
    public function Insert(){
$query = "INSERT INTO ENA_TRANSFAR(ITEM_ID , USER_ITEM_ID , USER_FROM , USER_TO , TOO , IO_TYPE , MODE , 
        TRANK_NO , PERMIT_ID , BL , TOTAL_COST , TOTAL_FEE , TOTAL_VAT , TCS , TOTAL_MRP , TOTAL_AMOUNT , STATUS , 
        LONGDATE , CREATE_ON , CREATE_BY , MODIFY_ON , MODIFY_BY , IS_ACTIVE, MASTER_ID) 
	VALUES ( ? , ? , ? , ? , ? , ? , ? , ? , ? , ? , ? , ? , ? , ? , ? , ? , ? , ? , ? , ? , ? , ? , ? , ?) " ; 
$success = 0;
try{
	$stmt = $this->conn->prepare($query);
	$stmt->bindParam (1 , $this->getItem_id()); 
	$stmt->bindParam (2 , $this->getUser_item_id()); 
	$stmt->bindParam (3 , $this->getUser_from()); 
	$stmt->bindParam (4 , $this->getUser_to()); 
	$stmt->bindParam (5 , $this->getToo()); 
	$stmt->bindParam (6 , $this->getIo_type()); 
	$stmt->bindParam (7 , $this->getMode()); 
	$stmt->bindParam (8 , $this->getTrank_no()); 
	$stmt->bindParam (9 , $this->getPermit_id()); 
	$stmt->bindParam (10 , $this->getBl()); 
	$stmt->bindParam (11 , $this->getTotal_cost()); 
	$stmt->bindParam (12 , $this->getTotal_fee()); 
	$stmt->bindParam (13 , $this->getTotal_vat()); 
	$stmt->bindParam (14 , $this->getTcs()); 
	$stmt->bindParam (15 , $this->getTotal_mrp()); 
	$stmt->bindParam (16 , $this->getTotal_amount()); 
	$stmt->bindParam (17 , $this->getStatus()); 
	$stmt->bindParam (18 , $this->getLongdate()); 
	$stmt->bindParam (19 , $this->getCreate_on()); 
	$stmt->bindParam (20 , $this->getCreate_by()); 
	$stmt->bindParam (21 , $this->getModify_on()); 
	$stmt->bindParam (22 , $this->getModify_by()); 
	$stmt->bindParam (23 , $this->getIs_active()); 
	$stmt->bindParam (24 , $this->getMaster_id()); 

	$stmt->execute(); 
	$success = 1;}
catch(PDOException $ex){ echo  $ex->getMessage(); } 
return $success;}


 /*----------------------------------------------------------*/

/*
$response = array(); 
$response["SUCCESS"] = 0;

$__ena = new Ena__Transfar();

$_item_id = filter_input(INPUT_POST , "ITEM_ID");
$_user_item_id = filter_input(INPUT_POST , "USER_ITEM_ID");
$_user_from = filter_input(INPUT_POST , "USER_FROM");
$_user_to = filter_input(INPUT_POST , "USER_TO");
$_too = filter_input(INPUT_POST , "TOO");
$_io_type = filter_input(INPUT_POST , "IO_TYPE");
$_mode = filter_input(INPUT_POST , "MODE");
$_trank_no = filter_input(INPUT_POST , "TRANK_NO");
$_permit_id = filter_input(INPUT_POST , "PERMIT_ID");
$_bl = filter_input(INPUT_POST , "BL");
$_total_cost = filter_input(INPUT_POST , "TOTAL_COST");
$_total_fee = filter_input(INPUT_POST , "TOTAL_FEE");
$_total_vat = filter_input(INPUT_POST , "TOTAL_VAT");
$_tcs = filter_input(INPUT_POST , "TCS");
$_total_mrp = filter_input(INPUT_POST , "TOTAL_MRP");
$_total_amount = filter_input(INPUT_POST , "TOTAL_AMOUNT");
$_status = filter_input(INPUT_POST , "STATUS");
$_longdate = filter_input(INPUT_POST , "LONGDATE");
$_longdate = filter_input(INPUT_POST , "LONGDATE");
$_status = filter_input(INPUT_POST , "STATUS");
$_create_on = filter_input(INPUT_POST , "CREATE_ON");
$_create_by = filter_input(INPUT_POST , "CREATE_BY");
$_modify_on = filter_input(INPUT_POST , "MODIFY_ON");
$_modify_by = filter_input(INPUT_POST , "MODIFY_BY");
$_is_active = filter_input(INPUT_POST , "IS_ACTIVE");


$__ena->setItem_id($_item_id);
$__ena->setUser_item_id($_user_item_id);
$__ena->setUser_from($_user_from);
$__ena->setUser_to($_user_to);
$__ena->setToo($_too);
$__ena->setIo_type($_io_type);
$__ena->setMode($_mode);
$__ena->setTrank_no($_trank_no);
$__ena->setPermit_id($_permit_id);
$__ena->setBl($_bl);
$__ena->setTotal_cost($_total_cost);
$__ena->setTotal_fee($_total_fee);
$__ena->setTotal_vat($_total_vat);
$__ena->setTcs($_tcs);
$__ena->setTotal_mrp($_total_mrp);
$__ena->setTotal_amount($_total_amount);
$__ena->setStatus($_status);
$__ena->setLongdate($_longdate);
$__ena->setLongdate($_longdate);
$__ena->setStatus($_status);
$__ena->setCreate_on($_create_on);
$__ena->setCreate_by($_create_by);
$__ena->setModify_on($_modify_on);
$__ena->setModify_by($_modify_by);
$__ena->setIs_active($_is_active);

if($__ena->Insert()==1){$response["SUCCESS"] = 1;}

echo json_encode($response);
exit();
*/

    public function UpdateIoType($id) {        
        $query = " UPDATE " . $this->_table_name . " SET IO_TYPE = ? WHERE ID = ? ";
        $success = 0;
        try {
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(1, $this->getIoType());
            $stmt->bindParam(2, $id);

            $stmt->execute();
            $success = 1;
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $success;
    }
    
    public function UpdateStatus($id, $io_Type, $status){
    $query = "UPDATE ".$this->_table_name." SET IO_TYPE = ?, STATUS = ? WHERE ID = ? " ; 
    $success = 0;
    try{
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam (1 , $io_Type);
            $stmt->bindParam (2 , $status);
            $stmt->bindParam (3 , $id);

            $stmt->execute(); 
            $success = 1;}
    catch(PDOException $ex){ echo  $ex->getMessage(); } 
    return $success;}

 /*----------------------------------------------------------*/

    public function getOpeningStockId($user_item_id, $io_type) {
        $Q = "SELECT * FROM ".$this->_table_name." WHERE USER_ITEM_ID = ?  AND IO_TYPE = ? ";
        $ok = 0;
        try {
            $stmt = $this->conn->prepare($Q);
            $stmt->bindParam (1 , $user_item_id);
            $stmt->bindParam (2 , $io_type);
            $stmt->execute();
            $row = $stmt->fetch();
            if ($row > 0) {
                $ok = $row["ID"];
            }   
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $ok;
    }
    
    public function LoadValue($id) {
        $Q = "SELECT * FROM ".$this->_table_name." WHERE ID = ? ";
        $ok = 0;
        try {
            $stmt = $this->conn->prepare($Q);
            $stmt->bindParam (1 , $id);
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
            $this->setItem_id($row['ITEM_ID']);
            $this->setUser_item_id($row['USER_ITEM_ID']);
            $this->setUser_from($row['USER_FROM']);
            $this->setUser_to($row['USER_TO']);
            $this->setToo($row['TOO']);
            $this->setMode($row['MODE']);
            $this->setTrank_no($row['TRANK_NO']);
            $this->setPermit_id($row['PERMIT_ID']);
            $this->setBl($row['BL']);
            $this->setLongdate($row['LONGDATE']);
            $this->setStatus($row['STATUS']);
            $this->setCreate_on($row['CREATE_ON']);
            $this->setCreate_by($row['CREATE_BY']);
            $this->setModify_on($row['MODIFY_ON']);
            $this->setModify_by($row['MODIFY_BY']);
            $this->setIs_active($row['IS_ACTIVE']);
            $this->setIo_type($row['IO_TYPE']);

    }


 /*----------------------------------------------------------*/
    public function TotalCount() {
        $Q = "SELECT COUNT(*) AS TOTAL FROM ".$this->_table_name."";
        $total = 0;
        try {
            $stmt = $this->conn->prepare($Q);
            $stmt->execute();
            $total = $stmt->fetchColumn();
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $total;
    }
    
    public function loadAllPagging($start, $limit) {
        $Q = "SELECT * FROM ".$this->_table_name." ORDER BY ID DESC LIMIT " . $start . " ," . $limit . " ";
        $result = null;
        try {
            $stmt = $this->conn->prepare($Q);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $result;
    }
    
    
    public function TotalCountUser($_user_item_id) {
        $Q = "SELECT COUNT(*) AS TOTAL FROM " . $this->_table_name . " WHERE USER_ITEM_ID = ? ";
        
        $total = 0;
        try {
            $stmt = $this->conn->prepare($Q);
            $stmt->bindParam(1, $_user_item_id);
            $stmt->execute();
            $total = $stmt->fetchColumn();
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $total;
    }

    public function loadAllPaggingUser($_user_item_id, $start, $limit) {
        $Q = "SELECT * FROM " . $this->_table_name . " WHERE USER_ITEM_ID = ? ORDER BY ID DESC LIMIT " . $start . " ," . $limit . " ";
        $result = null;
        try {
            $stmt = $this->conn->prepare($Q);
            $stmt->bindParam(1, $_user_item_id);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $result;
    }
    
    
    public function TotalCountMasterId($master_id) {
        $Q = "SELECT COUNT(*) AS TOTAL FROM " . $this->_table_name . " WHERE MASTER_ID = ? AND IS_ACTIVE = 'YES' ";
        
        $total = 0;
        try {
            $stmt = $this->conn->prepare($Q);
            $stmt->bindParam(1, $master_id);
            $stmt->execute();
            $total = $stmt->fetchColumn();
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $total;
    }

    public function loadAllPaggingMasterId($master_id) {
        $Q = "SELECT * FROM " . $this->_table_name . " WHERE MASTER_ID = ? AND IS_ACTIVE = 'YES' ORDER BY ID DESC ";
        $result = null;
        try {
            $stmt = $this->conn->prepare($Q);
            $stmt->bindParam(1, $master_id);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $result;
    }

    
    public function getMainItemId($_id) {
        $_sl = 0;
        $Q = "SELECT ITEM_ID FROM ENA_USER_ITEM WHERE ID = ? ";
        try {

            $stmt = $this->conn->prepare($Q);
            $stmt->bindParam(1, $_id);
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($row > 0) {
                $_sl = $row["ITEM_ID"];
            }
        } catch (PDOException $ex) {
            echo $ex;
        }
        return $_sl;
    }
    
    
    public function GenerateMode($id) {
        $type = "";
        switch ($id) {
            case "I":
                $type = "IN WARD";
                break;
            case "O":
                $type = "OUT WARD";
                break;
            case "L":
                $type = "LOSE";
                break;
         
        }
        return $type;
    }
    
    
    
    
    //
    
    public function Total_Stock_By_Item_Id_And_Type($item_id, $io_type) {
        $Q = "SELECT SUM(BL) AS TOTAL FROM ".$this->_table_name." WHERE ITEM_ID = ?  AND IO_TYPE = ? AND IS_ACTIVE = 'YES'";
        $ok = 0;
        try {
            $stmt = $this->conn->prepare($Q);
            $stmt->bindParam (1 , $item_id);
            $stmt->bindParam (2 , $io_type);
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
    
    
    public function loadByMasterId($master_id) {
        $Q = "SELECT * FROM ". $this->_table_name ." WHERE MASTER_ID = ? AND IO_TYPE = 'C' AND IS_ACTIVE = 'YES' ORDER BY ID";
        $result = null;
        try {
            $stmt = $this->conn->prepare($Q);
            $stmt->bindParam(1, $master_id);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $this->valueLoader($result);
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $result;
    }
    
    




    

    
}
