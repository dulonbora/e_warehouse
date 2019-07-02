
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
        <?php echo $UI->Work("ADMIN"); ?>
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
                                            <header class="panel-heading">Opening Stock Pending List 
                                                        <a href="#" class="btn btn-success btn-xs btn-rounded pull-right">View More </a>
                                            </header>     
                                            
                                            <div class="table-responsive">
                                                <table class="table table-striped b-t b-light">
                                                    <thead>
                                                        <tr>
                                                            <th>DATE</th>
                                                            <th>COMPANY NAME</th>
                                                            <th>SIZE</th>
                                                            <th>PRODUCT</th>
                                                            <th>QNTY</th>
                                                            <th>STATUS</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="OpeningStockTable">
                                                    </tbody>
                                                </table>
                                            </div>
                                            
                                        </section>
                                    </div>
                                    
                                    
                                    
                                    <div class="col-lg-12">
                                        <section class="panel panel-default">
                                            <header class="panel-heading">Lost Stock Pending List 
                                                
                                            </header>     
                                            
                                            <div class="table-responsive">
                                                <table class="table table-striped b-t b-light">
                                                    <thead>
                                                        <tr>
                                                            <th>COMPANY NAME</th>
                                                            <th>COMPANY TO</th>
                                                            <th>NOTE</th>
                                                            <th>PRODUCT</th>
                                                            <th>QNTY</th>
                                                            <th>STATUS</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="LostStockTable">
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
?>
</script>
<script src="imfl_office_summary_loader.js"></script>
</body>

</html>