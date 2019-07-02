 <?php

require_once '../db/Kanexon.php';

class Transfar_Master {

    private $conn = null;
    private $_table_name = "TRANSFAR_MASTER";

    public function __construct() {
        $Data = new Kanexon();
        $this->conn = $Data->getDb();
    }

    public function Create_Table() {
        $Q = "CREATE TABLE IF NOT EXISTS " . $this->_table_name . " (
                ID BIGINT PRIMARY KEY AUTO_INCREMENT, 
                USER_FROM VARCHAR(100), 
                USER_TO VARCHAR(100), 
                TOO VARCHAR(100), 
                FYEAR VARCHAR(20),
                VCH_TYPE VARCHAR(20), 
                SL_NO INTEGER, 
                MODE VARCHAR(20), 
                VOUCHER_NO VARCHAR(100), 
                LONGDATE BIGINT, 
                ORDER_NO VARCHAR(100), 
                ORDER_DATE VARCHAR(100), 
                BILL_NO VARCHAR(100), 
                BILL_DATE VARCHAR(100), 
                CONVERTED VARCHAR(100), 
                DELIVERY_MODE VARCHAR(100), 
                DELIVERY_NOTE VARCHAR(100), 
                OTHER_NOTE VARCHAR(100), 
                ITEM_TOTAL INTEGER, 
                AVD_AMOUNT DECIMAL(30,2), 
                AVD_AMOUNT_STATUS VARCHAR(3), 
                PASS_AMOUNT DECIMAL(30,2), 
                PASS_AMOUNT_STATUS VARCHAR(3), 
                VAT_AMOUNT DECIMAL(30,2), 
                VAT_AMOUNT_STATUS VARCHAR(3), 
                COST_PRICE DECIMAL(30,2), 
                COST_PRICE_STATUS VARCHAR(3), 
                TOTAL_TCS DECIMAL(30,2), 
                OTHER_CHARGE DECIMAL(30,2), 
                CHARGED_AMOUNT DECIMAL(30,2), 
                ADJUSTMENT DECIMAL(30,2), 
                GRAND_TOTAL DECIMAL(30,2),
                STATUS INTEGER, 
                CREATE_ON BIGINT, 
                CREATE_BY BIGINT,
                MODIFY_BY BIGINT,
                MODIFY_ON BIGINT, 
                IS_ACTIVE VARCHAR(3)) ";
        try {
            $this->conn->exec($Q);
            echo $this->_table_name . " Table Created....<br/>";
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
    }

}

?>
