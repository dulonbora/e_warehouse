<?php
include '../classes/Ena__Transfar.php';
$_Ena__Transfar = new Ena__Transfar();

include '../classes/Ena__Item__List.php';
$_Ena__Item__List = new Ena__Item__List();

include '../classes/DateSetter.php';
$_DateSetter = new DateSetter();

$id = filter_input(INPUT_GET, 'i');

$_Ena__Transfar->LoadValue($id);
$_Ena__Item__List->LoadValue($_Ena__Transfar->getItem_id());

?>

<div class="row wrapper" id="">
    
<section class="panel panel-default">
            <header class="panel-heading bg-light"> 
             <span class="">Item Details                             <button class="btn btn-primary btn-xs pull-right">X</button></span> </header> 
                    <ul class="list-group">
                        <li class="list-group-item"> <span style="margin-right: 10px;" class="pull-right"><?php echo $_Ena__Item__List->getItem_name();?></span>  Item Name </li>
                        <li class="list-group-item"> <span style="margin-right: 10px;" class="pull-right"><?php echo $_Ena__Transfar->getUser_to();?></span>  User To </li>
                        <li class="list-group-item"> <span style="margin-right: 10px;" class="pull-right"><?php echo $_Ena__Transfar->getToo();?></span>  Too </li>
                        <li class="list-group-item"> <span style="margin-right: 10px;" class="pull-right"><?php echo $_Ena__Transfar->getMode();?></span>  Mode </li>
                        <li class="list-group-item"> <span style="margin-right: 10px;" class="pull-right"><?php echo $_DateSetter->date($_Ena__Transfar->getLongdate());?></span>  Date </li>
                        <li class="list-group-item"> <span style="margin-right: 10px;" class="pull-right"><?php echo $str = $_Ena__Transfar->getStatus() == 0 ? "PENDING" : "SUCCESS";?></span>  Status </li>
                        <li class="list-group-item"> <span style="margin-right: 10px;" class="pull-right"><?php echo $_Ena__Transfar->getBl();?> BL</span>  Qnty </li>
                        
                        
                    
                    </ul>
          
                
                
            </section>

</div>











