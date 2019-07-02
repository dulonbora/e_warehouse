
//Brand Master
$(document).ready(loadHtmlToModel());
$(document).ready(addBrandToMyList());
$(document).ready(loadTableTemp(oid));
$(document).ready(Secrch());
$(document).ready(Search_Html());

//Brand Master
$(document).ready(AddItemToConsignment());
$(document).ready(selectConsignMent());
$(document).ready(ChangeUnit());
$(document).ready(ChangeQnty());

$(document).ready(addItemToConsignMent());
$(document).ready(loadFullConsignment());

//Remove Item

$(document).ready(OpenRemoveWindow());
$(document).ready(Remove_Item_Request());


// Brand Packing Size Add
    
//
function Search_Html() {
    $('#search_html').load("search_html_item.php");

}

function loadHtmlToModel() {
    $(document).on("click", "#addnew", function () {
        CallHtmlPage(0);
    });
}

function loadFullConsignment() {
    $(document).on("click", "#ViewFullConsignment", function () {
    $('#statusresult').load("full_consignment_view.php");
    $('#myModalBig').modal("show");
    var id = $('#consignment_no').text();
    loadConsignMentTableFull(id);
    });
}

function selectConsignMent() {
    
    $(document).on("change", "#CONSIGNMENT_TYPE", function () {
        consignment_type = $("#CONSIGNMENT_TYPE").val();
        consignmantTYpe = $("#CONSIGNMENT_TYPE option:selected").text();
        var url = "../consignment_ajax_request/transfar_master_add.php";
        $.ajax({
            type: "POST",
            url: url,
            data: {USER_FROM : oid, MODE : consignment_type, VCH_TYPE : 'IMFL' }, // serializes the form's elements.
            success: function (data)
            {
                var json = $.parseJSON(data);
                if (parseInt(json.SUCCESS) > 1) {
                    master_id = parseInt(json.SUCCESS);
                    
                   
                    $("#CTypeTest").html("<h4 class='text-center'>YOUR CONSIGNMANE TYPE IS  : "+consignmantTYpe+"</h4>");
                    $("#consignment_no").html(master_id);
                    loadTable(oid);
                }
                else {$("#MassageLabel").html("Date failed to save!");}
            }
        });
        
    });
}


function Remove_Item_Request() {
    
    $(document).on("click", ".btn_RemoveConfirm", function () {
        var id = $(this).attr("id");
        var url = "../consignment_ajax_request/remove_item.php";
        $.ajax({
            type: "GET",
            url: url,
            data: {i : id, m: master_id}, // serializes the form's elements.
            success: function (data)
            {
                var json = $.parseJSON(data);
                if (parseInt(json.SUCCESS) > 1) {
                   $("#MassageLabel").html("Remove Successfull!");
                   $("#tr_"+id+"").hide();
                   $('#myModal').modal("hide");
                }
                else {
                   $("#MassageLabel").html("Remove Successfull!");
                   $("#tr_"+id+"").hide();
                   $('#myModal').modal("hide");
                }
            }
        });
        
    });
}



function AddItemToConsignment() {
    $(document).on("click", ".addToMyList", function () {
        var id = $(this).attr("id");
        CallHtmlPage(id);
    });
}

function OpenRemoveWindow() {
    $(document).on("click", ".Btn_Remove_From_Consignment", function () {
        var id = $(this).attr("id");
        RemoveWindow(id);
    });
}

function ChangeUnit() {
    $(document).on("change", "#UNIT_TYPE", function () {
        
        unit = $("#UNIT_TYPE").val();
        unit_type = $("#UNIT_TYPE option:selected").text();
        $("#test").html("SELECTED UNIT TYPE IS : "+unit_type);
        CalcluateWhenChangedUnit();
        
    });
}

function Secrch() {
    $(document).on("keyup", "#Search", function () {
        var id = $(this).val();
        loadTableSearch(id);
    });
}

function CallHtmlPage(i) {
    $('#statusresult1').load("brand_add_ajax.php?i=" + i);
    $('#myModal').modal("show");
    loadItemDetail(i);
    userItemId = i;
    $("#QNTY").focus();

}

