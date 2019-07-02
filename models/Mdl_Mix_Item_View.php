    <?php

class Mdl_Mix_Item_View {
        public function __construct() {}
        
    private $id                     = 0;
    private $mlPerCase              = 0;
    private $itemName               = "";
    private $strangth               = 0;
    private $groupId                = 0;
    private $groupName              = 0;
    private $categoryId             = 0;
    private $categoryName           = "";
    private $typeId                 = 0;
    private $typeName               = "";
    private $isImported             = "";
    private $isNew                  = "";
    private $itemFor                = "";
    private $imageLink              = "";
    private $description            = "";
    private $unit                   = "";
    private $subUnit                = "";
    private $subUnitValue           = 0;
    private $itemType               = "";
    private $openingStockUnit       = 0;
    private $openingStockSubUnit    = 0;
    private $closeingStockUnit      = 0;
    private $closeingStockSubUnit   = 0;
    private $closeingStockStr       = "";
    private $status                 = 0;
    private $createOn               = 0;
    private $createBy               = 0;
        
    private $itemId                 = 0;
    private $packingId              = 0;

    function setId($id) { $this->id = $id; }
    function getId() { return $this->id; }
    function setMlPerCase($mlPerCase) { $this->mlPerCase = $mlPerCase; }
    function getMlPerCase() { return $this->mlPerCase; }
    function setItemName($itemName) { $this->itemName = $itemName; }
    function getItemName() { return $this->itemName; }
    function setStrangth($strangth) { $this->strangth = $strangth; }
    function getStrangth() { return $this->strangth; }
    function setGroupId($groupId) { $this->groupId = $groupId; }
    function getGroupId() { return $this->groupId; }
    function setGroupName($groupName) { $this->groupName = $groupName; }
    function getGroupName() { return $this->groupName; }
    function setCategoryId($categoryId) { $this->categoryId = $categoryId; }
    function getCategoryId() { return $this->categoryId; }
    function setCategoryName($categoryName) { $this->categoryName = $categoryName; }
    function getCategoryName() { return $this->categoryName; }
    function setTypeId($typeId) { $this->typeId = $typeId; }
    function getTypeId() { return $this->typeId; }
    function setTypeName($typeName) { $this->typeName = $typeName; }
    function getTypeName() { return $this->typeName; }
    function setIsImported($isImported) { $this->isImported = $isImported; }
    function getIsImported() { return $this->isImported; }
    function setIsNew($isNew) { $this->isNew = $isNew; }
    function getIsNew() { return $this->isNew; }
    function setItemFor($itemFor) { $this->itemFor = $itemFor; }
    function getItemFor() { return $this->itemFor; }
    function setImageLink($imageLink) { $this->imageLink = $imageLink; }
    function getImageLink() { return $this->imageLink; }
    function setDescription($description) { $this->description = $description; }
    function getDescription() { return $this->description; }
    function setUnit($unit) { $this->unit = $unit; }
    function getUnit() { return $this->unit; }
    function setSubUnit($subUnit) { $this->subUnit = $subUnit; }
    function getSubUnit() { return $this->subUnit; }
    function setSubUnitValue($subUnitValue) { $this->subUnitValue = $subUnitValue; }
    function getSubUnitValue() { return $this->subUnitValue; }
    function setItemType($itemType) { $this->itemType = $itemType; }
    function getItemType() { return $this->itemType; }
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
    function setStatus($status) { $this->status = $status; }
    function getStatus() { return $this->status; }
    function setCreateOn($createOn) { $this->createOn = $createOn; }
    function getCreateOn() { return $this->createOn; }
    function setCreateBy($createBy) { $this->createBy = $createBy; }
    function getCreateBy() { return $this->createBy; }
    function setItemId($itemId) { $this->itemId = $itemId; }
    function getItemId() { return $this->itemId; }
    function setPackingId($packingId) { $this->packingId = $packingId; }
    function getPackingId() { return $this->packingId; }


}
