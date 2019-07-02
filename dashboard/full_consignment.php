<?php $_id = filter_input(INPUT_GET , "i"); ?>

<div class="row">
                        <div class="col-lg-12">
                           <section class="panel panel-default">
                               <header class="panel-heading">Brand List 
                                   <div class="btn-group pull-right" data-toggle="buttons"> 
                                       <button id="<?php echo $_id == NULL ? 0 : $_id;?>" class="btn btn-xs btn-default btn-block addNewPAckingSize">Add New Packing Size</button>
                                    </div>
                               </header>
                              <div class="table-responsive">
                                 <table class="table table-striped b-t b-light">
                                    <thead>
                                       <tr>
                                          <th class="th-sortable" data-toggle="class">Name</th>
                                          <th>Size</th>
                                          <th>Batch No</th>
                                          <th>QNTY</th>
                                          <th>TOTAL_COST</th>
                                          <th>TOTAL_ADV</th>
                                          <th>TOTAL_FEE</th>
                                          <th>TOTAL_VAT</th>
                                          <th>TOTAL_MRP</th>
                                          <th class="text-center">Remove</th>
                                       </tr>
                                    </thead>
                                    <tbody id="TableBodyForFullConsignment">
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