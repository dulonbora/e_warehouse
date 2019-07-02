<?php

class Mdl_Transfar_Item {
    public function __construct() {}
    
    private $id                         = 0;
    private $master_id                  = 0;
    private $item_id                    = 0;
    private $packing_id                 = 0;
    private $user_item_id               = 0;
    private $unit                       = "CASE";
    private $packing_size               = 0;
    private $batch_no                   = "N/A";
    private $ioType                     = "N/A";
    private $total_case                 = 0;
    private $total_bottle               = 0;
    private $total_bl                   = 0;
    private $total_lpl                  = 0;
    private $total_cost                 = 0;
    private $total_adv                  = 0;
    private $total_fee                  = 0;
    private $total_vat                  = 0;
    private $tcs                        = 0;
    private $total_mrp                  = 0;
    private $total_amount               = 0;
    private $status                     = 1;
    private $is_active                  = "YES";
    private $longdate                   = 0;
    private $createBy                   = 0;


    function setId($id) { $this->id = $id; }
    function getId() { return $this->id; }
    function setMaster_id($master_id) { $this->master_id = $master_id; }
    function getMaster_id() { return $this->master_id; }
    function setItem_id($item_id) { $this->item_id = $item_id; }
    function getItem_id() { return $this->item_id; }
    function setPacking_id($packing_id) { $this->packing_id = $packing_id; }
    function getPacking_id() { return $this->packing_id; }
    function setUser_item_id($user_item_id) { $this->user_item_id = $user_item_id; }
    function getUser_item_id() { return $this->user_item_id; }
    function setUnit($unit) { $this->unit = $unit; }
    function getUnit() { return $this->unit; }
    function setPacking_size($packing_size) { $this->packing_size = $packing_size; }
    function getPacking_size() { return $this->packing_size; }
    function setBatch_no($batch_no) { $this->batch_no = $batch_no; }
    function getBatch_no() { return $this->batch_no; }
    function setTotal_case($total_case) { $this->total_case = $total_case; }
    function getTotal_case() { return $this->total_case; }
    function setTotal_bottle($total_bottle) { $this->total_bottle = $total_bottle; }
    function getTotal_bottle() { return $this->total_bottle; }
    function setTotal_bl($total_bl) { $this->total_bl = $total_bl; }
    function getTotal_bl() { return $this->total_bl; }
    function setTotal_lpl($total_lpl) { $this->total_lpl = $total_lpl; }
    function getTotal_lpl() { return $this->total_lpl; }
    function setTotal_cost($total_cost) { $this->total_cost = $total_cost; }
    function getTotal_cost() { return $this->total_cost; }
    function setTotal_adv($total_adv) { $this->total_adv = $total_adv; }
    function getTotal_adv() { return $this->total_adv; }
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
    function setStatus($status) { $this->status = $status; }
    function getStatus() { return $this->status; }
    function setIs_active($is_active) { $this->is_active = $is_active; }
    function getIs_active() { return $this->is_active; }
    

    function setIoType($ioType) { $this->ioType = $ioType; }
    function getIoType() { return $this->ioType; }
    


    function setLongdate($longdate) { $this->longdate = $longdate; }
    function getLongdate() { return $this->longdate; }
    function setCreateBy($createBy) { $this->createBy = $createBy; }
    function getCreateBy() { return $this->createBy; }




}
