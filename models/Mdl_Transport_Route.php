<?php

class Mdl_Transport_Route {
    public function __construct() {}
    
    public $_table_name = "TRANSPORT_ROUTE";
    
    private $id                     = 0;
    private $transport_route        = "";
    private $user_from              = 0;
    private $user_to                = 0;
    private $status                 = 0;
    private $create_on              = 0;
    private $create_by              = 0;
    private $modify_by              = 0;
    private $modify_on              = 0;
    private $is_active              = "YES";

    function setId($id) { $this->id = $id; }
    function getId() { return $this->id; }
    function setLongdate($longdate) { $this->longdate = $longdate; }
    function getLongdate() { return $this->longdate; }
    function setUser_from($user_from) { $this->user_from = $user_from; }
    function getUser_from() { return $this->user_from; }
    function setUser_to($user_to) { $this->user_to = $user_to; }
    function getUser_to() { return $this->user_to; }
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
    function setTransport_route($transport_route) { $this->transport_route = $transport_route; }
    function getTransport_route() { return $this->transport_route; }
}
