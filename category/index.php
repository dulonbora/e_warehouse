
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
   <?php echo $UI->Work("CATEGORY"); ?>
   <section>
      <section class="hbox stretch">
         <!-- .aside -->
         <?php 
                echo $N->Officers_Index();
         ?>
         <!-- /.aside -->
         <section id="content">
            <section class="vbox">
               <section class="scrollable wrapper">
                  <div class="container-fluid">
                      
                     <div class="row">
                        <div class="col-lg-12">
                            
                            <ul class="breadcrumb"> <li><a href="../officers/"><i class="fa fa-home"></i> Home</a></li> <li><a href=""><i class="fa fa-list-ul"></i> Category</a></li> </ul>
                            
                           <section class="panel panel-default">
                              <header class="panel-heading">CATEGORY LIST</header>
                              
                              <div class="row wrapper">
                                 <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4 m-b-xs">
                                    <div class="btn-group" data-toggle="buttons"> 
                                       <button id="addnew" class="btn btn-sm btn-default btn-block">Add New</button>
                                    </div>
                                     
                                     <div class="btn-group" data-toggle="buttons"> 
                                       <button id="View_All_Group" class="btn btn-sm btn-default btn-block">All Group</button>
                                    </div>
                                     
                                     <div class="btn-group" data-toggle="buttons"> 
                                       <button id="View_All_Category" class="btn btn-sm btn-default btn-block">All Category</button>
                                    </div>

                                     <div class="btn-group"> 
                                         <a href="../brand/index.php" class="btn btn-sm btn-default btn-block">All Brands</a>
                                    </div>
                                 </div>
                                 <div class="col-xs-12 col-sm-12 col-md-6 col-lg-8">
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
                                       <tr>
                                          <th class="th-sortable" data-toggle="class">Category Name</th>
                                          <th>Parent Name</th>
                                          <th>Type</th>
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
                  <div id="myModal" class="modal fade" role="dialog">
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
<script src="inx.js"></script>
</body>

</html>