<?php 
error_reporting(0);

ob_start();
if (session_status() == PHP_SESSION_NONE) {session_start();}
$userId = $_SESSION['id'] == NULL ? 0 : $_SESSION['id'];

?>




<aside class="bg-dark lter aside hidden-print" id="nav"> 
    <section class="vbox"> 
        <section class="w-f-md scrollable">
            
            <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 542px;">
                <div class="slim-scroll" data-height="auto" data-disable-fade-out="true" data-distance="0" data-size="10px" data-railopacity="0.2" style="overflow: hidden; width: auto; height: 542px;"> 
                
                    <nav class="nav-dark"> 
                    <ul class="nav bg clearfix"> 
         
                        <li> <a href="../sale_details/create_consignment.php" id="LABEL"> <i class="fa  icon-pencil  text-danger "></i> 
                                <span>Create New</span> </a> </li>
         
                                <li> <a href="../sale_details/import_excel.php" id="LABEL"> <i class="fa  icon-pencil  text-danger "></i> 
                                <span>Create New [Excel]</span> </a> </li>
                                
         
                        <li> <a href="../sale_details/create_consignment.php" id="LABEL"> <i class="fa  icon-pencil  text-danger "></i> 
                                <span>Create New [json]</span> </a> </li>
                                
                                <li> <a href="../sale_details/consignment_list.php?s=1" id="LABEL"> <i class="fa icon-notebook  text-danger "></i> 
                                <span>Pending</span> </a> </li>
                                
                                
                                <li> <a href="../sale_details/consignment_list.php?s=2" id="LABEL"> <i class="fa fa-building-o  text-danger "></i> 
                                <span>Confirmed</span> </a> </li>
                                
                                <li> <a href="../sale_details/consignment_list.php?s=7" id="LABEL"> <i class="fa fa-unlink  text-danger"></i> 
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