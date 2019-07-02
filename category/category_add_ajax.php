<?php include '../classes/Category.php';
$_Category = new Category();
$id = filter_input(INPUT_GET, 'i');

$view = $_Category->loadAllPaggingByParentId(0, 0, 20);

$_Category->LoadValue($id);
        
?>

<div class="wrapper"> <h4 class="m-t-none">Add Category
                <button type="button" class="btn btn-danger btn-rounded btn-xs pull-right" data-dismiss="modal">x</button>

        <span id="MassageLabel"></span></h4> 
    <form action=""  method="post" id="fCategory" role="form">
        <input type="hidden" name="ID" id="id" value="<?php echo $id;?>">
        
                <div class="form-group"> <label>Name</label>
                    <input type="text" name="NAME" value="<?php echo $_Category->getName();?>" id="NAME" placeholder="NAME" class="input-sm form-control" required>
                </div>
                
                <div class="form-group"> <label>Select Parent</label> 
                    <select name="PARENT_ID" id="role" class="form-control">
                        <option class="form-control" value='0'>NO</option>
                            <?php
                            foreach($view as $rows) { ?>
                        <option value='<?php echo $rows['ID'];?>'><?php echo $rows['NAME'];?></option>
                            <?php } ?>
                    </select>
                </div>
        
                <div class="form-group"> <label>Select Type</label> 
                    <select name="TYPE" id="role" class="form-control">
                        <option class="form-control" value='GROUP'>GROUP</option>
                        <option value='CATEGORY'>CATEGORY</option>
                        <option value='TYPE'>TYPE</option>
                    </select>
                </div>
        
        <div class="m-t-lg">
            <input type="button" id="adduser" value="Add New" class="btn btn-primary btn-block">
        </div> 
                </form> </div>