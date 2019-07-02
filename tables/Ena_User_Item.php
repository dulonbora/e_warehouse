<?php

require_once '../db/Kanexon.php';

class Ena_User_Item {

    private $conn = null;
    private $_table_name = "ENA_USER_ITEM";

    public function __construct() {
        $Data = new Kanexon();
        $this->conn = $Data->getDb();
    }

    public function Create_Table() {
        $Q = "CREATE TABLE IF NOT EXISTS ". $this->_table_name ." (
                ID                  BIGINT PRIMARY KEY AUTO_INCREMENT, 
                ITEM_ID `           BIGINT,
                USER_ID             BIGINT,
                MRP                 DECIMAL(30,2),
                TAX_PERCENTAGE      DECIMAL(30,2),
                OPENING_STOCK       DECIMAL(30,2),
                INWARD_STOCK        DECIMAL(30,2),
                OUTWARD_STOCK       DECIMAL(30,2),
                BLEND_STOCK         DECIMAL(30,2),
                PRODIUCTING_STOCK   DECIMAL(30,2),
                PRODIUCED_STOCK     DECIMAL(30,2),
                LOST_STOCK          DECIMAL(30,2),
                CLOSEING_STOCK      DECIMAL(30,2),
                CREATE_ON           BIGINT,
                CREATE_BY           BIGINT,
                IS_ACTIVE           VARCHAR(3) DEFAULT 'YES') ";
        try {
            $this->conn->exec($Q);
            echo $this->_table_name." Table Created....<br/>";
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
    }

}

?>
