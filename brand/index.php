
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

<style>

.sidenav {
    height: 100%;
    width: 0;
    position: fixed;
    z-index: 1000;
    top: 0;
    left: 0;
    background-color: #111;
    overflow-x: hidden;
    transition: 0.5s;
    padding-top: 0px;
}


@media screen and (max-height: 450px) {
    
}
</style>

<body class="">
    
    <section class="vbox">
   <?php echo $UI->Work("ADMIN"); ?>
   <section>
      <section class="hbox stretch">
         <!-- .aside -->
         <?php echo $N->Officers_Index(); ?>
         <!-- /.aside -->
         <section id="content">
            <section class="vbox">
               <section class="scrollable wrapper">
                  <div class="container-fluid">
                      
                     <div class="row">
                        <div class="col-lg-12">
                            <ul class="breadcrumb"> 
                                <li><a href="../officers/"><i class="fa fa-home"></i> Home</a></li>
                                <li><a href=""><i class="fa fa-list-ul"></i> Brand List</a></li>
                            </ul>
                            
                            
                           <section class="panel panel-default">
                              <header class="panel-heading">Brand List</header>
                              
                              <div id="search_html" class="row wrapper">
                                 
                              </div>
                              
                              <div class="table-responsive">
                                 <table class="table table-striped b-t b-light">
                                    <thead>
                                       <tr>
                                          <th class="th-sortable" data-toggle="class">Category Name</th>
                                          <th>Group</th>
                                          <th>Category</th>
                                          <th>Type</th>
                                          <th>Count</th>
                                          <th>Imported</th>
                                          <th>New</th>
                                          <th class="text-center">Edit</th>
                                          <th class="text-center">View Items</th>
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
    
    <div id="mySidenav" class="sidenav"></div>

    <!-- Javascript -->
    <script type="text/javascript">
    page_no = 1;
</script>
<script src="brand.js"></script> 
<script type="text/javascript">
//$(document).ready(closeNava());
$(document).ready(openNav());

function openNav() {
    $(document).on("click", ".SideBarMenuBtn", function () {
        alert("sdfsdf");
    });
    }
//function closeNava() {$(document).on("click", "body,html", function () {CloseNav();});}
//function CloseNav() {$('.mySidenav').css('width','0px');}
function oNav() {$('.mySidenav').css('width','300px');}
</script>
</body>

</html>