<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Transfar_Items_Consignor
 *
 * @author Dulon
 */
class Transfar_Items_Consignor {
    
    private $conn = null;
    private $_table_name = "TRANSFAR_ITEMS";

    public function __construct() {
        $Data = new Kanexon();
        $this->conn = $Data->getDb();
    }

    public function Create_Table() {
        $Q = "CREATE TABLE IF NOT EXISTS " . $this->_table_name . " (
                ID BIGINT PRIMARY KEY AUTO_INCREMENT, 
                MASTER_ID BIGINT,
                ITEM_ID BIGINT,
                PACKING_ID BIGINT,
                USER_ITEM_ID BIGINT,
                UNIT VARCHAR(30),
                IO_TYPE VARCHAR(10),
                PACKING_SIZE INTEGER,
                BATCH_NO VARCHAR(50),
                TOTAL_CASE DECIMAL(30,2),
                TOTAL_BOTTLE INTEGER,
                TOTAL_BL DECIMAL(30,2),
                TOTAL_LPL DECIMAL(30,2),
                TOTAL_COST DECIMAL(30,2),
                TOTAL_ADV DECIMAL(30,2),
                TOTAL_FEE DECIMAL(30,2),
                TOTAL_VAT DECIMAL(30,2),
                TCS DECIMAL(30,2),
                TOTAL_MRP DECIMAL(30,2),
                TOTAL_AMOUNT DECIMAL(30,2),
                STATUS INTEGER,
                IS_ACTIVE VARCHAR(3)) ";
        try {
            $this->conn->exec($Q);
            echo $this->_table_name . " Table Created....<br/>";
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
    }
    

    
}