function RemoveWindow(i) {
    $('#statusresult1').load("Remove_Item_From_Consignment.php?i=" + i);
    $('#myModal').modal("show");
    
}

function addBrandToMyList() {
    $(document).on("click", "#addItemToMyConsignMent", function (e) {
        e.preventDefault();
        var url = "../consignment_ajax_request/transfar_item_add.php";
        $.ajax({
            type: "POST",
            url: url,
            data: $("#BrandListForm").serialize(), // serializes the form's elements.
            success: function (data)
            {
                var json = $.parseJSON(data);
                if (parseInt(json.SUCCESS) === 1) {
                    var id = $("#consignment_no").text();
                    $('#myModal').modal("hide");
                    $("#MassageLabelAddToConsignment").html("Successfully saved!");
                    loadConsignMentTable(id);
                }
                else {
                    $("#MassageLabelAddToConsignment").html("Date failed to save!");
                }
            }
        });
    });
}


function loadTable() {
    var url = "../brand_manager_ajax/load_brand_list_by_user_id.php?id="+oid;
    $.ajax({
        type: "GET",
        url: url,
        success: function (data) {
            var json = JSON.parse(data);
            if (parseInt(json.SUCCESS) === 1) {
                var output = "";
                for (var i = 0; i < json.CONTENTS.length; i++) {
                    var link = "<tr><td><a href='index.php?i=" + json.CONTENTS[i].ID + "'>" + json.CONTENTS[i].NAME + "</a></td>";
                    output += link
                            + "<td>" + json.CONTENTS[i].ML_PER_CASE +"."+json.CONTENTS[i].BOTTLES_PER_CASE + "</td>"
                            + "<td class='text-right'>" + json.CONTENTS[i].MRP + "</td>"
                            + "<td class='text-right'>" + json.CONTENTS[i].CLOSEING_STOCK_STR + "</td>"
                            + "<td class='text-center'><buttom class='fa icon-arrow-right text-danger text addToMyList' id='" + json.CONTENTS[i].ID + "'></buttom></td>"
                            + "</tr>";
                }
                $('#TableBodyConsignotItemTable').html(output);
            }
        }
    });
}

function loadTableSearch(str) {
    var url = "../brand_manager_ajax/load_brand_list_by_user_id_and_seach.php?id="+oid+"&str="+str;
    $.ajax({
        type: "GET",
        url: url,
        success: function (data) {
            var json = JSON.parse(data);
            if (parseInt(json.SUCCESS) === 1) {
                var output = "";
                for (var i = 0; i < json.CONTENTS.length; i++) {
                    
                    var link = "<tr><td><a href='index.php?i=" + json.CONTENTS[i].ID + "'>" + json.CONTENTS[i].NAME + "</a></td>";
                    output += link
                            + "<td>" + json.CONTENTS[i].ML_PER_CASE +"."+json.CONTENTS[i].BOTTLES_PER_CASE + "</td>"
                            + "<td class='text-right'>" + json.CONTENTS[i].MRP + "</td>"
                            + "<td class='text-right'>" + json.CONTENTS[i].CLOSEING_STOCK_STR + "</td>"
                            + "<td class='text-center'><buttom class='fa icon-arrow-right text-danger text addToMyList' id='" + json.CONTENTS[i].ID + "'></buttom></td>"
                            + "</tr>";
                }
                $('#TableBodyConsignotItemTable').html(output);
            }
            else{
            var link = "<tr><td colspan='6' class='text-danger'>No Item Found</td></tr>";
            $('#TableBodyConsignotItemTable').html(link);
            }
        }
    });
}


