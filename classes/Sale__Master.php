<?php
require_once '../db/Kanexon.php';
require_once '../models/Mdl_Sale_Master.php';

class Sale__Master extends Mdl_Sale_Master {
    
    private $conn = null;

    public function __construct() {
        parent::__construct();
        $Data = new Kanexon();
        $this->conn = $Data->getDb();
    } 
    //put your code here
    
    public function Insert(){
$query = "INSERT INTO SALE_MASTER(USER_ID , LONGDATE , TOTAL_ITEM , TOTAL_ADV , TOTAL_FEE , TOTAL_VAT , MRP_VALUE , TOTAL_BL , TOTAL_LPL , IS_CONVERTED , STATUS , CREATE_BY , CREATE_ON , MODIFY_ON , MODIFY_BY , IS_ACTIVE) 
	VALUES ( ? , ? , ? , ? , ? , ? , ? , ? , ? , ? , ? , ? , ? , ? , ? , ?) " ; 
$success = 0;
try{
	$stmt = $this->conn->prepare($query);
	$stmt->bindParam (1 , $this->getUser_id()); 
	$stmt->bindParam (2 , $this->getLongdate()); 
	$stmt->bindParam (3 , $this->getTotal_item()); 
	$stmt->bindParam (4 , $this->getTotal_adv()); 
	$stmt->bindParam (5 , $this->getTotal_fee()); 
	$stmt->bindParam (6 , $this->getTotal_vat()); 
	$stmt->bindParam (7 , $this->getMrp_value()); 
	$stmt->bindParam (8 , $this->getTotal_bl()); 
	$stmt->bindParam (9 , $this->getTotal_lpl()); 
	$stmt->bindParam (10 , $this->getIs_converted()); 
	$stmt->bindParam (11 , $this->getStatus()); 
	$stmt->bindParam (12 , $this->getCreate_by()); 
	$stmt->bindParam (13 , $this->getCreate_on()); 
	$stmt->bindParam (14 , $this->getModify_on()); 
	$stmt->bindParam (15 , $this->getModify_by()); 
	$stmt->bindParam (16 , $this->getIs_active()); 

	$stmt->execute(); 
	$success = 1;}
catch(PDOException $ex){ echo  $ex->getMessage(); } 
return $success;}

 /*----------------------------------------------------------*/


}
