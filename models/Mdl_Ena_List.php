<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Mdl_Ena_List
 *
 * @author Dulon
 */
class Mdl_Ena_List {
    public function __construct() {}
    
    private $id                 = 0;
    private $item_name          = "";
    private $group_id           = 0;
    private $category_id        = 0;
    private $type_id            = 0;
    private $strangth           = 0;
    private $lpl_per_bl         = 0;
    private $fee_require        = "";
    private $i_fee              = 0;
    private $t_fee              = 0;
    private $e_fee              = 0;
    private $status             = 0;
    private $is_active          = "YES";
    
    
 function setId($id) { $this->id = $id; }
function getId() { return $this->id; }
function setItem_name($item_name) { $this->item_name = $item_name; }
function getItem_name() { return $this->item_name; }
function setGroup_id($group_id) { $this->group_id = $group_id; }
function getGroup_id() { return $this->group_id; }
function setCategory_id($category_id) { $this->category_id = $category_id; }
function getCategory_id() { return $this->category_id; }
function setType_id($type_id) { $this->type_id = $type_id; }
function getType_id() { return $this->type_id; }
function setStrangth($strangth) { $this->strangth = $strangth; }
function getStrangth() { return $this->strangth; }
function setLpl_per_bl($lpl_per_bl) { $this->lpl_per_bl = $lpl_per_bl; }
function getLpl_per_bl() { return $this->lpl_per_bl; }
function setFee_require($fee_require) { $this->fee_require = $fee_require; }
function getFee_require() { return $this->fee_require; }
function setI_fee($i_fee) { $this->i_fee = $i_fee; }
function getI_fee() { return $this->i_fee; }
function setT_fee($t_fee) { $this->t_fee = $t_fee; }
function getT_fee() { return $this->t_fee; }
function setE_fee($e_fee) { $this->e_fee = $e_fee; }
function getE_fee() { return $this->e_fee; }
function setStatus($status) { $this->status = $status; }
function getStatus() { return $this->status; }
function setIs_active($is_active) { $this->is_active = $is_active; }
function getIs_active() { return $this->is_active; }

}
