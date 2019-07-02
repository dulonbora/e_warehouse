<?php
class Mdl_brand_master {
    
    public function __construct() {}
    
    private $id                 = 0;
    private $name               = "";
    private $strangth           = 0;
    private $group_id           = 0;
    private $category_id        = 0;
    private $company_id         = 0;
    private $type_id            = 0;
    private $is_imported        = "";
    private $is_new             = "";
    private $item_for           = "";
    private $image_link         = "";
    private $description        = "";
    private $status             = "";
    private $create_on          = 0;
    private $create_by          = 0;
    private $modify_on          = 0;
    private $modify_by          = 0;
    private $is_active          = "YES";

function setId($id) { $this->id = $id; }
function getId() { return $this->id; }
function setName($name) { $this->name = $name; }
function getName() { return $this->name; }
function setStrangth($strangth) { $this->strangth = $strangth; }
function getStrangth() { return $this->strangth; }
function setGroup_id($group_id) { $this->group_id = $group_id; }
function getGroup_id() { return $this->group_id; }
function setCategory_id($category_id) { $this->category_id = $category_id; }
function getCategory_id() { return $this->category_id; }
function setCompany_id($company_id) { $this->company_id = $company_id; }
function getCompany_id() { return $this->company_id; }
function setType_id($type_id) { $this->type_id = $type_id; }
function getType_id() { return $this->type_id; }
function setIs_imported($is_imported) { $this->is_imported = $is_imported; }
function getIs_imported() { return $this->is_imported; }
function setIs_new($is_new) { $this->is_new = $is_new; }
function getIs_new() { return $this->is_new; }
function setItem_for($item_for) { $this->item_for = $item_for; }
function getItem_for() { return $this->item_for; }
function setImage_link($image_link) { $this->image_link = $image_link; }
function getImage_link() { return $this->image_link; }
function setDescription($description) { $this->description = $description; }
function getDescription() { return $this->description; }
function setStatus($status) { $this->status = $status; }
function getStatus() { return $this->status; }
function setCreate_on($create_on) { $this->create_on = $create_on; }
function getCreate_on() { return $this->create_on; }
function setCreate_by($create_by) { $this->create_by = $create_by; }
function getCreate_by() { return $this->create_by; }
function setModify_on($modify_on) { $this->modify_on = $modify_on; }
function getModify_on() { return $this->modify_on; }
function setModify_by($modify_by) { $this->modify_by = $modify_by; }
function getModify_by() { return $this->modify_by; }
function setIs_active($is_active) { $this->is_active = $is_active; }
function getIs_active() { return $this->is_active; }


}
?>
