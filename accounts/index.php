
<?php
include '../global_html/AHeader.php';
include '../classes/Menu.php';
include '../classes/UI.php';
include '../classes/NavBar.php';
include '../classes/Transfar_Master.php';

$menu               = new Menu();
$UI                 = new UI();
$N                  = new NavBar();
$Transfar_Master    = new Transfar_Master();
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
                                <li><a ><i class="fa fa-list-ul"></i> Transactions List</a></li>
                            </ul>      
                                    
                                    </div>

                                    <div class="col-lg-12">
                                        <section class="panel panel-default">
                                            <header class="panel-heading"> Transactions List
                                            </header>     
                                            <div id="search_html" class="row wrapper">

                                            </div>

                                            <div class="table-responsive">
                                                <table class="table table-striped b-t b-light">
                                                    <thead>
                                                        <tr>
                                                            <th class="th-sortable" data-toggle="class">DATE</th>
                                                            <th>VOUCHER NO</th>
                                                            <th>VOUCHER TYPE</th>
                                                            <th>NOTE</th>
                                                            <th>STATUS</th>
                                                            <th class="text-right">AMOUNT</th>
                                                            <th>VIEW</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="TableBodyConsigmItemList">
                                                        
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
  echo "var userId = '{$userId}';";
  echo "var status = '{$_Status}';";
?>
</script>
<script src="main.js"></script>
</body>

</html>