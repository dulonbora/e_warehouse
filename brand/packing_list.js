
$(document).ready(AddPackingSizeHtml());
$(document).ready(EditPackingSizeHtml());
$(document).ready(addBrandPackingSize());

$(document).ready(loadPaclingTables());

//Calcluaion
$(document).ready(BottlesKey());
$(document).ready(MrpKey());
$(document).ready(CostPriceKey());
$(document).ready(LplKeyUp());
$(document).ready(Adv());
$(document).ready(TFee());




function AddPackingSizeHtml() {
    $(document).on("click", ".addNewPAckingSize", function () {
        var id = $(this).attr("id");
        $('#Add_From').load("brand_packing_add_ajax.php?i="+id);
    });
}

function EditPackingSizeHtml() {
    $(document).on("click", ".Packingbtnedit", function () {
        var i = $(this).attr("id");
        $('#Add_From').load("brand_packing_add_ajax.php?id="+i+"&i="+id);
    });
}


    function addBrandPackingSize() {
    $(document).on("click", "#AddPacking", function (e) {
        e.preventDefault();
        var url = "../brand_ajax_request/brand_packing_add.php";
        
        if($("#ML_PER_CASE").val()===""){$("#ML_PER_CASE").focus()}
        else{
            $.ajax({
            type: "POST",
            url: url,
            data: $("#Brand_Packing").serialize(), // serializes the form's elements.
            success: function (data)
            {
                var json = $.parseJSON(data);
                if (parseInt(json.SUCCESS) == 1) {
                    $("#MassageLabelPacking").html("Successfully saved!");
                    loadPaclingTables();
                    $("#Add_From").html("Successfully saved!");
                }
                else {
                    $("#MassageLabelPacking").html("Date failed to save!");
                }
            }
        });
        }
        
    });
}



function loadPaclingTables() {
    var url = "../brand_ajax_request/load_brand_packing_list.php?i=" + id;
    $.ajax({
        type: "GET",
        url: url,
        success: function (data) {
            var json = JSON.parse(data);
            if (parseInt(json.SUCCESS) === 1) {
                var output = "";
                for (var i = 0; i < json.CONTENTS.length; i++) {
                    var link = "<tr><td>" + json.CONTENTS[i].ML_PER_CASE + "</td>";
                    output += link
                            + "<td>" + json.CONTENTS[i].BOTTLES_PER_CASE + "</td>"
                            + "<td>" + json.CONTENTS[i].AVD_AMOUNT + "</td>"
                            + "<td>" + json.CONTENTS[i].TFF_AMOUNT + "</td>"
                            + "<td>" + json.CONTENTS[i].IMPORT_FEE + "</td>"
                            + "<td>" + json.CONTENTS[i].EXPORT_FEE + "</td>"
                            + "<td>" + json.CONTENTS[i].VAT + "</td>"
                            + "<td>" + json.CONTENTS[i].MRP + "</td>"
                            + "<td>" + json.CONTENTS[i].MRP_PER_BOTTLE + "</td>"
                            + "<td class='text-center'><buttom class='fa fa-file text-primary text Packingbtnedit' id='" + json.CONTENTS[i].ID + "'></buttom></td>"
                            + "<td class='text-center'><buttom class='fa fa-times-circle-o text-danger text btndel' id='" + json.CONTENTS[i].ID + "'></buttom></td>"
                            + "<td>" + json.CONTENTS[i].STATUS + "</td></tr>";
                }
                $('#TableBodyPacking').html(output);
            }
        }
    });
}

    
    function BottlesKey() {
    $(document).on("keyup", "#BOTTLES_PER_CASE", function () {
        var btl_per_case = $(this).val()==="" ? 0 : parseInt($(this).val());
        var ml = parseInt($("#ML_PER_CASE").val());
        var bl = (btl_per_case * ml) / 1000;
        $("#BL_PER_CASE").val(bl);
        
    });
    }
    
    function MrpKey() {
    $(document).on("keyup", "#MRP_PER_BOTTLE", function () {
        var mrp_per_btl = parseInt($(this).val());
        var btl_per_case = parseInt($("#BOTTLES_PER_CASE").val());
        var per_btm_mrp =  mrp_per_btl * btl_per_case;
        var vat_per_case =  (per_btm_mrp/100)*19.25;
        $("#MRP").val(per_btm_mrp);
        $("#VAT").val(vat_per_case);
        $("#VAT_PER_BOTTLE").val(vat_per_case/btl_per_case);
    });
    }
    
    function LplKeyUp() {
    $(document).on("keyup", "#LPL_PER_CASE", function () {
        var mrp_per_btl = parseInt($(this).val());
        var btl_per_case = parseInt($("#BOTTLES_PER_CASE").val());
        var per_btm_mrp =  mrp_per_btl / btl_per_case;
        $("#LPL_PER_BOTTLE").val(per_btm_mrp);
    });
    }
    
    function CostPriceKey() {
    $(document).on("keyup", "#W_COST_PRICE", function () {
        var cost_per_case = $(this).val()==="" ? 0 : parseInt($(this).val());
        var btl_per_case = parseInt($("#BOTTLES_PER_CASE").val());
        var cost_price_per_btl =  cost_per_case / btl_per_case;
        $("#COST_PRICE_PER_BOTTLE").val(cost_price_per_btl);
    });
    }
    
    function Adv() {
    $(document).on("keyup", "#AVD_AMOUNT", function () {
        var cost_per_case = parseInt($(this).val());
        var btl_per_case = parseInt($("#BOTTLES_PER_CASE").val());
        var cost_price_per_btl =  cost_per_case / btl_per_case;
        $("#AVD_AMOUNT_PER_BOTTLE").val(cost_price_per_btl);
    });
    }
    
    function TFee() {
    $(document).on("keyup", "#TFF_AMOUNT", function () {
        var cost_per_case = parseInt($(this).val());
        var btl_per_case = parseInt($("#BOTTLES_PER_CASE").val());
        var cost_price_per_btl =  cost_per_case / btl_per_case;
        $("#TFF_PER_BOTTLE").val(cost_price_per_btl);
    });
    }

