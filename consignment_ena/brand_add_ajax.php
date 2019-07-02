<?php
include '../classes/Brand__List.php';
$_Brand__List = new Brand__List();
include '../classes/Brand__Packing.php';
$_Brand__Packing = new Brand__Packing();

$id = filter_input(INPUT_GET, 'i');
//$_Brand__Packing->LoadValue($id);

?>

<div class="row wrapper" id="">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <h4 class="m-t-none">ADD THE ITEM TO THE CONSIGNMENT LIST </h4> 
        <h4 class="m-t-none"><span class="Add Your Opening Stock text-danger" id="test">SELECT UNIT TYPE</span></h4> 
    </div>
    <form action=""  method="post" id="BrandListForm" role="form">
        <input type="hidden" name="USER_ITEM_ID" id="id" value="<?php echo $id == NULL ? 0 : $id; ?>">        
       
        
        
        <div class="col-md-4 col-lg-4 col-xs-12 col-sm-12">
            <div class="form-group">
                <label>Qnty</label>
                <input type="number" name="QNTY" value="" id="QNTY" placeholder="Qnty" class="input-sm form-control" required>
            </div>
            
            <div class="form-group"> <label>Select Unit Type</label> 
                    <select name="UNIT_TYPE" id="UNIT_TYPE" class="form-control">
                        <option class="form-control" value='0'>SELECT</option>
                        <option class="form-control" value='1'>CASE</option>
                        <option class="form-control" value='2'>BOTTLE</option>
                    </select>
                </div>
        </div>
        
        <div class="col-lg-12">
                           <section class="panel panel-default">
                               <header class="panel-heading"><span id="ITEM_NAME"></span>
                               </header>
                              <div class="table-responsive">
                                 <table class="table table-striped b-t b-light">
                                    <tbody id="TableBody">
                                        <tr>
                                            <td>MRP/BTL :</td>
                                            <td class="text-danger" id="MRP"></td>
                                            
                                            <td>BTL/CASE :</td>
                                            <td class="text-danger" id="Bottles_Per_Case"></td>
                                            
                                            <td>ML(BTL) :</td>
                                            <td class="text-danger" id="ML_Per_Bottles"></td>
                                            
                                            
                                            <td>BL/CS :</td>
                                            <td class="text-danger" id="BL_PER_CASE"></td>
                                            
                                            <td>LPL(BTL) :</td>
                                            <td class="text-danger" id="LPL"></td>
                                   
                                        </tr>
                                        <tr>
                                            
                                            <td>COST PRICE/BTL :</td>
                                            <td class="text-danger" id="Cost_Price"></td>
                                            
                                            
                                            <td>ADV/CASE :</td>
                                            <td class="text-danger" id="Adv_Per_Case"></td>
                                            
                                            <td>AVD/BTL :</td>
                                            <td class="text-danger" id="Adv_Per_Bottle"></td>
                                            
                                            <td>Fee/CASE</td>
                                            <td class="text-danger" id="Fee"></td>
                                            
                                            
                                            <td>VAT/CASE</td>
                                            <td class="text-danger" id="VAT"></td>
                                            
                                            
                                        </tr>
                                        
                                    </tbody>
                                 </table>
                              </div>
                               
                           </section>
            
            
            
                           <section class="panel panel-default">
                               <header class="panel-heading"><span id="">Calcluated Details</span>
                               </header>
                              <div class="table-responsive">
                                 <table class="table table-striped b-t b-light">
                                    <tbody id="TableBody">
                                        
                                        
                                        <tr>
                                            <td>T/MRP :</td>
                                            <td class="text-danger" id="TOTAL_MRP"></td>
                                            
                                            <td>T/CASE :</td>
                                            <td class="text-danger" id="TOTAL_CASE"></td>
                                            
                                            
                                            <td>T/BOTTLE :</td>
                                            <td class="text-danger" id="TOTAL_BOTTLE"></td>
                                            
                                            <td>T/LPL :</td>
                                            <td class="text-danger" id="TOTAL_LPL"></td>
                                            
                                            <td>T/BL :</td>
                                            <td class="text-danger" id="TOTAL_BL"></td>
                                            
                                            
                                            <td>T/FEE :</td>
                                            <td class="text-danger" id="TOTAL_FEE"></td>
                                          
                                          
                                        </tr>
                                        <tr>
                                            
                                            
                                            <td>T/VAT :</td>
                                            <td class="text-danger" id="TOTAL_VAT"></td>
                                            
                                            <td>T/ADV :</td>
                                            <td class="text-danger" id="TOTAL_ADV"></td>
                                            
                                            
                                            <td>T/COST :</td>
                                            <td class="text-danger" id="TOTAL_COST"></td>
                                            
                                            <td>T/TCS :</td>
                                            <td class="text-danger" id="TOTAL_TCS"></td>
                                            
                                            
                                            <td>T/LANDED AMOUNT :</td>
                                            <td class="text-danger" id="TOTAL_LANDED_AMOUNT"></td>
                                            
                                        </tr>
                                    </tbody>
                                 </table>
                              </div>
                               
                           </section>
                        </div>
        
        <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
            <div class="form-group">
                <input type="button" id="addItemToMyConsignMent" value="Add New" class="btn btn-primary">
            </div> 

        </div> 
        <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
            <div class="form-group">
                <label id="MassageLabelAddToConsignment"></label>
            </div> 

        </div> 
    </form> </div>











