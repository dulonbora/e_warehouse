<?php

require_once '../db/Kanexon.php';
require_once '../models/Mdl_Ena_User_Item.php';

class Ena__User__Item extends Mdl_Ena_User_Item {

    private $conn = null;
    private $_table_name = "ENA_USER_ITEM";

    public function __construct() {
        parent::__construct();
        $Data = new Kanexon();
        $this->conn = $Data->getDb();
    }

    //put your code here
    
    public function Insert(){
    $query = "INSERT INTO " . $this->_table_name . "(ITEM_ID , USER_ID , OPENING_STOCK , INWARD_STOCK , OUTWARD_STOCK , PRODIUCTING_STOCK , PRODIUCED_STOCK , LOST_STOCK , CLOSEING_STOCK , CREATE_ON , CREATE_BY , IS_ACTIVE, MRP, TAX_PERCENTAGE) 
            VALUES ( ? , ? , ? , ? , ? , ? , ? , ? , ? , ? , ? , ?, ?, ?) " ; 
    $success = 0;
    try{
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam (1 , $this->getItem_id()); 
            $stmt->bindParam (2 , $this->getUser_id()); 
            $stmt->bindParam (3 , $this->getOpening_stock()); 
            $stmt->bindParam (4 , $this->getInward_stock()); 
            $stmt->bindParam (5 , $this->getOutward_stock()); 
            $stmt->bindParam (6 , $this->getProdiucting_stock()); 
            $stmt->bindParam (7 , $this->getProdiuced_stock()); 
            $stmt->bindParam (8 , $this->getLost_stock()); 
            $stmt->bindParam (9 , $this->getCloseing_stock()); 
            $stmt->bindParam (10 , $this->getCreate_on()); 
            $stmt->bindParam (11 , $this->getCreate_by()); 
            $stmt->bindParam (12 , $this->getIs_active()); 
            $stmt->bindParam (13 , $this->getMrp()); 
            $stmt->bindParam (14 , $this->getTax_percentage()); 

            $stmt->execute(); 
            $success = 1;
            $this->setId($this->conn->lastInsertId());            
    }
    catch(PDOException $ex){ echo  $ex->getMessage(); } 
    return $success;}

