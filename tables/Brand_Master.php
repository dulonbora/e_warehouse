<?php

require_once '../db/Kanexon.php';

class Brand_Master {

    private $conn = null;
    private $_table_name = "BRAND_MASTER";

    public function __construct() {
        $Data = new Kanexon();
        $this->conn = $Data->getDb();
    }

    public function Create_Table() {
        $Q = "CREATE TABLE IF NOT EXISTS ". $this->_table_name ." (
                ID BIGINT PRIMARY KEY AUTO_INCREMENT, 
                NAME VARCHAR(255),
                STRANGTH DECIMAL,
                GROUP_ID BIGINT,
                CATEGORY_ID BIGINT,
                COMPANY_ID BIGINT,
                TYPE_ID BIGINT,
                IS_IMPORTED VARCHAR(3),
                IS_NEW VARCHAR(20),
                ITEM_FOR VARCHAR(20),
                IMAGE_LINK VARCHAR(255),
                DESCRIPTION VARCHAR(255),
                STATUS VARCHAR(100),
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
