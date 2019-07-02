<?php

require_once '../db/Kanexon.php';
require_once '../models/Mdl_Mix_Item_View.php';


class Mix__Item__List__View extends Mdl_Mix_Item_View{
    
    private $conn = null;
    private $_view_name = "VIEW_MIX_ITEM_MASTER";

    public function __construct() {
        parent::__construct();
        $Data = new Kanexon();
        $this->conn = $Data->getDb();
    }
    //put your code here
    
    

    public function TotalCount() {
        $Q = "SELECT COUNT(*) AS TOTAL FROM ". $this->_view_name ."";
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
        $Q = "SELECT * FROM ". $this->_view_name ." ORDER BY ID DESC LIMIT " . $start . " ," . $limit . " ";
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
    

    public function TotalCountByUser($user_id) {
        $Q = "SELECT COUNT(*) AS TOTAL FROM ". $this->_view_name ." WHERE CREATE_BY = ? ";
        $total = 0;
        try {
            $stmt = $this->conn->prepare($Q);
            $stmt->bindParam(1, $user_id);
            $stmt->execute();
            $total = $stmt->fetchColumn();
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $total;
    }
    

    public function TotalCountByUserByType($user_id, $item_type) {
        $Q = "SELECT COUNT(*) AS TOTAL FROM ". $this->_view_name ." WHERE CREATE_BY = ? AND ITEM_TYPE = ? ";
        $total = 0;
        try {
            $stmt = $this->conn->prepare($Q);
            $stmt->bindParam(1, $user_id);
            $stmt->bindParam(2, $item_type);
            $stmt->execute();
            $total = $stmt->fetchColumn();
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $total;
    }
    
    
    public function loadAllPaggingByUserByType($user_id, $item_type, $start, $limit) {
        $Q = "SELECT * FROM ". $this->_view_name ." WHERE CREATE_BY = ? AND ITEM_TYPE = ? ORDER BY ID DESC LIMIT " . $start . " ," . $limit . " ";
        $result = null;
        try {
            $stmt = $this->conn->prepare($Q);
            $stmt->bindParam(1, $user_id);
            $stmt->bindParam(2, $item_type);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $result;
    }

    public function TotalCountByUserSearch($user_id, $_str) {
        $Q = "SELECT COUNT(*) AS TOTAL FROM ". $this->_view_name ." WHERE USER_ID = ? AND ITEM_NAME LIKE :str_search ";
        $total = 0;
        try {
            $stmt = $this->conn->prepare($Q);
            $stmt->bindParam(1, $user_id);
            $stmt->bindValue(':str_search' , "%".$_str."%");
            $stmt->execute();
            $total = $stmt->fetchColumn();
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $total;
    }
    
    

    public function loadAllPaggingByUser($user_id, $start, $limit) {
        $Q = "SELECT * FROM ". $this->_view_name ." WHERE CREATE_BY = ? ORDER BY ID DESC LIMIT " . $start . " ," . $limit . " ";
        $result = null;
        try {
            $stmt = $this->conn->prepare($Q);
            $stmt->bindParam(1, $user_id);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $result;
    }


    public function TotalCountByCategoy($columnName, $values) {
        $Q = "SELECT COUNT(*) AS TOTAL FROM ". $this->_view_name ." WHERE " . $columnName . " = ? ";
        $total = 0;
        try {
            $stmt = $this->conn->prepare($Q);
            $stmt->bindParam(1, $values);
            $stmt->execute();
            $total = $stmt->fetchColumn();
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $total;
    }

    public function loadAllPaggingByCategoy($columnName, $values, $start, $limit) {
        $Q = "SELECT * FROM ". $this->_view_name ." WHERE " . $columnName . " = ? ORDER BY ID DESC LIMIT " . $start . " ," . $limit . " ";
        $result = null;
        try {
            $stmt = $this->conn->prepare($Q);
            $stmt->bindParam(1, $values);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $result;
    }
    
        public function LoadValue($id) {
        $Q = "SELECT * FROM ".$this->_view_name." WHERE ID = ? ";
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
            $this->setItemId($row['ITEM_ID']);
            $this->setPackingId($row['PACKING_ID']);
            $this->setMlPerCase($row['ML_PER_CASE']);
            $this->setItemName($row['ITEM_NAME']);
            $this->setStrangth($row['STRANGTH']);
            $this->setGroupId($row['GROUP_ID']);
            $this->setGroupName($row['GROUP_NAME']);
            $this->setCategoryId($row['CATEGORY_ID']);
            $this->setCategoryName($row['CATEGORY_NAME']);
            $this->setTypeId($row['TYPE_ID']);
            $this->setTypeName($row['TYPE_NAME']);
            $this->setIsImported($row['IS_IMPORTED']);
            $this->setIsNew($row['IS_NEW']);
            $this->setItemFor($row['ITEM_FOR']);
            $this->setImageLink($row['IMAGE_LINK']);
            $this->setDescription($row['DESCRIPTION']);
            $this->setUnit($row['UNIT']);
            $this->setSubUnit($row['SUB_UNIT']);
            $this->setSubUnitValue($row['SUB_UNIT_VALUE']);
            $this->setItemType($row['ITEM_TYPE']);
            $this->setOpeningStockUnit($row['OPENING_STOCK_UNIT']);
            $this->setOpeningStockSubUnit($row['OPENING_STOCK_SUB_UNIT']);
            $this->setCloseingStockUnit($row['CLOSEING_STOCK_UNIT']);
            $this->setCloseingStockSubUnit($row['CLOSEING_STOCK_SUB_UNIT']);
            $this->setCloseingStockStr($row['CLOSEING_STOCK_STR']);
            $this->setStatus($row['STATUS']);
            $this->setCreateOn($row['CREATE_ON']);
            $this->setCreateBy($row['CREATE_BY']);
            

    }
    
    

}
