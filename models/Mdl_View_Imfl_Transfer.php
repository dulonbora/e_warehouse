<?php

class Mdl_View_Imfl_Transfer {
    public function __construct() {}

    private $id                 = 0;
    private $master_id          = 0;
    private $item_id            = 0;
    private $packing_id         = 0;
    private $user_item_id       = 0;
    private $unit               = "";
    private $io_type            = "";
    private $packing_size       = 0;
    private $batch_no           = "";
    private $total_case         = 0;
    private $total_bottle       = 0;
    private $total_bl           = 0;
    private $total_lpl          = 0;
    private $total_cost         = 0;
    private $total_adv          = 0;
    private $total_fee          = 0;
    private $total_vat          = 0;
    private $tcs                = 0;
    private $total_mrp          = 0;
    private $total_amount       = 0;
    private $status             = 0;
    private $longdate           = 0;
    private $name               = "";
    private $bottles_per_case   = 0;
    private $ml_per_case        = 0;
    private $company_name       = "";
    private $user_from          = 0;
    private $user_from_name     = "";
    private $user_to            = 0;
    private $to_from_name       = "";
    private $create_by          = 0;

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
    function setIo_type($io_type) { $this->io_type = $io_type; }
    function getIo_type() { return $this->io_type; }
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
    function setLongdate($longdate) { $this->longdate = $longdate; }
    function getLongdate() { return $this->longdate; }
    function setName($name) { $this->name = $name; }
    function getName() { return $this->name; }
    function setBottles_per_case($bottles_per_case) { $this->bottles_per_case = $bottles_per_case; }
    function getBottles_per_case() { return $this->bottles_per_case; }
    function setMl_per_case($ml_per_case) { $this->ml_per_case = $ml_per_case; }
    function getMl_per_case() { return $this->ml_per_case; }
    function setCompany_name($company_name) { $this->company_name = $company_name; }
    function getCompany_name() { return $this->company_name; }
    function setUser_from($user_from) { $this->user_from = $user_from; }
    function getUser_from() { return $this->user_from; }
    function setUser_from_name($user_from_name) { $this->user_from_name = $user_from_name; }
    function getUser_from_name() { return $this->user_from_name; }
    function setUser_to($user_to) { $this->user_to = $user_to; }
    function getUser_to() { return $this->user_to; }
    function setTo_from_name($to_from_name) { $this->to_from_name = $to_from_name; }
    function getTo_from_name() { return $this->to_from_name; }
    function setCreate_by($create_by) { $this->create_by = $create_by; }
    function getCreate_by() { return $this->create_by; }

}
