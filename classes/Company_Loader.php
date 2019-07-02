<?php

require_once '../db/Kanexon.php';
require_once '../models/Mdl_Company.php';

class Company_Loader extends Mdl_Company{
    
    private $conn = null;
    private $_table_name = "COMPANY";

    public function __construct() {
        parent::__construct();
        $Data = new Kanexon();
        $this->conn = $Data->getDb();
    }    
    
    public function TotalByCompanyTypeCount($type) {
        $Q = "SELECT COUNT(*) AS TOTAL FROM " . $this->_table_name . " WHERE COMPANY_TYPE = ? ";
        $total = 0;
        try {
            $stmt = $this->conn->prepare($Q);
            $stmt->bindParam(1, $type);
            $stmt->execute();
            $total = $stmt->fetchColumn();
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $total;
    }

    public function loadAllPaggingByCompanyType($type) {
        $Q = "SELECT * FROM " . $this->_table_name . " WHERE COMPANY_TYPE = ? AND IS_ACTIVE = 'YES' ORDER BY ID DESC ";
        $result = null;
        try {
            $stmt = $this->conn->prepare($Q);
            $stmt->bindParam(1, $type);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $result;
    }
    
    
    public function TotalByCompanyTypeCountStatus($type, $status) {
        $Q = "SELECT COUNT(*) AS TOTAL FROM " . $this->_table_name . " WHERE COMPANY_TYPE = ? AND STATUS = ? ";
        $total = 0;
        try {
            $stmt = $this->conn->prepare($Q);
            $stmt->bindParam(1, $type);
            $stmt->bindParam(2, $status);
            $stmt->execute();
            $total = $stmt->fetchColumn();
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $total;
    }

    public function loadAllPaggingByCompanyTypeStatus($type, $status) {
        $Q = "SELECT * FROM " . $this->_table_name . " WHERE COMPANY_TYPE = ? AND STATUS = ? AND IS_ACTIVE = 'YES' ORDER BY ID DESC ";
        $result = null;
        try {
            $stmt = $this->conn->prepare($Q);
            $stmt->bindParam(1, $type);
            $stmt->bindParam(2, $status);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $result;
    }
    
    
    public function TotalCountByStatus($role, $status) {
        $Q = "SELECT COUNT(*) AS TOTAL FROM " . $this->_table_name . " WHERE ROLE = ? AND STATUS = ? ";
        $total = 0;
        try {
            $stmt = $this->conn->prepare($Q);
            $stmt->bindParam(1, $role);
            $stmt->bindParam(2, $status);
            $stmt->execute();
            $total = $stmt->fetchColumn();
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $total;
    }

    public function loadAllPaggingByStatus($start, $limit, $role, $status) {
        $Q = "SELECT * FROM " . $this->_table_name . " WHERE ROLE = ? AND STATUS = ? ORDER BY ID DESC ";
        $result = null;
        try {
            $stmt = $this->conn->prepare($Q);
            $stmt->bindParam(1, $role);
            $stmt->bindParam(2, $status);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $result;
    }
    
    
        public function returnCompanyNmae($userId) {
        $Q = "SELECT COMPANY_NAME FROM " . $this->_table_name . " WHERE ID = ?";
        $cno = "";
        try {
            $stmt = $this->conn->prepare($Q);
            $stmt->bindParam(1, $userId);
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $cno = $row["COMPANY_NAME"];
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $cno;
    }
    
        public function returnExciseId($userId) {
        $Q = "SELECT EXCISE_USER_ID FROM " . $this->_table_name . " WHERE ID = ?";
        $cno = "";
        try {
            $stmt = $this->conn->prepare($Q);
            $stmt->bindParam(1, $userId);
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $cno = $row["EXCISE_USER_ID"];
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $cno;
    }

}