function loadTableTemp(oid) {
    var url = "../brand_manager_ajax/load_brand_list_by_user_id.php?id="+oid;
    $.ajax({
        type: "GET",
        url: url,
        success: function (data) {
            var json = JSON.parse(data);
            if (parseInt(json.SUCCESS) === 1) {
                var output = "";
                for (var i = 0; i < json.CONTENTS.length; i++) {
                    var link = "<tr><td><a href='index.php?i=" + json.CONTENTS[i].ID + "'>" + json.CONTENTS[i].NAME + "</a></td>";
                    output += link
                            + "<td>" + json.CONTENTS[i].ML_PER_CASE +"."+json.CONTENTS[i].BOTTLES_PER_CASE + "</td>"
                            + "<td class='text-right'>" + json.CONTENTS[i].MRP + "</td>"
                            + "<td class='text-right'>" + json.CONTENTS[i].CLOSEING_STOCK_STR + "</td>"
                            + "<td class='text-center'>Generate Consignment No</td>"
                            + "</tr>";
                }
                $('#TableBodyConsignotItemTable').html(output);
            }
        }
    });
}



function loadItemDetail(id) {
    var url = "../brand_manager_ajax/load_item_detail_by_user_item_id.php?i="+id;
    $.ajax({
        type: "GET",
        url: url,
        success: function (data) {            
            var obj = jQuery.parseJSON(data);
            var success = obj["SUCCESS"];
            var json = obj["CONTENTS"];
            $.each(json, function(idx, j){
                var NAME = j.NAME;
                $("#ITEM_NAME").html(NAME+" DETAILS");
                
                MRP_PER_BOTTLE = parseFloat(j.MRP_PER_BOTTLE);
                $("#MRP").html(MRP_PER_BOTTLE);
                
                BOTTLES_PER_CASE = parseInt(j.BOTTLES_PER_CASE);
                $("#Bottles_Per_Case").html(BOTTLES_PER_CASE);
                
                AVD_AMOUNT = parseFloat(j.AVD_AMOUNT);
                $("#Adv_Per_Case").html(AVD_AMOUNT);
                
                AVD_AMOUNT_PER_BOTTLE = j.AVD_AMOUNT_PER_BOTTLE;
                $("#Adv_Per_Bottle").html(AVD_AMOUNT_PER_BOTTLE);
                
                ML_PER_CASE = j.ML_PER_CASE;
                $("#ML_Per_Bottles").html(ML_PER_CASE);
                
                VAT = j.VAT;
                $("#VAT").html(VAT);
                
                LPL = j.LPL;
                $("#LPL").html(LPL);
           
                BL_PER_CASE = j.BL_PER_CASE;
                $("#BL_PER_CASE").html(BL_PER_CASE);
                
                COST_PRICE_PER_BOTTLE = j.W_COST_PRICE_PER_BOTTLE;
          //      $("#Cost_Price").html(COST_PRICE_PER_BOTTLE);
                
                if(consignment_type==1 || consignment_type==4 || consignment_type==5){FEE = j.TPF;}
                
                if(consignment_type==2){FEE = j.IPF;}
                
                if(consignment_type==3){FEE = j.EPF;}                
                
                $("#Fee").html(FEE);
                
                BL_PER_CASE = (parseInt(j.ML_PER_CASE) * parseInt(j.BOTTLES_PER_CASE)) / 1000;
                $("#Bl_Per_Case").html(BL_PER_CASE);
            });
        }
    });
    ChangeQnty();

}






function ChangeQnty() {
    $(document).on("keyup", "#QNTY", function () {
        qnty = parseInt($("#QNTY").val());
        //case
        if(unit==1){CalInCase()}
        //bottle
        if(unit==2){CalInBottle()}
    });
}


function CalcluateWhenChangedUnit() {
        qnty = parseInt($("#QNTY").val());
        //case
        if(unit==1){CalInCase()}
        //bottle
        if(unit==2){CalInBottle()}
}

