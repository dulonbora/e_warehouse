<?php


require_once '../db/Kanexon.php';
require_once '../models/Mdl_Mix_Item_Master.php';

class Mix__Item__Master extends Mdl_Mix_Item_Master {

    private $conn = null;
    private $_table_name = "MIX_ITEM_MASTER";

    public function __construct() {
        parent::__construct();
        $Data = new Kanexon();
        $this->conn = $Data->getDb();
    }
    
    public function Insert(){
$query = "INSERT INTO ". $this->_table_name ."(ITEM_ID , PACKING_ID , UNIT , SUB_UNIT , 
    SUB_UNIT_VALUE , OPENING_STOCK_UNIT , OPENING_STOCK_SUB_UNIT , 
    CLOSEING_STOCK_UNIT , CLOSEING_STOCK_SUB_UNIT , 
    CLOSEING_STOCK_STR , ITEM_TYPE , STATUS , CREATE_ON , CREATE_BY , MODIFY_ON , MODIFY_BY , IS_ACTIVE) 
	VALUES ( ? , ? , ? , ? , ? , ? , ? , ? , ? , ? , ? , ? , ? , ? , ? , ? , ?) " ; 
$success = 0;
try{
	$stmt = $this->conn->prepare($query);
	$stmt->bindParam (1 , $this->getItemId()); 
	$stmt->bindParam (2 , $this->getPackingId()); 
	$stmt->bindParam (3 , $this->getUnit()); 
	$stmt->bindParam (4 , $this->getSubUnit()); 
	$stmt->bindParam (5 , $this->getSubUnitValue()); 
	$stmt->bindParam (6 , $this->getOpeningStockUnit()); 
	$stmt->bindParam (7 , $this->getOpeningStockSubUnit()); 
	$stmt->bindParam (8 , $this->getCloseingStockUnit()); 
	$stmt->bindParam (9 , $this->getCloseingStockSubUnit()); 
	$stmt->bindParam (10 , $this->getCloseingStockStr()); 
	$stmt->bindParam (11 , $this->getItemType()); 
	$stmt->bindParam (12 , $this->getStatus()); 
	$stmt->bindParam (13 , $this->getCreateOn()); 
	$stmt->bindParam (14 , $this->getCreateBy()); 
	$stmt->bindParam (15 , $this->getModifyOn()); 
	$stmt->bindParam (16 , $this->getModifyBy()); 
	$stmt->bindParam (17 , $this->getIsActive()); 

	$stmt->execute(); 
	$success = 1;}
catch(PDOException $ex){ echo  $ex->getMessage(); } 
return $success;}



    public function ChecAlreadyExit($itemId, $packingId, $item_type, $userId) {
        $ok = 0;
        $query = "SELECT * FROM " . $this->_table_name . " WHERE ITEM_ID = ? AND PACKING_ID = ? AND ITEM_TYPE = ? AND CREATE_BY = ? ";
        try {
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(1, $itemId);
            $stmt->bindParam(2, $packingId);
            $stmt->bindParam(3, $item_type);
            $stmt->bindParam(4, $userId);
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




 /*----------------------------------------------------------*/
public function UpdateStock($id) {
        
        
        $query = " UPDATE " . $this->_table_name . " SET CLOSEING_STOCK_UNIT = ?, "
                . " CLOSEING_STOCK_SUB_UNIT = ?, "
                . " CLOSEING_STOCK_STR = ? WHERE ID = ? ";
        $success = 0;
        try {
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(1, $this->getCloseingStockUnit());
            $stmt->bindParam(2, $this->getCloseingStockSubUnit());
            $stmt->bindParam(3, $this->getCloseingStockStr());
            $stmt->bindParam(4, $id);

            $stmt->execute();
            $success = 1;
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $success;
    }
}
