
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
   <?php echo $UI->Work("ITEM LIST"); ?>
   <section>
      <section class="hbox stretch">
         <!-- .aside -->
         <?php echo $N->EnaManager(); ?>
         <!-- /.aside -->
         <section id="content">
            <section class="vbox">
               <section class="scrollable wrapper">
                  <div class="container-fluid">
                      
                     <div class="row">
                         
                         <div class="col-lg-12">
<ul class="breadcrumb"> 
    <li><a href="../home/"><i class="fa fa-home"></i> Home</a></li>
    <li><a href="../ena_management/index.php"><i class="fa fa-list-ul"></i> ENA Item List</a></li>
    <li><a href="../ena_management/manage_item.php"><i class="fa fa-list-ul"></i> Brand Manger</a></li>
</ul>                              
                             
                         </div>
                        <div class="col-lg-7">
                           <section class="panel panel-default">
                               <header class="panel-heading">ALL ITEM LIST
                                   <div class="btn-group pull-right"> 
                                                    <a href="index.php" class="btn btn-sm btn-success btn-xs btn-rounded btn-block">Go To ENA Item List</a> 
                                                </div>
                               </header>
                               
                              
                              <div id="search_html" class="row wrapper">
                                 
                              </div>
                              
                              <div class="table-responsive">
                                 <table class="table table-striped b-t b-light">
                                    <thead>
                                       <tr>
                                          <th class="th-sortable" data-toggle="class">Item Name</th>
                                          <th class='text-right'>Fee Require</th>
                                          <th class='text-right'>Transport Fee</th>
                                          <th class='text-right'>Import Fee</th>
                                          <th class='text-right'>Export Fee</th>
                                          <th class="text-center">Add To My List</th>
                                       </tr>
                                    </thead>
                                    <tbody id="TableBody">
                                    </tbody>
                                 </table>
                              </div>
                              
                           </section>
                        </div>
                         
                         
                         
                         <div class="col-lg-5">
                           <section class="panel panel-default">
                               <header class="panel-heading">MY ITEM LIST
                               </header>                              
                              
                              <div class="table-responsive">
                                 <table class="table table-striped b-t b-light">
                                    <thead>
                                       <tr>
                                          <th>Item Name</th>
                                          <th class="text-right">MRP</th>
                                          <th class="text-right">Tax %</th>
                                          <th class="text-right">Closing Stock</th>
                                       </tr>
                                    </thead>
                                    <tbody id="TableBodyUser">
                                    </tbody>
                                 </table>
                              </div>
                              
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
    <script src="ena_management.js"></script>
</body>

</html>