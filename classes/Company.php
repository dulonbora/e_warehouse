<?php

require_once '../db/Kanexon.php';
require_once '../models/Mdl_Company.php';

class Company extends Mdl_Company{
    
    private $conn = null;
    private $_table_name = "COMPANY";

    public function __construct() {
        parent::__construct();
        $Data = new Kanexon();
        $this->conn = $Data->getDb();
    }    
    
    //put your code here
    public function Insert(){
    $query = "INSERT INTO COMPANY(EXCISE_USER_ID , ROLE , COMPANY_TYPE , COMPANY_LOGO , COMPANY_NAME , EMAIL , PHONE_NO , ADDRESS , CITY , DISTRICT , SUB_DIVISION , STATE , ZIP , GSTN , PAN_OR_IT_NO , SALES_TAX_NO , CST_NO , STATUS , CREATE_ON , CREATE_BY , MODIFY_ON , MODIFY_BY , IS_ACTIVE) 
            VALUES ( ? , ? , ? , ? , ? , ? , ? , ? , ? , ? , ? , ? , ? , ? , ? , ? , ? , ? , ? , ? , ? , ? , ?) " ; 
    $success = 0;
    try{
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam (1 , $this->getExcise_user_id()); 
            $stmt->bindParam (2 , $this->getRole()); 
            $stmt->bindParam (3 , $this->getCompany_type()); 
            $stmt->bindParam (4 , $this->getCompany_logo()); 
            $stmt->bindParam (5 , $this->getCompany_name()); 
            $stmt->bindParam (6 , $this->getEmail()); 
            $stmt->bindParam (7 , $this->getPhone_no()); 
            $stmt->bindParam (8 , $this->getAddress()); 
            $stmt->bindParam (9 , $this->getCity()); 
            $stmt->bindParam (10 , $this->getDistrict()); 
            $stmt->bindParam (11 , $this->getSub_division()); 
            $stmt->bindParam (12 , $this->getState()); 
            $stmt->bindParam (13 , $this->getZip()); 
            $stmt->bindParam (14 , $this->getGstn()); 
            $stmt->bindParam (15 , $this->getPan_or_it_no()); 
            $stmt->bindParam (16 , $this->getSales_tax_no()); 
            $stmt->bindParam (17 , $this->getCst_no()); 
            $stmt->bindParam (18 , $this->getStatus()); 
            $stmt->bindParam (19 , $this->getCreate_on()); 
            $stmt->bindParam (20 , $this->getCreate_by()); 
            $stmt->bindParam (21 , $this->getModify_on()); 
            $stmt->bindParam (22 , $this->getModify_by()); 
            $stmt->bindParam (23 , $this->getIs_active()); 

            $stmt->execute(); 
            $success = 1;}
    catch(PDOException $ex){ echo  $ex->getMessage(); } 
    return $success;}

 /*----------------------------------------------------------*/
    public function Check_If_Exists($id){
        $_sl = 0;
        $Q = "SELECT ID FROM COMPANY WHERE CREATE_BY = ? ";
        try{
        
	$stmt = $this->conn->prepare($Q);
	$stmt->bindParam (1 , $id);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
            if($row>0){
                $_sl = $row["ID"];
            }
        }
        catch(PDOException $ex){ echo $ex;}
    return $_sl;
    }
    
    public function CheckedExciseUserIdIsNull(){
    ob_start();
    if (session_status() == PHP_SESSION_NONE) {session_start();}
    if(strlen($_SESSION['excise_user_id']) > 0){}  else {
        $this->pageRedirect("http://assamexcise.in/");
    }
        
    }
    
    public function pageRedirect($page) {
        echo "<script type=\"text/javascript\">	";
        echo "document.location = '" . $page . "' ";
        echo "</script>";
    }

        
        
