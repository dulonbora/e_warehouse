<?php
class Mdl_brand_packing {
    
    public function __construct() {}
    
    private $id                                 = 0;
    private $fyear                              = "";
    private $master_id                          = 0;
    private $bottles_per_case                   = 0;
    private $ml_per_case                        = 0;
    private $bl_per_case                        = 0;
    private $lpl_per_case                       = 0;
    private $lpl_per_bottle                     = 0;
    private $w_cost_price                       = 0;
    private $w_cost_price_per_bottle            = 0;
    private $r_cost_price                       = 0;
    private $r_cost_price_per_bottle            = 0;
    private $avd_amount                         = 0;
    private $avd_amount_per_bottle              = 0;
    private $tff_amount                         = 0;
    private $tff_per_bottle                     = 0;
    private $import_fee                         = 0;
    private $export_fee                         = 0;
    private $vat                                = 0;
    private $vat_per_bottle                     = 0;
    private $landed_to_wholesale                = 0;
    private $wholesale_margin_percentage        = 0;
    private $wholesale_margin_case              = 0;
    private $wholesale_margin_bottle            = 0;
    private $landed_to_retail                   = 0;
    private $retail_margin_percentage           = 0;
    private $retail_margin_case                 = 0;
    private $retail_margin_bottle               = 0;
    private $mrp                                = 0;
    private $mrp_per_bottle                     = 0;
    private $minimum_adv                        = 0;
    private $excise_duty                        = 0;
    private $gallonage_fee                      = 0;
    private $bootle_type                        = 0;
    private $is_mono_cartoon                    = "";
    private $status                             = 0;
    private $apply_from                         = 0;
    private $is_active                          = "YES";
    
   
    


function setTff_amount($tff_amount) { $this->tff_amount = $tff_amount; }
function getTff_amount() { return $this->tff_amount; }
function setTff_per_bottle($tff_per_bottle) { $this->tff_per_bottle = $tff_per_bottle; }
function getTff_per_bottle() { return $this->tff_per_bottle; }
function setImport_fee($import_fee) { $this->import_fee = $import_fee; }
function getImport_fee() { return $this->import_fee; }
function setExport_fee($export_fee) { $this->export_fee = $export_fee; }
function getExport_fee() { return $this->export_fee; }

    

function setId($id) { $this->id = $id; }
function getId() { return $this->id; }
function setFyear($fyear) { $this->fyear = $fyear; }
function getFyear() { return $this->fyear; }
function setMaster_id($master_id) { $this->master_id = $master_id; }
function getMaster_id() { return $this->master_id; }
function setBottles_per_case($bottles_per_case) { $this->bottles_per_case = $bottles_per_case; }
function getBottles_per_case() { return $this->bottles_per_case; }
function setMl_per_case($ml_per_case) { $this->ml_per_case = $ml_per_case; }
function getMl_per_case() { return $this->ml_per_case; }
function setBl_per_case($bl_per_case) { $this->bl_per_case = $bl_per_case; }
function getBl_per_case() { return $this->bl_per_case; }
function setLpl_per_case($lpl_per_case) { $this->lpl_per_case = $lpl_per_case; }
function getLpl_per_case() { return $this->lpl_per_case; }
function setLpl_per_bottle($lpl_per_bottle) { $this->lpl_per_bottle = $lpl_per_bottle; }
function getLpl_per_bottle() { return $this->lpl_per_bottle; }
function setW_cost_price($w_cost_price) { $this->w_cost_price = $w_cost_price; }
function getW_cost_price() { return $this->w_cost_price; }
function setW_cost_price_per_bottle($w_cost_price_per_bottle) { $this->w_cost_price_per_bottle = $w_cost_price_per_bottle; }
function getW_cost_price_per_bottle() { return $this->w_cost_price_per_bottle; }
function setR_cost_price($r_cost_price) { $this->r_cost_price = $r_cost_price; }
function getR_cost_price() { return $this->r_cost_price; }
function setR_cost_price_per_bottle($r_cost_price_per_bottle) { $this->r_cost_price_per_bottle = $r_cost_price_per_bottle; }
function getR_cost_price_per_bottle() { return $this->r_cost_price_per_bottle; }
function setAvd_amount($avd_amount) { $this->avd_amount = $avd_amount; }
function getAvd_amount() { return $this->avd_amount; }
function setAvd_amount_per_bottle($avd_amount_per_bottle) { $this->avd_amount_per_bottle = $avd_amount_per_bottle; }
function getAvd_amount_per_bottle() { return $this->avd_amount_per_bottle; }
function setFee_amount($fee_amount) { $this->fee_amount = $fee_amount; }
function getFee_amount() { return $this->fee_amount; }
function setFee_amount_per_bottle($fee_amount_per_bottle) { $this->fee_amount_per_bottle = $fee_amount_per_bottle; }
function getFee_amount_per_bottle() { return $this->fee_amount_per_bottle; }
function setVat($vat) { $this->vat = $vat; }
function getVat() { return $this->vat; }
function setVat_per_bottle($vat_per_bottle) { $this->vat_per_bottle = $vat_per_bottle; }
function getVat_per_bottle() { return $this->vat_per_bottle; }
function setLanded_to_wholesale($landed_to_wholesale) { $this->landed_to_wholesale = $landed_to_wholesale; }
function getLanded_to_wholesale() { return $this->landed_to_wholesale; }
function setWholesale_margin_percentage($wholesale_margin_percentage) { $this->wholesale_margin_percentage = $wholesale_margin_percentage; }
function getWholesale_margin_percentage() { return $this->wholesale_margin_percentage; }
function setWholesale_margin_case($wholesale_margin_case) { $this->wholesale_margin_case = $wholesale_margin_case; }
function getWholesale_margin_case() { return $this->wholesale_margin_case; }
function setWholesale_margin_bottle($wholesale_margin_bottle) { $this->wholesale_margin_bottle = $wholesale_margin_bottle; }
function getWholesale_margin_bottle() { return $this->wholesale_margin_bottle; }
function setLanded_to_retail($landed_to_retail) { $this->landed_to_retail = $landed_to_retail; }
function getLanded_to_retail() { return $this->landed_to_retail; }
function setRetail_margin_percentage($retail_margin_percentage) { $this->retail_margin_percentage = $retail_margin_percentage; }
function getRetail_margin_percentage() { return $this->retail_margin_percentage; }
function setRetail_margin_case($retail_margin_case) { $this->retail_margin_case = $retail_margin_case; }
function getRetail_margin_case() { return $this->retail_margin_case; }
function setRetail_margin_bottle($retail_margin_bottle) { $this->retail_margin_bottle = $retail_margin_bottle; }
function getRetail_margin_bottle() { return $this->retail_margin_bottle; }
function setMrp($mrp) { $this->mrp = $mrp; }
function getMrp() { return $this->mrp; }
function setMrp_per_bottle($mrp_per_bottle) { $this->mrp_per_bottle = $mrp_per_bottle; }
function getMrp_per_bottle() { return $this->mrp_per_bottle; }
function setMinimum_adv($minimum_adv) { $this->minimum_adv = $minimum_adv; }
function getMinimum_adv() { return $this->minimum_adv; }
function setExcise_duty($excise_duty) { $this->excise_duty = $excise_duty; }
function getExcise_duty() { return $this->excise_duty; }
function setGallonage_fee($gallonage_fee) { $this->gallonage_fee = $gallonage_fee; }
function getGallonage_fee() { return $this->gallonage_fee; }
function setBootle_type($bootle_type) { $this->bootle_type = $bootle_type; }
function getBootle_type() { return $this->bootle_type; }
function setIs_mono_cartoon($is_mono_cartoon) { $this->is_mono_cartoon = $is_mono_cartoon; }
function getIs_mono_cartoon() { return $this->is_mono_cartoon; }
function setStatus($status) { $this->status = $status; }
function getStatus() { return $this->status; }
function setIs_active($is_active) { $this->is_active = $is_active; }
function getIs_active() { return $this->is_active; }
function setApply_from($apply_from) { $this->apply_from = $apply_from; }
function getApply_from() { return $this->apply_from; }


}
?>
