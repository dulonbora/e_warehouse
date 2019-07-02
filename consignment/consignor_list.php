
<?php
include '../global_html/AHeader.php';
include '../classes/Menu.php';
include '../classes/UI.php';
include '../classes/NavBar.php';

$menu = new Menu();
$UI = new UI;
$N = new NavBar;


$_type = filter_input(INPUT_GET , 'i');

?>
<body class="">

    <section class="vbox">
        <?php echo $UI->Work("LIST"); ?>
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
    <li><a href="../consignment/index.php"><i class="fa fa-list-ul"></i> Consignment List</a></li>
    <li><a href="../consignment/consignor_list.php"><i class="fa fa-list-ul"></i> Consignnor List</a></li>
</ul>                                         
                                        
                                        <section class="panel panel-default">
                                            <header class="panel-heading">Dealer List
                                                <div class="btn-group pull-right"> 
                                                </div>
                                            </header>     
                                            <div id="search_html" class="row wrapper">

                                            </div>


                                            <div class="table-responsive">
                                                <table class="table table-striped b-t b-light">
                                                    <thead>
                                                        <tr>
                                                            <th class="th-sortable" data-toggle="class">Name</th>
                                                            <th>District</th>
                                                            <th>Address</th>
                                                            <th>Create</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="TableConsignor">
                                                        
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
  echo "var type = '{$_type}';";
?>
</script>

<script src="consignor_list.js"></script>
</body>

</html>