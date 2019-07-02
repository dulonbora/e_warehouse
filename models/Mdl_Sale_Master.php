<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Mdl_Sale_Master
 *
 * @author Dulon
 */
class Mdl_Sale_Master {
    public function __construct() {}
    
    private $id                 = 0;
    private $user_id            = 0;
    private $longdate           = 0;
    private $total_item         = 0;
    private $total_adv          = 0;
    private $total_fee          = 0;
    private $total_vat          = 0;
    private $mrp_value          = 0;
    private $total_bl           = 0;
    private $total_lpl          = 0;
    private $is_converted       = "";
    private $status             = 0;
    private $create_by          = 0;
    private $create_on          = 0;
    private $modify_on          = 0;
    private $modify_by          = 0;
    private $is_active          = "YES";

    function setId($id) { $this->id = $id; }
    function getId() { return $this->id; }
    function setUser_id($user_id) { $this->user_id = $user_id; }
    function getUser_id() { return $this->user_id; }
    function setLongdate($longdate) { $this->longdate = $longdate; }
    function getLongdate() { return $this->longdate; }
    function setTotal_item($total_item) { $this->total_item = $total_item; }
    function getTotal_item() { return $this->total_item; }
    function setTotal_adv($total_adv) { $this->total_adv = $total_adv; }
    function getTotal_adv() { return $this->total_adv; }
    function setTotal_fee($total_fee) { $this->total_fee = $total_fee; }
    function getTotal_fee() { return $this->total_fee; }
    function setTotal_vat($total_vat) { $this->total_vat = $total_vat; }
    function getTotal_vat() { return $this->total_vat; }
    function setMrp_value($mrp_value) { $this->mrp_value = $mrp_value; }
    function getMrp_value() { return $this->mrp_value; }
    function setTotal_bl($total_bl) { $this->total_bl = $total_bl; }
    function getTotal_bl() { return $this->total_bl; }
    function setTotal_lpl($total_lpl) { $this->total_lpl = $total_lpl; }
    function getTotal_lpl() { return $this->total_lpl; }
    function setIs_converted($is_converted) { $this->is_converted = $is_converted; }
    function getIs_converted() { return $this->is_converted; }
    function setStatus($status) { $this->status = $status; }
    function getStatus() { return $this->status; }
    function setCreate_by($create_by) { $this->create_by = $create_by; }
    function getCreate_by() { return $this->create_by; }
    function setCreate_on($create_on) { $this->create_on = $create_on; }
    function getCreate_on() { return $this->create_on; }
    function setModify_on($modify_on) { $this->modify_on = $modify_on; }
    function getModify_on() { return $this->modify_on; }
    function setModify_by($modify_by) { $this->modify_by = $modify_by; }
    function getModify_by() { return $this->modify_by; }
    function setIs_active($is_active) { $this->is_active = $is_active; }
    function getIs_active() { return $this->is_active; }


}
