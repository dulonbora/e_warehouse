
<?php
include '../global_html/AHeader.php';
include '../classes/Menu.php';
include '../classes/UI.php';
include '../classes/NavBar.php';
include '../classes/Ena__User__Item.php';
include '../classes/Ena__Item__List.php';
include '../classes/Company.php';

$menu                   = new Menu();
$UI                     = new UI();
$N                      = new NavBar();
$Ena__User__Item        = new Ena__User__Item();
$Ena__Item__List        = new Ena__Item__List();
$Company                = new Company();

$_id                    = filter_input(INPUT_GET, 'i');
$Ena__User__Item->LoadValue($_id);
$Ena__Item__List->LoadValue($Ena__User__Item->getItem_id());
$Company->LoadValue($Ena__User__Item->getUser_id());



?>
<body class="">

    <section class="vbox">
        <?php echo $UI->Work("STOCK"); ?>
        <section>
            <section class="hbox stretch">
                <!-- .aside -->
                <?php echo $N->home_officers(); ?>
                <!-- /.aside -->
                <section id="content">
                    <section class="vbox">
                        <section class="scrollable wrapper">
                            <div class="container-fluid">

                                <div class="row">

                                    <div class="col-lg-12">
                                        <section class="panel panel-default">
                                            <header class="panel-heading"><?php echo $Ena__Item__List->getItem_name();?> STOCK DETAILS
                                                <span class="pull-right"><?php echo $Company->getCompany_name();?></span>
                                            </header>     
                                            <div id="search_html" class="row wrapper">

                                            </div>


                                            <div class="table-responsive">
                                                <table class="table table-striped b-t b-light">
                                                    <thead>
                                                        <tr>
                                                            <th class="th-sortable" data-toggle="class">Date</th>
                                                            <th>Mode</th>
                                                            <th>Transfar To</th>
                                                            <th>Qnty</th>
                                                            <th>View Details</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="TableBodyIndex">
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
    <a id="Btn_AutoFill">jgfsjdgj</a>
    <!-- Javascript -->
<script type="text/javascript">
<?php
  echo "var userId = '{$userId}';";
  echo "var user_item_id = '{$_id}';";
?>
        page_no = 1;

</script>
<script src="ena_transection.js"></script>
</body>

</html>