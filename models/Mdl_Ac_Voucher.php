<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Mdl_Ac_Voucher
 *
 * @author Dulon
 */
class Mdl_Ac_Voucher {
    public function __construct() {}

    private $id                     = 0;
    private $longdate               = 0;
    private $prefix                 = "";
    private $fyear                  = "";
    private $num                    = 0;
    private $voucher_id             = 0;
    private $voucher_no             = 0;
    private $voucher_type           = "";
    private $dr_ledger_id           = 0;
    private $cr_ledger_id           = 0;
    private $particulars            = "";
    private $amount                 = 0;
    private $mode                   = "";
    private $inst_no                = "";
    private $inst_date              = "";
    private $bank_name              = "";
    private $ref_type               = "";
    private $ref_no                 = "";
    private $ref_date               = "";
    private $ref_amount             = 0;
    private $ref_due_date           = "";
    private $status                 = 0;
    private $create_on              = 0;
    private $create_by              = 0;
    private $modify_by              = 0;
    private $modify_on              = 0;
    private $is_active              = "YES";

    function setId($id) { $this->id = $id; }
    function getId() { return $this->id; }
    function setLongdate($logdate) { $this->longdate = $logdate; }
    function getLongdate() { return $this->longdate; }
    function setPrefix($prefix) { $this->prefix = $prefix; }
    function getPrefix() { return $this->prefix; }
    function setFyear($fyear) { $this->fyear = $fyear; }
    function getFyear() { return $this->fyear; }
    function setNum($num) { $this->num = $num; }
    function getNum() { return $this->num; }
    function setVoucher_id($voucher_id) { $this->voucher_id = $voucher_id; }
    function getVoucher_id() { return $this->voucher_id; }
    function setVoucher_no($voucher_no) { $this->voucher_no = $voucher_no; }
    function getVoucher_no() { return $this->voucher_no; }
    function setVoucher_type($voucher_type) { $this->voucher_type = $voucher_type; }
    function getVoucher_type() { return $this->voucher_type; }
    function setDr_ledger_id($dr_ledger_id) { $this->dr_ledger_id = $dr_ledger_id; }
    function getDr_ledger_id() { return $this->dr_ledger_id; }
    function setCr_ledger_id($cr_ledger_id) { $this->cr_ledger_id = $cr_ledger_id; }
    function getCr_ledger_id() { return $this->cr_ledger_id; }
    function setParticulars($particulars) { $this->particulars = $particulars; }
    function getParticulars() { return $this->particulars; }
    function setAmount($amount) { $this->amount = $amount; }
    function getAmount() { return $this->amount; }
    function setMode($mode) { $this->mode = $mode; }
    function getMode() { return $this->mode; }
    function setInst_no($inst_no) { $this->inst_no = $inst_no; }
    function getInst_no() { return $this->inst_no; }
    function setInst_date($inst_date) { $this->inst_date = $inst_date; }
    function getInst_date() { return $this->inst_date; }
    function setBank_name($bank_name) { $this->bank_name = $bank_name; }
    function getBank_name() { return $this->bank_name; }
    function setRef_type($ref_type) { $this->ref_type = $ref_type; }
    function getRef_type() { return $this->ref_type; }
    function setRef_no($ref_no) { $this->ref_no = $ref_no; }
    function getRef_no() { return $this->ref_no; }
    function setRef_date($ref_date) { $this->ref_date = $ref_date; }
    function getRef_date() { return $this->ref_date; }
    function setRef_amount($ref_amount) { $this->ref_amount = $ref_amount; }
    function getRef_amount() { return $this->ref_amount; }
    function setRef_due_date($ref_due_date) { $this->ref_due_date = $ref_due_date; }
    function getRef_due_date() { return $this->ref_due_date; }
    function setStatus($status) { $this->status = $status; }
    function getStatus() { return $this->status; }
    function setCreate_on($create_on) { $this->create_on = $create_on; }
    function getCreate_on() { return $this->create_on; }
    function setCreate_by($create_by) { $this->create_by = $create_by; }
    function getCreate_by() { return $this->create_by; }
    function setModify_by($modify_by) { $this->modify_by = $modify_by; }
    function getModify_by() { return $this->modify_by; }
    function setModify_on($modify_on) { $this->modify_on = $modify_on; }
    function getModify_on() { return $this->modify_on; }
    function setIs_active($is_active) { $this->is_active = $is_active; }
    function getIs_active() { return $this->is_active; }


}
