
<?php
include '../global_html/AHeader.php';
include '../classes/Menu.php';
include '../classes/UI.php';
include '../classes/NavBar.php';
include '../classes/Ac_Voucher.php';
include '../classes/Company.php';

$menu = new Menu();
$UI = new UI;
$N = new NavBar;

$_id = filter_input(INPUT_GET , "i");

$Company            = new Company();
$Ac_Voucher         = new Ac_Voucher();
$Ac_Voucher->LoadValue($_id);

?>
<body class="">

    <section class="vbox">
        <?php echo $UI->Work("CONSIGNMENT"); ?>
        <section>
            <section class="hbox stretch">
                <!-- .aside -->
                <?php echo $N->Accounts(); ?>
                <!-- /.aside -->
                <section id="content">
                    <section class="vbox">
                        <section class="scrollable wrapper">
                            <div class="container-fluid">
                                
                                
                          

                                <div class="row">
                                    
                                                              
                                    <div class="col-lg-12">
                                                                <ul class="breadcrumb"> 
                                <li><a href="../home/"><i class="fa fa-home"></i> Home</a></li>
                                <li><a href="../consignment/consignment_list.php?s="><i class="fa fa-list-ul"></i> Consignment List</a></li>
                            </ul>      
                                    
                                    </div>

                                    <div class="col-lg-12">
                                        <section class="panel panel-default">
                                            <header class="panel-heading">Consignment Detrails
                                                <?php if($Ac_Voucher->getStatus()==1 && $Ac_Voucher->getVoucher_type()=="PAYMENT"){ 
                                                    
                                                    ?>
                                                
                                                <a class="btn btn-success btn-rounded btn-xs pull-right" href="../consignment/invoice.php?i=<?php echo $Ac_Voucher->getVoucher_id();?>">Pay Now</a>
                                                    <?php }?>

                                            </header>     
                                            
                                            
                                            <section class="panel panel-default">
                                                <header class="panel-heading bg-light no-border">
                                                    <div class="clearfix">
                                                         <div class="clear">
                                                            <div class="h3 m-t-xs m-b-xs">
                                                                VOUCHER NO : <?php echo $Ac_Voucher->getId();?>
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
                                                        FROM USER NAME : <?php echo $Company->returnCompanyName($Ac_Voucher->getCr_ledger_id());?>
                                                    </a>
                                                    
                                                </div> 
                                                
                                                <div class="list-group no-radius alt">
                                                    <a class="list-group-item">
                                                        TOO USER NAME : <?php echo $Company->returnCompanyName($Ac_Voucher->getDr_ledger_id());?>
                                                    </a>
                                                    
                                                </div>
                                                
                                                
                                    
                                                
                                                <div class="list-group no-radius alt">
                                                    <a class="list-group-item active">
                                                        DETAILS
                                                    </a>
                                                </div>
                                                
                                                
                                                
                                                <div class="list-group no-radius alt">
                                                    <a class="list-group-item">
                                                        BANK NAME : <?php echo $Ac_Voucher->getBank_name();?>
                                                    </a>
                                                </div>
                                                
                                                <div class="list-group no-radius alt">
                                                    <a class="list-group-item">
                                                        FY YEAR : <?php echo $Ac_Voucher->getFyear();?>
                                                    </a>
                                                </div>
                                                
                                                <div class="list-group no-radius alt">
                                                    <a class="list-group-item">
                                                        MODE : <?php echo $Ac_Voucher->getMode();?>
                                                    </a>
                                                </div>
                                                
                                                <div class="list-group no-radius alt">
                                                    <a class="list-group-item">
                                                        REFERANCE NO : <?php echo $Ac_Voucher->getRef_no();?>
                                                    </a>
                                                </div>
                                                
                                                <div class="list-group no-radius alt">
                                                    <a class="list-group-item">
                                                        REFERANCE DATE : <?php echo $Ac_Voucher->getRef_date();?>
                                                    </a>
                                                </div>
                                                
                                                <div class="list-group no-radius alt">
                                                    <a class="list-group-item">
                                                        REFERANCE TYPE : <?php echo $Ac_Voucher->getRef_type();?>
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
<script src="consignment_detail.js"></script>
</body>

</html>