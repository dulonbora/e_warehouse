
//Brand Master
$(document).ready(loadHtmlToModel());
$(document).ready(loadTableTemp(oid));
$(document).ready(Secrch());
$(document).ready(Search_Html());

//Brand Master
$(document).ready(AddItemToConsignment());
$(document).ready(selectConsignMent());
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
            data: {USER_FROM : oid, MODE : consignment_type, VCH_TYPE : 'ENA' }, // serializes the form's elements.
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

function Secrch() {
    $(document).on("keyup", "#Search", function () {
        var id = $(this).val();
        loadTableSearch(id);
    });
}

function CallHtmlPage(i) {
    
    $('#statusresult1').load("brand_add_to_inward_transfar.php?i=" + i);
    $('#myModal').modal("show");
    loadItemDetail(i);
    userItemId = i;
    
}

function RemoveWindow(i) {
    $('#statusresult1').load("Remove_Item_From_Consignment.php?i=" + i);
    $('#myModal').modal("show");
    
}



function loadTable() {
    var url = "../ena_management_ajax_request/load_brand_list_By_UserId.php?i="+oid;
    $.ajax({
        type: "GET",
        url: url,
        success: function (data) {
            var json = JSON.parse(data);
            if (parseInt(json.SUCCESS) === 1) {
                var output = "";
                for (var i = 0; i < json.CONTENTS.length; i++) {
                    var link = "<tr><td><a href='index.php?i=" + json.CONTENTS[i].ID + "'>" + json.CONTENTS[i].ITEM_ID + "</a></td>";
                    output += link
                            + "<td class='text-right'>" + json.CONTENTS[i].MRP + "</td>"
                            + "<td class='text-right'>" + json.CONTENTS[i].TAX_PERCENTAGE + "</td>"
                            + "<td class='text-right'>" + json.CONTENTS[i].CLOSEING_STOCK + "</td>"
                            + "<td class='text-center'><buttom class='fa icon-arrow-right text-danger text addToMyList' id='" + json.CONTENTS[i].ID + "'></buttom></td>"
                            + "</tr>";
                }
                $('#TableBodyConsignotItemTable').html(output);
            }
        }
    });
}

function loadTableSearch(str) {
    var url = "../brand_manager_ajax/load_brand_list_by_user_id_and_seach.php?i="+oid+"&str="+str;
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
                            + "<td>" + json.CONTENTS[i].ML_PER_CASE + "</td>"
                            + "<td>" + json.CONTENTS[i].BOTTLES_PER_CASE + "</td>"
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
    var url = "../ena_management_ajax_request/load_brand_list_By_UserId.php?i="+oid;
    $.ajax({
        type: "GET",
        url: url,
        success: function (data) {
            var json = JSON.parse(data);
            if (parseInt(json.SUCCESS) === 1) {
                var output = "";
                for (var i = 0; i < json.CONTENTS.length; i++) {
                    var link = "<tr><td><a href='index.php?i=" + json.CONTENTS[i].ID + "'>" + json.CONTENTS[i].ITEM_ID + "</a></td>";
                    output += link
                            + "<td class='text-right'>" + json.CONTENTS[i].MRP + "</td>"
                            + "<td class='text-right'>" + json.CONTENTS[i].TAX_PERCENTAGE + "</td>"
                            + "<td class='text-right'>" + json.CONTENTS[i].CLOSEING_STOCK + "</td>"
                            + "<td class='text-center'>Generate Consignment No</td>"
                            + "</tr>";
                }
                $('#TableBodyConsignotItemTable').html(output);
            }
        }
    });
}



