<?php


require_once '../db/Kanexon.php';
require_once '../models/Mdl_Transfar_Item.php';

class Transfar_Item extends Mdl_Transfar_Item{
    
    private $conn = null;
    private $_table_name = "TRANSFAR_ITEMS";

    public function __construct() {
        parent::__construct();
        $Data = new Kanexon();
        $this->conn = $Data->getDb();
    }
    //put your code here

    public function Insert(){
        $query = "INSERT INTO TRANSFAR_ITEMS(MASTER_ID , ITEM_ID , PACKING_ID , USER_ITEM_ID , UNIT , PACKING_SIZE , BATCH_NO , TOTAL_CASE , TOTAL_BOTTLE , TOTAL_BL , TOTAL_LPL , TOTAL_COST , TOTAL_ADV , TOTAL_FEE , TOTAL_VAT , TCS , TOTAL_MRP , TOTAL_AMOUNT , STATUS , IS_ACTIVE, IO_TYPE, CREATE_BY, LONGDATE) 
                        VALUES ( ? , ? , ? , ? , ? , ? , ? , ? , ? , ? , ? , ? , ? , ? , ? , ? , ? , ? , ? , ?, ?, ?, ?) ";
        $success = 0;
        try{
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam (1, $this->getMaster_id());
        $stmt->bindParam (2, $this->getItem_id());
        $stmt->bindParam (3, $this->getPacking_id());
        $stmt->bindParam (4, $this->getUser_item_id());
        $stmt->bindParam (5, $this->getUnit());
        $stmt->bindParam (6, $this->getPacking_size());
        $stmt->bindParam (7, $this->getBatch_no());
        $stmt->bindParam (8, $this->getTotal_case());
        $stmt->bindParam (9, $this->getTotal_bottle());
        $stmt->bindParam (10, $this->getTotal_bl());
        $stmt->bindParam (11, $this->getTotal_lpl());
        $stmt->bindParam (12, $this->getTotal_cost());
        $stmt->bindParam (13, $this->getTotal_adv());
        $stmt->bindParam (14, $this->getTotal_fee());
        $stmt->bindParam (15, $this->getTotal_vat());
        $stmt->bindParam (16, $this->getTcs());
        $stmt->bindParam (17, $this->getTotal_mrp());
        $stmt->bindParam (18, $this->getTotal_amount());
        $stmt->bindParam (19, $this->getStatus());
        $stmt->bindParam (20, $this->getIs_active());
        $stmt->bindParam (21, $this->getIoType());
        $stmt->bindParam (22, $this->getCreateBy());
        $stmt->bindParam (23, $this->getLongdate());

        $stmt->execute();
        $this->setId($this->conn->lastInsertId());
        $success = 1;
        } catch(PDOException $ex){ echo $ex->getMessage();
        }
        return $success;
    }
    
