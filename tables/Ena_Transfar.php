<?php

require_once '../db/Kanexon.php';

class Ena_Transfar {

    private $conn = null;
    private $_table_name = "ENA_TRANSFAR";

    public function __construct() {
        $Data = new Kanexon();
        $this->conn = $Data->getDb();
    }

    public function Create_Table() {
        $Q = "CREATE TABLE IF NOT EXISTS ". $this->_table_name ." (
                ID              BIGINT PRIMARY KEY AUTO_INCREMENT, 
                MASTER_ID       BIGINT,
                ITEM_ID         BIGINT,
                USER_ITEM_ID    BIGINT,
                USER_FROM       BIGINT,
                USER_TO         BIGINT,
                TOO             VARCHAR(150),
                IO_TYPE         VARCHAR(10),
                MODE            VARCHAR(150),
                TRANK_NO        VARCHAR(20),
                PERMIT_ID       BIGINT,
                BL              DECIMAL(30,2),
                TOTAL_COST      DECIMAL(30,2),
                TOTAL_FEE       DECIMAL(30,2),
                TOTAL_VAT       DECIMAL(30,2),
                TCS             DECIMAL(30,2),
                TOTAL_MRP       DECIMAL(30,2),
                TOTAL_AMOUNT    DECIMAL(30,2),
                STATUS          INTEGER,
                LONGDATE        BIGINT,
                CREATE_ON       BIGINT,
                CREATE_BY       BIGINT,
                MODIFY_ON       BIGINT,
                MODIFY_BY       BIGINT,
                IS_ACTIVE       VARCHAR(3) DEFAULT 'YES') ";

    
        try {
            $this->conn->exec($Q);
            echo $this->_table_name." Table Created....<br/>";
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
    }
    


}

?>
