
<?php
include '../global_html/AHeader.php';
include '../classes/Menu.php';
include '../classes/UI.php';
include '../classes/NavBar.php';

$menu = new Menu();
$UI = new UI;
$N = new NavBar;

?>
<body class="">

    <section class="vbox">
        <?php echo $UI->Work("IMFL"); ?>
        <section>
            <section class="hbox stretch">
                <!-- .aside -->
                <?php echo $N->BrandMager(); ?>
                <!-- /.aside -->
                <section id="content">
                    <section class="vbox">
                        <section class="scrollable wrapper">
                            <div class="container-fluid">

                                <div class="row">
                                    
                                                                                                                               
<div class="col-lg-12">
<ul class="breadcrumb"> 
    <li><a href="../home/"><i class="fa fa-home"></i> Home</a></li>
    <li><a href="../brand_manager/"><i class="fa fa-list-ul"></i> IMFL Item List</a></li>
    <li><a><i class="fa fa-list-ul"></i> Stock Summary</a></li>
</ul>                              
</div>

                                    <div class="col-lg-12">
                                        <section class="panel panel-default">
                                            <header class="panel-heading">STOCK SUMMARY
                                                
                                            </header>     
                                            <div id="search_html" class="row wrapper">

                                            </div>


                                            <div class="table-responsive">
                                                <table class="table table-striped b-t b-light">
                                                    <thead>
                                                        <tr>
                                                            <th class="th-sortable" data-toggle="class">Item Name</th>
                                                            <th class="text-center">Packing Size</th>
                                                            <th class="text-center">BTL/CS</th>
                                                            <th class="text-right">MRP</th>
                                                            <th class="text-right">Opening Stock</th>
                                                            <th class="text-right">Inward Stock</th>
                                                            <th class="text-right">Outward Stock</th>
                                                            <th class="text-right">Produced Stock</th>
                                                            <th class="text-right">Lost Stock</th>
                                                            <th class="text-right">Closing Stock</th>
                                                            <th class="text-center">View Transection</th>
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
    <script type="text/javascript">
        page_no = 1;
</script>
    <!-- Javascript -->
    <script src="stock_detail.js"></script>
<script src="../js/app.v1.js"></script>
<script src="../js/app.plugin.js"></script>

</body>

</html>