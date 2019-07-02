<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Mdl_Massage
 *
 * @author Dulon
 */
class Mdl_Massage {
    public function __construct() {}
    
    private $id                 = 0;
    private $user_id            = 0;
    private $to_user_id         = 0;
    private $district_id        = 0;
    private $module_type        = "";
    private $massage_type       = "";
    private $note               = "";
    private $designation        = "";
    private $action             = 0;
    private $status             = 0;
    private $create_on          = 0;
    private $create_by          = 0;
    private $modify_on          = 0;
    private $modify_by          = 0;
    private $is_active          = "YES";
    
    private $module_ids         = 0;

    function setId($id) { $this->id = $id; }
    function getId() { return $this->id; }
    function setUser_id($user_id) { $this->user_id = $user_id; }
    function getUser_id() { return $this->user_id; }
    function setTo_user_id($to_user_id) { $this->to_user_id = $to_user_id; }
    function getTo_user_id() { return $this->to_user_id; }
    function setDistrict_id($district_id) { $this->district_id = $district_id; }
    function getDistrict_id() { return $this->district_id; }
    function setModule_type($module_type) { $this->module_type = $module_type; }
    function getModule_type() { return $this->module_type; }
    function setMassage_type($massage_type) { $this->massage_type = $massage_type; }
    function getMassage_type() { return $this->massage_type; }
    function setNote($note) { $this->note = $note; }
    function getNote() { return $this->note; }
    function setDesignation($designation) { $this->designation = $designation; }
    function getDesignation() { return $this->designation; }
    function setAction($action) { $this->action = $action; }
    function getAction() { return $this->action; }
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
    

    function setModule_ids($module_ids) { $this->module_ids = $module_ids; }
    function getModule_ids() { return $this->module_ids; }


    
    
}
