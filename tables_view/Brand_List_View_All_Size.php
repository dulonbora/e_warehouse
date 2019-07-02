<?php

require_once '../db/Kanexon.php';

class Brand_List_View_All_Size {

    private $conn = null;
    private $_view_name = "VIEW_ITEM_LIST_ALL";

    public function __construct() {
        $Data = new Kanexon();
        $this->conn = $Data->getDb();
    }

    public function Create_View() {
        $Q ="CREATE OR REPLACE VIEW ". $this->_view_name ." AS SELECT 
            BP.*,
            BM.NAME AS ITEM_NAME,
            BM.STRANGTH,
            BM.GROUP_ID,
            GROUPID.NAME AS GROUP_NAME,
            BM.CATEGORY_ID,
            CATID.NAME AS CATEGORY_NAME,
            BM.TYPE_ID,
            TYPEID.NAME AS TYPE_NAME,
            BM.IS_IMPORTED,
            BM.IS_NEW,
            BM.ITEM_FOR,
            BM.IMAGE_LINK,
            BM.DESCRIPTION
            FROM BRAND_MASTER as BM
            INNER JOIN BRAND_PACKING as BP ON BP.MASTER_ID = BM.ID
            INNER JOIN CATEGORY as GROUPID ON GROUPID.ID = BM.GROUP_ID
            INNER JOIN CATEGORY as CATID ON CATID.ID = BM.CATEGORY_ID
            INNER JOIN CATEGORY as TYPEID ON TYPEID.ID = BM.TYPE_ID WHERE BP.IS_ACTIVE = 'YES'
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
