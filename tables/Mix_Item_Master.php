<?php

require_once '../db/Kanexon.php';

class Mix_Item_Master {

    private $conn = null;
    private $_table_name = "MIX_ITEM_MASTER";

    public function __construct() {
        $Data = new Kanexon();
        $this->conn = $Data->getDb();
    }

    public function Create_Table() {
        $Q = "CREATE TABLE IF NOT EXISTS ". $this->_table_name ." (
                ID BIGINT PRIMARY KEY AUTO_INCREMENT, 
                ITEM_ID BIGINT,
                PACKING_ID BIGINT,
                UNIT VARCHAR(20),
                SUB_UNIT VARCHAR(20),
                SUB_UNIT_VALUE INTEGER,
                ITEM_TYPE VARCHAR(20),
                
                OPENING_STOCK_UNIT DECIMAL(30,2),
                OPENING_STOCK_SUB_UNIT DECIMAL(30,2),
                CLOSEING_STOCK_UNIT DECIMAL(30,2),
                CLOSEING_STOCK_SUB_UNIT DECIMAL(30,2),
                CLOSEING_STOCK_STR VARCHAR(255),
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
