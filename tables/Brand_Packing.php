<?php

require_once '../db/Kanexon.php';

class Brand_Packing {

    private $conn = null;
    private $_table_name = "BRAND_PACKING";

    public function __construct() {
        $Data = new Kanexon();
        $this->conn = $Data->getDb();
    }

    public function Create_Table() {
        $Q = "CREATE TABLE IF NOT EXISTS ". $this->_table_name ." (
                ID BIGINT PRIMARY KEY AUTO_INCREMENT, 
                FYEAR VARCHAR(20), 
                MASTER_ID BIGINT, 
                BOTTLES_PER_CASE INTEGER,
                ML_PER_CASE INTEGER, 
                BL_PER_CASE DECIMAL(30,2),
                LPL_PER_CASE DECIMAL(30,2),
                LPL_PER_BOTTLE DECIMAL(30,2),
                AVD_AMOUNT DECIMAL(30,2),
                AVD_AMOUNT_PER_BOTTLE DECIMAL(30,2),
                TFF_AMOUNT DECIMAL(30,2),
                TFF_PER_BOTTLE DECIMAL(30,2),
                IMPORT_FEE DECIMAL(30,2),
                EXPORT_FEE DECIMAL(30,2),
                VAT DECIMAL(30,2),
                VAT_PER_BOTTLE DECIMAL(30,2),
                LANDED_TO_WHOLESALE DECIMAL(30,2),
                WHOLESALE_MARGIN_PERCENTAGE DECIMAL(30,2),
                WHOLESALE_MARGIN_CASE DECIMAL(30,2),
                WHOLESALE_MARGIN_BOTTLE DECIMAL(30,2),
                LANDED_TO_RETAIL DECIMAL(30,2),
                RETAIL_MARGIN_PERCENTAGE DECIMAL(30,2),
                RETAIL_MARGIN_CASE DECIMAL(30,2),
                RETAIL_MARGIN_BOTTLE DECIMAL(30,2),
                W_COST_PRICE DECIMAL(30,2),
                W_COST_PRICE_PER_BOTTLE DECIMAL(30,2),
                R_COST_PRICE DECIMAL(30,2),
                R_COST_PRICE_PER_BOTTLE DECIMAL(30,2),
                MRP DECIMAL(30,2),
                MRP_PER_BOTTLE DECIMAL(30,2),
                MINIMUM_ADV DECIMAL(30,2),
                EXCISE_DUTY DECIMAL(30,2),
                GALLONAGE_FEE DECIMAL(30,2),
                BOOTLE_TYPE VARCHAR(20),
                IS_MONO_CARTOON VARCHAR(3),
                STATUS INTEGER, 
                APPLY_FROM BIGINT,
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
