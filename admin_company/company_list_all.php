
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

$id          = filter_input(INPUT_GET, 'i');
?>
<body class="">

    <section class="vbox">
        <?php echo $UI->Work("COMPANY"); ?>
        <section>
            <section class="hbox stretch">
                <!-- .aside -->
                <?php echo $N->company_list_all(); ?>
                <!-- /.aside -->
                <section id="content">
                    <section class="vbox">
                        <section class="scrollable wrapper">
                            <div class="container-fluid">

                                <div class="row">

                                    <div class="col-lg-12">
                                        
<ul class="breadcrumb"> 
    <li><a href="../officers/"><i class="fa fa-home"></i> Home</a></li>
    <li><a href="company_list_all.php?i=<?php echo $id;?>"><i class="fa fa-list-ul"></i> <?php echo $Company->GenerateAction_Officers($id);?> Company List</a></li>
</ul>
                                        
                                        <section class="panel panel-default">
                                            <header class="panel-heading"><?php echo $Company->GenerateAction_Officers($id);?> Company List
                                                <span class="badge pull-right"><?php echo $Company->TotalCountByStatus("U", $id);?></span>
                                            </header>     
                                            
                                            <div class="table-responsive">
                                                <table class="table table-striped b-t b-light">
                                                    <thead>
                                                        <tr>
                                                            <th>EXCISE ID</th>
                                                            <th>COMPANY NAME</th>
                                                            <th>COMPANY TYPE</th>
                                                            <th>EMAIL</th>
                                                            <th>PHONE NO</th>
                                                            <th>ADDRESS</th>
                                                            <th>DISTRICT</th>
                                                            <th>VIEW</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="OpeningStockTable">
                                                    </tbody>
                                                </table>
                                            </div>
                                            <footer class="panel-footer">
                                                <div class="row">
                                                    <div class="col-sm-12 text-center-xs">
                                                        <a href="#" class="btn btn-success btn-xs btn-rounded pull-right">View More </a>
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
  echo "var status = '{$id}';";
?>
</script>
<script src="company_list_al.js"></script>
</body>

</html>