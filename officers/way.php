<?php
    //error_reporting(0);
    ob_start();

    include '../classes/Global_Functions.php';
    $Global_Functions = new Global_Functions();
    
    include '../classes/Company.php';
    $Company = new Company();
    if (session_status() == PHP_SESSION_NONE) {session_start();}
    
    $i                              = filter_input(INPUT_GET , 'i');
    
    $excise_users_id                = base64_decode($i);
    $_SESSION['excise_user_id']     = $excise_users_id;
    echo $excise_users_id;
    $id = $Company->Check_If_Exists($excise_users_id);
    if($id > 0){
        if($Company->LoadValue($id)==1){
            $_SESSION['id'] = $id;
            $Global_Functions->pageRedirect("../officers/index.php");
        }
    }
    else {
        $Global_Functions->pageRedirect("../officers/index.php");        
    }
    
    
