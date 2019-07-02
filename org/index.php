<?php
ob_start();
include 'include/header.php';
include 'classes/Images.php';
include 'classes/Staff.php';
$image = new Images();
//$staff = new Staff();
?>
<head><title><?php echo $setting->getSITE_NAME();?></title></head>
<div role='main' class='main'>
			<?php $image->LoadSliderS();?>
		        
<?php echo $menu->LoadPostIndex("Our Featured Blogs", 5, 3);?>
<?php echo $menu->LoadPostIndexM("Our Featured News", 5, 2);?>
        
<?php echo $menu->LoadPostIndex2("Our Featured Event", 5, 3);?>
<?php echo $menu->LoadPostIndexM2("Our Featured Event", 5, 2);?>
        
<?php echo $menu->LoadPostIndex3("Our Featured Blogs", 5, 3);?>
<?php echo $menu->LoadPostIndex3M("Our Featured Blogs", 5, 2);?>

    <?php echo $image->LOadPhotoIndex();
    ?>
    <?php// echo $staff->SingleStaff(2);
    ?>
        </div>
<?php include './include/footer.php';?>