<?php

require_once '../db/Kanexon.php';

class Ena_Transfar_View {

    private $conn = null;
    private $_view_name = "VIEW_ENA_TRANSFAR";

    public function __construct() {
        $Data = new Kanexon();
        $this->conn = $Data->getDb();
    }

    public function Create_View() {
        $Q ="CREATE OR REPLACE VIEW ". $this->_view_name ." AS SELECT 
            ET.ID,
            ET.ITEM_ID AS ITEM_ID,
            ET.USER_ITEM_ID AS USER_ITEM_ID,
            EIL.ITEM_NAME,
            ET.USER_FROM,
            C.COMPANY_NAME AS USER_FROM_NAME,
            ET.USER_TO,
            MC.COMPANY_NAME AS USER_TO_NAME,
            ET.TOO,
            ET.IO_TYPE,
            ET.MODE,
            ET.TRANK_NO,
            ET.PERMIT_ID,
            ET.BL,
            ET.LONGDATE,
            ET.STATUS,
            ET.CREATE_ON,
            ET.CREATE_BY,
            ET.MODIFY_ON,
            ET.MODIFY_BY
            
            FROM ENA_TRANSFAR as ET
            INNER JOIN COMPANY as C ON C.ID = ET.CREATE_BY
            INNER JOIN ENA_ITEM_LIST as EIL ON EIL.ID = ET.ITEM_ID
            LEFT JOIN COMPANY as MC ON MC.ID = ET.USER_TO
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
