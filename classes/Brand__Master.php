<?php

require_once '../db/Kanexon.php';
require_once '../models/Mdl_brand_master.php';

class Brand__Master extends Mdl_brand_master{
    
    private $conn = null;
    private $_table_name = "BRAND_MASTER";

    public function __construct() {
        parent::__construct();
        $Data = new Kanexon();
        $this->conn = $Data->getDb();
    }
    
    public function Insert() {
        $query = "INSERT INTO ".$this->_table_name."(NAME , STRANGTH , GROUP_ID , CATEGORY_ID , COMPANY_ID , TYPE_ID , IS_IMPORTED , IS_NEW , ITEM_FOR , IMAGE_LINK , DESCRIPTION , STATUS , CREATE_ON , CREATE_BY , MODIFY_ON , MODIFY_BY , IS_ACTIVE) 
	VALUES ( ? , ? , ? , ? , ? , ? , ? , ? , ? , ? , ? , ? , ? , ? , ? , ? , ?) ";
        $success = 0;
        try {
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(1, $this->getName());
            $stmt->bindParam(2, $this->getStrangth());
            $stmt->bindParam(3, $this->getGroup_id());
            $stmt->bindParam(4, $this->getCategory_id());
            $stmt->bindParam(5, $this->getCompany_id());
            $stmt->bindParam(6, $this->getType_id());
            $stmt->bindParam(7, $this->getIs_imported());
            $stmt->bindParam(8, $this->getIs_new());
            $stmt->bindParam(9, $this->getItem_for());
            $stmt->bindParam(10, $this->getImage_link());
            $stmt->bindParam(11, $this->getDescription());
            $stmt->bindParam(12, $this->getStatus());
            $stmt->bindParam(13, $this->getCreate_on());
            $stmt->bindParam(14, $this->getCreate_by());
            $stmt->bindParam(15, $this->getModify_on());
            $stmt->bindParam(16, $this->getModify_by());
            $stmt->bindParam(17, $this->getIs_active());

            $stmt->execute();
            $success = 1;
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $success;
    }

    /*----------------------------------------------------------*/
    public function Update($_id) {
        $query = "UPDATE " . $this->_table_name . " SET NAME = ?, STRANGTH = ?, GROUP_ID = ?, CATEGORY_ID = ?, COMPANY_ID = ?, TYPE_ID = ?, IS_IMPORTED = ?, IS_NEW = ?, ITEM_FOR = ?, IMAGE_LINK = ?, DESCRIPTION = ?, STATUS = ?, MODIFY_ON = ?, MODIFY_BY = ? WHERE ID = ? "; 
        $success = 0;
        
        try {
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(1, $this->getName());
            $stmt->bindParam(2, $this->getStrangth());
            $stmt->bindParam(3, $this->getGroup_id());
            $stmt->bindParam(4, $this->getCategory_id());
            $stmt->bindParam(5, $this->getCompany_id());
            $stmt->bindParam(6, $this->getType_id());
            $stmt->bindParam(7, $this->getIs_imported());
            $stmt->bindParam(8, $this->getIs_new());
            $stmt->bindParam(9, $this->getItem_for());
            $stmt->bindParam(10, $this->getImage_link());
            $stmt->bindParam(11, $this->getDescription());
            $stmt->bindParam(12, $this->getStatus());
            $stmt->bindParam(13, $this->getModify_on());
            $stmt->bindParam(14, $this->getModify_by());
            $stmt->bindParam(15, $_id);

            $stmt->execute();
            $success = 1;
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $success;
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
            $this->setName($row['NAME']);
            $this->setStrangth($row['STRANGTH']);
            $this->setGroup_id($row['GROUP_ID']);
            $this->setCategory_id($row['CATEGORY_ID']);
            $this->setCompany_id($row['COMPANY_ID']);
            $this->setType_id($row['TYPE_ID']);
            $this->setIs_imported($row['IS_IMPORTED']);
            $this->setIs_new($row['IS_NEW']);
            $this->setItem_for($row['ITEM_FOR']);
            $this->setImage_link($row['IMAGE_LINK']);
            $this->setDescription($row['DESCRIPTION']);
            $this->setStatus($row['STATUS']);
            $this->setCreate_on($row['CREATE_ON']);
            $this->setCreate_by($row['CREATE_BY']);
            $this->setModify_on($row['MODIFY_ON']);
            $this->setModify_by($row['MODIFY_BY']);
            $this->setIs_active($row['IS_ACTIVE']);
    }
    
    public function getParentNameFromCategory($_id) {
        $_sl = "";
        $Q = "SELECT NAME FROM CATEGORY WHERE ID = ? ";
        try {

            $stmt = $this->conn->prepare($Q);
            $stmt->bindParam(1, $_id);
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($row > 0) {
                $_sl = $row["NAME"];
            }
        } catch (PDOException $ex) {
            echo $ex;
        }
        return $_sl;
    }

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
    
    
    public function TotalCountByCategoy($columnName, $values) {
        $Q = "SELECT COUNT(*) AS TOTAL FROM ".$this->_table_name." WHERE ".$columnName." = ? ";
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
        $Q = "SELECT * FROM ".$this->_table_name." WHERE ".$columnName." = ? ORDER BY ID DESC LIMIT " . $start . " ," . $limit . " ";
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
    
    
    public function loadAllSearch($_str, $start, $limit) {
        $Q = "SELECT * FROM ".$this->_table_name." WHERE NAME LIKE :str_search ORDER BY ID DESC LIMIT " . $start . " ," . $limit . " ";
        $result = null;
        try {
            $stmt = $this->conn->prepare($Q);
            $stmt->bindValue(':str_search' , "%".$_str."%");
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $result;
    }



}

?>