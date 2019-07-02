
<?php include '../global_html/AHeader.php';
include '../classes/Menu.php';
include '../classes/UI.php'; 
include '../classes/NavBar.php'; 
include '../classes/Brand__Master.php'; 

$menu               = new Menu();
$UI                 = new UI();
$N                  = new NavBar();
$Brand__Master      = new Brand__Master();
$_id                = filter_input(INPUT_GET , "i");
$Brand__Master->LoadValue($_id);
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
   <?php echo $UI->Work("ITEM LIST"); ?>
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
                                <li><a href="../brand/"><i class="fa fa-list-ul"></i> Brand List</a></li>
                                <li class="active">Packing List</li>
                            </ul>                            
                           <section class="panel panel-default">
                               <header class="panel-heading"><?php echo $Brand__Master->getName();?>
                                   <div class="btn-group pull-right" data-toggle="buttons"> 
                                       <button id="<?php echo $_id == NULL ? 0 : $_id;?>" class="btn btn-xs btn-success btn-block btn-rounded addNewPAckingSize">Add New Packing Size</button>
                                    </div>
                               </header>
                              <div class="table-responsive">
                                 <table class="table table-striped b-t b-light">
                                    <thead>
                                       <tr>
                                          <th class="th-sortable" data-toggle="class">ML</th>
                                          <th>Bottle/CS</th>
                                          <th>Adv Amount</th>
                                          <th>TFee</th>
                                          <th>IFee</th>
                                          <th>EFee</th>
                                          <th>Vat</th>
                                          <th>MRP (Case)</th>
                                          <th>MRP (Bottle)</th>
                                          <th class="text-center">Edit</th>
                                          <th class="text-center">Remove</th>
                                          <th  class="text-center" style="width:30px;">Status</th>
                                       </tr>
                                    </thead>
                                    <tbody id="TableBodyPacking">
                                    </tbody>
                                 </table>
                              </div>
                               
                              <footer class="panel-footer">
                                 <div class="row">
                                     <div id="Add_From" class="col-sm-12 text-center-xs">
                                       
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
    <?php
  echo "var id = '{$_id}';";
?>
</script>
    <script src="packing_list.js"></script> 

</body>

</html>