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
class Mdl_Ledger_Account {
    public function __construct() {}
    
    private $id                     = 0;
    private $ac_voucher_id          = 0;
    private $sl_no                  = 0;
    private $longdate               = 0;
    private $particulars            = "";
    private $note                   = "";
    private $voucher_type           = "";
    private $voucher_no             = "";
    private $ledger_id              = 0;
    private $credit                 = 0;
    private $debit                  = 0;
    private $crdr                   = "";
    private $balance                = 0;
    private $status                 = 0;
    private $create_on              = 0;
    private $create_by              = 0;
    private $modify_on              = 0;
    private $modify_by              = 0;
    private $is_active              = "YES";

    function setId($id) { $this->id = $id; }
    function getId() { return $this->id; }
    function setAc_voucher_id($ac_voucher_id) { $this->ac_voucher_id = $ac_voucher_id; }
    function getAc_voucher_id() { return $this->ac_voucher_id; }
    function setSl_no($sl_no) { $this->sl_no = $sl_no; }
    function getSl_no() { return $this->sl_no; }
    function setLongdate($longdate) { $this->longdate = $longdate; }
    function getLongdate() { return $this->longdate; }
    function setParticulars($particulars) { $this->particulars = $particulars; }
    function getParticulars() { return $this->particulars; }
    function setNote($note) { $this->note = $note; }
    function getNote() { return $this->note; }
    function setVoucher_type($voucher_type) { $this->voucher_type = $voucher_type; }
    function getVoucher_type() { return $this->voucher_type; }
    function setVoucher_no($voucher_no) { $this->voucher_no = $voucher_no; }
    function getVoucher_no() { return $this->voucher_no; }
    function setLedger_id($ledger_id) { $this->ledger_id = $ledger_id; }
    function getLedger_id() { return $this->ledger_id; }
    function setCredit($credit) { $this->credit = $credit; }
    function getCredit() { return $this->credit; }
    function setDebit($debit) { $this->debit = $debit; }
    function getDebit() { return $this->debit; }
    function setCrdr($crdr) { $this->crdr = $crdr; }
    function getCrdr() { return $this->crdr; }
    function setBalance($balance) { $this->balance = $balance; }
    function getBalance() { return $this->balance; }
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
    private $voucher_id;

    function setVoucher_id($voucher_id) { $this->voucher_id = $voucher_id; }
    function getVoucher_id() { return $this->voucher_id; }

}
