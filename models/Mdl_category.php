<?php
class Mdl_category {
    
    public function __construct() {}
    
    private $id                     = 0;
    private $parent_id              = 0;
    private $name                   = "";
    private $type                   = "";
    private $is_active              = "YES";

    function setId($id) { $this->id = $id; }
    function getId() { return $this->id; }
    function setParent_id($parent_id) { $this->parent_id = $parent_id; }
    function getParent_id() { return $this->parent_id; }
    function setName($name) { $this->name = $name; }
    function getName() { return $this->name; }
    function setType($type) { $this->type = $type; }
    function getType() { return $this->type; }
    function setIs_active($is_active) { $this->is_active = $is_active; }
    function getIs_active() { return $this->is_active; }


}
?>
