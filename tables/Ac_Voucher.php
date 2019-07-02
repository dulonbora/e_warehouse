 <?php

require_once '../db/Kanexon.php';

class Ac_Voucher {

    private $conn = null;
    private $_table_name = "AC_VOUCHER";

    public function __construct() {
        $Data = new Kanexon();
        $this->conn = $Data->getDb();
    }

    public function Create_Table() {
        $Q = "CREATE TABLE IF NOT EXISTS " . $this->_table_name . " (
                ID BIGINT PRIMARY KEY AUTO_INCREMENT, 
                
                LONGDATE BIGINT,
                PREFIX VARCHAR(20),
                FYEAR VARCHAR(20),
                NUM INTEGER,
                VOUCHER_ID BIGINT,
                VOUCHER_NO VARCHAR(20),
                VOUCHER_TYPE VARCHAR(20),
                DR_LEDGER_ID BIGINT,
                CR_LEDGER_ID BIGINT,

                PARTICULARS VARCHAR(200),
                AMOUNT DECIMAL(30,2),
                MODE VARCHAR(20),
                INST_NO VARCHAR(50),
                INST_DATE VARCHAR(50),
                BANK_NAME VARCHAR(150),

                REF_TYPE VARCHAR(100),
                REF_NO VARCHAR(80),
                REF_DATE VARCHAR(50),
                REF_AMOUNT DECIMAL(30,2),
                REF_DUE_DATE VARCHAR(50),
                
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
