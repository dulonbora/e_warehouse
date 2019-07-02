    <?php

    error_reporting(0);
    ob_start();
    if (session_status() == PHP_SESSION_NONE) {session_start();}
    $userId = $_SESSION['id'] == NULL ? 0 : $_SESSION['id'];

    include_once '../classes/Transfar_Item.php';
    include_once '../classes/Brand__Packing.php';
    include_once '../classes/Brand__List__User_View.php';
    include_once '../classes/Transfar_Master_Updater.php';
    include_once '../classes/Stock_Fectory.php';
    include_once '../classes/Brand__List.php';

    $response = array();
    $response['SUCCESS'] = 0;

    $__Brand__List          = new Brand__List();
    $__Brand__Packing       = new Brand__Packing();
    $__Stock_Fectory        = new Stock_Fectory();
    $__tra                  = new Transfar_Item();
    $__brand                = new Brand__List__User_View();
    $__traMasterUpdate      = new Transfar_Master_Updater();


    $_master_id             = 0;
    $_user_item_id          = filter_input(INPUT_POST, 'USER_ITEM_ID');
    $_io                    = filter_input(INPUT_POST, 'IO_TYPE');
    
    $__brand->LoadValue($_user_item_id);
    $__Brand__List->LoadValue($_user_item_id);
    

    $_item_id               = $__brand->getItem_id();
    $_packing_id            = $__brand->getPacking_id();
    
    $__Brand__Packing->LoadValue($_packing_id);
    
    $_unit_stock = filter_input(INPUT_POST, 'IN_UNIT');
    $_unit = filter_input(INPUT_POST, 'IN_SUBUNIT');

    $qnty_in_subunit        = ($__brand->getBottles_per_case() * $_unit_stock) + $_unit;
    $qnty_in_unit           = $__Stock_Fectory->getUnitStock($__brand->getBottles_per_case(), $qnty_in_subunit);
    $currentStockSubUnit    = 0;
    
    $_packing_size = $__brand->getMl_per_case();
    
    $_total_case        = $qnty_in_unit;
    $_total_bottle      = $qnty_in_subunit;
    $_total_bl          = ($__brand->getMl_per_case() * $qnty_in_subunit) / 1000;
    $_total_lpl         = $qnty_in_subunit * $__Brand__Packing->getLpl_per_bottle();
    $_total_cost        = $__Brand__Packing->getW_cost_price_per_bottle() * $qnty_in_subunit;
    $_total_adv         = $__Brand__Packing->getAvd_amount_per_bottle() * $qnty_in_subunit;
    $_total_fee         = $__Brand__Packing->getTff_per_bottle() * $qnty_in_subunit;
    $_total_vat         = $__Brand__Packing->getVat_per_bottle() * $qnty_in_subunit;
    $_total_mrp         = $__Brand__Packing->getMrp_per_bottle() * $qnty_in_subunit;
    $_total_amount      = $_total_cost + $_total_adv+$_total_fee+$_total_vat;
    
    $_tcs               = ($_total_amount /100) * 1;



    $__tra->setMaster_id($_master_id);
    $__tra->setItem_id($_item_id);
    $__tra->setPacking_id($_packing_id);
    $__tra->setUser_item_id($_user_item_id);
    $__tra->setUnit($_unit);
    $__tra->setPacking_size($_packing_size);
    $__tra->setTotal_case($_total_case);
    $__tra->setTotal_bottle($_total_bottle);
    $__tra->setTotal_bl($_total_bl);
    $__tra->setTotal_lpl($_total_lpl);
    $__tra->setTotal_cost($_total_cost);
    $__tra->setTotal_adv($_total_adv);
    $__tra->setTotal_fee($_total_fee);
    $__tra->setTotal_vat($_total_vat);
    $__tra->setTcs($_tcs);
    $__tra->setTotal_mrp($_total_mrp);
    $__tra->setTotal_amount($_total_amount);
    $__tra->setIoType($_io);
    $__tra->setLongdate(time());
    $__tra->setCreateBy($userId);

    if ($__tra->Insert() == 1) {
        
        if($__Brand__List->UpdateStock($_user_item_id, $qnty_in_subunit, $_io)==1){
                    $response['SUCCESS'] = 1;

        }  
        
    }

    echo json_encode($response);
    exit();

