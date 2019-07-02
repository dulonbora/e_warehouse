<?php
require_once '../db/Kanexon.php';
require_once '../classes/Brand__List.php';

class Stock_Transfar {
    
    private $conn = null;

    public function __construct() {
        $Data = new Kanexon();
        $this->conn = $Data->getDb();
    }

 
    public function LoadUserItemId($packingId, $userId) {
        
        $Q = "SELECT ID FROM USER_ITEM_LIST WHERE PACKING_ID = ? AND USER_ID = ?";
        $ok = 0;
        try {
            $stmt = $this->conn->prepare($Q);
            $stmt->bindParam (1 , $packingId);
            $stmt->bindParam (2 , $userId);
            $stmt->execute();
            $row = $stmt->fetch();
            $ok = $row['ID'];
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $ok;
    }
    
    public function UpdateItemStock($outUserId, $inUserId, $packingId, $Qnty) {
        $Brand__List = new Brand__List();
        $oid = $this->LoadUserItemId($packingId, $outUserId);
        $iid = $this->LoadUserItemId($packingId, $inUserId);
        $Brand__List->UpdateStock($oid, $Qnty, "O");
        $Brand__List->UpdateStock($iid, $Qnty, "I");
    }
    
    
    
    
    
    
    
    
    
    
}