function CalInCase() {
    TOTAL_MRP = parseFloat(MRP_PER_BOTTLE * BOTTLES_PER_CASE * qnty);
    $("#TOTAL_MRP").html(parseFloat(MRP_PER_BOTTLE * BOTTLES_PER_CASE * qnty).toFixed(2));
    
    TOTAL_CASE = qnty;
    $("#TOTAL_CASE").html(TOTAL_CASE);
    
    TOTAL_ADV = parseFloat(qnty * AVD_AMOUNT);
    $("#TOTAL_ADV").html(parseFloat(qnty * AVD_AMOUNT).toFixed(2));
    
    TOTAL_FEE = parseFloat(qnty * FEE)
    $("#TOTAL_FEE").html(qnty * FEE);
    
    TOTAL_BL = qnty * BL_PER_CASE;
    $("#TOTAL_BL").html(TOTAL_BL);
    
    TOTAL_BOTTLE = qnty * BOTTLES_PER_CASE;
    $("#TOTAL_BOTTLE").html(TOTAL_BOTTLE);
    
    TOTAL_VAT = parseFloat(qnty * VAT);
    $("#TOTAL_VAT").html(parseFloat(qnty * VAT).toFixed(2));
    
    TOTAL_COST = parseFloat((qnty * BOTTLES_PER_CASE) * COST_PRICE_PER_BOTTLE);
    $("#TOTAL_COST").html(parseFloat((qnty * BOTTLES_PER_CASE) * COST_PRICE_PER_BOTTLE).toFixed(2));
    
    TOTAL_LPL = parseFloat(qnty * LPL);
    $("#TOTAL_LPL").html(parseFloat(qnty * LPL).toFixed(2));
    
    TOTAL_TCS = ((TOTAL_COST + TOTAL_VAT + TOTAL_ADV + TOTAL_FEE) / 100) * 1;
 //   $("#TOTAL_TCS").html(parseFloat(TOTAL_TCS).toFixed(2));
    
    TOTAL_LANDED_AMOUNT = parseFloat(TOTAL_COST + TOTAL_VAT + TOTAL_ADV + TOTAL_FEE);
  //  $("#TOTAL_LANDED_AMOUNT").html(parseFloat(TOTAL_COST + TOTAL_VAT + TOTAL_ADV + TOTAL_FEE).toFixed(2));
    
}

function CalInBottle() {
    
    TOTAL_MRP = parseFloat(MRP_PER_BOTTLE * qnty);
    $("#TOTAL_MRP").html(parseFloat(MRP_PER_BOTTLE * qnty).toFixed(2));
    
    TOTAL_CASE = parseFloat(qnty/BOTTLES_PER_CASE);
    $("#TOTAL_CASE").html(parseFloat(qnty/BOTTLES_PER_CASE).toFixed(2));
    
    TOTAL_ADV = parseFloat(qnty * (AVD_AMOUNT / BOTTLES_PER_CASE));
    $("#TOTAL_ADV").html(parseFloat(qnty * (AVD_AMOUNT / BOTTLES_PER_CASE)).toFixed(2));
    
    TOTAL_FEE = parseFloat(qnty * (FEE / BOTTLES_PER_CASE));
    $("#TOTAL_FEE").html(parseFloat(qnty * (FEE / BOTTLES_PER_CASE)).toFixed(2));
    
    TOTAL_BL = parseFloat(qnty * (BL_PER_CASE / BOTTLES_PER_CASE));
    $("#TOTAL_BL").html(parseFloat(qnty * (BL_PER_CASE / BOTTLES_PER_CASE)).toFixed(2));
    
    TOTAL_BOTTLE = parseInt(qnty);
    $("#TOTAL_BOTTLE").html(parseInt(qnty));
    
    TOTAL_VAT = parseFloat(qnty * (VAT / BOTTLES_PER_CASE));
    $("#TOTAL_VAT").html(parseFloat(qnty * (VAT / BOTTLES_PER_CASE)).toFixed(2));
    
    TOTAL_COST = parseFloat(qnty * COST_PRICE_PER_BOTTLE);
    $("#TOTAL_COST").html(parseFloat(qnty * COST_PRICE_PER_BOTTLE).toFixed(2));
    
    TOTAL_LPL = parseFloat(qnty * (LPL / BOTTLES_PER_CASE));
    $("#TOTAL_LPL").html(parseFloat(qnty * (LPL / BOTTLES_PER_CASE)).toFixed(2));
    
    TOTAL_TCS = ((TOTAL_COST + TOTAL_VAT + TOTAL_ADV + TOTAL_FEE) / 100) * 1;
 //   $("#TOTAL_TCS").html(parseFloat(TOTAL_TCS).toFixed(2));
    
   // TOTAL_LANDED_AMOUNT = parseFloat(TOTAL_COST + TOTAL_VAT + TOTAL_ADV + TOTAL_FEE);
   // $("#TOTAL_LANDED_AMOUNT").html(parseFloat(TOTAL_COST + TOTAL_VAT + TOTAL_ADV + TOTAL_FEE).toFixed(2));
    
}



