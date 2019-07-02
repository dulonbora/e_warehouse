<?php
include '../global_html/AHeader.php';
include '../classes/Menu.php';
include '../classes/UI.php';
include '../classes/NavBar.php';
include '../classes/Transfar_Master.php';
include '../classes/Company.php';
include '../classes/Company_Loader.php'; 
include '../classes/Transport_Route.php'; 


$menu               = new Menu();
$UI                 = new UI();
$N                  = new NavBar();
$Company            = new Company();
$Transfar_Master    = new Transfar_Master();
$Company_Loader     = new Company_Loader();
$Transport_Route    = new Transport_Route();

$_id = filter_input(INPUT_GET , "i");
$Transfar_Master->LoadValue($_id);
$consignee_name             = $Company_Loader->returnCompanyNmae($Transfar_Master->getUser_to());
$consignee_excise_id        = $Company_Loader->returnExciseId($Transfar_Master->getUser_to());
$consignor_name             = $Company_Loader->returnCompanyNmae($Transfar_Master->getUser_from());
$consignor_excise_id        = $Company_Loader->returnExciseId($Transfar_Master->getUser_from());
$route = $Transport_Route->returnRoute($Transfar_Master->getUser_to(), $Transfar_Master->getUser_from());

?>
<body class="">

    <section class="vbox">
        <?php echo $UI->Work("CONSIGNMENT"); ?>
        <section>
            <section class="hbox stretch">
                <!-- .aside -->
                <?php echo $N->Consignment(); ?>
                <!-- /.aside -->
                <section id="content">
                    <section class="vbox">
                        <section class="scrollable wrapper">
                            <div class="container-fluid">
                         
                                <div class="row">
                                    <div class="col-lg-12">
                                     <ul class="breadcrumb"> 
                                <li><a href="../home/"><i class="fa fa-home"></i> Home</a></li>
                                <li><a href=""><i class="fa fa-list-ul"></i> Apply Permit</a></li>
                            </ul>      
                                    
                                    </div>

                                    <div class="col-lg-12">
                                        <section class="panel panel-default">
                                            <header class="panel-heading">Consignment Detrails
                                                
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
                                                        TOTAL VAT : <?php echo $Transfar_Master->getVat_amount();?>
                                                    </a>
                                                </div>
                                                
                                                            
                                                <div class="list-group no-radius alt">
                                                    <a class="list-group-item active">
                                                        ITEM DETAILS <button class="btn btn-success btn-xs pull-right">CSV</button>
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
                            
                            
                            <div class="container-fluid">
                      
                     <div class="row">
                        <div class="col-lg-12">
                           
                            
                            
                           <section class="panel panel-default">
                              <header class="panel-heading">Permit Application</header>
                              
                              <div id="search_html" class="row wrapper">
                                 
                              </div>
                              
                              <div class="row wrapper">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <h4 class="m-t-none">Apply Permit
                        <span class="pull-right text-danger" id="MassageLabel"></span></h4> 
                </div>
    <form action=""  method="post" id="fBrand" role="form">
        <input type="hidden" name="CONSIGNMENT_NO" id="id" value="<?php echo $_id;?>">
        
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="form-group">
                    <label>Permit Type</label>
                    <input type="text" name="NAME" value="TRANSPORT" id="PERMIT_TYPE" placeholder="Permit Type" class="input-sm form-control" required>
                </div>
                </div>
        
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                <div class="form-group">
                    <label>Consignee Name</label>
                    <input type="text" name="CONSIGNEE_NAME" value="<?php echo $consignee_name;?>" id="NAME" placeholder="Consignee Name" class="input-sm form-control" required>
                    <input type="hidden" name="CONSIGNEE_ID" value="<?php echo $consignee_excise_id;?>" id="NAME" placeholder="Consignee Name" class="input-sm form-control" required>
                </div>
                </div>
        
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                <div class="form-group">
                    <label>Consignor Name</label>
                    <input type="text" name="CONSIGNOR_NAME" value="<?php echo $consignor_name;?>" id="NAME" placeholder="Consignor Name" class="input-sm form-control" required>
                    <input type="hidden" name="CONSIGNOR_ID" value="<?php echo $consignor_excise_id;?>" id="NAME" placeholder="Consignor Name" class="input-sm form-control" required>
                </div>
                </div>
        
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="form-group">
                    <label>Transport Route</label>
                    <input type="text" name="TRANSPORT_ROUTE" value="<?php echo $route;?>" id="NAME" placeholder="Transport Route" class="input-sm form-control" required>
                </div>
                </div>
        
        <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
            <div class="form-group">
                <input type="button" id="adduser" value="Apply Permit" class="btn btn-primary">
            </div> 
        </div> 
    </form> </div>
                              <footer class="panel-footer">

                              </footer>
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
<script src="../consignment/consignment_detail.js"></script>
</body>

</html>