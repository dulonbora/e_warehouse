
<?php include '../global_html/AHeader.php';
include '../classes/Menu.php';
include '../classes/UI.php'; 
include '../classes/NavBar.php'; 

$menu = new Menu();
$UI = new UI;
$N = new NavBar;

$_id = filter_input(INPUT_GET , 'i');
$_parent_id = $_id == 0 || $_id == NULL ? 0 : $_id;


?>
<body class="">
    
    <section class="vbox">
   <?php echo $UI->Work("ITEM"); ?>
   <section>
      <section class="hbox stretch">
         <!-- .aside -->
                <?php echo $N->SideBarForMixItem(); ?>
         <!-- /.aside -->
         <section id="content">
            <section class="vbox">
               <section class="scrollable wrapper">
                  <div class="container-fluid">
                      
                     <div class="row">
                         
                                                                                                                         <div class="col-lg-12">
<ul class="breadcrumb"> 
    <li><a href="../home/"><i class="fa fa-home"></i> Home</a></li>
    <li><a href="../mix/index.php"><i class="fa fa-list-ul"></i> Mix Item List</a></li>
    <li><a><i class="fa fa-list-ul"></i> Manage Item</a></li>
</ul>                              
                             
                         </div>

                        <div class="col-lg-7">
                           <section class="panel panel-default">
                               <header class="panel-heading">EXCISE ITEM LIST<a class="btn btn-success btn-rounded btn-xs pull-right" href="../mix/index.php">Back</a></header>
                              
                              <div id="search_html" class="row wrapper">
                                 
                              </div>
                              
                              <div class="table-responsive">
                                 <table class="table table-striped b-t b-light">
                                    <thead>
                                       <tr>
                                          <th class="th-sortable" data-toggle="class">Item Name</th>
                                          <th>Group</th>
                                          <th>Category</th>
                                          <th>Size</th>
                                          <th>Bottles</th>
                                          <th>MRP (BOTTLE)</th>
                                          <th class="text-center">View Items</th>
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
                              <header class="panel-heading">MY ITEM LIST</header>
                              
                              
                              <div class="table-responsive">
                                 <table class="table table-striped b-t b-light">
                                    <thead>
                                       <tr>
                                          <th class="th-sortable" data-toggle="class">Item Name</th>
                                          <th>Size</th>
                                          <th>BTL/CS</th>
                                          <th class="text-center">Opening Stock</th>
                                       </tr>
                                    </thead>
                                    <tbody id="TableBodyIndex">
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
    <script src="brand.js"></script>
</body>

</html>