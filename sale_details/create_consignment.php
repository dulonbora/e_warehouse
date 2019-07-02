
<?php
include '../global_html/AHeader.php';
include '../classes/Menu.php';
include '../classes/UI.php';
include '../classes/NavBar.php';
include '../classes/Company.php';

$menu           = new Menu();
$UI             = new UI();
$N              = new NavBar();
$Company        = new Company();


$id = $_SESSION['id'];

$Company->loadValue($id);
$_id = $Company->getId();
?>
<body class="">

    <section class="vbox">
        <?php echo $UI->Work("CREATE"); ?>
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
                                <li><a href="../consignment/index.php"><i class="fa fa-list-ul"></i> Consignment List</a></li>
                                <li><a href="../consignment/consignor_list.php"><i class="fa fa-list-ul"></i> Consignor List</a></li>
                                <li><a href="../consignment/create_consignment.php"><i class="fa fa-list-ul"></i> Create Consignment</a></li>
                            </ul>      
                                    
                                    </div>
                                    <div class="col-lg-7">
                                        
                                        
                                        
                                        <section class="panel panel-info">
                                            <header class="panel-heading">Select Consignment Type <span id="consignment_no" class="pull-right text-center text-danger"></span><span class="pull-right">CONSIGNMENT NO : </span></header>
                                            <div class="row" style="margin-top: 15px; margin-right: 10px; margin-left: 10px; " id="">
                                                    <form action=""  method="post" id="BrandListForm" role="form">
                                                        
                                                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                                            <div class="form-group">
                                                                <label for="CONSIGNMENT_TYPE">Select Date</label>
                                                                <input type="date" style="padding: 5px;" id="Date" class="input-sm form-control" placeholder="Search">
                                                            </div>
                                                        </div>
                                                        
                                                        <div id="CTypeTest" class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                                            <div class="form-group">
                                                                <label for="CONSIGNMENT_TYPE">Select Type</label>
                                                                <select name="CONSIGNMENT_TYPE" id="CONSIGNMENT_TYPE" class="form-control">
                                                                    <option class="form-control" value='0'>SELECT</option>
                                                                    <option class="form-control" value='10'>SALE</option>
                                                                </select>
                                                            </div>
                                                        </div>
 
                                                        
 
                                                    </form>
                                                </div>
                                        </section>
                                        
                                        
                                        
                                        
                                        <section class="panel panel-default">
                                            <header class="panel-heading"><span class="hide" id="consignee_user_id"><?php echo $Company->getId();?></span><?php echo $Company->getCompany_name();?>'s BRAND LIST </header>

                                            <div id="search_html" class="row wrapper">

                                            </div>

                                            <div class="table-responsive">
                                                <table class="table table-striped b-t b-light">
                                                    <thead>
                                                        <tr>
                                                            <th class="th-sortable" data-toggle="class">Item Name</th>
                                                            <th>SIZE</th>
                                                            <th>MRP</th>
                                                            <th class="text-right">STOCK</th>
                                                            <th class="text-center">Add To My List</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="TableBodyConsignotItemTable">
                                                    </tbody>
                                                </table>
                                            </div>
                                        </section>
                                    </div>

                                    <div class="col-lg-5">

                                        

                                        <section class="panel panel-default">
                                            <header class="panel-heading">MY CONSIGNMENT ITEM LIST <button id="ViewFullConsignment" class="btn btn-xs btn-success pull-right">Check Full Consignment</button></header>


                                            <div class="table-responsive">
                                                <table class="table table-striped b-t b-light">
                                                    <thead>
                                                        <tr>
                                                            <th class="th-sortable" data-toggle="class">Item Name</th>
                                                            <th class="text-center">Size</th>
                                                            <th class="text-right">Qnty</th>
                                                            <th class="text-center">Remove</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="TableConsignmentBody">
                                                    </tbody>
                                                </table>
                                            </div>
                                        </section>
                                    </div>

                                </div>
                            </div>
                            <div id="myModalBig" class="modal fade" role="dialog">
                                <div class="modal-dialog bigMOdel">
                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <div id="statusresult">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div id="myModal" class="modal fade" role="dialog">
                                <div class="modal-dialog">
                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <div id="statusresult1">
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
      echo "var userId = '{$userId}';";
      echo "var oid = '{$_id}';";

    ?>
</script>
<script src="create_consignmen.js"></script>
</body>

</html>