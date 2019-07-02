
<?php
error_reporting(E_ALL);
include '../global_html/AHeader.php';
include '../classes/Menu.php';
include '../classes/UI.php';
include '../classes/NavBar.php';
include '../classes/Ena_Transfar_View.php';
include '../classes/Ena__Item__List.php';
include '../classes/DateSetter.php';
include '../classes/Global_Functions.php';
include '../classes/Ena__Transfar.php';

$id = filter_input(INPUT_GET, 'i');

$menu               = new Menu();
$UI                 = new UI();
$N                  = new NavBar();
$Ena_Transfar_View  = new Ena_Transfar_View();
$Ena__Transfar      = new Ena__Transfar();
$DateSetter         = new DateSetter();
$Global_Functions   = new Global_Functions();

$Ena_Transfar_View->LoadValue($id);
?>
<body class="">

    <section class="vbox">
<?php echo $UI->Work("DETAILS"); ?>
        <section>
            <section class="hbox stretch">
                <!-- .aside -->
<?php
echo $N->home();
?>
                <!-- /.aside -->
                <section id="content">
                    <section class="vbox">
                        <section class="scrollable wrapper">
                            <div class="container-fluid">

                                <div class="row">

                                    <div class="col-lg-12">
                                        <section class="panel panel-default">
                                            <header class="panel-heading"><?php echo $Ena_Transfar_View->getItem_name(); ?> Details
                                            </header>     


                                            <section class="panel panel-default">
                                                <header class="panel-heading bg-light no-border">
                                                    <div class="clearfix">
                                                        <div class="clear">
                                                            <div class="h3 m-t-xs m-b-xs">
                                                                <?php echo $Ena_Transfar_View->getItem_name(); ?>
                                                            </div>
                                                            
                                                        </div>
                                                    </div>
                                                </header>

                                                <div class="list-group no-radius alt">
                                                    <a class="list-group-item active">
                                                        USER DETAILS
                                                    </a>

                                                </div> 

                                                <div class="list-group no-radius alt">
                                                    <a class="list-group-item">
                                                        USER FROM : <?php echo $Ena_Transfar_View->getUser_from_name(); ?>
                                                    </a>

                                                </div> 

                                                <div class="list-group no-radius alt">
                                                    <a class="list-group-item">
                                                        USER TO : <?php echo $Ena_Transfar_View->getUser_to_name(); ?>
                                                    </a>

                                                </div> 



                                                <div class="list-group no-radius alt">
                                                    <a class="list-group-item active">
                                                        ITEM DETAILS
                                                    </a>

                                                </div> 

                                                <div class="list-group no-radius alt">
                                                    <a class="list-group-item">
                                                        ITEM NAME : <?php echo $Ena_Transfar_View->getItem_name(); ?>
                                                    </a>

                                                </div> 

                                                <div class="list-group no-radius alt">
                                                    <a class="list-group-item">
                                                        QNTY : <?php echo $Ena_Transfar_View->getBl(); ?> BL
                                                    </a>

                                                </div> 


                                                <div class="list-group no-radius alt">
                                                    <a class="list-group-item">
                                                        TRANSACTION TYPE : <?php echo $Ena__Transfar->GenerateMode($Ena_Transfar_View->getIo_type()); ?>
                                                    </a>

                                                </div> 

                                                <div class="list-group no-radius alt">
                                                    <a class="list-group-item">
                                                        MODE : <?php echo $Ena_Transfar_View->getMode(); ?>
                                                    </a>
                                                </div> 

                                                <div class="list-group no-radius alt">
                                                    <a class="list-group-item">
                                                        TRANK_NO : <?php echo $Ena_Transfar_View->getTrank_no(); ?>
                                                    </a>
                                                </div> 


                                                <div class="list-group no-radius alt">
                                                    <a class="list-group-item">
                                                        PERMIT_ID : <?php echo $Ena_Transfar_View->getPermit_id(); ?>
                                                    </a>
                                                </div> 

                                                <div class="list-group no-radius alt">
                                                    <a class="list-group-item">
                                                        STATUS : <?php echo $Global_Functions->GenerateEnaTransectionStatus($Ena_Transfar_View->getStatus()); ?>
                                                    </a>
                                                </div> 

                                                <div class="list-group no-radius alt">
                                                    <a class="list-group-item">
                                                        SUBMITTED ON : <?php echo $DateSetter->date($Ena_Transfar_View->getCreate_on()); ?>
                                                    </a>
                                                </div> 

                                                <div class="list-group no-radius alt">
                                                    <a class="list-group-item">
                                                        LAST MODIFY : <?php echo $DateSetter->date($Ena_Transfar_View->getModify_on()); ?>
                                                    </a>
                                                </div> 
                                                
                                                <div class="list-group no-radius alt">
                                                    <a class="list-group-item">
                                                        <button id="<?php echo $id;?>" class="btn btn-success btn-sm TakeAction">Take An Action</button>
                                                    </a>
                                                </div> 
                                                
                                                
                                                <div class="list-group no-radius alt">
                                                    <a class="list-group-item active">
                                                        NOTE LIST DETAILS
                                                    </a>

                                                </div> 
                                                
                                                <div class="table-responsive">
                                                <table class="table table-striped b-t b-light">
                                                    <thead>
                                                        <tr>
                                                            <th>DATE</th>
                                                            <th>POST BY</th>
                                                            <th>NOTE</th>
                                                            <th>ACTION</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="OpeningStockTable">
                                                    </tbody>
                                                </table>
                                            </div>



                                            </section>



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
echo "var m_ids = '{$id}';";
?>
    </script>
    <script src="take_action.js"></script>
    <script src="../js/global.js"></script>
</body>

</html>