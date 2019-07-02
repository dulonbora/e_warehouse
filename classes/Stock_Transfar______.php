<?php
require_once '../db/Kanexon.php';
require_once '../classes/Stock_Fectory.php';

class Stock_Transfar______{
    
    private $conn = null;
    public function __construct() {
        $Data = new Kanexon();
        $this->conn = $Data->getDb();
    }


    /*
    public function LoadIdByPackingIdAndItemIdOut($itemId, $packingId, $userId) {
        $Q = "SELECT ID FROM USER_ITEM_LIST WHERE ITEM_ID = ? AND PACKING_ID = ? AND CREATE_BY = ?";
        $ok = 0;
        try {
            $stmt = $this->conn->prepare($Q);
            $stmt->bindParam (1 , $itemId);
            $stmt->bindParam (2 , $packingId);
            $stmt->bindParam (3 , $userId);
            $stmt->execute();
            $row = $stmt->fetch();
            $ok   = $row['ID'];
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $ok;
    }
    
    public function LoadIdByPackingIdAndItemIdIn($itemId, $packingId, $userId) {
        $Q = "SELECT ID, CURRENT_STOCK_BOTTLE FROM USER_ITEM_LIST WHERE ITEM_ID = ? AND PACKING_ID = ? AND CREATE_BY = ?";
        $ok = 0;
        try {
            $stmt = $this->conn->prepare($Q);
            $stmt->bindParam (1 , $itemId);
            $stmt->bindParam (2 , $packingId);
            $stmt->bindParam (3 , $userId);
            $stmt->execute();
            $row = $stmt->fetch();
            $ok = $row['ID'];
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $ok;
    }
    */
    
    
    
    
    
    
    
    
    public function UpdateStockIn($id, $subUnitValue) {
        $query = "UPDATE USER_ITEM_LIST SET CURRENT_STOCK_BOTTLE = CURRENT_STOCK_BOTTLE+".$subUnitValue." WHERE ID = ? ";
        $success = 0;
        try {
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(1, $id);
            $stmt->execute();
            $success = 1;
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $success;
    }
    
    public function UpdateStockOut($id, $subUnitValue) {
        $query = "UPDATE USER_ITEM_LIST SET CURRENT_STOCK_BOTTLE = CURRENT_STOCK_BOTTLE-".$subUnitValue." WHERE ID = ? ";
        $success = 0;
        try {
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(1, $id);
            $stmt->execute();
            $success = 1;
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $success;
    }
    

}
