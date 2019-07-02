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
                                          <th class="th-sortable" data-toggle="class">ML</th>
                                          <th>ML</th>
                                          <th>Bottle</th>
                                          <th>Adv Amount</th>
                                          <th>TFee</th>
                                          <th>IFee</th>
                                          <th>EFee</th>
                                          <th>Vat</th>
                                          <th>MRP (Case)</th>
                                          <th>MRP (Bottle)</th>
                                          <th>Minimum Adv</th>
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