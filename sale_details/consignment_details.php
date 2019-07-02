
<?php
include '../global_html/AHeader.php';
include '../classes/Menu.php';
include '../classes/UI.php';
include '../classes/NavBar.php';
include '../classes/Transfar_Master.php';
include '../classes/Company.php';

$menu = new Menu();
$UI = new UI;
$N = new NavBar;

$_id = filter_input(INPUT_GET , "i");

$Company            = new Company();
$Transfar_Master    = new Transfar_Master();
$Transfar_Master->LoadValue($_id);

?>
<body class="">

    <section class="vbox">
        <?php echo $UI->Work("CONSIGNMENT"); ?>
        <section>
            <section class="hbox stretch">
                <!-- .aside -->
                <?php echo $N->Sale_Details(); ?>
                <!-- /.aside -->
                <section id="content">
                    <section class="vbox">
                        <section class="scrollable wrapper">
                            <div class="container-fluid">
                                
                                
                          

                                <div class="row">
                                    
                                                              
                                    <div class="col-lg-12">
                                                                <ul class="breadcrumb"> 
                                <li><a href="../home/"><i class="fa fa-home"></i> Home</a></li>
                                <li><a href="../consignment/consignment_list.php?s=<?php echo $Transfar_Master->getStatus();?>"><i class="fa fa-list-ul"></i> <?php echo $Transfar_Master->Status($Transfar_Master->getStatus());?> Consignment List</a></li>
                                <li><a ><i class="fa fa-list-ul"></i> Consignment Details / No.<?php echo $Transfar_Master->getId();?></a></li>
                            </ul>      
                                    
                                    </div>

                                    <div class="col-lg-12">
                                        <section class="panel panel-default">
                                            <header class="panel-heading">Consignment Details
                                                
                                                
                                                <?php if($Transfar_Master->getCreate_by()==$userId){ ?>
                                                        <?php if($Transfar_Master->getStatus()==1){ ?>
                                                <a href="../sale_details_ajax/change_consignment_status.php?i=<?php echo $_id;?>" class="btn btn-success btn-rounded btn-xs pull-right">
                                                            Confirm This Consignment
                                                        </a>
                                                        <?php }?>
                                                        
                                                        <?php if($Transfar_Master->getStatus()==2){ ?>
                                                        <a href="../sale_details_ajax/consignment_executor.php?i=<?php echo $_id;?>" class="btn btn-danger btn-xs btn-rounded pull-right">Executed This Consignment</a>
                                                        <?php }?>
                                                        
                                                        <?php }?>
                                             
                                                        
                                            </header>     
                                            
                                            
                                            <section class="panel panel-default">
                                                <header class="panel-heading bg-light no-border">
                                                    <div class="clearfix">
                                                         <div class="clear">
                                                            <div class="h3 m-t-xs m-b-xs">
                                                                CONSIGNMENT NO : <?php echo $Transfar_Master->getId();?>
                                                            </div>
                                                        </div>
                                                        
                                                    </div>
                                                </header>
                                                
                                                <div class="list-group no-radius alt">
                                                    <a class="list-group-item active">
                                                        USER DETAILS
                                                    </a>
                                                    
                                                </div> 
                                                
                                                <div class="list-group no-radius alt">
                                                    <a class="list-group-item">
                                                        CONSIGNOR : <?php echo $Company->returnCompanyName($Transfar_Master->getUser_from());?>
                                                    </a>
                                                    
                                                </div> 
                                                
                                                <div class="list-group no-radius alt">
                                                    <a class="list-group-item">
                                                        CONSIGNEE : <?php echo $Company->returnCompanyName($Transfar_Master->getUser_to());?>
                                                    </a>
                                                    
                                                </div>
                                                
                                                <div class="list-group no-radius alt">
                                                    <li class="list-group-item">
                                                        STATUS : <span class="text-success"><?php echo $Transfar_Master->StatusForOrder($Transfar_Master->getStatus());?></span> 
                                                        <?php if($Transfar_Master->getStatus()==100){ ?>
                                                        <a href="invoice.php?i=<?php echo $_id;?>" class="btn btn-success btn-rounded btn-xs pull-right">View Invoice</a>
                                                        <?php }?>
                                                    </li>
                                                    
                                                </div>
                                    
                                                
                                                <div class="list-group no-radius alt">
                                                    <a class="list-group-item active">
                                                        AMOUNT DETAILS
                                                    </a>
                                                </div>
                                                
                                                <div class="list-group no-radius alt">
                                                    <a class="list-group-item">
                                                        TOTAL ITEMS : <?php echo $Transfar_Master->getItem_total();?>
                                                    </a>
                                                </div>
                                                
                                                <div class="list-group no-radius alt">
                                                    <a class="list-group-item">
                                                        TOTAL ADV : <?php echo $Transfar_Master->getAvd_amount();?>
                                                    </a>
                                                </div>
                                                
                                                <div class="list-group no-radius alt">
                                                    <a class="list-group-item">
                                                        TOTAL PASS : <?php echo $Transfar_Master->getPass_amount();?>
                                                    </a>
                                                </div>
                                                
                                                
                                                <div class="list-group no-radius alt">
                                                    <a class="list-group-item">
                                                        TOTAL AVT : <?php echo $Transfar_Master->getVat_amount();?>
                                                    </a>
                                                </div>
                                                
                                                            
                                                <div class="list-group no-radius alt">
                                                    <a class="list-group-item active">
                                                        ITEM DETAILS
                                                    </a>
                                                </div>
                                                
                                              <div class="table-responsive">
                                                <table class="table table-striped b-t b-light">
                                                    <thead>
                                                        <tr>
                                                            <th class="th-sortable" data-toggle="class">ITEM NAME</th>
                                                            <th class="text-center">SIZE</th>
                                                            <th class="text-left">QNTY</th>
                                                            <th class="text-left">BL</th>
                                                            <th class="text-left">LPL</th>
                                                            <th class="text-right">Total Mrp</th>
                                                            <th class="text-right">Total ADV</th>
                                                            <th class="text-right">Total Fee</th>
                                                            <th class="text-right">Total VAT</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="TableBodyForFullItemList">
                                                        
                                                    </tbody>
                                                </table>
                                            </div>
                                                
                                            </section>


                                            
                                        </section>
                                    </div>
                                </div>
                            </div>
                            <div id="myModalBig" class="modal fade" role="dialog">
                                <div class="modal-dialog">
                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <div id="statusresult">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </section>
                </section>
    </section>
    <!-- Javascript -->
<script type="text/javascript">
<?php
  echo "consignment_no = '{$_id}';";
?>
</script>
<script src="consignment_detail.js"></script>
</body>

</html>