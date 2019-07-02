<?php

require_once '../db/Kanexon.php';

class Mix_Item_Transfar {

    private $conn = null;
    private $_table_name = "MIX_ITEM_TRANSFAR";

    public function __construct() {
        $Data = new Kanexon();
        $this->conn = $Data->getDb();
    }

    public function Create_Table() {
        $Q = "CREATE TABLE IF NOT EXISTS ". $this->_table_name ." (
                ID BIGINT PRIMARY KEY AUTO_INCREMENT, 
                ITEM_ID BIGINT,
                USER_ITEM_ID BIGINT,
                USER_FROM BIGINT,
                USER_TO BIGINT,
                TOO VARCHAR(150),
                IO_TYPE VARCHAR(5),
                MODE VARCHAR(150),
                TRANK_NO VARCHAR(20),
                PERMIT_ID BIGINT,
                TYPE VARCHAR(20),
                NOTE VARCHAR(255),
                IN_UNIT DECIMAL(30,2),
                IN_SUBUNIT DECIMAL(30,2),
                LONGDATE BIGINT,
                STATUS INTEGER,
                CREATE_ON BIGINT,
                CREATE_BY BIGINT,
                MODIFY_ON BIGINT,
                MODIFY_BY BIGINT,
                IS_ACTIVE VARCHAR(3) DEFAULT 'YES') ";

    
        try {
            $this->conn->exec($Q);
            echo $this->_table_name." Table Created....<br/>";
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
    }

}

?>
