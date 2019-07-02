
<?php
include '../global_html/AHeader.php';
include '../classes/Menu.php';
include '../classes/UI.php';
include '../classes/NavBar.php';

$menu = new Menu();
$UI = new UI;
$N = new NavBar;

$_id = filter_input(INPUT_GET , "i");

?>
<body class="">

    <section class="vbox">
        <?php echo $UI->Work(""); ?>
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
                                            <header class="panel-heading">Consignment List
                                            </header>     
                                            <div id="search_html" class="row wrapper">

                                            </div>


                                            <div class="table-responsive">
                                                <table class="table table-striped b-t b-light">
                                                    <thead>
                                                        <tr>
                                                            <th class="th-sortable" data-toggle="class">COMPANY NAME</th>
                                                            <th>Opening Stock</th>
                                          <th>Inward Stock</th>
                                          <th>Outward Stock</th>
                                          <th>Lose Stock</th>                                     
                                          <th>Production Stock</th>
                                          <th>Produced Stock</th>
                                          <th>Closing Stock</th>
                                          <th>View</th>

                                                        </tr>
                                                    </thead>
                                                    <tbody id="TableBody">
                                                        
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
  echo "item_id = '{$_id}';";
?>
    page_no = 1;

</script>
<script src="stock_by_company_list_by_ite_ena.js"></script>
</body>

</html>