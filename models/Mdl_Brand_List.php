<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Mdl_Ena_List
 *
 * @author Dulon Bora
 */
class Mdl_Brand_List {
    public function __construct() {}
    
    private $id                 = 0;
    private $item_id            = 0;
    private $fyear              = "";
    private $packing_id         = 0;
    private $user_id            = 0;
    private $opening_stock      = 0;
    private $inward_stock       = 0;
    private $outward_stock      = 0;
    private $prodiucting_stock  = 0;
    private $prodiuced_stock    = 0;
    private $lost_stock         = 0;
    private $closeing_stock     = 0;
    private $status             = 1;
    private $create_on          = 0;
    private $create_by          = 0;
    private $modify_on          = 0;
    private $modify_by          = 0;
    private $is_active          = "YES";

    function setId($id) { $this->id = $id; }
    function getId() { return $this->id; }
    function setItem_id($item_id) { $this->item_id = $item_id; }
    function getItem_id() { return $this->item_id; }
    function setFyear($fyear) { $this->fyear = $fyear; }
    function getFyear() { return $this->fyear; }
    function setPacking_id($packing_id) { $this->packing_id = $packing_id; }
    function getPacking_id() { return $this->packing_id; }
    function setUser_id($user_id) { $this->user_id = $user_id; }
    function getUser_id() { return $this->user_id; }
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
    function setStatus($status) { $this->status = $status; }
    function getStatus() { return $this->status; }

}
