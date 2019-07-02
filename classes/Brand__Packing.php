<?php

require_once '../db/Kanexon.php';
require_once '../models/Mdl_brand_packing.php';

class Brand__Packing extends Mdl_brand_packing {

    private $conn = null;
    private $_table_name = "BRAND_PACKING";

    public function __construct() {
        parent::__construct();
        $Data = new Kanexon();
        $this->conn = $Data->getDb();
    }

    public function Insert() {
        $query = "INSERT INTO BRAND_PACKING(FYEAR , MASTER_ID , BOTTLES_PER_CASE , ML_PER_CASE , BL_PER_CASE , LPL_PER_CASE , LPL_PER_BOTTLE , W_COST_PRICE , W_COST_PRICE_PER_BOTTLE , R_COST_PRICE , R_COST_PRICE_PER_BOTTLE , AVD_AMOUNT , AVD_AMOUNT_PER_BOTTLE , TFF_AMOUNT , TFF_PER_BOTTLE , IMPORT_FEE , EXPORT_FEE , VAT , VAT_PER_BOTTLE , LANDED_TO_WHOLESALE , WHOLESALE_MARGIN_PERCENTAGE , WHOLESALE_MARGIN_CASE , WHOLESALE_MARGIN_BOTTLE , LANDED_TO_RETAIL , RETAIL_MARGIN_PERCENTAGE , RETAIL_MARGIN_CASE , RETAIL_MARGIN_BOTTLE , MRP , MRP_PER_BOTTLE , MINIMUM_ADV , EXCISE_DUTY , GALLONAGE_FEE , BOOTLE_TYPE , IS_MONO_CARTOON , STATUS , APPLY_FROM , IS_ACTIVE) 
	VALUES ( ? , ? , ? , ? , ? , ? , ? , ? , ? , ? , ? , ? , ? , ? , ? , ? , ? , ? , ? , ? , ? , ? , ? , ? , ? , ? , ? , ? , ? , ? , ? , ? , ? , ? , ? , ? , ?) ";
        $success = 0;
        try {
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(1, $this->getFyear());
            $stmt->bindParam(2, $this->getMaster_id());
            $stmt->bindParam(3, $this->getBottles_per_case());
            $stmt->bindParam(4, $this->getMl_per_case());
            $stmt->bindParam(5, $this->getBl_per_case());
            $stmt->bindParam(6, $this->getLpl_per_case());
            $stmt->bindParam(7, $this->getLpl_per_bottle());
            $stmt->bindParam(8, $this->getW_cost_price());
            $stmt->bindParam(9, $this->getW_cost_price_per_bottle());
            $stmt->bindParam(10, $this->getR_cost_price());
            $stmt->bindParam(11, $this->getR_cost_price_per_bottle());
            $stmt->bindParam(12, $this->getAvd_amount());
            $stmt->bindParam(13, $this->getAvd_amount_per_bottle());
            $stmt->bindParam(14, $this->getTff_amount());
            $stmt->bindParam(15, $this->getTff_per_bottle());
            $stmt->bindParam(16, $this->getImport_fee());
            $stmt->bindParam(17, $this->getExport_fee());
            $stmt->bindParam(18, $this->getVat());
            $stmt->bindParam(19, $this->getVat_per_bottle());
            $stmt->bindParam(20, $this->getLanded_to_wholesale());
            $stmt->bindParam(21, $this->getWholesale_margin_percentage());
            $stmt->bindParam(22, $this->getWholesale_margin_case());
            $stmt->bindParam(23, $this->getWholesale_margin_bottle());
            $stmt->bindParam(24, $this->getLanded_to_retail());
            $stmt->bindParam(25, $this->getRetail_margin_percentage());
            $stmt->bindParam(26, $this->getRetail_margin_case());
            $stmt->bindParam(27, $this->getRetail_margin_bottle());
            $stmt->bindParam(28, $this->getMrp());
            $stmt->bindParam(29, $this->getMrp_per_bottle());
            $stmt->bindParam(30, $this->getMinimum_adv());
            $stmt->bindParam(31, $this->getExcise_duty());
            $stmt->bindParam(32, $this->getGallonage_fee());
            $stmt->bindParam(33, $this->getBootle_type());
            $stmt->bindParam(34, $this->getIs_mono_cartoon());
            $stmt->bindParam(35, $this->getStatus());
            $stmt->bindParam(36, $this->getApply_from());
            $stmt->bindParam(37, $this->getIs_active());

            $stmt->execute();
            $success = 1;
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $success;
    }

    public function Update($id) {
        $query = "UPDATE BRAND_PACKING SET FYEAR = ?, MASTER_ID = ?, BOTTLES_PER_CASE = ?, ML_PER_CASE = ?, BL_PER_CASE = ?, LPL_PER_CASE = ?, LPL_PER_BOTTLE = ?, W_COST_PRICE = ?, W_COST_PRICE_PER_BOTTLE = ?, R_COST_PRICE = ?, R_COST_PRICE_PER_BOTTLE = ?, AVD_AMOUNT = ?, AVD_AMOUNT_PER_BOTTLE = ?, TFF_AMOUNT = ?, TFF_PER_BOTTLE = ?, IMPORT_FEE = ?, EXPORT_FEE = ?, VAT = ?, VAT_PER_BOTTLE = ?, LANDED_TO_WHOLESALE = ?, WHOLESALE_MARGIN_PERCENTAGE = ?, WHOLESALE_MARGIN_CASE = ?, WHOLESALE_MARGIN_BOTTLE = ?, LANDED_TO_RETAIL = ?, RETAIL_MARGIN_PERCENTAGE = ?, RETAIL_MARGIN_CASE = ?, RETAIL_MARGIN_BOTTLE = ?, MRP = ?, MRP_PER_BOTTLE = ?, MINIMUM_ADV = ?, EXCISE_DUTY = ?, GALLONAGE_FEE = ?, BOOTLE_TYPE = ?, IS_MONO_CARTOON = ?, STATUS = ?, APPLY_FROM = ?, IS_ACTIVE = ? WHERE ID = ? ";
        $success = 0;
        try {
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(1, $this->getFyear());
            $stmt->bindParam(2, $this->getMaster_id());
            $stmt->bindParam(3, $this->getBottles_per_case());
            $stmt->bindParam(4, $this->getMl_per_case());
            $stmt->bindParam(5, $this->getBl_per_case());
            $stmt->bindParam(6, $this->getLpl_per_case());
            $stmt->bindParam(7, $this->getLpl_per_bottle());
            $stmt->bindParam(8, $this->getW_cost_price());
            $stmt->bindParam(9, $this->getW_cost_price_per_bottle());
            $stmt->bindParam(10, $this->getR_cost_price());
            $stmt->bindParam(11, $this->getR_cost_price_per_bottle());
            $stmt->bindParam(12, $this->getAvd_amount());
            $stmt->bindParam(13, $this->getAvd_amount_per_bottle());
            $stmt->bindParam(14, $this->getTff_amount());
            $stmt->bindParam(15, $this->getTff_per_bottle());
            $stmt->bindParam(16, $this->getImport_fee());
            $stmt->bindParam(17, $this->getExport_fee());
            $stmt->bindParam(18, $this->getVat());
            $stmt->bindParam(19, $this->getVat_per_bottle());
            $stmt->bindParam(20, $this->getLanded_to_wholesale());
            $stmt->bindParam(21, $this->getWholesale_margin_percentage());
            $stmt->bindParam(22, $this->getWholesale_margin_case());
            $stmt->bindParam(23, $this->getWholesale_margin_bottle());
            $stmt->bindParam(24, $this->getLanded_to_retail());
            $stmt->bindParam(25, $this->getRetail_margin_percentage());
            $stmt->bindParam(26, $this->getRetail_margin_case());
            $stmt->bindParam(27, $this->getRetail_margin_bottle());
            $stmt->bindParam(28, $this->getMrp());
            $stmt->bindParam(29, $this->getMrp_per_bottle());
            $stmt->bindParam(30, $this->getMinimum_adv());
            $stmt->bindParam(31, $this->getExcise_duty());
            $stmt->bindParam(32, $this->getGallonage_fee());
            $stmt->bindParam(33, $this->getBootle_type());
            $stmt->bindParam(34, $this->getIs_mono_cartoon());
            $stmt->bindParam(35, $this->getStatus());
            $stmt->bindParam(36, $this->getApply_from());
            $stmt->bindParam(37, $this->getIs_active());
            $stmt->bindParam(38, $id);

            $stmt->execute();
            $success = 1;
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $success;
    }

    /* ---------------------------------------------------------- */


    /* ---------------------------------------------------------- */

    public function LoadValue($id) {
        $Q = "SELECT * FROM " . $this->_table_name . " WHERE ID = ? ";
        $ok = 0;
        try {
            $stmt = $this->conn->prepare($Q);
            $stmt->bindParam(1, $id);
            $stmt->execute();
            $row = $stmt->fetch();
            if ($row > 0) {
                $this->valueLoader($row);
                $ok = 1;
            }
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $ok;
    }

    public function valueLoader($row) {
        $this->setId($row['ID']);
        $this->setFyear($row['FYEAR']);
        $this->setMaster_id($row['MASTER_ID']);
        $this->setBottles_per_case($row['BOTTLES_PER_CASE']);
        $this->setMl_per_case($row['ML_PER_CASE']);
        $this->setBl_per_case($row['BL_PER_CASE']);
        $this->setLpl_per_case($row['LPL_PER_CASE']);
        $this->setLpl_per_bottle($row['LPL_PER_BOTTLE']);
        $this->setW_cost_price($row['W_COST_PRICE']);
        $this->setW_cost_price_per_bottle($row['W_COST_PRICE_PER_BOTTLE']);
        $this->setR_cost_price($row['R_COST_PRICE']);
        $this->setR_cost_price_per_bottle($row['R_COST_PRICE_PER_BOTTLE']);
        $this->setAvd_amount($row['AVD_AMOUNT']);
        $this->setAvd_amount_per_bottle($row['AVD_AMOUNT_PER_BOTTLE']);
        $this->setTff_amount($row['TFF_AMOUNT']);
        $this->setTff_per_bottle($row['TFF_PER_BOTTLE']);
        $this->setImport_fee($row['IMPORT_FEE']);
        $this->setExport_fee($row['EXPORT_FEE']);
        $this->setVat($row['VAT']);
        $this->setVat_per_bottle($row['VAT_PER_BOTTLE']);
        $this->setLanded_to_wholesale($row['LANDED_TO_WHOLESALE']);
        $this->setWholesale_margin_percentage($row['WHOLESALE_MARGIN_PERCENTAGE']);
        $this->setWholesale_margin_case($row['WHOLESALE_MARGIN_CASE']);
        $this->setWholesale_margin_bottle($row['WHOLESALE_MARGIN_BOTTLE']);
        $this->setLanded_to_retail($row['LANDED_TO_RETAIL']);
        $this->setRetail_margin_percentage($row['RETAIL_MARGIN_PERCENTAGE']);
        $this->setRetail_margin_case($row['RETAIL_MARGIN_CASE']);
        $this->setRetail_margin_bottle($row['RETAIL_MARGIN_BOTTLE']);
        $this->setMrp($row['MRP']);
        $this->setMrp_per_bottle($row['MRP_PER_BOTTLE']);
        $this->setMinimum_adv($row['MINIMUM_ADV']);
        $this->setExcise_duty($row['EXCISE_DUTY']);
        $this->setGallonage_fee($row['GALLONAGE_FEE']);
        $this->setBootle_type($row['BOOTLE_TYPE']);
        $this->setIs_mono_cartoon($row['IS_MONO_CARTOON']);
        $this->setStatus($row['STATUS']);
        $this->setIs_active($row['IS_ACTIVE']);
        $this->setApply_from($row['APPLY_FROM']);
    }

    public function TotalCount($master_id) {
        $Q = "SELECT COUNT(*) AS TOTAL FROM " . $this->_table_name . " WHERE MASTER_ID = ? ";
        $total = 0;
        try {
            $stmt = $this->conn->prepare($Q);
            $stmt->bindParam(1, $master_id);
            $stmt->execute();
            $total = $stmt->fetchColumn();
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $total;
    }

    public function loadAllPagging($master_id) {
        $Q = "SELECT * FROM " . $this->_table_name . " WHERE MASTER_ID = ? ORDER BY ID DESC ";
        $result = null;
        try {
            $stmt = $this->conn->prepare($Q);
            $stmt->bindParam(1, $master_id);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $result;
    }

    public function TotalCountByCategoy($columnName, $values) {
        $Q = "SELECT COUNT(*) AS TOTAL FROM " . $this->_table_name . " WHERE " . $columnName . " = ? ";
        $total = 0;
        try {
            $stmt = $this->conn->prepare($Q);
            $stmt->bindParam(1, $values);
            $stmt->execute();
            $total = $stmt->fetchColumn();
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $total;
    }

    public function loadAllPaggingByCategoy($columnName, $values, $start, $limit) {
        $Q = "SELECT * FROM " . $this->_table_name . " WHERE " . $columnName . " = ? ORDER BY ID DESC LIMIT " . $start . " ," . $limit . " ";
        $result = null;
        try {
            $stmt = $this->conn->prepare($Q);
            $stmt->bindParam(1, $values);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $result;
    }

}
