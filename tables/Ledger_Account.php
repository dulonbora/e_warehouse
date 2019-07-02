 <?php

require_once '../db/Kanexon.php';

class Ledger_Account {

    private $conn = null;
    private $_table_name = "LEDGER_ACCOUNT";

    public function __construct() {
        $Data = new Kanexon();
        $this->conn = $Data->getDb();
    }

    public function Create_Table() {
        $Q = "CREATE TABLE IF NOT EXISTS " . $this->_table_name . " (
                ID                  BIGINT PRIMARY KEY AUTO_INCREMENT, 
                AC_VOUCHER_ID       BIGINT,
                LONGDATE            BIGINT,
                SL_NO               INTEGER,
                PARTICULARS         VARCHAR(200),
                NOTE                VARCHAR(200),
                VOUCHER_ID          BIGINT,
                VOUCHER_NO          VARCHAR(20),
                VOUCHER_TYPE        VARCHAR(20),
                LEDGER_ID           BIGINT,

                CREDIT              DECIMAL(30,2),
                DEBIT               DECIMAL(30,2),
                CRDR                VARCHAR(30),
                BALANCE             DECIMAL(30,2),

                STATUS              INTEGER, 
                CREATE_ON           BIGINT, 
                CREATE_BY           BIGINT,
                MODIFY_BY           BIGINT,
                MODIFY_ON           BIGINT, 
                IS_ACTIVE           VARCHAR(3)) ";
        try {
            $this->conn->exec($Q);
            echo $this->_table_name . " Table Created....<br/>";
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
    }

}

?>
