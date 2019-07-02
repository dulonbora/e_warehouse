<?php

require_once '../db/Kanexon.php';

class Brand__Packing__View{
    
    private $conn = null;
    private $_view_name = "VIEW_ITEM_LIST_ALL";

    public function __construct() {
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
    
    public function TotalCountSearch($_str) {
        $Q = "SELECT COUNT(*) AS TOTAL FROM ". $this->_view_name ." WHERE ITEM_NAME LIKE :str_search ";
        $total = 0;
        try {
            $stmt = $this->conn->prepare($Q);
            $stmt->bindValue(':str_search' , "%".$_str."%");
            $stmt->execute();
            $total = $stmt->fetchColumn();
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $total;
    }

    public function loadAllPaggingSearch($_str, $start, $limit) {
        $Q = "SELECT * FROM ". $this->_view_name ." WHERE ITEM_NAME LIKE :str_search ORDER BY ID DESC LIMIT " . $start . " ," . $limit . " ";
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
    
    
   

}
