
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
                            
   
                            <ul class="breadcrumb"> 
                                <li><a href="../officers/"><i class="fa fa-home"></i> Home</a></li>
                                <li><a href="../ena/"><i class="fa fa-list-ul"></i> Ena Item Manager</a></li>
                            </ul>                            
                           <section class="panel panel-default">
                               <header class="panel-heading">ENA ITEM LIST
                                    
                               </header>
                              
                              <div id="search_html" class="row wrapper">
                                 
                              </div>
                              
                              <div class="table-responsive">
                                 <table class="table table-striped b-t b-light">
                                    <thead>
                                       <tr>
                                          <th class="th-sortable" data-toggle="class">Item Name</th>
                                          <th>Group</th>
                                          <th>Category</th>
                                          <th>Type</th>
                                          <th>Fee Require</th>
                                          <th>Transport Fee</th>
                                          <th>Import Fee</th>
                                          <th>Export Fee</th>
                                          <th class="text-center">Edit</th>
                                          <th class="text-center">Remove</th>
                                          <th  class="text-center" style="width:30px;">Status</th>
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
    <script src="ena.js"></script>
</body>

</html>