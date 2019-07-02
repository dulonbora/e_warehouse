<?php

require_once '../db/Kanexon.php';

class Company {

    private $conn = null;
    private $_table_name = "COMPANY";

    public function __construct() {
        $Data = new Kanexon();
        $this->conn = $Data->getDb();
    }

    public function Create_Table() {
        $Q = "CREATE TABLE IF NOT EXISTS " . $this->_table_name . " (
                ID BIGINT PRIMARY KEY AUTO_INCREMENT, 
                EXCISE_USER_ID          VARCHAR(20), 
                ROLE                    VARCHAR(10), 
                COMPANY_TYPE            VARCHAR(20), 
                COMPANY_NAME            VARCHAR(200),
                COMPANY_LOGO            VARCHAR(200),
                EMAIL                   VARCHAR(100),
                PHONE_NO                VARCHAR(20),
                ADDRESS                 VARCHAR(200),
                CITY                    VARCHAR(100),
                DISTRICT                VARCHAR(100),
                SUB_DIVISION            VARCHAR(100),
                STATE                   VARCHAR(50),
                ZIP                     VARCHAR(20),
                GSTN                    VARCHAR(20),
                PAN_OR_IT_NO            VARCHAR(20),
                SALES_TAX_NO            VARCHAR(20),
                CST_NO                  VARCHAR(20),
                STATUS                  INTEGER,
                CREATE_ON               BIGINT,
                CREATE_BY               BIGINT,
                MODIFY_ON               BIGINT,
                MODIFY_BY               BIGINT,
                IS_ACTIVE               VARCHAR(3)) ";
        try {
            $this->conn->exec($Q);
            echo $this->_table_name." Table Created....<br/>";
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
    }

}

?>
