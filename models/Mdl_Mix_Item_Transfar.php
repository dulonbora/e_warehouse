<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Mdl_Mix_Item_Transfar
 *
 * @author Dulon
 */
class Mdl_Mix_Item_Transfar {
    public function __construct() {}
    
    private $id                 = 0;
    private $itemId             = 0;
    private $userItemId         = 0;
    private $userFrom           = 0;
    private $userTo             = 0;
    private $too                = "";
    private $ioType             = "";
    private $mode               = "";
    private $trankNo            = "";
    private $permitId           = 0;
    private $type               = "";
    private $note               = "";
    private $inUnit             = 0;
    private $inSubunit          = 0;
    private $longdate           = 0;
    private $status             = 0;
    private $createOn           = 0;
    private $createBy           = 0;
    private $modifyOn           = 0;
    private $modifyBy           = 0;
    private $isActive           = "YES";

    function setId($id) { $this->id = $id; }
    function getId() { return $this->id; }
    function setItemId($itemId) { $this->itemId = $itemId; }
    function getItemId() { return $this->itemId; }
    function setUserItemId($userItemId) { $this->userItemId = $userItemId; }
    function getUserItemId() { return $this->userItemId; }
    function setUserFrom($userFrom) { $this->userFrom = $userFrom; }
    function getUserFrom() { return $this->userFrom; }
    function setUserTo($userTo) { $this->userTo = $userTo; }
    function getUserTo() { return $this->userTo; }
    function setToo($too) { $this->too = $too; }
    function getToo() { return $this->too; }
    function setIoType($ioType) { $this->ioType = $ioType; }
    function getIoType() { return $this->ioType; }
    function setMode($mode) { $this->mode = $mode; }
    function getMode() { return $this->mode; }
    function setTrankNo($trankNo) { $this->trankNo = $trankNo; }
    function getTrankNo() { return $this->trankNo; }
    function setPermitId($permitId) { $this->permitId = $permitId; }
    function getPermitId() { return $this->permitId; }
    function setType($type) { $this->type = $type; }
    function getType() { return $this->type; }
    function setNote($note) { $this->note = $note; }
    function getNote() { return $this->note; }
    function setInUnit($inUnit) { $this->inUnit = $inUnit; }
    function getInUnit() { return $this->inUnit; }
    function setInSubunit($inSubunit) { $this->inSubunit = $inSubunit; }
    function getInSubunit() { return $this->inSubunit; }
    function setLongdate($longdate) { $this->longdate = $longdate; }
    function getLongdate() { return $this->longdate; }
    function setStatus($status) { $this->status = $status; }
    function getStatus() { return $this->status; }
    function setCreateOn($createOn) { $this->createOn = $createOn; }
    function getCreateOn() { return $this->createOn; }
    function setCreateBy($createBy) { $this->createBy = $createBy; }
    function getCreateBy() { return $this->createBy; }
    function setModifyOn($modifyOn) { $this->modifyOn = $modifyOn; }
    function getModifyOn() { return $this->modifyOn; }
    function setModifyBy($modifyBy) { $this->modifyBy = $modifyBy; }
    function getModifyBy() { return $this->modifyBy; }
    function setIsActive($isActive) { $this->isActive = $isActive; }
    function getIsActive() { return $this->isActive; }

}
