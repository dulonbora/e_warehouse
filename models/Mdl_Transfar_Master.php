<?php

class Mdl_Transfar_Master {
    public function __construct() {}
    
    private $id                     = 0;
    private $user_from              = 0;
    private $user_to                = 0;
    private $too                    = "";
    private $fyear                  = "";
    private $vch_type               = "";
    private $sl_no                  = 0;
    private $mode                   = "";
    private $voucher_no             = "";
    private $longdate               = 0;
    private $order_no               = "";
    private $order_date             = "";
    private $bill_no                = "";
    private $bill_date              = "";
    private $converted              = "";
    private $delivery_mode          = "";
    private $delivery_note          = "";
    private $other_note             = "";
    private $item_total             = 0;
    private $avd_amount             = 0;
    private $avd_amount_status      = "";
    private $pass_amount            = 0;
    private $pass_amount_status     = "";
    private $vat_amount             = 0;
    private $vat_amount_status      = "";
    private $cost_price             = 0;
    private $cost_price_status      = "";
    private $total_tcs              = 0;
    private $other_charge           = 0;
    private $charged_amount         = 0;
    private $adjustment             = 0;
    private $grand_total            = 0;
    private $create_by              = 0;
    private $create_on              = 0;
    private $modify_by              = 0;
    private $modify_on              = 0;
    private $status                 = 1;
    private $is_active              = "YES";

    function setId($id) { $this->id = $id; }
    function getId() { return $this->id; }
    function setUser_from($user_from) { $this->user_from = $user_from; }
    function getUser_from() { return $this->user_from; }
    function setUser_to($user_to) { $this->user_to = $user_to; }
    function getUser_to() { return $this->user_to; }
    function setToo($too) { $this->too = $too; }
    function getToo() { return $this->too; }
    function setFyear($fyear) { $this->fyear = $fyear; }
    function getFyear() { return $this->fyear; }
    function setVch_type($vch_type) { $this->vch_type = $vch_type; }
    function getVch_type() { return $this->vch_type; }
    function setSl_no($sl_no) { $this->sl_no = $sl_no; }
    function getSl_no() { return $this->sl_no; }
    function setMode($mode) { $this->mode = $mode; }
    function getMode() { return $this->mode; }
    function setVoucher_no($voucher_no) { $this->voucher_no = $voucher_no; }
    function getVoucher_no() { return $this->voucher_no; }
    function setLongdate($longdate) { $this->longdate = $longdate; }
    function getLongdate() { return $this->longdate; }
    function setOrder_no($order_no) { $this->order_no = $order_no; }
    function getOrder_no() { return $this->order_no; }
    function setOrder_date($order_date) { $this->order_date = $order_date; }
    function getOrder_date() { return $this->order_date; }
    function setBill_no($bill_no) { $this->bill_no = $bill_no; }
    function getBill_no() { return $this->bill_no; }
    function setBill_date($bill_date) { $this->bill_date = $bill_date; }
    function getBill_date() { return $this->bill_date; }
    function setConverted($converted) { $this->converted = $converted; }
    function getConverted() { return $this->converted; }
    function setDelivery_mode($delivery_mode) { $this->delivery_mode = $delivery_mode; }
    function getDelivery_mode() { return $this->delivery_mode; }
    function setDelivery_note($delivery_note) { $this->delivery_note = $delivery_note; }
    function getDelivery_note() { return $this->delivery_note; }
    function setOther_note($other_note) { $this->other_note = $other_note; }
    function getOther_note() { return $this->other_note; }
    function setItem_total($item_total) { $this->item_total = $item_total; }
    function getItem_total() { return $this->item_total; }
    function setAvd_amount($avd_amount) { $this->avd_amount = $avd_amount; }
    function getAvd_amount() { return $this->avd_amount; }
    function setAvd_amount_status($avd_amount_status) { $this->avd_amount_status = $avd_amount_status; }
    function getAvd_amount_status() { return $this->avd_amount_status; }
    function setPass_amount($pass_amount) { $this->pass_amount = $pass_amount; }
    function getPass_amount() { return $this->pass_amount; }
    function setPass_amount_status($pass_amount_status) { $this->pass_amount_status = $pass_amount_status; }
    function getPass_amount_status() { return $this->pass_amount_status; }
    function setVat_amount($vat_amount) { $this->vat_amount = $vat_amount; }
    function getVat_amount() { return $this->vat_amount; }
    function setVat_amount_status($vat_amount_status) { $this->vat_amount_status = $vat_amount_status; }
    function getVat_amount_status() { return $this->vat_amount_status; }
    function setCost_price($cost_price) { $this->cost_price = $cost_price; }
    function getCost_price() { return $this->cost_price; }
    function setCost_price_status($cost_price_status) { $this->cost_price_status = $cost_price_status; }
    function getCost_price_status() { return $this->cost_price_status; }
    function setTotal_tcs($total_tcs) { $this->total_tcs = $total_tcs; }
    function getTotal_tcs() { return $this->total_tcs; }
    function setOther_charge($other_charge) { $this->other_charge = $other_charge; }
    function getOther_charge() { return $this->other_charge; }
    function setCharged_amount($charged_amount) { $this->charged_amount = $charged_amount; }
    function getCharged_amount() { return $this->charged_amount; }
    function setAdjustment($adjustment) { $this->adjustment = $adjustment; }
    function getAdjustment() { return $this->adjustment; }
    function setGrand_total($grand_total) { $this->grand_total = $grand_total; }
    function getGrand_total() { return $this->grand_total; }
    function setCreate_by($create_by) { $this->create_by = $create_by; }
    function getCreate_by() { return $this->create_by; }
    function setCreate_on($create_on) { $this->create_on = $create_on; }
    function getCreate_on() { return $this->create_on; }
    function setModify_by($modify_by) { $this->modify_by = $modify_by; }
    function getModify_by() { return $this->modify_by; }
    function setModify_on($modify_on) { $this->modify_on = $modify_on; }
    function getModify_on() { return $this->modify_on; }
    function setStatus($status) { $this->status = $status; }
    function getStatus() { return $this->status; }
    function setIs_active($is_active) { $this->is_active = $is_active; }
    function getIs_active() { return $this->is_active; }

}
