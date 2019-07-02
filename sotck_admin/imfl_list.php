
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
   <?php echo $UI->Work("Closing Stock"); ?>
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
                               <header class="panel-heading">IMFL Stock Summary
                                    <div class="btn-group pull-right"> 
                                    </div>
                               </header>
                              <div id="search_html1" class="row wrapper">
<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 m-b-xs">
                                          
                                     
                                    <div class="btn-group"> 
                                        <a href="imfl_list_type.php?t=WHS" class="btn btn-sm btn-default btn-block">Wholesale</a>
                                    </div>
                                     
                                    <div class="btn-group"> 
                                         <a href="imfl_list_type.php?t=MNF" class="btn btn-sm btn-default btn-block">Manufactory</a>
                                    </div>
                                     
                                    <div class="btn-group"> 
                                         <a href="imfl_list_type.php?t=RTL" class="btn btn-sm btn-default btn-block">Retails</a>
                                    </div>
                                                                   
                                 </div>
                                  
                                 <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                    <div class="input-group"> 
                                        <input type="text" id="Search" class="input-sm form-control" placeholder="Search">
                                       <span class="input-group-btn"> <button class="btn btn-sm btn-default" type="button">Go!</button> 
                                       </span> 
                                    </div>
                                 </div>
                                            </div>
                              
                              <div class="table-responsive">
                                 <table class="table table-striped b-t b-light">
                                    <thead>
                                        <tr class="text-capitalize">
                                          <th class="th-sortable" data-toggle="class">Item Name</th>
                                          <th>BTL/CS</th>
                                          <th>ML/BTL</th>
                                          <th>Opening Stock</th>
                                          <th>Inward Stock</th>
                                          <th>Outward Stock</th>
                                          <th>Lose Stock</th>                                     
                                          <th>Production Stock</th>
                                          <th>Produced Stock</th>
                                          <th>Closing Stock</th>
                                          <th  class="text-center" style="width:30px;">View</th>
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
    
    
    <script type="text/javascript">
<?php
  echo "var userId = '{$userId}';";
  echo "var status = '{$_Status}';";
?>
    page_no = 1;
</script>
    <!-- Javascript -->
    <script src="imfl.js"></script>
</body>

</html>