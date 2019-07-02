<?php

class Mdl_Company {
    public function __construct() {}
    
    private $id                     = 0;
    private $company_name           = "";
    private $email                  = "";
    private $phone_no               = "";
    private $address                = "";
    private $city                   = "";
    private $state                  = "";
    private $zip                    = 0;
    private $gstn                   = "";
    private $pan_or_it_no           = "";
    private $sales_tax_no           = "";
    private $cst_no                 = "";
    private $status                 = 0;
    private $create_on              = 0;
    private $create_by              = 0;
    private $modify_on              = 0;
    private $modify_by              = 0;
    private $is_active              = "YES";
    
    private $excise_user_id         = "";
    private $role                   = "";
    private $company_type           = "";
    private $company_logo           = "";
    private $district               = "";
    private $sub_division           = "";
    
    function setId($id) { $this->id = $id; }
    function getId() { return $this->id; }
    function setExcise_user_id($excise_user_id) { $this->excise_user_id = $excise_user_id; }
    function getExcise_user_id() { return $this->excise_user_id; }
    function setRole($role) { $this->role = $role; }
    function getRole() { return $this->role; }
    function setCompany_type($company_type) { $this->company_type = $company_type; }
    function getCompany_type() { return $this->company_type; }
    function setCompany_name($company_name) { $this->company_name = $company_name; }
    function getCompany_name() { return $this->company_name; }
    function setCompany_logo($company_logo) { $this->company_logo = $company_logo; }
    function getCompany_logo() { return $this->company_logo; }
    function setEmail($email) { $this->email = $email; }
    function getEmail() { return $this->email; }
    function setPhone_no($phone_no) { $this->phone_no = $phone_no; }
    function getPhone_no() { return $this->phone_no; }
    function setAddress($address) { $this->address = $address; }
    function getAddress() { return $this->address; }
    function setDistrict($district) { $this->district = $district; }
    function getDistrict() { return $this->district; }
    function setSub_division($sub_division) { $this->sub_division = $sub_division; }
    function getSub_division() { return $this->sub_division; }
    function setState($state) { $this->state = $state; }
    function getState() { return $this->state; }
    function setZip($zip) { $this->zip = $zip; }
    function getZip() { return $this->zip; }
    function setGstn($gstn) { $this->gstn = $gstn; }
    function getGstn() { return $this->gstn; }
    function setPan_or_it_no($pan_or_it_no) { $this->pan_or_it_no = $pan_or_it_no; }
    function getPan_or_it_no() { return $this->pan_or_it_no; }
    function setSales_tax_no($sales_tax_no) { $this->sales_tax_no = $sales_tax_no; }
    function getSales_tax_no() { return $this->sales_tax_no; }
    function setCst_no($cst_no) { $this->cst_no = $cst_no; }
    function getCst_no() { return $this->cst_no; }
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
    function setCity($city) { $this->city = $city; }
    function getCity() { return $this->city; }

}
