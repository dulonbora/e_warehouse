<?php

require_once '../db/Kanexon.php';

class Imfl_Transfar_View {

    private $conn = null;
    private $_view_name = "VIEW_IMFL_TRANSFER_VIEW";

    public function __construct() {
        $Data = new Kanexon();
        $this->conn = $Data->getDb();
    }

    public function Create_View() {
        $Q ="CREATE OR REPLACE VIEW VIEW_IMFL_TRANSFER_VIEW AS SELECT 
            ET.ID,
            ET.MASTER_ID,
            ET.ITEM_ID,
            ET.PACKING_ID,
            ET.USER_ITEM_ID,
            ET.UNIT,
            ET.IO_TYPE ,
            ET.PACKING_SIZE,
            ET.BATCH_NO,
            ET.TOTAL_CASE,
            ET.TOTAL_BOTTLE,
            ET.TOTAL_BL,
            ET.TOTAL_LPL,
            ET.TOTAL_COST,
            ET.TOTAL_ADV,
            ET.TOTAL_FEE,
            ET.TOTAL_VAT,
            ET.TCS,
            ET.TOTAL_MRP,
            ET.TOTAL_AMOUNT,
            ET.STATUS,
            ET.CREATE_BY,
            ET.LONGDATE,
            IM.NAME,
            BP.BOTTLES_PER_CASE,
            BP.ML_PER_CASE,
            C.COMPANY_NAME, 
            TM.USER_FROM,
            CA.COMPANY_NAME AS USER_FROM_NAME, 
            TM.USER_TO,
            COM.COMPANY_NAME AS TO_FROM_NAME
            
            FROM TRANSFAR_ITEMS as ET
            INNER JOIN USER_ITEM_LIST as EIL ON EIL.ID = ET.USER_ITEM_ID
            INNER JOIN BRAND_MASTER as IM ON IM.ID = ET.ITEM_ID
            INNER JOIN BRAND_PACKING as BP ON BP.ID = ET.PACKING_ID
            INNER JOIN COMPANY as C ON C.ID = ET.CREATE_BY
            LEFT JOIN TRANSFAR_MASTER AS TM ON TM.ID = ET.MASTER_ID
            LEFT JOIN COMPANY as CA ON CA.ID = TM.USER_FROM
            LEFT JOIN COMPANY as COM ON COM.ID = TM.USER_TO
           WHERE ET.IS_ACTIVE = 'YES'
            ";

        try {
            $this->conn->exec($Q);
            echo $this->_view_name . " Table Created....<br/>";
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
    }

}

?>
