<?php

require_once '../db/Kanexon.php';

class View_Ena_Summary {

    private $conn = null;
    private $_view_name = "VIEW_ENA_SUMMARY";

    public function __construct() {
        $Data = new Kanexon();
        $this->conn = $Data->getDb();
    }

    public function Create_View() {
                $Q ="CREATE OR REPLACE VIEW ". $this->_view_name ." AS ENA_STOCK_STATEMENT AS SELECT "
                . "IO.ITEM_ID, IO.IO_TYPE, "
                . " CASE WHEN IO.IO_TYPE = 'OS' THEN IO.BL ELSE 0 END AS OPENING, "
                . " CASE WHEN IO.IO_TYPE = 'I' THEN IO.BL ELSE 0 END AS INWARD, "
                . " CASE WHEN IO.IO_TYPE = 'O' THEN IO.BL  ELSE 0 END AS OUTWARD, "
                . " CASE WHEN IO.IO_TYPE = 'P' THEN IO.BL ELSE 0 END AS PRODUCTING, "
                . " CASE WHEN IO.IO_TYPE = 'X' THEN IO.BL ELSE 0 END AS PRODUCTED, "
                . " CASE WHEN IO.IO_TYPE = 'L' THEN IO.BL ELSE 0 END AS LOST, "
                . " FROM VIEW_ENA_TRANSFAR IO GROUP BY IO.ITEM_ID, IO.IO_TYPE
            ";

        try {
            $this->conn->exec($Q);
            echo $this->_view_name . " Table Created....<br/>";
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
    }

}
