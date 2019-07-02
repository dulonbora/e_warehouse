<?php

require_once '../db/Kanexon.php';
require_once '../classes/Stock_Fectory.php';

class Mix_Item_Stock_Updater {

    private $conn = null;
    private $_table_name = "MIX_ITEM_MASTER";

    public function __construct() {
        $Data = new Kanexon();
        $this->conn = $Data->getDb();
    }
    
    //put your code here
    public function UpdateStock($id) {
        
        
        $query = " UPDATE " . $this->_table_name . " SET CLOSEING_STOCK_UNIT = ?, "
                . " CLOSEING_STOCK_SUB_UNIT = ?, "
                . " CLOSEING_STOCK_STR = ? WHERE ID = ? ";
        $success = 0;
        try {
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(1, $this->getCloseingStockUnit());
            $stmt->bindParam(2, $this->getCloseingStockSubUnit());
            $stmt->bindParam(3, $this->getCloseingStockStr());
            $stmt->bindParam(4, $id);

            $stmt->execute();
            $success = 1;
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $success;
    }
}