function loadItemDetail(id) {
    var url = "../ena_management_ajax_request/load_data_by_itemI_id.php?i="+id;
    $.ajax({
        type: "GET",
        url: url,
        success: function (data) {            
            var obj = jQuery.parseJSON(data);
            var success = obj["SUCCESS"];
            var json = obj["CONTENTS"];
            $.each(json, function(idx, j){
                
                userItemId = parseFloat(j.ID);
                
                ITEM_ID = parseInt(j.ITEM_ID);
                
                ITEM_NAME = j.ITEM_NAME;
                
                MRP = j.MRP;
                
                TAX_PERCENTAGE = j.TAX_PERCENTAGE;
                
                CLOSEING_STOCK = j.CLOSEING_STOCK;
           
                
                if(consignment_type==1 || consignment_type==4 || consignment_type==5){FEE = j.T_FEE;}
                
                if(consignment_type==2){FEE = j.I_FEE;}
                
                if(consignment_type==3){FEE = j.E_FEE;}                

            });
        }
    });
    ChangeQnty();
}






function ChangeQnty() {
    $(document).on("keyup", "#BL", function () {
        qnty = parseInt($("#BL").val());
        CalInCase();
    });
}

function CalInCase() {
    TOTAL_FEE = FEE*qnty;
    $("#TOTAL_FEE").html(TOTAL_FEE);
    TOTAL_MRP = MRP*qnty;
    $("#TOTAL_MRP").html(TOTAL_MRP);

    
}



function addItemToConsignMent() {
    $(document).on("click", "#addItemToMyConsignMent", function (e) {
        e.preventDefault();
        var url = "../ena_management_ajax_request/ena_transfar_add_inward.php";
        $.ajax({
            type: "POST",
            url: url,
            data: {
            MASTER_ID : master_id, USER_ITEM_ID : userItemId,
            ITEM_ID : ITEM_ID, BL : qnty,
            FEE : TOTAL_FEE, USER_TO : oid
            }, // serializes the form's elements.
            success: function (data)
            {
                var json = $.parseJSON(data);
                if (parseInt(json.SUCCESS) === 1) {
                    $("#MassageLabel").html("Successfully saved!");
                    loadConsignMentTable(master_id);
                   $('#myModal').modal("hide");
                }
                else {
                    $("#MassageLabel").html("Date failed to save!");
                }
            }
        });
    });
}



function loadConsignMentTable(i) {
    var url = "../ena_management_ajax_request/ena_transection_list_master_id.php?id="+i;
    $.ajax({
        type: "GET",
        url: url,
        success: function (data) {
            var json = JSON.parse(data);
            if (parseInt(json.SUCCESS) === 1) {
                var output = "";
                for (var i = 0; i < json.CONTENTS.length; i++) {
                    var link = "<tr id='tr_" + json.CONTENTS[i].ID + "'><td><a href='index.php?i=" + json.CONTENTS[i].ID + "'>" + json.CONTENTS[i].ID + "</a></td>";
                    output += link
                            + "<td class='text-right'>" + json.CONTENTS[i].BL + " BL</td>"
                            + "<td class='text-center'>" + json.CONTENTS[i].TOTAL_MRP + "</td>"
                            + "<td class='text-right'>" + json.CONTENTS[i].TOTAL_VAT + "</td>"
                            + "<td class='text-right'>" + json.CONTENTS[i].TCS + "</td>"
                            + "<td class='text-right'>" + json.CONTENTS[i].TOTAL_AMOUNT + "</td>"
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
                            + "<td>" + json.CONTENTS[i].TOTAL_MRP + "</td>"
                            + "<td>" + json.CONTENTS[i].TOTAL_COST + "</td>"
                            + "<td>" + json.CONTENTS[i].TOTAL_ADV + "</td>"
                            + "<td>" + json.CONTENTS[i].TOTAL_FEE + "</td>"
                            + "<td>" + json.CONTENTS[i].TOTAL_VAT + "</td>"
                            + "<td>" + json.CONTENTS[i].TCS + "</td>"
                            + "<td>" + json.CONTENTS[i].TOTAL_AMOUNT + "</td>"
                            + "</tr>";
                }
                $('#TableBodyForFullConsignment').html(output);
            }
        }
    });
}






