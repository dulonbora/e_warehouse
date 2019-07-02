<?php
require_once '../db/Kanexon.php';
require_once '../models/Mdl_Massage.php';

class Masage extends Mdl_Massage{
    
    private $conn = null;
    private $_table_name = "MASSAGE";

    public function __construct() {
        parent::__construct();
        $Data = new Kanexon();
        $this->conn = $Data->getDb();
    }
    
    public function Insert() {
        $query = "INSERT INTO ".$this->_table_name."(USER_ID , TO_USER_ID , DISTRICT_ID , MODULE_TYPE , MASSAGE_TYPE , NOTE , DESIGNATION , ACTION , STATUS , CREATE_ON , CREATE_BY , MODIFY_ON , MODIFY_BY , IS_ACTIVE, MODULE_IDS) 
	VALUES ( ? , ? , ? , ? , ? , ? , ? , ? , ? , ? , ? , ? , ? , ?, ?) ";
        $success = 0;
        try {
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(1, $this->getUser_id());
            $stmt->bindParam(2, $this->getTo_user_id());
            $stmt->bindParam(3, $this->getDistrict_id());
            $stmt->bindParam(4, $this->getModule_type());
            $stmt->bindParam(5, $this->getMassage_type());
            $stmt->bindParam(6, $this->getNote());
            $stmt->bindParam(7, $this->getDesignation());
            $stmt->bindParam(8, $this->getAction());
            $stmt->bindParam(9, $this->getStatus());
            $stmt->bindParam(10, $this->getCreate_on());
            $stmt->bindParam(11, $this->getCreate_by());
            $stmt->bindParam(12, $this->getModify_on());
            $stmt->bindParam(13, $this->getModify_by());
            $stmt->bindParam(14, $this->getIs_active());
            $stmt->bindParam(15, $this->getModule_ids());

            $stmt->execute();
            $success = 1;
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $success;
    }
    
    
    
        public function TotalCount($m_type, $M_ids) {
        $Q = "SELECT COUNT(*) AS TOTAL FROM " . $this->_table_name . " WHERE MODULE_TYPE = ? AND MODULE_IDS = ? AND IS_ACTIVE = 'YES' ";
        $total = 0;
        try {
            $stmt = $this->conn->prepare($Q);
            $stmt->bindParam (1 , $m_type);
            $stmt->bindParam (2 , $M_ids);
            $stmt->execute();
            $total = $stmt->fetchColumn();
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $total;
    }

    public function loadAllPagging($start, $limit, $m_type, $M_ids) {
        $Q = "SELECT * FROM " . $this->_table_name . " WHERE MODULE_TYPE = ? AND MODULE_IDS = ? AND IS_ACTIVE = 'YES' ORDER BY ID DESC LIMIT " . $start . " ," . $limit . " ";
        $result = null;
        try {
            $stmt = $this->conn->prepare($Q);
            $stmt->bindParam (1 , $m_type);
            $stmt->bindParam (2 , $M_ids);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $result;
    }

}
