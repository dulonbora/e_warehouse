<?php

require_once '../db/Kanexon.php';


class Imfl_Stock_Counter{
    
    private $conn = null;
    private $_view_name = "VIEW_USER_ITEM_LIST";

    public function __construct() {
        $Data = new Kanexon();
        $this->conn = $Data->getDb();
    }
    //put your code here
    
      
    public function Total_Count_Opening_Stock($packing_id) {
        $Q = "SELECT SUM(OPENING_STOCK) AS TOTAL FROM ".$this->_view_name." WHERE PACKING_ID = ?";
        $ok = 0;
        try {
            $stmt = $this->conn->prepare($Q);
            $stmt->bindParam (1 , $packing_id);
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
    public function Total_Count_Inward_Stock($packing_id) {
        $Q = "SELECT SUM(INWARD_STOCK) AS TOTAL FROM ".$this->_view_name." WHERE PACKING_ID = ?";
        $ok = 0;
        try {
            $stmt = $this->conn->prepare($Q);
            $stmt->bindParam (1 , $packing_id);
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
    public function Total_Count_Outward_Stock($packing_id) {
        $Q = "SELECT SUM(OUTWARD_STOCK) AS TOTAL FROM ".$this->_view_name." WHERE PACKING_ID = ?";
        $ok = 0;
        try {
            $stmt = $this->conn->prepare($Q);
            $stmt->bindParam (1 , $packing_id);
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
    public function Total_Count_Lost_Stock($packing_id) {
        $Q = "SELECT SUM(LOST_STOCK) AS TOTAL FROM ".$this->_view_name." WHERE PACKING_ID = ?";
        $ok = 0;
        try {
            $stmt = $this->conn->prepare($Q);
            $stmt->bindParam (1 , $packing_id);
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
    public function Total_Count_Production_Stock($packing_id) {
        $Q = "SELECT SUM(PRODIUCTING_STOCK) AS TOTAL FROM ".$this->_view_name." WHERE PACKING_ID = ?";
        $ok = 0;
        try {
            $stmt = $this->conn->prepare($Q);
            $stmt->bindParam (1 , $packing_id);
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
    public function Total_Count_Produced_Stock($packing_id) {
        $Q = "SELECT SUM(PRODIUCED_STOCK) AS TOTAL FROM ".$this->_view_name." WHERE PACKING_ID = ?";
        $ok = 0;
        try {
            $stmt = $this->conn->prepare($Q);
            $stmt->bindParam (1 , $packing_id);
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
    
    public function Total_Count_Closeing_Stock($packing_id) {
        $Q = "SELECT SUM(CLOSEING_STOCK) AS TOTAL FROM ".$this->_view_name." WHERE PACKING_ID = ?";
        $ok = 0;
        try {
            $stmt = $this->conn->prepare($Q);
            $stmt->bindParam (1 , $packing_id);
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
}
