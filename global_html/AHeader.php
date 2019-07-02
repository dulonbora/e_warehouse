<?php
ob_start();
if (session_status() == PHP_SESSION_NONE) {session_start();}
$userId = $_SESSION['id'] == NULL ? 0 : $_SESSION['id'];
 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);


include '../classes/users.php';
$user = new users();

if($_SESSION['excise_user_id']==NULL){$user->pageRedirect("http://assamexcise.in");}
 else {
   // if($userId==0){$user->pageRedirect("http://assamexcise.in/wp/warehouse/home/");}
}
//$user->RestrictUser()
?>

<!DOCTYPE html>
<html lang="en" class="app">
<head>
    <meta charset="utf-8" />
    <title>Menu</title>
    <meta name="description" content="app, web app, responsive, admin dashboard, admin, flat, flat ui, ui kit, off screen nav" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <link rel="stylesheet" href="../css/app.v1.css" type="text/css" />
    <link rel="stylesheet" href="../css/big_model.css" type="text/css" />
    <script src="../js/jquery-1.11.3-jquery.min.js"></script>
    <script src="../bootstrap-3.3.7/dist/js/bootstrap.min.js"></script>
    <script src="../js/app.v1.js"></script>
    <script src="../js/app.plugin.js"></script>
    
</head>