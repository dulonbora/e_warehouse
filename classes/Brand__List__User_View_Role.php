<?php

require_once '../db/Kanexon.php';
require_once '../models/Mdl_User_Item_List_View.php';


class Brand__List__User_View_Role extends Mdl_User_Item_List_View{
    
    private $conn = null;
    private $_view_name = "VIEW_USER_ITEM_LIST_ROLE";

    public function __construct() {
        parent::__construct();
        $Data = new Kanexon();
        $this->conn = $Data->getDb();
    }

    public function TotalCount($role) {
        $Q = "SELECT COUNT(*) AS TOTAL FROM ". $this->_view_name ." WHERE ROLE = ? ";
        $total = 0;
        try {
            $stmt = $this->conn->prepare($Q);
            $stmt->bindParam(1, $role);
            $stmt->execute();
            $total = $stmt->fetchColumn();
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $total;
    }

    public function loadAllPagging($role, $start, $limit) {
        $Q = "SELECT * FROM ". $this->_view_name ." WHERE ROLE = ? ORDER BY ID DESC LIMIT " . $start . " ," . $limit . " ";
        $result = null;
        try {
            $stmt = $this->conn->prepare($Q);
            $stmt->bindParam(1, $role);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $result;
    }
    

    public function TotalCountByUser($user_id) {
        $Q = "SELECT COUNT(*) AS TOTAL FROM ". $this->_view_name ." WHERE CREATE_BY = ? AND USER_ID = ? ";
        $total = 0;
        try {
            $stmt = $this->conn->prepare($Q);
            $stmt->bindParam(1, $user_id);
            $stmt->bindParam(2, $user_id);
            $stmt->execute();
            $total = $stmt->fetchColumn();
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $total;
    }

    public function TotalCountByUserSearch($user_id, $_str) {
        $Q = "SELECT COUNT(*) AS TOTAL FROM ". $this->_view_name ." WHERE USER_ID = :id AND NAME LIKE :str_search ";
        $total = 0;
        try {
            $stmt = $this->conn->prepare($Q);
            $stmt->bindValue(':id', $user_id);
            $stmt->bindValue(':str_search' , "%".$_str."%");
            $stmt->execute();
            $total = $stmt->fetchColumn();
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $total;
    }
    
    

    public function loadAllPaggingByUser($user_id, $start, $limit) {
        $Q = "SELECT * FROM ". $this->_view_name ." WHERE CREATE_BY = ? AND USER_ID = ? LIMIT 20 ";
        $result = null;
        try {
            $stmt = $this->conn->prepare($Q);
            $stmt->bindParam(1, $user_id);
            $stmt->bindParam(2, $user_id);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $result;
    }
    

    public function loadAllPaggingByUserSearch($user_id, $_str) {
        $Q = "SELECT * FROM ". $this->_view_name ." WHERE USER_ID = :id AND NAME LIKE :str_search LIMIT 20";
        $result = null;
        try {
            $stmt = $this->conn->prepare($Q);
            $stmt->bindValue(':id', $user_id);
            $stmt->bindValue(':str_search' , "%".$_str."%");
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
    
    
    public function TotalCountByItemId($itemId, $role) {
        $Q = "SELECT COUNT(*) AS TOTAL FROM " . $this->_view_name . " WHERE PACKING_ID = ? AND ROLE = ?AND CLOSEING_STOCK > 0 ";
        $total = 0;
        try {
            $stmt = $this->conn->prepare($Q);
            $stmt->bindParam(1, $itemId);
            $stmt->bindParam(2, $role);
            $stmt->execute();
            $total = $stmt->fetchColumn();
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $total;
    }

    public function loadAllPaggingByItemId($itemId, $role, $start, $limit) {
        $Q = "SELECT * FROM " . $this->_view_name . " WHERE PACKING_ID = ? AND ROLE = ? AND CLOSEING_STOCK > 0 ORDER BY ID DESC LIMIT " . $start . " ," . $limit . " ";
        $result = null;
        try {
            $stmt = $this->conn->prepare($Q);
            $stmt->bindParam(1, $itemId);
            $stmt->bindParam(2, $role);
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
            $this->setItem_id($row['ITEM_ID']);
            $this->setPacking_id($row['PACKING_ID']);
            $this->setFyear($row['FYEAR']);
            $this->setUser_id($row['USER_ID']);
            $this->setName($row['NAME']);
            $this->setBottles_per_case($row['BOTTLES_PER_CASE']);
            $this->setMl_per_case($row['ML_PER_CASE']);
            $this->setMrp($row['MRP']);
            $this->setMrp_per_bottle($row['MRP_PER_BOTTLE']);
            $this->setAvd_amount($row['AVD_AMOUNT']);
            $this->setAvd_amount_per_bottle($row['AVD_AMOUNT_PER_BOTTLE']);
            $this->setVat($row['VAT']);
            $this->setVat_per_bottle($row['VAT_PER_BOTTLE']);
            $this->setStrangth($row['STRANGTH']);
            $this->setGroup_id($row['GROUP_ID']);
            $this->setGroup_name($row['GROUP_NAME']);
            $this->setCategory_id($row['CATEGORY_ID']);
            $this->setCategory_name($row['CATEGORY_NAME']);
            $this->setType_id($row['TYPE_ID']);
            $this->setType_name($row['TYPE_NAME']);
            $this->setIs_imported($row['IS_IMPORTED']);
            $this->setItem_for($row['ITEM_FOR']);
            $this->setImage_link($row['IMAGE_LINK']);
            $this->setDescription($row['DESCRIPTION']);
            $this->setUser_item_status($row['USER_ITEM_STATUS']);
            $this->setOpening_stock($row['OPENING_STOCK']);
            $this->setInward_stock($row['INWARD_STOCK']);
            $this->setOutward_stock($row['OUTWARD_STOCK']);
            $this->setProdiucting_stock($row['PRODIUCTING_STOCK']);
            $this->setProdiuced_stock($row['PRODIUCED_STOCK']);
            $this->setLost_stock($row['LOST_STOCK']);
            $this->setCloseing_stock($row['CLOSEING_STOCK']);
            $this->setCreate_on($row['CREATE_ON']);
            $this->setCreate_by($row['CREATE_BY']);
            $this->setModify_on($row['MODIFY_ON']);
            $this->setModify_by($row['MODIFY_BY']);
            

    }
    
    
    public function Total_Stock_By_Item_Id_And_Type($packing_id, $column) {
        $Q = "SELECT SUM('.$column.') AS TOTAL FROM ".$this->_view_name." WHERE PACKING_ID = ?";
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
