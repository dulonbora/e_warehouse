<?php 
error_reporting(0);

ob_start();
if (session_status() == PHP_SESSION_NONE) {session_start();}
$userId = $_SESSION['id'] == NULL ? 0 : $_SESSION['id'];

require_once('../classes/Company.php');
$_Company = new Company();

$_Company->LoadValue($userId);


$type = "";
if($_Company->getCompany_type()=='WHS'){
    $type = 'MNF';
}
if($_Company->getCompany_type()=='RTL'){
    $type = 'WHS';
}
if($_Company->getCompany_type()=='MNF'){
    $type = 'DIS';
}
?>




<aside class="bg-dark lter aside hidden-print" id="nav"> 
    <section class="vbox"> 
        <section class="w-f-md scrollable">
            
            <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 542px;">
                <div class="slim-scroll" data-height="auto" data-disable-fade-out="true" data-distance="0" data-size="10px" data-railopacity="0.2" style="overflow: hidden; width: auto; height: 542px;"> 
                
                    <nav class="nav-dark hidden-xs"> 
                    <ul class="nav bg clearfix"> 
         
                        <li> <a href="consignor_list.php?i=<?php echo $type;?>" id="LABEL"> <i class="fa  icon-pencil  text-danger "></i> 
                                <span>Create New</span> </a> </li>
                                
                                <li> <a href="../consignment/consignment_list.php?s=1" id="LABEL"> <i class="fa icon-notebook  text-danger "></i> 
                                <span>Active</span> </a> </li>
                                
                                
                                <li> <a href="../consignment/consignment_list.php?s=2" id="LABEL"> <i class="fa fa-building-o  text-danger "></i> 
                                <span>Confirmed</span> </a> </li>
                                
                                
                                <li> <a href="../consignment/consignment_list.php?s=3" id="LABEL"> <i class="fa icon-envelope  text-danger "></i> 
                                <span>Order Pending</span> </a> </li>
                                
                                
                                <li> <a href="../consignment/consignment_list.php?s=4" id="LABEL"> <i class="fa icon-envelope-open text-danger "></i> 
                                <span>Order Confirmed</span> </a> </li>
                                
                                
                                <li> <a href="../consignment/consignment_list.php?s=5" id="LABEL"> <i class="fa icon-envelope-letter text-danger "></i> 
                                <span>Invoice Generated</span> </a> </li>
                                
                                
                                
                                <li> <a href="../consignment/consignment_list.php?s=6" id="LABEL"> <i class="fa fa-truck  text-danger"></i> 
                                <span>Dispatched</span> </a> </li>
                                
                                
                                
                                <li> <a href="../consignment/consignment_list.php?s=7" id="LABEL"> <i class="fa fa-unlink  text-danger"></i> 
                                <span>Excuted</span> </a> </li>
                                

                                
                                <li> <a href="../home/index.php" id="LABEL"> <i class="fa  fa-home  text-danger "></i> 
                                <span>Home</span> </a> </li>
                                
                        <li class="m-b hidden-nav-xs"></li>
                    </ul>
                    
                    
                    
                </nav> 
            </div>
                                    
            </div> 
        </section> 
    </section> </aside>