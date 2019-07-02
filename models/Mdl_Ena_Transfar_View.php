<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Mdl_Ena_Transfar_View
 *
 * @author Dulon
 */
class Mdl_Ena_Transfar_View {
    
    public function __construct() {}


    private $id                     = 0;
    private $item_id                = 0;
    private $user_item_id           = 0;
    private $item_name              = "";
    private $user_from              = 0;
    private $user_from_name         = "";
    private $user_to                = 0;
    private $user_to_name           = "";
    private $too                    = "";
    private $io_type                = "";
    private $mode                   = "";
    private $trank_no               = "";
    private $permit_id              = 0;
    private $bl                     = 0;
    private $longdate               = 0;
    private $status                 = 0;
    private $create_on              = 0;
    private $create_by              = 0;
    private $modify_on              = 0;
    private $modify_by              = 0;

    function setId($id) { $this->id = $id; }
    function getId() { return $this->id; }
    function setItem_id($item_id) { $this->item_id = $item_id; }
    function getItem_id() { return $this->item_id; }
    function setUser_item_id($user_item_id) { $this->user_item_id = $user_item_id; }
    function getUser_item_id() { return $this->user_item_id; }
    function setItem_name($item_name) { $this->item_name = $item_name; }
    function getItem_name() { return $this->item_name; }
    function setUser_from($user_from) { $this->user_from = $user_from; }
    function getUser_from() { return $this->user_from; }
    function setUser_from_name($user_from_name) { $this->user_from_name = $user_from_name; }
    function getUser_from_name() { return $this->user_from_name; }
    function setUser_to($user_to) { $this->user_to = $user_to; }
    function getUser_to() { return $this->user_to; }
    function setUser_to_name($user_to_name) { $this->user_to_name = $user_to_name; }
    function getUser_to_name() { return $this->user_to_name; }
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

}
