<?php

require_once '../db/Kanexon.php';

class Massage {

    private $conn = null;
    private $_table_name = "MASSAGE";

    public function __construct() {
        $Data = new Kanexon();
        $this->conn = $Data->getDb();
    }

    public function Create_Table() {
        $Q = "CREATE TABLE IF NOT EXISTS ". $this->_table_name ." (
                ID BIGINT PRIMARY KEY AUTO_INCREMENT, 
                USER_ID VARCHAR(20),
                TO_USER_ID BIGINT,
                DISTRICT_ID BIGINT,
                MODULE_TYPE VARCHAR(20),
                MASSAGE_TYPE VARCHAR(20), 
                NOTE  VARCHAR(255),
                DESIGNATION VARCHAR(10),
                MODULE_IDS BIGINT,
                ACTION INTEGER,
                STATUS INTEGER,
                CREATE_ON BIGINT, 
                CREATE_BY BIGINT,
                MODIFY_ON BIGINT, 
                MODIFY_BY BIGINT,
                IS_ACTIVE VARCHAR(3)) ";
    
        try {
            $this->conn->exec($Q);
            echo $this->_table_name." Table Created....<br/>";
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
    }

}

?>
