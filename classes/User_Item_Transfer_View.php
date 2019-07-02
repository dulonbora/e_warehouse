<?php


require_once '../db/Kanexon.php';
require_once '../models/Mdl_View_Imfl_Transfer.php';


class User_Item_Transfer_View extends Mdl_View_Imfl_Transfer{
    
    private $conn = null;
    private $_view_name = "VIEW_IMFL_TRANSFER_VIEW";

    public function __construct() {
        parent::__construct();
        $Data = new Kanexon();
        $this->conn = $Data->getDb();
    }
    //put your code here
        
    public function TotalCountByIo_Type($status, $io_type) {
        $Q = "SELECT COUNT(*) AS TOTAL FROM ".$this->_view_name." WHERE STATUS = ? AND IO_TYPE = ? ";
        $total = 0;
        try {
            $stmt = $this->conn->prepare($Q);
            $stmt->bindParam(1, $status);
            $stmt->bindParam(2, $io_type);
            $stmt->execute();
            $total = $stmt->fetchColumn();
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $total;
    }
    
        public function loadAllPaggingByIo_Type($start, $limit, $status, $io_type) {
        $Q = "SELECT * FROM ".$this->_view_name." WHERE STATUS = ? AND IO_TYPE = ? ORDER BY ID DESC LIMIT " . $start . " ," . $limit . " ";
        $result = null;
        try {
            $stmt = $this->conn->prepare($Q);
            $stmt->bindParam(1, $status);
            $stmt->bindParam(2, $io_type);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $result;
    }
    
    
    public function LoadValue($id) {
        $Q = "SELECT * FROM " . $this->_view_name . " WHERE ID = ? ";
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
        $this->setMaster_id($row['MASTER_ID']);
        $this->setItem_id($row['ITEM_ID']);
        $this->setPacking_id($row['PACKING_ID']);
        $this->setUser_item_id($row['USER_ITEM_ID']);
        $this->setUnit($row['UNIT']);
        $this->setIo_type($row['IO_TYPE']);
        $this->setPacking_size($row['PACKING_SIZE']);
        $this->setBatch_no($row['BATCH_NO']);
        $this->setTotal_case($row['TOTAL_CASE']);
        $this->setTotal_bottle($row['TOTAL_BOTTLE']);
        $this->setTotal_bl($row['TOTAL_BL']);
        $this->setTotal_lpl($row['TOTAL_LPL']);
        $this->setTotal_cost($row['TOTAL_COST']);
        $this->setTotal_adv($row['TOTAL_ADV']);
        $this->setTotal_fee($row['TOTAL_FEE']);
        $this->setTotal_vat($row['TOTAL_VAT']);
        $this->setTcs($row['TCS']);
        $this->setTotal_mrp($row['TOTAL_MRP']);
        $this->setTotal_amount($row['TOTAL_AMOUNT']);
        $this->setStatus($row['STATUS']);
        $this->setLongdate($row['LONGDATE']);
        $this->setName($row['NAME']);
        $this->setBottles_per_case($row['BOTTLES_PER_CASE']);
        $this->setMl_per_case($row['ML_PER_CASE']);
        $this->setCompany_name($row['COMPANY_NAME']);
        $this->setUser_from($row['USER_FROM']);
        $this->setUser_from_name($row['USER_FROM_NAME']);
        $this->setUser_to($row['USER_TO']);
        $this->setTo_from_name($row['TO_FROM_NAME']);
        $this->setCreate_by($row['CREATE_BY']);
    }
    
    
        public function GenerateMode($id) {
        $type = "";
        switch ($id) {
            case "I":
                $type = "IN WARD";
                break;
            case "O":
                $type = "OUT WARD";
                break;
            case "L":
                $type = "LOSE";
                break;
         
        }
        return $type;
    }


    
}
