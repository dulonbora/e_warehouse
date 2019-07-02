<?php
require_once '../db/Kanexon.php';
require_once '../models/Mdl_category.php';


class Category extends Mdl_category{
    
    private $conn = null;
    private $_table_name = "CATEGORY";

    public function __construct() {
        parent::__construct();
        $Data = new Kanexon();
        $this->conn = $Data->getDb();
    }

/*-------------------------------------------------------------------------*/    

    public function Insert1($table_name, $column, $valuse) {
        $query = "INSERT INTO CATEGORY (PARENT_ID , NAME , TYPE , IS_ACTIVE) VALUES ( ? , ? , ? , ?) ";
        $success = 0;
        try {
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(1, $this->getParent_id());
            $stmt->bindParam(2, $this->getName());
            $stmt->bindParam(3, $this->getType());
            $stmt->bindParam(4, $this->getIs_active());

            $stmt->execute();
            $success = 1;
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $success;
    }
    
    
    public function Insert() {
        $query = "INSERT INTO CATEGORY (PARENT_ID , NAME , TYPE , IS_ACTIVE) VALUES ( ? , ? , ? , ?) ";
        $success = 0;
        try {
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(1, $this->getParent_id());
            $stmt->bindParam(2, $this->getName());
            $stmt->bindParam(3, $this->getType());
            $stmt->bindParam(4, $this->getIs_active());

            $stmt->execute();
            $success = 1;
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $success;
    }

    /*----------------------------------------------------------*/

    public function Update($id) {
        $query = "UPDATE CATEGORY SET PARENT_ID = ? , NAME = ? , TYPE = ? , IS_ACTIVE = ? WHERE ID = ? ";
        $success = 0;
        try {
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(1, $this->getParent_id());
            $stmt->bindParam(2, $this->getName());
            $stmt->bindParam(3, $this->getType());
            $stmt->bindParam(4, $this->getIs_active());
            $stmt->bindParam(5, $id);

            $stmt->execute();
            $success = 1;
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $success;
    }

/* ------------------------------------------------------------------------- */
    
    public function Delete($_id) {
        $query = "UPDATE CATEGORY SET IS_ACTIVE = ? WHERE ID = ?";
        $success = 0;
        $__is_active = "NO";
        try {
            $stmt = $this->conn->prepare($query);
            $stmt->bindValue(1, $__is_active);
            $stmt->bindValue(2, $_id);
            $stmt->execute();
            $success = 1;
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $success;
    }
    
/*-------------------------------------------------------------------------*/    
public function Check_If_Exists($_name){
        $_sl = 0;
        $Q = "SELECT NAME FROM CATEGORY WHERE NAME = ? ";
        try{
        
	$stmt = $this->conn->prepare($Q);
	$stmt->bindParam (1 , $_name);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
            if($row>0){
                $_sl = $row["ID"];
            }
        }
        catch(PDOException $ex){ echo $ex;}
    return $_sl;
}

    public function TotalCount() {
        $Q = "SELECT COUNT(*) AS TOTAL FROM CATEGORY";
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
    
    
    public function TotalCountByType($_type) {
        $Q = "SELECT COUNT(*) AS TOTAL FROM CATEGORY WHERE TYPE = ? ";
        $total = 0;
        try {
            $stmt = $this->conn->prepare($Q);
            $stmt->bindParam (1 , $_type);
            $stmt->execute();
            $total = $stmt->fetchColumn();
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $total;
    }
    
    
    public function TotalCountByParentId($_parent_id) {
        $Q = "SELECT COUNT(*) AS TOTAL FROM CATEGORY WHERE PARENT_ID = ? ";
        $total = 0;
        try {
            $stmt = $this->conn->prepare($Q);
            $stmt->bindParam (1 , $_parent_id);
            $stmt->execute();
            $total = $stmt->fetchColumn();
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $total;
    }
    
        public function loadAllPagging($start, $limit) {
        $Q = "SELECT * FROM CATEGORY ORDER BY ID DESC LIMIT " . $start . " ," . $limit . " ";
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
    
        public function loadAllPaggingByParentId($_parent_id, $start, $limit) {
        $Q = "SELECT * FROM CATEGORY WHERE PARENT_ID = ? ORDER BY ID DESC LIMIT " . $start . " ," . $limit . " ";
        $result = null;
        try {
            $stmt = $this->conn->prepare($Q);
            $stmt->bindParam (1 , $_parent_id);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $result;
    }
    
    public function loadAllPaggingByType($_type, $start, $limit) {
        $Q = "SELECT * FROM CATEGORY WHERE TYPE = ? ORDER BY ID DESC LIMIT " . $start . " ," . $limit . " ";
        $result = null;
        try {
            $stmt = $this->conn->prepare($Q);
            $stmt->bindParam (1 , $_type);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $result;
    }
    
    public function loadAllSearch($_str, $start, $limit) {
        $Q = "SELECT * FROM CATEGORY WHERE NAME LIKE :str_search ORDER BY ID DESC LIMIT " . $start . " ," . $limit . " ";
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
    
    public function LoadValue($id) {
        $Q = "SELECT * FROM CATEGORY WHERE ID = ? ";
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
            $this->setParent_id($row['PARENT_ID']);
            $this->setName($row['NAME']);
            $this->setType($row['TYPE']);
            $this->setIs_active($row['IS_ACTIVE']);
    }


    
}

?>