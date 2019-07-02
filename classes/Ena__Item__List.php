<?php

require_once '../db/Kanexon.php';
require_once '../models/Mdl_Ena_List.php';


class Ena__Item__List extends Mdl_Ena_List{
    
    private $conn = null;
    private $_table_name = "ENA_ITEM_LIST";

    public function __construct() {
        parent::__construct();
        $Data = new Kanexon();
        $this->conn = $Data->getDb();
    }
    //put your code here
    
    public function Insert(){
$query = "INSERT INTO " . $this->_table_name . "(ITEM_NAME , GROUP_ID , CATEGORY_ID , TYPE_ID , STRANGTH , LPL_PER_BL , FEE_REQUIRE , I_FEE , T_FEE , E_FEE , STATUS , IS_ACTIVE) 
	VALUES ( ? , ? , ? , ? , ? , ? , ? , ? , ? , ? , ? , ?) " ; 
$success = 0;
try{
	$stmt = $this->conn->prepare($query);
	$stmt->bindParam (1 , $this->getItem_name()); 
	$stmt->bindParam (2 , $this->getGroup_id()); 
	$stmt->bindParam (3 , $this->getCategory_id()); 
	$stmt->bindParam (4 , $this->getType_id()); 
	$stmt->bindParam (5 , $this->getStrangth()); 
	$stmt->bindParam (6 , $this->getLpl_per_bl()); 
	$stmt->bindParam (7 , $this->getFee_require()); 
	$stmt->bindParam (8 , $this->getI_fee()); 
	$stmt->bindParam (9 , $this->getT_fee()); 
	$stmt->bindParam (10 , $this->getE_fee()); 
	$stmt->bindParam (11 , $this->getStatus()); 
	$stmt->bindParam (12 , $this->getIs_active()); 

	$stmt->execute(); 
	$success = 1;}
catch(PDOException $ex){ echo  $ex->getMessage(); } 
return $success;}

    public function Update($_id){
$query = "UPDATE " . $this->_table_name . " SET ITEM_NAME = ?, GROUP_ID = ?, CATEGORY_ID = ?, TYPE_ID = ?, STRANGTH = ?, LPL_PER_BL = ?, FEE_REQUIRE = ?, I_FEE = ?, T_FEE = ?, E_FEE = ?, STATUS = ? WHERE ID = ? ";
$success = 0;
try{
	$stmt = $this->conn->prepare($query);
	$stmt->bindParam (1 , $this->getItem_name()); 
	$stmt->bindParam (2 , $this->getGroup_id()); 
	$stmt->bindParam (3 , $this->getCategory_id()); 
	$stmt->bindParam (4 , $this->getType_id()); 
	$stmt->bindParam (5 , $this->getStrangth()); 
	$stmt->bindParam (6 , $this->getLpl_per_bl()); 
	$stmt->bindParam (7 , $this->getFee_require()); 
	$stmt->bindParam (8 , $this->getI_fee()); 
	$stmt->bindParam (9 , $this->getT_fee()); 
	$stmt->bindParam (10 , $this->getE_fee()); 
	$stmt->bindParam (11 , $this->getStatus()); 
	$stmt->bindParam (12 , $_id); 

	$stmt->execute(); 
	$success = 1;}
catch(PDOException $ex){ echo  $ex->getMessage(); } 
return $success;}


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
            $this->setItem_name($row['ITEM_NAME']);
            $this->setStrangth($row['STRANGTH']);
            $this->setGroup_id($row['GROUP_ID']);
            $this->setCategory_id($row['CATEGORY_ID']);
            $this->setType_id($row['TYPE_ID']);
            
            $this->setFee_require($row['FEE_REQUIRE']);
            $this->setT_fee($row['T_FEE']);
            $this->setI_fee($row['I_FEE']);
            $this->setE_fee($row['E_FEE']);
            
            $this->setLpl_per_bl($row['LPL_PER_BL']);
            $this->setStatus($row['STATUS']);
            $this->setIs_active($row['IS_ACTIVE']);
    }


 /*----------------------------------------------------------*/
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
    
    
    public function loadAllSearch($_str, $start, $limit) {
        $Q = "SELECT * FROM ".$this->_table_name." WHERE ITEM_NAME LIKE :str_search ORDER BY ID DESC LIMIT " . $start . " ," . $limit . " ";
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
