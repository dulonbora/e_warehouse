<?php

require_once '../db/Kanexon.php';

class Brand_List {

    private $conn = null;
    private $_table_name = "USER_ITEM_LIST";

    public function __construct() {
        $Data = new Kanexon();
        $this->conn = $Data->getDb();
    }

    public function Create_Table() {
        $Q = "CREATE TABLE IF NOT EXISTS ". $this->_table_name ." (
                ID BIGINT PRIMARY KEY AUTO_INCREMENT, 
                ITEM_ID         BIGINT,
                FYEAR           VARCHAR(10),
                PACKING_ID      BIGINT,
                USER_ID         BIGINT,
                OPENING_STOCK   DECIMAL(30,2),
                INWARD_STOCK    DECIMAL(30,2),
                OUTWARD_STOCK   DECIMAL(30,2),
                PRODIUCTING_STOCK DECIMAL(30,2),
                PRODIUCED_STOCK DECIMAL(30,2),
                LOST_STOCK      DECIMAL(30,2),
                CLOSEING_STOCK  DECIMAL(30,2),
                STATUS          INTEGER,
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
