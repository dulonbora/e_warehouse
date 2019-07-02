<?php

require_once '../db/Kanexon.php';
require_once '../models/Mdl_Transfar_Master.php';

class Transfar_Master_Updater extends Mdl_Transfar_Master {

    private $conn           = null;
    private $_table_name    = "TRANSFAR_MASTER";

    public function __construct() {
        parent::__construct();
        $Data = new Kanexon();
        $this->conn = $Data->getDb();
    }

    
    /* ---------------------------------------------------------- */
    
    public function UpdateTotalInMaster($m_id) {
        
        $Q = "UPDATE ". $this->_table_name ." SET ITEM_TOTAL = (SELECT COUNT(ID) FROM TRANSFAR_ITEMS WHERE MASTER_ID = '$m_id' AND IS_ACTIVE = 'YES'), "
            . " AVD_AMOUNT  = (SELECT SUM(TOTAL_ADV) AS TADV FROM   TRANSFAR_ITEMS WHERE MASTER_ID = '$m_id' AND IS_ACTIVE = 'YES'), "
            . " PASS_AMOUNT = (SELECT SUM(TOTAL_FEE) AS TTF FROM    TRANSFAR_ITEMS WHERE MASTER_ID = '$m_id' AND IS_ACTIVE = 'YES'), "
            . " VAT_AMOUNT  = (SELECT SUM(TOTAL_VAT) AS TV FROM     TRANSFAR_ITEMS WHERE MASTER_ID = '$m_id' AND IS_ACTIVE = 'YES'), "
            . " COST_PRICE  = (SELECT SUM(TOTAL_COST) AS TC FROM    TRANSFAR_ITEMS WHERE MASTER_ID = '$m_id' AND IS_ACTIVE = 'YES'), "
            . " TOTAL_TCS   = (SELECT SUM(TCS) AS TC FROM           TRANSFAR_ITEMS WHERE MASTER_ID = '$m_id' AND IS_ACTIVE = 'YES'), "
            . " GRAND_TOTAL = (SELECT SUM(TOTAL_AMOUNT) AS TA FROM  TRANSFAR_ITEMS WHERE MASTER_ID = '$m_id' AND IS_ACTIVE = 'YES') "
            . " WHERE ID    = ? ";
        
        $success = 0;
        try {
            $stmt = $this->conn->prepare($Q);
            $stmt->bindParam (1, $m_id);
            $stmt->execute();
            $success = 1;
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $success;
    }
    
    
    public function UpdateTotalInMasterEna($m_id) {
        
        $Q = "UPDATE ". $this->_table_name ." SET ITEM_TOTAL = (SELECT COUNT(ID) FROM TRANSFAR_ITEMS WHERE MASTER_ID = '$m_id' AND IS_ACTIVE = 'YES'), "
            . " PASS_AMOUNT = (SELECT SUM(TOTAL_FEE) AS TTF FROM    TRANSFAR_ITEMS WHERE MASTER_ID = '$m_id' AND IS_ACTIVE = 'YES'), "
            . " VAT_AMOUNT  = (SELECT SUM(TOTAL_VAT) AS TV FROM     TRANSFAR_ITEMS WHERE MASTER_ID = '$m_id' AND IS_ACTIVE = 'YES'), "
            . " COST_PRICE  = (SELECT SUM(TOTAL_COST) AS TC FROM    TRANSFAR_ITEMS WHERE MASTER_ID = '$m_id' AND IS_ACTIVE = 'YES'), "
            . " TOTAL_TCS   = (SELECT SUM(TCS) AS TC FROM           TRANSFAR_ITEMS WHERE MASTER_ID = '$m_id' AND IS_ACTIVE = 'YES'), "
            . " GRAND_TOTAL = (SELECT SUM(TOTAL_AMOUNT) AS TA FROM  TRANSFAR_ITEMS WHERE MASTER_ID = '$m_id' AND IS_ACTIVE = 'YES') "
            . " WHERE ID    = ? ";
        
        $success = 0;
        try {
            $stmt = $this->conn->prepare($Q);
            $stmt->bindParam (1, $m_id);
            $stmt->execute();
            $success = 1;
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $success;
    }
    
    
}
