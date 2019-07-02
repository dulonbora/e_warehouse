
<?php
include '../global_html/AHeader.php';
include '../classes/Menu.php';
include '../classes/UI.php';
include '../classes/NavBar.php';
include '../classes/Transfar_Master.php';
include '../classes/Company.php';
include '../classes/DateSetter.php';

$menu = new Menu();
$UI = new UI;
$N = new NavBar;
$_id = filter_input(INPUT_GET, "i");


$Transfar_Master = new Transfar_Master();
$Company = new Company();
$DateSetter = new DateSetter();

$Transfar_Master->LoadValue($_id);
$Company->LoadValue($Transfar_Master->getUser_from());

$FromName = $Company->getCompany_name();
$FromAddress = $Company->getAddress();
$FromCity = $Company->getCity();
$FromZip = $Company->getZip();
$FromState = $Company->getState();
$FromEmail = $Company->getEmail();
$FromPhone = $Company->getPhone_no();

$Company->LoadValue($Transfar_Master->getUser_to());

$TooName = $Company->getCompany_name();
$TooAddress = $Company->getAddress();
$TooCity = $Company->getCity();
$TooZip = $Company->getZip();
$TooState = $Company->getState();
$TooEmail = $Company->getEmail();
$TooPhone = $Company->getPhone_no();
?>
<body class="">

    <section class="vbox">
<?php echo $UI->Work(""); ?>
        <section>
              <section class="hbox stretch"> 
                <!-- .aside -->
<?php echo $N->Sale_Details(); ?>
                <!-- /.aside -->
                <section id="content">
                    <section class="vbox bg-white">
                        <header class="header bg-light lter hidden-print">
                            <a href="#" class="btn btn-xs btn-info btn-rounded pull-right" onclick="window.print();">Print</a> 
                            <a href="" class="btn btn-xs btn-success btn-rounded pull-right">Export Item List</a> 
                            <a href="consignment_details.php?i=<?php echo $_id;?>" class="btn btn-xs btn-success btn-rounded pull-right">Back To Consignment</a> 
                            <p>Invoice</p>
                        </header>

                        <section class="scrollable wrapper">
                            <div class="row">
                            <div class="col-lg-12">
                                
                                <ul class="breadcrumb hidden-print"> 
    <li><a href="../home/"><i class="fa fa-home"></i> Home</a></li>
    <li><a href="../consignment/consignment_list.php?s=<?php echo $Transfar_Master->getStatus();?>"><i class="fa fa-list-ul"></i> <?php echo $Transfar_Master->Status($Transfar_Master->getStatus());?> Consignment List</a></li>
    <li><a href="../consignment/consignment_details.php?i=<?php echo $Transfar_Master->getId();?>"><i class="fa fa-list-ul"></i> Consignment Details / No.<?php echo $Transfar_Master->getId();?></a></li>
    <li><a><i class="fa fa-list-ul"></i> Invoice</a></li>
                                </ul>  
</div>                             
                            <div class="col-lg-12">
                            <div class="thumb-lg"> <img src="../images/logo.png" class="img-circle" width="100px" height="100px" alt="..."> </div>
</div>                             
                                
                                
                                
                                <div class="col-xs-6">
                                    <h4><?php echo $FromName; ?></h4>
                                    <p><?php echo $FromAddress; ?><br><?php echo $FromCity . " " . $FromZip; ?><br> <?php echo $FromState; ?> </p>
                                    <p> Telephone: <?php echo $FromPhone; ?><br> Email: <?php echo $FromEmail; ?> </p>
                                </div>
                                <div class="col-xs-6 text-right">
                                    <p class="h4">#<?php echo $_id; ?></p>
                                    <h5><?php echo $DateSetter->date($Transfar_Master->getLongdate()); ?></h5>
                                </div>
                            </div>
                            <div class="well bg-light b m-t">
                                <div class="row">
                                    <div class="col-xs-6">
                                        <strong>SHIP TO:</strong> 
                                        <h4><?php echo $TooName; ?></h4>
                                        <p> <?php echo $TooAddress; ?><br> <?php echo $TooCity . " " . $TooZip; ?><br> <?php echo $TooState; ?><br> Phone: <?php echo $TooPhone; ?><br> Email: <?php echo $TooEmail; ?><br> </p>
                                    </div>
                                    <div class="col-xs-6">
                                        <strong>INVOICE DETAILS</strong> 
                                        <h4>INVOICE NO : 2017-18/1</h4>
                                        <p> 
                                            INVOICE DATE : 20/02/2018<br>
                                            ORDER NO : 12012/2018/3256<br>
                                            ORDER DATE : 20/02/2018<br>
                                            DELIVERY MODE : VEHICLE NO AS 20155<br>
                                            DELIVERY NOTE : WAY GOLAGHAT TO JORHAT
                                        </p>
                                    </div>
                                </div>
                            </div>
                            
                            <p class="m-t m-b">Order date: <strong><?php echo $DateSetter->date($Transfar_Master->getLongdate()); ?></strong><br> Order status: <span class="label bg-success">Shipped</span><br> Order ID: <strong>#<?php echo $_id; ?></strong> </p>
                            <div class="line"></div>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th style="width: 20px">SL. NO</th>
                                        <th>DESCRIPTION</th>
                                        <th style="width: 50px">PACKING</th>
                                        <th class="text-right" style="width: 50px">MRP</th>
                                        <th class="text-right" style="width: 150px">QNTY</th>
                                        <th class="text-right" style="width: 60px">BASIC</th>
                                    </tr>
                                </thead>
                                <tbody id="TableBodyForFullItemList">
                                    <tr>
                                        <td class="text-center">1</td>
                                        <td>RED LABEL RED LABEL RED LABEL RED LABEL</td>
                                        <td>750.12</td>
                                        <td class="text-right">1780</td>
                                        <td class="text-right">1 CASE</td>
                                        <td class="text-right">1000</td>
                                    </tr>


                                </tbody>
                                
                            </table>
                            <table class="table">
                                
                                <tr>
                                    <td colspan="6" class="text-right"><strong>Subtotal</strong></td>
                                    <td class="text-right"><?php echo $Transfar_Master->getCost_price();?></td>
                                </tr>
                                <tr>
                                    <td colspan="6" class="text-right no-border"><strong>Adv Lavy</strong></td>
                                    <td class="text-right"><?php echo $Transfar_Master->getAvd_amount();?></td>
                                </tr>
                                <tr>
                                    <td colspan="6" class="text-right no-border"><strong>Fee</strong></td>
                                    <td class="text-right"><?php echo $Transfar_Master->getPass_amount();?></td>
                                </tr>

                                <tr>
                                    <td colspan="6" class="text-right no-border"><strong>VAT Included in Total (16.25%)</strong></td>
                                    <td class="text-right"><?php echo $Transfar_Master->getVat_amount();?></td>
                                </tr>
                                <tr>
                                    <td colspan="6" class="text-right no-border"><strong>Tcs</strong></td>
                                    <td class="text-right"><?php echo $Transfar_Master->getTotal_tcs();?></td>
                                </tr>
                                <tr>
                                    <td colspan="6" class="text-right no-border"><strong>Total</strong></td>
                                    <td class="text-right"><strong><?php echo $Transfar_Master->getGrand_total();?></strong></td>
                                </tr>
                            </table>
                            
                            
                            
                            <header class="header bg-light lter hidden-print">
                            <a href="payment_process.php?i=<?php echo $_id;?>" class="btn btn-sm btn-success btn-rounded pull-right">Process to payment</a> 
                            <p>Pay Now</p>
                        </header>

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
    <script src="invoic.js"></script>
</body>

</html>