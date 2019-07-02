<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Stock_Fectory
 * @author amtron
*/

class Stock_Fectory {

    /*
    $unitValue       = 0;
    $unitStock       = 0;
    $altUnitStock    =0;
    */
    
    public function getAltUnitStock($unitValue, $unitStock){
        $d = $unitStock * $unitValue;
        return d;
    }
    
    public function getUnitStock($unitValue, $altUnitStock){
        $unitStock              = $altUnitStock/$unitValue;
        if($altUnitStock%$unitValue == 0){
                $_unitStock     = (int) $unitStock;
            }
            else{
                $d              = $altUnitStock%$unitValue;
                $_suStock       = (int) $d;
                $_uStock        = (int) $unitStock;
                $str            = $_uStock . "." . $_suStock ;
                $unitStock      = floatval($str);
            }
        return $unitStock;
    }
    
    public function getStockInString($unitValue, $altUnitStock, $unit, $altUnit){
            $str                = "";
            $unitStock          = $altUnitStock/$unitValue;
            if($altUnitStock%$unitValue == 0){
                $_unitStock     = (int) $unitStock;
                $str            = $_unitStock." ".$unit; 
            }
            else{
                $d = $altUnitStock%$unitValue;
                $_suStock       = (int) $d;
                $_uStock        = (int) $unitStock;
                $str            = $_uStock ==0 ? $_suStock . " ". $altUnit : $_uStock . " " . $unit ." ". $_suStock . " ". $altUnit;
            }
        return $str;
    }
        
}

