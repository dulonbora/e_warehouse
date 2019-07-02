<?php

require_once '../db/Kanexon.php';

class Brand_List_By_Users_Role_View {

    private $conn = null;
    private $_view_name = "VIEW_USER_ITEM_LIST_ROLE";

    public function __construct() {
        $Data = new Kanexon();
        $this->conn = $Data->getDb();
    }

    public function Create_View() {
        $Q ="CREATE OR REPLACE VIEW ". $this->_view_name ." AS SELECT 
            BL.ID,
            BL.ITEM_ID,
            BL.PACKING_ID,
            BL.FYEAR,
            BL.USER_ID,
            BM.NAME,
            BP.BOTTLES_PER_CASE,
            BP.ML_PER_CASE,
            BP.MRP,
            BP.MRP_PER_BOTTLE,
            BP.AVD_AMOUNT,
            BP.AVD_AMOUNT_PER_BOTTLE,
            BP.VAT,
            BP.VAT_PER_BOTTLE,
            BM.STRANGTH,
            BM.GROUP_ID,
            GROUPID.NAME AS GROUP_NAME,
            BM.CATEGORY_ID,
            CATID.NAME AS CATEGORY_NAME,
            BM.TYPE_ID,
            TYPEID.NAME AS TYPE_NAME,
            BM.IS_IMPORTED,
            BM.ITEM_FOR,
            BM.IMAGE_LINK,
            BM.DESCRIPTION,
            BL.OPENING_STOCK,
            BL.INWARD_STOCK ,
            BL.OUTWARD_STOCK,
            BL.PRODIUCTING_STOCK,
            BL.PRODIUCED_STOCK,
            BL.LOST_STOCK,
            BL.CLOSEING_STOCK,
            BL.STATUS AS USER_ITEM_STATUS,
            BL.CREATE_ON,
            BL.CREATE_BY,
            BL.MODIFY_ON,
            BL.MODIFY_BY,
            CAM.COMPANY_TYPE AS ROLE,
            CAM.DISTRICT,
            CAM.SUB_DIVISION
            FROM USER_ITEM_LIST as BL
            INNER JOIN BRAND_PACKING as BP ON BP.ID = BL.PACKING_ID
            INNER JOIN BRAND_MASTER as BM ON BL.ITEM_ID = BM.ID
            INNER JOIN COMPANY as CAM ON BL.USER_ID = CAM.ID
            INNER JOIN CATEGORY as GROUPID ON GROUPID.ID = BM.GROUP_ID
            INNER JOIN CATEGORY as CATID ON CATID.ID = BM.CATEGORY_ID
            INNER JOIN CATEGORY as TYPEID ON TYPEID.ID = BM.TYPE_ID WHERE BL.IS_ACTIVE = 'YES' ";

        try {
            $this->conn->exec($Q);
            echo $this->_view_name . " Table Created....<br/>";
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
    }

}

?>
