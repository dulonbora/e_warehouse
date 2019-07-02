<?php
error_reporting(E_ALL);

ob_start();
if (session_status() == PHP_SESSION_NONE) {session_start();}
$userId = $_SESSION['excise_user_id'] == NULL ? 0 : $_SESSION['excise_user_id'];

include '../classes/Company.php';
include '../classes/Global_Functions.php';

$__com = new Company();
$__glo = new Global_Functions();


if(isset($_FILES['IMAGE_LINK'])){
$file_name=$_FILES["IMAGE_LINK"]["name"];
$temp_name=$_FILES["IMAGE_LINK"]["tmp_name"];
$imgtype=$_FILES["IMAGE_LINK"]["type"];
$ext= GetImageExtension($imgtype);
$imagename = time().$ext;
$target_path = "../images/".$imagename;
if(move_uploaded_file($temp_name, $target_path)) {
    
$new_name = $target_path;
    echo $new_name;

$ok = $__com->Check_If_Exists($userId);
$__com->setCompany_logo($new_name);
$__com->UpdateImage($ok);
$__glo->pageRedirect("../home/company.php");

}
}




function GetImageExtension($imagetype)
   	 {
       if(empty($imagetype)) return false;
       switch($imagetype)
       {
           case 'image/bmp': return '.bmp';
           case 'image/gif': return '.gif';
           case 'image/jpeg': return '.jpg';
           case 'image/png': return '.png';
           default: return false;
       }
     }
