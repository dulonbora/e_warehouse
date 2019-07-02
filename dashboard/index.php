
<?php
include '../global_html/AHeader.php';
include '../classes/Menu.php';
include '../classes/UI.php';
include '../classes/NavBar.php';
include '../classes/Company.php';

$menu           = new Menu();
$UI             = new UI();
$N              = new NavBar();
$company        = new Company();

?>
<body class="">

    <section class="vbox">
        <?php echo $UI->Work(""); ?>
        <section>
            <section class="hbox stretch">
                <!-- .aside -->
                <?php echo $N->Dashboard(); ?>
                <!-- /.aside -->
                <section id="content">
                    <section class="vbox">
                        <section class="scrollable wrapper">
                            <div class="container-fluid">

                                <div class="row">

                                    <div class="col-lg-12">
                                        <section class="panel panel-default">
                                            <header class="panel-heading">Consignment List <button id="CompanySetUp" class="btn btn-danger btn-xs pull-right">Setup Your Company</button>
                                            </header>     
                                            <div id="search_html" class="row wrapper">

                                            </div>


                                            <div class="table-responsive">
                                                <table class="table table-striped b-t b-light">
                                                    <thead>
                                                        <tr>
                                                            <th class="th-sortable" data-toggle="class">Date</th>
                                                            <th>Consignment No</th>
                                                            <th>Year</th>
                                                            <th>Total Item</th>
                                                            <th>Total Adv</th>
                                                            <th>Total Fee</th>
                                                            <th>Total Vat</th>
                                                            <th>Total Cost</th>
                                                            <th>Total Tcs</th>
                                                            <th>Status</th>
                                                            <th>Details</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="TableBodyConsigmMentList">
                                                        
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
?>
</script>
<script src="index_brand_manager.js"></script>
</body>

</html>