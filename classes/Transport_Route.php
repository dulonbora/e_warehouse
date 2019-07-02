<?php


require_once '../db/Kanexon.php';
require_once '../models/Mdl_Transport_Route.php';

class Transport_Route extends Mdl_Transport_Route{
    //put your code here
    
        private $conn = null;

    public function __construct() {
        parent::__construct();
        $Data = new Kanexon();
        $this->conn = $Data->getDb();
    }

    
    public function Insert(){
    $query = "INSERT INTO TRANSPORT_ROUTE(TRANSPORT_ROUTE , USER_FROM , USER_TO , STATUS , CREATE_ON , CREATE_BY , MODIFY_BY , MODIFY_ON , IS_ACTIVE) 
            VALUES ( ? , ? , ? , ? , ? , ? , ? , ? , ?) " ; 
    $success = 0;
    try{
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam (1 , $this->getTransport_route()); 
            $stmt->bindParam (2 , $this->getUser_from()); 
            $stmt->bindParam (3 , $this->getUser_to()); 
            $stmt->bindParam (4 , $this->getStatus()); 
            $stmt->bindParam (5 , $this->getCreate_on()); 
            $stmt->bindParam (6 , $this->getCreate_by()); 
            $stmt->bindParam (7 , $this->getModify_by()); 
            $stmt->bindParam (8 , $this->getModify_on()); 
            $stmt->bindParam (9 , $this->getIs_active()); 

            $stmt->execute(); 
            $success = 1;}
    catch(PDOException $ex){ echo  $ex->getMessage(); } 
    return $success;}
    
    
    
        public function returnRoute($user_to, $user_from) {
        $Q = "SELECT TRANSPORT_ROUTE FROM " . $this->_table_name . " WHERE USER_TO = ? AND USER_FROM = ? ";
        $cno = "";
        try {
            $stmt = $this->conn->prepare($Q);
            $stmt->bindParam(1, $user_to);
            $stmt->bindParam(2, $user_from);
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $cno = $row["TRANSPORT_ROUTE"];
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $cno;
    }

    
    

     /*----------------------------------------------------------*/

/*
    $response = array(); 
    $response["SUCCESS"] = 0;

    $__tra = new Transport_Route();

    $_longdate = filter_input(INPUT_POST , "LONGDATE");
    $_user_from = filter_input(INPUT_POST , "USER_FROM");
    $_user_to = filter_input(INPUT_POST , "USER_TO");
    $_status = filter_input(INPUT_POST , "STATUS");
    $_create_on = filter_input(INPUT_POST , "CREATE_ON");
    $_create_by = filter_input(INPUT_POST , "CREATE_BY");
    $_modify_by = filter_input(INPUT_POST , "MODIFY_BY");
    $_modify_on = filter_input(INPUT_POST , "MODIFY_ON");
    $_is_active = filter_input(INPUT_POST , "IS_ACTIVE");


    $__tra->setLONGDATE($_longdate);
    $__tra->setUSER_FROM($_user_from);
    $__tra->setUSER_TO($_user_to);
    $__tra->setSTATUS($_status);
    $__tra->setCREATE_ON($_create_on);
    $__tra->setCREATE_BY($_create_by);
    $__tra->setMODIFY_BY($_modify_by);
    $__tra->setMODIFY_ON($_modify_on);
    $__tra->setIS_ACTIVE($_is_active);

    if($__tra->Insert()==1){$response["SUCCESS"] = 1;}

    echo json_encode($response);
    exit();
 * 
 * 
 */
    
}
