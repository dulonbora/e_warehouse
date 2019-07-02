
<?php
include '../global_html/AHeader.php';
include '../classes/Menu.php';
include '../classes/UI.php';
include '../classes/NavBar.php';
include '../classes/Mix__Item__List__View.php';
include '../classes/Stock_Fectory.php';

$stock                       = new Stock_Fectory();
$menu                       = new Menu();
$UI                         = new UI;
$N                          = new NavBar;
$Mix__Item__List__View      = new Mix__Item__List__View();

$_id = filter_input(INPUT_GET, 'i');
$Mix__Item__List__View->LoadValue($_id);


?>
<body class="">

    <section class="vbox">
        <?php echo $UI->Work(""); ?>
        <section>
            <section class="hbox stretch">
                <!-- .aside -->
                <?php echo $N->SideBarForMixItem(); ?>
                <!-- /.aside -->
                <section id="content">
                    <section class="vbox">
                        <section class="scrollable wrapper">
                            <div class="container-fluid">

                                <div class="row">
                                    
                                                                                                                                    <div class="col-lg-12">
<ul class="breadcrumb"> 
    <li><a href="../home/"><i class="fa fa-home"></i> Home</a></li>
    <li><a href="../mix/index.php"><i class="fa fa-list-ul"></i> Mix Item List</a></li>
    <li><a><i class="fa fa-list-ul"></i> <?php echo $Mix__Item__List__View->getItemName();?> Details</a></li>
</ul>                              
                             
                         </div>


                                    <div class="col-lg-12">
                                        <section class="panel panel-default">
                                            <header class="panel-heading"> <?php echo $Mix__Item__List__View->getItemName();?> STOCK DETAILS
                                                <div class="btn-group pull-right"> 
                                                    <a class="btn btn-sm btn-success btn-xs btn-block btn-rounded addNewTranction" id="<?php echo $_id;?>">Add New Transection</a> 
                                                </div>
                                            </header>     
                                            <div id="search_html" class="row wrapper">

                                            </div>


                                            <div class="table-responsive">
                                                <table class="table table-striped b-t b-light">
                                                    <thead>
                                                        <tr>
                                                            <th class="th-sortable" data-toggle="class">Date</th>
                                                            <th>Mode</th>
                                                            <th>Status</th>
                                                            <th>Transfar To</th>
                                                            <th>I/O</th>
                                                            <th>Qnty</th>
                                                            <th>Update Status</th>
                                                            <th>View Details</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="TableBodyIndex">
                                                    </tbody>
                                                </table>
                                            </div>
                                            <footer class="panel-footer">
                                                <div class="row">
                                                    <div class="col-sm-12 text-center-xs">
                                                        <ul class="pagination pagination-sm m-t-none m-b-none">
                                                            <li class="pull-left"><a href="#"><i class="fa fa-chevron-left"></i> Next </a></li>
                                                            <li><a href="#">1</a></li>
                                                            <li class="pull-right"><a href="#"> Previous <i class="fa fa-chevron-right"></i></a></li>
                                                        </ul>
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
  echo "var user_item_id = '{$_id}';";
?>
</script>
<script src="transection.js"></script>
</body>

</html>