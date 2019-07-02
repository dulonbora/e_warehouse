<?php

require_once '../db/Kanexon.php';
require_once '../models/Mdl_Transfar_Master.php';

class Transfar_Master extends Mdl_Transfar_Master {

    private $conn = null;
    private $_table_name = "TRANSFAR_MASTER";

    public function __construct() {
        parent::__construct();
        $Data = new Kanexon();
        $this->conn = $Data->getDb();
    }

    public function Insert() {
        $query = "INSERT INTO " . $this->_table_name . "(USER_FROM , USER_TO , TOO , FYEAR , VCH_TYPE , SL_NO , MODE , VOUCHER_NO , LONGDATE , ORDER_NO , ORDER_DATE , BILL_NO , BILL_DATE , CONVERTED , DELIVERY_MODE , DELIVERY_NOTE , OTHER_NOTE , ITEM_TOTAL , AVD_AMOUNT , AVD_AMOUNT_STATUS , PASS_AMOUNT , PASS_AMOUNT_STATUS , VAT_AMOUNT , VAT_AMOUNT_STATUS , COST_PRICE , COST_PRICE_STATUS , TOTAL_TCS , OTHER_CHARGE , CHARGED_AMOUNT , ADJUSTMENT , GRAND_TOTAL , CREATE_BY , CREATE_ON , MODIFY_BY , MODIFY_ON , STATUS , IS_ACTIVE) 
	VALUES ( ? , ? , ? , ? , ? , ? , ? , ? , ? , ? , ? , ? , ? , ? , ? , ? , ? , ? , ? , ? , ? , ? , ? , ? , ? , ? , ? , ? , ? , ? , ? , ? , ? , ? , ? , ? , ?) ";
        $success = 0;
        try {
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(1, $this->getUser_from());
            $stmt->bindParam(2, $this->getUser_to());
            $stmt->bindParam(3, $this->getToo());
            $stmt->bindParam(4, $this->getFyear());
            $stmt->bindParam(5, $this->getVch_type());
            $stmt->bindParam(6, $this->getSl_no());
            $stmt->bindParam(7, $this->getMode());
            $stmt->bindParam(8, $this->getVoucher_no());
            $stmt->bindParam(9, $this->getLongdate());
            $stmt->bindParam(10, $this->getOrder_no());
            $stmt->bindParam(11, $this->getOrder_date());
            $stmt->bindParam(12, $this->getBill_no());
            $stmt->bindParam(13, $this->getBill_date());
            $stmt->bindParam(14, $this->getConverted());
            $stmt->bindParam(15, $this->getDelivery_mode());
            $stmt->bindParam(16, $this->getDelivery_note());
            $stmt->bindParam(17, $this->getOther_note());
            $stmt->bindParam(18, $this->getItem_total());
            $stmt->bindParam(19, $this->getAvd_amount());
            $stmt->bindParam(20, $this->getAvd_amount_status());
            $stmt->bindParam(21, $this->getPass_amount());
            $stmt->bindParam(22, $this->getPass_amount_status());
            $stmt->bindParam(23, $this->getVat_amount());
            $stmt->bindParam(24, $this->getVat_amount_status());
            $stmt->bindParam(25, $this->getCost_price());
            $stmt->bindParam(26, $this->getCost_price_status());
            $stmt->bindParam(27, $this->getTotal_tcs());
            $stmt->bindParam(28, $this->getOther_charge());
            $stmt->bindParam(29, $this->getCharged_amount());
            $stmt->bindParam(30, $this->getAdjustment());
            $stmt->bindParam(31, $this->getGrand_total());
            $stmt->bindParam(32, $this->getCreate_by());
            $stmt->bindParam(33, $this->getCreate_on());
            $stmt->bindParam(34, $this->getModify_by());
            $stmt->bindParam(35, $this->getModify_on());
            $stmt->bindParam(36, $this->getStatus());
            $stmt->bindParam(37, $this->getIs_active());

            $stmt->execute();
            $success = 1;
            $this->setId($this->conn->lastInsertId());
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $success;
    }
    
    public function UpdateFromEnaConsignment() {
        $query = "UPDATE " . $this->_table_name . " SET ITEM_TOTAL  = ? , AVD_AMOUNT  = ?, PASS_AMOUNT  = ?, VAT_AMOUNT  = ?, COST_PRICE = ?, TOTAL_TCS  = ?, GRAND_TOTAL  = ? WHERE ID = ? ";
        $success = 0;
        try {
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(1, $this->getItem_total());
            $stmt->bindParam(2, $this->getAvd_amount());
            $stmt->bindParam(3, $this->getPass_amount());
            $stmt->bindParam(4, $this->getVat_amount());
            $stmt->bindParam(5, $this->getCost_price());
            $stmt->bindParam(6, $this->getTotal_tcs());
            $stmt->bindParam(7, $this->getGrand_total());
            $stmt->bindParam(8, $this->getId());


            $stmt->execute();
            $success = 1;
            $this->setId($this->conn->lastInsertId());
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $success;
    }
    
        public function returnUserToo($id) {
        $Q = "SELECT USER_TO FROM " . $this->_table_name . " WHERE ID = ? ";
        $ok = 0;
        try {
            $stmt = $this->conn->prepare($Q);
            $stmt->bindParam (1 , $id);
            $stmt->execute();
            $row = $stmt->fetch();
            if ($row > 0) {
                $ok = $row['USER_TO'];
            }   
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $ok;
    }
    
        public function returnUserFrom($id) {
        $Q = "SELECT USER_FROM FROM " . $this->_table_name . " WHERE ID = ? ";
        $ok = 0;
        try {
            $stmt = $this->conn->prepare($Q);
            $stmt->bindParam (1 , $id);
            $stmt->execute();
            $row = $stmt->fetch();
            if ($row > 0) {
                $ok = $row['USER_FROM'];
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
            $this->setUser_from($row['USER_FROM']);
            $this->setUser_to($row['USER_TO']);
            $this->setToo($row['TOO']);
            $this->setFyear($row['FYEAR']);
            $this->setVch_type($row['VCH_TYPE']);
            $this->setSl_no($row['SL_NO']);
            $this->setMode($row['MODE']);
            $this->setVoucher_no($row['VOUCHER_NO']);
            $this->setLongdate($row['LONGDATE']);
            $this->setOrder_no($row['ORDER_NO']);
            $this->setOrder_date($row['ORDER_DATE']);
            $this->setBill_no($row['BILL_NO']);
            $this->setBill_date($row['BILL_DATE']);
            $this->setConverted($row['CONVERTED']);
            $this->setDelivery_mode($row['DELIVERY_MODE']);
            $this->setDelivery_note($row['DELIVERY_NOTE']);
            $this->setOther_note($row['OTHER_NOTE']);
            $this->setItem_total($row['ITEM_TOTAL']);
            $this->setAvd_amount($row['AVD_AMOUNT']);
            $this->setAvd_amount_status($row['AVD_AMOUNT_STATUS']);
            $this->setPass_amount($row['PASS_AMOUNT']);
            $this->setPass_amount_status($row['PASS_AMOUNT_STATUS']);
            $this->setVat_amount($row['VAT_AMOUNT']);
            $this->setVat_amount_status($row['VAT_AMOUNT_STATUS']);
            $this->setCost_price($row['COST_PRICE']);
            $this->setCost_price_status($row['COST_PRICE_STATUS']);
            $this->setTotal_tcs($row['TOTAL_TCS']);
            $this->setOther_charge($row['OTHER_CHARGE']);
            $this->setCharged_amount($row['CHARGED_AMOUNT']);
            $this->setAdjustment($row['ADJUSTMENT']);
            $this->setGrand_total($row['GRAND_TOTAL']);
            $this->setCreate_by($row['CREATE_BY']);
            $this->setCreate_on($row['CREATE_ON']);
            $this->setModify_by($row['MODIFY_BY']);
            $this->setModify_on($row['MODIFY_ON']);
            $this->setStatus($row['STATUS']);
            $this->setIs_active($row['IS_ACTIVE']);

    }


    /* ---------------------------------------------------------- */
    
    public function TotalCountByUser($user_id, $voucher_type) {
        $Q = "SELECT COUNT(*) AS TOTAL FROM ". $this->_table_name ." WHERE CREATE_BY = ? AND VCH_TYPE = ? ";
        $total = 0;
        try {
            $stmt = $this->conn->prepare($Q);
            $stmt->bindParam (1 , $user_id);
            $stmt->bindParam (2 , $voucher_type);
            $stmt->execute();
            $total = $stmt->fetchColumn();
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $total;
    }

    public function loadAllPaggingByUserId($user_id, $voucher_type, $start, $limit) {
        $Q = "SELECT * FROM ". $this->_table_name ."  WHERE CREATE_BY = ? AND VCH_TYPE = ? ORDER BY ID DESC LIMIT " . $start . " ," . $limit . " ";
        $result = null;
        try {
            $stmt = $this->conn->prepare($Q);
            $stmt->bindParam (1 , $user_id);
            $stmt->bindParam (2 , $voucher_type);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $result;
    }
    
    public function TotalCountByUserByStatus($user_id, $status, $voucher_type) {
        $Q = "SELECT COUNT(*) AS TOTAL FROM ". $this->_table_name ." WHERE CREATE_BY = ? AND STATUS = ? AND VCH_TYPE = ? AND IS_ACTIVE = 'YES' ";
        $total = 0;
        try {
            $stmt = $this->conn->prepare($Q);
            $stmt->bindParam (1 , $user_id);
            $stmt->bindParam (2 , $status);
            $stmt->bindParam (3 , $voucher_type);
            $stmt->execute();
            $total = $stmt->fetchColumn();
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $total;
    }

    public function loadAllPaggingByUserIdByStatus($user_id, $status, $voucher_type, $start, $limit) {
        $Q = "SELECT * FROM ". $this->_table_name ."  WHERE CREATE_BY = ? AND STATUS = ? AND VCH_TYPE = ? AND  IS_ACTIVE = 'YES' ORDER BY ID DESC LIMIT " . $start . " ," . $limit . " ";
        $result = null;
        try {
            $stmt = $this->conn->prepare($Q);
            $stmt->bindParam (1 , $user_id);
            $stmt->bindParam (2 , $status);
            $stmt->bindParam (3 , $voucher_type);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $result;
    }

    public function TotalCountByFromUser($user_id, $status, $VCH_TYPE) {
        $Q = "SELECT COUNT(*) AS TOTAL FROM ". $this->_table_name ." WHERE USER_FROM = ? AND STATUS = ? AND VCH_TYPE = ? AND IS_ACTIVE = 'YES'";
        $total = 0;
        try {
            $stmt = $this->conn->prepare($Q);
            $stmt->bindParam (1 , $user_id);
            $stmt->bindParam (2 , $status);
            $stmt->bindParam (3 , $VCH_TYPE);
            $stmt->execute();
            $total = $stmt->fetchColumn();
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $total;
    }

    public function loadAllPaggingByFromUserId($user_id, $status, $VCH_TYPE, $start, $limit) {
        $Q = "SELECT * FROM ". $this->_table_name ."  WHERE USER_FROM = ? AND STATUS = ? AND VCH_TYPE = ? AND IS_ACTIVE = 'YES' ORDER BY ID DESC LIMIT " . $start . " ," . $limit . " ";
        $result = null;
        try {
            $stmt = $this->conn->prepare($Q);
            $stmt->bindParam (1 , $user_id);
            $stmt->bindParam (2 , $status);
            $stmt->bindParam (3 , $VCH_TYPE);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $result;
    }
    
    
        public function UpdateStatus($id, $status) {        
        $query = " UPDATE " . $this->_table_name . " SET STATUS = ? WHERE ID = ? ";
        $success = 0;
        try {
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(1, $status);
            $stmt->bindParam(2, $id);

            $stmt->execute();
            $success = 1;
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $success;
    }
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
    
    
    
    public function StatusForOrder($id) {
        $type = "";
        switch ($id) {
            case 1:
                $type = "Active";
                break;
            case 2:
                $type = "Confirmed";
                break;
            case 3:
                $type = "Order Pending";
                break;
            case 4:
                $type = "Order Confirmed";
                break;
            case 5:
                $type = "Ready for Dispatched";
                break;
            case 6:
                $type = "Dispatched";
                break;
            case 7:
                $type = "Excuted";
                break;
         
        }
        return $type;
    }
    
    
    public function Status($id) {
        $type = "";
        switch ($id) {
            case 1:
                $type = "Active";
                break;
            case 2:
                $type = "Confirmed";
                break;
            case 3:
                $type = "Order Pending";
                break;
            case 4:
                $type = "Order Confirmed";
                break;
            case 5:
                $type = "Ready for Dispatched";
                break;
            case 6:
                $type = "Dispatched";
                break;
            case 7:
                $type = "Excuted";
                break;
         
        }
        return $type;
    }

    
    

    
}