 /*----------------------------------------------------------*/
    public function UpdateCompanyDetails($id){
    $query = "UPDATE COMPANY SET COMPANY_TYPE = ? , COMPANY_NAME = ? , EMAIL = ? , PHONE_NO = ? , ADDRESS = ? , CITY = ? , DISTRICT = ? , SUB_DIVISION = ? , STATE = ? , ZIP = ? , MODIFY_ON = ? , MODIFY_BY = ? , IS_ACTIVE = ?, STATUS = ? 
            WHERE ID = ? ";
    $success = 0;
    try{
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam (1 , $this->getCompany_type()); 
            $stmt->bindParam (2 , $this->getCompany_name()); 
            $stmt->bindParam (3 , $this->getEmail()); 
            $stmt->bindParam (4 , $this->getPhone_no()); 
            $stmt->bindParam (5 , $this->getAddress()); 
            $stmt->bindParam (6 , $this->getCity()); 
            $stmt->bindParam (7 , $this->getDistrict()); 
            $stmt->bindParam (8 , $this->getSub_division()); 
            $stmt->bindParam (9 , $this->getState()); 
            $stmt->bindParam (10 , $this->getZip()); 
            $stmt->bindParam (11 , $this->getModify_on()); 
            $stmt->bindParam (12 , $this->getModify_by()); 
            $stmt->bindParam (13 , $this->getIs_active()); 
            $stmt->bindParam (14 , $this->getStatus()); 
            $stmt->bindParam (15 , $id); 

            $stmt->execute(); 
            $success = 1;}
    catch(PDOException $ex){ echo  $ex->getMessage(); } 
    return $success;}
    
    /*----------------------------------------------------------*/
    

 /*----------------------------------------------------------*/

/*
$response = array(); 
$response["SUCCESS"] = 0;

$__com = new Company();

$_company_type = filter_input(INPUT_POST , "COMPANY_TYPE");
$_company_name = filter_input(INPUT_POST , "COMPANY_NAME");
$_email = filter_input(INPUT_POST , "EMAIL");
$_phone_no = filter_input(INPUT_POST , "PHONE_NO");
$_address = filter_input(INPUT_POST , "ADDRESS");
$_city = filter_input(INPUT_POST , "CITY");
$_district = filter_input(INPUT_POST , "DISTRICT");
$_sub_division = filter_input(INPUT_POST , "SUB_DIVISION");
$_state = filter_input(INPUT_POST , "STATE");
$_zip = filter_input(INPUT_POST , "ZIP");
$_modify_on = filter_input(INPUT_POST , "MODIFY_ON");
$_modify_by = filter_input(INPUT_POST , "MODIFY_BY");
$_is_active = filter_input(INPUT_POST , "IS_ACTIVE");
$_id = filter_input(INPUT_POST , "ID");


$__com->setCOMPANY_TYPE($_company_type);
$__com->setCOMPANY_NAME($_company_name);
$__com->setEMAIL($_email);
$__com->setPHONE_NO($_phone_no);
$__com->setADDRESS($_address);
$__com->setCITY($_city);
$__com->setDISTRICT($_district);
$__com->setSUB_DIVISION($_sub_division);
$__com->setSTATE($_state);
$__com->setZIP($_zip);
$__com->setMODIFY_ON($_modify_on);
$__com->setMODIFY_BY($_modify_by);
$__com->setIS_ACTIVE($_is_active);
$__com->setID($_id);

if($__com->Update($_id)==1){$response["SUCCESS"] = 1;}

echo json_encode($response);
exit();
*/
    
    
    public function UpdateTaxDetails($id){
    $query = "UPDATE COMPANY SET GSTN = ? , PAN_OR_IT_NO = ? , SALES_TAX_NO = ? , CST_NO = ? WHERE ID = ? ";
    $success = 0;
    try{
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam (1 , $this->getGstn()); 
            $stmt->bindParam (2 , $this->getPan_or_it_no()); 
            $stmt->bindParam (3 , $this->getSales_tax_no()); 
            $stmt->bindParam (4 , $this->getCst_no()); 
            $stmt->bindParam (5 , $id); 

            $stmt->execute(); 
            $success = 1;}
    catch(PDOException $ex){ echo  $ex->getMessage(); } 
    return $success;}
    
