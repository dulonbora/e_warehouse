<?php

require_once '../db/Kanexon.php';

class Mix_Item_List_View {

    private $conn = null;
    private $_view_name = "VIEW_MIX_ITEM_MASTER";

    public function __construct() {
        $Data = new Kanexon();
        $this->conn = $Data->getDb();
    }

    public function Create_View() {
        $Q ="CREATE OR REPLACE VIEW ". $this->_view_name ." AS SELECT 
            MIM.ID,
            BM.ID AS ITEM_ID,
            BP.ID AS PACKING_ID,
            BP.ML_PER_CASE,
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
            BM.DESCRIPTION,
            MIM.UNIT,
            MIM.SUB_UNIT,
            MIM.SUB_UNIT_VALUE,
            MIM.ITEM_TYPE,
            MIM.OPENING_STOCK_UNIT,
            MIM.OPENING_STOCK_SUB_UNIT,
            MIM.CLOSEING_STOCK_UNIT,
            MIM.CLOSEING_STOCK_SUB_UNIT,
            MIM.CLOSEING_STOCK_STR,
            MIM.STATUS,
            MIM.CREATE_ON,
            MIM.CREATE_BY
            FROM USER_ITEM_LIST as BM
            INNER JOIN BRAND_PACKING as BP ON BP.MASTER_ID = BM.ID
            INNER JOIN MIX_ITEM_MASTER as MIM ON MIM.PACKING_ID = BP.ID
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
