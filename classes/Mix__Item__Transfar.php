<?php


require_once '../db/Kanexon.php';
require_once '../models/Mdl_Mix_Item_Transfar.php';

class Mix__Item__Transfar extends Mdl_Mix_Item_Transfar {

    private $conn = null;
    private $_table_name = "MIX_ITEM_TRANSFAR";

    public function __construct() {
        parent::__construct();
        $Data = new Kanexon();
        $this->conn = $Data->getDb();
    }
    
    //put your code here
    
    public function Insert(){
    $query = "INSERT INTO ". $this->_table_name ."(ITEM_ID , USER_ITEM_ID , USER_FROM , USER_TO , TOO , IO_TYPE , MODE , TRANK_NO , PERMIT_ID , TYPE , NOTE , IN_UNIT , IN_SUBUNIT , LONGDATE , STATUS , CREATE_ON , CREATE_BY , MODIFY_ON , MODIFY_BY , IS_ACTIVE) 
            VALUES ( ? , ? , ? , ? , ? , ? , ? , ? , ? , ? , ? , ? , ? , ? , ? , ? , ? , ? , ? , ?) " ; 
    $success = 0;
    try{
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam (1 , $this->getItemId()); 
            $stmt->bindParam (2 , $this->getUserItemId()); 
            $stmt->bindParam (3 , $this->getUserFrom()); 
            $stmt->bindParam (4 , $this->getUserTo()); 
            $stmt->bindParam (5 , $this->getToo()); 
            $stmt->bindParam (6 , $this->getIoType()); 
            $stmt->bindParam (7 , $this->getMode()); 
            $stmt->bindParam (8 , $this->getTrankNo()); 
            $stmt->bindParam (9 , $this->getPermitId()); 
            $stmt->bindParam (10 , $this->getType()); 
            $stmt->bindParam (11 , $this->getNote()); 
            $stmt->bindParam (12 , $this->getInUnit()); 
            $stmt->bindParam (13 , $this->getInSubunit()); 
            $stmt->bindParam (14 , $this->getLongdate()); 
            $stmt->bindParam (15 , $this->getStatus()); 
            $stmt->bindParam (16 , $this->getCreateOn()); 
            $stmt->bindParam (17 , $this->getCreateBy()); 
            $stmt->bindParam (18 , $this->getModifyOn()); 
            $stmt->bindParam (19 , $this->getModifyBy()); 
            $stmt->bindParam (20 , $this->getIsActive()); 

            $stmt->execute(); 
            $this->setId($this->conn->lastInsertId());
            $success = 1;}
    catch(PDOException $ex){ echo  $ex->getMessage(); } 
    return $success;}

    public function UpdateIoType($id) {        
        $query = " UPDATE " . $this->_table_name . " SET IO_TYPE = ? WHERE ID = ? ";
        $success = 0;
        try {
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(1, $this->getIoType());
            $stmt->bindParam(2, $id);

            $stmt->execute();
            $success = 1;
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $success;
    }
 /*----------------------------------------------------------*/
    
    
    public function TotalCountByItemId($user_item_id) {
        $Q = "SELECT COUNT(*) AS TOTAL FROM ". $this->_table_name ." WHERE USER_ITEM_ID = ? ";
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
        $Q = "SELECT * FROM ". $this->_table_name ." WHERE USER_ITEM_ID = ? ORDER BY ID DESC LIMIT " . $start . " ," . $limit . " ";
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
    
 /*----------------------------------------------------------*/

    
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
            $this->setItemId($row['ITEM_ID']);
            $this->setUserItemId($row['USER_ITEM_ID']);
            $this->setUserFrom($row['USER_FROM']);
            $this->setUserTo($row['USER_TO']);
            $this->setToo($row['TOO']);
            $this->setIoType($row['IO_TYPE']);
            $this->setMode($row['MODE']);
            $this->setTrankNo($row['TRANK_NO']);
            $this->setPermitId($row['PERMIT_ID']);
            $this->setType($row['TYPE']);
            $this->setNote($row['NOTE']);
            $this->setInUnit($row['IN_UNIT']);
            $this->setInSubunit($row['IN_SUBUNIT']);
            $this->setLongdate($row['LONGDATE']);
            $this->setStatus($row['STATUS']);
            $this->setCreateOn($row['CREATE_ON']);
            $this->setCreateBy($row['CREATE_BY']);
            $this->setModifyOn($row['MODIFY_ON']);
            $this->setModifyBy($row['MODIFY_BY']);
            $this->setIsActive($row['IS_ACTIVE']);

    }


    public function UpdateStatus($id, $status){
$query = "UPDATE ".$this->_table_name." SET STATUS = ?, MODIFY_ON = ?, MODIFY_BY = ? WHERE ID = ? " ; 
$success = 0;
try{
	$stmt = $this->conn->prepare($query);
	$stmt->bindParam (1 , $status);
	$stmt->bindParam (2 , $this->getModifyOn()); 
	$stmt->bindParam (3 , $this->getModifyBy());
        $stmt->bindParam (4 , $id);

	$stmt->execute(); 
	$success = 1;}
catch(PDOException $ex){ echo  $ex->getMessage(); } 
return $success;}


//------------------------------------------------------------------------------
 public function InwardSum($user_item_id, $io_Type) {
        $Q = "SELECT SUM(IN_SUBUNIT) AS TOTAL FROM ". $this->_table_name ." WHERE USER_ITEM_ID = ? AND IO_TYPE = ? ";
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

}
