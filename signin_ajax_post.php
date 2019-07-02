<?php

if (!isset($_SESSION)) {session_start();}
    include './classes/users.php';
    $user = new users();
    
    
    $u                      = $_POST['AUTH'];
    $id                     = $_POST['PASS'];
    $_SESSION['id']         = $u;
    $_SESSION['user']       = $u;
    
    
    $u                      = "20";
    $id                     = "";
    $_SESSION['id']         = $u;
    $_SESSION['user']       = $u;
    
//   if($user->Login($u, $id) == 1){
    
       echo 'Loggin In SuccessFully';
       $user->pageRedirect("home/index.php");
       
//   }
// else {
//      echo 'You have Entered Wrong Details'; 
//    }     
    
    ?>