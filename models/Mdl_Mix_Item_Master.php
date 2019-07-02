<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Mix_Item__Master
 *
 * @author Dulon
 */
class Mdl_Mix_Item_Master {
    public function __construct() {}
    private $id = 0;
    private $itemId = 0;
    private $packingId = 0;
    private $unit = "";
    private $subUnit = "";
    private $subUnitValue = 0;
    private $openingStockUnit = 0;
    private $openingStockSubUnit = 0;
    private $closeingStockUnit = 0;
    private $closeingStockSubUnit = 0;
    private $closeingStockStr = "";
    private $ItemType = "";
    private $status = 0;
    private $createOn = 0;
    private $createBy = 0;
    private $modifyOn = 0;
    private $modifyBy = 0;
    private $isActive = "YES";

    function setId($id) { $this->id = $id; }
    function getId() { return $this->id; }
    function setItemId($itemId) { $this->itemId = $itemId; }
    function getItemId() { return $this->itemId; }
    function setPackingId($packingId) { $this->packingId = $packingId; }
    function getPackingId() { return $this->packingId; }
    function setUnit($unit) { $this->unit = $unit; }
    function getUnit() { return $this->unit; }
    function setSubUnit($subUnit) { $this->subUnit = $subUnit; }
    function getSubUnit() { return $this->subUnit; }
    function setSubUnitValue($subUnitValue) { $this->subUnitValue = $subUnitValue; }
    function getSubUnitValue() { return $this->subUnitValue; }
    function setOpeningStockUnit($openingStockUnit) { $this->openingStockUnit = $openingStockUnit; }
    function getOpeningStockUnit() { return $this->openingStockUnit; }
    function setOpeningStockSubUnit($openingStockSubUnit) { $this->openingStockSubUnit = $openingStockSubUnit; }
    function getOpeningStockSubUnit() { return $this->openingStockSubUnit; }
    function setCloseingStockUnit($closeingStockUnit) { $this->closeingStockUnit = $closeingStockUnit; }
    function getCloseingStockUnit() { return $this->closeingStockUnit; }
    function setCloseingStockSubUnit($closeingStockSubUnit) { $this->closeingStockSubUnit = $closeingStockSubUnit; }
    function getCloseingStockSubUnit() { return $this->closeingStockSubUnit; }
    function setCloseingStockStr($closeingStockStr) { $this->closeingStockStr = $closeingStockStr; }
    function getCloseingStockStr() { return $this->closeingStockStr; }
    function setItemType($ItemType) { $this->ItemType = $ItemType; }
    function getItemType() { return $this->ItemType; }
    function setStatus($status) { $this->status = $status; }
    function getStatus() { return $this->status; }
    function setCreateOn($createOn) { $this->createOn = $createOn; }
    function getCreateOn() { return $this->createOn; }
    function setCreateBy($createBy) { $this->createBy = $createBy; }
    function getCreateBy() { return $this->createBy; }
    function setModifyOn($modifyOn) { $this->modifyOn = $modifyOn; }
    function getModifyOn() { return $this->modifyOn; }
    function setModifyBy($modifyBy) { $this->modifyBy = $modifyBy; }
    function getModifyBy() { return $this->modifyBy; }
    function setIsActive($isActive) { $this->isActive = $isActive; }
    function getIsActive() { return $this->isActive; }

}
