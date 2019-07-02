
<?php
include '../global_html/AHeader.php';
include '../classes/Menu.php';
include '../classes/UI.php';
include '../classes/NavBar.php';

$menu = new Menu();
$UI = new UI;
$N = new NavBar;

$_id = filter_input(INPUT_GET, 'i');
$_parent_id = $_id == 0 || $_id == NULL ? 0 : $_id;
?>
<body class="">

    <section class="vbox">
        <?php echo $UI->Work($_parent_id); ?>
        <section>
            <section class="hbox stretch">
                <!-- .aside -->
                <?php echo $N->Admin(); ?>
                <!-- /.aside -->
                <section id="content">
                    <section class="vbox">
                        <section class="scrollable wrapper">
                            <div class="container-fluid">

                                <div class="row">
                                    <div class="col-lg-7">
                                        
                                        <section class="panel panel-info">
                                            <header class="panel-heading">Select Consignment Type <span id="consignment_no" class="pull-right text-center text-danger"></span><span class="pull-right">CONSIGNMENT NO : </span></header>
                                            <div class="row" style="margin-top: 15px; margin-right: 10px; margin-left: 10px; " id="CTypeTest">
                                                    <form action=""  method="post" id="BrandListForm" role="form">
                                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                            <div class="form-group">
                                                                <select name="CONSIGNMENT_TYPE" id="CONSIGNMENT_TYPE" class="form-control">
                                                                    <option class="form-control" value='0'>SELECT</option>
                                                                    <option class="form-control" value='1'>TRANSPORT</option>
                                                                    <option class="form-control" value='2'>IMPORT</option>
                                                                    <option class="form-control" value='3'>EXPORT</option>
                                                                </select>
                                                            </div>
                                                        </div>
 
                                                    </form>
                                                </div>
                                        </section>
                                        
                                        
                                        
                                        
                                        <section class="panel panel-default">
                                            <header class="panel-heading"><span class="hide" id="consignee_user_id">1</span>ASSAM LIQUOR PVT LTD's BRAND LIST </header>

                                            <div id="search_html" class="row wrapper">

                                            </div>

                                            <div class="table-responsive">
                                                <table class="table table-striped b-t b-light">
                                                    <thead>
                                                        <tr>
                                                            <th class="th-sortable" data-toggle="class">Item Name</th>
                                                            <th>ML</th>
                                                            <th>BTL/CS</th>
                                                            <th>MRP</th>
                                                            <th>STOCK</th>
                                                            <th class="text-center">Add To My List</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="TableBody">
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

                                    <div class="col-lg-5">

                                        

                                        <section class="panel panel-default">
                                            <header class="panel-heading">MY CONSIGNMENT ITEM LIST <button id="ViewFullConsignment" class="btn btn-xs btn-success pull-right">Check Full Consignment</button></header>


                                            <div class="table-responsive">
                                                <table class="table table-striped b-t b-light">
                                                    <thead>
                                                        <tr>
                                                            <th class="th-sortable" data-toggle="class">Item Name</th>
                                                            <th>Size</th>
                                                            <th class="text-center">Qnty</th>
                                                            <th class="text-center">Change</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="TableConsignmentBody">
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
                                <div class="modal-dialog bigMOdel">
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
    <script src="brand.js"></script>
</body>

</html>