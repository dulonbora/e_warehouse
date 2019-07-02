<?php

class Mdl_Ena_Transfar {
    public function __construct() {}
    
    private $id                     = 0;
    private $item_id                = 0;
    private $user_item_id           = 0;
    private $user_from              = 0;
    private $user_to                = 0;
    private $too                    = "";
    private $io_type                = "";
    private $mode                   = "";
    private $trank_no               = "";
    private $permit_id              = 0;
    private $bl                     = 0;
    private $total_cost             = 0;
    private $total_fee              = 0;
    private $total_vat              = 0;
    private $tcs                    = 0;
    private $total_mrp              = 0;
    private $total_amount           = 0;
    private $longdate               = 0;
    private $status                 = 0;
    private $create_on              = 0;
    private $create_by              = 0;
    private $modify_on              = 0;
    private $modify_by              = 0;
    private $is_active              = "YES";
    private $master_id              = 0;


    function setId($id) { $this->id = $id; }
    function getId() { return $this->id; }
    function setItem_id($item_id) { $this->item_id = $item_id; }
    function getItem_id() { return $this->item_id; }
    function setUser_item_id($user_item_id) { $this->user_item_id = $user_item_id; }
    function getUser_item_id() { return $this->user_item_id; }
    function setUser_from($user_from) { $this->user_from = $user_from; }
    function getUser_from() { return $this->user_from; }
    function setUser_to($user_to) { $this->user_to = $user_to; }
    function getUser_to() { return $this->user_to; }
    function setToo($too) { $this->too = $too; }
    function getToo() { return $this->too; }
    function setIo_type($io_type) { $this->io_type = $io_type; }
    function getIo_type() { return $this->io_type; }
    function setMode($mode) { $this->mode = $mode; }
    function getMode() { return $this->mode; }
    function setTrank_no($trank_no) { $this->trank_no = $trank_no; }
    function getTrank_no() { return $this->trank_no; }
    function setPermit_id($permit_id) { $this->permit_id = $permit_id; }
    function getPermit_id() { return $this->permit_id; }
    function setBl($bl) { $this->bl = $bl; }
    function getBl() { return $this->bl; }
    function setTotal_cost($total_cost) { $this->total_cost = $total_cost; }
    function getTotal_cost() { return $this->total_cost; }
    function setTotal_fee($total_fee) { $this->total_fee = $total_fee; }
    function getTotal_fee() { return $this->total_fee; }
    function setTotal_vat($total_vat) { $this->total_vat = $total_vat; }
    function getTotal_vat() { return $this->total_vat; }
    function setTcs($tcs) { $this->tcs = $tcs; }
    function getTcs() { return $this->tcs; }
    function setTotal_mrp($total_mrp) { $this->total_mrp = $total_mrp; }
    function getTotal_mrp() { return $this->total_mrp; }
    function setTotal_amount($total_amount) { $this->total_amount = $total_amount; }
    function getTotal_amount() { return $this->total_amount; }
    function setLongdate($longdate) { $this->longdate = $longdate; }
    function getLongdate() { return $this->longdate; }
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
    

    function setMaster_id($master_id) { $this->master_id = $master_id; }
    function getMaster_id() { return $this->master_id; }


}
