<?php

require_once '../db/Kanexon.php';

class Ena_Item_List {

    private $conn = null;
    private $_table_name = "ENA_ITEM_LIST";

    public function __construct() {
        $Data = new Kanexon();
        $this->conn = $Data->getDb();
    }

    public function Create_Table() {
        $Q = "CREATE TABLE IF NOT EXISTS ". $this->_table_name ." (
                ID BIGINT PRIMARY KEY AUTO_INCREMENT, 
                ITEM_NAME VARCHAR(255),
                STRANGTH DECIMAL(30,2),
                GROUP_ID BIGINT,
                CATEGORY_ID BIGINT,
                COMPANY_ID BIGINT,
                TYPE_ID BIGINT,
                LPL_PER_BL DECIMAL(30,2),
                FEE_REQUIRE VARCHAR(3),
                I_FEE DECIMAL(30,2),
                T_FEE DECIMAL(30,2),
                E_FEE DECIMAL(30,2),
                STATUS VARCHAR(50),
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
