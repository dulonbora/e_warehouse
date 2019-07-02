
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
                                                        FROM USER NAME : <?php echo $Company->returnCompanyName($Transfar_Master->getUser_from());?>
                                                    </a>
                                                    
                                                </div> 
                                                
                                                <div class="list-group no-radius alt">
                                                    <a class="list-group-item">
                                                        TOO USER NAME : <?php echo $Company->returnCompanyName($Transfar_Master->getUser_to());?>
                                                    </a>
                                                    
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
                                                    <a class="list-group-item">
                                                        TOTAL TCS : <?php echo $Transfar_Master->getTotal_tcs();?>
                                                    </a>
                                                </div>
                                                
                                                <div class="list-group no-radius alt">
                                                    <a class="list-group-item">
                                                        TOTAL AMOUNT : <?php echo $Transfar_Master->getGrand_total();?>
                                                    </a>
                                                </div>
                                                
                                                            
                                                <div class="list-group no-radius alt">
                                                    <a class="list-group-item active">
                                                        CONVERT
                                                    </a>
                                                </div>
                                                
                                                <div class="list-group no-radius alt">
                                                    <a class="list-group-item">
                                                        <a href="../consignment_ajax_request/consignment_executor.php?i=<?php echo $Transfar_Master->getId();?>" class="btn btn-success btn-sm">Excute</a>
                                                    </a>
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
<script src="executed_consignmen.js"></script>
</body>

</html>