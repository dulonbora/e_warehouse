//Variables


//Brand Master
$(document).ready(loadHtmlToAddProductionModel());
$(document).ready(loadHtmlToModel());
$(document).ready(Search_Html());
$(document).ready(Secrch());
$(document).ready(UpdateStatus());
$(document).ready(UpdateStatusAction());
$(document).ready(addTooProduction());
$(document).ready(More());

$(document).ready(loadTableIndex());


function More() {
    $(document).on("click", "#Btn_More", function () {
        page_no = page_no+1;
        loadTableIndex();
    });
}


//Index

//
function Search_Html() {
    $('#search_html').load("search_html_date.php?i=" + user_item_id);
}

function loadHtmlToModel() {
    $(document).on("click", ".ViewTxnDetails", function () {
        var id = $(this).attr("id");
        CallHtmlPage(id);
    });
}

function loadHtmlToAddProductionModel() {
    $(document).on("click", ".addTooProduction", function () {
        var id = $(this).attr("id");
        CallHtmlPageProduction(id);
    });
}

function Secrch() {
    $(document).on("keyup", "#Search", function () {
        var id = $(this).val();
        loadTableSearch(id);
    });
}

function UpdateStatus() {
    $(document).on("click", ".UpdateStatus", function () {
        var id = $(this).attr("id");
        CallStatusHtmlPage(id);
    });
}

function UpdateStatusAction() {
    $(document).on("click", "#UpdateStatusBtn", function () {
        var url = "../ena_management_ajax_request/update_ena_status.php";
        var id = $("#ID").val();
        var status = $("#STATUS").val();
        $.ajax({
            type: "POST",
            url: url,
            data: {i: id, s: status},
            success: function (data) {
                var json = JSON.parse(data);
                if (parseInt(json.SUCCESS) === 1) {
                    loadTableIndex();
                    $('#myModalBig').modal("hide");
                }
            }
        });
    });
}

function CallHtmlPage(i) {
    $('#statusresult').load("view_transection_details.php?i=" + i);
    $('#myModalBig').modal("show");
}

function CallHtmlPageProduction(i) {
    $('#statusresult').load("brand_add_to_production.php?i=" + i);
    $('#myModalBig').modal("show");
}

function CallStatusHtmlPage(i) {
    $('#statusresult').load("update_status.php?i=" + i);
    $('#myModalBig').modal("show");
}


function loadTableIndex() {
    var url = "../ena_management_ajax_request/ena_transection_list.php?id="+user_item_id+"&i="+page_no;
    $.ajax({
        type: "GET",
        url: url,
        success: function (data) {
            var json = JSON.parse(data);
            if (parseInt(json.SUCCESS) === 1) {
                var output = "";
                for (var i = 0; i < json.CONTENTS.length; i++) {
                    var status = json.CONTENTS[i].STATUS === "0" ? "fa-check" : "fa-check";
                    var link = "<tr><td><a href='index.php?i=" + json.CONTENTS[i].ID + "'>" + json.CONTENTS[i].LONGDATE + "</a></td>";
                    output += link
                            + "<td>" + json.CONTENTS[i].MODE + "</td>"
                            + "<td>" + json.CONTENTS[i].TOO + "</td>"
                            + "<td class='text-right'>" + json.CONTENTS[i].BL + " BL</td>"
                      //      + "<td class='text-center'><buttom class='fa " + status + " text-danger text XUpdateStatus' id='" + json.CONTENTS[i].ID + "'></buttom></td>"
                            + "<td class='text-center' style = 'width: 150px;'><buttom class='btn btn-success btn-xs text-danger text ViewTxnDetails' id='" + json.CONTENTS[i].ID + "'>View Details</buttom></td>"
                            + "</tr>";
                }
                $('#TableBodyIndex').append(output);
            }
            else{
                $("#Fotter_Part").html("No More Record Available");
            }
        }
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
                if (parseInt(json.SUCCESS) === 1) {
                    $("#MassageLabel1").html("Successfully saved!");
                    $('#myModalBig').modal("hide");
                    loadTableIndex();
                }
                if (parseInt(json.SUCCESS) === 0) {
                    $("#MassageLabel1").html("Date failed to save!");
                }
            }
        });
    });
}














