
<?php
include '../global_html/AHeader.php';
include '../classes/Menu.php';
include '../classes/UI.php';
include '../classes/NavBar.php';
include '../classes/Transfar_Master.php';

$menu = new Menu();
$UI = new UI;
$N = new NavBar;

$_id = filter_input(INPUT_GET , "i");

$Transfar_Master = new Transfar_Master();
$Transfar_Master->LoadValue($_id);

?>
<body class="">

    <section class="vbox">
        <?php echo $UI->Work(""); ?>
        <section>
            <section class="hbox stretch">
                <!-- .aside -->
                <?php echo $N->EnaConsignment(); ?>
                <!-- /.aside -->
                <section id="content">
                    <section class="vbox">
                        <section class="scrollable wrapper">
                            <div class="container-fluid">

                                <div class="row">

                                    <div class="col-lg-12">
                                        <section class="panel panel-default">
                                            <header class="panel-heading">Consignment List
                                                
                                                <?php if($Transfar_Master->getStatus()==6){ ?>
                                                <a href="executed_consignment.php?i=<?php echo $_id;?>" class="btn btn-xs btn-success pull-right">Executed This Consignment</a>
                                                <?php }?>
                                            </header>     
                                            <div class="row wrapper">
                                                <div class="col-lg-12">
                                                STATUS : <?php echo $Transfar_Master->StatusForOrder($Transfar_Master->getStatus());?>
                                                </div>

                                            </div>
                                            <div id="search_html" class="row wrapper">

                                            </div>


                                            <div class="table-responsive">
                                                <table class="table table-striped b-t b-light">
                                                    <thead>
                                                        <tr>
                                                            <th class="th-sortable" data-toggle="class">ITEM NAME</th>
                                                            <th>SIZE</th>
                                                            <th>BATCH NO</th>
                                                            <th>QNTY</th>
                                                            <th>Total Cost</th>
                                                            <th>Total ADV</th>
                                                            <th>Total Fee</th>
                                                            <th>Total Tcs</th>
                                                            <th>Total Mrp</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="TableBodyForFullItemList">
                                                        
                                                    </tbody>
                                                </table>
                                            </div>
                                            
                                            <footer class="panel-footer">
                                                <div class="row">
                                                    <div class="col-sm-12 text-center-xs">
                                                        
                                                        
                                                        <?php if($Transfar_Master->getCreate_by()==$userId){ ?>
                                                        <?php if($Transfar_Master->getStatus()==1){ ?>
                                                        <a href="../consignment_ajax_request/change_consignment_status.php?i=<?php echo $_id;?>" class="btn btn-success btn-sm pull-right">
                                                            Confirm This Consignment
                                                        </a>
                                                        <?php }?>
                                                        
                                                        <?php if($Transfar_Master->getStatus()==2){ ?>
                                                        <a href="../consignment_ajax_request/change_consignment_status.php?i=<?php echo $_id;?>" class="btn btn-success btn-sm pull-right">Send To Consignor</a>
                                                        <?php }?>
                                                        
                                                        <?php if($Transfar_Master->getStatus()==3){ ?>
                                                        <a href="../consignment_ajax_request/change_consignment_status.php?i=<?php echo $_id;?>" class="btn btn-success btn-sm pull-right">Send To Consignor</a>
                                                        <?php }?>
                                                        <?php }?>
                                                        
                                                    </div>
                                                </div>
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
            <aside class="aside-lg bg-light b-r" id="addmenuview"> 
            </aside>
        </section>
    </section>
    <!-- Javascript -->
<script type="text/javascript">
<?php
  echo "consignment_no = '{$_id}';";
?>
</script>
<script src="index_brand_manager.js"></script>
</body>

</html>