<?php

require_once '../db/Kanexon.php';

class View_Transfar_Master {

    private $conn = null;
    private $_view_name = "VIEW_TRANSFER_MASTER";

    public function __construct() {
        $Data = new Kanexon();
        $this->conn = $Data->getDb();
    }

    public function Create_View() {
        
        $Q ="CREATE OR REPLACE VIEW VIEW_TRANSFER_MASTER AS SELECT 
            TM.*,
            CA.COMPANY_NAME AS USER_FROM_NAME, 
            COM.COMPANY_NAME AS TO_FROM_NAME
            
            FROM TRANSFAR_MASTER as TM
            LEFT JOIN COMPANY as CA ON CA.ID = TM.USER_FROM
            LEFT JOIN COMPANY as COM ON COM.ID = TM.USER_TO
           WHERE ET.IS_ACTIVE = 'YES'
            ";

        try {
            $this->conn->exec($Q);
            echo $this->_view_name . " Table Created....<br/>";
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
    }
    

}

?>
