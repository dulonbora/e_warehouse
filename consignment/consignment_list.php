
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
$_Status            = filter_input(INPUT_GET , "s");
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
                                <li><a href="../consignment/consignment_list.php?s=<?php echo $_Status;?>"><i class="fa fa-list-ul"></i> <?php echo $Transfar_Master->Status($_Status);?> Consignment List</a></li>
                            </ul>      
                                    
                                    </div>

                                    <div class="col-lg-12">
                                        <section class="panel panel-default">
                                            <header class="panel-heading"><?php echo $Transfar_Master->Status($_Status);?> Consignment List
                                            </header>     
                                            <div id="search_html" class="row wrapper">

                                            </div>

                                            <div class="table-responsive">
                                                <table class="table table-striped b-t b-light">
                                                    <thead>
                                                        <tr>
                                                            <th class="th-sortable" data-toggle="class">Date</th>
                                                            <th>Party Name</th>
                                                            <th>C. No</th>
                                                            <th class='text-right'>Total Item</th>
                                                            <th class='text-right'>Total Adv</th>
                                                            <th class='text-right'>Total Fee</th>
                                                            <th>Status</th>
                                                            <th>Details</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="TableBodyConsigmItemList">
                                                    </tbody>
                                                </table>
                                            </div>
                                            
                                            <footer class="panel-footer">
                                                <div class="row">
                                                    <div id="Fotter_Part" class="col-sm-12 text-center-xs">
                                                        <ul class="pagination pagination-sm m-t-none m-b-none">
                                                            <li class="pull-right"><button class="btn btn-success btn-sm" id="Btn_More"> More <i class="fa fa-chevron-right"></i></button></li>
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
    page_no = 1;
</script>
<script src="consignment_lists.js"></script>
</body>

</html>