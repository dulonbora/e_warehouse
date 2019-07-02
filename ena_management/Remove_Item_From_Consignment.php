<?php $id = filter_input(INPUT_GET, 'i'); ?>

<div class="wrapper"> <h4 class="m-t-none" id="MassageLabel">Are you sure to delete this item? 
        <button class="btn btn-success btn-rounded btn-xs pull-right">Cancel</button>
        <button class="btn btn-danger btn-rounded btn-xs pull-right btn_RemoveConfirm" id="<?php echo $id;?>">Confirm</button>
    </h4>
</div>