    public function retturnItemId($id) {
        $Q = "SELECT ITEM_ID FROM " . $this->_table_name . " WHERE ID = ? ";
        $ok = 0;
        try {
            $stmt = $this->conn->prepare($Q);
            $stmt->bindParam(1, $id);
            $stmt->execute();
            $row = $stmt->fetch();
            $ok = $row['ITEM_ID'];
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $ok;
    }

    public function retturnPackingId($id) {
        $Q = "SELECT PACKING_ID FROM " . $this->_table_name . " WHERE ID = ? ";
        $ok = 0;
        try {
            $stmt = $this->conn->prepare($Q);
            $stmt->bindParam(1, $id);
            $stmt->execute();
            $row = $stmt->fetch();
            $ok = $row['PACKING_ID'];
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $ok;
    }

    public function retturnMasterId($id) {
        $Q = "SELECT MASTER_ID FROM " . $this->_table_name . " WHERE ID = ? ";
        $ok = 0;
        try {
            $stmt = $this->conn->prepare($Q);
            $stmt->bindParam(1, $id);
            $stmt->execute();
            $row = $stmt->fetch();
            $ok = $row['MASTER_ID'];
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $ok;
    }
    
    public function retturnTotalBottle($id) {
        $Q = "SELECT TOTAL_BOTTLE FROM " . $this->_table_name . " WHERE ID = ? ";
        $ok = 0;
        try {
            $stmt = $this->conn->prepare($Q);
            $stmt->bindParam(1, $id);
            $stmt->execute();
            $row = $stmt->fetch();
            $ok = $row['TOTAL_BOTTLE'];
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $ok;
    }
    
    
    public function retturnTotalFeeByMasterId($id) {
        $Q = "SELECT SUM(TOTAL_FEE) AS TOTAL FROM " . $this->_table_name . " WHERE MASTER_ID = ? ";
        $ok = 0;
        try {
            $stmt = $this->conn->prepare($Q);
            $stmt->bindParam(1, $id);
            $stmt->execute();
            $row = $stmt->fetch();
            $ok = $row['TOTAL'];
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $ok;
    }
    
    public function retturnTotalVatByMasterId($id) {
        $Q = "SELECT SUM(TOTAL_VAT) AS TOTAL FROM " . $this->_table_name . " WHERE MASTER_ID = ? ";
        $ok = 0;
        try {
            $stmt = $this->conn->prepare($Q);
            $stmt->bindParam(1, $id);
            $stmt->execute();
            $row = $stmt->fetch();
            $ok = $row['TOTAL'];
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $ok;
    }
    public function retturnTotalCostByMasterId($id) {
        $Q = "SELECT SUM(TOTAL_COST) AS TOTAL FROM " . $this->_table_name . " WHERE MASTER_ID = ? ";
        $ok = 0;
        try {
            $stmt = $this->conn->prepare($Q);
            $stmt->bindParam(1, $id);
            $stmt->execute();
            $row = $stmt->fetch();
            $ok = $row['TOTAL'];
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $ok;
    }
    public function retturnTotalTcsByMasterId($id) {
        $Q = "SELECT SUM(TCS) AS TOTAL FROM " . $this->_table_name . " WHERE MASTER_ID = ? ";
        $ok = 0;
        try {
            $stmt = $this->conn->prepare($Q);
            $stmt->bindParam(1, $id);
            $stmt->execute();
            $row = $stmt->fetch();
            $ok = $row['TOTAL'];
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $ok;
    }
    
    

    /*    
        public function LoadValue($id) {
        $Q = "SELECT * FROM " . $this->_table_name . " WHERE ID = ? ";
        $ok = 0;
        try {
            $stmt = $this->conn->prepare($Q);
            $stmt->bindParam (1 , $id);
            $stmt->execute();
            $row = $stmt->fetch();
            if ($row > 0) {
            $this->setId($row['ID']);
            $this->setMaster_id($row['MASTER_ID']);
            $this->setItem_id($row['ITEM_ID']);
            $this->setPacking_id($row['PACKING_ID']);
            $this->setUser_item_id($row['USER_ITEM_ID']);
            $this->setUnit($row['UNIT']);
            $this->setPacking_id($row['PACKING_SIZE']);
            $this->setBatch_no($row['BATCH_NO']);
            $this->setTotal_case($row['TOTAL_CASE']);
            $this->setTotal_bottle($row['TOTAL_BOTTLE']);
            $this->setTotal_bl($row['TOTAL_BL']);
            $this->setTotal_lpl($row['TOTAL_LPL']);
            $this->setTotal_cost($row['TOTAL_COST']);
            $this->setTotal_adv($row['TOTAL_ADV']);
            $this->setTotal_fee($row['TOTAL_FEE']);
            $this->setTotal_vat($row['TOTAL_VAT']);
            $this->setTcs($row['TCS']);
            $this->setTotal_mrp($row['TOTAL_MRP']);
            $this->setTotal_amount($row['TOTAL_AMOUNT']);
            $this->setStatus($row['STATUS']);
            $this->setIs_active($row['IS_ACTIVE']);
            $this->setLongdate($row['LONGDATE']);
            $this->setCreateBy($row['CREATE_BY']);
            $ok = 1;
            }   
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $ok;
    }
    */
    public function valueLoader($row){
            $this->setId($row['ID']);
            $this->setMaster_id($row['MASTER_ID']);
            $this->setItem_id($row['ITEM_ID']);
            $this->setPacking_id($row['PACKING_ID']);
            $this->setUser_item_id($row['USER_ITEM_ID']);
            $this->setUnit($row['UNIT']);
            $this->setPacking_id($row['PACKING_SIZE']);
            $this->setBatch_no($row['BATCH_NO']);
            $this->setTotal_case($row['TOTAL_CASE']);
            $this->setTotal_bottle($row['TOTAL_BOTTLE']);
            $this->setTotal_bl($row['TOTAL_BL']);
            $this->setTotal_lpl($row['TOTAL_LPL']);
            $this->setTotal_cost($row['TOTAL_COST']);
            $this->setTotal_adv($row['TOTAL_ADV']);
            $this->setTotal_fee($row['TOTAL_FEE']);
            $this->setTotal_vat($row['TOTAL_VAT']);
            $this->setTcs($row['TCS']);
            $this->setTotal_mrp($row['TOTAL_MRP']);
            $this->setTotal_amount($row['TOTAL_AMOUNT']);
            $this->setStatus($row['STATUS']);
            $this->setIs_active($row['IS_ACTIVE']);
            $this->setLongdate($row['LONGDATE']);
            $this->setCreateBy($row['CREATE_BY']);
    }
    
      
    public function getLoadUserItemIdById($id) {
        $Q = "SELECT USER_ITEM_ID FROM " . $this->_table_name . " WHERE ID = ? ";
        $ok = 0;
        try {
            $stmt = $this->conn->prepare($Q);
            $stmt->bindParam(1, $id);
            $stmt->execute();
            $row = $stmt->fetch();
            $ok = $row['TOTAL'];
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $ok;
    }
    
    public function getLoadUserItemId($packingId, $userId) {
        $Q = "SELECT ID FROM " . $this->_table_name . " WHERE PACKING_ID = ? AND CREATE_BY = ? ";
        $ok = 0;
        try {
            $stmt = $this->conn->prepare($Q);
            $stmt->bindParam(1, $packingId);
            $stmt->bindParam(2, $userId);
            $stmt->execute();
            $row = $stmt->fetch();
            $ok = $row['TOTAL'];
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $ok;
    }

    public function loadValue($id) {
        $Q = "SELECT * FROM ". $this->_table_name ." WHERE MASTER_ID = ? ";
        $result = null;
        try {
            $stmt = $this->conn->prepare($Q);
            $stmt->bindParam(1, $id);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if($result < 0){
            $this->valueLoader($result);
            }
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $result;
        
    }

    public function loadValueById($id) {
        $Q = "SELECT * FROM ". $this->_table_name ." WHERE ID = ? ";
        $result = null;
        try {
            $stmt = $this->conn->prepare($Q);
            $stmt->bindParam(1, $id);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $this->valueLoader($result);
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $result;
        
    }

    public function loadByMasterId($master_id) {
        $Q = "SELECT * FROM ". $this->_table_name ." WHERE MASTER_ID = ? AND IO_TYPE= 'C' AND IS_ACTIVE = 'YES' ORDER BY ID";
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
    
     public function InwardSum($user_item_id, $io_Type) {
        $Q = "SELECT SUM(TOTAL_BOTTLE) AS TOTAL FROM ". $this->_table_name ." WHERE USER_ITEM_ID = ? AND IO_TYPE = ? ";
        $total = 0;
        try {
            $stmt = $this->conn->prepare($Q);
            $stmt->bindParam(1, $user_item_id);
            $stmt->bindParam(2, $io_Type);
            $stmt->execute();
            $total = $stmt->fetchColumn();
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $total;
    }

        public function UpdateStatus($id, $status){
    $query = "UPDATE ".$this->_table_name." SET STATUS = ? WHERE ID = ? " ; 
    $success = 0;
    try{
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam (1 , $status);
            $stmt->bindParam (2 , $id);

            $stmt->execute(); 
            $success = 1;}
    catch(PDOException $ex){ echo  $ex->getMessage(); } 
    return $success;}

    
    

        public function Delete($id){
    $query = "UPDATE ".$this->_table_name." SET IS_ACTIVE = 'NO' WHERE ID = ? " ; 
    $success = 0;
    try{
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam (1 , $id);

            $stmt->execute(); 
            $success = 1;}
    catch(PDOException $ex){ echo  $ex->getMessage(); } 
    return $success;}

    
    

    public function TotalCountByMasterId($user_item_id) {
        $Q = "SELECT COUNT(*) AS TOTAL FROM ". $this->_table_name ." WHERE MASTER_ID = ? AND IO_TYPE = 'C' ";
        $total = 0;
        try {
            $stmt = $this->conn->prepare($Q);
            $stmt->bindParam(1, $user_item_id);
            $stmt->execute();
            $total = $stmt->fetchColumn();
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $total;
    }
    
    
    public function loadAllPaggingByMasterId($user_item_id, $start, $limit) {
        $Q = "SELECT * FROM ". $this->_table_name ." WHERE MASTER_ID = ? AND IO_TYPE = 'C' ORDER BY ID DESC LIMIT " . $start . " ," . $limit . " ";
        $result = null;
        try {
            $stmt = $this->conn->prepare($Q);
            $stmt->bindParam(1, $user_item_id);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $result;
    }
    
    public function loadAllPaggingByMasterIdStatus($user_item_id, $start, $limit) {
        $Q = "SELECT * FROM ". $this->_table_name ." WHERE MASTER_ID = ? AND IO_TYPE = 'C' AND STATUS = 1 AND IS_ACTIVE = 'YES' ORDER BY ID DESC LIMIT " . $start . " ," . $limit . " ";
        $result = null;
        try {
            $stmt = $this->conn->prepare($Q);
            $stmt->bindParam(1, $user_item_id);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $result;
    }
    
    

    public function TotalCountByItemId($user_item_id) {
        $Q = "SELECT COUNT(*) AS TOTAL FROM ". $this->_table_name ." WHERE USER_ITEM_ID = ? AND IO_TYPE <> 'C' ";
        $total = 0;
        try {
            $stmt = $this->conn->prepare($Q);
            $stmt->bindParam(1, $user_item_id);
            $stmt->execute();
            $total = $stmt->fetchColumn();
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $total;
    }
    
    
    public function loadAllPaggingByItemId($user_item_id, $start, $limit) {
        $Q = "SELECT * FROM ". $this->_table_name ." WHERE USER_ITEM_ID = ? AND IO_TYPE <> 'C' ORDER BY ID DESC LIMIT " . $start . " ," . $limit . " ";
        $result = null;
        try {
            $stmt = $this->conn->prepare($Q);
            $stmt->bindParam(1, $user_item_id);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $result;
    }
    
    
        
    public function Full_Io_Type($id) {
        $type = "";
        switch ($id) {
            case "OS":
                $type = "Opening Stock";
                break;
            case "I":
                $type = "Inward";
                break;
            case "O":
                $type = "Outward";
                break;
            case "L":
                $type = "Lose";
                break;
            case "X":
                $type = "Produced";
                break;
         
        }
        return $type;
    }
    

    
}
