
<?php
error_reporting(E_ALL);
include '../global_html/AHeader.php';
include '../classes/Menu.php';
include '../classes/UI.php';
include '../classes/NavBar.php';

include '../classes/User_Item_Transfer_View.php';

include '../classes/DateSetter.php';
include '../classes/Global_Functions.php';
include '../classes/Stock_Fectory.php';

$id                         = filter_input(INPUT_GET, 'i');

$menu                       = new Menu();
$UI                         = new UI();
$N                          = new NavBar();
$User_Item_Transfer_View    = new User_Item_Transfer_View();

$DateSetter                 = new DateSetter();
$Global_Functions           = new Global_Functions();
$Stock_Fectory              = new Stock_Fectory();

$User_Item_Transfer_View->LoadValue($id);
?>
<body class="">

    <section class="vbox">
<?php echo $UI->Work("DETAILS"); ?>
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
                                            <header class="panel-heading"><?php echo $User_Item_Transfer_View->getName(); ?> Details
                                            </header>     


                                            <section class="panel panel-default">
                                                <header class="panel-heading bg-light no-border">
                                                    <div class="clearfix">
                                                        <div class="clear">
                                                            <div class="h3 m-t-xs m-b-xs">
                                                                <?php echo $User_Item_Transfer_View->getName(); ?>
                                                            </div>
                                                            
                                                        </div>
                                                    </div>
                                                </header>

                                                <?php if(strlen($User_Item_Transfer_View->getTo_from_name()) > 0){ ?>
                                                    
                                                    <div class="list-group no-radius alt">
                                                    <a class="list-group-item active">
                                                        USER DETAILS
                                                    </a>

                                                </div> 

                                                <div class="list-group no-radius alt">
                                                    <a class="list-group-item">
                                                        USER FROM : <?php echo $User_Item_Transfer_View->getUser_from_name(); ?>
                                                    </a>

                                                </div> 

                                                <div class="list-group no-radius alt">
                                                    <a class="list-group-item">
                                                        USER TO : <?php echo $User_Item_Transfer_View->getTo_from_name(); ?>
                                                    </a>

                                                </div> 


                                                <?php }?>
                                                

                                                <div class="list-group no-radius alt">
                                                    <a class="list-group-item active">
                                                        ITEM DETAILS
                                                    </a>

                                                </div> 

                                                <div class="list-group no-radius alt">
                                                    <a class="list-group-item">
                                                        ITEM NAME : <?php echo $User_Item_Transfer_View->getName(); ?>
                                                    </a>

                                                </div> 

                                                <div class="list-group no-radius alt">
                                                    <a class="list-group-item">
                                                        BOTTLE PER CASE : <?php echo $User_Item_Transfer_View->getBottles_per_case(); ?>
                                                    </a>

                                                </div> 

                                                <div class="list-group no-radius alt">
                                                    <a class="list-group-item">
                                                        PACKING SIZE : <?php echo $User_Item_Transfer_View->getPacking_size(); ?>
                                                    </a>

                                                </div> 

                                                <div class="list-group no-radius alt">
                                                    <a class="list-group-item">
                                                        QNTY : <?php echo $Stock_Fectory->getStockInString($User_Item_Transfer_View->getBottles_per_case(), $User_Item_Transfer_View->getTotal_bottle(), "C/S", "BTL"); ?>
                                                    </a>

                                                </div> 


                                                <div class="list-group no-radius alt">
                                                    <a class="list-group-item">
                                                        TRANSACTION TYPE : <?php echo $User_Item_Transfer_View->GenerateMode($User_Item_Transfer_View->getIo_type()); ?>
                                                    </a>

                                                </div> 
 

                                                <div class="list-group no-radius alt">
                                                    <a class="list-group-item">
                                                        STATUS : <?php echo $Global_Functions->GenerateEnaTransectionStatus($User_Item_Transfer_View->getStatus()); ?>
                                                    </a>
                                                </div> 

                                                <div class="list-group no-radius alt">
                                                    <a class="list-group-item">
                                                        SUBMITTED ON : <?php echo $DateSetter->date($User_Item_Transfer_View->getLongdate()); ?>
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
    <script src="take_action_imfl.js"></script>
    <script src="../js/global.js"></script>
</body>

</html>