//Variables


//Brand Master
$(document).ready(loadHtmlToModel());
$(document).ready(Search_Html());
$(document).ready(Secrch());
$(document).ready(addTooProduction());
 $(document).ready(More());


//Index
 $(document).ready(loadTableIndex()); 
 $(document).ready(loadConsignMentTableFull());
 
 //UPDATE STOCK
 $(document).ready(UpdateStock());
 
 

function More() {
    $(document).on("click", "#Btn_More", function () {
        page_no = page_no+1;
        loadTableIndex();
    });
}

//
function Search_Html() {
    $('#search_html').load("search_html.php");
}

function loadHtmlToModel() {
    $(document).on("click", ".addToMyList", function () {
        var id = $(this).attr("id");
        CallHtmlPage(id);
    });
}

function Secrch() {
            $(document).on("keyup", "#Search", function () {
                var id = $(this).val();
                loadTableSearch(id);
            });
        }


function Edit() {
    $(document).on("click", ".btnedit", function () {
        var id = $(this).attr("id");
        CallHtmlPage(id);
    });
}

function CallHtmlPage(i) {
    $('#statusresult').load("brand_add_to_production.php?i=" + i);
    $('#myModalBig').modal("show");
}



function UpdateStock() {
    $(document).on("click", ".StockTransfar", function () {
        var data = $(this).attr("id");
        var arr = data.split('_');        
        var url = "../stock_transfar/transfar_wholesale_to_retails.php?i="+arr[1];
        $.ajax({
            type: "GET",
            url: url,
            success: function (data) {
                var json = JSON.parse(data);
                if (parseInt(json.SUCCESS) === 1) {
                    alert("SUCCESS");
                }
            }
        });

    });
}



function addTooProduction() {
    $(document).on("click", "#addTooProduction", function (e) {
        e.preventDefault();
        var url = "../ena_management_ajax_request/ena_transfar_add.php";
        $.ajax({
            type: "POST",
            url: url,
            data: $("#ENA_TO_PRRODUCTION").serialize(), // serializes the form's elements.
            success: function (data)
            {
                var json = $.parseJSON(data);
                if (parseInt(json.SUCCESS) === 1) {$("#MassageLabel1").html("Successfully saved!");
                $('#myModalBig').modal("hide");
                loadTableIndex();
                }
                if (parseInt(json.SUCCESS) === 0) {$("#MassageLabel1").html("Date failed to save!");}
            }
        });
    });
}




function loadTableSearch(str) {
    var url = "../ena_ajax_request/seach_ajax.php?p=".str;
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
                            + "<td>" + json.CONTENTS[i].FEE_REQUIRE + "</td>"
                            + "<td>" + json.CONTENTS[i].T_FEE + "</td>"
                            + "<td>" + json.CONTENTS[i].I_FEE + "</td>"
                            + "<td>" + json.CONTENTS[i].E_FEE + "</td>"
                            + "<td class='text-center'><buttom class='fa icon-arrow-right text-danger text addToMyList' id='" + json.CONTENTS[i].ID + "'></buttom></td>"
                            + "</tr>";
                }
                $('#TableBody').html(output);
            }
        }
    });


}



/*
function loadTableIndex() {
//    var url = "../brand_manager_ajax/load_brand_list.php?i="+userId;
    var url = "../brand_manager_ajax/load_brand_list.php?i=1";
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
                            + "<td>" + json.CONTENTS[i].CURRENT_STOCK_STR + "</td>"
                            + "<td>" + json.CONTENTS[i].OPENING_STOCK_STR + "</td>"
                            + "<td class='text-center'><buttom class='fa icon-arrow-right text-danger text addToMyList' id='" + json.CONTENTS[i].ID + "'></buttom></td>"
                            + "<td class='text-center'><a href='Ena_Transection.php?i="+json.CONTENTS[i].ID+"' class='fa fa-bars text-danger text brandList' id='" + json.CONTENTS[i].ID + "'></a></td>"
                            + "</tr>";
                }
                $('#TableBodyIndex').html(output);
            }
        }
    });
}
*/

function loadTableIndex() {
    var url = "../consignment_ajax_request_ena/consignment_list_by_users.php?i="+page_no;
    $.ajax({
        type: "GET",
        url: url,
        success: function (data) {
            var json = JSON.parse(data);
            if (parseInt(json.SUCCESS) === 1) {
                var output = "";
                for (var i = 0; i < json.CONTENTS.length; i++) {
                    var link = "<tr><td><a href='index.php?i=" + json.CONTENTS[i].ID + "'>" + json.CONTENTS[i].LONGDATE + "</a></td>";
                    output += link
                            + "<td>" + json.CONTENTS[i].USER_FROM_NAME + "</td>"
                            + "<td>" + json.CONTENTS[i].ID + "</td>"
                            + "<td class='text-right'>" + json.CONTENTS[i].PASS_AMOUNT + "</td>"
                            + "<td>" + json.CONTENTS[i].STATUS_STR + "</td>"
                            + "<td class='text-center'><a href='consignment_details.php?i="+json.CONTENTS[i].ID+"' class='fa fa-bars text-danger text' id='" + json.CONTENTS[i].ID + "'></a></td>"
                            + "</tr>";
                }
                       $('#TableBodyConsigmItemList').append(output);
            }
            else{
                $("#Fotter_Part").html("No More Record Available");
            }
            }
    });
}




function loadConsignMentTableFull() {
    var url = "../consignment_ajax_request_ena/load_brand_list_by_master_id.php?i="+consignment_no;
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
                            + "<td>" + json.CONTENTS[i].BATCH_NO + "</td>"
                            + "<td>" + json.CONTENTS[i].QNTY + "</td>"
                            + "<td>" + json.CONTENTS[i].TOTAL_COST + "</td>"
                            + "<td>" + json.CONTENTS[i].TOTAL_ADV + "</td>"
                            + "<td>" + json.CONTENTS[i].TOTAL_FEE + "</td>"
                            + "<td>" + json.CONTENTS[i].TCS + "</td>"
                            + "<td>" + json.CONTENTS[i].TOTAL_MRP + "</td>"
                            + "</tr>";
                }
                $('#TableBodyForFullItemList').html(output);
            }
        }
    });
}


