    public function UpdateImage($id){
    $query = "UPDATE COMPANY SET COMPANY_LOGO = ? WHERE ID = ? ";
    $success = 0;
    try{
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam (1 , $this->getCompany_logo()); 
            $stmt->bindParam (2 , $id); 

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
            $this->setExcise_user_id($row['EXCISE_USER_ID']);
            $this->setRole($row['ROLE']);
            $this->setCompany_type($row['COMPANY_TYPE']);
            $this->setCompany_name($row['COMPANY_NAME']);
            $this->setCompany_logo($row['COMPANY_LOGO']);
            $this->setEmail($row['EMAIL']);
            $this->setPhone_no($row['PHONE_NO']);
            $this->setAddress($row['ADDRESS']);
            $this->setCity($row['CITY']);
            $this->setDistrict($row['DISTRICT']);
            $this->setSub_division($row['SUB_DIVISION']);
            $this->setState($row['STATE']);
            $this->setZip($row['ZIP']);
            $this->setGstn($row['GSTN']);
            $this->setPan_or_it_no($row['PAN_OR_IT_NO']);
            $this->setSales_tax_no($row['SALES_TAX_NO']);
            $this->setCst_no($row['CST_NO']);
            $this->setStatus($row['STATUS']);
            $this->setCreate_on($row['CREATE_ON']);
            $this->setCreate_by($row['CREATE_BY']);
            $this->setModify_on($row['MODIFY_ON']);
            $this->setModify_by($row['MODIFY_BY']);
            $this->setIs_active($row['IS_ACTIVE']);
    }

    public function LoadToSession($id) {
        $Q = "SELECT * FROM ".$this->_table_name." WHERE ID = ? ";
        $ok = 0;
        try {
            $stmt = $this->conn->prepare($Q);
            $stmt->bindParam (1 , $id);
            $stmt->execute();
            $row = $stmt->fetch();
            if ($row > 0) {
                $this->SessionSetter($row);                
                $ok = 1;
            }   
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $ok;
    }
    
    public function UpdateStatus($id, $status) {
        $query = "UPDATE " . $this->_table_name . " SET STATUS = ?, MODIFY_ON = ?, MODIFY_BY = ? WHERE ID = ? ";
        $success = 0;
        try {
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(1, $status);
            $stmt->bindParam(2, $this->getModify_on());
            $stmt->bindParam(3, $this->getModify_by());
            $stmt->bindParam(4, $id);

            $stmt->execute();
            $success = 1;
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $success;
    }

    public function SessionSetter($row){
            $_SESSION['id']                 = $row['ID'];
            $_SESSION['ID']                 = $row['ID'];
            $_SESSION['ROLE']               = $row['ROLE'];
            $_SESSION['EXCISE_USER_ID']     = $row['EXCISE_USER_ID'];
            $_SESSION['excise_user_id']     = $row['EXCISE_USER_ID'];
            $_SESSION['COMPANY_TYPE']       = $row['COMPANY_TYPE'];
            $_SESSION['COMPANY_NAME']       = $row['COMPANY_NAME'];
            $_SESSION['COMPANY_LOGO']       = $row['COMPANY_LOGO'];
            $_SESSION['EMAIL']              = $row['EMAIL'];
            $_SESSION['PHONE_NO']           = $row['PHONE_NO'];
            $_SESSION['ADDRESS']            = $row['ADDRESS'];
            $_SESSION['CITY']               = $row['CITY'];
            $_SESSION['DISTRICT']           = $row['DISTRICT'];
            $_SESSION['SUB_DIVISION']       = $row['SUB_DIVISION'];
            $_SESSION['STATE']              = $row['STATE'];
            $_SESSION['CITY']               = $row['CITY'];
            $_SESSION['ZIP']                = $row['ZIP'];
            $_SESSION['GSTN']               = $row['GSTN'];
            $_SESSION['PAN_OR_IT_NO']       = $row['PAN_OR_IT_NO'];
            $_SESSION['SALES_TAX_NO']       = $row['SALES_TAX_NO'];
            $_SESSION['CST_NO']             = $row['CST_NO'];
            $_SESSION['STATUS']             = $row['STATUS'];
            $_SESSION['CITY']               = $row['CITY'];
            $_SESSION['CREATE_ON']          = $row['CREATE_ON'];
            $_SESSION['CREATE_BY']          = $row['CREATE_BY'];
            $_SESSION['MODIFY_ON']          = $row['MODIFY_ON'];
            $_SESSION['MODIFY_BY']          = $row['MODIFY_BY'];
            $_SESSION['IS_ACTIVE']          = $row['IS_ACTIVE'];
    }
    
    public function Logout(){
            $_SESSION['id']                 = NULL;
            $_SESSION['EXCISE_USER_ID']     = NULL;
            $_SESSION['excise_user_id']     = NULL;
            $_SESSION['COMPANY_TYPE']       = NULL;
            $_SESSION['COMPANY_NAME']       = NULL;
            $_SESSION['COMPANY_LOGO']       = NULL;
            $_SESSION['EMAIL']              = NULL;
            $_SESSION['PHONE_NO']           = NULL;
            $_SESSION['ADDRESS']            = NULL;
            $_SESSION['CITY']               = NULL;
            $_SESSION['DISTRICT']           = NULL;
            $_SESSION['SUB_DIVISION']       = NULL;
            $_SESSION['STATE']              = NULL;
            $_SESSION['CITY']               = NULL;
            $_SESSION['ZIP']                = NULL;
            $_SESSION['GSTN']               = NULL;
            $_SESSION['PAN_OR_IT_NO']       = NULL;
            $_SESSION['SALES_TAX_NO']       = NULL;
            $_SESSION['CST_NO']             = NULL;
            $_SESSION['STATUS']             = NULL;
            $_SESSION['CITY']               = NULL;
            $_SESSION['CREATE_ON']          = NULL;
            $_SESSION['CREATE_BY']          = NULL;
            $_SESSION['MODIFY_ON']          = NULL;
            $_SESSION['MODIFY_BY']          = NULL;
            $_SESSION['IS_ACTIVE']          = NULL;
    }
    
    public function GenRole($role) {
        $type = "";
        switch ($role) {
            case "U":
                $type = "MANUFACTORY";
                break;
            case "O":
                $type = "OFFICER";
                break;
        }
        return $type;
    }
    
    public function GenCompanyType($role) {
        $type = "";
        switch ($role) {
            case "BOT":
                $type = "BOTTLING";
                break;
            case "MNF":
                $type = "MANUFACTORY";
                break;
            
            case "BRE":
                $type = "BREWERY";
                break;
            
            case "WHS":
                $type = "WHOLESALER";
                break;
            
            case "DIS":
                $type = "DISTILLERY";
                break;
            
            case "SE":
                $type = "SUPERINTENDENT";
                break;
            
            case "DSE":
                $type = "DEPUTY SUPERINTENDENT";
                break;
            
            case "CE":
                $type = "COMMISSIONER";
                break;
            
            case "ACE":
                $type = "ADDITIONAL COMMISSIONER";
                break;
            
            case "DA":
                $type = "DEALING ASSISTANT";
                break;
            
            case "A":
                $type = "ADMIN";
                break;
            
            case "RTL":
                $type = "RETAIL";
                break;
            
        }
        return $type;
    }
    
    public function GenStatus($role) {
        $type = "";
        switch ($role) {
            case 1:
                $type = "Pending Verification";
                break;
            
            case 5:
                $type = "Active";
                break;
            
        }
        return $type;
    }
    
    function GenerateAction_Officers($id) {
        $type = "";
        switch ($id) {
            case 0:
                $type = "Pending for verification";
                break;
            case 5:
                $type = "Verified";
                break;
            case 2:
                $type = "On leave";
                break;
            case 4:
                $type = "Suspended";
                break;
            case 3:
                $type = "Retired";
                break;
         
        }
        return $type;
    }

    
    public function returnCompanyName($id){
        $_sl = "";
        $Q = "SELECT COMPANY_NAME FROM ".$this->_table_name." WHERE ID = ? ";
        try{
        
	$stmt = $this->conn->prepare($Q);
	$stmt->bindParam (1 , $id);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
            if($row>0){
                $_sl = $row["COMPANY_NAME"];
            }
        }
        catch(PDOException $ex){ echo $ex;}
    return $_sl;
    }
    
    
    public function TotalCount($role) {
        $Q = "SELECT COUNT(*) AS TOTAL FROM " . $this->_table_name . " WHERE ROLE = ? ";
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

    public function loadAllPagging($start, $limit, $role) {
        $Q = "SELECT * FROM " . $this->_table_name . " WHERE ROLE = ? ORDER BY ID DESC ";
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

}
