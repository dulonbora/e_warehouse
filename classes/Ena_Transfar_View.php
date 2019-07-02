<?php

require_once '../db/Kanexon.php';
require_once '../models/Mdl_Ena_Transfar_View.php';

class Ena_Transfar_View extends Mdl_Ena_Transfar_View{
   
    private $conn = null;
    private $_table_view = "VIEW_ENA_TRANSFAR";

    public function __construct() {
        parent::__construct();
        $Data = new Kanexon();
        $this->conn = $Data->getDb();
    }
    
 /*----------------------------------------------------------*/
    public function TotalCount($status) {
        $Q = "SELECT COUNT(*) AS TOTAL FROM ".$this->_table_view." WHERE STATUS = ? ";
        $total = 0;
        try {
            $stmt = $this->conn->prepare($Q);
            $stmt->bindParam(1, $status);
            $stmt->execute();
            $total = $stmt->fetchColumn();
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $total;
    }
    
    public function TotalCountByIo_Type($status, $io_type) {
        $Q = "SELECT COUNT(*) AS TOTAL FROM ".$this->_table_view." WHERE STATUS = ? AND IO_TYPE = ? ";
        $total = 0;
        try {
            $stmt = $this->conn->prepare($Q);
            $stmt->bindParam(1, $status);
            $stmt->bindParam(2, $io_type);
            $stmt->execute();
            $total = $stmt->fetchColumn();
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $total;
    }
    
    public function loadAllPagging($start, $limit, $status) {
        $Q = "SELECT * FROM ".$this->_table_view." WHERE STATUS = ? ORDER BY ID DESC LIMIT " . $start . " ," . $limit . " ";
        $result = null;
        try {
            $stmt = $this->conn->prepare($Q);
            $stmt->bindParam(1, $status);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $result;
    }
    
    public function loadAllPaggingByIo_Type($start, $limit, $status, $io_type) {
        $Q = "SELECT * FROM ".$this->_table_view." WHERE STATUS = ? AND IO_TYPE = ? ORDER BY ID DESC LIMIT " . $start . " ," . $limit . " ";
        $result = null;
        try {
            $stmt = $this->conn->prepare($Q);
            $stmt->bindParam(1, $status);
            $stmt->bindParam(2, $io_type);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $result;
    }
    
    
    public function TotalCountUser($userId, $_user_item_id) {
        $Q = "SELECT COUNT(*) AS TOTAL FROM " . $this->_table_view . " WHERE CREATE_BY = ? AND USER_ITEM_ID = ? ";
        
        $total = 0;
        try {
            $stmt = $this->conn->prepare($Q);
            $stmt->bindParam(1, $userId);
            $stmt->bindParam(2, $_user_item_id);
            $stmt->execute();
            $total = $stmt->fetchColumn();
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $total;
    }

    public function loadAllPaggingUser($userId, $_user_item_id, $start, $limit) {
        $Q = "SELECT * FROM " . $this->_table_view . " WHERE CREATE_BY = ? AND USER_ITEM_ID = ? ORDER BY ID DESC LIMIT " . $start . " ," . $limit . " ";
        $result = null;
        try {
            $stmt = $this->conn->prepare($Q);
            $stmt->bindParam(1, $userId);
            $stmt->bindParam(2, $_user_item_id);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $result;
    }
    
    
    
    public function LoadValue($id) {
        $Q = "SELECT * FROM ".$this->_table_view." WHERE ID = ? ";
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

    public function valueLoader($row) {
        $this->setId($row['ID']);
        $this->setItem_id($row['ITEM_ID']);
        $this->setUser_item_id($row['USER_ITEM_ID']);
        $this->setItem_name($row['ITEM_NAME']);
        $this->setUser_from($row['USER_FROM']);
        $this->setUser_from_name($row['USER_FROM_NAME']);
        $this->setUser_to($row['USER_TO']);
        $this->setUser_from_name($row['USER_TO_NAME']);
        $this->setIo_type($row['IO_TYPE']);
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
    }

}