function addItemToConsignMent() {
    $(document).on("click", "#addItemToMyConsignMent", function (e) {
        e.preventDefault();
        var url = "../consignment_ajax_request/transfar_item_add.php";
        $.ajax({
            type: "POST",
            url: url,
            data: {
            MASTER_ID : master_id, USER_ITEM_ID : userItemId,
            UNIT : unit_type, 'TOTAL_CASE' : TOTAL_CASE,
            TOTAL_BOTTLE : TOTAL_BOTTLE, TOTAL_BL : TOTAL_BL,
            TOTAL_LPL : TOTAL_LPL, TOTAL_COST : TOTAL_COST,
            TOTAL_ADV : TOTAL_ADV, TOTAL_FEE : TOTAL_FEE,
            TOTAL_VAT : TOTAL_VAT, TCS : TOTAL_TCS,
            TOTAL_MRP : TOTAL_MRP
            }, // serializes the form's elements.
            success: function (data)
            {
                var json = $.parseJSON(data);
                if (parseInt(json.SUCCESS) === 1) {
                    $("#MassageLabel").html("Successfully saved!");
                    loadConsignMentTable(master_id);
                }
                else {
                    $("#MassageLabel").html("Date failed to save!");
                }
            }
        });
    });
}



function loadConsignMentTable(i) {
    var url = "../consignment_ajax_request/load_brand_list_by_master_id.php?i="+i;
    $.ajax({
        type: "GET",
        url: url,
        success: function (data) {
            var json = JSON.parse(data);
            if (parseInt(json.SUCCESS) === 1) {
                var output = "";
                for (var i = 0; i < json.CONTENTS.length; i++) {
                    var link = "<tr id='tr_" + json.CONTENTS[i].ID + "'><td><a href='index.php?i=" + json.CONTENTS[i].ID + "'>" + json.CONTENTS[i].ITEM_NAME + "</a></td>";
                    output += link
                            + "<td class='text-center'>" + json.CONTENTS[i].PACKING_SIZE + "</td>"
                            + "<td class='text-right'>" + json.CONTENTS[i].QNTY + "</td>"
                            + "<td class='text-center'><buttom class='fa icon-close text-danger text Btn_Remove_From_Consignment' id='" + json.CONTENTS[i].ID + "'></buttom></td>"
                            + "</tr>";
                }
                $('#TableConsignmentBody').html(output);
            }
        }
    });
}


function loadConsignMentTableFull(i) {
    var url = "../consignment_ajax_request/load_brand_list_by_master_id.php?i="+i;
    $.ajax({
        type: "GET",
        url: url,
        success: function (data) {
            var json = JSON.parse(data);
            if (parseInt(json.SUCCESS) === 1) {
                var output = "";
                for (var i = 0; i < json.CONTENTS.length; i++) {
                    var link = "<tr><td><a href='index.php?i=" + json.CONTENTS[i].ID + "'>" + json.CONTENTS[i].ITEM_NAME + "</a></td>";
                    output += link
                            + "<td>" + json.CONTENTS[i].PACKING_SIZE + "</td>"
                            + "<td>" + json.CONTENTS[i].MRP + "</td>"
                            + "<td>" + json.CONTENTS[i].QNTY + "</td>"
                            + "<td>" + json.CONTENTS[i].TOTAL_BL + "</td>"
                            + "<td>" + json.CONTENTS[i].TOTAL_LPL + "</td>"
                            + "<td>" + json.CONTENTS[i].TOTAL_MRP + "</td>"
                            + "<td>" + json.CONTENTS[i].TOTAL_ADV + "</td>"
                            + "<td>" + json.CONTENTS[i].TOTAL_FEE + "</td>"
                            + "<td>" + json.CONTENTS[i].TOTAL_VAT + "</td>"
                            + "</tr>";
                }
                $('#TableBodyForFullConsignment').html(output);
            }
        }
    });
}






