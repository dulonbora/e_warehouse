
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
                                <li><a href="../sale_details/index.php"><i class="fa fa-list-ul"></i> Sale Details</a></li>
                                <li><a href="../sale_details/import_excel.php"><i class="fa fa-list-ul"></i> Import Day Sale</a></li>
                            </ul>      
                                    
                                    </div>
                                    <div class="col-lg-12">
                                        
                                        
                                        
                                        <section class="panel panel-info">
                                            <header class="panel-heading">Enter Require Details  <span id="consignment_no" class="pull-right text-center text-danger"></span><span class="pull-right">CONSIGNMENT NO : </span></header>
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
                                        
                                        
                                        
                                        
                                        
                                    </div>

                                    <div class="col-lg-12">

                                        

                                        <section class="panel panel-default"> <header class="panel-heading font-bold"> Import From Excel </header> <div class="panel-body"> <form class="form-inline" role="form"> <div class="form-group"> <label class="sr-only" for="exampleInputEmail2">file</label> <input type="file" class="form-control" id="exampleInputEmail2"> </div>  <button type="submit" class="btn btn-default pull-right">Upload CSV</button> </form> </div> </section>
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

<!---<script src="create_consignmen.js"></script> --->

</body>

</html>