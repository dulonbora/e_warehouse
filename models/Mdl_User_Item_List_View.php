    <?php

class Mdl_User_Item_List_View {
        public function __construct() {}

    private $id                             = 0;
    private $item_id                        = 0;
    private $packing_id                     = 0;
    private $fyear                          = 0;
    private $user_id                        = 0;
    private $name                           = "";
    private $bottles_per_case               = 0;
    private $ml_per_case                    = 0;
    private $mrp                            = 0;
    private $mrp_per_bottle                 = 0;
    private $avd_amount                     = 0;
    private $avd_amount_per_bottle          = 0;
    private $vat                            = 0;
    private $vat_per_bottle                 = 0;
    private $strangth                       = 0;
    private $group_id                       = 0;
    private $group_name                     = "";
    private $category_id                    = 0;
    private $category_name                  = "";
    private $type_id                        = 0;
    private $type_name                      = "";
    private $is_imported                    = "";
    private $item_for                       = "";
    private $image_link                     = "";
    private $description                    = "";
    
    private $opening_stock                  = 0;
    private $inward_stock                   = 0;
    private $outward_stock                  = 0;
    private $prodiucting_stock              = 0;
    private $prodiuced_stock                = 0;
    private $lost_stock                     = 0;
    private $closeing_stock                 = 0;
    private $user_item_status               = 0;
    private $create_on                      = 0;
    private $create_by                      = 0;
    private $modify_on                      = 0;
    private $modify_by                      = 0;
    
    
    
    private $role                           = "";
    private $district                       = "";
    private $sub_division                   = "";


    function setId($id) { $this->id = $id; }
    function getId() { return $this->id; }
    function setItem_id($item_id) { $this->item_id = $item_id; }
    function getItem_id() { return $this->item_id; }
    function setPacking_id($packing_id) { $this->packing_id = $packing_id; }
    function getPacking_id() { return $this->packing_id; }
    function setFyear($fyear) { $this->fyear = $fyear; }
    function getFyear() { return $this->fyear; }
    function setUser_id($user_id) { $this->user_id = $user_id; }
    function getUser_id() { return $this->user_id; }
    function setName($name) { $this->name = $name; }
    function getName() { return $this->name; }
    function setBottles_per_case($bottles_per_case) { $this->bottles_per_case = $bottles_per_case; }
    function getBottles_per_case() { return $this->bottles_per_case; }
    function setMl_per_case($ml_per_case) { $this->ml_per_case = $ml_per_case; }
    function getMl_per_case() { return $this->ml_per_case; }
    function setMrp($mrp) { $this->mrp = $mrp; }
    function getMrp() { return $this->mrp; }
    function setMrp_per_bottle($mrp_per_bottle) { $this->mrp_per_bottle = $mrp_per_bottle; }
    function getMrp_per_bottle() { return $this->mrp_per_bottle; }
    function setAvd_amount($avd_amount) { $this->avd_amount = $avd_amount; }
    function getAvd_amount() { return $this->avd_amount; }
    function setAvd_amount_per_bottle($avd_amount_per_bottle) { $this->avd_amount_per_bottle = $avd_amount_per_bottle; }
    function getAvd_amount_per_bottle() { return $this->avd_amount_per_bottle; }
    function setVat($vat) { $this->vat = $vat; }
    function getVat() { return $this->vat; }
    function setVat_per_bottle($vat_per_bottle) { $this->vat_per_bottle = $vat_per_bottle; }
    function getVat_per_bottle() { return $this->vat_per_bottle; }
    function setStrangth($strangth) { $this->strangth = $strangth; }
    function getStrangth() { return $this->strangth; }
    function setGroup_id($group_id) { $this->group_id = $group_id; }
    function getGroup_id() { return $this->group_id; }
    function setGroup_name($group_name) { $this->group_name = $group_name; }
    function getGroup_name() { return $this->group_name; }
    function setCategory_id($category_id) { $this->category_id = $category_id; }
    function getCategory_id() { return $this->category_id; }
    function setCategory_name($category_name) { $this->category_name = $category_name; }
    function getCategory_name() { return $this->category_name; }
    function setType_id($type_id) { $this->type_id = $type_id; }
    function getType_id() { return $this->type_id; }
    function setType_name($type_name) { $this->type_name = $type_name; }
    function getType_name() { return $this->type_name; }
    function setIs_imported($is_imported) { $this->is_imported = $is_imported; }
    function getIs_imported() { return $this->is_imported; }
    function setItem_for($item_for) { $this->item_for = $item_for; }
    function getItem_for() { return $this->item_for; }
    function setImage_link($image_link) { $this->image_link = $image_link; }
    function getImage_link() { return $this->image_link; }
    function setDescription($description) { $this->description = $description; }
    function getDescription() { return $this->description; }
    function setOpening_stock($opening_stock) { $this->opening_stock = $opening_stock; }
    function getOpening_stock() { return $this->opening_stock; }
    function setInward_stock($inward_stock) { $this->inward_stock = $inward_stock; }
    function getInward_stock() { return $this->inward_stock; }
    function setOutward_stock($outward_stock) { $this->outward_stock = $outward_stock; }
    function getOutward_stock() { return $this->outward_stock; }
    function setProdiucting_stock($prodiucting_stock) { $this->prodiucting_stock = $prodiucting_stock; }
    function getProdiucting_stock() { return $this->prodiucting_stock; }
    function setProdiuced_stock($prodiuced_stock) { $this->prodiuced_stock = $prodiuced_stock; }
    function getProdiuced_stock() { return $this->prodiuced_stock; }
    function setLost_stock($lost_stock) { $this->lost_stock = $lost_stock; }
    function getLost_stock() { return $this->lost_stock; }
    function setCloseing_stock($closeing_stock) { $this->closeing_stock = $closeing_stock; }
    function getCloseing_stock() { return $this->closeing_stock; }
    function setUser_item_status($user_item_status) { $this->user_item_status = $user_item_status; }
    function getUser_item_status() { return $this->user_item_status; }
    function setCreate_on($create_on) { $this->create_on = $create_on; }
    function getCreate_on() { return $this->create_on; }
    function setCreate_by($create_by) { $this->create_by = $create_by; }
    function getCreate_by() { return $this->create_by; }
    function setModify_on($modify_on) { $this->modify_on = $modify_on; }
    function getModify_on() { return $this->modify_on; }
    function setModify_by($modify_by) { $this->modify_by = $modify_by; }
    function getModify_by() { return $this->modify_by; }

    function setRole($role) { $this->role = $role; }
    function getRole() { return $this->role; }
    function setDistrict($district) { $this->district = $district; }
    function getDistrict() { return $this->district; }
    function setSub_division($sub_division) { $this->sub_division = $sub_division; }
    function getSub_division() { return $this->sub_division; }

    

}
