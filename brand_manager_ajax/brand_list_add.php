<?php
    error_reporting(0);
    ob_start();
    if (session_status() == PHP_SESSION_NONE) {session_start();}
    $userId = $_SESSION['id'] == NULL ? 0 : $_SESSION['id'];

    include_once '../classes/Brand__List.php';
    $__bra                  = new Brand__List();
    include_once '../classes/Brand__Master.php';
    $__Brand__Master        = new Brand__Master();
    include_once '../classes/Brand__Packing.php';
    $__Brand__Packing       = new Brand__Packing();
    include_once '../classes/Stock_Fectory.php';
    $__Stock_Fectory        = new Stock_Fectory();

    include_once '../classes/Transfar_Item.php';
    $__Transfar_Item        = new Transfar_Item();

    $response = array(); 
    $response["SUCCESS"] = 0;


    $_fyear                     = filter_input(INPUT_POST , "FYEAR");
    $_packing_id                = filter_input(INPUT_POST , "PACKING_ID");
    $_user_id                   = $userId;
    $_opening_stock             = filter_input(INPUT_POST , "OPENING_STOCK_CASE");
    $_opening_stock_bottle      = filter_input(INPUT_POST , "OPENING_STOCK_BOTTLE");
    $_inward_stock              = 0;
    $_outward_stock             = 0;
    $_prodiucting_stock         = 0;
    $_prodiuced_stock           = 0;
    $_lost_stock                = 0;
    $_closeing_stock            = 0;
    $_create_on                 = time();
    $_create_by                 = $userId;
    $_modify_on                 = time();
    $_modify_by                 = $userId;
    $_is_active                 = "YES";


    //Catcluation
    $__Brand__Packing->LoadValue($_packing_id);

    $_item_id                           = $__Brand__Packing->getMaster_id();
    $_bottle_per_case                   = (int) $__Brand__Packing->getBottles_per_case();
    $_opening_stock_bottle_as_bottle    = ($_bottle_per_case * $_opening_stock) + $_opening_stock_bottle;


    $__bra->setItem_id($_item_id);
    $__bra->setFyear($_fyear);
    $__bra->setPacking_id($_packing_id);
    $__bra->setUser_id($_user_id);
    $__bra->setOpening_stock($_opening_stock_bottle_as_bottle);
    $__bra->setInward_stock($_inward_stock);
    $__bra->setOutward_stock($_outward_stock);
    $__bra->setProdiucting_stock($_prodiucting_stock);
    $__bra->setProdiuced_stock($_prodiuced_stock);
    $__bra->setLost_stock($_lost_stock);
    $__bra->setCloseing_stock($_opening_stock_bottle_as_bottle);
    $__bra->setCreate_on($_create_on);
    $__bra->setCreate_by($_create_by);
    $__bra->setModify_on($_modify_on);
    $__bra->setModify_by($_modify_by);
    $__bra->setIs_active($_is_active);
    $__bra->setStatus(5);

    $alreadyExit = $__bra->ChecAlreadyExit($_item_id, $_packing_id, $_create_by);


    if ($alreadyExit == 1) {
        $response['SUCCESS'] = 2;
    } else {
        


        $qnty_in_subunit        = $_opening_stock_bottle_as_bottle;
        $qnty_in_unit           = $__Stock_Fectory->getUnitStock($__Brand__Packing->getBottles_per_case(), $qnty_in_subunit);

        $_packing_size = $__Brand__Packing->getMl_per_case();

        $_total_case        = $qnty_in_unit;
        $_total_bottle      = $qnty_in_subunit;
        $_total_bl          = ($__Brand__Packing->getMl_per_case() * $qnty_in_subunit) / 1000;
        $_total_lpl         = $qnty_in_subunit * $__Brand__Packing->getLpl_per_bottle();
        $_total_cost        = $__Brand__Packing->getW_cost_price_per_bottle() * $qnty_in_subunit;
        $_total_adv         = $__Brand__Packing->getAvd_amount_per_bottle() * $qnty_in_subunit;
        $_total_fee         = $__Brand__Packing->getTff_per_bottle() * $qnty_in_subunit;
        $_total_vat         = $__Brand__Packing->getVat_per_bottle() * $qnty_in_subunit;
        $_total_mrp         = $__Brand__Packing->getMrp_per_bottle() * $qnty_in_subunit;
        $_total_amount      = $_total_cost + $_total_adv+$_total_fee+$_total_vat;

        $_tcs               = ($_total_amount /100) * 1;



        $__Transfar_Item->setMaster_id(0);
        $__Transfar_Item->setItem_id($_item_id);
        $__Transfar_Item->setPacking_id($_packing_id);
        //$__Transfar_Item->setUser_item_id($_user_item_id);
        $__Transfar_Item->setUnit($_unit);
        $__Transfar_Item->setPacking_size($_packing_size);
        $__Transfar_Item->setTotal_case($_total_case);
        $__Transfar_Item->setTotal_bottle($_total_bottle);
        $__Transfar_Item->setTotal_bl($_total_bl);
        $__Transfar_Item->setTotal_lpl($_total_lpl);
        $__Transfar_Item->setTotal_cost($_total_cost);
        $__Transfar_Item->setTotal_adv($_total_adv);
        $__Transfar_Item->setTotal_fee($_total_fee);
        $__Transfar_Item->setTotal_vat($_total_vat);
        $__Transfar_Item->setTcs($_tcs);
        $__Transfar_Item->setTotal_mrp($_total_mrp);
        $__Transfar_Item->setTotal_amount($_total_amount);
        $__Transfar_Item->setIoType("OS");
        $__Transfar_Item->setLongdate(time());
        $__Transfar_Item->setStatus(5);
        $__Transfar_Item->setCreateBy($userId);



        if ($__bra->Insert() == 1) {
            
            
            $__Transfar_Item->setUser_item_id($__bra->getId());
            
            if($__Transfar_Item->Insert()==1){$response['SUCCESS'] = 1;}
        }
    }
    echo json_encode($response);
    exit();