 /*----------------------------------------------------------*/



    
    public function UpdateStock($id, $stock, $io_type) {
        
        $columnName = $this->GenerateColumn($io_type);
        if($io_type == "I" || $io_type == "P"){
        $query = "UPDATE " . $this->_table_name . " SET ". $columnName. " = ". $columnName. " + ".$stock.",  CLOSEING_STOCK = CLOSEING_STOCK + ".$stock." WHERE ID = ? ";
        }
        else {
        $query = "UPDATE " . $this->_table_name . " SET ". $columnName. " = ". $columnName. " + ".$stock.",  CLOSEING_STOCK = CLOSEING_STOCK - ".$stock." WHERE ID = ? ";
        }
        
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
    
    public function UpdateStockProuction($id, $stock) {
        
        $query = "UPDATE " . $this->_table_name . " SET PRODIUCTING_STOCK = PRODIUCTING_STOCK - ".$stock.", PRODIUCED_STOCK = PRODIUCED_STOCK + ".$stock." WHERE ID = ? ";
        
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
    

    public function getEnaStock($_id) {
        $_sl = 0;
        $Q = "SELECT CLOSEING_STOCK FROM " . $this->_table_name . " WHERE ID = ? ";
        try {

            $stmt = $this->conn->prepare($Q);
            $stmt->bindParam(1, $_id);
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($row > 0) {
                $_sl = $row["CLOSEING_STOCK"];
            }
        } catch (PDOException $ex) {
            echo $ex;
        }
        return $_sl;
    }
    
    public function UserItemId($itemId, $userId) {
        $ok = 0;
        $query = "SELECT ID FROM " . $this->_table_name . " WHERE ITEM_ID = ? AND USER_ID = ? ";
        try {
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(1, $itemId);
            $stmt->bindParam(2, $userId);
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($row) {
                $ok = $row['ID'];
            }
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }

        return $ok;
    }


    public function ChecAlreadyExit($itemId, $userId) {
        $ok = 0;
        $query = "SELECT * FROM " . $this->_table_name . " WHERE ITEM_ID = ? AND USER_ID = ? ";
        try {
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(1, $itemId);
            $stmt->bindParam(2, $userId);
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

    public function ReturnItemName($id) {
        $ok = 0;
        $query = "SELECT ITEM_NAME FROM ENA_ITEM_LIST WHERE ID = ? ";
        try {
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(1, $id);
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($row) {
                $ok = $row["ITEM_NAME"];
            }
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }

        return $ok;
    }

    /* ---------------------------------------------------------- */

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

    public function valueLoader($row) {
        $this->setId($row['ID']);
        $this->setItem_id($row['ITEM_ID']);
        $this->setUser_id($row['USER_ID']);
        $this->setOpening_stock($row['OPENING_STOCK']);
        $this->setInward_stock($row['INWARD_STOCK']);
        $this->setOutward_stock($row['OUTWARD_STOCK']);
        $this->setProdiucting_stock($row['PRODIUCTING_STOCK']);
        $this->setProdiuced_stock($row['PRODIUCED_STOCK']);
        $this->setLost_stock($row['LOST_STOCK']);
        $this->setOpening_stock($row['OPENING_STOCK']);
        $this->setCloseing_stock($row['CLOSEING_STOCK']);
        $this->setMrp($row['MRP']);
        $this->setTax_percentage($row['TAX_PERCENTAGE']);        

    }

    /* ---------------------------------------------------------- */

    public function TotalCount($userId) {
        $Q = "SELECT COUNT(*) AS TOTAL FROM " . $this->_table_name . " WHERE USER_ID = ? ";
        $total = 0;
        try {
            $stmt = $this->conn->prepare($Q);
            $stmt->bindParam(1, $userId);
            $stmt->execute();
            $total = $stmt->fetchColumn();
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $total;
    }

    public function loadAllPagging($userId, $start, $limit) {
        $Q = "SELECT * FROM " . $this->_table_name . " WHERE USER_ID = ? ORDER BY ID DESC LIMIT " . $start . " ," . $limit . " ";
        $result = null;
        try {
            $stmt = $this->conn->prepare($Q);
            $stmt->bindParam(1, $userId);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $result;
    }

    public function loadAllByUserId($userId) {
        $Q = "SELECT * FROM " . $this->_table_name . " WHERE USER_ID = ? ORDER BY ID DESC ";
        $result = null;
        try {
            $stmt = $this->conn->prepare($Q);
            $stmt->bindParam(1, $userId);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $result;
    }

    public function loadAllSearch($_str, $start, $limit) {
        $Q = "SELECT * FROM " . $this->_table_name . " WHERE ITEM_NAME LIKE :str_search ORDER BY ID DESC LIMIT " . $start . " ," . $limit . " ";
        $result = null;
        try {
            $stmt = $this->conn->prepare($Q);
            $stmt->bindValue(':str_search', "%" . $_str . "%");
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $result;
    }
    
        public function CloseingStockByItemId($item_id) {
        $Q = "SELECT SUM(CLOSEING_STOCK) AS TOTAL FROM ".$this->_table_name." WHERE ITEM_ID = ? ";
        $ok = 0;
        try {
            $stmt = $this->conn->prepare($Q);
            $stmt->bindParam (1 , $item_id);
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
    
    
    
        public function TotalCountByItemId($itemId) {
        $Q = "SELECT COUNT(*) AS TOTAL FROM " . $this->_table_name . " WHERE ITEM_ID = ? ";
        $total = 0;
        try {
            $stmt = $this->conn->prepare($Q);
            $stmt->bindParam(1, $itemId);
            $stmt->execute();
            $total = $stmt->fetchColumn();
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $total;
    }

    public function loadAllPaggingByItemId($itemId, $start, $limit) {
        $Q = "SELECT * FROM " . $this->_table_name . " WHERE ITEM_ID = ? ORDER BY ID DESC LIMIT " . $start . " ," . $limit . " ";
        $result = null;
        try {
            $stmt = $this->conn->prepare($Q);
            $stmt->bindParam(1, $itemId);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $result;
    }

    
    
        public function GenerateColumn($id) {
        $type = "";
        switch ($id) {
            case "I":
                $type = "INWARD_STOCK";
                break;
            case "O":
                $type = "OUTWARD_STOCK";
                break;
            case "P":
                $type = "PRODIUCTING_STOCK";
                break;
            case "X":
                $type = "PRODIUCED_STOCK";
                break;
            case "L":
                $type = "LOST_STOCK";
                break;
            
        }
        return $type;
    }
    
        public function GenerateNote($id) {
        $type = "";
        switch ($id) {
            case "I":
                $type = "Inward";
                break;
            case "O":
                $type = "Outward";
                break;
            case "OS":
                $type = "Opening Stock";
                break;
            case "P":
                $type = "producing";
                break;
            case "X":
                $type = "Produced";
                break;
            case "L":
                $type = "Lose";
                break;
            
        }
        return $type;
    }


}
