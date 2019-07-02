<?php
include '../classes/Mix__Item__Transfar.php';
$id = filter_input(INPUT_GET, 'i');

$__mix = new Mix__Item__Transfar();

$__mix->LoadValue($id);

if($__mix->getStatus()==0){ ?>

    <div class="row wrapper" id="">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <h4 class="m-t-none">Update Item Production Status <span class="pull-right text-danger" id="MassageLabel1"></span></h4> 
        <h4 class="m-t-none"><span class="Add Your Opening Stock text-danger">Once You Update Status , It Never Be Changed</span></h4> 
    </div>
    <form action=""  method="post" id="EnaBrand" role="form">
        <input type="hidden" name="ID" id="ID" value="<?php echo $id == NULL ? 0 : $id; ?>">

        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="form-group"> <label>Select Type</label> 
            <select name="STATUS" id="STATUS" class="form-control">
                        <option class="form-control" value='0'>PENDING</option>
                        <option value='1'>PRODUCTION DONE</option>
                    </select>
                </div>
                </div>

        <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
            <div class="form-group">
                <input type="button" id="UpdateStatusBtn" value="Update Status" class="btn btn-primary">
            </div> 

        </div> 
        <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
            <div class="form-group">
                <label id="MassageLabel1"></label>
            </div> 

        </div> 
    </form> </div>

<?php }
 else { ?>
     <div class="row wrapper" id="">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <h4 class="m-t-none"><span class="Add Your Opening Stock text-danger">You Cannot Change Status Now</span></h4> 
    </div>
     </div>
<?php }
?>













